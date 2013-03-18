<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('header');
?>
<div id="container">
	123
</div>
<div id="pageList">
<?php
$this->load->helper('url');
 $prevPage = max(1,$curPage-1);
 $nextPage = min($curPage+1,$maxPage);
 $startPage = max(1,$curPage - 3);
 $endPage = min($curPage + 3,$maxPage);
 if($curPage > 1)
 {
 	echo anchor("messageBoard/page/1/$maxPage", '<<');
 	echo anchor("messageBoard/page/$prevPage/$maxPage", '<');
 }
 for($i = $startPage;$i<$curPage;$i++)
 {
 	echo anchor("messageBoard/page/$i/$maxPage", "$i");
 }
 echo "$curPage";
 for($i = $curPage +1;$i<=$endPage;$i++)
 {
 	echo anchor("messageBoard/page/$i/$maxPage", "$i");
 }
 
 if($curPage < $maxPage)
 {
 	echo anchor("messageBoard/page/$nextPage/$maxPage", '>');
 	echo anchor("messageBoard/page/$maxPage/$maxPage", '>>');
 }
?>
</div>
<?php $this->load->view('footer'); ?>