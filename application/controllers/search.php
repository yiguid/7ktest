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
		$this->display_doc(1);
	}
	public function display($curPage)
	{
		$keywords= $this->session->userdata("keywords"); 
		$per_page = 10;
		$start = ($curPage - 1)*$per_page; 
		$total_rows = $this->printer_mdl->get_printer_by_keyword_total($keywords);
		$maxPage =  ceil ( $total_rows  / $per_page);
		if($total_rows!=0){
			if($curPage < 1 || $curPage > $maxPage)
			{
				redirect(base_url().'search/display/1');
			}
		}
		$this->data['searchresultlist'] = $this->printer_mdl->get_printer_by_keyword($keywords,$per_page,$start); 
		$this->data['curPage'] = $curPage;
		$this->data['maxPage'] = $maxPage;
		$this->data['debug'] = $per_page."...".$start."...".$total_rows;
		$this->load->view('searchprinterresult',$this->data);

	}

	public function index_doc()
	{
		$this->display_doc(1);
	}
	public function display_doc($curPage)
	{
		//$keywords=$_POST['keywords']; 
		$keywords = $this->session->userdata("keywords");
		$per_page = 10;
		$start = ($curPage - 1)*$per_page; 
		$doc_total_rows = $this->document_mdl->get_documents_by_keyword_total($keywords);
		$doc_maxPage =  ceil ( $doc_total_rows  / $per_page);
		if($doc_total_rows!=0){
			if($curPage < 1 || $curPage > $doc_maxPage)
			{
				redirect(base_url().'search/display_doc/1');
			}
		}
		$this->data['searchresultlist'] = $this->document_mdl->get_documents_by_keyword($keywords,$per_page,$start); 
		$this->data['curPage'] = $curPage;
		$this->data['maxPage'] = $doc_maxPage;
		$this->data['keywords'] = $keywords;
		$this->data['debug'] = $per_page."...".$start."...".$doc_total_rows;
		$this->load->view('searchdocresult',$this->data);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */