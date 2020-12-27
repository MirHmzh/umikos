<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Model {

	function get()
	{
		return $this->db->get('tb_pemilik')->result();
	}

	function get_table($datatable)
	{
		$data['total'] = $this->db->count_all_results('tb_pemilik');
		$this->db->select('tb_pemilik.*, tb_user.email');
		$this->db->join('tb_user', 'tb_user.id_user = tb_pemilik.user_id', 'left');
		$data['results'] = $this->db->get('tb_pemilik', $datatable['limit'], $datatable['start'])->result();
		return $data;
	}

	function get_where($id)
	{
		$this->db->join('tb_user', 'tb_user.id_user = tb_pemilik.user_id', 'left');
		return $this->db->get_where('tb_pemilik', ['id_pemilik' => $id])->row();
	}

	function get_owner($id)
	{
		$this->db->join('tb_user', 'tb_user.id_user = tb_pemilik.user_id', 'left');
		return $this->db->get_where('tb_pemilik', ['user_id' => $id])->row();
	}

	function insert($data)
	{
		$userdata = ['email' => $data['email'], 'password' => $data['password'], 'role' => 2];
		unset($data['email']);
		unset($data['password']);
		$pemilik = $data;
		$this->db->insert('tb_user', $userdata);
		$pemilik['user_id'] = $this->db->insert_id();
		$this->db->insert('tb_pemilik', $pemilik);
		return $this->db->insert_id();
	}

	function update($data, $id)
	{
		if ($data['password'] == '') {
			$userdata = ['email' => $data['email']];
		}else{
			$userdata = ['email' => $data['email'], 'password' => $data['password']];
		}
		unset($data['email']);
		unset($data['password']);
		$pemilik = $data;

		$trans = $this->db->update('tb_pemilik', $pemilik, ['id_pemilik' => $id]);
		$pemilik_get = $this->db->get_where('tb_pemilik', ['id_pemilik' => $id])->row();
		$trans = $this->db->update('tb_user', $userdata, ['id_user' => $pemilik_get->user_id]);
		return $trans;
	}

	function delete($id)
	{
		$get = $this->db->get_where('tb_pemilik', ['id_pemilik' => $id])->row();
		$this->db->delete('tb_indekos', ['id_pemilik' => $id]);
		$this->db->delete('tb_user', ['id_user' => $get->user_id]);
		$trans = $this->db->delete('tb_pemilik', ['id_pemilik' => $id]);
		return $trans;
	}

	public function count()
	{
		return $this->db->count_all('tb_pemilik');
	}

}

/* End of file Owner.php */
/* Location: ./application/models/Owner.php */