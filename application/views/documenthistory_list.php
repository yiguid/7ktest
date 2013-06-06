			<table class="table table-hover manage_table">
				<tr class="table_header">
					<td>ID</td><td>文件名</td><td>关键词</td><td>类型</td><td>大小</td><td>上传时间</td><td>操作</td>
				</tr>
				<?php foreach($documenthistorylist as $doc):?>  
					<tr>
					<?php echo "<td>".$doc->id ."</td><td>".substr($doc->name, 0,30)."</td><td>"
					.$doc->keyword."</td><td>".$doc->type."</td><td>".$doc->size."</td><td>"
					.$doc->uploadtime."</td><td><a href=\"javascript:addToPrinttask('".base_url()."','".$doc->id."','".$doc->name."','".$doc->url."')\" >添加到印单</a> | <a href=\"uploads/"
					.$doc->url."\" >另存为</a></td>";?>
					</tr>  
  
					<?php endforeach;?>
			</table>