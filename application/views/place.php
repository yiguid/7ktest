<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>
<div id="container">
	<div id="profile">
		<div>
			<?php echo anchor('location/at/beijing','北京'); ?>
			<?php echo anchor('location/at/shanghai','上海'); ?>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>