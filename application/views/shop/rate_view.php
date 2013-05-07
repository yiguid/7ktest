<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
	$this->load->view('header');
?>
<?php
	$shopName='北大图书馆一楼打印店';
	$docClass= array('所有类别','上大数学系历届试卷','上大数学系考研历届试卷','上大公共课历届试卷','上大数学系课程笔记');
	$curPath= base_url()."shop/";
	$curClassID = 0;
	$curPage = 1;
	$maxPage =10;
?>

<div id='shop_container'>
	<div id="shop_main">
		<div id="shop_image">
			<ul class="breadcrumb" style="float:left;background:transparent;">
				<?php foreach ($location as $key => $value) { ?>
					<li><a href="#"><?php echo $value ?></a> <span>/</span></li>
				<?php } ?>
				<li class="active"><?php echo $name ?></li>
			</ul>
		</div>
		<div id="shop_word">
			<marquee height="60" width="990"><?php echo $shopInfo->notice ?></marquee>
		</div>
		<div id="shop_body">
			<div id="shop_services">
				<ul id="listTab" class="navlist">
					<li><a href="<?php echo $curPath."doc/$pterid-0-1"?>" >特色资料</a></li>
					<li><a href="<?php echo $curPath."service/$pterid"?>" >特色业务</a></li>
					<li><a class="current" href="<?php echo $curPath."rate/$pterid" ?>" >评    价</a></li>
					<li><a href="<?php echo $curPath."msg/$pterid-1"?>">留    言</a></li>
					<li><a href="<?php echo $curPath."promotion/$pterid"?>">促    销</a></li>
	        	</ul>
	        	<div id="doc-class">
					<div style="clear:both;"></div>
				</div>
			</div>
			<div id="shop_details">
				<div id="shop_details_head">
					<h3><?php echo $shopInfo->name?></h3>
					<input class="btn" type="button" value="添加收藏">
					<input class="btn" type="button" value="投诉店铺">
				</div>
				<ul>
					<li>信誉评级：</li>
					<li>地址：<?php echo $shopInfo->address?></li>
					<li>联系方式：<?php echo $shopInfo->contact?></li>
					<li>店铺介绍：<?php echo $shopInfo->intro?></li>
				</ul>
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>