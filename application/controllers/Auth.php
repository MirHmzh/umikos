<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Authm');
	}

	public function index()
	{
		if ($this->session->userdata('id') == 1) {
			redirect('admin','refresh');
		}else if($this->session->userdata('id') == 2){
			redirect('main','refresh');
		}
		$this->load->view('auth/auth');
	}

	function login_process()
	{
		$data = $this->Authm->login($this->input->post());
		if (!empty($data)) {
			if ($data->role == 2) {
				$array = array(
					'id' => $data->id_user,
					'email' => $data->email,
					'role' => $data->role,
					'name' => $data->nama_pemilik
				);
				$this->session->set_userdata( $array );
			}else{
				$array = array(
					'id' => $data->id_user,
					'email' => $data->email,
					'role' => $data->role,
					'name' => 'UMIKOS Admin'
				);
				$this->session->set_userdata( $array );
			}
		}
		echo json_encode(['msg' => empty($data) ? 'Data tidak ditemukan' : 'Data ditemukan', 'data' => $data, 'length' => empty($data) ? 0 : 1]);
	}

	function register_process()
	{
		$payload = $this->input->post();
		$payload['email'] = $payload['email_register'];
		$payload['password'] = $payload['password_register'];
		unset($payload['email_login']);
		unset($payload['email_register']);
		unset($payload['password_login']);
		unset($payload['password_register']);
		$data = $this->Authm->register($payload);
		echo json_encode([
			'msg' => 'Data telah ditambahkan',
			'data' => $data,
		]);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('','refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */