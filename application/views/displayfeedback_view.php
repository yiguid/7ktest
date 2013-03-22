	<div class="view">
	<?php
		$this->load->model('feedback_mdl');
		foreach($msglist as $row)
		{

			echo "<div>";
			echo $row->content;
			echo $row->date;
			echo $row->time;
			echo $row->nickname;
			echo "</div>";
			$rpylist = $this->feedback_mdl->get_msg_all_rpy($row->id);
			foreach($rpylist as $rpy)
			{
				echo "<div>";
				echo $row->content;
				echo $row->date;
				echo $row->time;
				echo $row->nickname;
				echo "</div>";
			}
		}
	?>
	</div>
	<div class="pagination" id="pagelist">
	<ul>
	<?php
	 $path = 'feedback/display';
	 $this->load->helper('url');
	 $prevPage = max(1,$curPage-1);
	 $nextPage = min($curPage+1,$maxPage);
	 $startPage = max(1,$curPage - 3);
	 $endPage = min($curPage + 3,$maxPage);
	 if($curPage > 1)
	 {
	 	echo '<li>';
	 	echo anchor("$path/1/$maxPage", '<<');
	 	echo '</li>';
	 	echo '<li>';
	 	echo anchor("$path/$prevPage/$maxPage", '<');
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
	 	echo anchor("$path/$i/$maxPage", "$i");
	 	echo '</li>';
	 }
	 
	 if($curPage < $maxPage)
	 {
	 	echo '<li>';
	 	echo anchor("$path/$nextPage/$maxPage", '>');
	 	echo '</li>';
	 	echo '<li>';
	 	echo anchor("$path/$maxPage/$maxPage", '>>');
	 	echo '</li>';
	 }
	?>
	</ul>
	</div>
