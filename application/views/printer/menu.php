<div id="printer_container">
	<div id="profile">
		<div class="manage_list">
			<div class="profile_title">
				<i style="margin:6px 0 0 30px;" class='icon-user'></i>
				<a href="manage">打印店中心</a>
			</div>
			<div class="printer_divider"></div>
			<div class="menu_title">打印任务管理</div>
			<div class="menu_content"><i class='icon-bullhorn'></i><a href="<?php echo base_url();?>printer/printhistory">全部任务</a></div>
			<div class="menu_content"><i class='icon-bell'></i><a href="<?php echo base_url();?>printer/printhistory/method/self">自行取印任务</a></div>
			<div class="menu_content"><i class='icon-briefcase'></i><a href="<?php echo base_url();?>printer/printhistory/method/campus">校园送印任务</a></div>
			<div class="menu_content"><i class='icon-gift'></i><a href="<?php echo base_url();?>printer/printhistory/method/express">快递送印任务</a></div>
			<div class="menu_title">文件管理</div>
			<div class="menu_content"><i class='icon-file'></i><a href="<?php echo base_url();?>printer/documenthistory">印单文件</a></div>
			<div class="menu_content"><i class='icon-star'></i><a href="<?php echo base_url();?>printer/specialdoc">特色资料</a></div>
			<div class="menu_title">打印店管理
				<a href="<?php echo base_url().'shop/doc/'.$this->session->userdata('id');?>">[查看店铺]</a></div>
			<div class="menu_content"><i class='icon-eye-open'></i><a href="<?php echo base_url();?>printer/manage/info">基本信息</a></div>
			<div class="menu_content"><i class='icon-globe'></i><a href="<?php echo base_url();?>printer/manage/yewu">业务管理</a></div>
			<div class="menu_content"><i class='icon-heart'></i><a href="<?php echo base_url();?>printer/manage/rating">信誉评价</a></div>
			<div class="menu_content"><i class='icon-calendar'></i><a href="<?php echo base_url();?>printer/manage/money">财务管理</a></div>
			<div class="menu_content"><i class='icon-cog'></i><a href="<?php echo base_url();?>printer/manage/password">修改密码</a></div>
		</div>