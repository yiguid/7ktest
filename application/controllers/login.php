<?php if ( ! defined('BASEPATH')) exit('No direct script allowed'); 


class Login extends CI_Controller {

	public $data = array();

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_mdl');
		$this->data['page_title'] = '登录';
	}

	public function index()
	{
		if($this->auth->logged_in())
		{
			redirect('welcome','refresh');
		}else{			
			$this->form_validation->set_rules('username','用户名','required|trim');
			$this->form_validation->set_rules('password','密码','required|trim');

			if($this->form_validation->run() == FALSE){
				$this->load->view('login',$this->data);
			}else if($this->auth->login($this->input->post('username'),$this->input->post('password'))){
				if($this->auth->is_admin($this->input->post('username')))
					redirect('admin/welcome','refresh');
				else
					redirect('welcome','refresh');
			}else{
				redirect('login','refresh');
			}
		}
	}

	public function logout()
	{
		$this->auth->logout();
		redirect('login','refresh');
	}

	//修改密码
	public function password()
	{
		$this->data['page_title'] = '修改密码';
		//验证用户登录、页面权限
		//if(!$this->auth->check_ip($this->input->ip_address()))
		//{
		//	show_error('禁止访问:您当前的IP地址不合法');
		//	redirect('admin/login','refresh');
		//}
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
		$this->data['user'] = $this->session->userdata('nickname');
		$this->form_validation->set_rules('old_password','原密码','required|min_length[6]|trim');
		$this->form_validation->set_rules('new_password','新密码','required|min_length[6]|trim|matches[re_new_password]');
		$this->form_validation->set_rules('re_new_password','确认密码','required|min_length[6]|trim');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('manage/changepwd',$this->data);
		}
		else if($this->user_mdl->password($this->input->post('old_password'),$this->input->post('new_password'),$this->session->userdata('username')))
		{
			echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /></head><body>";
			echo "<script language=\"javascript\">alert('修改成功');window.history.back();</script>";
			echo "</body></html>";
			//redirect('admin/login/password','refresh');
		}
		else
		{
			echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /></head><body>";
			echo "<script language=\"javascript\">alert('修改失败，请重试');window.history.back();</script>";
			echo "</body></html>";
			//show_error('提交失败,请重试');
		}
	}

}

?>
