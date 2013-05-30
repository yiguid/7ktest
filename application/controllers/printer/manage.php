<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['user'] = $this->session->userdata('nickname');
		$this->load->model('printer_mdl');
		$this->load->model('transaction_mdl');
		if(!$this->auth->printer_logged_in())
		{
			redirect('printer/login','refresh');
		}
	}
	
	public function index()
	{
		$this->data['page_title'] = '打印店中心';
		//$this->data['printerlist'] = $this->printer_mdl->get_printer(); 
		$this->load->view('printer/manage',$this->data);
	}

	public function info()
	{
		$this->data['page_title'] = '基本信息';
		$this->data['printer_info']=$this->printer_mdl->get_printer_by_username($this->session->userdata('username'));
		$this->load->view('printer/info',$this->data);
	}

	public function yewu()
	{
		$this->data['page_title'] = '业务管理';
		$this->load->view('printer/yewu',$this->data);
	}

	public function rating()
	{
		$this->data['page_title'] = '信誉评价';
		$this->load->view('printer/rating',$this->data);
	}

	public function money()
	{
		$this->data['page_title'] = '财务管理';
		$this->data['perpage']=10;
		$this->data['pterid'] = $this->session->userdata('id');
		$this->data['total'] = $this->transaction_mdl->get_total_by_pterid($this->session->userdata('id'));
		$this->load->view('printer/money',$this->data);
	}

	public function password()
	{
		$this->data['page_title'] = '修改密码';
		$this->load->view('printer/password',$this->data);
	}
}
