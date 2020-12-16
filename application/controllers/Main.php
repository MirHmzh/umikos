<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kos');
	}

	public function index()
	{
		$data['content'] = 'main/list_kos';
		$this->load->view('layout/owner_base', array('content' => 'main/list_kos'));
	}

	function get_kos()
	{
		$col = ['', '', '', '', ''];
		$requesttable = [
			'start' => $this->input->post('start'),
			'limit' => $this->input->post('length'),
			'search' => $this->input->post('search.value'),
			'column' => $col[$this->input->post('order[0][column]')],
			'column_order' => $this->input->post('order[0][dir]')
		];
		$kos = $this->Kos->get_table($requesttable);
		$datatable = [
			'draw' => $this->input->post('draw'),
			'recordsTotal' => $kos['total'],
			'recordsFiltered' => $kos['total'],
			'data' => $kos['results']
		];
		echo json_encode($datatable);
	}

	function form_kos($id = null)
	{
		if ($id) {
			$content = array('content' => 'main/form_kos', 'id_kos' => $id);
		}else{
			$content = array('content' => 'main/form_kos');
		}
		$this->load->view('layout/owner_base', $content);
	}

	function save_kos($id = null)
	{
		$payload = $this->input->post();
		if($id){
			$trans = $this->Kos->update($payload, $id);
			$msg = 'Kos telah ditambahkan';
		}else{
			$trans = $this->Kos->insert($payload);
			$msg = 'Kos telah diperbarui';
		}
		echo json_encode(['msg' => $msg, 'data' => $trans]);
	}

	function profile()
	{
		$this->load->view('layout/owner_base', array('content' => 'main/profile'));
	}

	function save_owner()
	{
		$payload = $this->input->post();
		$trans = $this->Owner->update($payload, $this->session->userdata('user_id'));
		echo json_encode(['msg' => $msg, 'data' => $trans]);
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */