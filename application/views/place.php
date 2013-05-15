<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>

<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.1&key=1a9b216d3278ebbfed5b88bbd084e475"></script>  

<style>
.markerlabel{position:relative;}
.markerlabel span{
	background-color: #ffffff;
	color:#000;
	border:1px solid #888;
	position:absolute;
	top:-10px;
	left:30px;
	width:150px;
	height:20px
}
</style>

<div id="container">
	<div id="profile">
		<div style="padding:20px;">
			<a style="color:white;" href="<?php echo base_url();?>location/at/beijing"
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

	function printerpoi(id,longi,lati,url,name){
		//自定义覆盖物dom 元素
		var m = document.createElement("div");
		m.className = "markerlabel";
		var markeruri= document.createElement("img");
		markeruri.className="markerlnglat";
		markeruri.src="http://api.amap.com/webapi/static/Images/marker_sprite.png";   
		m.appendChild(markeruri);
		var n = document.createElement("span");
		n.innerHTML = "<a href=" + url + ">" + name + "</a>";
		m.appendChild(n);

		//构建点对象
		var marker = new AMap.Marker({
			id:id,//唯一ID
			position:new AMap.LngLat(longi,lati),//基点位置
			offset:new AMap.Pixel(0,0),//相对于基点的位置
			content:m
		});
		return marker;
	}

	var mapObj,tool,view,scale;
	mapObj = new AMap.Map("map");
	var point = new AMap.LngLat(116.347, 39.982); // 创建点坐标  
    mapObj.setCenter(point); // 设置地图中心点坐标  
    mapObj.setZoom(15);

    mapObj.plugin(["AMap.ToolBar","AMap.OverView,AMap.Scale"], function() {  
      // 加载工具条  
	tool = new AMap.ToolBar({        direction: true, // 隐藏方向导航  
	        ruler: true, // 隐藏视野级别控制尺  
	        autoPosition: false, // 禁止自动定位  
	        direction:true//隐藏方向导航
	    });  
	    mapObj.addControl(tool);  
	});

	mapObj.addOverlays(printerpoi('beihang','116.347','39.982','printshop/name/beihang','北航打印店')); //将点添加到地图
	mapObj.addOverlays(printerpoi('beiyou','116.349','39.984','printshop/name/beiyou','北邮打印店'));

</script>


<?php $this->load->view('footer'); ?>