<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '打印店中心';
		$this->data['user'] = $this->session->userdata('nickname');
		
		if(!$this->auth->logged_in())
		{
			redirect('printer/login','refresh');
		}
	}
	
	public function index()
	{
		//$this->data['printerlist'] = $this->printer_mdl->get_printer(); 
		$this->load->view('printer/manage',$this->data);
	}
}
