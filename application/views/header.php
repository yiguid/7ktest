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
<script src="<?php echo base_url();?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/common.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<!--[if lte IE 6]>
<link href="css/ieonly.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>
<div class="center" align="center">
<div id="header">
<div id="menu">
	<div id="menu_logo">
		<img height="30" width="78" src="<?php echo base_url();?>images/logo.png"/>
	</div>
	<div id="menu_list">
		<span style="float:left;">	
			<a style="color:white;" href="<?php echo base_url();?>welcome">云打印</a>
			<a href="<?php echo base_url();?>printer/login">云打印店</a>
		</span>
		<span style="float:right;">
			<div class="dropdown">
			<?php 
			if(isset($user)) 
			{ ?>
			
			  <!-- Link or button to toggle dropdown -->
			  	欢迎您，
				<a style="color:white;" data-toggle="dropdown" href=""><?php echo $user; ?><i class="icon-chevron-down icon-white"></i></a>
			  	<ul id="dropdown-menu" class="dropdown-menu" role="menu" aria-labelledby="dLabel">
					<li><a tabindex="-1" href="<?php echo base_url();?>manage"><i class="icon-user"></i>个人中心</a></li>
					<li class="divider"></li>
				    <li><a tabindex="-1" href="<?php echo base_url();?>printhistory"><i class="icon-inbox"></i>历史印单</a></li>
				    <li><a tabindex="-1" href="<?php echo base_url();?>documenthistory"><i class="icon-file"></i>历史文件</a></li>
				    <li class="divider"></li>
				    <li><a tabindex="-1" href="<?php echo base_url();?>manage/changepwd"><i class="icon-lock"></i>修改密码</a></li>
				    <li><a tabindex="-1" href="<?php echo base_url();?>manage/address"><i class="icon-home"></i>我的地址</a></li>
				</ul>
			&nbsp;&nbsp;<?php echo anchor('login/logout','退出'); 
			}
			else
			{
				echo anchor('regist','注册');
				echo "&nbsp;&nbsp;";
				echo anchor('login','登录'); 
			}
			echo "&nbsp;&nbsp;";
			echo anchor('feedback','反馈留言');
			?>
			</div>
		</span>
	</div>
</div>
</div>