<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
<script type="text/javascript">
	function rateInit()
	{
		var rate_enable = true;
		var opts = {rate_enable : rate_enable,callback : rateAction};
		$("#task_rating").pageRating(opts);
	}
	function rateAction($rate)
	{
		alert
		$("#my_rating").val($rate);
		$("#score").text($rate+'分');

	}
	 $(document).ready(function(){
	 	var rating_flag = <?php echo $rating_flag;?>;
	 	if(rating_flag == 0)
	 	{
	 		rateInit();
	 	}
	 	
	});
</script>
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
			<table class="manage_table">
				<tr class="table_header">
					<td>文件名</td><td>描述</td><td>页数</td><td>份数</td><td>费用</td>
				</tr>
				<?php foreach($specialdocs as $specdoc):?>  
				<tr>
					<?php echo "<td>".substr($specdoc->name, 0,30) ."</td><td>".$specdoc->zhuangding."</td><td>".$specdoc->page."</td><td>".$specdoc->fenshu."</td><td>".$specdoc->cost."</td>";?>
				</tr>  
				<?php endforeach;?>
			</table>
			<div style="text-align:left;margin:20px;">
				<div>发票信息：<?php echo $printtaskinfo[0]->receipt ;?></div>
				<div>备注信息：<?php echo $printtaskinfo[0]->remark ;?></div>
			</div>
			<?php if($printtaskinfo[0]->status == '打印完成') {?>
				
				<div class="rating_panel">
					<?php if($rating_flag == 0) {?>
						<?php echo form_open('printtask/addRating',array('id' => 'rating_form')) ?>
						<input type="hidden" value=<?php echo $printtaskinfo[0]->id;?> name="printtaskid" id="printtaskid"/>
		        		<div>你的评分：</div>
		        			<div id="task_rating"></div>
		        			<div id="score" name="score" class="score"></div>
		        		<input type="hidden" name="my_rating" id="my_rating" value=""/>
						<div>留言：</div>
						<div><textarea rows="3" style="width:600px;" id="msg" name="msg"></textarea></div>
						<input type="hidden" value="printtask" name="type" id="type"/>
						<div><input class="btn-metro" type="submit" name="submit" value="提 交"/></div>
					</form>
					<?php }else{
						$rating= $this->printtask_mdl->get_rating($this->session->userdata('id'),$printtaskinfo[0]->id);	
					?>		
						<script type="text/javascript">
						 $(document).ready(function(){
						 	var score = <?php echo $rating->rating;?>;
							var opts = {rate_enable : false,score : score};
							$("#task_rating").pageRating(opts);
						 });
						</script>
		        		<div>你的评分：</div><div id="task_rating" ><span id="score" name="score" class="score"><?php echo $rating->rating;?>分</span></div>
		    			<div>留言：<?php echo $rating->msg;?></div>
					<?php }?>
				</div>
			<?php }?>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>