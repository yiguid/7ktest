	<table style="width: 700px;" class="table table-hover">
		<tr>
			<td>打印人</td>
			<td>文件数</td>
			<td>状态</td>
			<td>创建时间</td>
			<td>打印时间</td>
			<td>费用</td>
			<td>详细</td>
		</tr>
				<?php foreach($printhistorylist as $printhistory):?>  
  					<tr>
					<?php
					
					echo "<td>" . $printhistory->username . "</td>
                             <td>" . $printhistory->documentnum . "</td>
                             <td>" . $printhistory->status . "</td>
                             <td>" . $printhistory->createtime . "</td>
                             <td>" . $printhistory->finishtime . "</td>
                             <td>" . $printhistory->cost . "</td>";
					?>
					<td><a href="<?php echo base_url()."printer/printtask?id=".$printhistory->id; ?>">查看</a>	</td>
		</tr>  
  
					<?php endforeach;?>  
		</table>