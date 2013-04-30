<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
		<div id="managebox">
			<div class="content-header">
				<h4>历史文件</h4>
			</div>
			<table class="table table-hover manage_table">
				<tr>
					<td>ID</td><td>文件名</td><td>关键词</td><td>类型</td><td>大小</td><td>上传时间</td><td>操作</td>
				</tr>
				<?php foreach($documenthistorylist as $doc):?>  
					<tr>
					<?php echo "<td>".$doc->id ."</td><td>".substr($doc->name, 0,30)."</td><td>"
					.$doc->keyword."</td><td>".$doc->type."</td><td>".$doc->size."</td><td>"
					.$doc->uploadtime."</td><td><a href=\"javascript:addToPrinttask('".base_url()."','".$doc->id."','".$doc->name."','".$doc->url."')\" >添加到印单</a> | <a href=\"uploads/"
					.$doc->url."\" >另存为</a></td>";?>
					</tr>  
  
					<?php endforeach;?>
			</table>
			<div style="display:none;" id="add_printtask_panel">
				<?php echo form_open_multipart('documenthistory/addtoprinttask',array('id' => 'add_printtask_form'));?>
				<table class="table table-condensed left750" style="margin-bottom:0px;">
					<tr>
						<td>文档名</td>
						<td>纸张</td>
						<td>单/双面</td>
						<td>页码</td>
						<td>份数</td>
						<td>装订</td>
						<td>金额</td>
						<td></td>
					</tr>
					<tr>
						<td>
							<input type="hidden" id="documentid" name="documentid" value=""/>
							<input type="hidden" id="documentname" name="documentname" value=""/>
							<input class="btn btn-info" id="ufb" type="button" value=""/>
						</td>
						<td>
							<?php echo form_dropdown('papersize', $papersize_option, 'A4', "id=papersize class=w60");?>
						</td>
						<td>
							<?php echo form_dropdown('isdoubleside', $isdoubleside_option, '单面', "id=isdoubleside class=w70");?>
						</td>
						<td><input class="w60" type="text" maxlength="7" size="4" id="range" name="range"/></td>
						<td><input class="w60" type="text" maxlength="3" size="2" id="fenshu" name="fenshu"/></td>
						<td>
							<?php echo form_dropdown('zhuangding', $zhuangding_option, '普通', "id=zhuangding class=w70");?>
						</td>
						<td><input class="w40" type="text" maxlength="7" size="4" readonly onmouseover= "compute_money('<?php echo base_url();?>','')" onfocus="compute_money('<?php echo base_url();?>','')" id="cost" name="cost"/></td>
						<td><input class="btn btn-info" type="button" onclick="add_printtask()" onmouseover= "compute_money('<?php echo base_url();?>','')" value="添加" /></td>
					</tr>
				</table>
				</form>
			</div>
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