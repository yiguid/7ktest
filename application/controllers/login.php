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
			$this->form_validation->set_rules('username','用户名','required|trim|min_length[4]|max_length[12]|alpha_dash');
			$this->form_validation->set_rules('password','密码','required|trim');

			if($this->form_validation->run() == FALSE){
				$this->load->view('login',$this->data);
			}else if($this->auth->login($this->input->post('username'),$this->input->post('password'))){
				if($this->auth->is_admin($this->input->post('username')))
					redirect('admin/welcome','refresh');
				else
					redirect('welcome','refresh');
			}else{
				$this->data['login_error'] = "用户名密码有误，请重新输入。";
				$this->load->view('login',$this->data);
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

	public function address()
	{
		$this->data['page_title'] = '修改地址';
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}
		$this->data['user'] = $this->session->userdata('nickname');
		$this->form_validation->set_rules('receiver','收货人名','required|min_length[2]|trim');
		$this->form_validation->set_rules('zipcode','邮政编码','required|min_length[6]|trim');
		$this->form_validation->set_rules('mobile','联系电话','required|min_length[6]|trim');
		$this->form_validation->set_rules('province','所在省份','required|min_length[2]|trim');
		$this->form_validation->set_rules('city','所在城市','required|min_length[3]|trim');
		$this->form_validation->set_rules('address','详细地址','required|min_length[2]|trim');
		$this->form_validation->set_rules('receipt','发票信息','required|min_length[2]|trim');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('manage/address',$this->data);
		}
		else if($this->user_mdl->address(
			$this->session->userdata('id'),
			$this->input->post('receiver'),
			$this->input->post('mobile'),
			$this->input->post('zipcode'),
			$this->input->post('province'),
			$this->input->post('city'),
			$this->input->post('address'),
			$this->input->post('receipt')
			))
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
		}
	}

}

?>
