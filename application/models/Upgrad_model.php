<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upgrad_Model extends CI_Model {

	

	public function yearbooks()
	{
		$this->db->select("*");
		$qry=$this->db->get('yearbook');
		return $qry->result_array();
	}

	public function yearbook($slug)
	{
		$this->db->select("*");
		$this->db->where("slug",$slug);
		$qry=$this->db->get('yearbook');
		return $qry->row_array();
	}

	
	public function faculty($id)
	{
		$this->db->select("*");
		$this->db->where("yearbook_id",$id);
		$qry=$this->db->get('faculty_members');
		return $qry->result_array();
	}

	public function students($id)
	{
		$this->db->select("*");
		$this->db->where("yearbook",$id);
		$qry=$this->db->get('students');
		return $qry->result_array();
	}

	public function partner_cats($id)
	{
		$this->db->select("*");
		$this->db->where("partner_id",$id);
		$qry=$this->db->get('partners_category');
		return $qry->result_array();
	}

	public function partners_content()
	{
		$this->db->select("*");
		$this->db->where("section_id",8);
		$qry=$this->db->get('setting_table');
		return $qry->result_array();
	}

	public function team_members()
	{
		$this->db->select("*");
		$this->db->where("status",1);
		$qry=$this->db->get('team');
		return $qry->result_array();
	}

	public function team_members_cat($cat)
	{
		$this->db->select("*");
		$this->db->where("category",$cat);
		$qry=$this->db->get('team_distribution');
		return $qry->result_array();
	}

	public function team_content()
	{
		$this->db->select("*");
		$this->db->where("section_id",5);
		$qry=$this->db->get('setting_table');
		return $qry->result_array();
	}

	public function team_member($id)
	{
		$this->db->select("*");
		$this->db->where("team_id",$id);
		$qry=$this->db->get('team');
		return $qry->row_array();
	}

	public function collab_content()
	{
		$this->db->select("*");
		$this->db->where("section_id",9);
		$qry=$this->db->get('setting_table');
		return $qry->result_array();
	}

	public function post($id)
	{
		$this->db->select("*");
		$this->db->where("blogid",$id);
		$qry=$this->db->get('workareas');
		return $qry->row_array();
	}

	public function article($tab,$where)
	{
		$this->db->select("*");
		$this->db->where($where);
		$qry=$this->db->get($tab);
		return $qry->row_array();
	}

	public function posts()
	{
		$this->db->select("blogid,blog_name,blog_icon");
		$this->db->order_by("blogid",'asc');
		$qry=$this->db->get('workareas');
		return $qry->result_array();
	}

	public function allblog($tab)
	{
		$this->db->select("*");
		//$this->db->order_by("blogid",'asc');
		$qry=$this->db->get($tab);
		return $qry->result_array();

	}
	public function relateblog($tab,$id)
	{    //$querybuild="SELECT * FROM blog_details AS tt WHERE FIND_IN_SET($id ,tt.work_area) != 0 GROUP BY tt.blog_id LIMIT 0, 4";
	$querybuild="SELECT * FROM blog_details AS tt WHERE FIND_IN_SET($id ,tt.work_area) != 0 GROUP BY tt.blog_id ";
		 $query=$this->db->query($querybuild);
		 return $query->result_array();
	}
	/*public function relateblog($tab,$id)
	{    $querybuild="SELECT * FROM blog_details AS tt WHERE FIND_IN_SET($id ,tt.work_area) != 0 GROUP BY tt.blog_id";
		 $query=$this->db->query($querybuild);
		 return $query->result_array();
	}*/
	public function filterblogs($tab,$id)
	{    $querybuild="SELECT * FROM blog_details AS tt WHERE FIND_IN_SET($id ,tt.work_area) != 0 GROUP BY tt.blog_id";
		 $query=$this->db->query($querybuild);
		 return $query->result_array();
	}
	public function relatedblogcount($tab,$id)
	{    $querybuild="SELECT COUNT(tt.blog_id) FROM blog_details AS tt WHERE FIND_IN_SET($id ,tt.work_area) != 0 GROUP BY tt.blog_id;";
		 $query=$this->db->query($querybuild);
		 return $query->num_rows();
		 //return $query->result_array();
	}
	public function moreblog($tab,$id)
	{    $querybuild="SELECT * FROM blog_details AS tt WHERE FIND_IN_SET($id ,tt.work_area) != 0 GROUP BY tt.blog_id";
		 $query=$this->db->query($querybuild);
		 return $query->result_array();
	}
	public function relatedpartners($tab,$id)
	{   
		$this->db->select("*");
		$this->db->from('partners_category pct');
		$this->db->join('partners prt','pct.partner_id=prt.partner_id','inner');
		$this->db->where('pct.work_id',$id);
		$this->db->where('prt.status',1);
		$this->db->group_by('prt.name');
		$qry=$this->db->get();
		return $qry->result_array();
	}
	public function deparmentwisefilter($tab,$where)
	{
        $depart=explode(",",$where);
       // print_r($depart);exit;
		$this->db->select('*');
		$this->db->from($tab);
		$this->db->where_in('department',$depart);
			
		$qry=$this->db->get();
		return $qry->result_array();

	}


	public function blogcategory($tab,$where)
	{
		$this->db->select("*");
		$this->db->where($where);
		$qry=$this->db->get($tab);
		return $qry->result_array();
	}
	public function singlecategory($tab,$where)
	{
		$this->db->select("*");
		$this->db->where($where);
		$qry=$this->db->get($tab);
		return $qry->row_array();
	}

	public function news()
	{
		$this->db->select("*");
		$this->db->where("status",1);
		$qry=$this->db->get('news');
		return $qry->result_array();
	}

	public function news_content()
	{
		$this->db->select("*");
		$this->db->where("section_id",4);
		$qry=$this->db->get('setting_table');
		return $qry->result_array();
	}

	public function workarea($tab,$where)
	{
		$this->db->select("*");
		$this->db->from($tab);
		$this->db->where($where);
		$qry=$this->db->get();
		return $qry->result_array();
	}
	public function workareahome($tab,$where)
	{
		$this->db->select("*");
		$this->db->from($tab);
		$this->db->where($where);
		$this->db->limit(8);
		$qry=$this->db->get();
		return $qry->result_array();
	}

	public function team_membershome()
	{
		$this->db->select("*");
		$this->db->where("status",1);
		$this->db->limit(8);
		$qry=$this->db->get('team');
		return $qry->result_array();
	}


   public function financialtrports($type)
	{
			$this->db->select('*');
			$this->db->from('compliance');
			$this->db->where(array('type'=>$type));
			$query = $this->db->get();
			return $query->result_array(); 
	}

	public function fcra_reports($fcraid)
	{
		$this->db->select("*");
		$this->db->where(array('fcra_id'=>$fcraid));
		$qry=$this->db->get('fcra_reports');
		return $qry->result_array();
	}

	public function resources()
	{
		$this->db->select("*");
		$this->db->from('resources');
		$qry=$this->db->get();
		return $qry->result_array();
	}

	public function categorywiseresourcefilter($tab,$where)
	{
        $depart=explode(",",$where);
       // print_r($depart);exit;
		$this->db->select('*');
		$this->db->from($tab);
		$this->db->where_in('category',$depart);
			
		$qry=$this->db->get();
		return $qry->result_array();

	}

	public function categorywiseresource($tab,$where)
	{
        $res_id=$where;
       // print_r($depart);exit;
		$this->db->select('*');
		$this->db->from($tab);
		$this->db->where_in('id',$res_id);
			
		$qry=$this->db->get();
		return $qry->result_array();

	}
	


}
    