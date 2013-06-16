<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printer extends CI_Controller {

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

		$data['title'] = "首页";  
		$data['headline'] = "打印店信息";  
		$this->load->model('printer_mdl');
	} 
	
	public function index()
	{
		$data['printerlist'] = $this->printer_mdl->get_printer();  
		$this->load->view('admin/printerlist',$data);
	}
	
	public function add()
	{
		$data['addresult']=$this->printer_mdl->add_printer(
				array(
					'username' => $this->input->post('username'),
					'name'=> $this->input->post('name'),
					'password' => $this->input->post('password'),
					'location' => $this->input->post('location')
				)
		);
		$data['printerlist'] = $this->printer_mdl->get_printer();
		$this->load->view('admin/printerlist',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */