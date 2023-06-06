<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sm_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel($where = null)
	{
		if($where == null){
			$this->db->select('*');
			$this->db->from('sm');
			$this->db->join('akses', 'sm.id_pengguna = akses.id_pengguna');
			$this->db->order_by('sm.id_sm', 'Asc');
			$query = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('sm');
			$this->db->join('akses', 'sm.id_pengguna = akses.id_pengguna');
			$this->db->order_by('sm.id_sm', 'Asc');
			$this->db->where($where);
			$query = $this->db->get();
		}
		
		return $query;
	}

	public function cekpengguna($where)
	{
		$this->db->select('*');
		$this->db->from('sm');
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}


	public function jumlah_pengguna()
    {
        $this->db->select('count(id) as j_pengguna');
		$this->db->from('sm');
		$query = $this->db->get()->row();
		return $query->j_pengguna;
    }

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('sm');
		$this->db->where('id_sm', $id);
		$query = $this->db->get();
		return $query;
	}

	public function cek_username($username)
	{
		$this->db->select('*');
		$this->db->from('sm');
		$this->db->where('email', $username);
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function login($username,$enpass)
	{
		$username = $this->db->escape_str($username);
		$password = $this->db->escape_str($enpass);
		$this->db->select('*');
		$this->db->from('sm');
		$this->db->where(array(
			'sm.email' => $username,
			'sm.password' => sha1($password)
		));
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data)
	{
		$this->db->insert('sm', $data);
	}

	public function update($data)
	{
		$this->db->where('id_sm', $data['id_sm']);
		$this->db->update('sm', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_sm', $data['id_sm']);
		$this->db->delete('sm');
	}



}
