<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>

<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.1&key=1a9b216d3278ebbfed5b88bbd084e475"></script>  

<div id="container">
	<div id="profile">
		<div style="padding:20px;">
			<a style="color:white;" href="<?php echo base_url();?>shop"
				class="btn btn-warning btn-large"
				onmouseover= "get_printshop_by_location('<?php echo base_url();?>','beijing')">北京</a>
			<a style="color:white;" href="<?php echo base_url();?>location/at/shanghai"
				class="btn btn-warning btn-large"
				onmouseover= "get_printshop_by_location('<?php echo base_url();?>','shanghai')">上海</a>
		</div>
		<div id="printshop">
			<a style="color:white;" href="#"
				class="btn btn-info btn-large">请选择您所在的区域...</a>
		</div>
		<div style="float:left;width:980px;height:400px;" id="map"></div>
		<div style="clear:both;"></div>

	</div>
</div>

<script language="javascript">
	var mapObj,tool,view,scale;
	mapObj = new AMap.Map("map");
	var point = new AMap.LngLat(116.347, 39.982); // 创建点坐标  
    mapObj.setCenter(point); // 设置地图中心点坐标  
    mapObj.setZoom(15);

    mapObj.plugin(["AMap.ToolBar","AMap.OverView,AMap.Scale"], function() {  
      // 加载工具条  
	tool = new AMap.ToolBar({        direction: true, // 隐藏方向导航  
	        ruler: true, // 隐藏视野级别控制尺  
	        autoPosition: true, // 禁止自动定位  
	        direction:true//隐藏方向导航
	    });  
	    mapObj.addControl(tool);  
	});  

</script>


<?php $this->load->view('footer'); ?>