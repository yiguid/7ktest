<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('printer/header');
$this->load->view('printer/menu');
?>


<div id="managebox">
			<div class="content-header">
				<h4>基本信息</h4>
			</div>
			<div class="manage_content">
				<form action="<?php echo base_url();?>printer/admin/addproperty" method="post">
					<table>
						<tr>
							<td>新增业务名：</td>
							<td><input value="" style="width:380px;" class="input-block-level" type="text" name="propertyname" id="propertyname"></input></td>
							<td><?php echo form_error('propertyname')?></td>
						</tr>
						<tr>
							<td></td>
							<td><input class="btn-metro" type="submit" name="submit" value="提交更改"/>
							</td>
							<td></td>
						</tr>
					</table>
				</form> 



				<form action="<?php echo base_url();?>printer/admin/addpropertyvalue" method="post">
					<table>
						<tr>
							<td>新增业务id：</td>
							<td><input value="" style="width:380px;" class="input-block-level" type="text" name="propertyid" id="propertyid"></input></td>
							<td><?php echo form_error('propertyid')?></td>
						</tr>
						<tr>
							<td>新增业务值：</td>
							<td><input value="" style="width:380px;" class="input-block-level" type="text" name="value" id="value"></input></td>
							<td><?php echo form_error('value')?></td>
						</tr>
						<tr>
							<td>新增业务价格：</td>
							<td><input value="" style="width:380px;" class="input-block-level" type="text" name="price" id="price"></input></td>
							<td><?php echo form_error('price')?></td>
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




<!--
		<div id="managebox">
			<div class="content-header">
				<h4>业务管理</h4>
			</div>
			<div>
				待添加
			</div>
		</div>
	</div>
</div>
-->

<?php $this->load->view('footer'); ?>
