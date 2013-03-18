<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '反馈留言';
		$username = $this->session->userdata('nickname');
		if($username != "")
			$this->data['user'] = $username;
		$this->load->model('user_mdl');
		$this->load->model('printer_mdl');
	}
	
	public function index()
	{
		//清空session
		$this->data['curPage']=1;
 		$this->data['maxPage']=20;
 		$this->session->set_userdata('upload_docs','');
		$this->session->set_userdata('printtaskid','0');
		$this->cart->destroy();
		$this->load->view('feedback',$this->data);
	}
	public function page($curPage,$maxPage)
 	{
		$this->data['curPage']=$curPage;
 		$this->data['maxPage']=$maxPage;
 		$this->session->set_userdata('upload_docs','');
		$this->session->set_userdata('printtaskid','0');
		$this->cart->destroy();
		$this->load->view('feedback',$this->data);
 	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */