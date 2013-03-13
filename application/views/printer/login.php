<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('printer/header');
?>
<div id="printer_container">
	<div id="login_main">
		<div id="login_left">
			<h1>Welcome to 7KMall!</h1>
			<h2>Printer Login!</h2>
			<div id="myCarousel" class="carousel slide">
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			  </ol>
			  <!-- Carousel items -->
			  <div class="carousel-inner">
			    <div class="active item"><img src="<?php echo base_url();?>images/bootstrap-mdo-sfmoma-01.jpeg"/></div>
			    <div class="item"><img src="<?php echo base_url();?>images/bootstrap-mdo-sfmoma-02.jpeg"/></div>
			    <div class="item"><img src="<?php echo base_url();?>images/bootstrap-mdo-sfmoma-03.jpeg"/></div>
			  </div>
			  <!-- Carousel nav -->
			  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
		</div>
		<div id="login_right">
		<form action="login" method="post">
			<table>
				<tr>
					<td>用户名：</td>
					<td><input class="input-block-level" type="text" name="username" id="username"></input></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input class="input-block-level" type="password" name="password" id="password"></input></td>
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