<?php
/*
 * Created on 2013-3-20
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Feedback_mdl extends CI_Model {
	//添加消息
	private $msgTableName = 'message';
	private $rpyTableName = 'reply';

	public function set_table_name($msgTName,$rpyTName)
	{
		$this->msgTableName = $msgTName;
		$this->rpyTableName = $rpyTName;
	}
	public function get_msg_table_name()
	{
		return $this->msgTableName;
	}
	public function get_rpy_table_name()
	{
		return $this->rpyTableName;
	}
	public function add_msg($type,$content,$date,$time,$uid,$pterid)
	{
		$data = array(	'type' => $type,
						'content' => $content,
						'date'=>$date,
						'time'=>$time,
						'uid'=>$uid,
						'pterid'=>$pterid
				);
		$this->db->insert($this->msgTableName,$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	public function del_msg($msgid)
	{
		$this->db->where('id', $msgid);
		$this->db->delete($this->msgTableName);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	public function get_msg($line,$start)
	{
		$this->db->select('message.id as id, type ,content, date, time, nickname');
		$this->db->from('message');
		$this->db->join('user','message.uid = user.id');
		$this->db->limit($line,$start);
		$this->db->order_by("message.id",'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_shop_msg($line,$start,$pterid)
	{
		$this->db->select('message.id as id, type ,content, date, time, nickname');
		$this->db->from('message');
		$this->db->join('user','message.uid = user.id');
		$this->db->where('pterid',$pterid);
		$this->db->limit($line,$start);
		$this->db->order_by("message.id",'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_msg_by_id($msgid)
	{
		$this->db->select('message.id as id, type ,content, date, time, nickname');
		$this->db->from('message');
		$this->db->join('user','message.uid = user.id');
		$this->db->where('message.id',$msgid);
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			foreach($query->result() as $row)
			{
				return $row;
			} 
		}
		else
		{
			return false;
		}
		
	}
	public function get_msg_total()
	{
		return $this->db->count_all($this->msgTableName);
	}
	public function get_shop_msg_total($pterid)
	{
		$this->db->select('count(*) as total');
		$this->db->from('message');
		$this->db->where('pterid',$pterid);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row) {
				return $row->total;
			}
		}
		return 0;
	}
	public function add_rpy($content,$date,$time,$msgid,$floor,$uid)
	{
		$data = array(	'content' => $content,
						'date'=>$date,
						'time'=>$time,
						'msgid'=>$msgid,
						'floor'=>$floor,
						'uid'=>$uid
		);
		$this->db->insert($this->rpyTableName,$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	public function del_rpy($rpyid)
	{
		$this->db->where('id',$rpyid);
		$this->db->delete($this->rpyTableName);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	public function get_msg_all_rpy($msgid)
	{
		$this->db->select('content,date,time,floor,nickname');
		$this->db->from('reply');
		$this->db->join('user','reply.uid = user.id');
		$this->db->where('msgid',$msgid);
		$this->db->order_by("floor");
		$query = $this->db->get();
		return $query->result();		
	}
}
?>
