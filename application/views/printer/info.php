<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('printer/header');
$this->load->view('printer/menu');
?>
		<div id="managebox">
			<div class="content-header">
				<h4>基本信息</h4>
			</div>
			<div class="manage_content">
				<form action="<?php echo base_url();?>printer/admin/info" method="post">
					<table>
						<tr>
							<td>在线状态：</td>
							<td><input value="<?php echo $this->session->userdata('user_receiver');?>" style="width:380px;" class="input-block-level" type="text" name="receiver" id="receiver"></input></td>
							<td><?php echo form_error('receiver')?></td>
						</tr>
						<tr>
							<td>打印店地址：</td>
							<td><input value="<?php echo $this->session->userdata('user_address');?>" style="width:380px;" class="input-block-level" type="text" name="address" id="address"></input></td>
							<td><?php echo form_error('address')?></td>
						</tr>
						<tr>
							<td>联系方式：</td>
							<td><input value="<?php echo $this->session->userdata('user_address');?>" style="width:380px;" class="input-block-level" type="text" name="address" id="address"></input></td>
							<td><?php echo form_error('address')?></td>
						</tr>
						<tr>
							<td>营业开始时间：</td>
							<td><input value="<?php echo $this->session->userdata('user_mobile');?>" style="width:380px;" class="input-block-level" type="text" name="mobile" id="mobile"></input></td>
							<td><?php echo form_error('mobile')?></td>
						</tr>
						<tr>
							<td>营业结束时间：</td>
							<td><input value="<?php echo $this->session->userdata('user_zipcode');?>" style="width:380px;" class="input-block-level" type="text" name="zipcode" id="zipcode"></input></td>
							<td><?php echo form_error('zipcode')?></td>
						</tr>
						<tr>
							<td>打印店介绍：</td>
							<td><input value="<?php echo $this->session->userdata('user_province');?>" style="width:380px;" class="input-block-level" type="text" name="province" id="province"></input></td>
							<td><?php echo form_error('province')?></td>
						</tr>
						<tr>
							<td>通知公告：</td>
							<td><input value="<?php echo $this->session->userdata('user_city');?>" style="width:380px;" class="input-block-level" type="text" name="city" id="city"></input></td>
							<td><?php echo form_error('city')?></td>
						</tr>
						<tr>
							<td>业务介绍：</td>
							<td><input value="<?php echo $this->session->userdata('user_address');?>" style="width:380px;" class="input-block-level" type="text" name="address" id="address"></input></td>
							<td><?php echo form_error('address')?></td>
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