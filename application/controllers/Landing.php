<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kos');
		$this->load->model('Kampus');
	}

	public function index()
	{

		$data['kampus'] = $this->Kampus->get();
		$this->load->view('layout/user_base', $data);
	}

	function search()
	{
		$query = $this->input->post('query');
		$data = $this->Kos->search($query);
		echo json_encode(['msg' => 'Data berhasil dicari', 'data' => $data]);
	}

	function filter()
	{
		$trans = $this->Kos->filter($this->input->post());
		echo json_encode(['msg' => 'Data telah difilter', 'data' => $trans]);
	}

	function get_kos($id)
	{
		$trans = $this->Kos->get_kos($id);
		echo json_encode($trans->row());
	}

}

/* End of file Landing.php */
/* Location: ./application/controllers/Landing.php */