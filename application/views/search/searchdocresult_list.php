			<table class="table table-hover manage_table">
				<tr>
					<td>文件名</td><td>打印店名称</td><td>类型</td><td>文件大小</td><td>操作</td>
				</tr>
				<?php foreach($searchresultlist as $searchresult):?>  
  
					<tr>
					<?php echo "<td>".$searchresult->name ."</td><td>"
							."<a href=".base_url().'shop/doc/'.$searchresult->uploadpterid.">".$searchresult->uploadptername."</a>" 
							."</td><td>".$searchresult->type 
							."</td><td>".$searchresult->size."</td><td>".
							"<a href=\"javascript:addSpecDocToPrinttask('".base_url()
								."','".$searchresult->id."','".$searchresult->uploadpterid."','".$searchresult->uploadptername."')\" >印一份</a>"
							."</td>";?>
					</tr>  
  
					<?php endforeach;?>  
			</table>
