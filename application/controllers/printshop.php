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
		//得到打印店信息
		$printer_id = $this->session->userdata('printer_id');
		$this->data['papersize_option'] = $this->printer_mdl->get_papersize_option($printer_id);
		$this->data['isdoubleside_option'] = $this->printer_mdl->get_isdoubleside_option($printer_id);
		$this->data['zhuangding_option'] = $this->printer_mdl->get_zhuangding_option($printer_id);	
		$this->load->view('profile',$this->data);
	}

	public function name($printer_username = "beihang")
	{
		//店铺信息加入session
		$this->session->set_userdata('printshop',$printer_username);
		$this->session->set_userdata('location',"");

		//得到现有打印店
		$this->data['printerlist'] = $this->printer_mdl->get_printer_by_username($printer_username); 
		//设置选择的打印店
		
		//得到打印店信息
		$printer_id = $this->session->userdata('printer_id');
		$this->data['papersize_option'] = $this->printer_mdl->get_papersize_option($printer_id);
		$this->data['isdoubleside_option'] = $this->printer_mdl->get_isdoubleside_option($printer_id);
		$this->data['zhuangding_option'] = $this->printer_mdl->get_zhuangding_option($printer_id);	
		$this->load->view('profile',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */