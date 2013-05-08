<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Favorite_mdl extends CI_Model {
	public function __construct()
	{
		parent:: __construct();
	}
	public function add_favorite($data)
	{
		$this->db->insert('favorite',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function update_favorite($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('favorite',$data);
		return ($this->db->affected_rows() > 0) ? 1 : 0;
	}

	public function delete_favorite($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('favorite');
		return TRUE;
	}
}