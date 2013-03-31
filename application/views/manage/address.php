<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
		<div id="managebox">
			<div class="content-header">
				<h4>我的地址</h4>
			</div>
			<div class="content-address">
				<form action="<?php echo base_url();?>login/address" method="post">
					<table>
						<tr>
							<td>联系电话：</td>
							<td><input style="width:380px;" class="input-block-level" type="text" name="mobile" id="mobile"></input></td>
							<td><?php echo form_error('mobile')?></td>
						</tr>
						<tr>
							<td>送货地址：</td>
							<td><input style="width:380px;" class="input-block-level" type="text" name="address" id="address"></input></td>
							<td><?php echo form_error('address')?></td>
						</tr>
						<tr>
							<td>发票信息：</td>
							<td><input style="width:380px;" class="input-block-level" type="text" name="receipt" id="receipt"></input></td>
							<td><?php echo form_error('receipt')?></td>
						</tr>
						<tr>
							<td></td>
							<td><input class="btn btn-primary" type="submit" name="submit" value="提交更改"/>
							</td>
							<td></td>
						</tr>
					</table>
				</form> 
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>