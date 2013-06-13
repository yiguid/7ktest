			<table class="table table-hover manage_table">
				<tr>
					<td>打印店名</td><td>位置</td><td>状态</td><td>服务时间(起)</td><td>服务时间(止)</td><td>等级</td><td>详细</td>
				</tr>
				<?php foreach($searchresultlist as $searchresult):?>  
  
					<tr>
					<?php echo "<td>".$searchresult->name ."</td><td>".$searchresult->location 
							."</td><td>".$searchresult->online 
							."</td><td>".$searchresult->servicestart."</td><td>".$searchresult->serviceend
							."</td><td>".$searchresult->level."</td>";?>
					<td><a href=<?php echo base_url()."printshop/name/"
							.$searchresult->username; ?>>选择该打印店</a></td>
					</tr>  
  
					<?php endforeach;?>  
			</table>