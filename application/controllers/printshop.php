<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printshop extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '首页';
		$this->data['user'] = $this->session->userdata('nickname');

		$this->load->model('printer_mdl');
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
	}
	
	public function index()
	{
		//得到现有打印店
		$this->data['printerlist'] = $this->printer_mdl->get_printer(); 
		$this->load->view('profile',$this->data);
	}

	public function name($printer_username = "beihang")
	{
		//店铺信息加入session
		$this->session->set_userdata('printshop',$printer_username);
		$this->session->set_userdata('location',"");

		//得到现有打印店
		$this->data['printerlist'] = $this->printer_mdl->get_printer_by_username($printer_username); 
		$this->load->view('profile',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */