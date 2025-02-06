<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studentsdata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
        $this->load->library('session');
        $this->load->model('Studentsmodel');
        $this->load->model('Yearbookmodel');
        $this->load->model('adminlogin');
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
			   
				
				$data['students']=$this->Studentsmodel->getunassignedstudents();
				$data['books']=$this->Yearbookmodel->getallyearbooks();
				//echo "<pre>"; print_r($data['product']);exit;
				$data['page']='admin/students_list.php';
				$this->load->view("admin",$data);
			}
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
			
			$data['page']="admin/add_students.php";
			$this->load->view('admin.php',$data);
			//redirect("product/view_product?success=Product Successfully stored");
		}
	}

	public function add_student_data()
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
			
			$this->form_validation->set_rules('name', 'Student Name', 'required');
			$this->form_validation->set_rules('designation', 'Student Designation', 'required');
			$this->form_validation->set_rules('quote', 'Student Quote', 'required');
				if ($this->form_validation->run() == FALSE)
				{
					
					$data['containt']="admin/add_students.php";
					$this->load->view("admin",$data);
				}
				else
				{


				$config['upload_path']          = 'uploads/students/';
                $config['allowed_types']        = 'gif|jpg|png';                
                $config['max_size']             = 1000;
                $config['max_width']            = 1000;
                $config['max_height']           = 7680;
				$this->load->library('upload', $config);
				$this->upload->do_upload('img');

					$data = array(
									"name"    =>$_POST['name'],
									"designation"    =>$_POST['designation'],
									"quote"    =>$_POST['quote'],
									"image"    =>base_url('uploads/students/'.str_replace(' ','_',$_FILES['img']['name']))
									
									);
					$qry = $this->Studentsmodel->insert("students",$data);
						if($qry)
						{
							$this->session->set_flashdata("success","Student Added Successfully");
							redirect("studentsdata");
						}
				}
			}
	}

	public function edit()
	{ 
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
			redirect("login/index");
			}
		else
			{
			$condi=array("id "=>$_GET['id']);
			$data['editid']=$_GET['id'];
			$data['page']="admin/edit_student.php";
			$data['student']=$this->Studentsmodel->getstudent($condi);
			$this->load->view("admin",$data);
			}
	}


	public function edit_student_data()
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
			
			$this->form_validation->set_rules('name', 'Student Name', 'required');
			$this->form_validation->set_rules('designation', 'Student Designation', 'required');
			$this->form_validation->set_rules('quote', 'Student Quote', 'required');
				if ($this->form_validation->run() == FALSE)
				{
					
					$condi=array("id "=>$_GET['id']);
					$data['editid']=$_GET['id'];
					$data['page']="admin/edit_student.php";
					$data['student']=$this->Studentsmodel->getstudent($condi);
					$this->load->view("admin",$data);
				}
				else
				{

					  if($_FILES['img']['error'] ==4)
					{

					$img_path = $_POST['oldimg'];

						} else {

						$config['upload_path']          = 'uploads/students/';
		                $config['allowed_types']        = 'gif|jpg|png';                
		                $config['max_size']             = 1000;
		                $config['max_width']            = 1000;
		                $config['max_height']           = 7680;
						$this->load->library('upload', $config);
						$this->upload->do_upload('img');
						$img_path = base_url('uploads/students/'.str_replace(' ','_',$_FILES['img']['name']));

						

					}

					$condi=array("id" =>$_POST['editid']);

					$data = array(
									"name"    =>$_POST['name'],
									"designation"    =>$_POST['designation'],
									"quote"    =>$_POST['quote'],
									"image"    => $img_path
									
									);
					$qry = $this->Studentsmodel->updatestudent($data,$condi);
						if($qry)
						{
							$this->session->set_flashdata("success","Student Added Successfully");
							redirect("studentsdata");
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
				$del=$this->Studentsmodel->deletestudent($id);
				$this->session->set_flashdata('success', 'Student Successfully Deleted');
				redirect("admin/studentsdata");
			}
	}


	public function yearbook_students()
	{  
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
			redirect("login/index");
			}
		else
			{
			   
				
				$data['books']=$this->Yearbookmodel->getallyearbooks();	
				$data['students']=$this->Studentsmodel->getallstudents();
				//echo "<pre>"; print_r($data['product']);exit;
				$data['page']='admin/yearbook_students_list.php';
				$this->load->view("admin",$data);
			}
	}

	public function get_yearbook_students()
	{
		$id = $_POST['id'];

		$data=$this->db->get_where('students',array('yearbook'=>$id))->result_array();
		//echo $data;

		  $i=1;
                
              
                 
                 
                echo '<table id="example" class="table table-striped table-bordered" style="width:100%">
                 <thead> 
                <tr> 
                 
                  <th style="width:20px;">S.No</th>
                 
                   <th>Name</th>
                    <th>designation</th>
                    
                     <th>Yearbook</th>
                      <th>Student Image</th>
                   <th>Action</th>
                </tr> 
              </thead> 
              <tbody> ';
                foreach($data as $student){ 
                    if($student['yearbook'] !=0)
                    {
                      $yb = yearbook_name($student['yearbook']);
                    } else {
                      $yb = 'Unassigned';
                    }
               echo ' <tr> 
                  
                  <td>'.$i.'</td>
                           
                            <td>'.$student['name'].'</td>
                            <td>'.$student['designation'].'</td>
                            
                            <td>'.$yb.'</td>
                          <td>

                         <img src="'.$student['image'].'" width="50" height="50">
                             
                              
                            </td>
                            <td>
                           
                              <a href="'.site_url('admin/studentsdata/edit_yearbook_student?id=').$student['id'].'" class="btn btn-info"><i class="fa fa-edit"></i>
                              </a>
                              <a href="'.site_url('studentsdata/delete?id=').$student['id'].'" class="btn btn-danger"><i class="fa fa-trash"></i>
                              </a>
                               

                            </td>
                    
                  
                </tr> ';
                  $i++;
                
	} 

               echo '</tbody> 
            </table> ';
              
                  
                
}


public function add_student_to_yearbook()
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
			$this->form_validation->set_rules('students[]', 'Students ', 'required');
				if ($this->form_validation->run() == FALSE)
				{
					
					$data['containt']="admin/students_list.php";
					$this->load->view("admin",$data);
				}
				else
				{


			       // foreach($students as $student)
			       // {
			       	$condition = array('id'=>$student);
			       	$data = array(
									"yearbook"    =>$_POST['book_id'],
									"students"    =>$_POST['students']
									);
			     //  }

					
					$qry = $this->Studentsmodel->assignstudent($data);
						if($qry)
						{
							$this->session->set_flashdata("success","Students Added to yearbook Successfully");
							redirect("studentsdata");
						}
				}
			}
	}


	public function edit_yearbook_student()
	{ 
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
			redirect("login/index");
			}
		else
			{
			$condi=array("id "=>$_GET['id']);
			$data['editid']=$_GET['id'];
			$data['page']="admin/edit_yearbook_student.php";
			$data['books']=$this->Yearbookmodel->getallyearbooks();
			$data['student']=$this->Studentsmodel->getstudent($condi);
			$this->load->view("admin",$data);
			}
	}

	public function edit_yearbook_student_data()
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
			
			$this->form_validation->set_rules('name', 'Student Name', 'required');
			$this->form_validation->set_rules('designation', 'Student Designation', 'required');
			$this->form_validation->set_rules('quote', 'Student Quote', 'required');
			$this->form_validation->set_rules('book_id', 'Yearbook ', 'required');
				if ($this->form_validation->run() == FALSE)
				{
					
					$condi=array("id "=>$_GET['id']);
					$data['editid']=$_GET['id'];
					$data['page']="admin/edit_yearbook_student.php";
					$data['student']=$this->Studentsmodel->getstudent($condi);
					$this->load->view("admin",$data);
				}
				else
				{

					  if($_FILES['img']['error'] ==4)
					{

					$img_path = $_POST['oldimg'];

						} else {

						$config['upload_path']          = 'uploads/students/';
		                $config['allowed_types']        = 'gif|jpg|png';                
		                $config['max_size']             = 1000;
		                $config['max_width']            = 1000;
		                $config['max_height']           = 7680;
						$this->load->library('upload', $config);
						$this->upload->do_upload('img');
						$img_path = base_url('uploads/students/'.str_replace(' ','_',$_FILES['img']['name']));

						

					}

					$condi=array("id" =>$_POST['editid']);

					$data = array(
									"name"    =>$_POST['name'],
									"designation"    =>$_POST['designation'],
									"quote"    =>$_POST['quote'],
									"yearbook"    =>$_POST['book_id'],
									"image"    => $img_path
									
									);
					$qry = $this->Studentsmodel->updatestudent($data,$condi);
						if($qry)
						{
							$this->session->set_flashdata("success","Student Updated Successfully");
							redirect("admin/studentsdata/yearbook_students");
						}
				}
			}
	}



	public function get_googlesheet_data()
	{  
		
		require_once APPPATH . '../vendor/autoload.php';

$client = new \Google_Client();

$client->setApplicationName('Google Sheets and PHP');

$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);

$client->setAccessType('offline');

$client->setAuthConfig(APPPATH. '../credentials.json');

$service = new Google_Service_Sheets($client);

// $spreadsheetId = "1Ti6zXp9bE9QHhAX_v73AGnlMmR_mVryMjpfD-Pe9LPU"; //It is present in your URL
$spreadsheetId = "1oJLVkLJFa1p2Q5f8o24CPdbGBzDv7TISt-xv-Js2XFs";

      $get_range = "A1:Z1000";

       //Request to get data from spreadsheet.

       $response = $service->spreadsheets_values->get($spreadsheetId,$get_range);

       $values = $response->getValues();

       //print_r($values);

    //    $conn=mysqli_connect("localhost","root","","upgrade");
    //       if(!$conn){
    //       die('Could not Connect My Sql:' .mysqli_error());
		  // }

		  // $sql = "delete from google_sheet_data";
    //    	mysqli_query($conn,$sql);

       for($i=1 ; $i<count($values); $i++)
       {
       	
       	 $data['name']= $values[$i][0];
       	 $data['designation']= $values[$i][1];
       	 $data['quote']= $values[$i][2];
       	 $data['image']= $values[$i][3];

       	 $name= $values[$i][0];
       	 $designation= $values[$i][1];
       	 $quote= $values[$i][2];
       	 $image= $values[$i][3];
       	 
       	//print_r($data);

       	 $chk=$this->Studentsmodel->check_student($name);
        if(!$chk)
        {
        	$insert= $this->db->insert('students',$data);
        }
       
       	// $sql = "insert into google_sheet_data(name,designation,quote,image) values ('$name','$email','$mobile','$address')";
       	// mysqli_query($conn,$sql);
       } 
       
       echo "Google Sheet data imported Successfully";

	}

	
}


