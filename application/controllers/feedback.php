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
 		$this->session->set_userdata('upload_docs','');
		$this->session->set_userdata('printtaskid','0');
		$this->load->view('feedback',$this->data);
 	}
 	public function create()
 	{
 		$this->load->library('form_validation');

		//$rules['msgcontent'] = "required";
		$this->form_validation->set_rules('msgcontent', '留言', 'required');
 		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('createmsg_view',$this->data);
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
				redirect('feedback','index');
			}
			else
			{
				$this->data['error']="留言失败";
			}

		}
 	}
 	public function reply($id)
 	{
 		
 	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */