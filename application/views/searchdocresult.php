<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>
<div id="container" style="padding-left:100px;">
	<div id="profile">
		<div id="managebox">
			<div class="content-header">
				<h4>搜索  <span style="color:red"><?php echo $this->session->userdata('keywords')?></span>  的结果</h4>  
				<a href =<?php echo base_url()."search/index?keywords=".$keywords ?>>搜打印店</a>    搜文档
			</div>
			<table class="table table-hover manage_table">
				<tr>
					<td>文件名</td><td>关键词</td><td>类型</td><td>文件大小</td><td>下载</td>
				</tr>
				<?php foreach($searchresultlist as $searchresult):?>  
  
					<tr>
					<?php echo "<td>".$searchresult->name ."</td><td>".$searchresult->keyword 
							."</td><td>".$searchresult->type 
							."</td><td>".$searchresult->size."</td><td>".$searchresult->url
							."</td>";?>
					</tr>  
  
					<?php endforeach;?>  
			</table>
			<div class="pagination btn" id="pagelist">
				<ul>
				<?php
				 $path = base_url().'search/display_doc';
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