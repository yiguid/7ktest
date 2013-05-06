<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Shop_mdl extends CI_Model {
	public function __construct()
	{
		parent:: __construct();
	}
	public function getDoc($docClassID,$line,$start)
	{
		
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

}