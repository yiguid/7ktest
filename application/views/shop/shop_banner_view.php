		<div id="shop_image">
			<ul class="breadcrumb" style="float:left;background:transparent;">
				<?php foreach ($location as $key => $value) { ?>
					<li><a href="#"><?php echo $value ?></a> <span>/</span></li>
				<?php } ?>
				<li class="active"><?php echo $name ?></li>
			</ul>
		</div>
		<div id="shop_word">
			<marquee height="60" width="990"><span id="slogan"><?php echo $shopInfo->notice ?></span></marquee>
		</div>