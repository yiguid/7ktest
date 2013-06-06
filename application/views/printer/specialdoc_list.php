		<table style="width: 780px;" class="table table-hover">
			<tr>
				<td>ID</td>
				<td>文件名</td>
				<td>文件类型</td>
				<td>关键词</td>
				<td>页数</td>
				<td>价格</td>
				<td>下载地址</td>
				<td>上传时间</td>
			</tr>
			<?php 
			foreach($specialdoclist as $doc){?>  
			<tr>
			<?php
			echo "<td>" . $doc->id . "</td>".
					"<td>" . substr($doc->name, 0,30) . "</td>".
					"<td>" . $doc->type . "</td>".
                     "<td>" . $doc->keyword . "</td>".
                     "<td>" . $doc->page . "</td>".
                     "<td>" . $doc->price . "</td>".
                     "<td>" ."<a href=\"".base_url()."uploads/".$doc->url."\" >另存为</a> ". "</td>".
                     "<td>" . $doc->uploadtime . "</td>";
            }
			?>
		</tr> 
		</table>
