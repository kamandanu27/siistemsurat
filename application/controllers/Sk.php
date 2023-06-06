<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sk_model', 'sk');
		$this->load->model('Klasifikasi_model', 'klasifikasi');
		$this->load->model('Akses_model', 'akses');
		$this->load->helper('tgl_indo');
		$this->load->helper('security');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'SISTEM SURAT',
			'judul'			=> 'Data sk',
			'data' 			=> $this->sk->tabel()->result(),
			'content'		=> 'sk/v_content',
			'ajax'	 		=> 'sk/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'list_klasifikasi' 	=> $this->klasifikasi->tabel()->result(),
			'list_akses' 	=> $this->akses->tabel()->result(),
			'title'			=> 'SISTEM SURAT',
			'judul'			=> 'Tambah Data sk',
			'content'		=> 'sk/v_add',
			'ajax'	 		=> 'sk/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->sk->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('sk'),'refresh');
		}else{

			$data = array(
				'list_klasifikasi' 	=> $this->klasifikasi->tabel()->result(),
				'list_akses' 	=> $this->akses->tabel()->result(),
				'title'			=> 'SISTEM SURAT',
				'judul'			=> 'Edit Data sk',
				'data' 			=> 	$this->sk->detail($id)->row_array(),
				'content'		=> 'sk/v_edit',
				'ajax'	 		=> 'sk/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	}


	public function insert()
	{
		$this->form_validation->set_rules('sk', 'required',
		array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{

			$data = array(
				'no_surat'     => $this->input->post('no_surat'),
				'kode_klasifikasi'   			=> $this->input->post('kode_klasifikasi'),
				'isi_ringkasan'   			=> $this->input->post('isi_ringkasan'),
				'penerima'    		=> $this->input->post('penerima'),
				'tglsurat'   		=> $this->input->post('tglsurat'),
				'tglcatat'       		=> $this->input->post('tglcatat'),
				'sifat'       		=> $this->input->post('sifat'),
				'keterangan'       		=> $this->input->post('keterangan'),
				'file'       		=> $this->input->post('file'),
				'id_pengguna'   		=> $this->input->post('id_pengguna')
			);

			$q = $this->sk->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('sk'),'refresh');

		}else{
			
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data belum lengkap');
			redirect(base_url('sk/add'),'refresh');
		}

		
	}

	public function update()
	{
		$cek = $this->sk->detail($this->input->post('id_sk'))->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('sk'),'refresh');
		}else{

			$data = array(
				'id_sk'			=> $this->input->post('id_sk'),
				'no_surat'     => $this->input->post('no_surat'),
				'kode_klasifikasi'   			=> $this->input->post('kode_klasifikasi'),
				'isi_ringkasan'   			=> $this->input->post('isi_ringkasan'),
				'penerima'    		=> $this->input->post('penerima'),
				'tglsurat'   		=> $this->input->post('tglsurat'),
				'tglcatat'       		=> $this->input->post('tglcatat'),
				'sifat'       		=> $this->input->post('sifat'),
				'keterangan'       		=> $this->input->post('keterangan'),
				'file'       		=> $this->input->post('file'),
				'id_pengguna'   		=> $this->input->post('id_pengguna')
			);
			$this->sk->update($data);
	
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
			redirect(base_url('sk'),'refresh');


		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->sk->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('sk'),'refresh');
		}else{

			$data = array(
				'id_sk'	=> $id
			);
			
			$this->sk->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('sk'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */