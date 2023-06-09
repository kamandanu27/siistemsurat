<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel($where = null)
	{
		if($where == null){
			$this->db->select('*');
			$this->db->from('tbl_event');
			$this->db->order_by('tbl_event.id_event', 'Asc');
			$query = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('tbl_event');
			$this->db->order_by('tbl_event.id_event', 'Asc');
			$this->db->where($where);
			$query = $this->db->get();
		}
		
		return $query;
	}

	public function cekpengguna($where)
	{
		$this->db->select('*');
		$this->db->from('tbl_event');
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}


	public function jumlah_pengguna()
    {
        $this->db->select('count(id) as j_pengguna');
		$this->db->from('tbl_event');
		$query = $this->db->get()->row();
		return $query->j_pengguna;
    }

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_event');
		$this->db->where('id_event', $id);
		$query = $this->db->get();
		return $query;
	}

	public function cek_username($username)
	{
		$this->db->select('*');
		$this->db->from('tbl_event');
		$this->db->where('email', $username);
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function login($username,$enpass)
	{
		$username = $this->db->escape_str($username);
		$password = $this->db->escape_str($enpass);
		$this->db->select('*');
		$this->db->from('tbl_event');
		$this->db->where(array(
			'tbl_event.email' => $username,
			'tbl_event.password' => sha1($password)
		));
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data)
	{
		$this->db->insert('tbl_event', $data);
	}

	public function update($data)
	{
		$this->db->where('id_event', $data['id_event']);
		$this->db->update('tbl_event', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_event', $data['id_event']);
		$this->db->delete('tbl_event');
	}



}
