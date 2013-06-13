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
		$this->load->model('feedback_mdl');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		//清空session
		//$pageBase = $this->config->item('pageBase');
		//$msgTotal = $this->feedback_mdl->get_msg_total();
		//$maxPage = ceil ( $msgTotal / $pageBase);
		//$this->display(1,$maxPage);
		$this->data['perpage'] = $this->config->item('pageBase');
		$this->data['total'] =  $this->feedback_mdl->get_msg_total();
		$this->data['msglist']= $this->feedback_mdl->get_msg($this->config->item('pageBase'),0);
		$this->load->view('feedback',$this->data);
	}
	public function display($curPage,$maxPage)
 	{
		$this->data['curPage']  = $curPage;
 		$this->data['maxPage']  = $maxPage;
 		$pageBase = $this->config->item('pageBase');
 		$start = ($curPage -1) * $pageBase;
		$this->data['msglist']= $this->feedback_mdl->get_msg($pageBase,$start);
		$this->load->view('feedback',$this->data);
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
			$content = str_replace("&", "&amp;", $content);
			$content = str_replace("<", "&lt;", $content);
			$content = str_replace(">", "&gt;", $content);
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$uid = $this->session->userdata('id');
			if($this->feedback_mdl->add_msg($type,$content,$date,$time,$uid,0))
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
 	public function reply($msgid)
 	{
		if($this->auth->logged_in() || $this->auth->printer_logged_in())
		{
			$this->data['msg']     = $this->feedback_mdl->get_msg_by_id($msgid);
	 		$this->data['rpylist'] = $this->feedback_mdl->get_msg_all_rpy($msgid);
	 		$this->load->view('reply_view',$this->data);
		}
		else{
			redirect(base_url().'feedback');
		}		
 	}
 	public function doReply($msgid)
 	{
		if(!$this->auth->logged_in() && !$this->auth->printer_logged_in())
		{

			redirect('login','refresh');
			return;
		}
 		$this->form_validation->set_rules('msgcontent', '留言', 'required');
 		if ($this->form_validation->run() == FALSE)
 		{
 			redirect(base_url()."feedback/reply/$msgid");
 		}
 		else
 		{
 			$content = $this->input->post('msgcontent');
 			$content = str_replace("&", "&amp;", $content);
			$content = str_replace("<", "&lt;", $content);
			$content = str_replace(">", "&gt;", $content);
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$uid = $this->session->userdata('id');
			$utype = 0;
			if($this->session->userdata('user_type') == 'printer')
			{
				$utype = 1;
			}
			$floor = count($this->feedback_mdl->get_msg_all_rpy($msgid)) + 1;
 			if($this->feedback_mdl->add_rpy($content,$date,$time,$msgid,$floor,$uid,$utype))
 			{
 				redirect(base_url()."feedback/reply/$msgid");
 			}
 			else
 			{
 				$this->data['error']="回复失败";
				$this->load->view('error',$this->data);
 			}
 		}
 	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */