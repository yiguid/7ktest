<?php $this->load->view('shop/shop_header_view');?>
<?php
	$curPath= base_url()."shop/";
?>
<script type="text/javascript">
	function setPagination(total,perpage,url,postdata,div)
	{
		$("#jtpagination").divpagination(total, {
	     items_per_page: perpage, // Show only one item per page
	    },url,postdata,'#doc-list');
	}
	$(document).ready(function(){
		var pterid = <?php echo $pterid?>;
		var url = '<?php echo base_url()."ajax/shopajax/get_shop_specialdoc";?>';
		var perpage = <?php echo "$perpage";?>;
		var total = <?php echo $total;?>;
		var basepostdata = {pterid : pterid};
		var divTarget = "#doc-list";
		setPagination(total,perpage,url,basepostdata,divTarget);
		$(".nav li").click(function(e){
			//控制显示
			$(".nav li").removeClass('active');
			$(this).attr('class','active');
		});
		$(".nav a").click(function(e){
			var curpostdata = {pterid : pterid};
			var type = $(this).text();
			if(type != '所有类别')
			{
				$.extend(curpostdata,{type : type});
			}
			$.post('<?php echo  base_url()."ajax/shopajax/get_shop_specialdoc_total"?>',curpostdata, function(data) {
				if(data > 0)
				{
		            setPagination(data,perpage,url,curpostdata,divTarget);
				}
				else{
				}
			});
			$.extend(curpostdata,{line : perpage, start : 0});
			$.post(url, curpostdata, function(data) {
				$(divTarget).empty().append(data);
			});
		});
		
	});
</script>
<div id='shop_container'>
	<div id="shop_main">
		<?php $this->load->view('shop/shop_banner_view');?>
		<div id="shop_body">
			<div id="shop_services">
				<ul id="listTab" class="navlist">
					<li><a class="current" href="<?php echo $curPath."doc/$pterid";?> ">特色资料</a></li>
					<li><a href="<?php echo $curPath."service/$pterid"?>" >特色业务</a></li>
					<li><a href="<?php echo $curPath."rate/$pterid"?>" >评    价</a></li>
					<li><a href="<?php echo $curPath."msg/$pterid"?>">留    言</a></li>
					<li><a href="<?php echo $curPath."promotion/$pterid"?>">促    销</a></li>
	        	</ul>
	        	<div id="doc-class">
					<ul class="nav nav-pills" style="float:left">
						<li class='active' ><a>所有类别</a></li>
						<?php foreach ($docTypeList as $row) {	?>
							<li><a><?php echo $row->type ?></a></li>
						<?php } ?>
					</ul>
					<div style="clear:both;"></div>
				</div>
				<div id="doc-list">
					<?php
						$data['docList']=$this->shop_mdl->get_shop_specialdoc($pterid,$perpage,0);
						$data['pterid'] =$pterid;
						$data['name']   =$name;
						$this->load->view('shop/doc_list_view',$data);
					?>
				</div>
				<div id="jtpagination"></div>
			</div>
			<?php $this->load->view('shop/details_view'); ?>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>