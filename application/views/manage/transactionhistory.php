<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
<script type="text/javascript">
            var perpage = <?php echo $perpage?>;
            var total = <?php echo $tranTotal;?>;
            var userid = <?php echo $userid;?>;
            var url = '<?php echo base_url()."ajax/userajax/get_user_transaction";?>';
            var postdata = { userid : userid };
         
            // When document is ready, initialize pagination
            $(document).ready(function(){
                $("#jtpagination").divpagination(total, {
                    items_per_page: perpage, // Show only one item per page
                    prev_text:'上一页',
                    next_text:'下一页',
                    num_display_entries:5,
                    num_edge_entries:1
                },url,postdata,'#mingxi');
            });

</script>
		<div id="managebox">
			<div class="content-header">
				<h4>收支明细</h4>
				<h3>账户余额：<?php echo $total;?></h3>
				<div id="mingxi">
					<?php
						$data['translist'] = $this->transaction_mdl->get_transactions_by_userid(0,$perpage,$userid);
						$this->load->view("manage/transactionhistory_list",$data);
					?>
				</div>
				<div id="jtpagination"></div>
			</div>

		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>