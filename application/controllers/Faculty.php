<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
        $this->load->library('session');
        $this->load->model('Yearbookmodel');
        $this->load->model('adminlogin');
        $this->load->model('facultymodel');
        $this->load->library('form_validation');
        
    } 

	public function index()
	{  
			$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
			redirect("login/index");
			}
		else
			{
			
				
				$data['books']=$this->Yearbookmodel->getallyearbooks();
			
				$data['page']='admin/faculty_list.php';
				$this->load->view("admin",$data);
			}
	}

	public function get_yearbook_faculty()
	{
		$id = $_POST['id'];

		$data=$this->db->get_where('faculty_members',array('yearbook_id'=>$id))->result_array();
		//echo $data;

		  $i=1;
                
              
                 
                 
                echo '<table id="example" class="table table-striped table-bordered" style="width:100%">
                 <thead> 
                <tr> 
                 
                  <th style="width:20px;">S.No</th>
                 
                  
                   <th>Faculty Name</th>
                    <th>Faculty designation</th>
                    
                      <th>Faculty Image</th>
                   <th>Action</th>
                </tr> 
              </thead> 
              <tbody> ';
                foreach($data as $faculty){ 
                  
               echo ' <tr> 
                  
                  <td>'.$i.'</td>
                           
                           
                            <td>'.$faculty['faculty_name'].'</td>
                            
                            <td>'.$faculty['faculty_designation'].'</td>
                         
                          <td>

                         <img src="'.base_url('uploads/faculty/'.$faculty['faculty_image']).'" width="50" height="50">
                             
                              
                            </td>
                            <td>
                           
                              <a href="'.site_url('admin/faculty/edit?id=').$faculty['id'].'" class="btn btn-info"><i class="fa fa-edit"></i>
                              </a>
                              <a href="'.site_url('faculty/delete?id=').$faculty['id'].'" class="btn btn-danger"><i class="fa fa-trash"></i>
                              </a>
                               

                            </td>
                    
                  
                </tr> ';
                  $i++;
                
	} 

               echo '</tbody> 
            </table> ';
              
                  
                
}



	public function add()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("login/index");
		}
		else
		{
			
			$data['books']=$this->Yearbookmodel->getallyearbooks();
			$data['page']="admin/add_faculty.php";
			$this->load->view('admin.php',$data);
			//redirect("product/view_product?success=Product Successfully stored");
		}
	}

		


	public function add_faculty_data()
	{
		//echo "<pre>"; print_r($_POST);exit;
		
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("login/index");
			}
		else
			{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('book_id', 'Book ID', 'required');
			$this->form_validation->set_rules('faculty_name[]', 'Faculty Name', 'required');
			$this->form_validation->set_rules('faculty_designation[]', 'Faculty Designation', 'required');
			$this->form_validation->set_rules('faculty_quote[]', 'Faculty Quote', 'required');
				if ($this->form_validation->run() == FALSE)
				{
					
					$data['page']="admin/add_faculty.php";
					$this->load->view("admin",$data);
				}
				else
				{

						foreach ($_POST['faculty_name'] as $key => $value) {

						if ($_FILES['facultyimg']['name'][$key] != "")
						{
							$fphoto= $_FILES['facultyimg']['name'][$key];
							$photo_img = $this->upload_files_array('facultyimg','photo',$fphoto,$key);
						} else {
							$photo_img= 'no_image.jpg';
						}


						$faculty_data = array(
							                'yearbook_id' => $_POST['book_id'],
						                    "faculty_name" =>$value,
											"faculty_designation" =>$_POST['faculty_designation'][$key],
											"faculty_quote" =>$_POST['faculty_quote'][$key],
											"faculty_image" =>$photo_img
						                      );

						$this->facultymodel->insert('faculty_members',$faculty_data);

					}

				
							$this->session->set_flashdata("success","Faculty Added Successfully");
							redirect("faculty");
						}
				}
			
	}

	public function edit()
	{ //echo "fjk";exit;
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
			redirect("login/index");
			}
		else
			{
			$condi=array("id "=>$_GET['id']);
			$data['editid']=$_GET['id'];
			$data['page']="admin/edit_faculty.php";
			$data['faculty']=$this->facultymodel->getfaculty($condi);
			$data['books']=$this->Yearbookmodel->getallyearbooks();
			$this->load->view("admin",$data);
			}
	}



	public function edit_faculty_data()
	{ 
		//echo "<pre>"; print_r($_POST);exit;		
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
			redirect("login/index");
			}
		else
			{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('book_id', 'Book ID', 'required');
			$this->form_validation->set_rules('faculty_name', 'Faculty Name', 'required');
			$this->form_validation->set_rules('faculty_designation', 'Faculty Designation', 'required');
			$this->form_validation->set_rules('faculty_quote', 'Faculty Quote', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$condi=array("id "=>$_GET['id']);
				$data['editid']=$_GET['id'];
				$data['page']="admin/edit_faculty.php";
				$data['faculty']=$this->facultymodel->getfaculty($condi);
				$data['books']=$this->Yearbookmodel->getallyearbooks();
				$this->load->view("admin",$data);
				
			}
			else
			{


			    if($_FILES['facultyimg']['error'] ==4)
				{
				
				 $faculty_img = $_POST['old_facultyimg'];
			    }
			    else
			    {
			    	$faculty_img = "faculty".rand().".".pathinfo($_FILES['facultyimg']['name'], PATHINFO_EXTENSION);

			    $config['upload_path']          = APPPATH.'../uploads/faculty/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name'] = $faculty_img;
                $config['max_size']             = 1000;
                $config['max_width']            = 1000;
                $config['max_height']           = 7680;
				$this->load->library('upload', $config);
				$this->upload->do_upload('facultyimg');

				 
			    }
						
				$condi=array("id"		=>$_POST['editid']);

				$faculty_data = array(
							                'yearbook_id' => $_POST['book_id'],
						                    "faculty_name" =>$_POST['faculty_name'],
											"faculty_designation" =>$_POST['faculty_designation'],
											"faculty_quote" =>$_POST['faculty_quote'],
											"faculty_image" =>$faculty_img
						                      );

				
				$fire=$this->facultymodel->editfaculty($faculty_data,$condi);
				if($fire)
				{ 
					$this->session->set_flashdata('success', 'Faculty Successfully Updated');
					redirect("faculty");
				}
			}
		} 
	}

	


	public function delete()
	{  
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("login/index");
			}
			else
			{
				$id = $_GET['id'];
				//$datt=array("status"=>0);
				$del=$this->facultymodel->deletefaculty($id);
				$this->session->set_flashdata('success', 'Faculty Successfully Deleted');
				redirect("admin/faculty");
			}
	}

	

	function do_upload($b,$c)
                 {

                 	
                            $config['upload_path'] = APPPATH.'../uploads/faculty';
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




}


