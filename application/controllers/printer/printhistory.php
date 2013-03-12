<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printhistory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '历史印单';
		$this->data['user'] = $this->session->userdata('nickname');
		
		$this->load->model('printer_mdl');
		
		if(!$this->auth->printer_logged_in())
		{
			redirect('printer/login','refresh');
		}
	}
	
	public function index()
	{
		$this->data['printhistorylist'] = $this->printer_mdl->get_printer_printhistory($this->session->userdata('id')); 
		$this->load->view('printer/printhistory',$this->data);
	}
}
