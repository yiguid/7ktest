<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
		<div id="managebox">
			<div class="content-header">
				<h4>历史文件</h4>
			</div>
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
			<div class="pagination btn" id="pagelist">
				<ul>
				<?php
				 $path = base_url().'documenthistory/display';
				 $prevPage = max(1,$curPage-1);
				 $nextPage = min($curPage+1,$maxPage);
				 $startPage = max(1,$curPage - 3);
				 $endPage = min($curPage + 3,$maxPage);
				 if($curPage > 1)
				 {
				 	echo '<li>';
				 	echo anchor("$path/1", '<<');
				 	echo '</li>';
				 	echo '<li>';
				 	echo anchor("$path/$prevPage", '<');
				 	echo '</li>';
				 }
				 for($i = $startPage;$i<=$endPage;$i++)
				 {
				 	if($i==$curPage)
				 	{
				 		echo '<li class="disabled">';
				 	}
				 	else
				 	{
				 		echo '<li class="active">';
				 	}
				 	echo anchor("$path/$i", "$i");
				 	echo '</li>';
				 }
				 
				 if($curPage < $maxPage)
				 {
				 	echo '<li>';
				 	echo anchor("$path/$nextPage", '>');
				 	echo '</li>';
				 	echo '<li>';
				 	echo anchor("$path/$maxPage", '>>');
				 	echo '</li>';
				 }
				?>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>