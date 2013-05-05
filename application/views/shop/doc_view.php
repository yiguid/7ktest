<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
	$this->load->view('header');
?>
<?php
	$shopPath=array('上海大学（宝山校区）','北大图书馆一楼打印店');
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
			 	<li><a href="#"><?php echo $shopPath[0]?></a> <span>/</span></li>
			 	<li class="active"><?php echo $shopPath[1]?></li>
			</ul>
			（平台公告图片栏）
		</div>
		<div id="shop_word">
			<marquee height="60" width="990">宣传语</marquee>
		</div>
		<div id="shop_body">
			<div id="shop_services">
				<ul id="listTab" class="navlist">
					<li><a class="current" href="<?php echo $curPath."doc/$pterid-$docClassid-$curPage" ?> ">特色资料</a></li>
					<li><a href="<?php echo $curPath."service"?>" >特色业务</a></li>
					<li><a href="<?php echo $curPath."rate"?>" >评    价</a></li>
					<li><a href="<?php echo $curPath."msg/$pterid-1"?>">留    言</a></li>
					<li><a href="<?php echo $curPath."promotion"?>">促    销</a></li>
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
				详细信息
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>