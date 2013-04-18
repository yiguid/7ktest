<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
		<div id="managebox">
			<div class="content-header">
				<h4>个人中心</h4>
				<h3>账户余额：<?php echo $total;?></h3>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>