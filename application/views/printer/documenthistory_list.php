	<table style="width: 780px;" class="table table-hover">
			<tr>
				<td>ID</td>
				<td>文件名</td>
				<td>文件类型</td>
				<td>关键词</td>
				<td>上传用户</td>
				<td>文件大小</td>
				<td>下载地址</td>
				<td>上传时间</td>
			</tr>
			<?php 
			foreach($documenthistorylist as $doc){?>  
				<tr>
			<?php
			echo "<td>" . $doc->docid . "</td>".
					"<td>" . substr($doc->docname, 0,30) . "</td>".
					"<td>" . $doc->doctype . "</td>".
                     "<td>" . $doc->keyword . "</td>".
                     "<td>" . $doc->username . "</td>".
                     "<td>" . $doc->size . "</td>".
                     "<td>" ."<a href=\"uploads/".$doc->url."\" >另存为</a> ". "</td>".
                     "<td>" . $doc->uploadtime . "</td>";
            }
			?>
		</tr> 
		</table>