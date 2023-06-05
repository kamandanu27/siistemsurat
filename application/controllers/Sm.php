<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sm_model', 'sm');
		$this->load->model('Akses_model', 'akses');
		$this->load->helper('tgl_indo');
		$this->load->helper('security');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'SISTEM SURAT',
			'judul'			=> 'Data sm',
			'data' 			=> $this->sm->tabel()->result(),
			'content'		=> 'sm/v_content',
			'ajax'	 		=> 'sm/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'list_akses' 	=> $this->akses->tabel()->result(),
			'title'			=> 'SISTEM SURAT',
			'judul'			=> 'Tambah Data sm',
			'content'		=> 'sm/v_add',
			'ajax'	 		=> 'sm/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->sm->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('sm'),'refresh');
		}else{

			$data = array(
				'list_akses' 	=> $this->akses->tabel()->result(),
				'title'			=> 'SISTEM SURAT',
				'judul'			=> 'Edit Data sm',
				'data' 			=> 	$this->sm->detail($id)->row_array(),
				'content'		=> 'sm/v_edit',
				'ajax'	 		=> 'sm/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	}


	public function insert()
	{
		$this->form_validation->set_rules('nosurat', 'Nama sm', 'required',
		array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{

			$data = array(
				'nosurat'     => $this->input->post('nosurat'),
				'pengirim'   			=> $this->input->post('pengirim'),
				'isi' 				=> $this->input->post('isi'),
				'sifat'   			=> $this->input->post('sifat'),
				'tglsurat'    		=> $this->input->post('tglsurat'),
				'tglterima'   		=> $this->input->post('tglterima'),
				'status'       		=> $this->input->post('status'),
				'keterangan'   		=> $this->input->post('keterangan'),
				'file'   		=> $this->input->post('file'),
				'id_pengguna'   		=> $this->input->post('id_pengguna')
			);

			$q = $this->sm->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('sm'),'refresh');

		}else{
			
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data belum lengkap');
			redirect(base_url('sm/add'),'refresh');
		}

		
	}

	public function update()
	{
		$cek = $this->sm->detail($this->input->post('id_sm'))->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('sm'),'refresh');
		}else{

				$this->form_validation->set_rules('id_sm', 'ID sm', 'required',
				array( 'required'  => '%s harus diisi!'));

				if ($this->form_validation->run()) 
				{
					$data = array(
						'id_sm'		=> $this->input->post('id_sm'),
						'nosurat'     => $this->input->post('nosurat'),
						'pengirim'   			=> $this->input->post('pengirim'),
						'isi' 				=> $this->input->post('isi'),
						'sifat'   			=> $this->input->post('sifat'),
						'tglsurat'    		=> $this->input->post('tglsurat'),
						'tglterima'   		=> $this->input->post('tglterima'),
						'status'       		=> $this->input->post('status'),
						'keterangan'   		=> $this->input->post('keterangan'),
						'file'   		=> $this->input->post('file'),
						'id_pengguna'   		=> $this->input->post('id_pengguna')
					);
					$this->sm->update($data);
			
					$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
					redirect(base_url('sm'),'refresh');
				}else{
					$this->session->set_flashdata('warning', '<i class="fa fa-check"></i> Peringatan! Data Belum Lengkap');
					redirect(base_url('sm/edit/'.$this->input->post('id')),'refresh');
				}

		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->sm->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('sm'),'refresh');
		}else{

			$data = array(
				'id_sm'	=> $id
			);
			
			$this->sm->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('sm'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */