<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
$this->load->view ( 'printer/header' );
$this->load->view ( 'printer/menu' );
$this->load->helper('url');
?>
<div id="managebox">
	<div class="content-header">
		<h4>特色资料</h4>
	</div>
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
		<div style="text-align:left;">
			<h5>上传特色资料</h5>
		<?php echo form_open_multipart('printer/specialdoc/do_upload',array('id' => 'upload_form'));?>
			<div>资料名称：<input type="text" name="name"/>标签：<input type="text" name="keyword"/></div>
			<div>资料类型：<input type="text" name="type"/>页数：<input type="text" name="page"/></div>
			<div>资料定价：<input type="text" name="price"/></div>
			<div>资料描述：<textarea name="description" rows="3" style="width:470px;"></textarea></div>
			<div><input style="display:none;" type="file" name="userfile" size="20" onchange="document.getElementById('ufb').value=this.value"/>
				 <input class="btn btn-info" id="ufb" type="button" onclick=userfile.click() value="点击选择文件"/>
				 <input class="btn btn-info" type="submit" value="上传" /></div>
		</form>
		</div>
</div>
</div>
</div>

<?php $this->load->view('footer'); ?>