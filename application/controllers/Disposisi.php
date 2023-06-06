<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Disposisi_model', 'disposisi');
		$this->load->model('Sm_model', 'sm');
		$this->load->model('Perangkat_model', 'perangkat');
		$this->load->helper('tgl_indo');
		$this->load->helper('security');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'SISTEM SURAT',
			'judul'			=> 'Data disposisi',
			'data' 			=> $this->disposisi->tabel()->result(),
			'content'		=> 'disposisi/v_content',
			'ajax'	 		=> 'disposisi/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'list_sm' 	=> $this->sm->tabel()->result(),
			'list_perangkat' 	=> $this->perangkat->tabel()->result(),
			'title'			=> 'SISTEM SURAT',
			'judul'			=> 'Tambah Data disposisi',
			'content'		=> 'disposisi/v_add',
			'ajax'	 		=> 'disposisi/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->disposisi->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('disposisi'),'refresh');
		}else{

			$data = array(
				'list_sm' 	=> $this->sm->tabel()->result(),
				'list_perangkat' 	=> $this->perangkat->tabel()->result(),
				'title'			=> 'SISTEM SURAT',
				'judul'			=> 'Edit Data disposisi',
				'data' 			=> 	$this->disposisi->detail($id)->row_array(),
				'content'		=> 'disposisi/v_edit',
				'ajax'	 		=> 'disposisi/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	}


	public function insert()
	{
		$this->form_validation->set_rules('disposisi', 'required',
		array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{

			$data = array(
				'id_sm'     => $this->input->post('id_sm'),
				'isi_disposisi'   			=> $this->input->post('isi_disposisi'),
				'sifat'   			=> $this->input->post('sifat'),
				'tgldisposisi'    		=> $this->input->post('tgldisposisi'),
				'bataswaktu'   		=> $this->input->post('bataswaktu'),
				'status'       		=> $this->input->post('status'),
				'id_bagian'   		=> $this->input->post('id_bagian')
			);

			$q = $this->disposisi->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('disposisi'),'refresh');

		}else{
			
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data belum lengkap');
			redirect(base_url('disposisi/add'),'refresh');
		}

		
	}

	public function update()
	{
		$cek = $this->disposisi->detail($this->input->post('id_disposisi'))->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('disposisi'),'refresh');
		}else{

			$data = array(
				'id_disposisi'			=> $this->input->post('id_disposisi'),
				'id_sm'     => $this->input->post('id_sm'),
				'isi_disposisi'   			=> $this->input->post('isi_disposisi'),
				'sifat'   			=> $this->input->post('sifat'),
				'tgldisposisi'    		=> $this->input->post('tgldisposisi'),
				'bataswaktu'   		=> $this->input->post('bataswaktu'),
				'status'       		=> $this->input->post('status'),
				'id_bagian'   		=> $this->input->post('id_bagian')
			);
			$this->disposisi->update($data);
	
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
			redirect(base_url('disposisi'),'refresh');


		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->disposisi->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('disposisi'),'refresh');
		}else{

			$data = array(
				'id_disposisi'	=> $id
			);
			
			$this->disposisi->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('disposisi'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */