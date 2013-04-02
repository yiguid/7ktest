<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '首页';
		$this->data['user'] = $this->session->userdata('nickname');

		$this->load->model('user_mdl');
		$this->load->model('printer_mdl');
		
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
	}
	
	public function index()
	{
		//得到现有打印店
		//获取打印店信息
		$location = $this->session->userdata('location');
		$printshop = $this->session->userdata('printshop');
		if($location != "")
		    $this->data['printerlist'] = $this->printer_mdl->get_printer_by_location($location);
		else if($printshop != "")
		    $this->data['printerlist'] = $this->printer_mdl->get_printer_by_username($printshop);
		else
		    $this->data['printerlist'] = $this->printer_mdl->get_printer(); 
		//得到打印店信息
		$printer_id = $this->session->userdata('printer_id');
		$this->data['papersize_option'] = $this->printer_mdl->get_papersize_option($printer_id);
		$this->data['isdoubleside_option'] = $this->printer_mdl->get_isdoubleside_option($printer_id);
		$this->data['zhuangding_option'] = $this->printer_mdl->get_zhuangding_option($printer_id);	
		$this->load->view('profile',$this->data);
	}

	public function cleartask()
	{
		//清空session
		$this->session->set_userdata('upload_docs','');
		$this->session->set_userdata('printtaskid','0');
		$this->session->set_userdata('printshop',"");
		$this->session->set_userdata('location',"");
		$this->session->set_userdata('printer_id','');
		$this->cart->destroy();
		$this->data['printerlist'] = $this->printer_mdl->get_printer(); 
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