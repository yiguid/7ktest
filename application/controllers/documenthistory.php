<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documenthistory extends CI_Controller {

	private $total_rows;
	private $per_page;
	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '历史文件';
		$this->data['user'] = $this->session->userdata('nickname');
		
		$this->load->model('user_mdl');
		
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
		$this->per_page = 12;
	}
	
	public function index()
	{
		$this->display(1);

	}
	public function display($pagenum)
	{
		/*
		判断用户类型
		*/
		$this->total_rows = $this->user_mdl->get_user_documenthistory_total($this->session->userdata('id'));
		$maxPage = ceil ( $this->total_rows  / $this->per_page);
		if($pagenum > $maxPage || $pagenum < 1)
		{
			redirect(base_url().'documenthistory/display/1');
		}
		$start = ($pagenum - 1) * $this->per_page;
		$this->data['documenthistorylist'] = $this->user_mdl->get_user_documenthistory($this->session->userdata('id'),$this->per_page,$start);
		$this->data['curPage'] = $pagenum;
		$this->data['maxPage'] = $maxPage;
		$this->load->view('documenthistory',$this->data);

	}
}
