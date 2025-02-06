<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yearbookmodel extends CI_Model {

	public function insert($tab,$data)
	{
	    $ins_data = array('yearbook_name'    => $data['yearbook_name'],
	    	              'slug'    => $data['slug'], 
	    	              'yearbook_year'    => $data['yearbook_year'],
						          'yearbook_description'    => $data['yearbook_description'],
									"university_logo" =>$data['university_logo'],
									"university_text"   => $data['university_text'],
									"ceo_name"    =>$data['ceo_name'],
									"ceo_designation"    =>$data['ceo_designation'],
									"ceo_quote"    =>$data['ceo_quote'],
									"ceo_image"    =>$data['ceo_image']
									);
			$this->db->trans_begin();
									  
		

		   if($this->db->insert($tab,$ins_data))
				{
					$last_insert_id = $this->db->insert_id();

					foreach ($data['facultyname'] as $key => $value) {

						if ($_FILES['facultyimg']['name'][$key] != "")
						{
							$fphoto= $_FILES['facultyimg']['name'][$key];
							$photo_img = $this->upload_files_array('facultyimg','photo',$fphoto,$key);
						} else {
							$photo_img= 'no_image.jpg';
						}

						

						

						$faculty_data = array(
							                'yearbook_id' => $last_insert_id,
						                    "faculty_name" =>$data['facultyname'][$key],
											"faculty_designation" =>$data['facultydesignation'][$key],
											"faculty_quote" =>$data['facultyquote'][$key],
											"faculty_image" =>$photo_img
						                      );

						$this->db->insert('faculty_members',$faculty_data);

					}

					$this->db->trans_complete();

					 if ($this->db->trans_status() === FALSE) {
            //if something went wrong, rollback everything
            $this->db->trans_rollback();
            $this->session->set_flashdata('message', '<div id="div_id" class="alert alert-info alert-dismissable">Registration Failed</div>');
					
			return FALSE;
        } else {
            //if everything went right, commit the data to the database
            $this->db->trans_commit();
           $this->session->set_flashdata('message', '<div id="div_id" class="alert alert-info alert-dismissable">Registration Successful</div>');
					return true;
        }
            
				}


				
				else
				{

					$this->session->set_flashdata('message', 'wrong');
					return false;				               
				
				} 
		  
    	
	}



	public function edityearbook($data,$condi)
	{

		 $update_data = array('yearbook_name'    => $data['yearbook_name'],
		 	                  'slug'    => $data['slug'], 
		 	                  'yearbook_year'    => $data['yearbook_year'],
						       'yearbook_description'    => $data['yearbook_description'],
		 	                  'yearbook_image'    => $data['yearbook_image'],
									"university_logo" =>$data['university_logo'],
									"university_text"   => $data['university_text'],
									"ceo_name"    =>$data['ceo_name'],
									"ceo_designation"    =>$data['ceo_designation'],
									"ceo_quote"    =>$data['ceo_quote'],
									"ceo_image"    =>$data['ceo_image']
									);

		$this -> db -> where($condi);
    	$update=$this -> db -> update('yearbook',$update_data);
    	if($update)
    	{
    		foreach ($data['faculty_id'] as $key => $value) {

						if ($_FILES['facultyimg']['name'][$key] != "")
						{
							$fphoto= $_FILES['facultyimg']['name'][$key];
							$photo_img = $this->upload_files_array('facultyimg','photo',$fphoto,$key);
						} else {
							// $photo_img= 'no_image.jpg';
							$photo_img= $_POST['old_facultyimg'][$key];
						}

						$faculty_data = array(
						                    "faculty_name" =>$data['facultyname'][$key],
											"faculty_designation" =>$data['facultydesignation'][$key],
											"faculty_quote" =>$data['facultyquote'][$key],
											"faculty_image" =>$photo_img
						                      );

						$this->db->where('id',$value)->update('faculty_members',$faculty_data);

					}
    	}
    	return true;

	  //   $ins_data = array('yearbook_name'    => $data['yearbook_name'],
			// 						"university_logo" =>$data['university_logo'],
			// 						"university_text"   => $data['university_text'],
			// 						"ceo_name"    =>$data['ceo_name'],
			// 						"ceo_designation"    =>$data['ceo_designation'],
			// 						"ceo_quote"    =>$data['ceo_quote'],
			// 						"ceo_image"    =>$data['ceo_image']
			// 						);
			// $this->db->trans_begin();
									  
		

		 //   if($this->db->insert($tab,$ins_data))
			// 	{
			// 		$last_insert_id = $this->db->insert_id();

			// 		foreach ($data['facultyname'] as $key => $value) {

			// 			if ($_FILES['facultyimg']['name'][$key] != "")
			// 			{
			// 				$fphoto= $_FILES['facultyimg']['name'][$key];
			// 				$photo_img = $this->upload_files_array('facultyimg','photo',$fphoto,$key);
			// 			} else {
			// 				$photo_img= 'no_image.jpg';
			// 			}

						

						

			// 			$faculty_data = array(
			// 				                'yearbook_id' => $last_insert_id,
			// 			                    "faculty_name" =>$data['facultyname'][$key],
			// 								"faculty_designation" =>$data['facultydesignation'][$key],
			// 								"faculty_quote" =>$data['facultyquote'][$key],
			// 								"faculty_image" =>$photo_img
			// 			                      );

			// 			$this->db->insert('faculty_members',$faculty_data);

			// 		}

			// 		$this->db->trans_complete();

			// 		 if ($this->db->trans_status() === FALSE) {
   //          //if something went wrong, rollback everything
   //          $this->db->trans_rollback();
   //          $this->session->set_flashdata('message', '<div id="div_id" class="alert alert-info alert-dismissable">Registration Failed</div>');
					
			// return FALSE;
   //      } else {
   //          //if everything went right, commit the data to the database
   //          $this->db->trans_commit();
   //         $this->session->set_flashdata('message', '<div id="div_id" class="alert alert-info alert-dismissable">Registration Successful</div>');
			// 		return true;
   //      }
            
			// 	}


				
			// 	else
			// 	{

			// 		$this->session->set_flashdata('message', 'wrong');
			// 		return false;				               
				
			// 	} 
		  
    	
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
	public function deletebook($tab,$id)
	{
		$this -> db -> where('id',$id);
    	$del=$this -> db -> delete($tab);
    	if($del)
    	{
    		$this -> db -> where('yearbook_id',$id);
    	$this -> db -> delete('faculty_members');
    	}
    	return true;
	}

	public function imageupdate($tab,$condi,$upd)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$upd);
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
    