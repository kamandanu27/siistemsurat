<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel($where = null)
	{
		if($where == null){
			$this->db->select('*');
			$this->db->from('sk');
			$this->db->join('klasifikasi', 'sk.kode_klasifikasi = klasifikasi.kode_klasifikasi');
			$this->db->join('akses', 'sk.id_pengguna = akses.id_pengguna');
			$this->db->order_by('sk.id_sk', 'Asc');
			$query = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('sk');
			$this->db->join('klasifikasi', 'sk.kode_klasifikasi = klasifikasi.kode_klasifikasi');
			$this->db->join('akses', 'sk.id_pengguna = akses.id_pengguna');
			$this->db->order_by('sk.id_sk', 'Asc');
			$this->db->where($where);
			$query = $this->db->get();
		}
		
		return $query;
	}

	public function cekpengguna($where)
	{
		$this->db->select('*');
		$this->db->from('sk');
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}


	public function jumlah_pengguna()
    {
        $this->db->select('count(id) as j_pengguna');
		$this->db->from('sk');
		$query = $this->db->get()->row();
		return $query->j_pengguna;
    }

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('sk');
		$this->db->where('id_sk', $id);
		$query = $this->db->get();
		return $query;
	}

	public function cek_username($username)
	{
		$this->db->select('*');
		$this->db->from('sk');
		$this->db->where('email', $username);
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function login($username,$enpass)
	{
		$username = $this->db->escape_str($username);
		$password = $this->db->escape_str($enpass);
		$this->db->select('*');
		$this->db->from('sk');
		$this->db->where(array(
			'sk.email' => $username,
			'sk.password' => sha1($password)
		));
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data)
	{
		$this->db->insert('sk', $data);
	}

	public function update($data)
	{
		$this->db->where('id_sk', $data['id_sk']);
		$this->db->update('sk', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_sk', $data['id_sk']);
		$this->db->delete('sk');
	}



}
