<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '个人中心';
		$this->data['user'] = $this->session->userdata('nickname');
		$this->load->model('transaction_mdl');
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
	}
	
	public function index()
	{
		$this->data['total'] = $this->transaction_mdl->get_total_by_userid($this->session->userdata('id'));
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

	public function recharge(){
		$this->data['page_title'] = '账户充值';
		$this->load->view('manage/recharge',$this->data);
	}

	public function money(){
		$this->data['page_title'] = '收支明细';
		//获取数据
		$this->data['translist'] = $this->transaction_mdl->get_transactions_by_userid($this->session->userdata('id'));
		$this->data['total'] = $this->transaction_mdl->get_total_by_userid($this->session->userdata('id'));
		$this->load->view('manage/transactionhistory',$this->data);
	}

	public function safe(){
		$this->data['page_title'] = '账户保护';
		$this->load->view('contruction',$this->data);
	}
}
