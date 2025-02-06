<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminlogin extends CI_Model {
	public function login($tab,$condi)
	{
		$this->db->select();
		$this->db->where($condi);
		$qry=$this->db->get($tab);
		return $qry->row_array();
	}

	

}
    