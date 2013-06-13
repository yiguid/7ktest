<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Shopajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('printtask_mdl');
		$this->load->model('shop_mdl');
		$this->load->model('transaction_mdl');
		$this->load->model('printer_mdl');
		$this->load->model('feedback_mdl');
	}
	public function add_spec_doc_to_printtask(){
		extract($_REQUEST);
		//记录选择的打印店信息
		$oldpterid = $this->session->userdata('printer_id');
		if($oldpterid != "" && $printerid != $oldpterid){
			echo "您选择的资料和之前选择的不在一个打印店，请分开下单。";
		}
		else{
			$this->session->set_userdata('printer_id',$printerid);
			$this->session->set_userdata('printer_name',$printername);
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
			$docinfo = $this->shop_mdl->get_specialdoc_info($documentid);
			$cost = $docinfo['price'];
			$name = $docinfo['name'];
			//保存设置
			$doc_setting = array(
			'printtaskid' => $task_id,
	    	'documentid' => $documentid,
		    'papersize' => "",
		    'isdoubleside' => "",
		    'range' => "",
		    'fenshu' => 1,
		    'zhuangding' => "特色资料",
		    'cost' => $cost
		    );
			$this->printtask_mdl->add_printtasksetting($doc_setting);
			//添加到购物车
			$doc_data = array(
		   	'id' => $documentid,
		    'qty' => 1,
		    'price' => $cost,
		    'name' => $name,
		    'options' => array('isspecialdoc' => true, 'description'=> $docinfo['description'], 'page'=> $docinfo['page'])
		    );
			$this->cart->insert($doc_data);
			echo "添加成功！";
		}
	}
	public function collect()
	{
		extract($_REQUEST);
		if($this->auth->logged_in())
		{
			 $this->shop_mdl->add_favorite($userid,$pterid,$type);
			 echo "1";

		}
		else
		{
			echo "0";
		}
	}
	public function rate()
	{
		extract($_REQUEST);
		if($this->auth->logged_in())
		{
			 $this->shop_mdl->rate($userid,$destid,$type,$rate);
			 echo number_format($this->shop_mdl->get_avg_rating($destid,$type),1);
		}
		else
		{
			echo "-1";
		}
	}
	public function get_shop_transaction()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['translist']=$this->transaction_mdl->get_transactions_by_pterid($s,$l,$pterid);
		echo $this->load->view("printer/money_list",$data);
	}
	public function get_shop_task()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['printhistorylist'] = $this->printer_mdl->get_printer_printhistory($pterid,$l,$s);
		echo $this->load->view("printer/printhistory_list",$data);
	}

	public function get_shop_task_by_method()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['printhistorylist'] = $this->printer_mdl->get_printer_printhistory_by_method($pterid,$l,$s,$method);
		echo $this->load->view("printer/printhistory_list",$data);
	}
	public function get_printer_documenthistory()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['documenthistorylist'] = $this->printer_mdl->get_printer_documenthistory($pterid,$l,$s); ;
		echo $this->load->view("printer/documenthistory_list",$data);
	}
	public function get_printer_specialdoc()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['specialdoclist'] = $this->printer_mdl->get_printer_specialdoc($pterid,$l,$s); ;
		echo $this->load->view("printer/specialdoc_list",$data);
	}
	public function get_shop_specialdoc_total()
	{
		extract($_REQUEST);
		if(isset($type))
		{
			echo  $this->shop_mdl->get_shop_specialdoc_total_by_type($pterid,$type);
		}
		else
		{
			echo  $this->shop_mdl->get_shop_specialdoc_total($pterid);
		}
	}
	public function get_shop_specialdoc()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['pterid'] = $pterid;
		$data['name'] = $this->shop_mdl->get_shop_name($pterid);
		if(isset($type))
		{
			$data['docList']=$this->shop_mdl->get_shop_specialdoc_by_type($pterid,$type,$l,$s);
		}
		else
		{
			$data['docList']=$this->shop_mdl->get_shop_specialdoc($pterid,$l,$s);
		}
		echo $this->load->view('shop/doc_list_view',$data);
	}
	public function get_shop_msg()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['msglist'] = $this->shop_mdl->get_shop_msg($l,$s,$pterid);
		$this->load->view('shop/message_list_view.php',$data);
	}
}
?>
