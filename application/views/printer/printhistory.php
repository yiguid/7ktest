<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
$this->load->view ( 'printer/header' );
$this->load->view ( 'printer/menu' );
?>
<script type="text/javascript">
            var perpage = <?php echo $perpage?>;
            var total = <?php echo $total;?>;
            var pterid = <?php echo $pterid;?>;
            function pageselectCallback(page_index, jq){
            	
            	var url = '<?php echo base_url()."ajax/shopajax/get_shop_task";?>';
                var start = perpage * page_index;
                var line = perpage;
                    $.post(url , {
                        pterid : pterid,
                        start  : start,
                        line   : line
                    }, function(data) {
                        $("#taskdiv").empty().append(data);
                    });
              
                return false;
            }
           
            /** 
             * Initialisation function for pagination
             */
            function initPagination() {
                // count entries inside the hidden content
                // Create content inside pagination element
				$("#taskpagination").pagination(total, {
                    callback: pageselectCallback,
                    items_per_page:<?php echo $perpage;?>, // Show only one item per page
                    prev_text:'上一页',
                    next_text:'下一页',
                    num_display_entries:5,
                    num_edge_entries:1
                });
             }
            
            // When document is ready, initialize pagination
            $(document).ready(function(){      
                initPagination();
            });
</script>
<div id="managebox">
	<div class="content-header">
		<h4>全部任务</h4>

	</div>
	<div id="taskdiv">
		<?php 
			$data['printhistorylist'] = $this->printer_mdl->get_printer_printhistory($pterid,$perpage,0);
			$this->load->view('printer/printhistory_list',$data); 
		?>
	</div>
	<div id="taskpagination"></div>
</div>
</div>
</div>

<?php $this->load->view('footer'); ?>