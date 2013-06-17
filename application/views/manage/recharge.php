<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
		<div id="managebox">
			<div class="content-header">
				<h4>账户充值</h4>
			</div>
			<div class="content-password">
				<form action="<?php echo base_url();?>transaction/recharge" method="post">
					<table>
						<tr>
							<td>奇客网公测期临时充值平台<br>点击购买充值卡：
							</td>
							<td><a href="http://hamburgers.taobao.com">hamburgers.taobao.com</a></td>
							<td></td>
						</tr>
						<tr>
							<td>充值金额：</td>
							<td><input style="width:180px;" class="input-block-level" type="text" name="amount" id="amount"></input></td>
							<td><?php echo form_error('amount')?></td>
						</tr>
						<tr>
							<td>充值卡密码：</td>
							<td><input style="width:180px;" class="input-block-level" type="text" name="password" id="password"></input></td>
							<td><?php echo form_error('password')?></td>
						</tr>
						<tr>
							<td></td>
							<td><input class="btn-metro" type="submit" name="submit" value="确认充值"/>
							</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td><?php if(isset($trans_status)) echo $trans_status; ?></td>
							<td></td>
						</tr>
					</table>
				</form> 
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>