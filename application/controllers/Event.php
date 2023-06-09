<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Event_model', 'event');
		$this->load->helper('tgl_indo');
		$this->load->helper('security');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'LSP',
			'judul'			=> 'Data Event',
			'data' 			=> $this->event->tabel()->result(),
			'content'		=> 'event/v_content',
			'ajax'	 		=> 'event/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'LSP',
			'judul'			=> 'Tambah Data Event',
			'content'		=> 'event/v_add',
			'ajax'	 		=> 'event/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->event->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('event'),'refresh');
		}else{

			$data = array(
				'title'			=> 'LSP',
				'judul'			=> 'Edit Data Event',
				'data' 			=> 	$this->event->detail($id)->row_array(),
				'content'		=> 'event/v_edit',
				'ajax'	 		=> 'event/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	}


	public function insert()
	{
		$this->form_validation->set_rules('nama_event', 'Nama event', 'required',
		array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{

			$data = array(
				'nama_event'     => $this->input->post('nama_event'),
				'tanggal_event'   			=> $this->input->post('tanggal_event'),
				'jam_event'   		=> $this->input->post('jam_event')
			);

			$q = $this->event->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('event'),'refresh');

		}else{
			
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data belum lengkap');
			redirect(base_url('event/add'),'refresh');
		}

		
	}

	public function update()
	{
		$cek = $this->event->detail($this->input->post('id_event'))->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('event'),'refresh');
		}else{

				$this->form_validation->set_rules('id_event', 'ID event', 'required',
				array( 'required'  => '%s harus diisi!'));

				if ($this->form_validation->run()) 
				{
					$data = array(
						'id_event'		=> $this->input->post('id_event'),
						'nama_event'     => $this->input->post('nama_event'),
						'tanggal_event'   			=> $this->input->post('tanggal_event'),
						'jam_event'   		=> $this->input->post('jam_event')
					);
					$this->event->update($data);
			
					$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
					redirect(base_url('event'),'refresh');
				}else{
					$this->session->set_flashdata('warning', '<i class="fa fa-check"></i> Peringatan! Data Belum Lengkap');
					redirect(base_url('event/edit/'.$this->input->post('id')),'refresh');
				}

		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->event->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('event'),'refresh');
		}else{

			$data = array(
				'id_event'	=> $id
			);
			
			$this->event->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('event'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/event/Guru.php */