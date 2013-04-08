<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printhistory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '历史印单';
		$this->data['user'] = $this->session->userdata('nickname');
		
		$this->load->model('user_mdl');
		
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
	}
	
	public function index()
	{
		$this->display(1);
	}
	public function display($curPage)
	{
		$per_page = 10;
		$start = ($curPage - 1)*$per_page; 
		$total_rows = $this->user_mdl->get_user_printhistory_total($this->session->userdata('id'));
		$maxPage =  ceil ( $total_rows  / $per_page);
		if($curPage < 1 || $curPage > $maxPage)
		{
			redirect(base_url().'printhistory/display/1');
		}
		$this->data['printhistorylist'] = $this->user_mdl->get_user_printhistory($this->session->userdata('id'),$per_page,$start); 
		$this->data['curPage'] = $curPage;
		$this->data['maxPage'] = $maxPage;
		$this->data['debug'] = $per_page."...".$start."...".$total_rows;
		$this->load->view('printhistory',$this->data);
	}
}
