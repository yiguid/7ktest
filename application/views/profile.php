﻿<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>
<div id="container">
	<div id="profile">
		<div id="printer_list">
			<div class="profile_title">
				<img height="20" width="20" src="<?php echo base_url();?>images/step1.gif"></img>
				选择打印店
			</div>
			<?php foreach($printerlist as $printer):?>  
  
			<li><input type="radio" name="printer_address" value=<?php echo $printer->id;?> 
				<?php if($this->session->userdata('printer_id') == $printer->id)
					echo 'checked';
				?> 
				onclick="javascript:setPrinterId('<?php echo base_url();?>')"/><?php echo $printer->id ." | ".$printer->name ." | ".$printer->location;?></li>  
  
			<?php endforeach;?>  
		</div>
		<div id="file_manage">
			<div class="profile_title">
				<img height="20" width="20" src="<?php echo base_url();?>images/step2.gif"></img>
				选择文件并上传
			</div>
			<div id="file_setting">
				<img height="20" width="20" align="absmiddle" src="<?php echo base_url();?>images/add_doc.gif"></img>
				<a href="javascript:addDocuments()">添加文档</a>
			</div>
			<div>
				<?php if(isset($error)) echo $error;?>
				<?php echo form_open_multipart('upload/do_upload');?>
				<table style="width:700px;">
					<tr>
						<td>文档名</td>
						<td>纸张</td>
						<td>单/双面</td>
						<td>页码</td>
						<td>份数</td>
						<td>装订</td>
						<td>金额</td>
					</tr>
					<tr>
						<td>
							<input type="file" name="userfile" size="20" />
						</td>
						<td><select name="papersize" id="papersize">
							<option>A4</option>
							<option>B5</option>
							</select></td>
						<td><select name="isdoubleside" id="isdoubleside">
							<option>单面</option>
							<option>双面</option>
							</select></td>
						<td><input type="text" maxlength="7" size="4" id="range" name="range"/></td>
						<td><input type="text" maxlength="3" size="2" id="fenshu" name="fenshu"/></td>
						<td><select name="zhuangding" id="zhuangding">
							<option>普通</option>
							<option>精装</option>
							</select></td>
						<td><input type="text" maxlength="7" size="4" readonly onmouseover= "compute_money('<?php echo base_url();?>')" onfocus="compute_money('<?php echo base_url();?>')" id="cost" name="cost"/><input type="submit" onmouseover= "compute_money('<?php echo base_url();?>')" value="上传" /></td>
					</tr>
				</table>
				</form>
				<div>
					刚才上传成功的文件：<?php if(isset($upload_data)) echo $upload_data['file_name'];?>
					已经上传的文件：
					<?php 
						foreach ($this->cart->contents() as $items){
							echo $items['name'];
						}
					?>
				</div>
			</div>
		</div>
		<div id="print_setting">
			<div class="profile_title">
				<img height="20" width="20" src="<?php echo base_url();?>images/step3.gif"></img>
				取印设置与订单确认
			</div>
			<div class="setting_details">
			<?php echo form_open('printtask/submit') ?>
				<input type="hidden" name="printerid" id="printerid" value="1">
				<div>
					<input type="radio" name="method" value="self" checked="checked"/>自行取印（免费）
				</div>
				<div>
					<input type="radio" name="method" value="campus"/>校园送印
				</div>
				<div>
					<input type="radio" name="method" value="express"/>快递送印
				</div>
				<div>
					接收地址:<input type="text" name="address"/>
				</div>
				<div>
					接收电话:<input type="text" name="mobile"/>
				</div>
				<div>
					送印时间:<input type="text" name="delivertime"/>
				</div>
				<div>
					印单备注:<input type="text" name="remark"/>
				</div>
				<div>
					需要发票:<input type="text" name="receipt"/>
				</div>
				<div>
					费用总计:<span><input type="text" maxlength="7" size="4" id="cost" name="cost" value="<?php echo $this->cart->total();?>" readonly/></span><input type="submit" value="确认印单" name="submitbtn"/>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>