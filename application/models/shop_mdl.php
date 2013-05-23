<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Shop_mdl extends CI_Model {
	public function __construct()
	{
		parent:: __construct();
	}
	public function getDoc($docClassID,$line,$start)
	{
		
	}

	public function add_specialdoc($data){

	}

	public function get_specialdoc_info($documentid){
		$this->db->select('*');
		$this->db->from('specialdoc');
		$this->db->where('id',$documentid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();
			return $row;
		}
		return "error";
	}

	public function get_shop_specialdoc($pterid,$docClassid,$curPage,$numPerPage)
	{
		$this->db->select('*');
		$this->db->from('specialdoc');
		$this->db->where('uploadpterid',$pterid);
		$this->db->limit($numPerPage,($curPage-1)*$numPerPage);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_shop_msg_total($pterid)
	{
		$this->db->select('count(*) as total');
		$this->db->from('message');
		$this->db->where('pterid',$pterid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->total;
			}
		}
		return 0;
	}
	public function get_shop_msg($line,$start,$pterid)
	{
		$this->db->select('message.id as id, type ,content, date, time, nickname');
		$this->db->from('message');
		$this->db->join('user','message.uid = user.id');
		$this->db->where('pterid',$pterid);
		$this->db->limit($line,$start);
		$this->db->order_by("message.id",'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_shop_location($pterid)
	{
		$this->db->select('location');
		$this->db->from('printer');
		$this->db->where('id',$pterid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->location;
			}
		}
		return null;
	}
	public function get_shop_name($pterid)
	{
		$this->db->select('name');
		$this->db->from('printer');
		$this->db->where('id',$pterid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->name;
			}
		}
		return null;
	}
	public function get_shop_info($pterid)
	{
		$this->db->select('*');
		$this->db->from('printer');
		$this->db->where('id',$pterid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row;
			}
		}
		return null;
	}

	//add and update please reffer printer_mdl

	public function get_shop_rating($pterid)
	{
		//0表示文档评价，1表示店铺评价
		$this->db->select('avg(rating) as score');
		$this->db->from('rating');
		$this->db->where('destid',$pterid);
		$this->db->where('type',1);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->score;
			}
		}
		return 0;
	}

	public function get_doc_rating($docid)
	{
		//0表示文档评价，1表示店铺评价
		$this->db->select('avg(rating) as score');
		$this->db->from('rating');
		$this->db->where('destid',$docid);
		$this->db->where('type',0);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->score;
			}
		}
		return 0;	
	}
	public function write_rating($userid,$pterid,$type,$rating)
	{
		$data = array(	'type' => $type,
						'content' => $content,
						'date'=>$date,
						'time'=>$time,
						'uid'=>$uid,
						'pterid'=>$pterid
				);
	}
	public function is_rating_shop($userid,$pterid)
	{
		//0表示文档评价，1表示店铺评价
		$this->db->select('*');
		$this->db->from('rating');
		$this->db->where('userid',$userid);
		$this->db->where('destid',$pterid);
		$this->db->where('type',1);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return true;
		}
		return false;
	}
}