<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Place extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = '切换地址';
		$username = $this->session->userdata('nickname');
		if($username != "")
			$this->data['user'] = $username;
	}
	
	public function index()
	{
		$this->load->view('place',$this->data);
	}
}
