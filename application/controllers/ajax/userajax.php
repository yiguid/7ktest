<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userajax extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_mdl');
		$this->load->model('transaction_mdl');
		$this->load->model('printtask_mdl');
	}
	public function get_shop_favorite()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['shopList']=$this->user_mdl->get_user_favoriteshop($s,$l,$userid);
		echo $this->load->view("favorite_shop",$data);
	}
	public function get_doc_favorite()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['docList']=$this->user_mdl->get_user_favoritedoc($s,$l,$userid);
		echo $this->load->view("favorite_doc",$data);
	}
	public function get_user_transaction()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['translist']=$this->transaction_mdl->get_transactions_by_userid($s,$l,$userid);
		echo $this->load->view("manage/transactionhistory_list",$data);
	}
	public function get_user_printhistory()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['printhistorylist'] = $this->user_mdl->get_user_printhistory($userid,$l,$s); ;
		echo $this->load->view("printhistory_list_view",$data);
	}
	public function get_user_documenthistory()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['documenthistorylist'] = $this->user_mdl->get_user_documenthistory($userid,$l,$s); ;
		echo $this->load->view("documenthistory_list",$data);
	}
}
?>