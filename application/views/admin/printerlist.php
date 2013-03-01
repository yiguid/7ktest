<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Printer List</title>
</head>
<body>

<div id="container">
	<h1>Welcome to 7KMall!</h1>

	<div id="body">
		<form action="printer/add" method="post">
			<table>
				<tr>
					<td>打印店名称：</td>
					<td><input type="text" name="name" id="name"></input></td>
				</tr>
				<tr>
					<td>打印店位置：</td>
					<td><input type="text" name="location" id="location"></input></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="提交"/></td>
					<td><input type="reset" name="reset" value="重置"/></td>
				</tr>
			</table>
		</form>
		<p>Printer List</p>
		<?php foreach($printerlist as $printer):?>  
  
		<li><?php echo $printer->id ." | ".$printer->name ." | ".$printer->location;?></li>  
  
		<?php endforeach;?>  
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>