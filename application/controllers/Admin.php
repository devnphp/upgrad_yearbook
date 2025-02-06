<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
        $this->load->library('session');
        $this->load->model('adminlogin');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
	}
	public function index()
	{  
		$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				

		$this->load->view('login.php');
			}
			else
			{  
				if(isset($_GET['Profile']))
				{
					
                 $data['profilesuccess']=$_GET['Profile'];
                 
				}
				
				//$data['enquery']=$this->adminlogin->allinquery("inquety");
				//echo "<pre>"; print_r($data['enquery']);exit;
				$data['page']="admin/index.php";
				//echo "yssd";exit;

				//echo "<pre>"; print_r($data);exit;
				$this->load->view('admin.php',$data);
			}
	}

	public function adminlogin()
	{     
		//$data['enquery']=$this->adminlogin->allinquery("inquety");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user', 'User Must Be Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			// $sitesettingdetails=$this->adminlogin->sitedetails("setting_table");
			// $data['sitename']	=	$sitesettingdetails[0]['field_value'];
			// $data['mobile'] 	=	$sitesettingdetails[1]['field_value'];
			// $data['logo']		=	$sitesettingdetails[3]['field_value'];
			// $data['fivicon']	= 	$sitesettingdetails[4]['field_value'];
			// $data['user']		=	$_POST['user'];
			// $data['logo']		=	$_POST['logo'];
			// $data['password']	=	$_POST['password'];
			$this->load->view('login');
		}
		else
		{

			$condi = array('email' =>$_POST['user'],'password'=>$_POST['password'],'status'=>0 );
			$userdetail=$this->adminlogin->login("admin",$condi);
			if($userdetail)
			{       
				$admin_session = array(	"id"=> $userdetail['id'],
							"user_name" => $userdetail['user_name'],
							"name" => $userdetail['first_name'],
							"dp" => $userdetail['pic']
							);
				$this ->session -> set_userdata($admin_session);
				$sessiontrue=$this->session->userdata();
				if($sessiontrue==TRUE)
				{    
				
					//echo "<pre>"; print_r($sitess);exit;
					//*************End Site Setting*************************************					
					$data['containt']="admin/index.php";
					//$this->load->view('admin.php',$data);
					redirect('admin');
				}
			  else
				{
					$data['logo']=$_POST['logo'];
					$data['containt']="admin/login.php";
				}
				$this->load->view('adminlogin',$data);
			}
			else{
					// $sitesettingdetails=$this->adminlogin->sitedetails("setting_table");
					// $data['sitename']	=	$sitesettingdetails[0]['field_value'];
					// $data['mobile'] 	=	$sitesettingdetails[1]['field_value'];
					// $data['logo']		=	$sitesettingdetails[3]['field_value'];
					// $data['fivicon']	= 	$sitesettingdetails[4]['field_value'];
					$data['user']=$_POST['user'];
					$data['logo']=$_POST['logo'];
					$data['password']=$_POST['password'];
					$data['paaserror']="User Or Password Not Match";
					$this->load->view('login',$data);
				}
		}
	}
	public function logout()
	{  
		$array_items = array('id', 'user_name');
		if(session_destroy())
		{  
			redirect("admin");
		}
	}
	
	
	}
?>
