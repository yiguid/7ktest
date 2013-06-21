<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PrinterAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('printer_mdl');
		$this->data['user'] = $this->session->userdata('nickname');
		
		if(!$this->auth->printer_logged_in())
		{
			redirect('printer/login','refresh');
		}
	}
	
	public function index()
	{
		$this->data['page_title'] = '打印店中心';
		//$this->data['printerlist'] = $this->printer_mdl->get_printer(); 
		$this->load->view('printer/manage',$this->data);
	}

	public function password()
	{
		
		$this->data['page_title'] = '修改密码';

		$this->data['user'] = $this->session->userdata('nickname');
		$this->form_validation->set_rules('old_password','原密码','required|min_length[6]|trim');
		$this->form_validation->set_rules('new_password','新密码','required|min_length[6]|trim|matches[re_new_password]');
		$this->form_validation->set_rules('re_new_password','确认密码','required|min_length[6]|trim');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('printer/password',$this->data);
		}
		else if($this->printer_mdl->password($this->input->post('old_password'),$this->input->post('new_password'),$this->session->userdata('username')))
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

	public function updateinfo()
	{
		//$this->data['page_title'] = '打印店中心';
		//$this->data['printerlist'] = $this->printer_mdl->get_printer(); 
		//$this->load->view('printer/manage',$this->data);
		//$this->data['printer_info']=$this->printer_mdl->get_printer_by_username($this->session->userdata('username'));
		//$this->load->view('printer/info',$this->data);


		$this->data['page_title'] = '修改打印店信息';
		$this->data['user'] = $this->session->userdata('nickname');
		$this->form_validation->set_rules('online','在线状态','required|min_length[2]|trim');
		$this->form_validation->set_rules('address','打印店地址','required|min_length[6]|trim');
		$this->form_validation->set_rules('contact','联系方式','required|min_length[6]|trim');
		$this->form_validation->set_rules('servicestart','营业开始时间','required|min_length[2]|trim');
		$this->form_validation->set_rules('serviceend','营业结束时间','required|min_length[3]|trim');
		$this->form_validation->set_rules('intro','打印店介绍','required|min_length[2]|trim');
		$this->form_validation->set_rules('notice','通知公告','required|min_length[2]|trim');
		$this->form_validation->set_rules('yewu','业务介绍','required|min_length[2]|trim');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->data['printer_info']=$this->printer_mdl->get_printer_by_username($this->session->userdata('username'));
			$this->load->view('printer/info',$this->data);
		}
		else if($this->printer_mdl->update_printer_info(
			$this->session->userdata('id'),
			$this->input->post('online'),
			$this->input->post('address'),
			$this->input->post('contact'),
			$this->input->post('servicestart'),
			$this->input->post('serviceend'),
			$this->input->post('intro'),
			$this->input->post('notice'),
			$this->input->post('yewu')
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

	public function addproperty()
	{
		$this->data['page_title'] = '添加打印业务';

		$this->form_validation->set_rules('propertyname','业务名称','required|min_length[2]|trim');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('printer/yewu',$this->data);
		}
		$data = array('name' => $this->input->post('propertyname'));

		$this->printer_mdl->add_printer_option( $this->session->userdata('id'),$data);
		
	}



		public function addfixedproperty()
	{
		$this->data['page_title'] = '添加打印业务';

		$option=$this->input->post('option');
		$value=$this->input->post('value');
		$price=$this->input->post('price');
		$this->form_validation->set_rules('value','选项名','required|min_length[1]|trim');
		$this->form_validation->set_rules('price','价格','required|min_length[1]|trim');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('printer/yewu',$this->data);
		}
		$option=$this->input->post('option');
		$value=$this->input->post('value');
		$price=$this->input->post('price');

		$data['name']=$value;
		$data['price']=$price;

		$this->printer_mdl->add_fixed_printer_option( $this->session->userdata('id'),$option,$data);

		$this->data['papersize_option'] = $this->printer_mdl->get_papersize_price_option($this->session->userdata('id'));
		$this->data['isdoubleside_option'] = $this->printer_mdl->get_isdoubleside_price_option($this->session->userdata('id'));
		$this->data['zhuangding_option'] = $this->printer_mdl->get_zhuangding_price_option($this->session->userdata('id'));
		$this->load->view('printer/yewu',$this->data);
		
	}





	public function setproperty()
	{
		$this->data['page_title'] = '添加打印业务';
		$printerid=$this->session->userdata('id');
		$data = array();

		$data[0]= array('option'=>'A6','price'=>'9');
		$data[1]= array('option'=>'A7','price'=>'8');
		$data[2]= array('option'=>'A8','price'=>'7');
		$data[3]= array('option'=>'A9','price'=>'6');


		$this->printer_mdl->set_papersize_option( $this->session->userdata('id'),$data);
		
	}

	public function removepapersize()
	{
		$this->data['page_title'] = '添加打印业务';
		$printerid=$this->session->userdata('id');
		$id = $this->input->get('id');

		$this->printer_mdl->delete_papersize_option( $this->session->userdata('id'),$id);
		$this->data['papersize_option'] = $this->printer_mdl->get_papersize_price_option($this->session->userdata('id'));
		$this->data['isdoubleside_option'] = $this->printer_mdl->get_isdoubleside_price_option($this->session->userdata('id'));
		$this->data['zhuangding_option'] = $this->printer_mdl->get_zhuangding_price_option($this->session->userdata('id'));
		$this->load->view('printer/yewu',$this->data);
		
	}

	public function removeisdoubleside()
	{
		$this->data['page_title'] = '添加打印业务';
		$printerid=$this->session->userdata('id');
		$id = $this->input->get('id');

		$this->printer_mdl->delete_isdoubleside_option( $this->session->userdata('id'),$id);
		$this->data['papersize_option'] = $this->printer_mdl->get_papersize_price_option($this->session->userdata('id'));
		$this->data['isdoubleside_option'] = $this->printer_mdl->get_isdoubleside_price_option($this->session->userdata('id'));
		$this->data['zhuangding_option'] = $this->printer_mdl->get_zhuangding_price_option($this->session->userdata('id'));
		$this->load->view('printer/yewu',$this->data);
		
	}

	public function removezhuangding()
	{
		$this->data['page_title'] = '添加打印业务';
		$printerid=$this->session->userdata('id');
		$id = $this->input->get('id');

		$this->printer_mdl->delete_zhuangding_option( $this->session->userdata('id'),$id);
		$this->data['papersize_option'] = $this->printer_mdl->get_papersize_price_option($this->session->userdata('id'));
		$this->data['isdoubleside_option'] = $this->printer_mdl->get_isdoubleside_price_option($this->session->userdata('id'));
		$this->data['zhuangding_option'] = $this->printer_mdl->get_zhuangding_price_option($this->session->userdata('id'));
		$this->load->view('printer/yewu',$this->data);
		
	}




	public function addpropertyvalue()
	{
		$this->data['page_title'] = '添加打印业务内容';

		$this->form_validation->set_rules('propertyid','业务id','required|min_length[1]|trim');
		$this->form_validation->set_rules('value','新增业务值','required|min_length[2]|trim');
		$this->form_validation->set_rules('price','新增业务价格','required|min_length[1]|trim');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('printer/yewu',$this->data);
		}
		$data = array(
			'propertyid' => $this->input->post('propertyid'),
			'value' => $this->input->post('value'),
			'price' => $this->input->post('price')
			);

		$this->printer_mdl->add_printer_option_value($data);
		
	}

}
