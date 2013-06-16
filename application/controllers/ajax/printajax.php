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
			$unit = 0.5;
			$papersize_arr = array('A4' => 1, 'B5' => 1);
			$isdoubleside_arr = array('单面' => 1,'双面' => 1);
			$zhuangding_arr = array('普通' => 1,'精装' => 2);
		}
		else
		{
			$this->db->select('*');
			$this->db->from('printer_meta');
			$this->db->where('printerid',$printerid);
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$unit = $row->price;
				//papersize
				$papersize_arr = array();
				$temp = explode("|", $row->papersize);
				foreach ($temp as $opt) {
					$key = substr($opt, 0, strpos($opt, ','));
					$value = substr($opt, strpos($opt, ',') + 1, strlen($opt));
					$papersize_arr[$key] = $value;
				}
				//isdoubleside
				$isdoubleside_arr = array();
				$temp = explode("|", $row->isdoubleside);
				foreach ($temp as $opt) {
					$key = substr($opt, 0, strpos($opt, ','));
					$value = substr($opt, strpos($opt, ',') + 1, strlen($opt));
					$isdoubleside_arr[$key] = $value;
				}
				//zhuangding
				$zhuangding_arr = array();
				$temp = explode("|", $row->zhuangding);
				foreach ($temp as $opt) {
					$key = substr($opt, 0, strpos($opt, ','));
					$value = substr($opt, strpos($opt, ',') + 1, strlen($opt));
					$zhuangding_arr[$key] = $value;
				}
			}
		}
		$price = 0;
		$price = $unit * $papersize_arr[$papersize];
		$pageNum = $this->method_mdl->countPageNum($this->input->post('range'));

		if($pageNum != -1){
			$price *= $pageNum;
			$price *= $fenshu;
			$price *= $isdoubleside_arr[$isdoubleside];
			$price += $zhuangding_arr[$zhuangding];
		}
		else
			$price = "0";
		echo $price;
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
