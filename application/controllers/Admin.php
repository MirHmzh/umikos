<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kos');
		$this->load->model('Owner');
	}

	public function index()
	{
		$this->load->view('layout/admin_base', array('content' => 'admin/form_owner'));
	}

	function kos()
	{
		$this->load->view('layout/admin_base', array('content' => 'admin/list_kos'));
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
			$content = array('content' => 'admin/form_kos', 'id_kos' => $id);
		}else{
			$content = array('content' => 'admin/form_kos');
		}
		$this->load->view('layout/admin_base', $content);
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

	function delete_kos($id)
	{
		$trans = $this->Kos->delete($id);
		echo json_encode(['msg' => 'Kos telah dihapus', 'data' => $trans]);
	}

	function owner()
	{
		$this->load->view('layout/admin_base', array('content' => 'admin/list_owner'));
	}

	function get_owner()
	{
		$col = ['', '', '', '', ''];
		$requesttable = [
			'start' => $this->input->post('start'),
			'limit' => $this->input->post('length'),
			'search' => $this->input->post('search.value'),
			'column' => $col[$this->input->post('order[0][column]')],
			'column_order' => $this->input->post('order[0][dir]')
		];
		$kos = $this->Owner->get_table($requesttable);
		$datatable = [
			'draw' => $this->input->post('draw'),
			'recordsTotal' => $kos['total'],
			'recordsFiltered' => $kos['total'],
			'data' => $kos['results']
		];
		echo json_encode($datatable);
	}

	function form_owner($id = null)
	{
		if ($id) {
			$content = array('content' => 'admin/form_owner', 'id_pemilik' => $id);
		}else{
			$content = array('content' => 'admin/form_owner');
		}
		$this->load->view('layout/admin_base', $content);
	}

	function save_owner($id = null)
	{
		$payload = $this->input->post();
		if ($id) {
			$trans = $this->Owner->update($payload, $id);
			$msg = 'Owner telah diperbarui';
		}else{
			$trans = $this->Owner->insert($payload);
			$msg = 'Owner telah ditambahkan';
		}
		echo json_encode(['msg' => $msg, 'data' => $trans]);
	}

	function delete_owner($id)
	{
		$trans = $this->Owner->delete($id);
		echo json_encode(['msg' => 'Owner telah dihapus', 'data' => $trans]);
	}


}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */