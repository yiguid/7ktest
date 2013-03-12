<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('header');
?>
<link href="<?php echo base_url();?>css/bootstrap/bootstrap.css" rel="stylesheet" media="screen">
<div id="container">
	<div id="login_main">
		<div id="login_left">
			<h1>Welcome to 7KMall!</h1>
		</div>
		<div id="login_right">
		<form action="login" method="post">
			<table>
				<tr>
					<td>用户名：</td>
					<td><input class="input-block-level" type="text" name="username" id="username"><?php echo form_error('username')?></input></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input class="input-block-level" type="password" name="password" id="password"><?php echo form_error('password')?></input></td>
				</tr>
				<tr>
					<td><input class="btn btn-primary" type="submit" name="submit" value="提交"/></td>
					<td><input class="btn btn-primary" type="reset" name="reset" value="重置"/></td>
				</tr>
			</table>
		</form> 
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>