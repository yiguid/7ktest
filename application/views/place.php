<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>
<div id="container">
	<div id="profile">
		<div style="padding:20px;">
			<a style="color:white;" href="<?php echo base_url();?>shop"
				class="btn btn-warning btn-large"
				onmouseover= "get_printshop_by_location('<?php echo base_url();?>','beijing')">北京</a>
			<a style="color:white;" href="<?php echo base_url();?>location/at/shanghai"
				class="btn btn-warning btn-large"
				onmouseover= "get_printshop_by_location('<?php echo base_url();?>','shanghai')">上海</a>
		</div>
		<div id="printshop">
			<a style="color:white;" href="#"
				class="btn btn-info btn-large">请选择您所在的区域...</a>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>