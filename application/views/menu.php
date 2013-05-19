<div id="container">
	<div id="profile">
		<div class="manage_list">
			<div class="profile_title">
				<i style="margin:6px 0 0 30px;" class='icon-user'></i>
				<a href="<?php echo base_url();?>manage">个人中心</a>
			</div>
			<script type="text/javascript">
				$(function(){ 
					var cur = 0;
					var title = <?php echo $cur_title;?>;
					$(".menu_content").each(function(){
							cur++;
							if(cur == title)
								$(this).addClass('cur');
					});
					  
				});
			</script>
			<div class="divider"></div>
			<div class="menu_title">账户相关</div>
			<div class="menu_content"><i class='icon-briefcase'></i><a href="<?php echo base_url();?>manage/recharge">账户充值</a></div>
			<div class="menu_content"><i class='icon-eye-open'></i><a href="<?php echo base_url();?>manage/money">收支明细</a></div>
			<div class="menu_content"><i class='icon-home'></i><a href="<?php echo base_url();?>manage/address">我的地址</a></div>
			<div class="menu_title">印单管理</div>
			<div class="menu_content"><i class='icon-inbox'></i><a href="<?php echo base_url();?>printhistory">最近印单</a></div>
			<div class="menu_content"><i class='icon-time'></i><a href="<?php echo base_url();?>printhistory">历史印单</a></div>
			<div class="menu_title">文档管理</div>
			<div class="menu_content"><i class='icon-file'></i><a href="<?php echo base_url();?>documenthistory">我的上传</a></div>
			<div class="menu_content"><i class='icon-bookmark'></i><a href="<?php echo base_url();?>feed">我的订阅</a></div>
			<div class="menu_content"><i class='icon-star'></i><a href="<?php echo base_url();?>favorite">我的收藏</a></div>
			<div class="menu_title">安全设置</div>
			<div class="menu_content"><i class='icon-cog'></i><a href="<?php echo base_url();?>manage/changepwd">修改密码</a></div>
			<div class="menu_content"><i class='icon-lock'></i><a href="<?php echo base_url();?>manage/safe">账户保护</a></div>
			<div class="divider"></div>
			<a style="color:white;" href="<?php echo base_url();?>welcome">
			<div class="printer_more">
				返回打印页面
			</div>
			</a>

		</div>