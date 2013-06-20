<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Printajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('printtask_mdl');
		$this->load->model('method_mdl');
		$this->load->model('printer_mdl');
	}

	public function printDocument()
	{
		extract($_REQUEST);	
		$arr = array('status' => '打印完成', 'finishtime' => date("Y-m-d H:i:s"));
		echo $this->printtask_mdl->update_printtask($printtaskid, $arr);
	}

	public function get_printshop_by_location()
	{
		extract($_REQUEST);
		$printerlist = $this->printer_mdl->get_printer_by_location($location);
		foreach($printerlist as $printer){
			echo "<a style=\"color:white;\" class=\"btn-metro-blue\"
			 href=\"".base_url()."printshop/name/"
			.$printer->username."\">".$printer->name."</a>";
		}
	}
	public function compute_money()
	{
		extract($_REQUEST);	
		//获取printer的所有费用对应信息
		$printerid = $this->session->userdata('printer_id');
		if(!isset($printerid) || $printerid == ""){
			echo 0;
		}
		else
		{
			echo $this->method_mdl->computeMoney($printerid,$papersize,$isdoubleside,$range,$fenshu,$zhuangding);
		}
	}

	public function setPrinterId(){
		extract($_REQUEST);
		$this->session->set_userdata('printer_id',$printerid);
		$this->session->set_userdata('printer_name',$printername);
		if($total > 0){
			//清空session
			$this->session->set_userdata('upload_docs','');
			$this->session->set_userdata('printtaskid','0');
			$this->cart->destroy();
		}
	}

	public function delete_by_id(){
		extract($_REQUEST);
		$this->db->delete('document', array('id' => $documentid)); 
		$this->db->delete('printtasksetting', array('documentid' => $documentid)); 
		$this->cart->update(array('rowid' => $rowid, 'qty' => 0)); 
		echo TRUE;
	}

	public function edit_by_id(){
		extract($_REQUEST);
		//保存设置
	   $doc_setting = array(
	      'papersize' => $papersize,
	      'isdoubleside' => $isdoubleside,
	      'range' => $range,
	      'fenshu' => $fenshu,
	      'zhuangding' => $zhuangding,
	      'cost' => $cost
	    );
	   $this->printtask_mdl->update_printtasksetting($this->session->userdata('printtaskid'), $documentid, $doc_setting);

	   $this->cart->update(array('rowid' => $rowid, 'qty' => 0)); 

	   $doc_data = array(
	      'id' => $documentid,
	      'qty' => $fenshu,
	      'price' => $cost / $fenshu,
	      'name' => $name,
	      'options' => array('papersize' => $papersize,'isdoubleside' => $isdoubleside,'range' => $range,'zhuangding' => $zhuangding)
	    );
	   $this->cart->insert($doc_data);
	   echo TRUE;
	}

	public function checkTask(){
		echo $this->printer_mdl->checkTask($this->session->userdata('id'));
	}
}
?>
