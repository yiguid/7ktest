<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('header');
?>
<div id="container">
	<div id="profile">
		<div id="login_main">
			<div id="login_left">
				<h1>Welcome to 7KMall!</h1>
				<h2>User Login!</h2>
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

			<ul id="mytab" class="nav nav-tabs">
			    <li class="<?php if(!isset($regist)) echo "active"; ?>"><a href="#login" data-toggle="tab">登陆</a></li>
			    <li class="<?php if(isset($regist)) echo "active"; ?>"><a href="#regist" data-toggle="tab">注册</a></li>
			</ul>
			 
			<div style="width:300px;" class="tab-content">
			    <div class="tab-pane <?php if(!isset($regist)) echo "active"; ?>" id="login">
			    	<form action="<?php echo base_url();?>login" method="post">
						<table>
							<tr>
								<td>用户名：</td>
								<td><input style="width:180px;" class="input-block-level" type="text" name="username" id="username" value="<?php echo set_value('username'); ?>"><?php echo form_error('username')?></input></td>
							</tr>
							<tr>
								<td>密码：</td>
								<td><input style="width:180px;" class="input-block-level" type="password" name="password" id="password"><?php echo form_error('password')?></input></td>
							</tr>
							<tr>
								<td><input class="btn btn-primary" type="submit" name="submit" value="登陆"/></td>
								<td><input class="btn btn-primary" type="reset" name="reset" value="重置"/></td>
							</tr>
							<tr>
								<td></td>
								<td><?php if(isset($regist_info)) echo $regist_info;?></td>
							</tr>
						</table>
					</form> 
			    </div>
			    <div class="tab-pane <?php if(isset($regist)) echo "active"; ?>" id="regist">
			    	<form action="<?php echo base_url();?>regist" method="post">
						<table>
							<tr>
								<td>用户名：</td>
								<td><input style="width:180px;" class="input-block-level" type="text" name="reg_username" id="reg_username" value="<?php echo set_value('reg_username'); ?>"><?php echo form_error('reg_username')?></input></td>
							</tr>
							<tr>
								<td>昵称：</td>
								<td><input style="width:180px;" class="input-block-level" type="text" name="reg_nickname" id="reg_nickname" value="<?php echo set_value('reg_nickname'); ?>"><?php echo form_error('reg_nickname')?></input></td>
							</tr>
							<tr>
								<td>密码：</td>
								<td><input style="width:180px;" class="input-block-level" type="password" name="reg_password" id="reg_password"><?php echo form_error('reg_password')?></input></td>
							</tr>
							<tr>
								<td>重复密码：</td>
								<td><input style="width:180px;" class="input-block-level" type="password" name="re_reg_password" id="re_reg_password"><?php echo form_error('re_reg_password')?></input></td>
							</tr>
							<tr>
								<td>邮箱：</td>
								<td><input style="width:180px;" class="input-block-level" type="text" name="reg_email" id="reg_email" value="<?php echo set_value('reg_email'); ?>"><?php echo form_error('reg_email')?></input></td>
							</tr>
							<tr>
								<td><input class="btn btn-success" type="submit" name="submit" value="注册"/></td>
								<td><input class="btn btn-success" type="reset" name="reset" value="重置"/></td>
							</tr>
							<tr>
								<td></td>
								<td><?php if(isset($regist_info)) echo $regist_info;?></td>
							</tr>
						</table>
					</form> 
			    </div>
			</div>

			
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>