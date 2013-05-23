<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
	if($this->session->userdata('user_type') == 'user')
		$this->load->view('header');
	else
		$this->load->view('printer/header');
?>