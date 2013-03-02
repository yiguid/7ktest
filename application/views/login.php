<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('header');
?>

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
					<td><input type="text" name="username" id="username"><?php echo form_error('username')?></input></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input type="password" name="password" id="password"><?php echo form_error('password')?></input></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="提交"/></td>
					<td><input type="reset" name="reset" value="重置"/></td>
				</tr>
			</table>
		</form> 
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>