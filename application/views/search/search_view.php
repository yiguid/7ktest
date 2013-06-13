<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>
<script type="text/javascript">
	function setPagination(total,perpage,url,postdata,div)
	{
		$("#jtpagination").divpagination(total, {
	     items_per_page: perpage, // Show only one item per page
	    },url,postdata,div);
	}

	function docPaginationInit()
	{
	    var perpage = <?php echo $perpage?>;
	    var total = <?php echo $total_rows;?>;
	    var keywords = '<?php echo $keywords;?>';
	    var url = '<?php echo base_url()."ajax/commonajax/get_search_doc_list";?>';
	    var postdata = { keywords : keywords };
	        $("#jtpagination").divpagination(total, {
	            items_per_page: perpage, // Show only one item per page
	            prev_text:'上一页',
	            next_text:'下一页',
	            num_display_entries:5,
	            num_edge_entries:1
	        },url,postdata,"#result_list");
	}
    $(document).ready(function(){
    	var keywords = '<?php echo $keywords;?>';
    	var divTarget= '#result_list';
    	var perpage = <?php echo $perpage?>;
    	docPaginationInit();
    	$(".nav li").click(function(e){
			//控制显示
			$(".nav li").removeClass('active');
			$(this).attr('class','active');
		});

		$(".nav a").click(function(e){
			var curpostdata = {keywords : keywords};
			var type = $(this).text();
			var totalurl='<?php echo  base_url()."ajax/commonajax/get_search_doc_total"?>';
			var listurl = '<?php echo  base_url()."ajax/commonajax/get_search_doc_list"?>';
			if(type == '搜到的打印店')
			{
				totalurl='<?php echo  base_url()."ajax/commonajax/get_search_printer_total"?>';
				listurl = '<?php echo  base_url()."ajax/commonajax/get_search_printer_list"?>';
			}
			$.post(totalurl,curpostdata, 
				function(data) {
				if(data < 0) {
					data = 0;
				}
				setPagination(data,perpage,listurl,curpostdata,divTarget);
			});
			$.extend(curpostdata,{line : perpage, start : 0});
			$.post(listurl, curpostdata, function(data) {
				$(divTarget).empty().append(data);
			});
		});
    });

</script>
<div id="container" style="padding-left:100px;">
	<div id="profile">
		<div id="managebox">
			<div class="content-header">
				<h4>搜索  <span style="color:red"><?php echo $this->session->userdata('keywords')?></span>  的结果</h4>
				<div id="result_class">
					<ul class="nav nav-pills" style="float:left">
						<li class='active' ><a>搜到的文档</a></li>
						<li ><a>搜到的打印店</a></li>
					</ul>
					<div style="clear:both;"></div>
				</div>
			</div>
			<div id='result_list'>
				<?php 
					$data['searchresultlist']= $this->document_mdl->get_documents_by_keyword($keywords,$perpage,0);
					$this->load->view('search/searchdocresult_list',$data);
				?>
			</div>
			<div id="jtpagination"></div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>