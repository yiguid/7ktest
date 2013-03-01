<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printtask extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '印单详情';
		$this->data['user'] = $this->session->userdata('nickname');
		
		$this->load->model('printer_mdl');
		
		if(!$this->auth->logged_in())
		{
			redirect('printer/login','refresh');
		}
	}
	
	public function index()
	{
		$this->data['printtaskinfo'] = $this->printer_mdl->get_user_printtask($this->session->userdata('id'), $this->input->get('id'));
		$this->data['documents'] = $this->printer_mdl->get_user_printtask_documents($this->session->userdata('id'), $this->input->get('id'));
		$this->load->view('printer/printtask',$this->data);
	}
}
