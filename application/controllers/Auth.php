<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('auth/auth');
	}

	function login_process()
	{

	}

	function register_process()
	{

	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */