<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('printer/header');
$this->load->view('printer/menu');
?>
<script type="text/javascript">
            var perpage = <?php echo $perpage?>;
            var total   = <?php echo $tranTotal;?>;
            var pterid  = <?php echo $pterid;?>;
            function pageselectCallback(page_index, jq){
                var url = '<?php echo base_url()."ajax/shopajax/get_shop_transaction";?>';
                var start = perpage * page_index;
                var line = perpage;
                    $.post(url , {
                        pterid : pterid,
                        start  : start,
                        line   : line
                    }, function(data) {
                        $('#yu-e').empty().append(data);
                    });
                return false;
            }
            function initPagination() {
                // count entries inside the hidden content
                // Create content inside pagination element
                $('#moneypagination').pagination(total,{
                    callback: pageselectCallback,
                    items_per_page: <?php echo $perpage?>,
                    prev_text:'上一页',
                    next_text:'下一页',
                    num_display_entries:5,
                    num_edge_entries: 1,
                });
             }
            
            // When document is ready, initialize pagination
            $(document).ready(function(){  
                initPagination();
            });
</script>
<div id="managebox">
			<div class="content-header">
				<h4>财务管理</h4>
				<h5>账户余额：<?php echo $total*-1;?></h5>
			</div>
            <div>
                <div id="yu-e">
                    <?php 
                        $data['translist']=$this->transaction_mdl->get_transactions_by_pterid(0,$perpage,$this->session->userdata('id'));
                        $this->load->view('printer/money_list',$data);
                    ?>
                </div>
                <div id="moneypagination"></div>
            </div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>