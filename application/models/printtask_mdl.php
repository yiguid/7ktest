<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Printtask_mdl extends CI_Model {

	public function __construct()
	{
		parent:: __construct();
	}
	
	//添加打印任务
	public function add_printtask($data)
	{
		$this->db->insert('printtask',$data);
		return ($this->db->affected_rows() > 0) ? mysql_insert_id() : 0;
	}
	//提交打印任务
	public function submit_printtask($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('printtask',$data);
		return ($this->db->affected_rows() > 0) ? mysql_insert_id() : 0;
	}

	//更新打印任务
	public function update_printtask($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('printtask',$data);
		return ($this->db->affected_rows() > 0) ? 1 : 0;
	}

	//添加打印任务单个文件设置
	public function add_printtasksetting($data)
	{
		$this->db->insert('printtasksetting',$data);
		return ($this->db->affected_rows() > 0) ? mysql_insert_id() : 0;
	}

	public function update_printtasksetting($printtaskid, $documentid, $data){
		$this->db->where('printtaskid',$printtaskid);
		$this->db->where('documentid',$documentid);
		$this->db->update('printtasksetting',$data);
		return ($this->db->affected_rows() > 0) ? 1 : 0;
	}

	//删除打印任务
	public function delete_printtask($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('printtask');
		return TRUE;
	}
	public function add_rating($data)
	{
		$this->db->insert('rating',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	public function get_rating($userid,$taskid)
	{
		$this->db->select('rating,msg');
		$this->db->from('rating');
		$this->db->where('userid',$userid);
		$this->db->where('type',2);
		$this->db->where('destid',$taskid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row;
			}
		}
		return null;
	}
	public function is_rating($userid,$taskid)
	{
		$this->db->select('*');
		$this->db->from('rating');
		$this->db->where('userid',$userid);
		$this->db->where('type',2);
		$this->db->where('destid',$taskid);
		$query = $this->db->get();
		return $query->num_rows();
	}
}
?>