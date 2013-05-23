<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Shopajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('printtask_mdl');
		$this->load->model('shop_mdl');
	}
	public function add_spec_doc_to_printtask(){
		extract($_REQUEST);
		//记录选择的打印店信息
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
?>
