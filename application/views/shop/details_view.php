			<script type="text/javascript">
			var url= '<?php echo base_url()."ajax/shopajax/rate";?>';

			var score = <?php echo $this->shop_mdl->get_avg_rating($pterid,1);?>;
			var rate_enable = false;

			var pterid = <?php echo $pterid;?>;
			var type = 1;
			
			var postdata = {destid : pterid, type : type};
			<?php if($this->auth->logged_in()) {?>
				var userid = <?php echo $this->session->userdata('id');?>;
				rate_enable = !<?php echo $this->shop_mdl->is_rating_shop($this->session->userdata('id'),$pterid);?>;
				$.extend(postdata,{userid : userid});
			<?php }?>
			 $(document).ready(function(){
                $("#test").rating({score : score, rate_enable : rate_enable},url,postdata);
            });
			</script>
			<div id="shop_details">
				<div id="shop_details_head">
					<h3><?php echo $shopInfo->name?></h3>
					<?php
						$avg_rating = $this->shop_mdl->get_avg_rating($pterid,1);
						//仅普通用户登录时可见
						if(!isset($user)){
							//未登录，要先登录
					?>
					<input class="btn" type="button" onclick="alert('请您先登录')" value="添加收藏">
					<input class="btn" type="button" onclick="alert('请您先登录')" value="投诉店铺">
					<?php } elseif ($this->auth->logged_in()) {
						//要判断是否已收藏
						//$this->load->model('shop_mdl');
						if($this->shop_mdl->is_add_favorite($this->session->userdata('id'),$pterid,1)){
					?>
						<input class="btn" type="button" value="已收藏" disabled="disabled">
					<?php }else{
							$userid = $this->session->userdata('id');
					?>
						<input id="collectbtn" class="btn" type="button" onclick="javascript:collect(<?php echo '\''.base_url().'\',\''.$userid.'\',\''.$pterid.'\',\'1\'';?>)" value="添加收藏">
					<?php  } ?>
						<input class="btn" type="button" value="投诉店铺">
					<?php  } ?>
				</div>
				<div style="heihgt:30px;line-height:30px;margin-left:15px;">
					<div>
					<span style="float:left">店铺信誉：</span>
					<div id="test"></div>
					</div>
				</div>
				<div class="shop_details_info">地址：<?php echo $shopInfo->address?></div>
				<div class="shop_details_info">联系方式：<?php echo $shopInfo->contact?></div>
				<div class="shop_details_info">店铺介绍：<?php echo $shopInfo->intro?></div>
				
				<?php if($this->session->userdata('user_type') == 'user') {?>
				<a style="color:white;" href="<?php echo base_url();?>welcome"><div style="margin-top:100px;" class="printer_more">返回打印页面</div></a>
				<?php } else{?>
				<a style="color:white;" href="<?php echo base_url();?>printer/manage"><div style="margin-top:100px;" class="printer_more">返回打印店中心</div></a>
				<?php }?>
			</div>