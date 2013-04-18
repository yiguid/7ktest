<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>

		<div id="managebox">
			<div class="content-header">
				<h4>收支明细</h4>
				<h3>账户余额：<?php echo $total;?></h3>
			</div>
			<table style="width:700px;" class="table table-hover">
				<tr>
					<td>时间</td><td>信息</td><td>金额</td><td>状态</td>
				</tr>
				<?php foreach($translist as $transaction):
					$printtask = "";
					if($transaction->printtaskid != NULL)
						$printtask = "[<a href=../printtask?id=".$transaction->printtaskid.">查看详情</a>]";
				?>  
					<tr>
					<?php echo "<td>".$transaction->time ."</td><td>".$transaction->info.$printtask."</td><td>".$transaction->amount."</td><td>".$transaction->status."</td>";?>
					</tr>  
					<?php endforeach;?>  
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>