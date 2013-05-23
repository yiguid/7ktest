<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documenthistory extends CI_Controller {

	private $total_rows;
	private $per_page;
	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '历史文件';
		$this->data['cur_title'] = '6';
		$this->data['user'] = $this->session->userdata('nickname');
		
		$this->load->model('user_mdl');
		$this->load->model('printer_mdl');
		$this->load->model('printtask_mdl');
		
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
		$this->per_page = 8;
	}
	
	public function index()
	{
		$this->display(1);

	}
	public function display($pagenum)
	{
		/*
		判断用户类型
		*/
		$this->total_rows = $this->user_mdl->get_user_documenthistory_total($this->session->userdata('id'));
		$maxPage = ceil ( $this->total_rows  / $this->per_page);
		if($pagenum > $maxPage || $pagenum < 1)
		{
			redirect(base_url().'documenthistory/display/1');
		}
		$start = ($pagenum - 1) * $this->per_page;
		$this->data['documenthistorylist'] = $this->user_mdl->get_user_documenthistory($this->session->userdata('id'),$this->per_page,$start);
		$this->data['curPage'] = $pagenum;
		$this->data['maxPage'] = $maxPage;
		//得到打印店信息
		$printer_id = $this->session->userdata('printer_id');
		$this->data['papersize_option'] = $this->printer_mdl->get_papersize_option($printer_id);
		$this->data['isdoubleside_option'] = $this->printer_mdl->get_isdoubleside_option($printer_id);
		$this->data['zhuangding_option'] = $this->printer_mdl->get_zhuangding_option($printer_id);
		$this->load->view('documenthistory',$this->data);

	}

	public function addtoprinttask(){
		//创建一个打印任务printtask
	   $task_id = $this->session->userdata('printtaskid');
	   if($task_id == 0){
	    $task = array(
	      'userid' => $this->session->userdata('id'),
	      'status' => '打印创建'
	    );
	    $task_id = $this->printtask_mdl->add_printtask($task);
	    $this->session->set_userdata('printtaskid',$task_id);
	   }
	   //保存设置
	   $doc_setting = array(
	      'printtaskid' => $task_id,
	      'documentid' => $this->input->post('documentid'),
	      'papersize' => $this->input->post('papersize'),
	      'isdoubleside' => $this->input->post('isdoubleside'),
	      'range' => $this->input->post('range'),
	      'fenshu' => $this->input->post('fenshu'),
	      'zhuangding' => $this->input->post('zhuangding'),
	      'cost' => $this->input->post('cost')
	    );
	   $this->printtask_mdl->add_printtasksetting($doc_setting);

	   $doc_data = array(
	      'id' => $this->input->post('documentid'),
	      'qty' => $this->input->post('fenshu'),
	      'price' => $this->input->post('cost') / $this->input->post('fenshu'),
	      'name' => $this->input->post('documentname'),
	      'options' => array('papersize' => $this->input->post('papersize'),'isdoubleside' => $this->input->post('isdoubleside'),'range' => $this->input->post('range'),'zhuangding' => $this->input->post('zhuangding'))
	    );
	   	$this->cart->insert($doc_data);
		redirect(base_url().'welcome');
	}
}
