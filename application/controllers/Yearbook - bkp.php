<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yearbook extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
        $this->load->library('session');
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
			   
				$data['all']=$this->adminlogin->allsetting("setting_table");	
				$data['books']=$this->Yearbookmodel->getallyearbooks();
				//echo "<pre>"; print_r($data['product']);exit;
				$data['page']='admin/yearbook_list.php';
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
			$data['all']=$this->adminlogin->allsetting("setting_table");
			$data['page']="admin/add_yearbook.php";
			$this->load->view('admin.php',$data);
			//redirect("product/view_product?success=Product Successfully stored");
		}
	}

	public function faculty()
	{  
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
			redirect("login/index");
			}
		else
			{
			   $book_id=$this->uri->segment(4);
				$data['all']=$this->adminlogin->allsetting("setting_table");	
				$data['faculty']=$this->Yearbookmodel->getallfaculty($book_id);
				$data['book_id'] = $book_id;
				//echo "<pre>"; print_r($data['product']);exit;
				$data['page']='admin/faculty_list.php';
				$this->load->view("admin",$data);
			}
	}
	


	public function add_yearbook_data()
	{
		//echo "<pre>"; print_r($_POST);exit;
		
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("login/index");
			}
		else
			{
			$data['all']=$this->adminlogin->allsetting("setting_table");
			$this->load->library('form_validation');
			$this->form_validation->set_rules('book_name', 'Book Name', 'required');
			$this->form_validation->set_rules('uni_text', 'University Text', 'required');
			$this->form_validation->set_rules('ceo_name', 'CEO Name', 'required');
			$this->form_validation->set_rules('ceo_designation', 'CEO Designation', 'required');
			$this->form_validation->set_rules('ceo_quote', 'CEO Quote', 'required');
				if ($this->form_validation->run() == FALSE)
				{
					
					$data['containt']="admin/add_yearbook.php";
					$this->load->view("admin",$data);
				}
				else
				{

				$config['upload_path']          = 'uploads/yearbook/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1000;
                $config['max_height']           = 7680;
				$this->load->library('upload', $config);
				$this->upload->do_upload('uni_logo');
				$this->upload->do_upload('ceoimg');
				//$this->upload->do_upload('facultyimg');

					$data = array('yearbook_name'    => $_POST['book_name'],
									"university_logo" =>$_FILES['uni_logo']['name'],
									"university_text"   => $_POST['uni_text'],
									"ceo_name"    =>$_POST['ceo_name'],
									"ceo_designation"    =>$_POST['ceo_designation'],
									"ceo_quote"    =>$_POST['ceo_quote'],
									"ceo_image"    =>$_FILES['ceoimg']['name'],
									// "faculty_name" =>$_POST['faculty_name'],
									// "faculty_designation" =>$_POST['faculty_designation'],
									// "faculty_quote" =>$_POST['faculty_quote'],
									// "faculty_image" =>$_FILES['facultyimg']['name']
									"facultyname" =>$_POST['faculty_name'],
									"facultydesignation" =>$_POST['faculty_designation'],
									"facultyquote" =>$_POST['faculty_quote'],
									"facultyimage" =>$_FILES['facultyimg']
									);
					$qry = $this->Yearbookmodel->insert("yearbook",$data);
						if($qry)
						{
							$this->session->set_flashdata("success","Yearbook Added Successfully");
							redirect("yearbook");
						}
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
			$data['page']="admin/edit_yearbook.php";
			$data['book']=$this->Yearbookmodel->getyearbook($condi);
			$data['faculty']=$this->Yearbookmodel->getallfaculty($_GET['id']);
			$this->load->view("admin",$data);
			}
	}



	public function edit_yearbook_data()
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
			$this->form_validation->set_rules('book_name', 'Yearbook Name', 'required');
			$this->form_validation->set_rules('uni_text', 'University Text', 'required');
			//$this->form_validation->set_rules('des', 'Blog Description', 'required');
			$this->form_validation->set_rules('ceo_name', 'CEO Name', 'required');
			if ($this->form_validation->run() == FALSE)
			{
			    $data['editid']=$_POST['editid'];
			    $condi=array('blogid'=>$_POST['editid']);
				$data['book']=$this->Yearbookmodel->getyearbook($condi);
			    $data['faculty']=$this->Yearbookmodel->getallfaculty($_GET['id']);
				$data['page']="admin/edit_yearbook.php";
				$this->load->view("admin",$data);
				
			}
			else
			{
				if(!empty($_POST['uni_logo']))
				{
				 $unilogo=$_POST['uni_logo'];
				 $config['upload_path']          = 'uploads/yearbook/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1000;
                $config['max_height']           = 7680;
				$this->load->library('upload', $config);
				$this->upload->do_upload('uni_logo');
			    }
			    else
			    {
			    	 $unilogo=$_POST['old_uni_logo'];
			    }

			    if($_FILES['ceoimg']['error'] ==4)
				{
				
				 $ceoimg = $_POST['old_ceoimg'];
			    }
			    else
			    {
			    $config['upload_path']          = 'uploads/yearbook/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1000;
                $config['max_height']           = 7680;
				$this->load->library('upload', $config);
				$this->upload->do_upload('ceoimg');

				 $ceoimg = $_FILES['ceoimg']['name'];
			    }
						
				$condi=array("id"		=>$_POST['editid']);

				$data = array('yearbook_name'    => $_POST['book_name'],
									"university_logo" =>$unilogo,
									"university_text"   => $_POST['uni_text'],
									"ceo_name"    =>$_POST['ceo_name'],
									"ceo_designation"    =>$_POST['ceo_designation'],
									"ceo_quote"    =>$_POST['ceo_quote'],
									"ceo_image"    =>$ceoimg,
									// "faculty_name" =>$_POST['faculty_name'],
									// "faculty_designation" =>$_POST['faculty_designation'],
									// "faculty_quote" =>$_POST['faculty_quote'],
									// "faculty_image" =>$_FILES['facultyimg']['name']
									"facultyname" =>$_POST['faculty_name'],
									"facultydesignation" =>$_POST['faculty_designation'],
									"facultyquote" =>$_POST['faculty_quote'],
									"faculty_id" =>$_POST['faculty_id'],
									"old_facultyimg" =>$_POST['old_facultyimg']
									);

				
				$fire=$this->Yearbookmodel->edityearbook($data,$condi);
				if($fire)
				{ 
					$this->session->set_flashdata('success', 'Yearbook Successfully Updated');
					redirect("yearbook");
				}
			}
		} 
	}

	


	public function deletebook()
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
				$del=$this->Yearbookmodel->deletebook($id);
				$this->session->set_flashdata('success', 'Workareas Successfully Deleted');
				redirect("admin/yearbook");
			}
	}

	

	public function uploadfiles()
	{
		$sessiontrue=$this->session->userdata("user_name");
	if(!isset($sessiontrue))
		{
			redirect("login/index");
		}
		else
		{
		if(!empty($_FILES))
		{
		$name = $_FILES['file']['name'];
		$config['upload_path']          = './uploads/blog/';
		$userpic= $_FILES['file']['name']= $_FILES['file']['name'];
		$_FILES['file']['type']= $_FILES['file']['type'];
		$_FILES['file']['tmp_name']= $_FILES['file']['tmp_name'];
		$_FILES['file']['error']= $_FILES['file']['error'];
		$_FILES['file']['size']= $_FILES['file']['size'];    
		$uploadPath = './uploads/blog/';
		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('file');
		echo json_encode($name);
			exit();
		}
		
		}
	}



//Json data insert into database

	public function jsoncontent_insert()
{
    $objDate = new DateTime();

    $json_data = file_get_contents($filename);

    $data = json_decode($json_data, true);

//     [  
	//   {  
	//     "title": "Title1",  
	//     "content": "Content1"
	//   },  
	//   {  
	//     "title": "Title2",  
	//     "content": "Content2"    
	//   },  
	//   {  
	//     "title": "Title13,  
	//     "content": "Content3" 
	//   }
// ]

    foreach($data as $row) {
     $arrInsertData =
            [
                'title' => $row['title'],
                'content' => $row['content'],
                'CREATEDON' => $objDate->format('Y-m-d H:i:s'),
            ];
             $this->db->insert('table_name',$arrInsertData);
    }
    // if data is in this format {"key_name":"value_name","key_name1":"value_name1"} 

    foreach ($data as $key => $value) {
    	$arrInsertData =
            [
                'title' => $key,
                'content' => $dvalue,
                'CREATEDON' => $objDate->format('Y-m-d H:i:s'),
            ];
             $this->db->insert('table_name',$arrInsertData);
    }
   
        // foreach($data['Title'] AS $title)
        // {
        //     $arrInsertData =
        //     [
        //         'title' => $title,
        //         'content' => $data['Content']['content'],
        //         'CREATEDON' => $objDate->format('Y-m-d H:i:s'),
        //     ];

        //     $this->db->insert('table_name',$arrInsertData);
          
        // }
    
    //source: https://stackoverflow.com/questions/47866116/inserting-json-data-into-mysql-using-codeigniter#:~:text=%3C%3F,%2F%2F%20%24filename%20%3D%20'employee.
  
}
}


