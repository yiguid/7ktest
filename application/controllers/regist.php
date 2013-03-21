<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regist extends CI_Controller {

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

		$this->load->model('user_mdl');
		$this->data['page_title'] = '注册';
	}

	public function index()
	{
		$this->form_validation->set_rules('reg_username','用户名','required|trim|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('reg_nickname','昵称','required|trim');
		$this->form_validation->set_rules('reg_password','密码','required|trim|matches[re_reg_password]');
		$this->form_validation->set_rules('re_reg_password','重复密码','required|trim');
		$this->form_validation->set_rules('reg_email','邮箱','required|trim|valid_email');
		if($this->form_validation->run() == FALSE){
			$this->data['regist'] = TRUE;
			$this->load->view('login',$this->data);
		}else if($this->user_mdl->regist(
			array(
				'username' => $this->input->post('reg_username'),
				'nickname' => $this->input->post('reg_nickname'),
				'password' => $this->input->post('reg_password'),
				'email' => $this->input->post('reg_email')
			)
		)){
			$this->data['regist_info'] = '注册成功，请登陆。';
			$this->load->view('login',$this->data);
		}else{
			$this->data['regist'] = TRUE;
			$this->load->view('login',$this->data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */