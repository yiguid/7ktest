<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User_mdl extends CI_Model {

	public function __construct()
	{
		parent:: __construct();
	}

	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('user');
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
				'nickname' => $result->nickname,
				'level' => $result->level,
				'user_type' => 'user'
				);
			 $this->session->set_userdata($session_data);
		}
		return TRUE;
	}

	//检测是否是admin
	public function admin($username)
	{
		$this->db->select('*');
		$this->db->where('username',$username);
		$query = $this->db->get('user');
		$result = $query->row();
		$num = $query->num_rows();
		if($num == 0)
			return FALSE;
		else
		{
			if($result->level == 99)
			{
				return TRUE;
			}
			return FALSE;
		}
	}

	//检测是否具有该页面访问权限
	public function check_permit($username,$page)
	{
		$this->db->select('*');
		$this->db->where('username',$username);
		$query = $this->db->get('userpermission');
		$result = $query->row();
		$num = $query->num_rows();
		if($num == 0)
			return FALSE;
		else
		{
			if($result->$page == 1)
			{
				return TRUE;
			}
			return FALSE;
		}
	}

	public function regist($data){
		return $this->add_user($data);
	}

	//添加用户
	public function add_user($data)
	{
		$this->db->insert('user',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	//获取用户表(包括权限)
	public function get_user()
	{
		$this->db->select('*');
		$this->db->from('user');
		//$this->db->order_by('time','desc');
		//$this->db->join('userpermission','userpermission.username = userinfo.username');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_user_printhistory($userid)
	{
		$this->db->select('printtask.id as id, status,printtask.cost as cost,printer.name as printername, count(printtasksetting.id) as documentnum,createtime,finishtime');
		$this->db->from('printtask');
		$this->db->join('printer','printer.id=printtask.printerid');
		$this->db->join('printtasksetting','printtask.id=printtasksetting.printtaskid');
		$this->db->where('printtask.userid',$userid);
		$this->db->group_by('printtask.id');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_user_documenthistory($userid)
	{
		$this->db->select('*');
		$this->db->from('document');
		$this->db->where('uploaduserid',$userid);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_user_printtask($userid, $id)
	{
		$this->db->select('printtask.id as id, status, address, mobile, delivertime, remark, receipt, printtask.cost as cost,printer.name as printername, count(printtasksetting.id) as documentnum,createtime,finishtime');
		$this->db->from('printtask');
		$this->db->join('printer','printer.id=printtask.printerid');
		$this->db->join('printtasksetting','printtask.id=printtasksetting.printtaskid');
		$this->db->where('printtask.id',$id);
		$this->db->where('printtask.userid',$userid);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_user_printtask_documents($userid, $id)
	{
		$this->db->select('*, printtasksetting.cost as cost');
		$this->db->from('printtasksetting');
		$this->db->join('printtask','printtask.id=printtasksetting.printtaskid');
		$this->db->join('document','document.id=printtasksetting.documentid');
		$this->db->where('printtask.id',$id);
		$this->db->where('printtask.userid',$userid);
		$query = $this->db->get();
		return $query->result();
	}

	
	//删除用户
	public function delete_user($username)
	{
		$this->db->where('username',$username);
		$this->db->delete('user');
		return TRUE;
	}

	//修改用户密码
	public function password($old_password,$password,$username)
	{
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password',$old_password);
		$query = $this->db->get('user');
		$result = $query->row();
		$num = $query->num_rows();

		if($num == 0)
		{
			return FALSE;
		}
		else
		{
			$data = array('password' => $password);
			$this->db->where('username',$username);
			if($this->db->update('user',$data))
				return TRUE;
			else 
				return FALSE;
		}
	}
}
?>