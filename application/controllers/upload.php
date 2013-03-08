<?php

class Upload extends CI_Controller {
 
 function __construct()
 {
  parent::__construct();
  $this->load->helper(array('form', 'url'));
  $this->data['page_title'] = '首页';
    $this->data['user'] = $this->session->userdata('nickname');
    $this->load->model('printer_mdl');
    $this->load->model('document_mdl');
    $this->load->model('printtask_mdl');
    
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
  $config['allowed_types'] = 'pdf|gif|jpg|png|doc|docx|ppt|pptx|zip|rar';
  $config['max_size'] = '10000';
  
  $this->load->library('upload', $config);
 
  if ( ! $this->upload->do_upload())
  {
   $this->data['error'] = $this->upload->display_errors();
   
   $this->load->view('profile', $this->data);
  } 
  else
  {
    //上传文件
    $this->data['upload_data'] = $this->upload->data();
     //文件信息插入数据库
   $new_doc = array(
      'name' => $this->data['upload_data']['file_name'],
      'url' => $this->data['upload_data']['file_name'],
      'uploaduserid' => $this->session->userdata('id')
    );
   $insert_id = $this->document_mdl->add_document($new_doc);
   //文件打印设置信息插入数据库
   //创建一个打印任务printtask
   $task_id = $this->session->userdata('printtaskid');
   if($task_id == 0){
    $task = array(
      'userid' => $this->session->userdata('id'),
      'status' => '打印创建'
    );
    $task_id = $this->printtask_mdl->add_printtask($task);
    $this->session->set_userdata('printtaskid',$task_id);
   }
   //保存设置
  if ($this->input->post('isdoubleside') == '单面')
    $doubleside = 0;
    else
      $doubleside = 1;
   $doc_setting = array(
      'printtaskid' => $task_id,
      'documentid' => $insert_id,
      'papersize' => $this->input->post('papersize'),
      'isdoubleside' => $doubleside,
      'range' => $this->input->post('range'),
      'fenshu' => $this->input->post('fenshu'),
      'zhuangding' => $this->input->post('zhuangding'),
      'cost' => $this->input->post('cost')
    );
   $this->printtask_mdl->add_printtasksetting($doc_setting);

    //保存历史记录
    $upload_docs = $this->session->userdata('upload_docs');
   
   $upload_docs .= $insert_id."|".$this->data['upload_data']['file_name']."##";
   $this->session->set_userdata('upload_docs',$upload_docs);
   $this->data['upload_docs'] = $upload_docs;
  
   $this->load->view('profile', $this->data);
  }
 } 
}
?>