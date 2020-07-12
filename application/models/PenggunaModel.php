<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PenggunaModel extends CI_Model{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function get_user_account($user){
		$this->db->select('*');
		$this->db->join('sigaka_hak_akses', 'sigaka_hak_akses.hak_akses_id = sigaka_pengguna.hak_akses_id');
		$query = $this->db->get_where('sigaka_pengguna',$user);
		return $query->row_array();

		// $query = $this->db->get_where('sigaka_pengguna',$user);
		// return $query->row_array();
	}

	public function lihat_pengguna(){
		$this->db->select('*');
		$this->db->from('sigaka_pengguna');
		$this->db->join('sigaka_hak_akses', 'sigaka_hak_akses.hak_akses_id = sigaka_pengguna.hak_akses_id');
		$this->db->order_by('pengguna_date_created','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function ambil_hakakses(){
	// 	$this->db->select('*');
	// 	$this->db->from('sigaka_pengguna');
	// 	$this->db->group_by('pengguna_hak_akses');
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

<<<<<<< HEAD


=======
>>>>>>> 6123fa714bcf54e58e5ab4c42f537d7cf5cf5b35
	public function lihat_satu_pengguna($id){
		$this->db->select('*');
		$query = $this->db->get_where('sigaka_pengguna',$id);
		return $query->row_array();

	}

	public function tambah_pengguna($data){
		$this->db->insert('sigaka_pengguna', $data);
		return $this->db->affected_rows();
	}

	public function update_pengguna($id,$data){
		$this->db->where('pengguna_id',$id);
		$this->db->update('sigaka_pengguna',$data);
		return $this->db->affected_rows();
	}

	public function tambah_pengguna($data){
		$this->db->insert('sigaka_pengguna', $data);
		return $this->db->affected_rows();
	}

	public function hapus_pengguna($id){
		$this->db->where('pengguna_id', $id);
		$this->db->delete('sigaka_pengguna');
		return $this->db->affected_rows();
	}

}
