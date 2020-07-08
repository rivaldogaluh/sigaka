<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PenggunaModel extends CI_Model{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function get_user_account($user){
		$query = $this->db->get_where('sigaka_pengguna',$user);
		return $query->row_array();
	}

	public function lihat_pengguna(){
		$this->db->select('*');
		$this->db->from('sigaka_pengguna');
		$this->db->order_by('pengguna_date_created','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_satu_pengguna($id){
		$this->db->select('*');
		$this->db->from('sigaka_pengguna');
		$this->db->where('pengguna_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function hapus_pengguna($id){
		$this->db->where('pengguna_id', $id);
		$this->db->delete('sigaka_pengguna');
		return $this->db->affected_rows();
	}

}
