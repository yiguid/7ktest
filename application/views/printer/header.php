<?php if( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN" >
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title><?php echo $page_title;?>-7KMall</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/pagination.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/printer.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/pagination.css" type="text/css" />
<link href="<?php echo base_url();?>css/bootstrap/bootstrap.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.css" type="text/css" />
<script src="<?php echo base_url();?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/common.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.pagination.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.rating.js"></script>
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
			<a href="<?php echo base_url();?>printer/manage">云打印店</a>
			<a href="<?php echo base_url();?>welcome">云打印</a>
		</span>
		<span style="float:right;">
			<div class="dropdown">
			<?php 
			if(isset($user)) 
			{ ?>
				<a style="color:white;" data-toggle="dropdown" href=""><?php echo $user; ?><i class="icon-chevron-down icon-white"></i></a>
			  	<ul id="dropdown-menu" class="dropdown-menu" role="menu" aria-labelledby="dLabel">
					<li><a tabindex="-1" href="<?php echo base_url();?>printer/manage"><i class="icon-user"></i>打印店中心</a></li>
					<li class="divider"></li>
				    <li><a tabindex="-1" href="<?php echo base_url();?>printer/printhistory"><i class="icon-bullhorn"></i>全部任务</a></li>
				    <li><a tabindex="-1" href="<?php echo base_url();?>printer/printhistory"><i class="icon-bell"></i>自行取印任务</a></li>
				    <li><a tabindex="-1" href="<?php echo base_url();?>printer/printhistory"><i class="icon-briefcase"></i>校园送印任务</a></li>
				    <li><a tabindex="-1" href="<?php echo base_url();?>printer/printhistory"><i class="icon-gift"></i>快递送印任务</a></li>
				    <li class="divider"></li>
				    <li><a tabindex="-1" href="<?php echo base_url();?>printer/documenthistory"><i class="icon-file"></i>印单文件</a></li>
				    <li><a tabindex="-1" href="<?php echo base_url();?>printer/specialdoc"><i class="icon-star"></i>特色资料</a></li>
					<li class="divider"></li>
					<li><a tabindex="-1" href="<?php echo base_url();?>printer/manage/info"><i class="icon-eye-open"></i>基本信息</a></li>
				    <li><a tabindex="-1" href="<?php echo base_url();?>printer/manage/yewu"><i class="icon-globe"></i>业务管理</a></li>
					<li><a tabindex="-1" href="<?php echo base_url();?>printer/manage/rating"><i class="icon-heart"></i>信誉评价</a></li>
					<li><a tabindex="-1" href="<?php echo base_url();?>printer/manage/money"><i class="icon-calendar"></i>财务管理</a></li>
					<li><a tabindex="-1" href="<?php echo base_url();?>printer/manage/password"><i class="icon-cog"></i>修改密码</a></li>
					<li class="divider"></li>
					<li><a tabindex="-1" href='<?php echo base_url()."shop/doc/".$this->session->userdata('id');?>'><i class="icon-cog"></i>查看店铺</a></li>
				</ul>
			&nbsp;&nbsp;<?php echo anchor('printer/login/logout','退出'); 
			}
			else
			{
				echo anchor('printer/regist','注册');
				echo "&nbsp;&nbsp;";
				echo anchor('printer/login','登录'); 
			}
			echo "&nbsp;&nbsp;";
			echo anchor('feedback','反馈留言');
			?>
			</div>
		</span>
	</div>
</div>
</div>