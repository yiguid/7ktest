<?php $this->load->view('shop/shop_header_view');?>
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
		<?php $this->load->view('shop/shop_banner_view');?>
		<div id="shop_body">
			<div id="shop_services">
				<ul id="listTab" class="navlist">
					<li><a href="<?php echo $curPath."doc/$pterid-0-1"?>" >特色资料</a></li>
					<li><a class="current" href="<?php echo $curPath."service/$pterid"?>" >特色业务</a></li>
					<li><a href="<?php echo $curPath."rate/$pterid"?>" >评    价</a></li>
					<li><a href="<?php echo $curPath."msg/$pterid-1"?>">留    言</a></li>
					<li><a href="<?php echo $curPath."promotion/$pterid"?>">促    销</a></li>
	        	</ul>
	        	<div id="doc-class">
					<div style="clear:both;"></div>
				</div>
			</div>
			<?php $this->load->view('shop/details_view'); ?>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>