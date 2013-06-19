<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
$this->load->view ( 'printer/header' );
$this->load->view ( 'printer/menu' );
$this->load->helper('url');
?>
<script type="text/javascript">
            var perpage = <?php echo $perpage?>;
            var total = <?php echo $total_rows;?>;
            var pterid = <?php echo $pterid;?>;
            var url = '<?php echo base_url()."ajax/shopajax/get_printer_documenthistory";?>';
            var postdata = { pterid : pterid };
         
            // When document is ready, initialize pagination
            $(document).ready(function(){
                $("#jtpagination").divpagination(total, {
                    items_per_page: perpage, // Show only one item per page
                    prev_text:'上一页',
                    next_text:'下一页',
                    num_display_entries:5,
                    num_edge_entries:1
                },url,postdata,'#specialdoclist');
            });

</script>
<div id="managebox">
	<div class="content-header">
		<h4>特色资料</h4>
	</div>
		<div id="specialdoclist">
			<?php
				$data['specialdoclist'] =  $this->printer_mdl->get_printer_specialdoc($pterid,$perpage,0);
				$this->load->view('printer/specialdoc_list',$data);
			?>
		</div>
		<div id="jtpagination"></div>

		<div style="text-align:left;margin-left:20px;">
			<h5>上传特色资料</h5> 
		<?php echo form_open_multipart('printer/specialdoc/do_upload',array('id' => 'upload_form'));?>
			<div>资料名称：<input type="text" name="name"/>标签：<input type="text" name="keyword"/></div>
			<div>资料类型：<input type="text" name="type"/>页数：<input type="text" name="page"/></div>
			<div>资料定价：<input type="text" name="price"/></div>
			<div>资料描述：<textarea name="description" rows="3" style="width:470px;"></textarea></div>
			<div><input style="display:none;" type="file" name="userfile" size="20" onchange="document.getElementById('ufb').value=this.value"/>
				 <input class="btn-metro" id="ufb" type="button" onclick=userfile.click() value="点击选择文件"/>
				 <input class="btn-metro" type="submit" value="上传" />&nbsp;如果不希望上传资料原件，请任意上传一个文档文件代替。</div>
		</form>
		</div>
</div>
</div>
</div>

<?php $this->load->view('footer'); ?>