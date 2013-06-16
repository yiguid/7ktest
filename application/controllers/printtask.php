<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printtask extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '印单详情';
    $this->data['cur_title'] = '4';
		$this->data['user'] = $this->session->userdata('nickname');
		
		$this->load->model('user_mdl');
		$this->load->model('printtask_mdl');
		$this->load->model('transaction_mdl');
		
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
	}
	
	public function index()
	{
		$this->data['printtaskinfo'] = $this->user_mdl->get_user_printtask($this->session->userdata('id'), $this->input->get('id'));
		$this->data['documents'] = $this->user_mdl->get_user_printtask_documents($this->session->userdata('id'), $this->input->get('id'));
    $this->data['specialdocs'] = $this->user_mdl->get_user_printtask_specialdocs($this->session->userdata('id'), $this->input->get('id'));
		$this->load->view('printtask',$this->data);
	}

	public function submit(){
    $user_money = $this->session->userdata('user_money');
    if($this->input->post('total_cost') > $user_money){
      echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /></head><body>";
      echo "<script language=\"javascript\">alert('余额不足，请充值');window.location.href = '../manage/recharge';</script>";
      echo "</body></html>";
      return ;
    }
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
    		'receipt' => $this->input->post('receipt'),
        'receiver' => $this->input->post('receiver'),
        'zipcode' => $this->input->post('zipcode'),
        'daodianyin' => $this->input->post('daodianyin')
    	);
   		$this->printtask_mdl->submit_printtask($id, $task);
   		//添加费用信息
   		$trans = array(
   						'userid' => $this->session->userdata('id'),
              'pterid' => $this->input->post('printerid'),
   						'time' => date("Y-m-d H:i:s"),
   						'info' => '打印消费',
   						'amount' => -$this->input->post('total_cost'),
   						'status' => '付款成功',
   						'printtaskid' => $id
   			);
   		$this->transaction_mdl->submit_transaction($trans);
   		$this->data['printtaskid'] = $id;
   		//提交完了要清空历史信息
   		$this->session->set_userdata('upload_docs','');
		$this->session->set_userdata('printtaskid','0');
   		$this->cart->destroy();
   		$this->data['user'] = $this->session->userdata('nickname');
   		$this->load->view('submitsucceed',$this->data);
	}

  public function addRating(){
    $rating = array(
      'userid' => $this->session->userdata('id'),
      'type' => $this->input->post('type'),
      'destid' => $this->input->post('printtaskid'),
      'rating' => $this->input->post('my_rating'),
      'msg' => $this->input->post('msg'),
      );
    if($this->printtask_mdl->add_rating($rating)){
      echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /></head><body>";
      echo "<script language=\"javascript\">alert('评分成功');window.history.back();</script>";
      echo "</body></html>";
    }
    else{
      echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /></head><body>";
      echo "<script language=\"javascript\">alert('评分失败');window.history.back();</script>";
      echo "</body></html>";
    }

  }

}
