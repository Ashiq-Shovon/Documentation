<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include autoloader
require_once APPPATH . 'libraries/dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        if (!$this->session->userdata('customer_login') == true) {
            redirect(site_url('404'), 'refresh');
        }
    }

    /**
     * INDEX FUNCTION
     *
     * @return void
     */
    public function index()
    {
        $this->downloads();
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SHOWING ALL THE DOWNLOADABLE FILES FOR THIS USER
     *
     * @return void
     */
    public function downloads()
    {
        $page_data['page_title']       =     site_phrase('your_downloads');
        $page_data['meta_description'] =    'Creativeitem';
        $page_data['meta_keyword']     =    'creativeitem';
        $page_data['seo_title']        =    'creativeitem';
        $page_data['page_name']        =    'customer/index';
        $page_data['active_page']      =    'downloads';

        $page_data['my_downloads']  = $this->payment_model->get_my_downloads();
        $this->load->view('index', $page_data);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR DOWNLOADING THE PROJECT FILE
     *
     * @param string $license_code
     * @return void
     */
    public function download($license_code)
    {
        $this->load->helper('download');

        $payment_details = $this->payment_model->get_payment_details_by_license_code($license_code);

        // CHECK IF THE PAYMENT DETAILS IS NULL
        if ($payment_details->num_rows() > 0) {
            $payment_details = $payment_details->row_array();
            $package_details = $this->pricing_package_model->get_pricing_package_by_id($payment_details['pricing_package_id']);

            // CHECK IF THE PACKAGE DOES EXIST
            if ($package_details->num_rows() > 0) {
                $package_details = $package_details->row_array();
                $product_details = $this->product_model->get_product_by_id($package_details['pricing_package_product_id']);

                // CHECK IF THE PRODUCT DOES EXIST
                if ($product_details->num_rows() > 0) {
                    $product_details = $product_details->row_array();
                    $downloadable_file = $package_details['pricing_package_product_files'];

                    // CHECK IF THE DOWNLOADABLE PRODUCT DOES EXIST
                    if (empty($downloadable_file)) {
                        error(site_phrase('it_is_unavailable_right_now') . ', ' . site_phrase('please_wait'), site_url('customer'));
                    }

                    // DOWNLOAD THE GODDAMN PRODUCT
                    $data = file_get_contents("uploads/resources/" . $product_details['directory'] . '/' . $downloadable_file); // Read the file's contents
                    $file_extension = pathinfo($downloadable_file, PATHINFO_EXTENSION);
                    $new_title = str_replace(' ', '_', trim($package_details['pricing_package_name'])) . '.' . $file_extension;
                    force_download($new_title, $data);
                    success(site_phrase('file_downloaded'), site_url('customer'));
                } else {
                    error(site_phrase('this_product_does_not_exist'), site_url('customer'));
                }
            } else {
                error(site_phrase('this_package_does_not_exist'), site_url('customer'));
            }
        } else {
            error(site_phrase('invalid_license_code'), site_url('customer'));
        }
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR DOWNLOADING THE INVOICE
     *
     * @param string $license_code
     * @return void
     */
    public function invoice($license_code)
    {
        $payment_details = $this->payment_model->get_payment_details_by_license_code($license_code);
        // CHECK IF THE PAYMENT DETAILS IS NULL
        if ($payment_details->num_rows() > 0) {
            $payment_details = $payment_details->row_array();
            $package_details = $this->pricing_package_model->get_pricing_package_by_id($payment_details['pricing_package_id']);

            // CHECK IF THE PACKAGE DOES EXIST
            if ($package_details->num_rows() > 0) {
                $package_details = $package_details->row_array();
                $product_details = $this->product_model->get_product_by_id($package_details['pricing_package_product_id']);

                // CHECK IF THE PRODUCT DOES EXIST
                if ($product_details->num_rows() > 0) {

                    $user_details = $this->user_model->get_all_user($this->session->userdata('user_id'));
                    // instantiate and use the dompdf class
                    $dompdf = new Dompdf();

                    $this->load->view('customer/invoice', ['payment_details' => $payment_details, 'package_details' => $package_details, 'product_details' => $product_details->row_array(), 'user_details' => $user_details->row_array()]);
                    $htmlcontent = $this->output->get_output();

                    $dompdf->loadHtml($htmlcontent);

                    // (Optional) Setup the paper size and orientation
                    $dompdf->setPaper('A4', 'potrait');

                    // Render the HTML as PDF
                    $dompdf->render();

                    // Output the generated PDF to Browser
                    $dompdf->stream("invoice.pdf", array("Attachment" => 0));
                } else {
                    error(site_phrase('this_product_does_not_exist'), site_url('customer'));
                }
            } else {
                error(site_phrase('this_package_does_not_exist'), site_url('customer'));
            }
        } else {
            error(site_phrase('invalid_license_code'), site_url('customer'));
        }
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR UPDATING AND SHOWING USER PROFILE DATA
     *
     * @return void
     */
    public function profile($action = "")
    {
        if ($action == "update_profile") {
            $response = $this->user_model->update_user_profile();
            if ($response) {
                success(site_phrase('user_profile_updated'), site_url('customer/profile'));
            }
        } elseif ($action == "update_password") {
            $response = $this->user_model->update_password();
            if ($response) {
                success(site_phrase('user_profile_updated'), site_url('customer/profile'));
            } else {
                error(site_phrase('password_mismatched'), site_url('customer/profile'));
            }
        }

        $page_data['page_title']       =     site_phrase('user_profile');
        $page_data['meta_description'] =    'Creativeitem';
        $page_data['meta_keyword']     =    'creativeitem';
        $page_data['seo_title']        =    'creativeitem';
        $page_data['page_name']        =    'customer/index';
        $page_data['active_page']      =    'profile';
        $this->load->view('index', $page_data);
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR SHOWING SUPPORT VIEW FOR THIS USER
     *
     * @return void
     */
    public function support()
    {
        $page_data['page_title']       =     site_phrase('support');
        $page_data['meta_description'] =    'Creativeitem';
        $page_data['meta_keyword']     =    'creativeitem';
        $page_data['seo_title']        =    'creativeitem';
        $page_data['page_name']        =    'customer/index';
        $page_data['active_page']      =    'support';
        $this->load->view('index', $page_data);
    }
}
