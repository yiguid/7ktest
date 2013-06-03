<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
<script type="text/javascript">
            var perpage = <?php echo $perpage?>;
            var total = <?php echo $total_rows;?>;
            var userid = <?php echo $userid;?>;
            var url = '<?php echo base_url()."ajax/userajax/get_user_printhistory";?>';
            var postdata = { userid : userid };
         
            // When document is ready, initialize pagination
            $(document).ready(function(){
                $("#jtpagination").divpagination(total, {
                    items_per_page: perpage, // Show only one item per page
                    prev_text:'上一页',
                    next_text:'下一页',
                    num_display_entries:5,
                    num_edge_entries:1
                },url,postdata,'#printhistorylist');
            });

</script>
		<div id="managebox">
			<div class="content-header">
				<h4>历史印单</h4>
			</div>
			<div id='printhistorylist'>
				<?php
					$data['printhistorylist'] = $this->user_mdl->get_user_printhistory($userid,$perpage,0); ;
					$this->load->view('printhistory_list_view',$data);
				?>
			</div>
			<div id="jtpagination">
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>