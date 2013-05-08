<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Rating_mdl extends CI_Model {
	public function __construct()
	{
		parent:: __construct();
	}
	public function add_rating($data)
	{
		$this->db->insert('rating',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function update_rating($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('rating',$data);
		return ($this->db->affected_rows() > 0) ? 1 : 0;
	}

	public function delete_rating($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('rating');
		return TRUE;
	}
}