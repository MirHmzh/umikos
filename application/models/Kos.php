<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kos extends CI_Model {

	function get(){
		return $this->db->get('tb_indekos')->row();
	}

	function get_table($datatable)
	{
		$data['total'] = $this->db->count_all_results('tb_indekos');
		$this->db->select('tb_indekos.*, owner.nama_pemilik, owner.notelp_pemilik');
		$this->db->join('tb_pemilik as owner', 'owner.id_pemilik = tb_indekos.id_pemilik', 'left');
		$data['results'] = $this->db->get('tb_indekos', $datatable['limit'], $datatable['start'])->result();
		return $data;
	}

	function get_where($where)
	{
		return $this->db->get_where('tb_indekos', $where)->result();
	}

	function insert($data)
	{
		print_r($data);
		$this->db->insert('tb_indekos', $data);
		return $this->db->insert_id();
	}

	function update($data, $id)
	{
		return $this->db->update('tb_indekos', $data, ['id_kos' => $id]);
	}

	function delete($id)
	{
		return $this->db->delete('tb_indekos', ['id_kos' => $id]);
	}

}

/* End of file Kos.php */
/* Location: ./application/models/Kos.php */