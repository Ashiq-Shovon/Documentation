<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  @author   : Creativeitem
 *  date    : 30 June, 2021
 *  Creativeitem
 *  http://codecanyon.net/user/Creativeitem
 *  http://support.creativeitem.com
 */
class Modal extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		/*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}

	function popup($page_name = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '', $param6 = '', $param7 = '')
	{
		$page_data['param2']        =    $param2;
		$page_data['param3']        =    $param3;
		$page_data['param4']        =    $param4;
		$page_data['param5']        =    $param5;
		$page_data['param6']        =    $param6;
		$page_data['param7']        =    $param7;
		$this->load->view('backend/' . strtolower($this->session->userdata('role')) . '/' . $page_name . '.php', $page_data);
	}
	function showup($page_name = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '', $param6 = '', $param7 = '')
	{
		$page_data['param2']        =    $param2;
		$page_data['param3']        =    $param3;
		$page_data['param4']        =    $param4;
		$page_data['param5']        =    $param5;
		$page_data['param6']        =    $param6;
		$page_data['param7']        =    $param7;
		$this->load->view('pages/' . $page_name . '.php', $page_data);
	}
}
