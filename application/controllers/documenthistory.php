<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documenthistory extends CI_Controller {

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
	}
	
	public function index()
	{
		$this->data['documenthistorylist'] = $this->user_mdl->get_user_documenthistory($this->session->userdata('id'));
		$this->load->view('documenthistory',$this->data);
	}
}
