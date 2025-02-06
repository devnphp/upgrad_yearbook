<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Studentsmodel extends CI_Model {

	public function insert($tab,$data)
	{
		   $this->db->insert($tab,$data);
			
		  return true;
    	
	}



	public function updatestudent($data,$condi)
	{
		$this->db->where($condi);
    	$this->db->update('students',$data);    	
    	return true;
    	
	}


function do_upload($b,$c)
                 {

                 	
                            $config['upload_path'] = APPPATH.'../uploads/yearbook';
                            $config['allowed_types'] = 'gif|jpg|png|pdf|zip|xlsx|txt';
                            $config['file_name'] = $b;
                            $config['overwrite'] = TRUE;

                            $this->load->library('upload',$config);
                            $this->upload->initialize($config);
                         return   $this->upload->do_upload($c);
                            
									}


function upload_files_array($name,$temp,$filename,$key)
{
                $_FILES[$temp]['name'] = $_FILES[$name]['name'][$key];
                $_FILES[$temp]['type']= $_FILES[$name]['type'][$key];
                $_FILES[$temp]['tmp_name']= $_FILES[$name]['tmp_name'][$key];
                $_FILES[$temp]['error']= $_FILES[$name]['error'][$key];
                $_FILES[$temp]['size']= $_FILES[$name]['size'][$key];

              if($filename=="")
               {
                 
              $ap_file="";   
               }
               
               else
               {
                
              $ap_file = "faculty".rand().".".pathinfo($filename, PATHINFO_EXTENSION);           

              $this->do_upload($ap_file, $temp);
              return $ap_file;
              
              }
}   










	//***********Fetch item row for edit******************
	public function getstudent($condi)
	{
			$this->db->select('*');
		    $this->db->where($condi);
			$this->db->from('students');
			$query = $this->db->get();
			return $query->row_array();

	}

	public function check_student($name)
	{
		return $this->db->get_where('students',array('name'=>$name))->num_rows();

	}

	public function getallfaculty($id)
	{
		$this->db->select("*");
		$this->db->where("yearbook_id=",$id);
		$qry=$this->db->get('faculty_members');
		return $qry->result_array();
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

	public function getunassignedstudents()
	{
			$this->db->select('*');
			$this->db->where('yearbook',0);
			$this->db->from('students');
			$query = $this->db->get();
			return $query->result_array(); 
	}

	

	public function getallstudents()
	{
			$this->db->select('*');
			$this->db->from('students');
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
	public function deletestudent($id)
	{
		$this->db->where('id',$id);
    	$del=$this->db->delete('students');
    	
    	return true;
	}

	public function assignstudent($data)
	{
		$student_ids = $data['students'];
		$set = array('yearbook'=>$data['yearbook']);
		foreach($student_ids as $id)
		{
		$this->db->where(array('id'=>$id));
    	$this->db->update('students',$set);
		}
		
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
    