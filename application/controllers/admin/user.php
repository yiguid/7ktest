<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
		$data['headline'] = "用户信息";  
		$this->load->model('user_mdl');
	} 
	
	public function index()
	{
		$data['userlist'] = $this->user_mdl->get_user();  
		$this->load->view('admin/userlist',$data);
	}
	
	public function add()
	{
		$data['addresult']=$this->user_mdl->add_user(
				array(
					'username'=> $this->input->post('username'),
					'password'=> $this->input->post('password'),
				)
		);
		$data['userlist'] = $this->user_mdl->get_user();
		$this->load->view('admin/userlist',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */