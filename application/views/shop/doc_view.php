<?php $this->load->view('shop/shop_header_view');?>
<?php
	$docClass= array('所有类别','考试资料','课程学习','其他资料');
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
		<?php $this->load->view('shop/shop_banner_view');?>
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
					<table class="table table-hover manage_table">
						<tr class="table_header">
							<td>ID</td><td>文件名</td><td>大小</td><td>描述</td><td>页数</td><td>价格</td><td>操作</td>
						</tr>
						<?php foreach($docList as $doc):?>  
							<tr>
							<?php echo "<td>".$doc->id ."</td><td>".substr($doc->name, 0,30)."</td><td>"
							.$doc->size."</td><td>".$doc->description."</td><td>".$doc->page."</td><td>"
							.$doc->price."</td><td>";
							if($this->session->userdata('user_type') == 'user'){
								echo "<a href=\"javascript:addSpecDocToPrinttask('".base_url()
								."','".$doc->id."','".$pterid."','".$name."')\" >印一份</a>";
							}else{
								echo "查看";
							}
							
							echo "</td>";?>
							</tr>
							<?php endforeach;?>
					</table>
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
			<?php $this->load->view('shop/details_view'); ?>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>