<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
  
			<li><?php echo $printer->id ." | ".$printer->name ." | ".$printer->location;?></li>  
  
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
				<table style="width:700px;">
					<tr>
						<td>序号</td>
						<td>文档名</td>
						<td>大小</td>
						<td>纸张</td>
						<td>单/双面</td>
						<td>页码</td>
						<td>份数</td>
						<td>装订</td>
						<td>金额</td>
					</tr>
					<tr>
						<td>1</td>
						<td>
							<?php if(isset($error)) echo $error;?>
							<?php echo form_open_multipart('upload/do_upload');?>
								<input type="file" name="userfile" size="20" />
								<input type="submit" value="上传" />
							</form>
						</td>
						<td>100k</td>
						<td><select id="papersize">
							<option>A4</option>
							<option>B5</option>
							</select></td>
						<td><select id="isdoubleside">
							<option>单面</option>
							<option>双面</option>
							</select></td>
						<td><input type="text" maxlength="7" size="4" id="range" name="range"/></td>
						<td><input type="text" maxlength="3" size="2" id="fenshu" name="fenshu"/></td>
						<td><select id="zhuangding">
							<option>普通</option>
							<option>精装</option>
							</select></td>
						<td>50元</td>
					</tr>
					<tr>
						<td>
							<?php if(isset($upload_data)) echo $upload_data['file_name'];?>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div id="print_setting">
			<div class="profile_title">
				<img height="20" width="20" src="<?php echo base_url();?>images/step3.gif"></img>
				取印设置与订单确认
			</div>
			<div class="setting_details">
				<div>
					<input type="radio" name="sendMethod" value="self" checked="checked"/>自行取印（免费）
				</div>
				<div>
					<input type="radio" name="sendMethod" value="campus"/>校园送印
				</div>
				<div>
					<input type="radio" name="sendMethod" value="express"/>快递送印
				</div>
				<div>
					接收地址<input type="text" name="address"/>
				</div>
				<div>
					接收电话<input type="text" name="mobile"/>
				</div>
				<div>
					送印时间<input type="text" name="delivertime"/>
				</div>
				<div>
					印单备注<input type="text" name="remark"/>
				</div>
				<div>
					需要发票<input type="text" name="receipt"/>
				</div>
				<div>
					费用总计:<span>100元</span><input type="button" value="确认印单" name="submitbtn"/>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>