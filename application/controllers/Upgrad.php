		<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upgrad extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
        //$this->load->library('session');
        $this->load->model('upgrad_model');
		//$this->load->model('swasti_model');
  //       $this->load->library('form_validation');
         $this->segment = $this->uri->segment(3);
		 
	}
	public function index()
	{   
			
		$data['page'] = "home";
		$data['books']=	$this->upgrad_model->yearbooks();
		
		$this->load->view('front_end/index',$data);
	
	}

	public function get_yearbooks()
	{   
		
		$search_term = $this->input->post('search');		

		$this->db->select('*');
		$this->db->from('yearbook');
		$this->db->like('yearbook_name', $search_term);
		$data= $this->db->get()->result_array();

		foreach($data as $book) {

			echo '<div class="col-sm-4">
    
            <div class="card card-area">
    
              <img class="card-img-top" src="'.base_url('uploads/yearbook/'.$book['yearbook_image']).'" alt="the image alt text here">
    
              <div class="card-body text-center">
    
                <h3 class="card-title">'.$book['yearbook_name'].'</h3>
    
                <h5 class="years-details">'.$book['yearbook_year'].'</h5>
    
                <h5 class="years-details">'.$book['yearbook_description'].'</h5>
    
              </div>
    
            </div>
    
          </div>';
		}
			
		
	
	}


	public function yearbook($slug)
	{   
			
		$data['page'] = "team";
		$data['book']=	$this->upgrad_model->yearbook($slug);
		$data['faculty']=	$this->upgrad_model->faculty($data['book']['id']);
		$data['students']=	$this->upgrad_model->students($data['book']['id']);
		
		$this->load->view('front_end/index',$data);
	
	}

	public function brand_hub()
	{   
		
				
		$data['page'] = "brand_hub";
		$data['title'] = "Brand hub";
		$data['bc1'] = "About Swasti";
		$data['bc2'] = "Brand hub";
		$data['bch1'] = "<span>All things</span><br>Swasti";
		$data['bch2'] = "Swasti";
        $condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);
		$this->load->view('front_end/index',$data);
	
	}


	public function contact_us()
	{   
		
		$condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);		
		$data['page'] = "contact_us";
		$data['title'] = "Hear From You";
		$data['bc1'] = "About Swasti";
		$data['bc2'] = "Contact Us";
		$data['bch1'] = "We would love to<br><span>Hear from You</span>";
		$data['bch2'] = "Hear from You";

		$this->load->view('front_end/index',$data);
	
	}

	public function covidaction_collab()
	{   
		
		$data['content']=	$this->swasti_model->collab_content();
		$condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);
		$data['page'] = "covidaction_collab";
		$data['title'] = "100 Millions Well Thy Day";
		$data['bc1'] = "COVID - 19";
		$data['bc2'] = "#CovidActionCollab";
		$data['bch1'] = "1 + 1 = <span>11</span>";
		//$data['bch2'] = "";

		$this->load->view('front_end/index',$data);
	
	}

	public function knowledgebase()
	{   
		//echo "yss";exit;
				
		$data['page'] = "knowledgebase";
		$data['title'] = "Learning for Growth";
		$data['bc1'] = "Knowledgebase";
		//$data['bc2'] = "";
		$data['bch1'] = "Learning For<br><span>Growth</span>";
		$data['bch2'] = "Growth";
        $condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);
		$data['knowledge']=$this->swasti_model->workarea("blogcategory",$condi);
		//echo "<pre>"; print_r($data['knowledge']);exit;
		$this->load->view('front_end/index',$data);
	
	}



	public function our_team($cat='')
	{      //echo "yss";exit;
		$condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);
		if($cat)
		{  
			$data['team_members'] = $this->swasti_model->team_members_cat($cat);
			$data['page'] = "our_team_cat";
		} else {  //echo "yss";exit;
			$data['team_members'] = $this->swasti_model->team_members();
			//echo "<pre>"; print_r($data['team_members']);exit;
			$data['page'] = "our_team";
		}
		

		$data['content']=	$this->swasti_model->team_content();
		$data['title'] = "Humans for Swasti";
		$data['bc1'] = "About Swasti";
		$data['bc2'] = "Our Team";
		$data['bch1'] = "<span>Humans</span><br>of Swasti";
		$data['bch2'] = "of Swasti";

		$this->load->view('front_end/index',$data);
	
	}

	public function compliance($cat='')
	{      //echo "yss";exit;
		$condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);
		
		$data['page'] = "compliance";
		
		$data['annuals']=	$this->swasti_model->financialtrports('annual');
		$data['audits']=	$this->swasti_model->financialtrports('audit');
		$data['fcras']=	$this->swasti_model->financialtrports('fcra');

		
		$data['title'] = "Compliance";
		$data['bc1'] = "";
		$data['bc2'] = "Compliance";
		$data['bch1'] = "Financials, FCRA 
		 <br> <span>& Compliance</span>";
		$data['bch2'] = "of Swasti";

		$this->load->view('front_end/index',$data);
	
	}
	public function resources()
	{      //echo "yss";exit;
		$condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);
		
			$data['page'] = "resources";
		
		

		$data['resources']=	$this->swasti_model->resources();
		$data['title'] = "Resources";
		$data['bc1'] = "";
		$data['bc2'] = "Resources";
		$data['bch1'] = "In the 
		<br><span> News </span>";
		$data['bch2'] = "of Swasti";

		$this->load->view('front_end/index',$data);
	
	}

	public function teamfilter()
	{
		//echo trim($_POST['name']);exit();
		
		if(!empty($_POST['name']))
		{
		//$status=array('status'=>1);
		 $team=$this->swasti_model->deparmentwisefilter("team",$_POST['name']);
		
		  
		}
		else
		{
		 $where=array('status'=>1);
		 $team=$this->swasti_model->workarea("team",$where);
		}
		
		 foreach ($team as $member) {?>
		 	<div class="col-xl-3 col-md-6 col-12 py-5 team-image">
                    <div class="people-background">
                        
                        <img class="people-image" src="<?php echo base_url('uploads/team/'.$member['dp']); ?>">
                    </div>
                    <h4 class="bold-700-title pt-4 w-100 text-center name"><?php echo $member['name'];?></h4>
                    <p class="text-center w-100 details"><?php echo $member['designation'];?></p>
                    </a>
                    <div class="text-center">
                        <a class="bold-pink-spread-text view" href="<?php echo base_url('our_team_details/'.$member['team_id']);?>">VIEW PROFILE</a>
                    </div>
                </div>
		 	
		 <?php }
	}

		/*public function nofilter()
	{
		
		$where=array('status'=>1);
		 $team=$this->swasti_model->workarea("team",$where);
		 foreach ($team as $member) {?>
		 	<div class="col-xl-3 col-md-6 col-12 py-5 team-image">
                    <div class="people-background">
                      
                        <img class="people-image" src="<?php echo base_url('uploads/team/'.$member['dp']); ?>">
                    </div>
                    <h4 class="bold-700-title pt-4 w-100 text-center name"><?php echo $member['name'];?></h4>
                    <p class="text-center w-100 details"><?php echo $member['designation'];?></p>
                    </a>
                    <div class="text-center">
                        <a class="bold-pink-spread-text view" href="<?php echo base_url('our_team_details/'.$member['team_id']);?>">VIEW PROFILE</a>
                    </div>
                </div>
		 	
		 <?php }
	}*/

	public function our_team_details()
	{   
		///echo $this->uri->segment(2);exit;
        $data['team_member']=	$this->swasti_model->team_member($this->uri->segment(2));
		$condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);
		$data['page'] = "our_team_details";
		$data['title'] = "Humans for Swasti";
		$data['bc1'] = "About Swasti";
		$data['bc2'] = "Our Team";
		$data['bch1'] = "<span>Humans</span><br>of Swasti";
		$data['bch2'] = "of Swasti";

		$this->load->view('front_end/index',$data);
	
	}

	public function our_work()
	{   
		
		$condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);		
		$data['page'] = "our_work";
		$data['title'] = "IT all begins";
		$data['bc1'] = "Our Work";
		$data['bch1'] = "What<br>we <span>do</span>";
		$data['bch2'] = "we do";

		$this->load->view('front_end/index',$data);
	
	}

	public function primary_health()
	{   
		
		$data['post']=	$this->swasti_model->post($this->segment);
		$data['posts']=	$this->swasti_model->posts();
		$condi=array('status'=>1);
		$data['workarea']=$this->swasti_model->workarea("workareas",$condi);
		$data['page'] = "primary_health";
		$data['title'] = "IT all begins";
		$data['bc1'] = "Our Work";
		$data['bc2'] = $data['post']['blog_name'];
		$data['bch1'] = $data['post']['blog_title'];
		$data['bch2'] = "";

		$this->load->view('front_end/index',$data);
	
	}

	public function press()
	{   
		$condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);
		$data['news']=	$this->swasti_model->news();
		$data['content']=	$this->swasti_model->news_content();

		$data['page'] = "press";
		$data['title'] = "In the news";
		$data['bc1'] = "Press";
		//$data['bc2'] = "";
		$data['bch1'] = "In the<br><span>News</span>";
		$data['bch2'] = "";

		$this->load->view('front_end/index',$data);
	
	}

	public function swasti_response_to_covid()
	{   
		
		$condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);		
		$data['page'] = "swasti_response_to_covid";
		$data['title'] = "Building Back Better";
		$data['bc1'] = "COVID-19";
		$data['bc2'] = "Swasti’s Response To COVID-19";
		$data['bch1'] = "Building Back<br><span>Better</span>";
		$data['bch2'] = "Better";

		$this->load->view('front_end/index',$data);
	
	}

	public function the_swasti_story()
	{   
		
		$condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);		
		$data['page'] = "the_swasti_story";
		$data['title'] = "100 Millions Well Thy Day";
		$data['bc1'] = "About Swasti";
		$data['bc2'] = "The Swasti Story";
		$data['bch1'] = "<span>100 Million</span><br>Well-thy Days";
		$data['bch2'] = "Well-thy Days";

		$this->load->view('front_end/index',$data);
	
	}
	public function legal()
	{   
			
		$condi=array('status'=>1);
        $data['workarea']=$this->swasti_model->workarea("workareas",$condi);		
		$data['page'] = "legal";
		$data['title'] = "Privacy Policy";
		$data['bc1'] = "Legal";
		$data['bch1'] = "Privacy<br><span>Policy</span>";
		$data['bch2'] = "";

		$this->load->view('front_end/index',$data);
	
	}

	public function resourcefilter()
	{
		//echo trim($_POST['name']);exit();
		
		if(!empty($_POST['name']))
		{
		$resource_ids = [];
		 $cats=$this->swasti_model->categorywiseresourcefilter("resources_category_wise",$_POST['name']);
		  foreach($cats as $cat)
		  {
		  	$resource_ids[]=$cat['resource_id'];
		  }

		  $team=$this->swasti_model->categorywiseresource("resources",$resource_ids);
		  
		}
		else
		{
		 
		 $team=$this->swasti_model->resources();
		}

		//print_r($team);exit;

		 foreach ($team as $resource) {?>
		  <div class="col-xl-3 col-md-6 col-12">
                <div class="resources-contend">
                <img src="<?php echo base_url('uploads/resources/'.$resource['icon']);?>" alt="" width="80" height="80">
                    <h5 class="resources-title pl-4 pt-1"><a href="<?php echo base_url('uploads/resources/'.$resource['resource_file']);?>" target="_blank"><?php echo $resource['title'];?></a></h5>
                    <p class="contend-date pl-4"><?php echo date('d M Y', strtotime($resource['date']));?></p>
                </div>
		 	</div>
		 <?php }
	}

	
	
	}
?>
