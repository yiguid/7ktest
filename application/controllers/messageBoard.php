<?php
/*
 * Created on 2013-3-18
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class MessageBoard extends CI_Controller {

	public function index()
	{
		$data['curPage']=1;
 		$data['maxPage']=10;
 		$this->load->view('messageBoard_view',$data);
	}
 	public function page($curPage,$maxPage)
 	{
		$data['curPage']=$curPage;
 		$data['maxPage']=$maxPage;
 		$this->load->view('messageBoard_view',$data);
 	}
 }
?>
