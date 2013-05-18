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

	public function add_rating($rating)
	{
		$this->db->insert('rating',$rating);
		return ($this->db->affected_rows() > 0) ? mysql_insert_id() : 0;
	}
}
?>