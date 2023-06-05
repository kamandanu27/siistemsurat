<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangkat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Perangkat_model', 'perangkat');
		$this->load->helper('tgl_indo');
		$this->load->helper('security');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'SISTEM SURAT',
			'judul'			=> 'Data perangkat',
			'data' 			=> $this->perangkat->tabel()->result(),
			'content'		=> 'perangkat/v_content',
			'ajax'	 		=> 'perangkat/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'SISTEM SURAT',
			'judul'			=> 'Tambah Data perangkat',
			'content'		=> 'perangkat/v_add',
			'ajax'	 		=> 'perangkat/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->perangkat->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('perangkat'),'refresh');
		}else{

			$data = array(
				'title'			=> 'SISTEM SURAT',
				'judul'			=> 'Edit Data perangkat',
				'data' 			=> 	$this->perangkat->detail($id)->row_array(),
				'content'		=> 'perangkat/v_edit',
				'ajax'	 		=> 'perangkat/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	}


	public function insert()
	{
		$this->form_validation->set_rules('nama_bagian', 'Nama perangkat', 'required',
		array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{

			$data = array(
				'nama_bagian'     => $this->input->post('nama_bagian'),
				'nama'   			=> $this->input->post('nama')
				
			);

			$q = $this->perangkat->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('perangkat'),'refresh');

		}else{
			
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data belum lengkap');
			redirect(base_url('perangkat/add'),'refresh');
		}

		
	}

	public function update()
	{
		$cek = $this->perangkat->detail($this->input->post('id_bagian'))->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('perangkat'),'refresh');
		}else{

				$this->form_validation->set_rules('id_bagian', 'ID bagian', 'required',
				array( 'required'  => '%s harus diisi!'));

				if ($this->form_validation->run()) 
				{
					$data = array(
						'id_bagian'		=> $this->input->post('id_bagian'),
						'nama_bagian'     => $this->input->post('nama_bagian'),
						'nama'   			=> $this->input->post('nama')

					);
					$this->perangkat->update($data);
			
					$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
					redirect(base_url('perangkat'),'refresh');
				}else{
					$this->session->set_flashdata('warning', '<i class="fa fa-check"></i> Peringatan! Data Belum Lengkap');
					redirect(base_url('perangkat/edit/'.$this->input->post('id')),'refresh');
				}

		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->perangkat->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('perangkat'),'refresh');
		}else{

			$data = array(
				'id_bagian'	=> $id
			);
			
			$this->perangkat->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('perangkat'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */