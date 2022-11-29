<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source product development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */


if (!function_exists('get_user_role')) {
	function get_user_role($type = "", $user_id = '')
	{
		$CI	= &get_instance();
		$CI->load->database();

		$role_id	=	$CI->db->get_where('users', array('id' => $user_id))->row()->role_id;
		$user_role	=	$CI->db->get_where('roles', array('role_id' => $role_id))->row()->role_title;

		if ($type == "user_role") {
			return strtolower($user_role);
		} else {
			return $role_id;
		}
	}
}

// THIS HELPER METHOD CHECKS IF THE EMAIL IS VALID OR NOT. IT BASICALLY CHECKES THE DUPLICATION
if (!function_exists('email_duplication')) {
	function email_duplication($email = "", $user_id = "")
	{
		$CI	= &get_instance();
		$CI->load->database();

		$query = $CI->db->get_where('users', ['email' => $email]);
		if (!empty($user_id)) {
			$query_result = $query->row_array();
			if ($query->num_rows() == 0 || $query_result['id'] == $user_id) {
				return true;
			} else {
				$CI->session->set_flashdata('error_message', get_phrase('duplicate_email'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		} else {
			if ($query->num_rows() > 0) {
				$CI->session->set_flashdata('error_message', get_phrase('duplicate_email'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			} else {
				return true;
			}
		}
	}
}

// ------------------------------------------------------------------------
/* End of file user_helper.php */
/* Location: ./system/helpers/user_helper.php */
