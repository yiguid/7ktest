				<div id="shop-list">
					<table class="table table-hover manage_table">
						<tr class="table_header">
							<td>打印店名称</td><td>地址</td><td>联系方式</td>
						</tr>
						<?php foreach($shopList as $shop):?>  
							<tr>
							<?php echo "<td>".$shop->name ."</td><td>".$shop->address."</td><td>".$shop->contact."</td>";?>
							</tr>
							<?php endforeach;?>
					</table>
				</div>