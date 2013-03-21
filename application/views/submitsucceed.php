<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>
<div id="container">
	<div id="profile">
		<div id="managebox">
			印单已成功提交！请返回<?php echo anchor('welcome'); ?>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>