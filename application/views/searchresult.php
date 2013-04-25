<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
//测试github同步
		<div id="managebox">
			<div class="content-header">
				<h4>搜索结果</h4>
			</div>
			<table style="width:700px;" class="table table-hover">
				<tr>
					<td>打印店</td><td>文件数</td><td>状态</td><td>创建时间</td><td>打印时间</td><td>费用</td><td>详细</td>
				</tr>
				<?php foreach($printhistorylist as $printhistory):?>  
  
					<tr>
					<?php echo "<td>".$printhistory->printername ."</td><td>".$printhistory->documentnum ."</td><td>".$printhistory->status."</td><td>".$printhistory->createtime."</td><td>".$printhistory->finishtime."</td><td>".$printhistory->cost."</td>";?>
					<td><a href=<?php echo base_url()."printtask?id=".$printhistory->id; ?>>查看</a></td>
					</tr>  
  
					<?php endforeach;?>  
			</table>
			<div class="pagination btn" id="pagelist">
				<ul>
				<?php
				 $path = base_url().'printhistory/display';
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