<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthM extends CI_Model {

	function login($data)
	{
		$this->db->join('tb_pemilik', 'tb_pemilik.user_id = tb_user.id_user', 'left');
		$trans = $this->db->get_where('tb_user', $data)->row();
		return $trans;
	}

	function register($data)
	{
		$user_data = [
			'email' => $data['email'],
			'password' => $data['password'],
		];
		$user_trans = $this->db->insert('tb_user', $user_data);
		$user_id = $this->db->insert_id();

		$owner_data = [
			'nama_pemilik' => $data['nama_pemilik'],
			'notelp_pemilik' => $data['notelp_pemilik'],
			'alamat_pemilik' => $data['alamat_pemilik'],
			'user_id' => $user_id
		];
		$trans = $this->db->insert('tb_pemilik', $owner_data);
		return $this->db->insert_id();
	}

	function update($data, $id)
	{
		return $this->db->update('tb_user', $data, ['id_user' => $id]);
	}

}

/* End of file Auth.php */
/* Location: ./application/models/Auth.php */