<?php $this->load->view('shop/shop_header_view');?>
<?php
	$shopName='北大图书馆一楼打印店';
	$docClass= array('所有类别','上大数学系历届试卷','上大数学系考研历届试卷','上大公共课历届试卷','上大数学系课程笔记');
	$curPath= base_url()."shop/";
	$typearr=array('催单','网站错误','功能建议','投诉');
?>
<script type="text/javascript">
			function msgInit()
			{
				var perpage = <?php echo $perpage?>;
	            var total = <?php echo $total;?>;
	            var pterid = <?php echo $pterid;?>;
	            var url = '<?php echo base_url()."ajax/shopajax/get_shop_msg";?>';
	            var postdata = { pterid : pterid };
	             $("#jtpagination").divpagination(total, {
                    items_per_page: perpage, // Show only one item per page
                    prev_text:'上一页',
                    next_text:'下一页',
                    num_display_entries:5,
                    num_edge_entries:1
                },url,postdata,'#shop_msg_view');
			}
         
            // When document is ready, initialize pagination
            $(document).ready(function(){
            	msgInit();
            });

</script>
<div id='shop_container'>
	<div id="shop_main">
		<?php $this->load->view('shop/shop_banner_view');?>
		<div id="shop_body">
			<div id="shop_services">
				<ul id="listTab" class="navlist">
					<li><a href="<?php echo $curPath."doc/$pterid"?>" >特色资料</a></li>
					<li><a href="<?php echo $curPath."service/$pterid"?>" >特色业务</a></li>
					<li><a href="<?php echo $curPath."rate/$pterid"?>" >评    价</a></li>
					<li><a class="current" href="<?php echo $curPath."msg/$pterid"?>">留    言</a></li>
					<li><a href="<?php echo $curPath."promotion/$pterid"?>">促    销</a></li>
	        	</ul>
	        	<div id="shop_msg">
					<div id="shop_msg_view">
						<?php
							$data['msglist']=$this->shop_mdl->get_shop_msg($perpage,0,$pterid);
							$this->load->view('shop/message_list_view.php',$data);
						?>
					</div>
					<div id="jtpagination"></div>
					<?php if($this->auth->logged_in()){	?>
						<div class="create">
							<form class="form-horizontal" action="<?php echo base_url()."shop/create/$pterid"?>" method="post">
							 <div class="control-group">
							    <span style="padding-top:6px;" class="help-inline">* 留言类型：</span>
							    <label class="radio inline">
							      <input class="inline" type="radio" name="msgtype" value="1" checked>
							      	催单
							    </label>
							    <label class="radio inline">
							      <input type="radio" name="msgtype" value="2">
							      	网站错误
							    </label>
							    <label class="radio inline">
							      <input type="radio" name="msgtype" value="3">
							      	功能建议
							    </label>
							    <label class="radio inline">
							      <input type="radio" name="msgtype" value="4">
									投诉
							    </label>
							</div>
							<div>
								 <?php if(isset($create_error)) echo "<lable>".$create_error."</lable>";?>
							     <textarea name="msgcontent" id="msgcontent" style="width:600px"></textarea>
							</div>
							<div style="padding:10px;">
							    <button class="btn btn-primary" type="submit" name="submit">发表留言</button>
							    <button class="btn btn-inverse" type="reset" name="reset">重写</button>
							</div>
							</form>
						</div>
					<?php }elseif(!$this->auth->printer_logged_in()){?>
						<div>
							 若您要留言？请您先<?php echo anchor(base_url().'login','登录');?>
						</div>
					<?php }?>
				</div>
			</div>
			<?php $this->load->view('shop/details_view'); ?>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>