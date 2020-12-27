<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kos extends CI_Model {

	function get(){
		$this->db->join('tb_pemilik', 'tb_pemilik.id_pemilik = tb_indekos.id_pemilik', 'left');
		return $this->db->get('tb_indekos')->result();
	}

	function get_table($datatable)
	{
		$data['total'] = $this->db->count_all_results('tb_indekos');
		$this->db->select('tb_indekos.*, owner.nama_pemilik, owner.notelp_pemilik');
		$this->db->join('tb_pemilik as owner', 'owner.id_pemilik = tb_indekos.id_pemilik', 'left');
		$data['results'] = $this->db->get('tb_indekos', $datatable['limit'], $datatable['start'])->result();
		return $data;
	}

	function get_table_owned($datatable, $id)
	{
		$data['total'] = $this->db->count_all_results('tb_indekos');
		$this->db->select('tb_indekos.*, owner.nama_pemilik, owner.notelp_pemilik');
		$this->db->join('tb_pemilik as owner', 'owner.id_pemilik = tb_indekos.id_pemilik', 'left');
		$this->db->where('tb_indekos.id_pemilik', $id);
		$data['results'] = $this->db->get('tb_indekos', $datatable['limit'], $datatable['start'])->result();
		return $data;
	}

	function get_where($id)
	{
		$this->db->join('tb_pemilik', 'tb_pemilik.id_pemilik = tb_indekos.id_pemilik', 'left');
		return $this->db->get_where('tb_indekos', ['id_kos' => $id])->row();
	}

	function get_kos($id)
	{
		$this->db->join('tb_pemilik', 'tb_pemilik.id_pemilik = tb_indekos.id_pemilik', 'left');
		return $this->db->get_where('tb_indekos', ['id_kos' => $id]);
	}

	function insert($data)
	{
		unset($data['f_tambahan_desc']);
		unset($data['f_tambahan_value']);
		$this->db->insert('tb_indekos', $data);
		return $this->db->insert_id();
	}

	function update($data, $id)
	{
		unset($data['f_tambahan_desc']);
		unset($data['f_tambahan_value']);
		return $this->db->update('tb_indekos', $data, ['id_kos' => $id]);
	}

	function delete($id)
	{
		return $this->db->delete('tb_indekos', ['id_kos' => $id]);
	}

	function search($query)
	{
		$this->db->like('tb_indekos.nama_kos', $query, 'BOTH');
		$this->db->or_like('alamat_kos', $query, 'BOTH');
		$this->db->or_like('nama_pemilik', $query, 'BOTH');
		$this->db->join('tb_pemilik', 'tb_indekos.id_pemilik = tb_pemilik.id_pemilik', 'left');
		$trans = $this->db->get('tb_indekos')->result();
		return $trans;
	}

	function filter($data)
	{
		$this->db->select("ACOS( SIN( RADIANS( `lat_kos` ) ) * SIN( RADIANS( ".$data['lat']." ) ) + COS( RADIANS( `lat_kos` ) )
* COS( RADIANS( ".$data['lat']." )) * COS( RADIANS( `lng_kos` ) - RADIANS( ".$data['lng']." )) ) * 6380 AS 'distance', tb_indekos.*");
		$this->db->where("
			ACOS( SIN( RADIANS( `lat_kos` ) ) * SIN( RADIANS( ".$data['lat']." ) ) + COS( RADIANS( `lat_kos` ) )
* COS( RADIANS( ".$data['lat']." )) * COS( RADIANS( `lng_kos` ) - RADIANS( ".$data['lng']." )) ) * 6380 < (".$data['radius']."/1000)
			");
		$this->db->group_start();
		if (isset($data['f_km'])) { $this->db->where('f_kamar_mandi', 1); }
		if (isset($data['f_ac'])) { $this->db->where('f_ac', 1); }
		if (isset($data['f_listrik'])) { $this->db->where('f_listrik', 1); }
		if ($data['f_tambahan_desc']) {
			foreach ($data['f_tambahan_desc'] as $k => $v) {
				$this->db->or_like('f_lain', $v, 'BOTH');
			}
		}
		$this->db->group_end();
		$this->db->order_by('distance', 'asc');
		$trans = $this->db->get('tb_indekos');
		return $trans->result();
	}

	public function count()
	{
		return $this->db->count_all('tb_indekos');
	}

}

/* End of file Kos.php */
/* Location: ./application/models/Kos.php */