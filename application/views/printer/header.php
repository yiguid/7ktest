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
<link rel="icon" href="favicon.ico"/>
<link rel="shortcut icon" href="favicon.ico"/>
<script src="<?php echo base_url();?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/common.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/bootstrap/bootstrap.js"></script>
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
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-ie.js"></script>
<![endif]-->
</head>
<body>
<div id="header" align="center">
	<div id="menu">
		<div id="menu_logo">
			<img height="30" width="78" src="<?php echo base_url();?>images/logo.png"/>
		</div>
		<div id="menu_list">
			<span style="float:left;">	
				<a style="color:white;" href="<?php echo base_url();?>printer/manage">云打印店</a>
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
				&nbsp;&nbsp;<?php echo anchor('printer/login/logout','退出','style="color:#D6E4FB;"'); 
				}
				else
				{
					echo anchor('printer/regist','注册','style="color:#D6E4FB;"');
					echo "&nbsp;&nbsp;";
					echo anchor('printer/login','登录','style="color:#D6E4FB;"'); 
				}
				echo "&nbsp;&nbsp;";
				echo anchor('feedback','反馈留言','style="color:#D6E4FB;"');
				?>
				</div>
			</span>
			<script type="text/javascript">
				$(function(){
					$('<audio id="notifyAudio"><source src="<?php echo base_url(); ?>images/notify.ogg" type="audio/ogg"><source src="<?php echo base_url(); ?>images/notify.mp3" type="audio/mpeg"><source src="<?php echo base_url(); ?>images/notify.wav" type="audio/wav"></audio>').appendTo('body');//载入声音文件
					var interval = setInterval(checkTask,1000*60);

					function checkTask(){
						$.post('<?php echo base_url();?>' + "ajax/printajax/checkTask", {
						}, function(data) {
							if (data > 0){
								$('#notifyAudio')[0].play();//播放声音
								$('#notifyPanel').html('<a style="color:red;" href="<?php echo base_url();?>printer/printhistory">你有' + data + '个印单任务待处理~&nbsp;&nbsp;</a>'); 
							}
						});
					}
				});
			</script>
			<span id="notifyPanel" style="float:right;"></span>
		</div>
	</div>
</div>
<div class="virtual_body" align="center">
	<div class="virtual_header"></div>