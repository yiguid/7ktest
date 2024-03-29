<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User_mdl extends CI_Model {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('transaction_mdl');
	}

	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password',md5($password.$this->config->item('encryption_key')));
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
				'user_mobile' => $result->mobile,
				'user_province' => $result->province,
				'user_city' => $result->city,
				'user_address' => $result->address,
				'user_receipt' => $result->receipt,
				'user_zipcode' => $result->zipcode,
				'user_receiver' => $result->receiver,
				'user_money' => $this->transaction_mdl->get_total_by_userid($result->id),
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

	//判断用户是否存在
	public function if_exist($username)
	{
		$this->db->select('*');
		$this->db->where('username',$username);
		$query = $this->db->get('user');
		$result = $query->row();
		$num = $query->num_rows();
		if($num == 0)
			return FALSE;
		else
			return TRUE;
	}

	//添加用户
	public function add_user($data)
	{
		$encryption_key = $this->config->item('encryption_key');
		$data['id'] = $data['username'];
		$data['password'] = md5($data['password'].$encryption_key);
		if(!$this->if_exist($data['username']))
		{
			$this->db->insert('user',$data);
			if ($this->db->affected_rows() > 0){
				//赠送一定金额
				
				return TRUE;
			}else
				return FALSE;
		}else
			return FALSE;
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
	
	public function get_user_printhistory($userid,$line,$start)
	{
		$this->db->select('printtask.id as id, status,printtask.cost as cost,printer.name as printername, count(printtasksetting.id) as documentnum,createtime,finishtime');
		$this->db->from('printtask');
		$this->db->join('printer','printer.id=printtask.printerid');
		$this->db->join('printtasksetting','printtask.id=printtasksetting.printtaskid');
		$this->db->where('printtask.userid',$userid);
		$this->db->group_by('printtask.id');
		$this->db->limit($line,$start);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_user_printhistory_total($userid)
	{
		$this->db->select('id');
		$this->db->from('printtask');
		$this->db->where('userid',$userid);
		$this->db->where('printerid is not null');
		$query = $this->db->get();
		return $query->num_rows();

	}

	public function get_user_documenthistory($userid,$line,$start)
	{
		$this->db->select('*');
		$this->db->from('document');
		$this->db->where('uploaduserid',$userid);
		$this->db->limit($line,$start);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_user_documenthistory_total($userid)
	{
		$this->db->select('count(*) as total');
		$this->db->from('document');
		$this->db->where('uploaduserid',$userid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->total;
			}
		}

		return 0;
	}
	public function get_user_printtask($userid, $id)
	{
		$this->db->select('printtask.id as id, status, method, receiver, printtask.address as address, mobile, delivertime, remark, receipt, printtask.cost as cost,printer.name as printername, count(printtasksetting.id) as documentnum,createtime,finishtime,daodianyin');
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

	public function get_user_printtask_specialdocs($userid, $id)
	{
		$this->db->select('*, printtasksetting.cost as cost, specialdoc.page as page');
		$this->db->from('printtasksetting');
		$this->db->join('printtask','printtask.id=printtasksetting.printtaskid');
		$this->db->join('specialdoc','specialdoc.id=printtasksetting.documentid');
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
		$this->db->where('password',md5($old_password.$this->config->item('encryption_key')));
		$query = $this->db->get('user');
		$result = $query->row();
		$num = $query->num_rows();

		if($num == 0)
		{
			return FALSE;
		}
		else
		{
			$data = array('password' => md5($password.$this->config->item('encryption_key')));
			$this->db->where('username',$username);
			if($this->db->update('user',$data))
				return TRUE;
			else 
				return FALSE;
		}
	}

	public function address($userid,$receiver,$mobile,$zipcode,$province,$city,$address,$receipt)
	{
		$data = array('mobile'=>$mobile,
			'receiver'=>$receiver,
			'zipcode'=>$zipcode,
			'province'=>$province,
			'city'=>$city,
			'address'=>$address,
			'receipt'=>$receipt
			);
		$this->db->where('id',$userid);
		if($this->db->update('user',$data))
		{
			$session_data = array(
				'user_receiver' => $receiver,
				'user_zipcode' => $zipcode,
				'user_mobile' => $mobile,
				'user_province' => $province,
				'user_city' => $city,
				'user_address' => $address,
				'user_receipt' => $receipt
				);
			$this->session->set_userdata($session_data);
			return TRUE;
		}
		else 
			return FALSE;
	}
	public function get_user_favoriteshop($start,$line,$userid)
	{
		$sql = "select id, name,location,online,servicestart,serviceend,address,contact ".
		"from printer where id in (select favoriteid from favorite where type =1 and userid = ?) ".
		"limit ?, ?";
		$query=$this->db->query($sql, array($userid, $start, $line));
		return $query->result();
	}
	public function get_user_favoritedoc($start,$line,$userid)
	{
		$sql = "select specialdoc.id as docid, specialdoc.name as docname,size,price,page,description,printer.id as pterid,printer.name as ptername ".
				"from specialdoc,printer ".
				"where specialdoc.uploadpterid=printer.id ".
				"and specialdoc.id in (select favoriteid from favorite where type =0 and userid = ?) ".
				"limit ?, ?";
		$query=$this->db->query($sql, array($userid, $start, $line));
		return $query->result();
	}
	public function get_user_favorite_num($userid,$type)
	{
		$this->db->select('count(*) as total');
		$this->db->from('favorite');
		$this->db->where('userid',$userid);
		$this->db->where('type',$type);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->total;
			}
		}
		return 0;
	}
}
?>