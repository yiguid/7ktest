<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = '打印店';
		$username = $this->session->userdata('nickname');
		if($username != "")
			$this->data['user'] = $username;
		$this->load->model('user_mdl');
		$this->load->model('printer_mdl');
		$this->load->model('feedback_mdl');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		//清空session
		$pageBase = $this->config->item('pageBase');
		$msgTotal = $this->feedback_mdl->get_msg_total();
		$maxPage = ceil ( $msgTotal / $pageBase);
		$this->display(1,$maxPage);
	}
		public function display($curPage,$maxPage)
 	{
		$this->data['curPage']  = $curPage;
 		$this->data['maxPage']  = $maxPage;
 		$pageBase = $this->config->item('pageBase');
 		$start = ($curPage -1) * $pageBase;
		$this->data['msglist']= $this->feedback_mdl->get_msg($pageBase,$start);
		$this->load->view('shop/message_view',$this->data);
 	}
 	public function create()
 	{
		if(!$this->auth->logged_in())
		{
			if(!$this->auth->printer_logged_in())
			{
				redirect('login','refresh');
			}
			else
			{
				redirect(base_url().'feedback');
			}
		}
		$this->form_validation->set_rules('msgcontent', '留言', 'required');
 		if ($this->form_validation->run() == FALSE)
		{
			$this->data['create_error'] = "内容不能为空";
			$this->index();
		}
		else
		{
			//添加数据
			$type=$this->input->post('msgtype');
			$content = $this->input->post('msgcontent');
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$uid = $this->session->userdata('id');
			if($this->feedback_mdl->add_msg($type,$content,$date,$time,$uid))
			{
				redirect(base_url().'feedback','index');
			}
			else
			{
				$this->data['error']="留言失败";
				$this->load->view('error_view',$this->data);
			}

		}
 	}
}