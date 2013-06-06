<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Commonajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('feedback_mdl');
		$this->load->model('shop_mdl');
		$this->load->model('transaction_mdl');
		$this->load->model('printer_mdl');
	}
	public function get_feedback_list()
	{
		extract($_REQUEST);
		$s = intval($start);
		$l = intval($line);
		$data['msglist'] = $this->feedback_mdl->get_msg($l,$s);
		echo $this->load->view("feedback_list",$data);
	}
}