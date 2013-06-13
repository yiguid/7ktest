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

	//由关键词获取文档列表
	public function get_documents_by_keyword($keywords,$line,$start)
	{
		$this->db->select('*');
		$this->db->from('specialdoc');
		$this->db->like('name',$keywords);
		$this->db->limit($line,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//由关键词获取文档列表总数
	public function get_documents_by_keyword_total($keywords)
	{
		$this->db->select('count(*) as total');
		$this->db->from('specialdoc');
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