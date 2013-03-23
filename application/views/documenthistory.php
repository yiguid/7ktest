<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
		<div id="managebox">
			历史文件
			<table style="width:700px;" class="table table-hover">
				<tr>
					<td>ID</td><td>文件名</td><td>关键词</td><td>类型</td><td>大小</td><td>上传时间</td><td>下载地址</td>
				</tr>
				<?php foreach($documenthistorylist as $doc):?>  
					<tr>
					<?php echo "<td>".$doc->id ."</td><td>".substr($doc->name, 0,30)."</td><td>".$doc->keyword."</td><td>".$doc->type."</td><td>".$doc->size."</td><td>".$doc->uploadtime."</td><td><a href=\"uploads/".$doc->url."\" >另存为</a></td>";?>
					</tr>  
  
					<?php endforeach;?>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>