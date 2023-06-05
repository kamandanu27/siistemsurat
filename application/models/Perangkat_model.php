<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangkat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel($where = null)
	{
		if($where == null){
			$this->db->select('*');
			$this->db->from('perangkat');
			$this->db->order_by('perangkat.id_bagian', 'Asc');
			$query = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('perangkat');
			$this->db->order_by('perangkat.id_bagian', 'Asc');
			$this->db->where($where);
			$query = $this->db->get();
		}
		
		return $query;
	}

	public function cekpengguna($where)
	{
		$this->db->select('*');
		$this->db->from('perangkat');
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}


	public function jumlah_pengguna()
    {
        $this->db->select('count(id) as j_pengguna');
		$this->db->from('perangkat');
		$query = $this->db->get()->row();
		return $query->j_pengguna;
    }

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('perangkat');
		$this->db->where('id_bagian', $id);
		$query = $this->db->get();
		return $query;
	}

	public function cek_username($username)
	{
		$this->db->select('*');
		$this->db->from('perangkat');
		$this->db->where('email', $username);
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function login($username,$enpass)
	{
		$username = $this->db->escape_str($username);
		$password = $this->db->escape_str($enpass);
		$this->db->select('*');
		$this->db->from('perangkat');
		$this->db->where(array(
			'perangkat.email' => $username,
			'perangkat.password' => sha1($password)
		));
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data)
	{
		$this->db->insert('perangkat', $data);
	}

	public function update($data)
	{
		$this->db->where('id_bagian', $data['id_bagian']);
		$this->db->update('perangkat', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_bagian', $data['id_bagian']);
		$this->db->delete('perangkat');
	}



}
