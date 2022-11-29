<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /**
     * VALIDATE A USER BASED ON THEIR LOGIN ACCESS
     */
    public function validate($auto_login = 0, $userdata = array())
    {
        $email = $auto_login == 1 ? $userdata['email'] : $this->input->post('email');
        $password = $auto_login == 1 ? $userdata['password'] : sha1($this->input->post('password'));
        $credential = array('email' => $email, 'password' => $password, 'status' => 1);

        // Checking login credential for admin
        $query = $this->db->get_where('users', $credential);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('user_id', $row->id);
            $this->session->set_userdata('role_id', $row->role_id);
            $this->session->set_userdata('role', get_user_role('user_role', $row->id));
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_flashdata('flash_message', get_phrase('welcome') . ' ' . $row->name);
            if ($row->role_id == 1) {
                $this->session->set_userdata('admin_login', '1');
                redirect(site_url('admin'), 'refresh');
            } else if ($row->role_id == 2) {
                $this->session->set_userdata('customer_login', '1');
                redirect(site_url('customer'), 'refresh');
            } else if ($row->role_id == 3) {
                $this->session->set_userdata('writer_login', '1');
                redirect(site_url('writer'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error_message', get_phrase('invalid_login_credentials'));
            redirect(site_url('login'), 'refresh');
        }
    }

    /**
	 * VALIDATE RECAPTHCA FUNCTION IS RESPONSIBLE FOR VALIDATING THE REACAPTCHA
	 *
	 * @return boolean
	 */
	function validate_captcha($gRecaptchaResponse = "")
	{
		$recaptcha = $gRecaptchaResponse ? trim($gRecaptchaResponse) : trim($this->input->post('g-recaptcha-response'));
		$userIp = $this->input->ip_address();
		$secret = get_settings('recaptcha_secretkey');
		$data = array(
			'secret' => "$secret",
			'response' => "$recaptcha",
			'remoteip' => "$userIp"
		);

		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($verify);
		$status = json_decode($response, true);

		if (empty($status['success'])) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
}