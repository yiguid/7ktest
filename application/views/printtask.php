<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
		<div id="managebox">
			<div class="content-header">
				<h4>印单详情</h4>
			</div>
			<?php foreach($printtaskinfo as $printtask):?>
			<div style="text-align:left;margin:20px;">
				印单号：<span style="color:red;font-size:20px;"><?php echo $printtask->id;?></span>
				<span style="margin-left:20px;"></span>
				状态：<span style="color:red;font-size:20px;"><?php echo $printtask->status;?></span>
			</div>
			<table class="manage_table printtask_table">
				<tr class="table_header">
					<td>打印店</td><td>文件数</td><td>创建时间</td><td>打印时间</td><td>总费用</td>
				</tr>
				  
				<tr>
					<?php echo "<td>".$printtask->printername ."</td><td>".$printtask->documentnum ."</td><td>".$printtask->createtime."</td><td>".$printtask->finishtime."</td><td>".$printtask->cost."</td>";?>
				</tr>  
				<tr class="table_header">
					<td>送货方式</td><td>送货地址</td><td>联系人</td><td>联系电话</td><td>送货时间</td>
				</tr>
				<tr>
					<?php if($printtask->method == 'self') $method = '自行取印'; elseif($printtask->method == 'express') $method = '快递送印'; elseif($printtask->method == 'campus') $method = '校园送印';?>
					<?php echo "<td>".$method ."</td><td>".$printtask->address ."</td><td>".$printtask->receiver ."</td><td>".$printtask->mobile ."</td><td>".$printtask->delivertime."</td>";?>
				</tr> 
					<?php endforeach;?>
			</table>
			<table class="manage_table">
				<tr class="table_header">
					<td>文件名</td><td>纸张</td><td>单/双面打印</td><td>页码范围</td><td>份数</td><td>装订</td><td>费用</td>
				</tr>
				<?php foreach($documents as $doc):?>  
				<tr>
					<?php echo "<td><a href=\"".base_url()."uploads/".$doc->url."\" >".substr($doc->name, 0,30) ."</a></td><td>".$doc->papersize."</td><td>".$doc->isdoubleside."</td><td>".$doc->range."</td><td>".$doc->fenshu."</td><td>".$doc->zhuangding."</td><td>".$doc->cost."</td>";?>
				</tr>  
				<?php endforeach;?>
			</table>
			<div style="text-align:left;margin:20px;">
				<div>发票信息：<?php echo $printtaskinfo[0]->receipt ;?></div>
				<div>备注信息：<?php echo $printtaskinfo[0]->remark ;?></div>
			</div>
			<?php if($printtaskinfo[0]->status == '打印完成') {?>
			<div class="rating_panel">
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
				<?php echo form_open('printtask/addRating',array('id' => 'rating_form')) ?>
				<input type="hidden" value=<?php echo $printtaskinfo[0]->id;?> name="printtaskid" id="printtaskid"/>
				<div>评分：<span class="rating">
         					 <span rate="1" class="icon-star"></span>
         					 <span rate="2" class="icon-star"></span>
         					 <span rate="3" class="icon-star"></span>
         					 <span rate="4" class="icon-star"></span>
         					 <span rate="5" class="icon-star"></span>
        				</span>
        				<p>你的评分：<span id="score" name="score" class="score"></span></p>
        				<input type="hidden" name="my_rating" id="my_rating" value=""/>
    			</div>
				<div>留言：</div>
				<div><textarea rows="3" style="width:600px;" id="msg" name="msg"></textarea></div>
				<input type="hidden" value="printtask" name="type" id="type"/>
				<div><input class="btn-metro" type="submit" name="submit" value="提 交"/></div>
				</form>
			</div>
			<?php }?>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>