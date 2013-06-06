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
                },url,postdata,'#documenthistorylist');
            });

</script>
<div id="managebox">
	<div class="content-header">
		<h4>印单文件</h4>
	</div>
	<div id="documenthistorylist" >
		<?php
			$data['documenthistorylist'] = $this->printer_mdl->get_printer_documenthistory($pterid,$perpage,0); 
			$this->load->view('printer/documenthistory_list',$data);
		?>
	</div>
	<div id="jtpagination"></div>
</div>
</div>
</div>

<?php $this->load->view('footer'); ?>