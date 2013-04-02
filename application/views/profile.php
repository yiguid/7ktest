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
			<div style="text-align:right;"><i class='icon-map-marker'></i><?php echo anchor('place','切换地址'); ?></div>
			<?php foreach($printerlist as $printer):?>  
  
			<li><label><input class="radio inline" type="radio" name="printer_address" value=<?php echo $printer->id;?> 
				<?php if($this->session->userdata('printer_id') == $printer->id)
					echo 'checked';
				?> 
				onclick="javascript:setPrinterId('<?php echo base_url();?>')"/><?php echo $printer->id ." | ".$printer->name ." | ".$printer->location;?>
			</label></li>  
  
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
				<?php echo form_open_multipart('upload/do_upload',array('id' => 'upload_form'));?>
				<table class="table" style="width:700px;">
					<tr>
						<td>文档名</td>
						<td>纸张</td>
						<td>单/双面</td>
						<td>页码</td>
						<td>份数</td>
						<td>装订</td>
						<td>金额</td>
						<td></td>
					</tr>
					<tr>
						<td>
							<input style="display:none;" type="file" name="userfile" size="20" onchange="document.getElementById('uploadfilename').value=this.value"/>
							<input class="btn btn-info" type="button" onclick=userfile.click() value="点击上传文件"/>
						</td>
						<td>
							<?php echo form_dropdown('papersize', $papersize_option, 'A4', "id=papersize class=w60");?>
						</td>
						<td>
							<?php echo form_dropdown('isdoubleside', $isdoubleside_option, '单面', "id=isdoubleside class=w70");?>
						</td>
						<td><input class="w60" type="text" maxlength="7" size="4" id="range" name="range"/></td>
						<td><input class="w60" type="text" maxlength="3" size="2" id="fenshu" name="fenshu"/></td>
						<td>
							<?php echo form_dropdown('zhuangding', $zhuangding_option, '普通', "id=zhuangding class=w70");?>
						</td>
						<td><input class="w40" type="text" maxlength="7" size="4" readonly onmouseover= "compute_money('<?php echo base_url();?>')" onfocus="compute_money('<?php echo base_url();?>')" id="cost" name="cost"/></td>
						<td><input class="btn btn-info" type="button" onclick="submit_upload()" onmouseover= "compute_money('<?php echo base_url();?>')" value="上传" /></td>
					</tr>
				</table>
				</form>
				<div>
					<div style="text-align:left; width:700px;">待上传的文件：<input class="w300" type="text" readonly id="uploadfilename"/></div>
					<div style="text-align:left; width:700px;">刚才上传成功的文件：<?php if(isset($upload_data)) echo $upload_data['file_name'];?></div>
					<div style="text-align:left; width:700px;">
					已经上传的文件：
					<?php 
						foreach ($this->cart->contents() as $items){
							echo $items['name']." | ";
						}
					?>
					</div>
				</div>
			</div>
		</div>
		<div id="print_setting">
			<div class="profile_title">
				<img height="20" width="20" src="<?php echo base_url();?>images/step3.gif"></img>
				取印设置与订单确认
			</div>
			<div class="setting_details">
			<?php echo form_open('printtask/submit',array('id' => 'printtask_form')) ?>
				<input type="hidden" name="printerid" id="printerid" value="<?php echo $this->session->userdata('printer_id');?>">
				<div class="span9">
					<div class="span1">接收电话:</div><div class="span3"><input class="span3" type="text" id="mobile" name="mobile"/></div>
					<div class="span1">送印时间:</div>
					<div class="span3">
						<div class="input-append date form_datetime">
						    <input size="16" type="text"  id="delivertime" name="delivertime" value="" readonly>
						    <span class="add-on"><i class="icon-th"></i></span>
						</div>
						<script type="text/javascript">
						    $(".form_datetime").datetimepicker({
						        format: "yyyy-mm-dd hh:ii:ss",
						        weekStart: 1,
						        todayBtn:  1,
								autoclose: 1,
								todayHighlight: 1,
								startView: 2,
								forceParse: 0,
								language: 'zh-CN'
						    });
						</script>  
					</div>
				</div>
				<div class="span9">
					<div class="span1">印单备注:</div><div class="span3"><input class="span3" type="text" name="remark"/></div>
					<div class="span1">需要发票:</div><div class="span3"><input class="span3" type="text" name="receipt"/></div>
				</div>
				<div class="span9" style="height:40px;">
					<label class="radio inline"><input class="margin30 radio inline" type="radio" name="method" value="self" checked="checked"/>自行取印（免费）</label>
					<label class="radio inline"><input class="margin30 radio inline" type="radio" name="method" value="campus"/>校园送印</label>
					<label class="radio inline"><input class="margin30 radio inline" type="radio" name="method" value="express"/>快递送印</label>
				</div>
				<div class="span9">
					<div class="span1">接收地址:</div><div class="span7"><input class="span7" type="text" id="address" name="address"/></div>
				</div>
				<div class="span9">
					<div class="span1">费用总计:</div><span class="span3"><input type="text" maxlength="7" size="4" id="total_cost" name="total_cost" value="<?php echo $this->cart->total();?>" readonly/></span>
					<span><input class="btn btn-primary offset1" type="button" onclick="submit_printtask()" value="确认印单" name="submitbtn"/></span>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>