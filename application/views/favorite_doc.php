				<div id="doc-list">
					<table class="table table-hover manage_table">
						<tr class="table_header">
							<td>ID</td><td>文件名</td><td>大小</td><td>描述</td><td>页数</td><td>打印币</td><td>操作</td>
						</tr>
						<?php foreach($docList as $doc):?>  
							<tr>
							<?php echo "<td>".$doc->docid ."</td><td>".substr($doc->docname, 0,30)."</td><td>"
							.$doc->size."</td><td>".$doc->description."</td><td>".$doc->page."</td><td>"
							.$doc->price."</td><td>";
							if($this->session->userdata('user_type') == 'user'){
								echo "<a href=\"javascript:addSpecDocToPrinttask('".base_url()
								."','".$doc->docid."','".$doc->pterid."','".$doc->ptername."')\" >印一份</a>";
							}else{
								echo "查看";
							}
							
							echo "</td>";?>
							</tr>
							<?php endforeach;?>
					</table>
				</div>
