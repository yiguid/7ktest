<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '个人中心';
		$this->data['user'] = $this->session->userdata('nickname');
		
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
	}
	
	public function index()
	{
		//$this->data['printerlist'] = $this->printer_mdl->get_printer(); 
		$this->load->view('manage',$this->data);
	}

	public function changepwd(){
		$this->data['page_title'] = '修改密码';
		$this->load->view('manage/changepwd',$this->data);
	}

	public function address(){
		$this->data['page_title'] = '我的地址';
		$this->load->view('manage/address',$this->data);
	}
}
