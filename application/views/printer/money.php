<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('printer/header');
$this->load->view('printer/menu');
?><script type="text/javascript">
            var perpage = <?php echo $perpage?>;
            var list_entries = <?php echo $list_entries;?>;
            var userid = <?php echo $userid;?>
            function pageselectCallback(page_index, jq){
                //var new_content = jQuery('#hiddenresult div.result:eq('+page_index+')').clone();
                //$('#Searchresult').empty().append(new_content);
                /*
                var url = '<?php echo base_url()."ajax/userajax/get_shop_favorite";?>';
                var userid =<?php echo $userid;?>;
                var start = pageNum * page_index;
                var line = pageNum;
                    $.post(url , {
                        userid : userid,
                        start  : start,
                        line   : line
                    }, function(data) {
                        $('#favoshop').empty().append(data);
                    });m
                   */
                return false;
            }
           
            /** 
             * Initialisation function for pagination
             */
            function initPagination() {
                // count entries inside the hidden content
                // Create content inside pagination element
                $("#moneypagination").pagination(Math.ceil(list_entries / pageNum), {
                    callback: pageselectCallback,
                    items_per_page: perpage, // Show only one item per page
                    prev_text:'上一页',
                    next_text:'下一页',
                    num_display_entries:5,
                    num_edge_entries:1
                });
             }
            
            // When document is ready, initialize pagination
            $(document).ready(function(){  
                //alert("test");    
                initPagination();
            });
</script>
<div id="managebox">
			<div class="content-header">
				<h4>财务管理</h4>
				<h5>账户余额：<?php echo $total;?></h5>
			</div>
			<div>
				<div id="mingxi">
					<?php 
						$data['translist']=$this->transaction_mdl->get_transactions_by_userid(0,$perpage,$this->session->userdata('id'));
						$this->load_view('printer/money_list',$data);
					?>
				</div>
				 <div id="moneypagination"></div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>