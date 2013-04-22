<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
	$this->load->view('header');
?>
<?php
	$shopName='北大图书馆一楼打印店';
	$docClass= array('上大数学系历届试卷','上大数学系考研历届试卷','上大公共课历届试卷','上大数学系课程笔记');
?>
<style type="text/css">
#doc-class
{
	border-bottom: 1px solid gray;
	border-top: 1px solid gray;
	height: 40px;
	line-height: 40px;
}
#doc-class a{
	margin-left: 20px;
}
#doc-class a:hover{
	text-decoration: none;
}
</style>
<div id='shop_container'>
	<div id="shop_main">
		<div id="shop_image">
			（平台公告图片栏）
		</div>
		<div id="shop_word">
			<marquee height="60" width="990">宣传语</marquee>
		</div>

		<div id="shop_services">
			<ul id="myTab" class="nav nav-tabs">
				<li class="active"><a href="#home" data-toggle="tab">特色资料</a></li>
				<li><a href="#serviceTab" data-toggle="tab">特色业务</a></li>
				<li><a href="#feedbackTab" data-toggle="tab">评    价</a></li>
				<li><a href="#messageTab" data-toggle="tab">留    言</a></li>
				<li><a href="#saleTab" data-toggle="tab">促    销</a></li>
        	</ul>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade in active" id="home">
					<div id="doc-class">
						<marquee height="60" width="690">
							<?php foreach ($docClass as $key => $value) {
							?>
							<a href="<?php echo "$key"?>"><?php echo "$value"?></a>
							<?php
								}
							?>
							<a href="">更多内容</a>
						</marquee>
					</div>
					特色资料
				</div>
				<div class="tab-pane fade" id="serviceTab">
					特色业务
				</div>
				<div class="tab-pane fade" id="feedbackTab">
					评    价
				</div>
				<div class="tab-pane fade" id="messageTab">
					留    言
				</div>
				<div class="tab-pane fade" id="saleTab">
					促    销
				</div>
			</div>

		</div>
		<div id="shop_details">
			详细信息
		</div>
		<div style="clear:both;"></div>
	</div>
</div>
<?php $this->load->view('footer'); ?>