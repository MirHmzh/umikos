<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kos');
		$this->load->model('Owner');
		$this->load->model('Kampus');
	}

	public function index()
	{
		$content = array('content' => 'admin/dashboard');
		$content['active'] = 'dashboard';
		$this->load->view('layout/admin_base', $content);
	}

	function kos()
	{
		$data['active'] = 'kos';
		$data['content'] = 'admin/list_kos';
		$this->load->view('layout/admin_base', $data);
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
		$pemilik = $this->Owner->get();
		if ($id) {
			$kos = $this->Kos->get_where($id);
			$f = json_decode($kos->f_lain, true);
			echo "<pre>";
			print_r($f[0]);
			// echo reset($f[0]);
			echo key($f[0]);
			foreach ($f[0] as $k => $v) {
				print_r($k);
			}
			echo "</pre>";
			// exit;
			$content = array('content' => 'admin/form_kos', 'id_kos' => $id, 'kos' => $kos, 'pemilik' => $pemilik);
		}else{
			$content = array('content' => 'admin/form_kos', 'pemilik' => $pemilik);
		}
		$content['active'] = 'kos';
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
		$content = array('content' => 'admin/list_owner');
		$content['active'] = 'owner';
		$this->load->view('layout/admin_base', $content);
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
			$data = $this->Owner->get_where($id);
			$content = array('content' => 'admin/form_owner', 'id_pemilik' => $id, 'owner' => $data);
		}else{
			$content = array('content' => 'admin/form_owner');
		}
		$content['active'] = 'owner';
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

	function kampus()
	{
		$data['content'] = 'admin/list_kampus';
		$data['active'] = 'kampus';
		$this->load->view('layout/admin_base', $data);
	}

	function form_kampus($id = null)
	{
		$data['content'] = 'admin/form_kampus';
		$data['active'] = 'kampus';
		$this->load->view('layout/admin_base', $data);
	}

	function get_kampus()
	{
		$col = ['', '', '', '', ''];
		$requesttable = [
			'start' => $this->input->post('start'),
			'limit' => $this->input->post('length'),
			'search' => $this->input->post('search.value'),
			'column' => $col[$this->input->post('order[0][column]')],
			'column_order' => $this->input->post('order[0][dir]')
		];
		$kos = $this->Kampus->get_table($requesttable);
		$datatable = [
			'draw' => $this->input->post('draw'),
			'recordsTotal' => $kos['total'],
			'recordsFiltered' => $kos['total'],
			'data' => $kos['results']
		];
		echo json_encode($datatable);
	}

	function save_kampus($id = null)
	{
		$payload = $this->input->post();
		if ($id) {
			$trans = $this->Kampus->update($payload, $id);
			$msg = 'Kampus telah diperbarui';
		}else{
			$trans = $this->Kampus->insert($payload);
			$msg = 'Kampus telah ditambahkan';
		}
		echo json_encode(['msg' => $msg, 'data' => $trans]);
	}

	function delete_kampus($id = null)
	{
		$trans = $this->Kampus->delete($id);
		echo json_encode(['msg' => 'Owner telah dihapus', 'data' => $trans]);
	}

	function temp_upload()
	{
		$config['upload_path'] = 'temp';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = $this->input->post('file_uuid');

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else{
			$data = $this->upload->data();
			echo $this->input->post('file_uuid').$data['file_ext'];
		}
	}


}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */