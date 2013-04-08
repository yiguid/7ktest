<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printtask extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '印单详情';
		$this->data['user'] = $this->session->userdata('nickname');
		
		$this->load->model('user_mdl');
		$this->load->model('printtask_mdl');
		
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
	}
	
	public function index()
	{
		$this->data['printtaskinfo'] = $this->user_mdl->get_user_printtask($this->session->userdata('id'), $this->input->get('id'));
		$this->data['documents'] = $this->user_mdl->get_user_printtask_documents($this->session->userdata('id'), $this->input->get('id'));
		$this->load->view('printtask',$this->data);
	}

	public function submit(){
		$id = $this->session->userdata('printtaskid');
		$task = array(
     	 	'userid' => $this->session->userdata('id'),
    		'printerid' => $this->input->post('printerid'),
    		'status' => '打印中',
    		'method' => $this->input->post('method'),
    		'createtime' => date("Y-m-d H:i:s"),
    		'cost' => $this->input->post('total_cost'),
    		'address' => $this->input->post('address'),
    		'mobile' => $this->input->post('mobile'),
    		'delivertime' => date("Y-m-d H:i:s", strtotime($this->input->post('delivertime'))),
    		'remark' => $this->input->post('remark'),
    		'receipt' => $this->input->post('receipt')
    	);
   		$this->printtask_mdl->submit_printtask($id, $task);
   		$this->data['printtaskid'] = $id;
   		//提交完了要清空历史信息
   		$this->session->set_userdata('upload_docs','');
		$this->session->set_userdata('printtaskid','0');
   		$this->cart->destroy();
   		$this->data['user'] = $this->session->userdata('nickname');
   		$this->load->view('submitsucceed',$this->data);
	}

}
