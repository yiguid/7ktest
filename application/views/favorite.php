<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
$this->load->view('menu');
?>
<script type="text/javascript">
            var perpage = <?php echo $pageNum?>;
            var shop_entries = <?php echo $shop_entries;?>;
            var doc_entries  = <?php echo $doc_entries;?>;
            var userid =<?php echo $userid;?>;
            var docurl = '<?php echo base_url()."ajax/userajax/get_doc_favorite";?>';
            var shopurl = '<?php echo base_url()."ajax/userajax/get_shop_favorite";?>';
            var postdata = { userid : userid };
            /** 
             * Initialisation function for pagination
             */
            function initPagination() {
                // count entries inside the hidden content
                // Create content inside pagination element
                $("#jshoppagination").pagination(shop_entries, {
                    items_per_page:1, // Show only one item per page
                    prev_text:'上一页',
                    next_text:'下一页',
                    num_display_entries:5,
                    num_edge_entries:1
                },shopurl,postdata,'#favoshop');
                $("#jdocpagination").pagination(doc_entries , {
                    items_per_page:1, // Show only one item per page
                    prev_text:'上一页',
                    next_text:'下一页',
                    num_display_entries:5,
                    num_edge_entries:1
                },docurl,postdata,'#favodoc');
             }
            
            // When document is ready, initialize pagination
            $(document).ready(function(){  
                //alert("test");    
                initPagination();
            });
</script>
		<div id="managebox">

                <ul id="mytab" class="nav nav-tabs">
                    <li class="active"><a href="#shop" data-toggle="tab">收藏的店铺</a></li>
                    <li><a href="#doc" data-toggle="tab">收藏的资料</a></li>
                </ul>
                 
                <div class="tab-content">
                    <div class="tab-pane active" id="shop">
                    <div id="favoshop">
                        <?php
                            $this->data['shopList']=$this->user_mdl->get_user_favoriteshop(0,min($pageNum,$shop_entries),$userid);
                            $this->load->view('favorite_shop',$this->data);
                        ?>
                    </div>    
                    <div id="jshoppagination"></div>
                    </div>
                    <div class="tab-pane" id="doc">
                        <div id="favodoc">
                        <?php
                            $this->data['docList']=$this->user_mdl->get_user_favoritedoc(0,min($pageNum,$shop_entries),$userid);
                            $this->load->view('favorite_doc',$this->data);
                        ?>
                        </div>
                         <div id="jdocpagination"></div>
                    </div>

                </div>
            </div>
		</div>
	</div>

<?php $this->load->view('footer'); ?>