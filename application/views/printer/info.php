<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('printer/header');
$this->load->view('printer/menu');
?>
		<div id="managebox">
			<div class="content-header">
				<h4>基本信息</h4>
			</div>
			<div class="manage_content">
				<form action="<?php echo base_url();?>printer/admin/updateinfo" method="post">
					<table>
						<tr>
							<td>在线状态：</td>
							<td><input value="<?php echo $printer_info[0]->online;?>" style="width:380px;" class="input-block-level" type="text" name="online" id="online"></input></td>
							<td><?php echo form_error('online')?></td>
						</tr>
						<tr>
							<td>打印店地址：</td>
							<td><input value="<?php echo  $printer_info[0]->address;?>" style="width:380px;" class="input-block-level" type="text" name="address" id="address"></input></td>
							<td><?php echo form_error('address')?></td>
						</tr>
						<tr>
							<td>联系方式：</td>
							<td><input value="<?php echo $printer_info[0]->contact;?>" style="width:380px;" class="input-block-level" type="text" name="contact" id="contact"></input></td>
							<td><?php echo form_error('contact')?></td>
						</tr>
						<tr>
							<td>营业开始时间：</td>
							<td><input value="<?php echo $printer_info[0]->servicestart;?>" style="width:380px;" class="input-block-level" type="text" name="servicestart" id="servicestart"></input></td>
							<td><?php echo form_error('servicestart')?></td>
						</tr>
						<tr>
							<td>营业结束时间：</td>
							<td><input value="<?php echo $printer_info[0]->serviceend;?>" style="width:380px;" class="input-block-level" type="text" name="serviceend" id="serviceend"></input></td>
							<td><?php echo form_error('serviceend')?></td>
						</tr>
						<tr>
							<td>打印店介绍：</td>
							<td><input value="<?php echo $printer_info[0]->intro;?>" style="width:380px;" class="input-block-level" type="text" name="intro" id="intro"></input></td>
							<td><?php echo form_error('intro')?></td>
						</tr>
						<tr>
							<td>通知公告：</td>
							<td><input value="<?php echo $printer_info[0]->notice;?>" style="width:380px;" class="input-block-level" type="text" name="notice" id="intro"></input></td>
							<td><?php echo form_error('notice')?></td>
						</tr>
						<tr>
							<td>业务介绍：</td>
							<td><input value="<?php echo $printer_info[0]->yewu;?>" style="width:380px;" class="input-block-level" type="text" name="yewu" id="yewu"></input></td>
							<td><?php echo form_error('yewu')?></td>
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