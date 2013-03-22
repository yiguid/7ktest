<?php
/*
 * Created on 2013-3-21
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if(!$this->auth->printer_logged_in())
	{
		$this->load->view('header');
	}
	else
	{
		$this->load->view('printer/header');
	}
?>
<div>
<?php echo $error;?>
</div>
<?php $this->load->view('footer'); ?>
