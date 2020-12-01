<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kampus extends CI_Model {

	function get(){
		return $this->db->get('tb_kampus')->result();
	}

	function get_where($where)
	{
		return $this->db->get_where('tb_kampus', $where)->row();
	}

	function insert($data)
	{
		$this->db->insert('tb_kampus', $data);
		return $this->db->insert_id();
	}

	function update($data, $id)
	{
		return $this->db->update('tb_kampus', $data, ['id_kampus' => $id]);
	}

	function delete($id)
	{
		return $this->db->delete('tb_kampus', ['id_kampus' => $id]);
	}

}

/* End of file Kampus.php */
/* Location: ./application/models/Kampus.php */