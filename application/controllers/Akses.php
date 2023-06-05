<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Akses_model', 'akses');
		$this->load->helper('tgl_indo');
		$this->load->helper('security');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'SISTEM SURAT',
			'judul'			=> 'Data akses',
			'data' 			=> $this->akses->tabel()->result(),
			'content'		=> 'akses/v_content',
			'ajax'	 		=> 'akses/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'SISTEM SURAT',
			'judul'			=> 'Tambah Data akses',
			'content'		=> 'akses/v_add',
			'ajax'	 		=> 'akses/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->akses->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('akses'),'refresh');
		}else{

			$data = array(
				'title'			=> 'SISTEM SURAT',
				'judul'			=> 'Edit Data akses',
				'data' 			=> 	$this->akses->detail($id)->row_array(),
				'content'		=> 'akses/v_edit',
				'ajax'	 		=> 'akses/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	}


	public function insert()
	{
		$this->form_validation->set_rules('nama_pengguna', 'Nama akses', 'required',
		array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{

			$data = array(
				'nama_pengguna'     => $this->input->post('nama_pengguna'),
				'alamat'   			=> $this->input->post('alamat'),
				'telp' 				=> $this->input->post('telp'),
				'email'   			=> $this->input->post('email'),
				'username'    		=> $this->input->post('username'),
				'password'   		=> $this->input->post('password'),
				'level'       		=> $this->input->post('level')
			);

			$q = $this->akses->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('akses'),'refresh');

		}else{
			
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data belum lengkap');
			redirect(base_url('akses/add'),'refresh');
		}

		
	}

	public function update()
	{
		$cek = $this->akses->detail($this->input->post('id_pengguna'))->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('akses'),'refresh');
		}else{

				$this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required',
				array( 'required'  => '%s harus diisi!'));

				if ($this->form_validation->run()) 
				{
					$data = array(
						'id_pengguna'		=> $this->input->post('id_pengguna'),
						'nama_pengguna'     => $this->input->post('nama_pengguna'),
						'alamat'   			=> $this->input->post('alamat'),
						'telp' 				=> $this->input->post('telp'),
						'email'   			=> $this->input->post('email'),
						'username'    		=> $this->input->post('username'),
						'password'   		=> $this->input->post('password'),
						'level'       		=> $this->input->post('level')
					);
					$this->akses->update($data);
			
					$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
					redirect(base_url('akses'),'refresh');
				}else{
					$this->session->set_flashdata('warning', '<i class="fa fa-check"></i> Peringatan! Data Belum Lengkap');
					redirect(base_url('akses/edit/'.$this->input->post('id')),'refresh');
				}

		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->akses->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('akses'),'refresh');
		}else{

			$data = array(
				'id_pengguna'	=> $id
			);
			
			$this->akses->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('akses'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */