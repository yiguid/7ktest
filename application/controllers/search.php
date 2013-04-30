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
		$this->data['page_title'] = '搜索';
	}

	public function index()
	{
		$this->display(1);
	}
	public function display($curPage)
	{
		$keywords=$_POST['keywords']; 
		$per_page = 10;
		$start = ($curPage - 1)*$per_page; 
		$total_rows = $this->printer_mdl->get_printer_by_keyword_total($keywords);
		$maxPage =  ceil ( $total_rows  / $per_page);
		if($curPage < 1 || $curPage > $maxPage)
		{
			redirect(base_url().'search/display/1');
		}
		$this->data['searchresultlist'] = $this->printer_mdl->get_printer_by_keyword($keywords,$per_page,$start); 
		$this->data['curPage'] = $curPage;
		$this->data['maxPage'] = $maxPage;
		$this->data['debug'] = $per_page."...".$start."...".$total_rows;
		$this->load->view('searchresult',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */