<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Commonajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('feedback_mdl');
		$this->load->model('shop_mdl');
		$this->load->model('transaction_mdl');
		$this->load->model('printer_mdl');
		$this->load->model('document_mdl');
	}
	public function get_feedback_list()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['msglist'] = $this->feedback_mdl->get_msg($l,$s);
		echo $this->load->view("feedback_list",$data);
	}
	public function get_search_doc_total()
	{
		extract($_REQUEST);
		echo  $this->document_mdl->get_documents_by_keyword_total($keywords);
	}
	public function get_search_doc_list()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['searchresultlist']= $this->document_mdl->get_documents_by_keyword($keywords,$l,$s);
		echo $this->load->view('search/searchdocresult_list',$data);
	}
	public function get_search_printer_total()
	{
		extract($_REQUEST);
		echo 0;
	}
	public function get_search_printer_list()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		//echo "$s-$l";
		echo "该功能暂时未开放";
	}
}