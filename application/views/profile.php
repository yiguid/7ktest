<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>
<div id="container">
	<div id="profile">
		<div id="printer_list">
			<div class="profile_title">
				第一步：
				选择打印店
			</div>
			<div style="text-align:right;">您现在所在打印店：  <i class='icon-map-marker'></i><?php echo anchor('place','切换地址'); ?></div>
				<div id="current" style="padding-left:4px;text-align:left;font-weight:bold;"><?php echo $this->session->userdata('printer_name')?></div>
			<div class="bk10"></div>
			<div class="divider"></div>
			<div>
				<div class="title_background">打印店排序与筛选
					<span style="padding-left:40px;"><a id="a_sort" href="javascript:show_sort()">展开</a></span>
				</div>
				<div id="sort_para" style="display:none; text-align:justify;padding-left:4px;">
				<a href="javascript:orderPrinter('<?php echo base_url();?>','distance')"><i class="icon-flag"></i>距离</a>
				<a href="javascript:orderPrinter('<?php echo base_url();?>','price')"><i class="icon-tag"></i>价格</a>
				<a href="javascript:orderPrinter('<?php echo base_url();?>','credit')"><i class="icon-heart"></i>信誉</a>
				<br/>
				<a href="javascript:orderPrinter('<?php echo base_url();?>','early')"><i class="icon-cog"></i>最早营业</a>
				<a href="javascript:orderPrinter('<?php echo base_url();?>','late')"><i class="icon-adjust"></i>最晚营业</a>
				<br/>
				<a href="javascript:orderPrinter('<?php echo base_url();?>','online')"><i class="icon-signal"></i>当前在线</a>
				</div>
			</div>
			<div class="divider"></div>
			<div id="other_printer">
				<div>
				<?php foreach($printerlist as $printer):?>  
	  
				<div class="printer_info">
					<div>
						<label>
						<input class="radio inline" type="radio" name="printer_address" value=<?php echo $printer->id;?> 
						<?php if($this->session->userdata('printer_id') == $printer->id)
							echo 'checked';
						?> 
						onclick="javascript:setPrinterId('<?php echo base_url();?>','<?php echo " ".$printer->name;?>','<?php echo $this->cart->total_items();?>')"/><?php echo " ".$printer->name;?> | <?php echo $printer->online;?>
						</label>
						
					</div>
					<div style="color:#888">
						<a href="<?php echo base_url().'shop/doc/'.$printer->id.'-1-1';?>">[查看店铺]</a>
						距您100米以内
					</div>
				</div>  
				<?php endforeach;?>  
				</div>
			</div>
			<div class="divider"></div>
			<div class="printer_more">
				更多打印店...
			</div>
		</div>
		<div id="file_manage">
			<div class="profile_title">
				第二步：
				选择文件并上传
			</div>
			<div>
				<?php if(isset($error)) echo $error;?>
				<?php echo form_open_multipart('upload/do_upload',array('id' => 'upload_form'));?>
				<table class="table table-condensed left750" style="margin-bottom:0px;">
					<tr>
						<td>序号</td>
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
						<td></td>
						<td>
							<input style="display:none;" type="file" name="userfile" size="20" onchange="document.getElementById('ufb').value=this.value"/>
							<input class="btn-metro-small" id="ufb" type="button" onclick=userfile.click() value="选择文件"/>
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
						<td><input class="w40" type="text" maxlength="7" size="4" readonly onmouseover= "compute_money('<?php echo base_url();?>','')" onfocus="compute_money('<?php echo base_url();?>','')" id="cost" name="cost"/></td>
						<td><input class="btn-metro-small" type="button" onclick="submit_upload()" onmouseover= "compute_money('<?php echo base_url();?>','')" value="上传" /></td>
					</tr>
				</table>
				</form>
				<div id="file_manage_content">
					<div class="left750">
						<!-- Modal 
						<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						    <h3 id="myModalLabel">删除文件确认</h3>
						  </div>
						  <div class="modal-body">
						  	  <input type="hidden" id="modal-rowid"/>
							  <div>文件ID：<span class="modal-id"></span></div>
							  <div>文件名：<span class="modal-name"></span></div>
							  <div>纸张大小：<span class="modal-papersize"></span></div>
							  <div>打印方式：<span class="modal-isdoubleside"></span></div>
							  <div>装订：<span class="modal-zhuangding"></span></div>
							  <div>单价：<span class="modal-price"></span></div>
							  <div>数量：<span class="modal-qty"></span></div>
						  </div>
						  <div class="modal-footer">
						    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
						    <button onclick="javascript:modal_delete_by_id('<?php echo base_url();?>')" class="btn btn-danger">删除</button>
						  </div>
						</div>
						Modal -->
					<table class="table table-condensed left750" style="margin-bottom:0px;">
					<?php 
						$num = 0;
						foreach ($this->cart->contents() as $items){
							$num++;
							if(!isset($items['options']['isspecialdoc'])){
							?>
					<tr>
						<td><div style="padding-top:2px;"><?php echo $num;?></div></td>
						<td>
							<input type="hidden" id="rowid<?php echo $num;?>" value="<?php echo $items['rowid']?>" />
							<input type="hidden" id="documentid<?php echo $num;?>" value="<?php echo $items['id']?>" />
							<div id="name<?php echo $num;?>" style="padding-top:2px;"><?php echo $items['name'];?></div>
						</td>
						<td>
							<?php echo form_dropdown('papersize'.$num, $papersize_option, $items['options']['papersize'], "id=papersize".$num." class=w60");?>
						</td>
						<td>
							<?php echo form_dropdown('isdoubleside'.$num, $isdoubleside_option, $items['options']['isdoubleside'], "id=isdoubleside".$num." class=w70");?>
						</td>
						<td><input class="w60" type="text" value="<?php echo $items['options']['range'];?>" maxlength="7" size="4" id="range<?php echo $num;?>" name="range<?php echo $num;?>"/></td>
						<td><input class="w60" type="text" value="<?php echo $items['qty'];?>" maxlength="3" size="2" id="fenshu<?php echo $num;?>" name="fenshu<?php echo $num;?>"/></td>
						<td>
							<?php echo form_dropdown('zhuangding'.$num, $zhuangding_option, $items['options']['zhuangding'], "id=zhuangding".$num." class=w70");?>
						</td>
						<td><input class="w40" type="text" value="<?php echo $items['price']*$items['qty'];?>" maxlength="7" size="4" readonly onmouseover= "compute_money('<?php echo base_url();?>','<?php echo $num;?>')" onfocus="compute_money('<?php echo base_url();?>','<?php echo $num;?>')" id="cost<?php echo $num;?>" name="cost<?php echo $num;?>"/></td>
						<td><div style="padding-top:6px;"><a onmouseover= "compute_money('<?php echo base_url();?>','<?php echo $num;?>')" href="javascript:edit_by_id('<?php echo base_url();?>','<?php echo $num;?>')"><i class="icon-edit"></i></a> <a href="javascript:delete_by_id('<?php echo base_url();?>','<?php echo $num;?>')"><i class="icon-remove"></i></a></div></td>
					</tr>
					<?php
							}else{
					?>
					<tr>
						<td><div style="padding-top:2px;"><?php echo $num;?></div></td>
						<td>
							<input type="hidden" id="rowid<?php echo $num;?>" value="<?php echo $items['rowid']?>" />
							<input type="hidden" id="documentid<?php echo $num;?>" value="<?php echo $items['id']?>" />
							<div id="name<?php echo $num;?>" style="padding-top:2px;"><?php echo $items['name'];?></div>
						</td>
						<td>
							<div style="padding-top:2px;">特色资料介绍：</div>
						</td>
						<td>
							<div id="description<?php echo $num;?>" style="padding-top:2px;"><?php echo $items['options']['description'];?></div>
						</td>
						<td><div id="page<?php echo $num;?>" style="padding-top:2px;"><?php echo $items['options']['page'];?></div></td>
						<td><input class="w40" type="text" value="<?php echo $items['qty'];?>" maxlength="2" size="1" id="fenshu<?php echo $num;?>" name="fenshu<?php echo $num;?>"/></td>
						<td>
							
						</td>
						<td><div id="cost<?php echo $num;?>" style="padding-top:2px;"><?php echo $items['price'];?></div></td>
						<td><div style="padding-top:6px;"><a href="javascript:delete_by_id('<?php echo base_url();?>','<?php echo $num;?>')"><i class="icon-remove"></i></a></div></td>
					</tr>
					<?php
							}
						}
					?>
					</table>
					</div>
				</div>
			</div>
		</div>
		<div id="print_setting">
			<div class="profile_title">
				第三步：
				取印设置与订单确认
			</div>
			<script type="text/javascript">
		        $(document).ready(function() {
		            $(".tabs:first").addClass("current"); //为第一个SPAN添加当前效果样式
		            $(".tab ul:not(:first)").hide(); //隐藏其它的UL
		            $(".tabs").click(function() {
		            	$(".tabs").removeClass("current"); //去掉所有SPAN的样式
			            $(this).addClass("current");
		            	if($(this).attr("id") == 'express'){
		            		$(".tab ul").hide();
		            		$(".campus").fadeIn('fast');
		            		$("#receiver").fadeIn('fast');
		            		$("#zipcode").fadeIn('fast');
		            		document.getElementById("method").value = 'express';
		            	}
		                else{
			                $(".tab ul").hide();
			                $("#receiver").hide();
		            		$("#zipcode").hide();
		            		$(".campus").hide();
			                $("." + $(this).attr("id")).fadeIn('fast');
			                document.getElementById("method").value = $(this).attr("id");
		            	}	
		            });
		        });
		    </script>
			<div class="setting_details">
			<?php echo form_open('printtask/submit',array('id' => 'printtask_form')) ?>
				<input type="hidden" name="printerid" id="printerid" value="<?php echo $this->session->userdata('printer_id');?>">
				<input type="hidden" name="method" id="method" value="self">
				<div class="tab" style="border:1px solid #ccc;margin:10px;width:740px;height:120px;">
					<span style="float:left;width:100px;height:120px;">
			            <div class="tabs" id="self">自行取印(免费)</div>
			            <div class="tabs" id="campus">校园送印</div>
			            <div class="tabs" id="express">快递送印</div>
			        </span>
			        <span style="float:left;width:640px;height:130px;">
			        <ul class="self pading6">
			            <div class="span6">
			            	<input type="checkbox" name="daodianyin" id="daodianyin"/>到店再印：
			            		让打印店店员等待您到达打印店后再打印您的文档，不选的话则店员会在您去之前打印好。<br>
							所选打印店地址：
								<?php echo $this->session->userdata('printer_name')?><br>
							取印编号说明：
							选择自行取印，确认订单后会获得一个取印编号，用来您在打印店店铺内快速找到您打印的文档资料<br>
			            </div>
			        </ul>
			        <ul class="campus pading6">
						<div class="span8"><span id="receiver">收货人名：<input class="span2" type="text" id="receiver" name="receiver" 
																			value="<?php echo $this->session->userdata('user_receiver');?>"/></span> 接收电话：<input class="span2" type="text" id="mobile" name="mobile" value="<?php echo $this->session->userdata('user_mobile');?>"/></div>
						<div class="span8"><span id="zipcode">邮政编码：<input class="span2" type="text" id="zipcode" name="zipcode" 
																				value="<?php echo $this->session->userdata('user_zipcode');?>" /></span>
											送印时间：<div class="input-append date form_datetime">			
								    <input size="10" type="text"  id="delivertime" name="delivertime" value="" readonly>
								    <span class="add-on"><i class="icon-calendar"></i></span>
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
						<div class="span8">接收地址：<input class="span6" type="text" id="address" name="address" value="<?php echo $this->session->userdata('user_province').$this->session->userdata('user_city').$this->session->userdata('user_address');?>"/></div>
					</ul>
			    	</span>
			    </div>
				<div class="span9">
					印单备注：<input class="span3" type="text" name="remark"/><span style="margin-left:60px;"></span>
					需要发票：<input class="span3" type="text" name="receipt" value="<?php echo $this->session->userdata('user_receipt');?>"/>
				</div>
				<div class="span9">
					费用总计：<input type="text" maxlength="7" size="4" id="total_cost" name="total_cost" value="<?php echo $this->cart->total();?>" readonly/></span>
					<span style="margin-left:60px;"></span><input class="btn-metro offset1" type="button" onclick="submit_printtask()" value="确认印单" name="submitbtn"/>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>