<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asesi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel($where = null)
	{
		if($where == null){
			$this->db->select('*');
			$this->db->from('tbl_asesi');
			$this->db->order_by('tbl_asesi.id_asesi', 'Asc');
			$query = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('tbl_asesi');
			$this->db->order_by('tbl_asesi.id_asesi', 'Asc');
			$this->db->where($where);
			$query = $this->db->get();
		}
		
		return $query;
	}

	public function cekpengguna($where)
	{
		$this->db->select('*');
		$this->db->from('tbl_asesi');
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}


	public function jumlah_pengguna()
    {
        $this->db->select('count(id) as j_pengguna');
		$this->db->from('tbl_asesi');
		$query = $this->db->get()->row();
		return $query->j_pengguna;
    }

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_asesi');
		$this->db->where('id_asesi', $id);
		$query = $this->db->get();
		return $query;
	}

	public function cek_username($username)
	{
		$this->db->select('*');
		$this->db->from('tbl_asesi');
		$this->db->where('email', $username);
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function login($username,$enpass)
	{
		$username = $this->db->escape_str($username);
		$password = $this->db->escape_str($enpass);
		$this->db->select('*');
		$this->db->from('tbl_asesi');
		$this->db->where(array(
			'tbl_asesi.email' => $username,
			'tbl_asesi.password' => sha1($password)
		));
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data)
	{
		$this->db->insert('tbl_asesi', $data);
	}

	public function update($data)
	{
		$this->db->where('id_asesi', $data['id_asesi']);
		$this->db->update('tbl_asesi', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_asesi', $data['id_asesi']);
		$this->db->delete('tbl_asesi');
	}



}
