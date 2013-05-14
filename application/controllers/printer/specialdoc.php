<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Specialdoc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = '特色资料';
		$this->data['user'] = $this->session->userdata('nickname');
		
		$this->load->model('printer_mdl');
		
		if(!$this->auth->printer_logged_in())
		{
			redirect('printer/login','refresh');
		}
	}
	
	public function index()
	{
		$this->data['specialdoclist'] = $this->printer_mdl->get_printer_specialdoc($this->session->userdata('id'));
		$this->load->view('printer/specialdoc',$this->data);
	}

	public function do_upload()
	 {
	  $config['upload_path'] = './uploads';
	  $config['allowed_types'] = 'pdf|gif|jpg|png|doc|docx|ppt|pptx|zip|rar';
	  $config['max_size'] = '10000';
	  $config['encrypt_name'] = True;
	  
	  $this->load->library('upload', $config);
	 
	  if ( ! $this->upload->do_upload())
	  {
	   $this->data['error'] = $this->upload->display_errors();
	   
	   $this->load->view('printer/specialdoc', $this->data);
	  } 
	  else
	  {
	    //上传文件
	    $this->data['upload_data'] = $this->upload->data();
	     //文件信息插入数据库
	   $new_doc = array(
	      'name' => $this->input->post('name'),
	      'keyword' => $this->input->post('keyword'),
	      'type' => $this->input->post('type'),
	      'page' => $this->input->post('page'),
	      'description' => $this->input->post('description'),
	      'price' => $this->input->post('price'),
	      'uploadtime' => date("Y-m-d H:i:s"),
	      'size' => $this->data['upload_data']['file_size'],
	      'url' => $this->data['upload_data']['file_name'],
	      'uploadpterid' => $this->session->userdata('id')
	    );
	   $insert_id = $this->printer_mdl->add_specialdoc($new_doc);
	   redirect('printer/specialdoc','refresh');
	  }
	 }
}