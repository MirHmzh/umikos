<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Model {

	function get()
	{
		return $this->db->get('tb_pemilik')->result();
	}

	function get_where($data, $id)
	{
		return $this->db->get_where('tb_pemilik', $data, ['id_pemilik' => $id]);
	}

	function insert($data)
	{
		$this->db->insert('tb_pemilik', $data);
		return $this->db->insert_id();
	}

	function update($data, $id)
	{
		return $this->db->update('tb_pemilik', $data, ['id_pemilik' => $id]);
	}

	function delete($id)
	{
		return $this->db->delete('tb_pemilik', ['id_pemilik' => $id]);
	}

}

/* End of file Owner.php */
/* Location: ./application/models/Owner.php */