<img height="30" width="78" src="<?php echo base_url();?>images/logo.png"/>			//插入图片的方法	
<p>Copyright ©2012-2013 7kmall.com, All Rights Reserved.</p>						//一排字   
<?php if( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>   //访问控制，重新定向语句

########################################################################################################

/*标准抬头*/
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

</head>W
########################################################################################################
<?php if( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN" >
<head>				//head Start
<meta http-equiv="content-type" content="text/html; charset=UTF-8">


<title><?php echo $page_title;?>-7KMall</title>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/pagination.css" type="text/css" />


<script src="<?php echo base_url();?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/common.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.pagination.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.blockUI.js" type="text/javascript"></script>

<!--[if lte IE 6]>
<link href="css/ieonly.css" rel="stylesheet" type="text/css" />
<![endif]-->

</head>				//head End
########################################################################################################
		<span style="float:right;">
			<?php 
			if(isset($user)) 
			{ ?>欢迎您，<?php echo $user."　".anchor('manage','个人中心'); ?>
			&nbsp;&nbsp;<?php echo anchor('login/logout','退出'); 
			}
			else
			{
				echo anchor('regist','注册');
				echo "&nbsp;&nbsp;";
				echo anchor('login','登录'); 
			}
			
			?>
			&nbsp;&nbsp;反馈留言
		</span>





