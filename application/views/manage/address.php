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
							<td>收货人名：</td>
							<td><input value="<?php echo $this->session->userdata('user_receiver');?>" style="width:380px;" class="input-block-level" type="text" name="receiver" id="receiver"></input></td>
							<td><?php echo form_error('receiver')?></td>
						</tr>
						<tr>
							<td>联系电话：</td>
							<td><input value="<?php echo $this->session->userdata('user_mobile');?>" style="width:380px;" class="input-block-level" type="text" name="mobile" id="mobile"></input></td>
							<td><?php echo form_error('mobile')?></td>
						</tr>
						<tr>
							<td>邮政编码：</td>
							<td><input value="<?php echo $this->session->userdata('user_zipcode');?>" style="width:380px;" class="input-block-level" type="text" name="zipcode" id="zipcode"></input></td>
							<td><?php echo form_error('zipcode')?></td>
						</tr>
						<tr>
							<td>所在省份：</td>
							<td><input value="<?php echo $this->session->userdata('user_province');?>" style="width:380px;" class="input-block-level" type="text" name="province" id="province"></input></td>
							<td><?php echo form_error('province')?></td>
						</tr>
						<tr>
							<td>所在城市：</td>
							<td><input value="<?php echo $this->session->userdata('user_city');?>" style="width:380px;" class="input-block-level" type="text" name="city" id="city"></input></td>
							<td><?php echo form_error('city')?></td>
						</tr>
						<tr>
							<td>详细地址：</td>
							<td><input value="<?php echo $this->session->userdata('user_address');?>" style="width:380px;" class="input-block-level" type="text" name="address" id="address"></input></td>
							<td><?php echo form_error('address')?></td>
						</tr>
						<tr>
							<td>发票信息：</td>
							<td><input value="<?php echo $this->session->userdata('user_receipt');?>" style="width:380px;" class="input-block-level" type="text" name="receipt" id="receipt"></input></td>
							<td><?php echo form_error('receipt')?></td>
						</tr>
						<tr>
							<td></td>
							<td><input class="btn-metro" type="submit" name="submit" value="提交更改"/>
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