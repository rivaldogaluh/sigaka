<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PenggunaController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
		$model = array('PenggunaModel');
		$helper = array('tgl_indo_helper');
		$this->load->model($model);
		$this->load->helper($helper);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
    }

    public function index(){
    	$data = array(
    		'pengguna' => $this->PenggunaModel->lihat_pengguna(),
			'title' => 'Pengguna'
		);
		$data['user'] = $this->db->get_where('sigaka_pengguna', ['pengguna_username' =>
        $this->session->userdata('session_username')])->row_array();
        
        $data['hakakses'] = $this->db->get('sigaka_pengguna')->result_array();
		$this->load->view('templates/header',$data);
		$this->load->view('backend/pengguna/index',$data);
		$this->load->view('templates/footer');
	}

	public function tambah(){
    	if (isset($_POST['simpan'])){

	    	$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		    $this->form_validation->set_rules('username', 'Username', 'required|trim');
	        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
	            'matches' => 'Password dont match!',
	            'min_length' => 'Password too short!'
	        ]);
	        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

	        if ($this->form_validation->run() == false) {
	            $data = array(
		    		'pengguna' => $this->PenggunaModel->lihat_pengguna(),
					'title' => 'Pengguna'
				);
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambahkan User Baru!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	            redirect('pengguna');
				$this->load->view('templates/header',$data);
				$this->load->view('backend/pengguna/index',$data);
				$this->load->view('templates/footer');

	        } else {
				
				$username = $this->input->post('username');
				$nama = $this->input->post('nama');
				$password = $this->input->post('password1');
				$hakakses = $this->input->post('pengguna_hak_akses');
				//$tanggalGabung = $this->input->post('tanggal_gabung');

				$data = array(
					'pengguna_username' => htmlspecialchars($username),
					'pengguna_nama' => htmlspecialchars($nama),
					'pengguna_foto' => 'default.jpg',
					'pengguna_password' => md5($password),
					'pengguna_hak_akses' => $hakakses,
					'pengguna_date_created' => time()
				);
				$save = $this->PenggunaModel->tambah_pengguna($data);
				if ($save>0){
					$this->session->set_flashdata('alert', 'tambah_karyawan');
					redirect('pengguna');
				}
				else{
					redirect('pengguna');
				}
	        }
		}
	}

	public function lihat($id){
		$data = $this->PenggunaModel->lihat_satu_pengguna($id);
		echo json_encode($data);
	}

	/*public function update(){
		if (isset($_POST['update'])){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$tempatLahir = $this->input->post('tempat_lahir');
			$tanggalLahir = $this->input->post('tanggal_lahir');
			$alamat = $this->input->post('alamat');
			$tanggalGabung = $this->input->post('tanggal_gabung');
			$gajiId = $this->input->post('jabatan');
			$nomorHp = $this->input->post('nomor_hp');
			$nomorRek = $this->input->post('nomor_rekening');
			$data = array(
				'karyawan_nama' => $nama,
				'karyawan_tempat_lahir' => $tempatLahir,
				'karyawan_tanggal_lahir' => $tanggalLahir,
				'karyawan_alamat' => $alamat,
				'karyawan_tanggal_gabung' => $tanggalGabung,
				'karyawan_nomor_hp' => $nomorHp,
				'karyawan_no_rekening' => $nomorRek,
				'karyawan_jabatan_id' => $gajiId
			);
			$save = $this->KaryawanModel->update_karyawan($id,$data);
			if ($save>0){
				$this->session->set_flashdata('alert', 'update_karyawan');
				redirect('karyawan');
			}
			else{
				redirect('karyawan');
			}
		}
	}*/

	public function hapus($id){
		$hapus = $this->PenggunaModel->hapus_pengguna($id);
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'hapus pengguna');
			redirect('pengguna');
		}else{
			redirect('pengguna');
		}
	}

	public function ajaxIndex(){
		echo json_encode($this->PenggunaModel->lihat_satu_pengguna());
	}

}
