<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel($where = null)
	{
		if($where == null){
			$this->db->select('*');
			$this->db->from('disposisi');
			$this->db->join('sm', 'disposisi.id_sm = sm.id_sm');
			$this->db->join('perangkat', 'disposisi.id_bagian = perangkat.id_bagian');
			$this->db->order_by('disposisi.id_disposisi', 'Asc');
			$query = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('disposisi');
			$this->db->join('sm', 'disposisi.id_sm = sm.id_sm');
			$this->db->join('perangkat', 'disposisi.id_bagian = perangkat.id_bagian');
			$this->db->order_by('disposisi.id_disposisi', 'Asc');
			$this->db->where($where);
			$query = $this->db->get();
		}
		
		return $query;
	}

	public function cekpengguna($where)
	{
		$this->db->select('*');
		$this->db->from('disposisi');
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}


	public function jumlah_pengguna()
    {
        $this->db->select('count(id) as j_pengguna');
		$this->db->from('disposisi');
		$query = $this->db->get()->row();
		return $query->j_pengguna;
    }

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('disposisi');
		$this->db->where('id_disposisi', $id);
		$query = $this->db->get();
		return $query;
	}

	public function cek_username($username)
	{
		$this->db->select('*');
		$this->db->from('disposisi');
		$this->db->where('email', $username);
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function login($username,$enpass)
	{
		$username = $this->db->escape_str($username);
		$password = $this->db->escape_str($enpass);
		$this->db->select('*');
		$this->db->from('disposisi');
		$this->db->where(array(
			'disposisi.email' => $username,
			'disposisi.password' => sha1($password)
		));
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data)
	{
		$this->db->insert('disposisi', $data);
	}

	public function update($data)
	{
		$this->db->where('id_disposisi', $data['id_disposisi']);
		$this->db->update('disposisi', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_disposisi', $data['id_disposisi']);
		$this->db->delete('disposisi');
	}



}
