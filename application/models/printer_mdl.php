<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Printer_mdl extends CI_Model {

	public function __construct()
	{
		parent:: __construct();
	}

	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('printer');
		$result = $query->row();
		$num = $query->num_rows();

		if($num == 0)
		{
			return FALSE;
		}
		else
		{
			$session_data = array(
				'id' => $result->id,
				'username' => $result->username,
				'nickname' => $result->name,
				'level' => $result->level
				);
			 $this->session->set_userdata($session_data);
		}
		return TRUE;
	}
	
	//添加打印店
	public function add_printer($data)
	{
		$this->db->insert('printer',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}


	//获取打印店表
	public function get_printer()
	{
		$this->db->select('*');
		$this->db->from('printer');
		$query = $this->db->get();
		return $query->result();
	}

	//删除打印店
	public function delete_printer($name)
	{
		$this->db->where('name',$name);
		$this->db->delete('printer');
		return TRUE;
	}
	
	public function get_printer_printhistory($userid)
	{
		$this->db->select('printtask.id as id, status,printtask.cost as cost,user.nickname as username, count(printtasksetting.id) as documentnum,createtime,finishtime');
		$this->db->from('printtask');
		$this->db->join('user','user.id=printtask.userid');
		$this->db->join('printtasksetting','printtask.id=printtasksetting.printtaskid');
		$this->db->where('printtask.printerid',$userid);
		$this->db->group_by('printtask.id');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_user_printtask($printerid, $id)
	{
		$this->db->select('printtask.id as id, status, printtask.address as address, printtask.mobile as mobile, delivertime, remark, receipt, printtask.cost as cost,user.nickname as username, count(printtasksetting.id) as documentnum,createtime,finishtime');
		$this->db->from('printtask');
		$this->db->join('user','user.id=printtask.userid');
		$this->db->join('printtasksetting','printtask.id=printtasksetting.printtaskid');
		$this->db->where('printtask.id',$id);
		$this->db->where('printtask.printerid',$printerid);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_user_printtask_documents($printerid, $id)
	{
		$this->db->select('*, printtasksetting.cost as cost');
		$this->db->from('printtasksetting');
		$this->db->join('printtask','printtask.id=printtasksetting.printtaskid');
		$this->db->join('document','document.id=printtasksetting.documentid');
		$this->db->where('printtask.id',$id);
		$this->db->where('printtask.printerid',$printerid);
		$query = $this->db->get();
		return $query->result();
	}
}
?>