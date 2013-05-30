<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favorite extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '我的收藏';
		$this->data['cur_title'] = '8';
		$this->data['user'] = $this->session->userdata('nickname');
		
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
		$this->load->model('user_mdl');
	}
	
	public function index()
	{ 
		$userid = $this->session->userdata('id');
		$this->data['userid']= $userid;
		$this->data['shop_entries']=$this->user_mdl->get_user_favorite_num($userid,1);
		$this->data['doc_entries']=$this->user_mdl->get_user_favorite_num($userid,0);
		$this->data['pageNum'] = 1;
		$this->load->view('favorite',$this->data);
	}
}
