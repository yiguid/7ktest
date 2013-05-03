<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('printer/header');
$this->load->view('printer/menu');
?>
		<div id="managebox">
			<div class="content-header">
				<h4>打印店中心</h4>
			</div>
			<div>
				<span class="span2">在线状态：在线</span>
				<span class="span4">
				<select>
				  <option value ="online">在线</option>
				  <option value ="left">离开</option>
				  <option value="offline">离线</option>
				</select>
				</span>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>