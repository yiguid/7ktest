<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
	$this->load->view('header');
?>
<?php
	$docClass= array('所有类别','上大数学系历届试卷','上大数学系考研历届试卷','上大公共课历届试卷','上大数学系课程笔记');
	$curPath= base_url()."shop/";
	if(!isset($curPage))
	{
		$docClassid = 0;
		$curPage = 1;
	}
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
					<li><a class="current" href="<?php echo $curPath."doc/$pterid-$docClassid-$curPage" ?> ">特色资料</a></li>
					<li><a href="<?php echo $curPath."service/$pterid"?>" >特色业务</a></li>
					<li><a href="<?php echo $curPath."rate/$pterid"?>" >评    价</a></li>
					<li><a href="<?php echo $curPath."msg/$pterid-1"?>">留    言</a></li>
					<li><a href="<?php echo $curPath."promotion/$pterid"?>">促    销</a></li>
	        	</ul>
	        	<div id="doc-class">
					<ul class="nav nav-pills" style="float:right">
						<?php foreach ($docClass as $key => $value) {	?>
						<li <?php if($key == $docClassid) echo "class=active";?>><a href="<?php echo $curPath."doc/$pterid-$key-1"?>"><?php echo "$value"?></a></li>
						<?php } ?>
					</ul>
					<div style="clear:both;"></div>
				</div>
				<div id="doc-list">
					<?php echo "$docClassid-$curPage";?>
				</div>
				<div class="pagination btn" id="pagelist" style="float:right">
					<ul>
					<?php
					 $path = $curPath.'doc';
					 $prevPage = max(1,$curPage-1);
					 $nextPage = min($curPage+1,$maxPage);
					 $startPage = max(1,$curPage - 3);
					 $endPage = min($curPage + 3,$maxPage);
					 if($curPage > 1)
					 {
					 	echo '<li>';
					 	echo anchor("$path/$pterid-$docClassid-1", '<<');
					 	echo '</li>';
					 	echo '<li>';
					 	echo anchor("$path/$pterid-$docClassid-$prevPage", '<');
					 	echo '</li>';
					 }
					 for($i = $startPage;$i<=$endPage;$i++)
					 {
					 	if($i==$curPage)
					 	{
					 		echo '<li class="disabled">';
					 	}
					 	else
					 	{
					 		echo '<li class="active">';
					 	}
					 	echo anchor("$path/$pterid-$docClassid-$i", "$i");
					 	echo '</li>';
					 }
					 
					 if($curPage < $maxPage)
					 {
					 	echo '<li>';
					 	echo anchor("$path/$pterid-$docClassid-$nextPage", '>');
					 	echo '</li>';
					 	echo '<li>';
					 	echo anchor("$path/$pterid-$docClassid-$maxPage", '>>');
					 	echo '</li>';
					 }
					?>
					</ul>
				</div>
			</div>
			<div id="shop_details">
				<div id="shop_details_head">
					<h3><?php echo $shopInfo->name?></h3>
					<input class="btn" type="button" value="添加收藏">
					<input class="btn" type="button" value="投诉店铺">
				</div>
				<ul class="star-rating">
						<li class="current-rating"></li>
						<li><a href="#" title="1 star out of 5" class="one-star">1</a></li>
						<li><a href="#" title="2 stars out of 5" class="two-stars">2</a></li>
						<li><a href="#" title="3 stars out of 5" class="three-stars">3</a></li>
						<li><a href="#" title="4 stars out of 5" class="four-stars">4</a></li>
						<li><a href="#" title="5 stars out of 5" class="five-stars">5</a></li>
				</ul>
				<ul>
					<li>信誉评级：
					</li>
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