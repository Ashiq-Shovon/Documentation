<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function index()
    {
        if ($this->session->userdata('admin_login')) {
            redirect(site_url('admin'), 'refresh');
        } elseif ($this->session->userdata('customer_login')) {
            redirect(site_url('customer'), 'refresh');
        } else {
            $page_data['page_title']         =     site_phrase('login');
            $page_data['meta_description']    =    'Academy lms meta description';
            $page_data['meta_keyword']        =    'a, b, c, d';
            $page_data['seo_title']        =    'creativeitem';
            $page_data['page_name'] = 'pages/login';
            $this->load->view('index', $page_data);
        }
    }

    public function validate_login($auto_login = 0)
    {
        if (!$this->auth_model->validate_captcha()) {
            $this->auth_model->validate();
        } else {
            $this->session->set_flashdata('error_message', get_phrase('make_sure_that_you_are_not_a_robot'));
            redirect(site_url('login'), 'refresh');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url(), 'refresh');
    }

    public function forget_password()
    {
        if ($this->session->userdata('admin_login')) {
            redirect(site_url('admin'), 'refresh');
        } elseif ($this->session->userdata('customer_login')) {
            redirect(site_url('user'), 'refresh');
        } else {
            $page_data['page_title']         =     site_phrase('forget_password');
            $page_data['meta_description']    =    'Academy lms meta description';
            $page_data['meta_keyword']        =    'a, b, c, d';
            $page_data['seo_title']        =    'creativeitem';
            $page_data['page_name'] = 'pages/forget_password';
            $this->load->view('index', $page_data);
        }
    }
}
