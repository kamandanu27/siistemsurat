<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	

}

/* End of file Public_model.php */
/* Location: ./application/models/Public_model.php */