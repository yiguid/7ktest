<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
	$this->load->view('header');
?>
<div id='shop_container'>
	<div id="shop_main">
		<div id="shop_image">
			（平台公告图片栏）
		</div>
		<div id="shop_word">
			宣传语
		</div>

		<div id="shop_services">
					服务介绍
			<ul id="myTab" class="nav nav-tabs">
				<li class="active"><a href="#home" data-toggle="tab">特色资料</a></li>
				<li><a href="#serviceTab" data-toggle="tab">特色业务</a></li>
				<li><a href="#feedbackTab" data-toggle="tab">评    价</a></li>
				<li><a href="#messageTab" data-toggle="tab">留    言</a></li>
				<li><a href="#saleTab" data-toggle="tab">促    销</a></li>
        	</ul>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade in active" id="home">
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
	</div>
</div>
<?php $this->load->view('footer'); ?>