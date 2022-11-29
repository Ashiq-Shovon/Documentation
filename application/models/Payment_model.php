<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /**
     * THIS FUNCTION RETURNS ALL THE PAYMENT DATA
     *
     * @return object
     */
    public function get_all()
    {
        return $this->db->select('*')
            ->from('payments as payments')
            ->join('users as users', 'payments.user_id = users.id', 'LEFT')
            ->join('pricing_packages as pricing_packages', 'payments.pricing_package_id = pricing_packages.pricing_package_id', 'LEFT')
            ->order_by('payments.date_added', 'desc')
            ->get();
    }


    /**
     * THIS FUNCTION RETURNS A SINGLE DETAILS OF THE PAYMENT DATA
     *
     * @param int $id
     * @return object
     */
    public function get_by_id($id)
    {
        return $this->db->select('*')
            ->from('payments as payments')
            ->where('payments.payment_id', $id)
            ->join('users as users', 'payments.user_id = users.id', 'LEFT')
            ->join('pricing_packages as pricing_packages', 'payments.pricing_package_id = pricing_packages.pricing_package_id', 'LEFT')
            ->order_by('payments.date_added', 'desc')
            ->get();
    }


    /**
     * THIS FUNCTION RETURNS A ROW WITH LICENSE CODE
     *
     * @param string $license_code
     * @return object
     */
    public function get_payment_details_by_license_code($license_code = "", $user_id = "")
    {
        if (empty($user_id)) {
            $user_id = $this->session->userdata('user_id');
        }
        return $this->db->get_where('payments', ['license_code' => $license_code, 'user_id' => $user_id]);
    }

    /**
     * validate stripe payment
     *
     * @param string $session_id
     * @return void
     */
    public function stripe_payment($session_id = "")
    {
        $stripe_keys = get_settings('stripe_keys');
        $values = json_decode($stripe_keys);
        if ($values[0]->testmode == 'on') {
            $public_key = $values[0]->public_key;
            $secret_key = $values[0]->secret_key;
        } else {
            $public_key = $values[0]->public_live_key;
            $secret_key = $values[0]->secret_live_key;
        }

        // Stripe API configuration
        define('STRIPE_API_KEY', $secret_key);
        define('STRIPE_PUBLISHABLE_KEY', $public_key);

        $status_msg = '';
        $transaction_id = '';
        $paid_amount = '';
        $paid_currency = '';
        $payment_status = '';

        // Check whether stripe checkout session is not empty
        if ($session_id != "") {
            // $session_id = $_GET['session_id'];

            // Include Stripe PHP library
            require_once APPPATH . 'libraries/stripe/init.php';

            // Set API key
            \Stripe\Stripe::setApiKey(STRIPE_API_KEY);

            // Fetch the Checkout Session to display the JSON result on the success page
            try {
                $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
            } catch (Exception $e) {
                $api_error = $e->getMessage();
            }

            if (empty($api_error) && $checkout_session) {
                // Retrieve the details of a PaymentIntent
                try {
                    $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
                } catch (\Stripe\Exception\ApiErrorException $e) {
                    $api_error = $e->getMessage();
                }

                // Retrieves the details of customer
                try {
                    // Create the PaymentIntent
                    $customer = \Stripe\Customer::retrieve($checkout_session->customer);
                } catch (\Stripe\Exception\ApiErrorException $e) {
                    $api_error = $e->getMessage();
                }

                if (empty($api_error) && $intent) {
                    // Check whether the charge is successful
                    if ($intent->status == 'succeeded') {
                        // Customer details
                        $customer_name = $customer->name;
                        $customer_email = $customer->email;
                        $response['customer_name'] = $customer_name;
                        $response['customer_email'] = $customer_email;
                        // Transaction details
                        $transaction_id = $intent->id;
                        $paid_amount = ($intent->amount / 100);
                        $paid_currency = $intent->currency;
                        $payment_status = $intent->status;

                        // If the order is successful
                        if ($payment_status == 'succeeded') {
                            $status_msg = "Your Payment has been Successful";
                        } else {
                            $status_msg = "Your Payment has failed";
                        }
                    } else {
                        $status_msg = "Transaction has been failed";
                    }
                } else {
                    $status_msg = "Unable to fetch the transaction details" . ' ' . $api_error;
                }

                $status_msg = 'success';
            } else {
                $status_msg = "Transaction has been failed" . ' ' . $api_error;
            }
        } else {
            $status_msg = "Invalid Request";
        }

        $response['status_msg'] = $status_msg;
        $response['transaction_id'] = $transaction_id;
        $response['paid_amount'] = $paid_amount;
        $response['paid_currency'] = $paid_currency;
        $response['payment_status'] = $payment_status;
        $response['stripe_session_id'] = $session_id;
        $response['payment_method'] = 'stripe';

        $response['duplication'] = $this->check_duplicate_payment_for_stripe($response['transaction_id'], $session_id) ? 1 : 0;

        return $response;
    }

    /**
     * VALIDATING DUPLICATION FOR STRIPE PAYMENT GATEWAY
     *
     * @param string $transaction_id
     * @param string $stripe_session_id
     * @return void
     */
    public function check_duplicate_payment_for_stripe($transaction_id = "", $stripe_session_id = "")
    {
        $query = $this->db->get_where('payments', array('stripe_transaction_id' => $transaction_id, 'stripe_session_id' => $stripe_session_id));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * VALIDATING DUPLICATION FOR PAYPAL PAYMENT GATEWAY
     *
     * @param string $paypal_payment_id
     * @return boolean
     */
    public function check_duplicate_payment_for_paypal($paypal_payment_id = "")
    {
        $query = $this->db->get_where('payments', array('paypal_payment_id' => $paypal_payment_id));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * THIS FUNCTION IS RESPONSIBLE FOR VALIDATING PAYPAL PAYMENT
     *
     * @param string $paymentID
     * @return boolean
     */
    public function paypal_payment($paymentID = "")
    {
        $paypal_keys = get_settings('paypal_keys');
        $paypal_data = json_decode($paypal_keys);

        if ($paypal_data[0]->mode == 'sandbox') {
            $paypalURL       = 'https://api.sandbox.paypal.com/v1/';
        } else {
            $paypalURL       = 'https://api.paypal.com/v1/';
        }

        if ($paypal_data[0]->mode == 'sandbox') {
            $paypalClientID = $paypal_data[0]->sandbox_client_id;
            $paypalSecret   = $paypal_data[0]->sandbox_secret_key;
        } else {
            $paypalClientID = $paypal_data[0]->production_client_id;
            $paypalSecret   = $paypal_data[0]->production_secret_key;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paypalURL . 'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $paypalClientID . ":" . $paypalSecret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $response = curl_exec($ch);
        curl_close($ch);

        if (empty($response)) {
            return false;
        } else {
            $jsonData = json_decode($response);
            $curl = curl_init($paypalURL . 'payments/payment/' . $paymentID);
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $jsonData->access_token,
                'Accept: application/json',
                'Content-Type: application/xml'
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            // Transaction data
            $result = json_decode($response);

            // CHECK IF THE PAYMENT STATE IS APPROVED OR NOT
            if ($result && $result->state == 'approved') {
                return true;
            } else {
                return false;
            }
        }
    }

    // INSERT TO PAYMENT TABLE
    public function paid_with_paypal($amount_paid, $address_id, $paymentID, $paymentToken, $payerID)
    {
        // CHECK IF THE PAYMENT ID IS DUPLICATE
        $check_duplication = $this->db->get_where('payment', array('identifier' => $paymentID))->num_rows();
        if ($check_duplication > 0) {
            error(site_phrase('invalid_payment'), site_url('cart'));
        }
        // IF THE PAYMENT ID IS UNIQUE
        $data['amount_to_pay'] = $this->cart_model->get_grand_total();
        $data['amount_paid'] = $amount_paid;
        $data['payment_method'] = "paypal";
        $data['identifier'] = $paymentID;
        $data['data'] = json_encode(['payment_id' => $paymentID, 'payment_token' => $paymentToken, 'payer_id' => $payerID]);
        $data['created_at'] = strtotime(date('D, d-M-Y'));

        $order_code = $this->order_model->confirm($address_id);
        $data['order_code'] = $order_code;

        $this->db->insert('payment', $data);
        return true;
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR STORING PAYMENT DATA IN TABLE
     *
     * @param array $payment_data
     * @return void
     */
    public function store($payment_data = [])
    {
        $this->db->insert('payments', $payment_data);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR GETTING THE CUSTOMER DETAILS OF A SUCCESSFULL PAYPAL PAYMENT
     *
     * @param string $paymentID
     * @return void
     */
    public function get_customer_details_by_payment_id($paymentID, $payerID)
    {
        $result = array();
        $paypal_keys = get_settings('paypal_keys');
        $paypal_data = json_decode($paypal_keys);

        if ($paypal_data[0]->mode == 'sandbox') {
            $paypalURL       = 'https://api.sandbox.paypal.com/v1/';
        } else {
            $paypalURL       = 'https://api.paypal.com/v1/';
        }

        if ($paypal_data[0]->mode == 'sandbox') {
            $paypalClientID = $paypal_data[0]->sandbox_client_id;
            $paypalSecret   = $paypal_data[0]->sandbox_secret_key;
        } else {
            $paypalClientID = $paypal_data[0]->production_client_id;
            $paypalSecret   = $paypal_data[0]->production_secret_key;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paypalURL . 'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $paypalClientID . ":" . $paypalSecret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $response = curl_exec($ch);
        curl_close($ch);

        if (empty($response)) {
            return false;
        } else {
            $jsonData = json_decode($response);
            $curl = curl_init($paypalURL . 'payments/payment/' . $paymentID . '/execute');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, '{"payer_id": "' . $payerID . '"}');
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $jsonData->access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            $result = json_decode($response, true);

            // USER data
            $userdata = $result['payer']['payer_info'];
            return $userdata;
        }
    }


    /**
     * THIS FUNCTION IS RESPONSIBLE FOR GET LOGGED IN CUSTOMER'S DOWNLOADS FILES
     *
     * @return object
     */
    public function get_my_downloads()
    {
        return $this->db->select('*')
            ->from('payments as payments')
            ->where('payments.user_id', $this->session->userdata('user_id'))
            ->join('pricing_packages as pricing_packages', 'payments.pricing_package_id = pricing_packages.pricing_package_id', 'LEFT')
            ->get();
    }
}
