function getRadioValue(radioName){
	var obj;
	obj = document.getElementsByName(radioName);
	if(obj!=null){
		var i;
		for(i=0;i<obj.length;i++){
			if(obj[i].checked){
				return obj[i].value;
			}
		}
	}
}

function submit_printtask(){
	document.getElementById('printerid').value = getRadioValue('printer_address');
	var printerid = document.getElementById('printerid').value;
	var mobile = document.getElementById('mobile').value;
	var delivertime = document.getElementById('delivertime').value;
	var address = document.getElementById('address').value;
	var method = getRadioValue('method');
	var total_cost = document.getElementById('total_cost').value;
	if(printerid == "-1" || printerid == "undefined")
		alert("请先选择打印店。");
	else if(mobile == "")
		alert("请输入手机号。");
	else if(delivertime == "")
		alert("请输入送印时间。");
	else if(method != "self" && address == "")
		alert("请输入送印地址。");
	else if(total_cost == 0)
		alert("你忘记上传文件啦！");
	else
		alert("ok");
	return false;
}

function submit_upload(){
	var cost = document.getElementById('cost').value;
	var file = document.getElementById('uploadfilename').value;
	var fs = document.getElementById('fenshu').value;
	
	if(isNaN(cost) || isNaN(fs)){
		alert('页码设置有误，请重新输入！');
		return false;
	}
	else if(fs == ""){
		alert('份数设置有误，请重新输入！');
		return false;
	}
	else if(file == ""){
		alert('你忘记上传文件啦！');
		return false;
	}
	else
		document.getElementById('upload_form').submit();
}

// 动态获取应交费用
function compute_money(url) {
	var papersize = document.getElementById('papersize').value;
	var isdoubleside = document.getElementById('isdoubleside').value;
	var range = document.getElementById('range').value;
	var fenshu = document.getElementById('fenshu').value;
	var zhuangding = document.getElementById('zhuangding').value;
	$.post(url + "ajax/printajax/compute_money", {
		papersize : papersize,
		isdoubleside : isdoubleside,
		range : range,
		fenshu : fenshu,
		zhuangding : zhuangding
	}, function(data) {
		document.getElementById("cost").value = data;
	});
}

function deliver(url, printtaskid){
	alert("deliver!");
}

function printDocument(url, printtaskid){
	$.post(url + "ajax/printajax/printDocument", {
		printtaskid : printtaskid
	}, function(data) {
		if (data == "1"){
			alert("打印完成！");
			location.reload();
		}
	});
}

function addDocuments(){
	alert("i am here!");
}

function setPrinterId(url){
	//alert(getRadioValue('printer_address'));
	var printerid = getRadioValue('printer_address');
	$.post(url + "ajax/printajax/setPrinterId", {
		printerid : printerid
	}, function(data) {
		if (data == "1"){
		}
	});
	document.getElementById('printerid').value = getRadioValue('printer_address');
}

function warningChange(){
	alert("请勿修改此项！");
}