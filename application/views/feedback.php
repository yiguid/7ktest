<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	if(!$this->auth->printer_logged_in())
	{
		$this->load->view('header');
	}
	else
	{
		$this->load->view('printer/header');
	}
	$this->load->helper('url');
?>
<script type="text/javascript">
            var perpage = <?php echo $perpage?>;
            var total = <?php echo $total;?>;
            var url = '<?php echo base_url()."ajax/commonajax/get_feedback_list";?>';
            var postdata = { };
         
            // When document is ready, initialize pagination
            $(document).ready(function(){
                $("#jtpagination").divpagination(total, {
                    items_per_page: perpage, // Show only one item per page
                    prev_text:'上一页',
                    next_text:'下一页',
                    num_display_entries:5,
                    num_edge_entries:1
                },url,postdata,'#msglist');
            });

</script>
<div id="feedback_container">
	<div id="profile">
		<div id="msglist">
			<?php
				$data['msglist'] = $msglist;
				$this->load->view('feedback_list',$data); 
			?>
		</div>
		<div id="jtpagination"></div>
		<?php if($this->auth->logged_in()){	?>
		<div class="create">
			<form class="form-horizontal" action="<?php echo base_url();?>feedback/create" method="post">
			 <div class="control-group">
			    <span style="padding-top:6px;" class="help-inline">* 留言类型：</span>
			    <label class="radio inline">
			      <input class="inline" type="radio" name="msgtype" value="1" checked>
			      	催单
			    </label>
			    <label class="radio inline">
			      <input type="radio" name="msgtype" value="2">
			      	网站错误
			    </label>
			    <label class="radio inline">
			      <input type="radio" name="msgtype" value="3">
			      	功能建议
			    </label>
			    <label class="radio inline">
			      <input type="radio" name="msgtype" value="4">
					投诉
			    </label>
			</div>
			<div>
				 <?php if(isset($create_error)) echo "<lable>".$create_error."</lable>";?>
			     <textarea name="msgcontent" id="msgcontent"></textarea>
			</div>
			<div style="padding:10px;">
			    <button class="btn-metro" type="submit" name="submit">发表留言</button>
			    <button class="btn-metro" type="reset" name="reset">重写</button>
			</div>
			</form>
		</div>
		
		<?php }elseif(!$this->auth->printer_logged_in()){?>
		<div>
			 若您要留言？请您先<?php echo anchor(base_url().'login','登录');?>
		</div>
		<?php }?>
	</div>
</div>
<?php $this->load->view('footer'); ?>