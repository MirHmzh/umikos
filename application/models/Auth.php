<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Model {

	function login($data)
	{
		$trans = $this->db->get('tb_user', $data)->row();
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
		$this->db->insert('tb_pemilik', $owner_data);
	}

}

/* End of file Auth.php */
/* Location: ./application/models/Auth.php */