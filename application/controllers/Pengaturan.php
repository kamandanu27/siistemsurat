<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaturan_model', 'pengaturan');
		$this->load->model('Admin_model', 'admin');
		$this->load->helper('tgl_indo');
		$this->load->helper('security');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'LSP',
			'judul'			=> 'Data Pengaturan',
			'data' 			=> $this->pengaturan->tabel()->result(),
			'content'		=> 'pengaturan/v_content',
			'ajax'	 		=> 'pengaturan/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'list_admin' 	=> $this->admin->tabel()->result(),
			'title'			=> 'LSP',
			'judul'			=> 'Tambah Data Pengaturan',
			'content'		=> 'pengaturan/v_add',
			'ajax'	 		=> 'pengaturan/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->pengaturan->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('pengaturan'),'refresh');
		}else{

			$data = array(
				'list_admin' 	=> $this->admin->tabel()->result(),
				'title'			=> 'LSP',
				'judul'			=> 'Edit Data Pengaturan',
				'data' 			=> 	$this->pengaturan->detail($id)->row_array(),
				'content'		=> 'pengaturan/v_edit',
				'ajax'	 		=> 'pengaturan/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	}


	public function insert()
	{
		$this->form_validation->set_rules('visi', 'required',
		array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{

			$data = array(
				'visi'     => $this->input->post('visi'),
				'misi'   			=> $this->input->post('misi'),
				'struktur_organisasi'   		=> $this->input->post('struktur_organisasi'),
				'kontak'   			=> $this->input->post('kontak'),
				'id_admin'   			=> $this->input->post('id_admin')
			);

			$q = $this->pengaturan->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('pengaturan'),'refresh');

		}

		
	}

	public function update()
	{
		$cek = $this->pengaturan->detail($this->input->post('id_pengaturan'))->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('pengaturan'),'refresh');
		}else{

				$this->form_validation->set_rules('id_pengaturan', 'ID pengaturan', 'required',
				array( 'required'  => '%s harus diisi!'));

				if ($this->form_validation->run()) 
				{
					$data = array(
						'id_pengaturan'		=> $this->input->post('id_pengaturan'),
						'visi'     => $this->input->post('visi'),
						'misi'   			=> $this->input->post('misi'),
						'struktur_organisasi'   		=> $this->input->post('struktur_organisasi'),
						'kontak'   			=> $this->input->post('kontak'),
						'id_admin'   			=> $this->input->post('id_admin')
					);
					$this->pengaturan->update($data);
			
					$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
					redirect(base_url('pengaturan'),'refresh');
				}else{
					$this->session->set_flashdata('warning', '<i class="fa fa-check"></i> Peringatan! Data Belum Lengkap');
					redirect(base_url('pengaturan/edit/'.$this->input->post('id')),'refresh');
				}

		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->pengaturan->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('pengaturan'),'refresh');
		}else{

			$data = array(
				'id_pengaturan'	=> $id
			);
			
			$this->pengaturan->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('pengaturan'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/pengaturan/Guru.php */