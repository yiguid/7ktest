<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User List</title>
</head>
<body>

<div id="container">
	<h1>Welcome to 7KMall!</h1>

	<div id="body">
		<form action="<?php echo base_url();?>admin/user/add" method="post">
			<table>
				<tr>
					<td>用户名：</td>
					<td><input type="text" name="username" id="username"></input></td>
				</tr>
				<tr>
					<td>昵称：</td>
					<td><input type="text" name="nickname" id="nickname"></input></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input type="password" name="password" id="password"></input></td>
				</tr>
				<tr>
					<td>邮箱：</td>
					<td><input type="text" name="email" id="email"></input></td>
				</tr>
				<tr>
					<td>手机号：</td>
					<td><input type="text" name="mobile" id="mobile"></input></td>
				</tr>
				<tr>
					<td>省份：</td>
					<td><input type="text" name="province" id="province"></input></td>
				</tr>
				<tr>
					<td>城市：</td>
					<td><input type="text" name="city" id="city"></input></td>
				</tr>
				<tr>
					<td>详细地址：</td>
					<td><input type="text" name="address" id="address"></input></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="提交"/></td>
					<td><input type="reset" name="reset" value="重置"/></td>
				</tr>
			</table>
		</form>
		<p>User List</p>
		<?php foreach($userlist as $user):?>  
  
		<li><?php echo $user->id ." | ".$user->username ." | ".$user->nickname ." | ". $user->email ." | ".$user->mobile ." | ". $user->address ." | ".$user->level;?></li>  
  
		<?php endforeach;?>  
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>