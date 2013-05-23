			<div id="shop_details">
				<div id="shop_details_head">
					<h3><?php echo $shopInfo->name?></h3>
					<input class="btn" type="button" value="添加收藏">
					<input class="btn" type="button" value="投诉店铺">
				</div>
				<div style="heihgt:30px;line-height:30px;margin-left:15px;">
					<span style="float:left">店铺信誉：</span>
					<span>
						<script type="text/javascript">
							$(function(){ 
								var cur;
								$(".rating span").each(function(){ 
										//绑定事件
								        $(this).mouseover(function(){ 
									        	$(".rating").mouseout(function(){ 
										    $("#score").text(""); 
										    $(".rating span").each(function(){
									            $(this).css({'color':'black'});
									        });
										});
							        	cur = $(this).attr("rate");
							            $("#score").text(cur);
							            $("#my_rating").val(cur);
							            //设置前几个的星星为亮色
							            $(".rating span").each(function(){
							            	if($(this).attr("rate") <= cur)
							            		//alert($(this).attr("rate")+"<="+cur);
							            		$(this).css({'color':'#4889F0'});
							            });
							        }).click(function(){ 
							            //...ajax异步提交给后台处理
							            $(".rating span").each(function(){
							           		if($(this).attr("rate") <= cur)
							            		$(this).css({'color':'#4889F0'});
							            });
							            //alert("评分为"+cur);
							            $(".rating").unbind('mouseout');
							        }) 
								});
							});
						</script>
						<span class="rating" style="text-align:left;float:left;width:200px;">
         					 <span rate="1" class="icon-star"></span>
         					 <span rate="2" class="icon-star"></span>
         					 <span rate="3" class="icon-star"></span>
         					 <span rate="4" class="icon-star"></span>
         					 <span rate="5" class="icon-star"></span>
		        		</span>
					</span>
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