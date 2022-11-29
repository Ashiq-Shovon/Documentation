<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{
    /**
     * THIS FUNCTION IS RESPONSIBLE FOR STRIPE PAYMENET OPERATION STATUS
     *
     * @param string $selectedPricingPackageIdentifier
     * @param string $session_id
     * @return void
     */
    public function stripe($selectedPricingPackageIdentifier = "", $session_id = "")
    {
        // GET THE AMOUNT OF PRICING PACKAGE
        $selectedPricingPackageDetails = $this->pricing_package_model->get_pricing_package_by_identifier($selectedPricingPackageIdentifier)->row_array();
        if ($selectedPricingPackageDetails['pricing_package_has_discount']) {
            $selectedPricingPackageAmount = $selectedPricingPackageDetails['pricing_package_discounted_price'];
        } else {
            $selectedPricingPackageAmount = $selectedPricingPackageDetails['pricing_package_regular_price'];
        }

        $response = $this->payment_model->stripe_payment($session_id);
        if ($response['payment_status'] === 'succeeded') {
            if ($response['duplication'] == 0) :

                // CHECKING TOTAL AMOUNT
                if ($selectedPricingPackageAmount != $response['paid_amount']) {
                    $this->session->set_flashdata('error_message', "Invalid amount");
                    redirect(site_url(), 'refresh');
                }
                // REGISTERING USER AFTER A SUCCESSFUL PURCHASING
                $checkout_user_email = $this->session->userdata('checkout_user_email'); // THIS WAS THE EMAIL USER SET AT THE TIME OF CONFIRMING THE PACKAGE
                if (empty($checkout_user_email)) {
                    // IF THE SESSION EMAIL DOES NOT EXIST, IT WILL TAKE THE STRIPE PAYMENT GATEWAYS EMAIL
                    $user_data = $this->user_model->signup_user_after_successful_payment($response['customer_name'], $response['customer_email']);
                } else {
                    // IF THE SESSION EMAIL EXISTS, IT WILL TAKE THE SESSION EMAIL
                    $user_data = $this->user_model->signup_user_after_successful_payment($response['customer_name'], $checkout_user_email);
                }

                // SENDING MAIL TO THE CUSTOMER WITH THE PASSWORD
                if ($user_data['send_mail']) {
                    $this->email_model->user_password($user_data['name'], $user_data['email'], $user_data['raw_password']);
                }

                $payment_data['user_id'] = $user_data['id'];
                $payment_data['payment_method'] = $this->security->xss_clean($response['payment_method']);
                $payment_data['pricing_package_id'] = $this->security->xss_clean($selectedPricingPackageDetails['pricing_package_id']);
                $payment_data['amount_paid'] = $this->security->xss_clean($response['paid_amount']);
                $payment_data['currency_code'] = $this->security->xss_clean($response['paid_currency']);
                $payment_data['stripe_transaction_id'] = $this->security->xss_clean($response['transaction_id']);
                $payment_data['stripe_session_id'] = $session_id;
                $payment_data['license_code'] = license_code();
                $payment_data['date_added'] = strtotime(date('D, d-M-Y'));

                // REGISTERING PAYMENT DATA IN PAYMENTS TABLE
                $this->payment_model->store($payment_data);

                // DESTROYING THE SESSION EMAIL
                $this->session->unset_userdata('checkout_user_email');

                // LOGGING IN THE USER
                $this->auth_model->validate(1, $user_data);
            else :
                //duplicate payment
                $this->session->set_flashdata('error_message', "Session timed out");
                redirect(site_url(), 'refresh');
            endif;
        } else {
            $this->session->set_flashdata('error_message', $response['status_msg']);
            redirect(site_url(), 'refresh');
        }
    }


    public function paypal($selectedPricingPackageIdentifier, $paymentID, $paymentToken, $payerID)
    {
        // GET THE DETAILS PRICING PACKAGE
        $selectedPricingPackageDetails = $this->pricing_package_model->get_pricing_package_by_identifier($selectedPricingPackageIdentifier)->row_array();

        if ($selectedPricingPackageDetails['pricing_package_has_discount']) {
            $selectedPricingPackageAmount = $selectedPricingPackageDetails['pricing_package_discounted_price'];
        } else {
            $selectedPricingPackageAmount = $selectedPricingPackageDetails['pricing_package_regular_price'];
        }

        // CHECKING DUPLICATION FOR PAYPAL PAYMENT
        $duplication = $this->payment_model->check_duplicate_payment_for_paypal($paymentID);
        if ($duplication) {
            $this->session->set_flashdata('error_message', "Invalid transaction");
            redirect(site_url(), 'refresh');
        }

        $customer_data = $this->payment_model->get_customer_details_by_payment_id($paymentID, $payerID);

        // REGISTERING USER AFTER A SUCCESSFUL PURCHASING
        $checkout_user_email = $this->session->userdata('checkout_user_email'); // THIS WAS THE EMAIL USER SET AT THE TIME OF CONFIRMING THE PACKAGE
        if (empty($checkout_user_email)) {
            // IF THE SESSION EMAIL DOES NOT EXIST, IT WILL TAKE THE STRIPE PAYMENT GATEWAYS EMAIL
            $user_data = $this->user_model->signup_user_after_successful_payment($customer_data['first_name'] . ' ' . $customer_data['last_name'], $customer_data['email']);
        } else {
            // IF THE SESSION EMAIL EXISTS, IT WILL TAKE THE SESSION EMAIL
            $user_data = $this->user_model->signup_user_after_successful_payment($customer_data['first_name'] . ' ' . $customer_data['last_name'], $checkout_user_email);
        }


        // SENDING MAIL TO THE CUSTOMER WITH THE PASSWORD
        if ($user_data['send_mail']) {
            $this->email_model->user_password($user_data['name'], $user_data['email'], $user_data['raw_password']);
        }

        $payment_data['user_id'] = $user_data['id'];
        $payment_data['payment_method'] = 'paypal';
        $payment_data['pricing_package_id'] = $this->security->xss_clean($selectedPricingPackageDetails['pricing_package_id']);
        $payment_data['amount_paid'] = $this->security->xss_clean($selectedPricingPackageAmount);
        $payment_data['currency_code'] = $this->security->xss_clean(get_settings('paypal_currency'));
        $payment_data['paypal_payment_id'] = $paymentID;
        $payment_data['paypal_payment_token'] = $paymentToken;
        $payment_data['paypal_payer_id'] = $payerID;
        $payment_data['license_code'] = license_code();
        $payment_data['date_added'] = strtotime(date('D, d-M-Y'));

        // REGISTERING PAYMENT DATA IN PAYMENTS TABLE
        $this->payment_model->store($payment_data);

        // DESTROYING THE SESSION EMAIL
        $this->session->unset_userdata('checkout_user_email');

        // LOGGING IN THE USER
        $this->auth_model->validate(1, $user_data);
    }
    /**
     * IF THE PAYMENT GOT CANCELED
     *
     * @return void
     */
    public function cancel()
    {
        $this->session->set_flashdata('error_message', site_phrase('your_transaction_got_canceled'));
        redirect(site_url(), 'refresh');
    }
}
