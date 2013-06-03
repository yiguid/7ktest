<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printhistory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '历史印单';
		$this->data['cur_title'] = '4';
		$this->data['user'] = $this->session->userdata('nickname');
		
		$this->load->model('user_mdl');
		
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
	}
	
	public function index()
	{
		$perpage = 10;
		$userid  = $this->session->userdata('id');
		$total_rows = $this->user_mdl->get_user_printhistory_total($userid);
		$this->data['perpage']    = $perpage;
		$this->data['userid']     = $userid;
		$this->data['total_rows'] = $total_rows;
		$this->load->view('printhistory',$this->data);
	}
}
