<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asesi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Asesi_model', 'asesi');
		$this->load->helper('tgl_indo');
		$this->load->helper('security');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'LSP',
			'judul'			=> 'Data Asesi',
			'data' 			=> $this->asesi->tabel()->result(),
			'content'		=> 'asesi/v_content',
			'ajax'	 		=> 'asesi/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'LSP',
			'judul'			=> 'Tambah Data Asesi',
			'content'		=> 'asesi/v_add',
			'ajax'	 		=> 'asesi/v_ajax'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->asesi->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data tidak ditemukan');
			redirect(base_url('asesi'),'refresh');
		}else{

			$data = array(
				'title'			=> 'LSP',
				'judul'			=> 'Edit Data Asesi',
				'data' 			=> 	$this->asesi->detail($id)->row_array(),
				'content'		=> 'asesi/v_edit',
				'ajax'	 		=> 'asesi/v_ajax'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}

	}


	public function insert()
	{
		$this->form_validation->set_rules('jeniskelamin_asesi', 'required',
		array( 'required'  => '%s harus diisi!'));

			$image 								= time().'-'.$_FILES["foto_asesi"]['name']; //data post dari form
			$config['upload_path'] 				= './public/image/upload/asesi/'; //lokasi folder foto produk
			$config['allowed_types'] 			= 'gif|jpg|png|jpeg'; //jenis file yang boleh diijinkan
			$config['max_size']  				= '25000'; //maksimal 25Mb
			$config['file_name']  				= $image; //ubah nama file berdasarkan waktu

			$this->load->library('upload', $config); //panggil librarys upload
			$this->upload->do_upload('foto_asesi'); //upload foto produk

			$data = array(
				'nim_asesi'   			=> $this->input->post('nim_asesi'),
				'nik_asesi'   			=> $this->input->post('nik_asesi'),
				'nama_asesi'   			=> $this->input->post('nama_asesi'),
				'alamat_asesi'   			=> $this->input->post('alamat_asesi'),
				'notlp_asesi'   			=> $this->input->post('notlp_asesi'),
				'jeniskelamin_asesi'     => $this->input->post('jeniskelamin_asesi'),
				'agama_asesi'   			=> $this->input->post('agama_asesi'),
				'tempatlahir_asesi'   			=> $this->input->post('tempatlahir_asesi'),
				'tanggallahir_asesi'   			=> $this->input->post('tanggallahir_asesi'),
				'provinsi_asesi'   			=> $this->input->post('provinsi_asesi'),
				'kotakab_asesi'   			=> $this->input->post('kotakab_asesi'),
				'tahunmasuk_asesi'   			=> $this->input->post('tahunmasuk_asesi'),
				'tahunlulus_asesi'   			=> $this->input->post('tahunlulus_asesi'),
				'jurusan_asesi'   			=> $this->input->post('jurusan_asesi'),
				'foto_asesi'		=> $image
			);

			$q = $this->asesi->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('asesi'),'refresh');

		
		
	}

	public function update()
	{
		$cek = $this->asesi->detail($this->input->post('id_asesi'))->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('asesi'),'refresh');
		}else{

				$this->form_validation->set_rules('id_asesi', 'ID asesi', 'required',
				array( 'required'  => '%s harus diisi!'));

				if($_FILES["foto_asesi"]['name'] == ""){ //jika tidak ada upload foto

					$data = array(
						'id_asesi'				=> $this->input->post('id_asesi'),
						'nim_asesi'   			=> $this->input->post('nim_asesi'),
						'nik_asesi'   			=> $this->input->post('nik_asesi'),
						'nama_asesi'   			=> $this->input->post('nama_asesi'),
						'alamat_asesi'   			=> $this->input->post('alamat_asesi'),
						'notlp_asesi'   			=> $this->input->post('notlp_asesi'),
						'jeniskelamin_asesi'     => $this->input->post('jeniskelamin_asesi'),
						'agama_asesi'   			=> $this->input->post('agama_asesi'),
						'tempatlahir_asesi'   			=> $this->input->post('tempatlahir_asesi'),
						'tanggallahir_asesi'   			=> $this->input->post('tanggallahir_asesi'),
						'provinsi_asesi'   			=> $this->input->post('provinsi_asesi'),
						'kotakab_asesi'   			=> $this->input->post('kotakab_asesi'),
						'tahunmasuk_asesi'   			=> $this->input->post('tahunmasuk_asesi'),
						'tahunlulus_asesi'   			=> $this->input->post('tahunlulus_asesi'),
						'jurusan_asesi'   			=> $this->input->post('jurusan_asesi')
						);

						$q = $this->asesi->update($data);

				}else{//jika ada upload foto

					$image 								= time().'-'.$_FILES["foto_asesi"]['name']; //data post dari form
					$config['upload_path'] 				= './public/image/upload/asesi/'; //lokasi folder foto produk
					$config['allowed_types'] 			= 'gif|jpg|png|jpeg'; //jenis file yang boleh diijinkan
					$config['max_size']  				= '25000'; //maksimal 25Mb
					$config['file_name']  				= $image; //ubah nama file berdasarkan waktu

					$this->load->library('upload', $config); //panggil librarys upload
					$this->upload->do_upload('foto_asesi'); //upload foto produk

						$data = array(
							'id_asesi'				=> $this->input->post('id_asesi'),
							'nim_asesi'   			=> $this->input->post('nim_asesi'),
							'nik_asesi'   			=> $this->input->post('nik_asesi'),
							'nama_asesi'   			=> $this->input->post('nama_asesi'),
							'alamat_asesi'   			=> $this->input->post('alamat_asesi'),
							'notlp_asesi'   			=> $this->input->post('notlp_asesi'),
							'jeniskelamin_asesi'     => $this->input->post('jeniskelamin_asesi'),
							'agama_asesi'   			=> $this->input->post('agama_asesi'),
							'tempatlahir_asesi'   			=> $this->input->post('tempatlahir_asesi'),
							'tanggallahir_asesi'   			=> $this->input->post('tanggallahir_asesi'),
							'provinsi_asesi'   			=> $this->input->post('provinsi_asesi'),
							'kotakab_asesi'   			=> $this->input->post('kotakab_asesi'),
							'tahunmasuk_asesi'   			=> $this->input->post('tahunmasuk_asesi'),
							'tahunlulus_asesi'   			=> $this->input->post('tahunlulus_asesi'),
							'jurusan_asesi'   			=> $this->input->post('jurusan_asesi'),
							'foto_asesi'		=> $image

						);
						
						$q = $this->asesi->update($data);
			
					$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dirubah');
					$this->asesi->update($data);
					redirect(base_url('asesi'),'refresh');
				}
			}
	}

	public function delete($id)
	{
		$cek = $this->asesi->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('error', '<i class="fa fa-warning"></i> Peringatan! Data Tidak Ditemukan');
			redirect(base_url('asesi'),'refresh');
		}else{

			$data = array(
				'id_asesi'	=> $id
			);
			
			$this->asesi->delete($data);
			
			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat! Data Berhasil Dihapus');
			redirect(base_url('asesi'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/asesi/Guru.php */