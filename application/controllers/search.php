<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

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

		$this->data['user'] = $this->session->userdata('nickname');
		
		$this->load->model('user_mdl');
		
		if(!$this->auth->logged_in())
		{
			redirect('login','refresh');
		}

		$this->load->model('printer_mdl');
		$this->load->model('document_mdl');
		$this->data['page_title'] = '搜索';
	}

	public function index()
	{
		if($this->input->post('keywords')!=null)
			if($this->input->post('keywords')!=$this->session->userdata("keywords")){
				$this->session->set_userdata('keywords',$this->input->post('keywords'));
			}
		/*
		if($this->session->userdata("keywords")==null){
			if($_POST['keywords']!=null)
				$this->session->set_userdata('keywords',$_POST['keywords']);
		}else{
			if($_POST['keywords']!=null&&$_POST['keywords']!=$this->session->userdata("keywords")){
				$this->session->set_userdata('keywords',$_POST['keywords']);
			}
		}
		*/
		$keywords = $this->session->userdata("keywords");
		$perpage = 10;
		$total_rows = $this->document_mdl->get_documents_by_keyword_total($keywords);
		//$this->data['searchresultlist'] = $this->document_mdl->get_documents_by_keyword($keywords,$per_page,$start); 
		$this->data['perpage'] = $perpage;
		$this->data['total_rows'] = $total_rows;
		$this->data['keywords'] = $keywords;
		$this->load->view('search/search_view',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */