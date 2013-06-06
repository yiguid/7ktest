<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documenthistory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '历史文件';
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
		$pterid = $this->session->userdata('id');
		$total_rows = $this->printer_mdl->get_printer_documenthistory_total($pterid);
		$perpage = 10;
		$this->data['pterid'] = $pterid;
		$this->data['total_rows'] = $total_rows;
		$this->data['perpage'] = $perpage;
		$this->load->view('printer/documenthistory',$this->data);

	}
	public function display($curPage)
	{
		$per_page = 10;
		$start = ($curPage - 1)*$per_page; 
		$total_rows = $this->printer_mdl->get_printer_documenthistory_total($this->session->userdata('id'));
		$maxPage =  ceil ( $total_rows  / $per_page);
		if($curPage < 1 || $curPage > $maxPage)
		{
			//redirect(base_url().'printer/documenthistory/display/1');
		}
		$this->data['documenthistorylist'] = $this->printer_mdl->get_printer_documenthistory($this->session->userdata('id'),$per_page,$start); 
		$this->data['curPage'] = $curPage;
		$this->data['maxPage'] = $maxPage;
		$this->data['debug'] = $per_page."...".$start."...".$total_rows;
		$this->load->view('printer/documenthistory',$this->data);

	}
}