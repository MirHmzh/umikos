<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data['content'] = 'main/list_kos';
		$this->load->view('layout/owner_base', array('content' => 'main/profile'));
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */