<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
<script type="text/javascript">
            var perpage = <?php echo $perpage?>;
            var total = <?php echo $total_rows;?>;
            var userid = <?php echo $userid?>;
            var url = '<?php echo base_url()."ajax/userajax/get_user_documenthistory";?>';
            var postdata = { userid : userid};
         
            // When document is ready, initialize pagination
            $(document).ready(function(){
                $("#jtpagination").divpagination(total, {
                    items_per_page: perpage, // Show only one item per page
                    prev_text:'上一页',
                    next_text:'下一页',
                    num_display_entries:5,
                    num_edge_entries:1
                },url,postdata,'#doclist');
            });

</script>
		<div id="managebox">
			<div class="content-header">
				<h4>历史文件</h4>
			</div>
			<div id="doclist">
				<?php
					$data['documenthistorylist'] = $this->user_mdl->get_user_documenthistory($userid,$perpage,0);
					$this->load->view('documenthistory_list',$data);

				?>
			</div>
			<div style="display:none;" id="add_printtask_panel">
				<?php echo form_open_multipart('documenthistory/addtoprinttask',array('id' => 'add_printtask_form'));?>
				<table class="table table-condensed left750" style="margin-bottom:0px;">
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
							<input type="hidden" id="documentid" name="documentid" value=""/>
							<input type="hidden" id="documentname" name="documentname" value=""/>
							<input class="btn btn-info" id="ufb" type="button" value=""/>
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
						<td><input class="btn btn-info" type="button" onclick="add_printtask()" onmouseover= "compute_money('<?php echo base_url();?>','')" value="添加" /></td>
					</tr>
				</table>
				</form>
			</div>
			<div id="jtpagination"></div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>