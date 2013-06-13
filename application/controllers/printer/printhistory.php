<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printhistory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '全部任务';
		$this->data['user'] = $this->session->userdata('nickname');
		
		$this->load->model('printer_mdl');
		
		if(!$this->auth->printer_logged_in())
		{
			redirect('printer/login','refresh');
		}
	}
	
	public function index()
	{
		//$this->display(1);
		//$this->data['printhistorylist'] = $this->printer_mdl->get_printer_printhistory($this->session->userdata('id')); 
		//$this->load->view('printer/printhistory',$this->data);
		$this->data['pterid']=$this->session->userdata('id');
		$this->data['total'] = $this->printer_mdl->get_printer_printhistory_total($this->session->userdata('id'));
		$this->data['perpage'] = 10; 
		$this->load->view('printer/printhistory',$this->data);
	}

	public function method($method)
	{
		$this->data['pterid']=$this->session->userdata('id');
		$this->data['total'] = $this->printer_mdl->get_printer_printhistory_total_by_method($this->session->userdata('id'),$method);
		$this->data['perpage'] = 10;
		$this->data['method'] = $method;
		if($method == 'self')
			$this->data['page_title'] = '自行取印任务';
		else if($method == 'campus')
			$this->data['page_title'] = '校园送印任务';
		else if($method == 'express')
			$this->data['page_title'] = '快递送印任务';
		$this->load->view('printer/printhistory_method',$this->data);
	}

	public function display($curPage)
	{
		$per_page = 10;
		$start = ($curPage - 1)*$per_page; 
		$total_rows = $this->printer_mdl->get_printer_printhistory_total($this->session->userdata('id'));
		$maxPage =  ceil ( $total_rows  / $per_page);
		if($curPage < 1 || $curPage > $maxPage)
		{
			redirect(base_url().'printer/printhistory/display/1');
		}
		$this->data['printhistorylist'] = $this->printer_mdl->get_printer_printhistory($this->session->userdata('id'),$per_page,$start); 
		$this->data['curPage'] = $curPage;
		$this->data['maxPage'] = $maxPage;
		$this->data['debug'] = $per_page."...".$start."...".$total_rows;
		$this->load->view('printer/printhistory',$this->data);
	}
}
