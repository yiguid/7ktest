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
			（平台公告图片栏）
		</div>
		<div id="shop_word">
			<marquee height="60" width="990">宣传语</marquee>
		</div>
		<div id="shop_body">
			<div id="shop_services">
				<ul id="listTab" class="navlist">
					<li><a href="<?php echo $curPath."doc"?>" >特色资料</a></li>
					<li><a class="current" href="#" >特色业务</a></li>
					<li><a href="<?php echo $curPath."evaluation"?>" >评    价</a></li>
					<li><a href="<?php echo $curPath."message"?>">留    言</a></li>
					<li><a href="<?php echo $curPath."promotion"?>">促    销</a></li>
	        	</ul>
	        	<div id="doc-class">
					<ul class="nav nav-pills" style="float:right">
						<?php foreach ($docClass as $key => $value) {	?>
						<li <?php if($key == $curClassID) echo "class=active";?>><a href="<?php echo "$key"?>"><?php echo "$value"?></a></li>
						<?php } ?>
					</ul>
					<div style="clear:both;"></div>
				</div>
			</div>
			<div id="shop_details">
				详细信息
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>