<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>
<div id="container" style="padding-left:100px;">
	<div id="profile">
		<div id="managebox">
			<div class="content-header">
				<h4>搜索  <span style="color:red"><?php echo $this->session->userdata('keywords')?></span>  的结果</h4>搜打印店    <a href =<?php echo base_url()."search/index_doc?keywords=".$this->session->userdata('keywords') ?>>搜文档</a>
			</div>
			<table class="table table-hover manage_table">
				<tr>
					<td>打印店名</td><td>位置</td><td>状态</td><td>服务时间(起)</td><td>服务时间(止)</td><td>等级</td><td>详细</td>
				</tr>
				<?php foreach($searchresultlist as $searchresult):?>  
  
					<tr>
					<?php echo "<td>".$searchresult->name ."</td><td>".$searchresult->location 
							."</td><td>".$searchresult->online 
							."</td><td>".$searchresult->servicestart."</td><td>".$searchresult->serviceend
							."</td><td>".$searchresult->level."</td>";?>
					<td><a href=<?php echo base_url()."printshop/name/"
							.$searchresult->username; ?>>选择该打印店</a></td>
					</tr>  
  
					<?php endforeach;?>  
			</table>
			<div class="pagination btn" id="pagelist">
				<ul>
				<?php
				 $path = base_url().'search/display';
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