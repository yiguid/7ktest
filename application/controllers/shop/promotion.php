<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promotion extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = '打印店首页';
		$username = $this->session->userdata('nickname');
		if($username != "")
			$this->data['user'] = $username;
	}
	
	public function index()
	{
		$this->load->view('shop/promotion_view',$this->data);
	}
}