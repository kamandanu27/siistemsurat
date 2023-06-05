<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class klasifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('klasifikasi_model', 'klasifikasi');
		$this->load->helper('tgl_indo');
		$this->load->helper('security');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'SISTEM SURAT',
			'judul'			=> 'Data klasifikasi',
			'data' 			=> $this->klasifikasi->tabel()->result(),
			'content'		=> 'klasifikasi/v_content',
			'ajax'	 		=> 'klasifikasi/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'SISTEM SURAT',
			'judul'			=> 'Tambah Data klasifikasi',
			'content'		=> 'klasifikasi/v_add',
			'ajax'	 		=> 'klasifikasi/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->klasifikasi->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('klasifikasi'),'refresh');
		}else{

			$data = array(
				'title'			=> 'SISTEM SURAT',
				'judul'			=> 'Edit Data klasifikasi',
				'data' 			=> 	$this->klasifikasi->detail($id)->row_array(),
				'content'		=> 'klasifikasi/v_edit',
				'ajax'	 		=> 'klasifikasi/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	}


	public function insert()
	{
		$this->form_validation->set_rules('klasifikasi', 'uraian', 'required',
		array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{

			$data = array(
				'klasifikasi'     => $this->input->post('klasifikasi'),
				'uraian'   			=> $this->input->post('uraian')
				
			);

			$q = $this->klasifikasi->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('klasifikasi'),'refresh');

		}else{
			
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data belum lengkap');
			redirect(base_url('klasifikasi/add'),'refresh');
		}

		
	}

	public function update()
	{
		$cek = $this->klasifikasi->detail($this->input->post('kode_klasifikasi'))->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('klasifikasi'),'refresh');
		}else{

				$this->form_validation->set_rules('klasifikasi', 'kode_klasifikasi', 'required',
				array( 'required'  => '%s harus diisi!'));

				if ($this->form_validation->run()) 
				{
					$data = array(
						'kode_klasifikasi'		=> $this->input->post('kode_klasifikasi'),
						'klasifikasi'     => $this->input->post('klasifikasi'),
						'uraian'   			=> $this->input->post('uraian')
						
					);
					$this->klasifikasi->update($data);
			
					$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
					redirect(base_url('klasifikasi'),'refresh');
				}else{
					$this->session->set_flashdata('warning', '<i class="fa fa-check"></i> Peringatan! Data Belum Lengkap');
					redirect(base_url('klasifikasi/edit/'.$this->input->post('id')),'refresh');
				}

		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->klasifikasi->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('klasifikasi'),'refresh');
		}else{

			$data = array(
				'kode_klasifikasi'	=> $id
			);
			
			$this->klasifikasi->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('klasifikasi'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */