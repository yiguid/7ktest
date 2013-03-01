<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 
	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '首页';
		$this->data['user'] = $this->session->userdata('username');

		//验证用户登录、页面权限
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
		//if(!$this->auth->is_permit($this->session->userdata('username'),'data'))
		//{
		//	show_error('禁止访问:不具有该权限');
		//	redirect('admin','refresh');
		//}
	}
	
	public function index()
	{
		$this->load->view('admin/welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */