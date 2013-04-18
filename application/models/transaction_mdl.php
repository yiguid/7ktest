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
		//待添加
		//验证通过加入
		$this->db->insert('transaction',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function submit_transaction($data)
	{
		$this->db->insert('transaction',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	//获取
	public function get_transactions_by_userid($userid)
	{
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->where('userid',$userid);
		$query = $this->db->get();
		return $query->result();
	}

	//获取
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
}
?>