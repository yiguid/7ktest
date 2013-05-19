<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
		<div id="managebox">
			<div class="content-header">
				<h4>修改密码</h4>
			</div>
			<div class="content-password">
				<form action="<?php echo base_url();?>login/password" method="post">
					<table>
						<tr>
							<td>原密码：</td>
							<td><input style="width:180px;" class="input-block-level" type="password" name="old_password" id="old_password"></input></td>
							<td><?php echo form_error('old_password')?></td>
						</tr>
						<tr>
							<td>新密码：</td>
							<td><input style="width:180px;" class="input-block-level" type="password" name="new_password" id="new_password"></input></td>
							<td><?php echo form_error('new_password')?></td>
						</tr>
						<tr>
							<td>重复新密码：</td>
							<td><input style="width:180px;" class="input-block-level" type="password" name="re_new_password" id="re_new_password"></input></td>
							<td><?php echo form_error('re_new_password')?></td>
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