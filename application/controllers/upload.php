<?php

class Upload extends CI_Controller {
 
 function __construct()
 {
  parent::__construct();
  $this->load->helper(array('form', 'url'));
  $this->data['page_title'] = '首页';
    $this->data['user'] = $this->session->userdata('nickname');
    $this->load->model('printer_mdl');
    
    if(!$this->auth->logged_in())
    {
      redirect('login','refresh');
    }
 }
 
 function index()
 { 
  $this->data['printerlist'] = $this->printer_mdl->get_printer(); 
  $this->load->view('profile', $this->data);
 }

 function do_upload()
 {
  $this->data['printerlist'] = $this->printer_mdl->get_printer(); 
  $config['upload_path'] = './uploads';
  $config['allowed_types'] = 'gif|jpg|png';
  $config['max_size'] = '10000';
  
  $this->load->library('upload', $config);
 
  if ( ! $this->upload->do_upload())
  {
   $this->data['error'] = $this->upload->display_errors();
   
   $this->load->view('profile', $this->data);
  } 
  else
  {
    $upload_docs = $this->session->userdata('upload_docs');
   $this->data['upload_data'] = $this->upload->data();
   $upload_docs .= $this->data['upload_data']['file_name']."##";
   $this->session->set_userdata('upload_docs',$upload_docs);
   $this->data['upload_docs'] = $upload_docs;
   $this->load->view('profile', $this->data);
  }
 } 
}
?>