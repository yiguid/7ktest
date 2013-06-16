<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('printer/header');
$this->load->view('printer/menu');
?>


<div id="managebox">
			<div class="content-header">
				<h4>基本信息</h4>
			</div>

			<div style="text-align:left;margin-left:20px;">
			<h5>必选业务设置</h5>
			<table id="propertytable" class="table table-condensed left750" style="margin-bottom:0px;">
					<tr>
						<td class="w40">序号</td>
						<td class="w100">业务名称</td>
						<td class="w100">可选项</td>
						<td class="w100">价格</td>
						<td class="w100">操作</td>
					</tr>
					<?php 
					foreach($papersize_option as $size){?>  
					<tr>
					<?php
					echo "<td>#</td>".
					"<td>纸张</td>".
					"<td><input value=".$size['name']." name=\"online\" id=\"online\"></input></td>".
					"<td><input value=".$size['price']." name=\"online\" id=\"online\"></input></td>".
				//	"<td>" . $size['name'] . "</td>".
				//	"<td>" . $size['price'] . "</td>".
                     "<td>" ."<a href=\"".base_url()."uploads/\" >删除</a> ". "</td>";
            }
			?>

			<?php 
					foreach($isdoubleside_option as $option){?>  
					<tr>
					<?php
					echo "<td>#</td>".
					"<td>单/双面</td>".
					"<td><input value=".$option['name']." name=\"online\" id=\"online\"></input></td>".
					"<td><input value=".$option['price']." name=\"online\" id=\"online\"></input></td>".
					//"<td>" . $option['name'] . "</td>".
					//"<td>" . $option['price'] . "</td>".
                     "<td>" ."<a href=\"".base_url()."uploads/\" >删除</a> ". "</td>";
            }
			?>

			<?php 
					foreach($zhuangding_option as $option){?>  
					<tr>
					<?php
					echo "<td>#</td>".
					"<td>装订</td>".
					"<td><input value=".$option['name']." name=\"online\" id=\"online\"></input></td>".
					"<td><input value=".$option['price']." name=\"online\" id=\"online\"></input></td>".
					//"<td>" . $option['name'] . "</td>".
					//"<td>" . $option['price'] . "</td>".
                     "<td>" ."<a href=\"".base_url()."uploads/\" >删除</a> ". "</td>";
            }
			?>
						<tr>
							<td></td>
							<td><input class="btn-metro" type="submit" name="submit" value="保存更改"/>
							</td>
							<td></td>
							<td></td>
						</tr>

				</table>
<!--
				<h5>可选业务设置</h5>
				<h6>已有可选业务</h6>
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
			-->
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
