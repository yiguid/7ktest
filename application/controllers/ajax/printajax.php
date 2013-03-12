<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Printajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('printtask_mdl');
		$this->load->model('method_mdl');
	}

	public function printDocument()
	{
		extract($_REQUEST);	
		$arr = array('status' => '打印完成');
		echo $this->printtask_mdl->update_printtask($printtaskid, $arr);
	}

	public function compute_money()
	{
		extract($_REQUEST);	
		$price = 0;
		if($papersize == 'A4')
			$price = 0.5;
		else $price = 0.4;
		$pageNum = $this->method_mdl->countPageNum($this->input->post('range'));
		if($pageNum != -1){
			$price *= $pageNum;
			$price *= $fenshu;
			if($zhuangding != '普通')
				$price += 2;
		}
		else
			$price = "页码有误";
		echo $price;
	}

	public function setPrinterId(){
		extract($_REQUEST);
		$this->session->set_userdata('printer_id',$printerid);
	}
	
}
?>
