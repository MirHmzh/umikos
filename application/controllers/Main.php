<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kos');
		$this->load->model('Owner');
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

	function delete_kos($id)
	{
		$trans = $this->Kos->delete($id);
		echo json_encode(['msg' => 'Kos telah dihapus', 'data' => $trans]);
	}

	function profile()
	{
		$data['profile'] = $this->Owner->get_where($this->session->userdata('id'));
		$data['content'] = 'main/profile';
		$this->load->view('layout/owner_base', $data);
	}

	function save_owner()
	{
		$payload = $this->input->post();
		$trans = $this->Owner->update($payload, $this->session->userdata('id'));
		echo json_encode(['msg' => 'Data telah diperbarui', 'data' => $trans]);
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

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */