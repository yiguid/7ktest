<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doc extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = '打印店首页';
		$username = $this->session->userdata('nickname');
		if($username != "")
			$this->data['user'] = $username;
		$this->load->model('shop_mdl');
	}
	
	public function index()
	{
		$this->display("0-1");
	}
	public function display($str)
	{
		//check数据合法性
		//$str结构：类别id-页码
		$arr = explode('-', "$str");
		$docClassid = $arr[0];
		$curPage = $arr[1];
		$this->data['docClassid']=$docClassid;
		$this->data['curPage']=$curPage;
		$this->load->view('shop/doc_view',$this->data);
	}
}