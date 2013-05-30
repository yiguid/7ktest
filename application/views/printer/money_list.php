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