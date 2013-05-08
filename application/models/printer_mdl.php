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
				'level' => $result->level,
				'user_type' => 'printer'
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

	public function update_printer($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('printer',$data);
		return ($this->db->affected_rows() > 0) ? 1 : 0;
	}

	//获取打印店表
	public function get_printer()
	{
		$this->db->select('*');
		$this->db->from('printer');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_printer_by_location($location){
		$this->db->select('*');
		$this->db->from('printer');
		$this->db->like('location',$this->config->item($location));
		$query = $this->db->get();
		return $query->result();
	}

	public function get_printer_by_username($printer_username){
		$this->db->select('*');
		$this->db->from('printer');
		$this->db->where('username',$printer_username);
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
	
	public function get_printer_printhistory($printerid,$line,$start)
	{
		$this->db->select('printtask.id as id, status,printtask.cost as cost,user.nickname as username, count(printtasksetting.id) as documentnum,createtime,finishtime');
		$this->db->from('printtask');
		$this->db->join('user','user.id=printtask.userid');
		$this->db->join('printtasksetting','printtask.id=printtasksetting.printtaskid');
		$this->db->where('printtask.printerid',$printerid);
		$this->db->group_by('printtask.id');
		$this->db->limit($line,$start);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_printer_printhistory_total($printerid)
	{
		$this->db->select('id');
		$this->db->from('printtask');
		$this->db->where('printerid',$printerid);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_printer_documenthistory($printerid,$line,$start)
	{
		$this->db->select('document.id as docid,document.name as docname,keyword,document.type as doctype,user.nickname as username,size,url,uploadtime');
		$this->db->from('document');
		$this->db->join('printtasksetting','document.id = printtasksetting.documentid');
		$this->db->join('printtask','printtasksetting.printtaskid = printtask.id');
		$this->db->join('user','user.id=document.uploaduserid');
		$this->db->where('printtask.printerid',$printerid);
		$this->db->limit($line,$start);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_printer_documenthistory_total($printerid)
	{
		$this->db->select('count(*) as total');
		$this->db->from('document');
		$this->db->join('printtasksetting','document.id=printtasksetting.documentid');
		$this->db->join('printtask','printtasksetting.printtaskid = printtask.id');
		$this->db->where('printtask.printerid',$printerid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->total;
			}
		}

		return 0;
	}
	
	public function get_user_printtask($printerid, $id)
	{
		$this->db->select('printtask.id as id, status, printtask.address as address, printtask.mobile as mobile, delivertime, remark, printtask.receipt as receipt, printtask.cost as cost,user.nickname as username, count(printtasksetting.id) as documentnum,createtime,finishtime');
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

	public function get_papersize_option($printer_id){
		if($printer_id == "")
			return array(
		                'A4'  => 'A4',
		                'B5'  => 'B5'
		                );
		else{
			$this->db->select('papersize');
			$this->db->from('printer_meta');
			$this->db->where('printerid',$printer_id);
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$option = array();
				$temp = explode("|", $row->papersize);
				foreach ($temp as $opt) {
					$key = substr($opt, 0, strpos($opt, ','));
					$option[$key] = $key;
				}
			}
			return $option;
		}
	}

	public function get_isdoubleside_option($printer_id){
		if($printer_id == "")
			return array(
						'单面'  => '单面',
		                '双面'  => '双面'
		                );
		else{
			$this->db->select('isdoubleside');
			$this->db->from('printer_meta');
			$this->db->where('printerid',$printer_id);
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$option = array();
				$temp = explode("|", $row->isdoubleside);
				foreach ($temp as $opt) {
					$key = substr($opt, 0, strpos($opt, ','));
					$option[$key] = $key;
				}
			}
			return $option;
		}
	}

	public function get_zhuangding_option($printer_id){
		if($printer_id == "")
			return array(
						'普通'  => '普通',
		                '精装'  => '精装'
		                );
		else{
			$this->db->select('zhuangding');
			$this->db->from('printer_meta');
			$this->db->where('printerid',$printer_id);
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$option = array();
				$temp = explode("|", $row->zhuangding);
				foreach ($temp as $opt) {
					$key = substr($opt, 0, strpos($opt, ','));
					$option[$key] = $key;
				}
			}
			return $option;
		}
	}

	//由关键词获取打印店列表
	public function get_printer_by_keyword($keywords,$line,$start)
	{
		$this->db->select('*');
		$this->db->from('printer');
		$this->db->like('name',$keywords);
		$this->db->limit($line,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//由关键词获取打印店列表总数
	public function get_printer_by_keyword_total($keywords)
	{
		$this->db->select('count(*) as total');
		$this->db->from('printer');
		$this->db->like('name',$keywords);
		
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