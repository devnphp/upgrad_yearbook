<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facultymodel extends CI_Model {

	public function insert($tab,$data)
	{
	   	 $this->db->insert($tab,$data);
				
		  return true;
    	
	}



	public function editfaculty($data,$condi)
	{
    	$this->db->where($condi);
    	$this->db->update('faculty_members',$data);    	
    	return true;
    	
	}













	//***********Fetch item row for edit******************
	public function getyearbook($condi)
	{
			$this->db->select('*');
		    $this->db->where($condi);
			$this->db->from('yearbook');
			$query = $this->db->get();
			return $query->row_array();

	}
	public function getallfaculty($id)
	{
		$this->db->select("*");
		$this->db->where("yearbook_id=",$id);
		$qry=$this->db->get('faculty_members');
		return $qry->result_array();
	}
	public function getfaculty($condi)
	{
		$this->db->select('*');
		$this->db->where($condi);
			$this->db->from('faculty_members');
			$query = $this->db->get();
			return $query->row_array(); 
	}
	public function maincategory($tab,$condi,$or)
	{
		$this->db->select("*");
		$this->db->where($condi);
		$this->db->or_where($or);
		$qry=$this->db->get($tab);
		return $qry->result_array();
	}

	public function getcatename($tab,$id)
	{
		$this->db->select("product_name");
		$this->db->where($id);
		$qry=$this->db->get($tab);
		return $qry->row_array();

	}

	public function maincategoryy($tab,$condi)
	{
		$this->db->select("*");
		$this->db->where($condi);
		$this->db->or_where($or);
		$qry=$this->db->get($tab);
		return $qry->result_array();
	}

	public function subproduct($tab)
	{
			
			$this->db->select('ct.product_name as sucate, ct.product_pic,ct.description,ct.status,ct.prod_id, ct.parent_id, ct.main_cate,pc.product_name as prcate' , false);
       		$this->db->from('products ct');
        	$this->db->join('products pc', "ct.main_cate = pc.parent_id", 'inner');
        	$this->db->where('ct.parent_id', 1);
        	$this->db->group_by('ct.product_name');
        	$query = $this->db->get();
			return $query->result_array();
	}
	public function jqsubproduct($tab,$condi)
	{
		     $this->db->select('*');
		     $this->db->where($condi);
			 $this->db->from($tab);
			 $query = $this->db->get();
			return $query->result_array();

	}
	public function jqstate($tab,$condi)
	{
			 $this->db->select('*');
		     $this->db->where($condi);
			 $this->db->from($tab);
			 $query = $this->db->get();
			return $query->result_array();

	}

	public function getallyearbooks()
	{
			$this->db->select('*');
			$this->db->from('yearbook');
			$query = $this->db->get();
			return $query->result_array(); 
	}

	//***************fetch pic list***************************
	public function getimage($tab,$condi)
	{
			$this->db->select('*');
		    $this->db->where($condi);
			$this->db->from($tab);
			$query = $this->db->get();
			return $query->row_array();

	}

	

	//**********Delete Product******************************
	public function deletefaculty($id)
	{
		$this->db->where('id',$id);
    	$del=$this->db->delete('faculty_members');
    
    	return true;
	}



	public function editinsert($tab,$upd,$condi)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$upd);
    	return true;

	}
	public function statusupdate($tab,$condi,$upd)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$upd);
    	return true;

	}
}
    