<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

	protected $CI;

	// public function __construct()
	// {
	// 	$this->CI =& get_instance();

	// 	$this->CI->load->model('Users_model','users');
	// }

	// public function login_user($username,$password)
	// {
	// 	$check = $this->CI->users->login($username,$password);
	// 	if ($check)
	// 	{
	// 		if($check->level == 1){
	// 			$data = [
	// 				'id'				=> 1,
	// 				'nama'				=> $check->nama_ibu,
	// 				'level'				=> $check->level,
	// 				'login'				=> true
	// 			];

	// 			$this->CI->session->set_userdata($data);
	// 			redirect(base_url('dashboard'),'refresh');
	// 		}else{
	// 			$data = [
	// 				'id'				=> $check->id,
	// 				'nama'				=> $check->nama,
	// 				'level'				=> $check->level,
	// 				'login'				=> true
	// 			];
	// 			$this->CI->session->set_userdata($data);
	// 			redirect(base_url('dashboardp'),'refresh');
	// 		}
			
			
	// 	}
	// 	else{
	// 		return 0;
	// 	}
	// }


	// public function cek()
	// {
	// 	if ($this->CI->session->userdata('login') == '') {
	// 		redirect(base_url('login'),'refresh');
	// 	}
	// }

	// public function logout()
	// {
	// 	$data = array(
	// 		'id',
	// 		'nama',
	// 		'level',
	// 		'nik',
	// 		'login'
	// 	);
	// 	$this->CI->session->unset_userdata($data);
	// 	$this->CI->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Anda berhasil logout!');
	// 	redirect(base_url('login'),'refresh');
	// }

}