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

	public function get_avg_rating($destid,$type)
	{
		//0表示文档评价，1表示店铺评价
		$this->db->select('avg(rating) as score');
		$this->db->from('rating');
		$this->db->where('destid',$destid);
		$this->db->where('type',$type);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				if($row->score == NULL){
					return 0;
				}
				else
				{
					return $row->score;
				}
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
	public function rate($userid,$pterid,$type,$rating)
	{
		$data = array(	'userid' => $userid,
						'destid' => $pterid,
						'type'=>$type,
						'rating'=>$rating
				);
		$this->db->insert('rating',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
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
	public function is_add_favorite($userid,$pterid,$type)
	{
		//0表示文档，1表示店铺
		$this->db->select('*');
		$this->db->from('favorite');
		$this->db->where('userid',$userid);
		$this->db->where('favoriteid',$pterid);
		$this->db->where('type',$type);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return true;
		}
		return false;
	}
	public function add_favorite($userid,$pterid,$type)
	{
		//0表示文档，1表示店铺
		$data = array(	'type' => $type,
						'userid' => $userid,
						'favoriteid'=>$pterid
				);
		$this->db->insert('favorite',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
}