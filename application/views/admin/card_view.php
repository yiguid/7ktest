<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Card List</title>
</head>
<body>

<div id="container">
	<h1>Welcome to 7KMall!</h1>

	<div id="body">
		<form action="<?php echo base_url();?>admin/card/add" method="post">
			<table>
				<tr>
					<td>充值卡序列号：</td>
					<td><input type="text" name="id" id="id"></input></td>
				</tr>
				<tr>
					<td>充值卡密码：</td>
					<td><input type="text" name="password" id="password"></input></td>
				</tr>
				<tr>
					<td>充值卡面值：</td>
					<td><input type="text" name="amount" id="amount"></input></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="提交"/></td>
					<td><input type="reset" name="reset" value="重置"/></td>
				</tr>
			</table>
		</form>
		<p>Card List</p>
		<?php foreach($cardlist as $card):?>  
  
		<li><?php echo $card->id ." | ".$card->password ." | ".$card->amount ." | ". $card->rechargeuserid ." | ".$card->rechargetime ;?></li>  
  
		<?php endforeach;?>  
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>