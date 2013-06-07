<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = '打印店首页';
		$username = $this->session->userdata('nickname');
		if($username != "")
			$this->data['user'] = $username;
		$this->load->model('shop_mdl');
		$this->load->model('feedback_mdl');
	}
	public function doc($pterid)
	{
		//check数据合法性
		//$str结构：printerid
		$pattern = '/^\d+$/';
		if(preg_match($pattern,$pterid))
		{
			if(($location= $this->shop_mdl->get_shop_location($pterid)) == null)
			{
				//非法ID
				redirect(base_url());
			}
			else{
				$this->data['shopInfo'] = $this->shop_mdl->get_shop_info($pterid);
				$this->data['location'] = explode('|', $location);
				$this->data['name'] = $this->shop_mdl->get_shop_name($pterid);
				$this->data['pterid'] = $pterid;
				$this->data['docTypeList']=$this->shop_mdl->get_shop_specialdoc_type($pterid);
				$this->data['perpage'] = 1;
				$this->data['total'] = $this->shop_mdl->get_shop_specialdoc_total($pterid);
				$this->load->view('shop/doc_view',$this->data);
			}
		}
		else
		{
			redirect(base_url());
		}
	}
	public function msg($info)
	{
		$pattern = '/^(\d+)-(\d+)$/';
		if(preg_match($pattern,$info,$match))
		{
			//数据合法性验证

			//
			$pterid= $match[1];
			$curPage = $match[2];
			$pageBase = $this->config->item('pageBase');
			$msgTotal = $this->shop_mdl->get_shop_msg_total($pterid);
			$maxPage = ceil ( $msgTotal / $pageBase);
			if($curPage > $maxPage)
			{
				$curPage = $maxPage;
			}
			if($curPage < 1)
			{
				$curPage = 1;
			}
			if(($location= $this->shop_mdl->get_shop_location($pterid)) == null)
			{
				//非法ID
			}
			$this->data['shopInfo'] = $this->shop_mdl->get_shop_info($pterid);
			$this->data['location'] = explode('|', $location);
			$this->data['name'] = $this->shop_mdl->get_shop_name($pterid);
			$this->data['pterid']  =$pterid;
			$this->data['curPage']  = $curPage;
	 		$this->data['maxPage']  = $maxPage;
	 		$pageBase = $this->config->item('pageBase');
	 		$start = ($curPage -1) * $pageBase;
			$this->data['msglist']= $this->shop_mdl->get_shop_msg($pageBase,$start,$pterid);
			$this->load->view('shop/message_view',$this->data);
			}
	}
	public function rate($pterid)
	{
		if(($location= $this->shop_mdl->get_shop_location($pterid)) == null)
		{
			//非法ID
		}
		$this->data['shopInfo'] = $this->shop_mdl->get_shop_info($pterid);
		$this->data['location'] = explode('|', $location);
		$this->data['name'] = $this->shop_mdl->get_shop_name($pterid);
		$this->data['pterid']  =$pterid;
		$this->load->view('shop/rate_view',$this->data);
	}
	public function promotion($pterid)
	{
		if(($location= $this->shop_mdl->get_shop_location($pterid)) == null)
		{
			//非法ID
		}
		$this->data['shopInfo'] = $this->shop_mdl->get_shop_info($pterid);
		$this->data['location'] = explode('|', $location);
		$this->data['name'] = $this->shop_mdl->get_shop_name($pterid);
		$this->data['pterid']  =$pterid;
		$this->load->view('shop/promotion_view',$this->data);
	}
	public function service($pterid)
	{
		if(($location= $this->shop_mdl->get_shop_location($pterid)) == null)
		{
			//非法ID
		}
		$this->data['shopInfo'] = $this->shop_mdl->get_shop_info($pterid);
		$this->data['location'] = explode('|', $location);
		$this->data['name'] = $this->shop_mdl->get_shop_name($pterid);
		$this->data['pterid']  =$pterid;
		$this->load->view('shop/service_view',$this->data);
	}
	public function create($pterid)
	{
		if(!$this->auth->logged_in())
		{
			if(!$this->auth->printer_logged_in())
			{
				redirect('login','refresh');
			}
			else
			{
				redirect(base_url().'shop/msg/$pterid-1');
			}
		}
		$this->form_validation->set_rules('msgcontent', '留言', 'required');
 		if ($this->form_validation->run() == FALSE)
		{
			//$this->data['create_error'] = "内容不能为空";
			redirect(base_url()."shop/msg/$pterid-1");
		}
		else
		{
			//添加数据
			$type=$this->input->post('msgtype');
			$content = $this->input->post('msgcontent');
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$uid = $this->session->userdata('id');
			if($this->feedback_mdl->add_msg($type,$content,$date,$time,$uid,$pterid))
			{
				redirect(base_url()."shop/msg/$pterid-1");
			}
			else
			{
				$this->data['error']="留言失败";
				$this->load->view('error_view',$this->data);
			}

		}
	}
}