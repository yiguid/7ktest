<html>
<head>
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'http:\/\/www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
  <html xmlns="http:\/\/www.w3.org/1999/xhtml">
<style type="text/css">
<!--
a:link { text-decoration: none;color: blue}
a:active { text-decoration:blink}
a:hover { text-decoration:underline;color: red}
a:visited { text-decoration: none;color: green}
-гн>
</style>
</head>
<body>
<?php
/*
 * Created on 2013-3-18
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
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
</body>
</html>
