<?php if( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN" >
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title><?php echo $page_title;?>-7KMall</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/pagination.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/datetimepicker.css" type="text/css" />
<link href="<?php echo base_url();?>css/bootstrap/bootstrap.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.css" type="text/css" />
<link rel="icon" href="favicon.ico"/>
<link rel="shortcut icon" href="favicon.ico"/>
<script src="<?php echo base_url();?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/common.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.pagination.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.rating.js"></script>

<!--[if lte IE 6]>
<!--bsie css 补丁文件 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-ie6.css">
<!-- bsie 额外的 css 补丁文件 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ie.css">
<![endif]-->
<!--[if lte IE 6]>
<!-- bsie js 补丁只在IE6中才执行 -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-ie.js">$.bootstrapIE6(el)</script>
<![endif]-->
<style type="text/css">
#div_search{
	line-height: 24px;
	width: 350px;
	height: 24px;
	position: absolute;
	top: 6px;
	left: 200px;
}
</style>
</head>
<body>
<div id="header" align="center">
	<div id="menu">
		<div id="menu_logo">
			<a href="<?php echo base_url();?>"><img height="30" width="78" src="<?php echo base_url();?>images/logo.png"/></a>
		</div>
		<div id="menu_list">
			<div style="float:left;">	
				<a style="color:white;" href="<?php echo base_url();?>welcome">云打印</a>
			</div>
			<div style="float:right;">
				<div class="dropdown">
				<?php 
				if(isset($user)) 
				{ ?>
				
				  <!-- Link or button to toggle dropdown -->
					<a style="color:white;" data-toggle="dropdown" href=""><?php echo $user; ?><i class="icon-chevron-down icon-white"></i></a>
				  	<ul id="dropdown-menu" class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li><a tabindex="-1" href="<?php echo base_url();?>manage"><i class="icon-user"></i>个人中心</a></li>
						<li class="divider"></li>
					    <li><a tabindex="-1" href="<?php echo base_url();?>manage/recharge"><i class="icon-briefcase"></i>账户充值</a></li>
					    <li><a tabindex="-1" href="<?php echo base_url();?>manage/money"><i class="icon-eye-open"></i>收支明细</a></li>
					    <li><a tabindex="-1" href="<?php echo base_url();?>manage/address"><i class="icon-home"></i>我的地址</a></li>
					    <li class="divider"></li>
					    <li><a tabindex="-1" href="<?php echo base_url();?>printhistory"><i class="icon-inbox"></i>最近印单</a></li>
					    <li><a tabindex="-1" href="<?php echo base_url();?>printhistory"><i class="icon-time"></i>历史印单</a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" href="<?php echo base_url();?>documenthistory"><i class="icon-file"></i>我的上传</a></li>
					    <li><a tabindex="-1" href="<?php echo base_url();?>feed"><i class="icon-bookmark"></i>我的订阅</a></li>
						<li><a tabindex="-1" href="<?php echo base_url();?>favorite"><i class="icon-star"></i>我的收藏</a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" href="<?php echo base_url();?>manage/changepwd"><i class="icon-cog"></i>修改密码</a></li>
						<li><a tabindex="-1" href="<?php echo base_url();?>manage/safe"><i class="icon-lock"></i>账户保护</a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" href="<?php echo base_url();?>welcome"><i class="icon-shopping-cart"></i>查看印单</a></li>
						<li><a tabindex="-1" href="<?php echo base_url();?>welcome/cleartask"><i class="icon-trash"></i>清空印单</a></li>
					</ul>
				<?php echo anchor('login/logout','退出','style="color:#D6E4FB;"'); 
				}
				else
				{
					echo anchor('regist','注册','style="color:#D6E4FB;"');
					echo "&nbsp;&nbsp;";
					echo anchor('login','登录','style="color:#D6E4FB;"'); 
				}
				echo "&nbsp;&nbsp;";
				echo anchor('feedback','反馈留言','style="color:#D6E4FB;"');
				?>
				</div>
			</div>
			<?php 
			if(isset($user)) 
			{ ?>
			<div id="div_search">
				<form action="<?php echo base_url();?>search" method="post">
				<input type="text" name="keywords" style="height:18px;float:left" onkeydown="if (event.keyCode==13) {}" onblur="if(this.value=='')value='搜索打印店、特色资料';" onfocus="if(this.value=='搜索打印店、特色资料')value='';" value="搜索打印店、特色资料" size="10"/>
				<input type="submit" class="btn" value="搜一下" style="height:24px;float:left">
				</form>
			</div>
			<?php }?>
		</div>
	</div>
</div>
<div class="virtual_body" align="center">
	<div class="virtual_header"></div>
	<script type="text/javascript">
		$(function(){
			if(document.all)
				alert('您正在使用IE浏览器，无法得到网站的最佳体验，建议升级为Chrome，Firefox或其他符合W3C标准的浏览器');
		});
	</script>
