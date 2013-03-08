<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('printer/header');
$this->load->view('printer/menu');
?>
		<div id="managebox">
			印单详情
			<table style="width:700px;">
				<tr>
					<td>打印人</td><td>文件数</td><td>状态</td><td>创建时间</td><td>打印时间</td><td>费用</td>
				</tr>
				<?php foreach($printtaskinfo as $printtask):?>  
				<tr>
					<?php echo "<td>".$printtask->username ."</td><td>".$printtask->documentnum ."</td><td>".$printtask->status."</td><td>".$printtask->createtime."</td><td>".$printtask->finishtime."</td><td>".$printtask->cost."</td>";?>
				</tr>  
				<tr>
					<td>送货地址</td><td>联系电话</td><td>送货时间</td><td>备注</td><td>发票信息</td><td>其他</td>
				</tr>
				<tr>
					<?php echo "<td>".$printtask->address ."</td><td>".$printtask->mobile ."</td><td>".$printtask->delivertime."</td><td>".$printtask->remark."</td><td>".$printtask->receipt."</td><td>暂无</td>";?>
				</tr> 
					<?php endforeach;?>  
			</table>
			<table style="width:700px;">
				<tr>
					<td>文件名</td><td>纸张</td><td>单/双面打印</td><td>页码范围</td><td>份数</td><td>装订</td><td>费用</td>
				</tr>
				<?php foreach($documents as $doc):?>  
				<tr>
					<?php $paper = $doc->isdoubleside?'单面':'双面'; echo "<td><a href=\"uploads/".$doc->url."\" >".$doc->name ."</a></td><td>".$doc->papersize ."</td><td>".$paper."</td><td>".$doc->range."</td><td>".$doc->fenshu."</td><td>".$doc->zhuangding."</td><td>".$doc->cost."</td>";?>
				</tr>  
				<?php endforeach;?>
			</table>
			<?php if($printtask->status == '打印中') {?>
				<a href="javascript:printDocument('<?php echo base_url();?>','<?php echo $printtask->id;?>')">打印</a>
			<?php }else if($printtask->status == '打印完成') {?>
				<a href="javascript:deliver('<?php echo base_url();?>','<?php echo $printtask->id;?>')">发货</a>
			<?php }?>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>