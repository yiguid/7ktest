<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>
<div id="container">
	<div id="profile">
		<div style="padding:20px;">
			印单已成功提交！您可以：
			<div><a style="color:white;" href="<?php echo base_url();?>printtask?id=<?php echo $printtaskid;?>"
				class="btn btn-warning btn-large">查看印单</a>
			<a style="color:white;" href="<?php echo base_url();?>welcome"
				class="btn btn-info btn-large">返回首页</a></div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>