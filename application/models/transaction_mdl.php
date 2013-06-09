<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Transaction_mdl extends CI_Model {

	public function __construct()
	{
		parent:: __construct();
	}
	//添加transaction
	public function add_transaction($data,$password)
	{
		//验证password
		if($password == '7ktest')
		{
		//待添加
		//验证通过加入
		$this->db->insert('transaction',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
		}else
			return FALSE;
	}

	public function submit_transaction($data)
	{
		$this->db->insert('transaction',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	//获取
	public function get_transactions_by_userid($start,$line,$userid)
	{
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->where('userid',$userid);
		$this->db->limit($line,$start);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_total_tran_by_userid($userid)
	{
		$this->db->select('count(*) as total');
		$this->db->from('transaction');
		$this->db->where('userid',$userid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->total;
			}
		}
	}

	public function get_transactions_by_pterid($start,$line,$pterid)
	{
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->where('pterid',$pterid);
		$this->db->limit($line,$start);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_total_tran_by_pterid($pterid)
	{
		$this->db->select('count(*) as total');
		$this->db->from('transaction');
		$this->db->where('pterid',$pterid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->total;
			}
		}
	}


	public function get_total_by_userid($userid)
	{
		$this->db->select('sum(amount) as total');
		$this->db->from('transaction');
		$this->db->where('userid',$userid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->total;
			}
		}
	}

	//获取
	public function get_total_by_pterid($pterid)
	{
		$this->db->select('sum(amount) as total');
		$this->db->from('transaction');
		$this->db->where('pterid',$pterid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->total;
			}
		}
	}
}
?>