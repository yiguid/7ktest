<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
	$this->load->view('header');
?>
<?php
	$shopName='北大图书馆一楼打印店';
	$docClass= array('所有类别','上大数学系历届试卷','上大数学系考研历届试卷','上大公共课历届试卷','上大数学系课程笔记');
	$curPath= base_url()."shop/";
?>

<div id='shop_container'>
	<div id="shop_main">
		<?php $this->load->view('shop/shop_banner_view');?>
		<div id="shop_body">
			<div id="shop_services">
				<ul id="listTab" class="navlist">
					<li><a href="<?php echo $curPath."doc/$pterid-0-1"?>" >特色资料</a></li>
					<li><a href="<?php echo $curPath."service/$pterid"?>" >特色业务</a></li>
					<li><a href="<?php echo $curPath."rate/$pterid"?>" >评    价</a></li>
					<li><a class="current" href="<?php echo $curPath."msg/$pterid-$curPage"?>">留    言</a></li>
					<li><a href="<?php echo $curPath."promotion/$pterid"?>">促    销</a></li>
	        	</ul>
	        	<div id="shop_msg">
					<div id="shop_msg_view">
						<?php
							$typearr=array('催单','网站错误','功能建议','投诉');
							foreach($msglist as $row)
							{
								echo "<div class='btn-info feedback_message'>";
								echo "<b>[".$typearr[$row->type - 1]."]</b>"."&nbsp;";
								echo "<i class='icon-comment icon-white'></i>".$row->content;
								echo '<br/>';
								echo "<i class='icon-user'></i>".$row->nickname."&nbsp;&nbsp;";
								echo $row->date." ";
								echo $row->time." ";
								echo "</div>";
								$rpylist = $this->feedback_mdl->get_msg_all_rpy($row->id);
								foreach($rpylist as $rpy)
								{
									echo "<div class='btn-warning feedback_reply'>";
									echo "<i class='icon-comment icon-white'></i>".$rpy->content."<br/>";
									echo "<i class='icon-user'></i>".$rpy->nickname."&nbsp;&nbsp;&nbsp;";
									echo $rpy->date." ";
									echo $rpy->time;	
									echo "</div>";
								}
							}
						?>
					</div>
					<div class="pagination btn" id="pagelist">
								<ul>
								<?php
								 $path = base_url().'feedback/display';
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
					<?php if($this->auth->logged_in()){	?>
						<div class="create">
							<form class="form-horizontal" action="<?php echo base_url()."shop/create/$pterid"?>" method="post">
							 <div class="control-group">
							    <span style="padding-top:6px;" class="help-inline">* 留言类型：</span>
							    <label class="radio inline">
							      <input class="inline" type="radio" name="msgtype" value="1" checked>
							      	催单
							    </label>
							    <label class="radio inline">
							      <input type="radio" name="msgtype" value="2">
							      	网站错误
							    </label>
							    <label class="radio inline">
							      <input type="radio" name="msgtype" value="3">
							      	功能建议
							    </label>
							    <label class="radio inline">
							      <input type="radio" name="msgtype" value="4">
									投诉
							    </label>
							</div>
							<div>
								 <?php if(isset($create_error)) echo "<lable>".$create_error."</lable>";?>
							     <textarea name="msgcontent" id="msgcontent" style="width:600px"></textarea>
							</div>
							<div style="padding:10px;">
							    <button class="btn btn-primary" type="submit" name="submit">发表留言</button>
							    <button class="btn btn-inverse" type="reset" name="reset">重写</button>
							</div>
							</form>
						</div>
					<?php }elseif(!$this->auth->printer_logged_in()){?>
						<div>
							 若您要留言？请您先<?php echo anchor(base_url().'login','登录');?>
						</div>
					<?php }?>
				</div>
			</div>
			<?php $this->load->view('shop/details_view'); ?>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>