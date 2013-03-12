
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