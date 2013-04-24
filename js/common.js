// 动态获取所在地打印店
function get_printshop_by_location(url,location) {
	$.post(url + "ajax/printajax/get_printshop_by_location", {
		location : location
	}, function(data) {
		$("#printshop").html(data);
	});
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
		document.getElementById('printtask_form').submit();
	return false;
}

function submit_upload(){
	var cost = document.getElementById('cost').value;
	var file = document.getElementById('ufb').value;
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

function setPrinterId(url,name){
	//alert(getRadioValue('printer_address'));
	var printerid = getRadioValue('printer_address');
	$.post(url + "ajax/printajax/setPrinterId", {
		printerid : printerid,
		printername : name
	}, function(data) {
		$("#current").html(name);
		//还要加入重新load选项功能
	});
	document.getElementById('printerid').value = getRadioValue('printer_address');
}

// 动态获取应交费用
function compute_money(url,num) {
	var papersize = document.getElementById('papersize'+num).value;
	var isdoubleside = document.getElementById('isdoubleside'+num).value;
	var range = document.getElementById('range'+num).value;
	var fenshu = document.getElementById('fenshu'+num).value;
	var zhuangding = document.getElementById('zhuangding'+num).value;
	var printerid = getRadioValue('printer_address');
	$.post(url + "ajax/printajax/compute_money", {
		papersize : papersize,
		isdoubleside : isdoubleside,
		range : range,
		fenshu : fenshu,
		zhuangding : zhuangding,
		printerid : printerid
	}, function(data) {
		document.getElementById("cost"+num).value = data;
	});
}

function modal_delete(rowid,id,name,papersize,isdoubleside,zhuangding,price,qty){
	document.getElementById('modal-rowid').value = rowid;
    $('#myModal').find('.modal-id').text(id);
    $('#myModal').find('.modal-name').text(name);
    $('#myModal').find('.modal-papersize').text(papersize);
    $('#myModal').find('.modal-isdoubleside').text(isdoubleside);
    $('#myModal').find('.modal-zhuangding').text(zhuangding);
    $('#myModal').find('.modal-price').text(price);
    $('#myModal').find('.modal-qty').text(qty);
    $('#myModal').modal({show:true});
}

function delete_by_id(url,num){
	if(confirm("确认删除该文档吗?")==1)
	{
		var documentid = document.getElementById('documentid'+num).value;
		var rowid = document.getElementById('rowid'+num).value;
		$.post(url + "ajax/printajax/delete_by_id", {
			documentid : documentid,
			rowid : rowid
		}, function(data) {
			if(data)
				window.location.href = url + "welcome";
		});
	}
	else {
		return false;
	}
}

function edit_by_id(url,num){
	var fenshu = document.getElementById('fenshu'+num).value;
	var cost = document.getElementById('cost'+num).value;
	if(isNaN(cost) || isNaN(fenshu)){
		alert('页码设置有误，请重新输入！');
		return false;
	}
	else if(fenshu == ""){
		alert('份数设置有误，请重新输入！');
		return false;
	}
	else
	if(confirm("确认修改该文档设置吗?")==1)
	{
		var documentid = document.getElementById('documentid'+num).value;
		var rowid = document.getElementById('rowid'+num).value;
		var papersize = document.getElementById('papersize'+num).value;
		var isdoubleside = document.getElementById('isdoubleside'+num).value;
		var range = document.getElementById('range'+num).value;
		var zhuangding = document.getElementById('zhuangding'+num).value;
		var printerid = getRadioValue('printer_address');
		var name = $('#name'+num).text();
		$.post(url + "ajax/printajax/edit_by_id", {
			documentid : documentid,
			name : name,
			rowid : rowid,
			papersize : papersize,
			isdoubleside : isdoubleside,
			range : range,
			fenshu : fenshu,
			zhuangding : zhuangding,
			printerid : printerid,
			cost : cost
		}, function(data) {
			if(data)
				window.location.href = url + "welcome";
		});
	}
	else {
		return window.location.href = url + "welcome";
	}
}

function show_sort(){
	if($("#sort_para").is(":hidden")){
		$("#sort_para").slideDown('slow');
		$("#a_sort").html("收起");
	}
	else{
		$("#sort_para").slideUp('slow');
		$("#a_sort").html("展开");
	}
}

function warningChange(){
	alert("请勿修改此项！");
}