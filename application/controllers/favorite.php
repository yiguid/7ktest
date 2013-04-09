<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favorite extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '我的收藏';
		$this->data['user'] = $this->session->userdata('nickname');
		
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
	}
	
	public function index()
	{ 
		$this->load->view('contruction',$this->data);
	}
}
