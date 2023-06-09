<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skema extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Skema_model', 'skema');
		$this->load->helper('tgl_indo');
		$this->load->helper('security');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'LSP',
			'judul'			=> 'Data Skema',
			'data' 			=> $this->skema->tabel()->result(),
			'content'		=> 'skema/v_content',
			'ajax'	 		=> 'skema/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'LSP',
			'judul'			=> 'Tambah Data Skema',
			'content'		=> 'skema/v_add',
			'ajax'	 		=> 'skema/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->skema->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('skema'),'refresh');
		}else{

			$data = array(
				'title'			=> 'LSP',
				'judul'			=> 'Edit Data Skema',
				'data' 			=> 	$this->skema->detail($id)->row_array(),
				'content'		=> 'skema/v_edit',
				'ajax'	 		=> 'skema/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	}


	public function insert()
	{
		$this->form_validation->set_rules('kode_skema', 'Kode skema', 'required',
		array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{

			$data = array(
				'kode_skema'     => $this->input->post('kode_skema'),
				'nama_skema'     => $this->input->post('nama_skema'),
				'apl01'   			=> $this->input->post('apl01'),
				'apl02'   		=> $this->input->post('apl02')
			);

			$q = $this->skema->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('skema'),'refresh');

		}else{
			
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data belum lengkap');
			redirect(base_url('skema/add'),'refresh');
		}

		
	}

	public function update()
	{
		$cek = $this->skema->detail($this->input->post('id_skema'))->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('skema'),'refresh');
		}else{

				$this->form_validation->set_rules('id_skema', 'ID skema', 'required',
				array( 'required'  => '%s harus diisi!'));

				if ($this->form_validation->run()) 
				{
					$data = array(
						'id_skema'		=> $this->input->post('id_skema'),
						'kode_skema'     => $this->input->post('kode_skema'),
						'nama_skema'     => $this->input->post('nama_skema'),
						'apl01'   			=> $this->input->post('apl01'),
						'apl02'   		=> $this->input->post('apl02')
					);
					$this->skema->update($data);
			
					$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
					redirect(base_url('skema'),'refresh');
				}else{
					$this->session->set_flashdata('warning', '<i class="fa fa-check"></i> Peringatan! Data Belum Lengkap');
					redirect(base_url('skema/edit/'.$this->input->post('id')),'refresh');
				}

		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->skema->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('skema'),'refresh');
		}else{

			$data = array(
				'id_skema'	=> $id
			);
			
			$this->skema->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('skema'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/skema/Guru.php */