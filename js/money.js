// 中文标记
var changed = null, tbody = null, lrow = null, hiddendata = null, action = true;;
var insertHTML = '';
window.onload = function(){
	changed = false;	//记录用户是否做过修改
	tbody = document.getElementsByTagName('tbody').item(0);
	lrow = tbody.lastChild;
	hiddendata = document.getElementById('hiddendata');
	//更新单选
	(function(window){
		var s = window.document.getElementsByTagName('select');
		var l = s.length;
		for(var i = 0; i < l; i++){
			var obj = s.item(i);
			var value = obj.getAttribute('dvalue');
			if(value){
				obj.value = value;
				obj.onchange = function(){ changed = true; };
			}
		}
		var s = window.document.getElementsByTagName('input');
		var l = s.length;
		for(var i = 0; i < l; i++){
			var obj = s.item(i);
			if(obj.type == 'text'){
				obj.onchange = function(){ changed = true; };
			}
		}
	})(window);
	window.onbeforeunload = function(event){
		event = event || window.event;
		if(changed && action){
			var str = '您修改数据还未保存（保存请点击保存按钮）！确定要关闭么？';
			event.returnValue = str;
			return '您修改数据还未保存（保存请点击保存按钮）！确定要关闭么？';
		}
		action = true;
	}
}
function add_row(){
	if(insertHTML.length == 0){
		insertHTML = (function(){
			var divs = hiddendata.getElementsByTagName('div');
			var html = '';
			for(var i=0, l = divs.length; i<l; i++){
				html += '<td>'+divs[i].innerHTML+'</td>';
			}
			return html;
		})();
	}
	try{
		var tr = tbody.insertRow();
		var divs = hiddendata.getElementsByTagName('div');
		for(var i=0, l = divs.length; i<l; i++){
			var td = tr.insertCell(i);
			td.innerHTML = divs[i].innerHTML;
		}
	}catch(e){
		var tr = document.createElement('tr');
		tr.innerHTML = insertHTML;
	}
	tbody.insertBefore(tr, lrow);
	changed = true;
	action = false;
}
function delete_row(obj){
	var tr = obj.parentNode.parentNode;
	tbody.removeChild(tr);
	changed = true;
	action = false;
}