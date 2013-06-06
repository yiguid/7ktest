<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
		$this->data['page_title'] = '交易情况';
		$username = $this->session->userdata('nickname');
		if($username != "")
			$this->data['user'] = $username;
		$this->load->model('transaction_mdl');
	}
	
	public function index()
	{
		$this->load->view('manage/recharge',$this->data);
	}

	public function recharge()
	{
		$this->form_validation->set_rules('amount','充值金额','required|trim');
		$this->form_validation->set_rules('password','充值密码','required|trim');

		if($this->form_validation->run() == FALSE){
			$this->load->view('manage/recharge',$this->data);
		}else{
			$trans = array('userid' => $this->session->userdata('id'),
							'time' => date("Y-m-d H:i:s"),
							'info' => '充值卡充值',
							'amount' => $this->input->post('amount'),
							'status' => '充值成功'
				);
			$pwd = $this->input->post('password');
			$this->transaction_mdl->add_transaction($trans,$pwd);
			$this->data['trans_status'] = '充值成功';
			$this->session->set_userdata('user_money', $this->session->userdata('user_money') + $this->input->post('amount'));
			$this->load->view('manage/recharge',$this->data);
		}
	}
}
