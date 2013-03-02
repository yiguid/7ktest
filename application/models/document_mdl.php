<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Document_mdl extends CI_Model {

	public function __construct()
	{
		parent:: __construct();
	}
	
	//添加文件
	public function add_document($data)
	{
		$this->db->insert('document',$data);
		return ($this->db->affected_rows() > 0) ? mysql_insert_id() : 0;
	}

	//删除打印店
	public function delete_document($name)
	{
		$this->db->where('name',$name);
		$this->db->delete('document');
		return TRUE;
	}
}
?>