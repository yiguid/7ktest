<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('header');
?>
<div id="container">
	<div id="profile">
		<div id="login_main">
			<div id="login_left">
				<div id="login_left_left">
					<div id="login_left_title">
						<div id="login_title">奇客云打印</div>
						<div id="login_title_content">奇客云打印，寻找资料、远程
						打印更容易。</div>
					</div>
					<div id="login_left_mid_img">
						<img src="<?php echo base_url();?>images/login_left.png"/>
					</div>
					<div class="login_left_foot">
						<div class="foot_title">奇客云打印 - 来自7kmall的云服务</div>
						<div class="foot_content">不用出门，没有打印机仍可以轻松打印，
						还可迅速找到并购买以往不易获得的资料和文档。
						轻松提高工作、学习效率、加快您学业、事业前进的脚步。</div>
					</div>
				</div>
				<div id="login_left_right">
					<div id="login_left_right_img">
						<img src="<?php echo base_url();?>images/login_right.png"/>
					</div>
					<div class="login_left_foot">
						<div class="foot_title">一个7kmall账户可以实现诸多功能</div>
						<div class="foot_content">只需一个用户名和一个密码，您即可每日畅享
						7kmall服务所提供的各项功能。更多服务和功能，
						敬请期待！</div>
					</div>
				</div>
			</div>
			<div id="login_right">

			<ul id="mytab" class="nav nav-tabs">
			    <li class="<?php if(!isset($regist)) echo "active"; ?>"><a href="#login" data-toggle="tab">登陆</a></li>
			    <li class="<?php if(isset($regist)) echo "active"; ?>"><a href="#regist" data-toggle="tab">注册</a></li>
			</ul>
			 
			<div style="width:270px;" class="tab-content">
			    <div class="tab-pane <?php if(!isset($regist)) echo "active"; ?>" id="login">
			    	<form action="<?php echo base_url();?>login" method="post">
						<div style="text-align:left;">
							<div>用户名</div>
							<div style="margin-top:6px;"><input style="width:270px;" class="input-block-level" type="text" name="username" id="username" value="<?php echo set_value('username'); ?>"><?php echo form_error('username')?></input>
							</div>
							<div>密码</div>
							<div style="margin-top:6px;"><input style="width:270px;" class="input-block-level" type="password" name="password" id="password"><?php echo form_error('password')?></input>
							</div>
							<div><?php if(isset($login_error)) echo $login_error;?></div>
							<div style="margin-top:10px;"><input class="btn-metro" type="submit" name="submit" value="登 录"/></div>
							<div><?php if(isset($regist_info)) echo $regist_info;?></div>
							<div style="color:#4d8fff;margin-top:10px;"><a href="<?php echo base_url();?>feedback">无法访问您的账户？</a><span style="margin-left:80px;"><a href="<?php echo base_url();?>printer/login">打印店登录>></a></span></div>
						</div>
					</form> 
			    </div>
			    <div class="tab-pane <?php if(isset($regist)) echo "active"; ?>" id="regist">
			    	<form action="<?php echo base_url();?>regist" method="post">
						<table>
							<tr>
								<td>邮箱：</td>
								<td>
									<input style="width:180px;" class="input-block-level" type="text" name="reg_username" id="reg_username" value="<?php echo set_value('reg_username'); ?>"><?php echo form_error('reg_username')?></input>
								</td>
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
								<td><input class="btn btn-success" type="submit" name="submit" value="注册"/></td>
								<td><input class="btn btn-success" type="reset" name="reset" value="重置"/></td>
							</tr>
							<tr>
								<td></td>
								<td><span style="color:red;"><?php if(isset($regist_info)) echo $regist_info;?>
									<?php if(isset($regist_error)) echo $regist_error;?></span></td>
								<?php if(isset($regist_info)) {?>
									<script type="text/javascript">
										alert("注册成功，请登陆！");
									</script>
								<?php
								}
								?>
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