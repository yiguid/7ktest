<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('printer/header');
$this->load->view('printer/menu');
?>
		<div id="managebox">
			<div class="content-header">
				<h4>业务管理</h4>
				<h5>账户余额：<?php echo $total;?></h5>
			</div>
			<table style="width:700px;" class="table table-hover">
				<tr>
					<td>时间</td><td>信息</td><td>金额</td><td>状态</td>
				</tr>
				<?php foreach($translist as $transaction):
					$printtask = "";
					if($transaction->printtaskid != NULL)
						$printtask = "[<a href=".base_url()."printer/printtask?id=".$transaction->printtaskid.">查看详情</a>]";
				?>  
					<tr>
					<?php echo "<td>".$transaction->time ."</td><td>".$transaction->info.$printtask."</td><td>".($transaction->amount*-1)."</td><td>".$transaction->status."</td>";?>
					</tr>  
					<?php endforeach;?>  
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>
