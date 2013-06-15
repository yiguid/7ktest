<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Card extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public $data = array();
	
	public function __construct()
	{
		parent::__construct();

		$data['title'] = "首页";  
		$data['headline'] = "充值卡";  
		$this->load->model('transaction_mdl');
	} 
	
	public function index()
	{
		$data['cardlist'] = $this->transaction_mdl->get_card();  
		$this->load->view('admin/card_view',$data);
	}
	
	public function add()
	{
		$data['addresult']=$this->transaction_mdl->add_card(
				array(
					'id'=> $this->input->post('id'),
					'password'=> $this->input->post('password'),
					'amount'=> $this->input->post('amount'),
					'rechargeuserid'=> 0,
					'rechargetime'=> 0
				)
		);
		$data['cardlist'] = $this->transaction_mdl->get_card();
		$this->load->view('admin/card_view',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */