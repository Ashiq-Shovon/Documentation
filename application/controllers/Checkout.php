<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    // SHOW STRIPE CHECKOUT PAGE
    public function stripe($selectedPricingPackageIdentifier)
    {
        // Include Stripe PHP library  
        require_once APPPATH . 'libraries/stripe/init.php';

        // Stripe API configuration
        $stripe_keys = get_settings('stripe_keys');
        $values = json_decode($stripe_keys);
        if ($values[0]->testmode == 'on') {
            $public_key = $values[0]->public_key;
            $private_key = $values[0]->secret_key;
        } else {
            $public_key = $values[0]->public_live_key;
            $private_key = $values[0]->secret_live_key;
        }

        // GET THE AMOUNT OF PRICING PACKAGE
        $selectedPricingPackageDetails = $this->pricing_package_model->get_pricing_package_by_identifier($selectedPricingPackageIdentifier)->row_array();
        if ($selectedPricingPackageDetails['pricing_package_has_discount']) {
            $selectedPricingPackageAmount = $selectedPricingPackageDetails['pricing_package_discounted_price'];
        } else {
            $selectedPricingPackageAmount = $selectedPricingPackageDetails['pricing_package_regular_price'];
        }

        // Set API key 
        \Stripe\Stripe::setApiKey($private_key);

        $response = array(
            'status' => 0,
            'error' => array(
                'message' => 'Invalid Request!'
            )
        );

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $input = file_get_contents('php://input');
            $request = json_decode($input);
        }

        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400);
            echo json_encode($response);
            exit;
        }

        if (!empty($request->checkoutSession)) {
            // Create new Checkout Session for the order 
            try {
                $session = \Stripe\Checkout\Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                        'price_data' => [
                            'product_data' => [
                                'name' => "Product Name", //$productName
                                'metadata' => [
                                    'pro_id' => "Product ID" // $productID
                                ]
                            ],
                            'unit_amount' => $selectedPricingPackageAmount * 100, //$stripeAmount
                            'currency' => 'USD', //$currency
                        ],
                        'quantity' => 1,
                        'description' => 'Product description', //$productName
                    ]],
                    'mode' => 'payment',
                    'success_url' => site_url('payment/stripe/' . $selectedPricingPackageIdentifier) . '/{CHECKOUT_SESSION_ID}',
                    'cancel_url' => site_url('payment/cancel'),
                ]);
            } catch (Exception $e) {
                $api_error = $e->getMessage();
            }

            if (empty($api_error) && $session) {
                $response = array(
                    'status' => 1,
                    'message' => 'Checkout Session created successfully!',
                    'sessionId' => $session['id']
                );
            } else {
                $response = array(
                    'status' => 0,
                    'error' => array(
                        'message' => 'Checkout Session creation failed! ' . $api_error
                    )
                );
            }
        }

        // Return response 
        echo json_encode($response);
    }

    public function paypal_checkout($selectedPricingPackageIdentifier)
    {
        $selectedPricingPackageDetails = $this->pricing_package_model->get_pricing_package_by_identifier($selectedPricingPackageIdentifier);
        if ($selectedPricingPackageDetails->num_rows() == 0) {
            $this->session->set_flashdata('error_message', get_phrase('invalid_price_package'));
            redirect(site_url(), 'refresh');
        }

        $selectedPricingPackageDetails = $selectedPricingPackageDetails->row_array();
        if ($selectedPricingPackageDetails['pricing_package_has_discount']) {
            $selectedPricingPackageAmount = $selectedPricingPackageDetails['pricing_package_discounted_price'];
        } else {
            $selectedPricingPackageAmount = $selectedPricingPackageDetails['pricing_package_regular_price'];
        }
        $page_data['user_details'] = $this->user_model->get_user_by_id($this->session->userdata('user_id'));
        $page_data['amount_to_pay'] = $selectedPricingPackageAmount;
        $page_data['page_title']  = site_phrase("pay_with_paypal", true);
        $page_data['selected_pricing_package_details'] = $selectedPricingPackageDetails;
        $page_data['selectedPricingPackageIdentifier'] = $selectedPricingPackageIdentifier;
        $this->load->view('pages/payment-gateways/paypal-checkout', $page_data);
    }
}
