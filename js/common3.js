var applytype = "申请类别";
var pid = "pid";


//ajax动态获取人员信息
function getpeopleinfobypid()
{
	if (applytype == "北航教职工为本人申请" && document.getElementById("idteachertype").value == "聘用编制")
	{
		return;
	}
	var num = mytrim(document.getElementById("idpid").value);
	var tempurl = "AjaxServer.php?type=getpeopleinfobypid&pid=" + num;
	$.get(tempurl, {}, 
		  function(data)
		  {
			  var array = data.split("|");
			  if (array[0] != "无")
			  {
			      document.getElementById("idapplicant").value = array[0];
			  }
			  if (array[1] != "无")
			  {
			      document.getElementById("idcompany").value = array[1];
			  }
			  if (array[2] != "无")
			  {
			      document.getElementById("ididcard").value = array[2];
			  }
		  });
}
function getpeopleinfobyname()
{
	if (document.getElementById("idteachertype").value != "聘用编制")
	{
		return;
	}
	var num = mytrim(document.getElementById("idapplicant").value);
	var tempurl = "AjaxServer.php?type=getpeopleinfobyname&info=" + encodeURIComponent(num);
	$.get(tempurl, {}, 
		  function(data)
		  {
			  var array = data.split("|");
			  if (array[0] != "无")
			  {
			      document.getElementById("idpid").value = array[0];
			  }
			  if (array[1] != "无")
			  {
			      document.getElementById("ididcard").value = array[1];
			  }
			  if (array[2] != "无")
			  {
			      document.getElementById("idcompany").value = array[2];
			  }
		  });
}
function showmoney()
{
	if (applytype == "北航教职工为本人申请")
	{
		pid = document.getElementById("idpid").value;
		addresstype = document.getElementById("idaddresstype").value;
		teachertype = document.getElementById("idteachertype").value;
		tempurl = "AjaxServer.php?type=getmoney&moneytype=" + encodeURIComponent(applytype) + "&pid=" + pid + "&addresstype=" + encodeURIComponent(addresstype) + "&teachertype=" + encodeURIComponent(teachertype);
		$.get(tempurl, {},
		  function(data)
		  {
			  document.getElementById("idmoneyspan").innerHTML = data;
		  });
		if (addresstype == "北航校外")
		{
		    tempurl = "AjaxServer.php?type=checkaddress&pid=" + pid;
		    $.get(tempurl, {}, function(data){if (data == "注意") { alert("需审查：校外购房合同或产权证"); } } );
		}
	}
	else if (applytype == "北航学生为本人申请")
	{
		pid = document.getElementById("idpid").value;
		tempurl = "AjaxServer.php?type=getmoney&moneytype=" + encodeURIComponent(applytype) + "&pid=" + pid;
		$.get(tempurl, {},
		  function(data)
		  {
			  document.getElementById("idmoneyspan").innerHTML = data;
		  });
	}
	else if (applytype == "北航教职工为配偶或子女申请")
	{
		pid = document.getElementById("idpid").value;
		relativename = document.getElementById("idrelativename").value;
		tempurl = "AjaxServer.php?type=getmoney&moneytype=" + encodeURIComponent(applytype) + "&pid=" + pid + "&relativename=" + encodeURIComponent(relativename);
		$.get(tempurl, {},
		  function(data)
		  {
			  document.getElementById("idmoneyspan").innerHTML = data;
		  });
	}
	else if (applytype == "附中附小幼儿园学生家长申请")
	{
		tempurl = "AjaxServer.php?type=getmoney&moneytype=" + encodeURIComponent(applytype);
		$.get(tempurl, {},
		  function(data)
		  {
			  document.getElementById("idmoneyspan").innerHTML = data;
		  });
	}
	else if (applytype == "北航学校公车申请")
	{
		tempurl = "AjaxServer.php?type=getmoney&moneytype=" + encodeURIComponent(applytype);
		$.get(tempurl, {},
		  function(data)
		  {
			  document.getElementById("idmoneyspan").innerHTML = data;
		  });
	}
	else if (applytype == "业务单位人员申请")
	{
		tempurl = "AjaxServer.php?type=getmoney&moneytype=" + encodeURIComponent(applytype);
		$.get(tempurl, {},
		  function(data)
		  {
			  document.getElementById("idmoneyspan").innerHTML = data;
		  });
	}
	else if (applytype == "校内办公的外单位人员申请")
	{
		tempurl = "AjaxServer.php?type=getmoney&moneytype=" + encodeURIComponent(applytype);
		$.get(tempurl, {},
		  function(data)
		  {
			  document.getElementById("idmoneyspan").innerHTML = data;
		  });
	}
	else if (applytype == "房主为校内租房的社会人员申请")
	{
		tempurl = "AjaxServer.php?type=getmoney&moneytype=" + encodeURIComponent(applytype);
		$.get(tempurl, {},
		  function(data)
		  {
			  document.getElementById("idmoneyspan").innerHTML = data;
		  });
	}
	else if (applytype == "居住校内的社会人员申请")
	{
		tempurl = "AjaxServer.php?type=getmoney&moneytype=" + encodeURIComponent(applytype);
		$.get(tempurl, {},
		  function(data)
		  {
			  document.getElementById("idmoneyspan").innerHTML = data;
		  });
	}
	else if (applytype == "其他用工和送货施工车辆申请")
	{
		tempurl = "AjaxServer.php?type=getmoney&moneytype=" + encodeURIComponent(applytype);
		$.get(tempurl, {},
		  function(data)
		  {
			  document.getElementById("idmoneyspan").innerHTML = data;
		  });
	}
	else if (applytype == "嘉宾")
	{
		tempurl = "AjaxServer.php?type=getmoney&moneytype=" + encodeURIComponent(applytype);
		$.get(tempurl, {},
		  function(data)
		  {
			  document.getElementById("idmoneyspan").innerHTML = data;
		  });
	}
}

//字符串的trim函数
function mytrim(str)
{
	return str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
}
//检查是否为数字和字母
function check_digit_and_letter(mydata)
{
	for(i = 0; i < mydata.length; ++i)
	{
		if ((mydata.charAt(i) >= '0' && mydata.charAt(i) <= '9') ||
			(mydata.charAt(i) >= 'A' && mydata.charAt(i) <= 'Z') ||
			(mydata.charAt(i) >= 'a' && mydata.charAt(i) <= 'z'))
		{
			continue;
		}
		else
		{
			return -1;
		}
	}
	return 0;
}
//检查是否为电话号码
function check_phone_num(mydata)
{
	for(i = 0; i < mydata.length; ++i)
	{
		if ((mydata.charAt(i) >= '0' && mydata.charAt(i) <= '9') ||
			(mydata.charAt(i) == '+') ||
			(mydata.charAt(i) == '-'))
		{
			continue;
		}
		else
		{
			return -1;
		}
	}
	return 0;
}
//检查电子邮箱格式
function check_email(mydata)
{
	var reg = /^[a-zA-Z0-9_-]+(\.([a-zA-Z0-9_-])+)*@[a-zA-Z0-9_-]+[.][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*$/; 
	if (!reg.test(mydata))
	{
		return -1;
	}
	return 0;
}
function checkteachertype()
{
	var num = document.getElementById("idteachertype").value;
	if (num == "事业编制")
	{
		document.getElementById("idteacherpidtitle").innerHTML="工作证号";
	}
	else
	{
		document.getElementById("idteacherpidtitle").innerHTML="合同编号";
		getpeopleinfobyname();
	}
}
function checkcompany()
{
	var num = document.getElementById("idcompany").value;
	if (num == "其他")
	{
		document.getElementById("idothercompany").innerHTML="<input class=\"inputtext\" type=\"text\" name=\"companyother\" id=\"idcompanyother\" size=\"20\" />&nbsp;";
	}
	else
	{
		document.getElementById("idothercompany").innerHTML="";
	}
}
function checkcompanyinbuaa()
{
	var num = document.getElementById("idcompanyinbuaa").value;
	if (num == "其他")
	{
		document.getElementById("idothercompanyinbuaa").innerHTML="<input class=\"inputtext\" type=\"text\" name=\"companyinbuaaother\" id=\"idcompanyinbuaaother\" size=\"20\" />&nbsp;";
	}
	else
	{
		document.getElementById("idothercompanyinbuaa").innerHTML="";
	}
}
function checkteacherrelation()
{
	var num = document.getElementById("idteacherrelation").value;
	if (num == "夫妻")
	{
		document.getElementById("idrelativenameth").innerHTML = "配偶姓名";
		document.getElementById("idrelativeidcardth").innerHTML = "配偶身份证件号";
		document.getElementById("idrelativeaddresstypeth").innerHTML = "配偶居住地址";
		document.getElementById("idrelativemobileth").innerHTML = "配偶手机号码";
		document.getElementById("idrelativephone1th").innerHTML = "配偶家庭电话";
		document.getElementById("idrelativephone2th").innerHTML = "配偶单位电话";
		document.getElementById("idrelativeemailth").innerHTML = "配偶电子邮箱";
		document.getElementById("idcarownerrelationth").innerHTML = "配偶与车主关系";
	}
	else
	{
		document.getElementById("idrelativenameth").innerHTML = "子女姓名";
		document.getElementById("idrelativeidcardth").innerHTML = "子女身份证件号";
		document.getElementById("idrelativeaddresstypeth").innerHTML = "子女居住地址";
		document.getElementById("idrelativemobileth").innerHTML = "子女手机号码";
		document.getElementById("idrelativephone1th").innerHTML = "子女家庭电话";
		document.getElementById("idrelativephone2th").innerHTML = "子女单位电话";
		document.getElementById("idrelativeemailth").innerHTML = "子女电子邮箱";
		document.getElementById("idcarownerrelationth").innerHTML = "子女与车主关系";
	}
}
function checkcarbrand()
{
	document.getElementById("idothercarbrand").innerHTML = "";
	document.getElementById("idothercarbrandx").innerHTML = "";
	document.getElementById('idcarbrandx').options.length = 0;
	document.getElementById('idcarbrandx').options.add(new Option('请选择', '请选择'));
	var num = document.getElementById("idcarbrand").value;
	if (num == 'A阿斯顿马丁')
	{
		document.getElementById('idcarbrandx').options.add(new Option('A阿斯顿马丁DB9', 'A阿斯顿马丁DB9'));
		document.getElementById('idcarbrandx').options.add(new Option('A阿斯顿马丁DBS', 'A阿斯顿马丁DBS'));
		document.getElementById('idcarbrandx').options.add(new Option('RRapide', 'RRapide'));
		document.getElementById('idcarbrandx').options.add(new Option('VV12Vantage', 'VV12Vantage'));
	}
	else if (num == '奥迪')
	{
		document.getElementById('idcarbrandx').options.add(new Option('A奥迪A3', 'A奥迪A3'));
		document.getElementById('idcarbrandx').options.add(new Option('A奥迪A4L', 'A奥迪A4L'));
		document.getElementById('idcarbrandx').options.add(new Option('A奥迪A5', 'A奥迪A5'));
		document.getElementById('idcarbrandx').options.add(new Option('A奥迪A6L', 'A奥迪A6L'));
		document.getElementById('idcarbrandx').options.add(new Option('A奥迪A8', 'A奥迪A8'));
		document.getElementById('idcarbrandx').options.add(new Option('A奥迪Q5', 'A奥迪Q5'));
		document.getElementById('idcarbrandx').options.add(new Option('A奥迪Q5(进口)', 'A奥迪Q5(进口)'));
		document.getElementById('idcarbrandx').options.add(new Option('A奥迪Q7', 'A奥迪Q7'));
		document.getElementById('idcarbrandx').options.add(new Option('A奥迪R8', 'A奥迪R8'));
		document.getElementById('idcarbrandx').options.add(new Option('A奥迪TT', 'A奥迪TT'));
	}
	else if (num == 'B宝马')
	{
		document.getElementById('idcarbrandx').options.add(new Option('B宝马1系', 'B宝马1系'));
		document.getElementById('idcarbrandx').options.add(new Option('B宝马3系', 'B宝马3系'));
		document.getElementById('idcarbrandx').options.add(new Option('B宝马3系(进口)', 'B宝马3系(进口)'));
		document.getElementById('idcarbrandx').options.add(new Option('B宝马5系', 'B宝马5系'));
		document.getElementById('idcarbrandx').options.add(new Option('B宝马5系(进口)', 'B宝马5系(进口)'));
		document.getElementById('idcarbrandx').options.add(new Option('B宝马6系', 'B宝马6系'));
		document.getElementById('idcarbrandx').options.add(new Option('B宝马7系', 'B宝马7系'));
		document.getElementById('idcarbrandx').options.add(new Option('B宝马M系', 'B宝马M系'));
		document.getElementById('idcarbrandx').options.add(new Option('B宝马X1', 'B宝马X1'));
		document.getElementById('idcarbrandx').options.add(new Option('B宝马X3', 'B宝马X3'));
		document.getElementById('idcarbrandx').options.add(new Option('B宝马X5', 'B宝马X5'));
		document.getElementById('idcarbrandx').options.add(new Option('B宝马X6', 'B宝马X6'));
		document.getElementById('idcarbrandx').options.add(new Option('B宝马Z4', 'B宝马Z4'));
	}
	else if (num == 'B保时捷')
	{
		document.getElementById('idcarbrandx').options.add(new Option('BBoxster', 'BBoxster'));
		document.getElementById('idcarbrandx').options.add(new Option('B保时捷911', 'B保时捷911'));
		document.getElementById('idcarbrandx').options.add(new Option('CCayman', 'CCayman'));
		document.getElementById('idcarbrandx').options.add(new Option('K卡宴', 'K卡宴'));
		document.getElementById('idcarbrandx').options.add(new Option('PPanamera', 'PPanamera'));
	}
	else if (num == 'B北汽')
	{
		document.getElementById('idcarbrandx').options.add(new Option('Q骑士S12', 'Q骑士S12'));
		document.getElementById('idcarbrandx').options.add(new Option('Y域胜007', 'Y域胜007'));
	}
	else if (num == 'B奔驰')
	{
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰AMG级', 'B奔驰AMG级'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰A级', 'B奔驰A级'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰B级', 'B奔驰B级'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰CLS', 'B奔驰CLS'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰CL级', 'B奔驰CL级'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰C级', 'B奔驰C级'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰C级(进口)', 'B奔驰C级(进口)'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰E级', 'B奔驰E级'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰E级(进口)', 'B奔驰E级(进口)'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰GLK级', 'B奔驰GLK级'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰GL级', 'B奔驰GL级'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰G级', 'B奔驰G级'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰ML级', 'B奔驰ML级'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰R级', 'B奔驰R级'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰SLK', 'B奔驰SLK'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰SL级', 'B奔驰SL级'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔驰S级', 'B奔驰S级'));
		document.getElementById('idcarbrandx').options.add(new Option('SSprinter', 'SSprinter'));
		document.getElementById('idcarbrandx').options.add(new Option('W威霆', 'W威霆'));
		document.getElementById('idcarbrandx').options.add(new Option('W唯雅诺', 'W唯雅诺'));
		document.getElementById('idcarbrandx').options.add(new Option('W唯雅诺(进口)', 'W唯雅诺(进口)'));
	}
	else if (num == 'B奔腾')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('B奔腾B50', 'B奔腾B50'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔腾B70', 'B奔腾B70'));
	}
	else if (num == 'B本田')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('A奥德赛', 'A奥德赛'));
		document.getElementById('idcarbrandx').options.add(new Option('B本田CR-V', 'B本田CR-V'));
		document.getElementById('idcarbrandx').options.add(new Option('F飞度', 'F飞度'));
		document.getElementById('idcarbrandx').options.add(new Option('F锋范', 'F锋范'));
		document.getElementById('idcarbrandx').options.add(new Option('G歌诗图', 'G歌诗图'));
		document.getElementById('idcarbrandx').options.add(new Option('S思铂睿', 'S思铂睿'));
		document.getElementById('idcarbrandx').options.add(new Option('S思域', 'S思域'));
		document.getElementById('idcarbrandx').options.add(new Option('Y雅阁', 'Y雅阁'));
	}
	else if (num == 'B比亚迪')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('B比亚迪F0', 'B比亚迪F0'));
		document.getElementById('idcarbrandx').options.add(new Option('B比亚迪F3', 'B比亚迪F3'));
		document.getElementById('idcarbrandx').options.add(new Option('B比亚迪F3R', 'B比亚迪F3R'));
		document.getElementById('idcarbrandx').options.add(new Option('B比亚迪F6', 'B比亚迪F6'));
		document.getElementById('idcarbrandx').options.add(new Option('B比亚迪G3', 'B比亚迪G3'));
		document.getElementById('idcarbrandx').options.add(new Option('B比亚迪L3', 'B比亚迪L3'));
		document.getElementById('idcarbrandx').options.add(new Option('B比亚迪M6', 'B比亚迪M6'));
		document.getElementById('idcarbrandx').options.add(new Option('B比亚迪S8', 'B比亚迪S8'));
	}
	else if (num == 'B标致')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('B标致207', 'B标致207'));
		document.getElementById('idcarbrandx').options.add(new Option('B标致207(进口)', 'B标致207(进口)'));
		document.getElementById('idcarbrandx').options.add(new Option('B标致3008', 'B标致3008'));
		document.getElementById('idcarbrandx').options.add(new Option('B标致307', 'B标致307'));
		document.getElementById('idcarbrandx').options.add(new Option('B标致308(进口)', 'B标致308(进口)'));
		document.getElementById('idcarbrandx').options.add(new Option('B标致407', 'B标致407'));
		document.getElementById('idcarbrandx').options.add(new Option('B标致408', 'B标致408'));
		document.getElementById('idcarbrandx').options.add(new Option('B标致607', 'B标致607'));
	}
	else if (num == 'B别克')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('A昂科雷', 'A昂科雷'));
		document.getElementById('idcarbrandx').options.add(new Option('B别克GL8', 'B别克GL8'));
		document.getElementById('idcarbrandx').options.add(new Option('J君威', 'J君威'));
		document.getElementById('idcarbrandx').options.add(new Option('J君越', 'J君越'));
		document.getElementById('idcarbrandx').options.add(new Option('K凯越', 'K凯越'));
		document.getElementById('idcarbrandx').options.add(new Option('L林荫大道', 'L林荫大道'));
		document.getElementById('idcarbrandx').options.add(new Option('Y英朗', 'Y英朗'));
	}
	else if (num == 'B宾利')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('M慕尚', 'M慕尚'));
		document.getElementById('idcarbrandx').options.add(new Option('O欧陆', 'O欧陆'));
		document.getElementById('idcarbrandx').options.add(new Option('Y雅致', 'Y雅致'));
	}
	else if (num == 'B布嘉迪')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('W威航', 'W威航'));
	}
	else if (num == 'C昌河')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('A爱迪尔', 'A爱迪尔'));
	}
	else if (num == 'C长安')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('B奔奔i', 'B奔奔i'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔奔LOVE', 'B奔奔LOVE'));
		document.getElementById('idcarbrandx').options.add(new Option('B奔奔MINI', 'B奔奔MINI'));
		document.getElementById('idcarbrandx').options.add(new Option('C长安CX20', 'C长安CX20'));
		document.getElementById('idcarbrandx').options.add(new Option('C长安CX30', 'C长安CX30'));
		document.getElementById('idcarbrandx').options.add(new Option('J杰勋', 'J杰勋'));
		document.getElementById('idcarbrandx').options.add(new Option('Y悦翔', 'Y悦翔'));
		document.getElementById('idcarbrandx').options.add(new Option('Z志翔', 'Z志翔'));
	}
	else if (num == 'C长城')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('C长城精灵', 'C长城精灵'));
		document.getElementById('idcarbrandx').options.add(new Option('H哈弗H3', 'H哈弗H3'));
		document.getElementById('idcarbrandx').options.add(new Option('H哈弗H5', 'H哈弗H5'));
		document.getElementById('idcarbrandx').options.add(new Option('H哈弗M1', 'H哈弗M1'));
		document.getElementById('idcarbrandx').options.add(new Option('H哈弗M2', 'H哈弗M2'));
		document.getElementById('idcarbrandx').options.add(new Option('J嘉誉', 'J嘉誉'));
		document.getElementById('idcarbrandx').options.add(new Option('K酷熊', 'K酷熊'));
		document.getElementById('idcarbrandx').options.add(new Option('L凌傲', 'L凌傲'));
		document.getElementById('idcarbrandx').options.add(new Option('T腾翼C30', 'T腾翼C30'));
		document.getElementById('idcarbrandx').options.add(new Option('T腾翼V80', 'T腾翼V80'));
		document.getElementById('idcarbrandx').options.add(new Option('X炫丽', 'X炫丽'));
	}
	else if (num == 'C长丰')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('L猎豹CS6', 'L猎豹CS6'));
		document.getElementById('idcarbrandx').options.add(new Option('L猎豹飞腾', 'L猎豹飞腾'));
		document.getElementById('idcarbrandx').options.add(new Option('L猎豹黑金刚', 'L猎豹黑金刚'));
		document.getElementById('idcarbrandx').options.add(new Option('L猎豹奇兵', 'L猎豹奇兵'));
		document.getElementById('idcarbrandx').options.add(new Option('P帕杰罗', 'P帕杰罗'));
	}
	else if (num == 'C川汽野马')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('Y野马F99', 'Y野马F99'));
	}
	else if (num == 'D大众')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('B宝来', 'B宝来'));
		document.getElementById('idcarbrandx').options.add(new Option('D大众CC', 'D大众CC'));
		document.getElementById('idcarbrandx').options.add(new Option('D大众EOS', 'D大众EOS'));
		document.getElementById('idcarbrandx').options.add(new Option('G高尔夫', 'G高尔夫'));
		document.getElementById('idcarbrandx').options.add(new Option('H辉腾', 'H辉腾'));
		document.getElementById('idcarbrandx').options.add(new Option('J甲壳虫', 'J甲壳虫'));
		document.getElementById('idcarbrandx').options.add(new Option('J捷达', 'J捷达'));
		document.getElementById('idcarbrandx').options.add(new Option('L朗逸', 'L朗逸'));
		document.getElementById('idcarbrandx').options.add(new Option('MMultivan', 'MMultivan'));
		document.getElementById('idcarbrandx').options.add(new Option('M迈腾', 'M迈腾'));
		document.getElementById('idcarbrandx').options.add(new Option('PPASSAT', 'PPASSAT'));
		document.getElementById('idcarbrandx').options.add(new Option('PPASSAT新领驭', 'PPASSAT新领驭'));
		document.getElementById('idcarbrandx').options.add(new Option('PPOLO', 'PPOLO'));
		document.getElementById('idcarbrandx').options.add(new Option('SScirocco尚酷', 'SScirocco尚酷'));
		document.getElementById('idcarbrandx').options.add(new Option('S桑塔纳', 'S桑塔纳'));
		document.getElementById('idcarbrandx').options.add(new Option('S桑塔纳志俊', 'S桑塔纳志俊'));
		document.getElementById('idcarbrandx').options.add(new Option('S速腾', 'S速腾'));
		document.getElementById('idcarbrandx').options.add(new Option('TTiguan', 'TTiguan'));
		document.getElementById('idcarbrandx').options.add(new Option('T途安', 'T途安'));
		document.getElementById('idcarbrandx').options.add(new Option('T途观', 'T途观'));
		document.getElementById('idcarbrandx').options.add(new Option('T途锐', 'T途锐'));
		document.getElementById('idcarbrandx').options.add(new Option('Y一汽-大众CC', 'Y一汽-大众CC'));
	}
	else if (num == 'D道奇')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('K凯领', 'K凯领'));
		document.getElementById('idcarbrandx').options.add(new Option('K酷搏', 'K酷搏'));
		document.getElementById('idcarbrandx').options.add(new Option('K酷威', 'K酷威'));
	}
	else if (num == 'D帝豪')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('D帝豪EC7', 'D帝豪EC7'));
		document.getElementById('idcarbrandx').options.add(new Option('D帝豪EC7-RV', 'D帝豪EC7-RV'));
		document.getElementById('idcarbrandx').options.add(new Option('D帝豪EC8', 'D帝豪EC8'));
	}
	else if (num == 'D东风')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('A奥丁', 'A奥丁'));
		document.getElementById('idcarbrandx').options.add(new Option('J景逸', 'J景逸'));
		document.getElementById('idcarbrandx').options.add(new Option('L菱智', 'L菱智'));
		document.getElementById('idcarbrandx').options.add(new Option('S帅客', 'S帅客'));
		document.getElementById('idcarbrandx').options.add(new Option('Y御轩', 'Y御轩'));
	}
	else if (num == 'D东风风神')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('F风神H30', 'F风神H30'));
		document.getElementById('idcarbrandx').options.add(new Option('F风神S30', 'F风神S30'));
	}
	else if (num == 'D东南')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('VV3菱悦', 'VV3菱悦'));
		document.getElementById('idcarbrandx').options.add(new Option('X希旺', 'X希旺'));
	}
	else if (num == 'F法拉利')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('4458Italia', '4458Italia'));
		document.getElementById('idcarbrandx').options.add(new Option('CCalifornia', 'CCalifornia'));
		document.getElementById('idcarbrandx').options.add(new Option('F法拉利599', 'F法拉利599'));
		document.getElementById('idcarbrandx').options.add(new Option('F法拉利612', 'F法拉利612'));
	}
	else if (num == 'F菲亚特')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('B博悦', 'B博悦'));
		document.getElementById('idcarbrandx').options.add(new Option('L领雅', 'L领雅'));
		document.getElementById('idcarbrandx').options.add(new Option('P朋多', 'P朋多'));
	}
	else if (num == 'F丰田')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('A埃尔法', 'A埃尔法'));
		document.getElementById('idcarbrandx').options.add(new Option('FFJ酷路泽', 'FFJ酷路泽'));
		document.getElementById('idcarbrandx').options.add(new Option('F丰田RAV4', 'F丰田RAV4'));
		document.getElementById('idcarbrandx').options.add(new Option('H汉兰达', 'H汉兰达'));
		document.getElementById('idcarbrandx').options.add(new Option('H红杉', 'H红杉'));
		document.getElementById('idcarbrandx').options.add(new Option('H花冠', 'H花冠'));
		document.getElementById('idcarbrandx').options.add(new Option('H皇冠', 'H皇冠'));
		document.getElementById('idcarbrandx').options.add(new Option('K卡罗拉', 'K卡罗拉'));
		document.getElementById('idcarbrandx').options.add(new Option('K凯美瑞', 'K凯美瑞'));
		document.getElementById('idcarbrandx').options.add(new Option('L兰德酷路泽', 'L兰德酷路泽'));
		document.getElementById('idcarbrandx').options.add(new Option('P普拉多', 'P普拉多'));
		document.getElementById('idcarbrandx').options.add(new Option('P普拉多(进口)', 'P普拉多(进口)'));
		document.getElementById('idcarbrandx').options.add(new Option('P普锐斯', 'P普锐斯'));
		document.getElementById('idcarbrandx').options.add(new Option('P普瑞维亚', 'P普瑞维亚'));
		document.getElementById('idcarbrandx').options.add(new Option('R锐志', 'R锐志'));
		document.getElementById('idcarbrandx').options.add(new Option('W威驰', 'W威驰'));
		document.getElementById('idcarbrandx').options.add(new Option('Y雅力士', 'Y雅力士'));
		document.getElementById('idcarbrandx').options.add(new Option('ZZELAS杰路驰', 'ZZELAS杰路驰'));
	}
	else if (num == 'F福特')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('F福克斯', 'F福克斯'));
		document.getElementById('idcarbrandx').options.add(new Option('J嘉年华', 'J嘉年华'));
		document.getElementById('idcarbrandx').options.add(new Option('M麦柯斯', 'M麦柯斯'));
		document.getElementById('idcarbrandx').options.add(new Option('M蒙迪欧-致胜', 'M蒙迪欧-致胜'));
		document.getElementById('idcarbrandx').options.add(new Option('R锐界', 'R锐界'));
	}
	else if (num == 'F福田')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('M蒙派克', 'M蒙派克'));
		document.getElementById('idcarbrandx').options.add(new Option('M迷迪', 'M迷迪'));
	}
	else if (num == 'GGMC')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('SSavana', 'SSavana'));
	}
	else if (num == 'G广汽')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('C传祺', 'C传祺'));
	}
	else if (num == 'H哈飞')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('L路宝', 'L路宝'));
		document.getElementById('idcarbrandx').options.add(new Option('L路尊大霸王', 'L路尊大霸王'));
		document.getElementById('idcarbrandx').options.add(new Option('S赛豹III', 'S赛豹III'));
		document.getElementById('idcarbrandx').options.add(new Option('S赛马', 'S赛马'));
	}
	else if (num == 'H海马')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('F福美来', 'F福美来'));
		document.getElementById('idcarbrandx').options.add(new Option('H海福星', 'H海福星'));
		document.getElementById('idcarbrandx').options.add(new Option('H海马3', 'H海马3'));
		document.getElementById('idcarbrandx').options.add(new Option('H海马骑士', 'H海马骑士'));
		document.getElementById('idcarbrandx').options.add(new Option('H海马王子', 'H海马王子'));
		document.getElementById('idcarbrandx').options.add(new Option('H欢动', 'H欢动'));
		document.getElementById('idcarbrandx').options.add(new Option('P普力马', 'P普力马'));
		document.getElementById('idcarbrandx').options.add(new Option('Q丘比特', 'Q丘比特'));
	}
	else if (num == 'H悍马')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('H悍马H2', 'H悍马H2'));
		document.getElementById('idcarbrandx').options.add(new Option('H悍马H3', 'H悍马H3'));
	}
	else if (num == 'H红旗')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('H红旗盛世', 'H红旗盛世'));
	}
	else if (num == 'H华泰')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('H华泰B11', 'H华泰B11'));
		document.getElementById('idcarbrandx').options.add(new Option('S圣达菲', 'S圣达菲'));
		document.getElementById('idcarbrandx').options.add(new Option('T特拉卡', 'T特拉卡'));
	}
	else if (num == 'H黄海')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('A翱龙CUV', 'A翱龙CUV'));
		document.getElementById('idcarbrandx').options.add(new Option('Q旗胜CUV', 'Q旗胜CUV'));
		document.getElementById('idcarbrandx').options.add(new Option('T挑战者SUV', 'T挑战者SUV'));
	}
	else if (num == 'JJeep吉普')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('D大切诺基(进口)', 'D大切诺基(进口)'));
		document.getElementById('idcarbrandx').options.add(new Option('M牧马人', 'M牧马人'));
		document.getElementById('idcarbrandx').options.add(new Option('Z指挥官', 'Z指挥官'));
		document.getElementById('idcarbrandx').options.add(new Option('Z指南者', 'Z指南者'));
	}
	else if (num == 'J吉奥')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('A奥轩', 'A奥轩'));
		document.getElementById('idcarbrandx').options.add(new Option('S帅豹', 'S帅豹'));
		document.getElementById('idcarbrandx').options.add(new Option('S帅舰', 'S帅舰'));
	}
	else if (num == 'J吉利全球鹰')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('Q全球鹰GX2', 'Q全球鹰GX2'));
		document.getElementById('idcarbrandx').options.add(new Option('X熊猫', 'X熊猫'));
		document.getElementById('idcarbrandx').options.add(new Option('Y远景', 'Y远景'));
		document.getElementById('idcarbrandx').options.add(new Option('Z自由舰', 'Z自由舰'));
	}
	else if (num == 'J江淮')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('B宾悦', 'B宾悦'));
		document.getElementById('idcarbrandx').options.add(new Option('H和悦', 'H和悦'));
		document.getElementById('idcarbrandx').options.add(new Option('H和悦RS', 'H和悦RS'));
		document.getElementById('idcarbrandx').options.add(new Option('R瑞风', 'R瑞风'));
		document.getElementById('idcarbrandx').options.add(new Option('R瑞鹰', 'R瑞鹰'));
		document.getElementById('idcarbrandx').options.add(new Option('T同悦', 'T同悦'));
		document.getElementById('idcarbrandx').options.add(new Option('T同悦RS', 'T同悦RS'));
		document.getElementById('idcarbrandx').options.add(new Option('Y悦悦', 'Y悦悦'));
	}
	else if (num == 'J江铃')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('Y驭胜', 'Y驭胜'));
	}
	else if (num == 'J捷豹')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('J捷豹XF', 'J捷豹XF'));
		document.getElementById('idcarbrandx').options.add(new Option('J捷豹XJ', 'J捷豹XJ'));
		document.getElementById('idcarbrandx').options.add(new Option('J捷豹XK', 'J捷豹XK'));
	}
	else if (num == 'J金杯')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('G阁瑞斯', 'G阁瑞斯'));
	}
	else if (num == 'K开瑞')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('Y优派', 'Y优派'));
		document.getElementById('idcarbrandx').options.add(new Option('Y优胜', 'Y优胜'));
		document.getElementById('idcarbrandx').options.add(new Option('Y优雅', 'Y优雅'));
		document.getElementById('idcarbrandx').options.add(new Option('Y优优', 'Y优优'));
	}
	else if (num == 'K凯迪拉克')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('K凯迪拉克CTS(进口)', 'K凯迪拉克CTS(进口)'));
		document.getElementById('idcarbrandx').options.add(new Option('K凯迪拉克SRX', 'K凯迪拉克SRX'));
		document.getElementById('idcarbrandx').options.add(new Option('K凯迪拉克XLR', 'K凯迪拉克XLR'));
		document.getElementById('idcarbrandx').options.add(new Option('K凯雷德ESCALADE', 'K凯雷德ESCALADE'));
		document.getElementById('idcarbrandx').options.add(new Option('SSLS赛威', 'SSLS赛威'));
	}
	else if (num == 'K柯尼赛格')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('K柯尼赛格CCXR', 'K柯尼赛格CCXR'));
	}
	else if (num == 'K克莱斯勒')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('PPT漫步者', 'PPT漫步者'));
	}
	else if (num == 'L兰博基尼')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('GGallardo', 'GGallardo'));
		document.getElementById('idcarbrandx').options.add(new Option('RReventon', 'RReventon'));
	}
	else if (num == 'L劳斯莱斯')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('G古思特', 'G古思特'));
		document.getElementById('idcarbrandx').options.add(new Option('H幻影', 'H幻影'));
	}
	else if (num == 'L雷克萨斯')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('L雷克萨斯ES', 'L雷克萨斯ES'));
		document.getElementById('idcarbrandx').options.add(new Option('L雷克萨斯GS', 'L雷克萨斯GS'));
		document.getElementById('idcarbrandx').options.add(new Option('L雷克萨斯GX', 'L雷克萨斯GX'));
		document.getElementById('idcarbrandx').options.add(new Option('L雷克萨斯IS', 'L雷克萨斯IS'));
		document.getElementById('idcarbrandx').options.add(new Option('L雷克萨斯LS', 'L雷克萨斯LS'));
		document.getElementById('idcarbrandx').options.add(new Option('L雷克萨斯LX', 'L雷克萨斯LX'));
		document.getElementById('idcarbrandx').options.add(new Option('L雷克萨斯RX', 'L雷克萨斯RX'));
	}
	else if (num == 'L雷诺')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('F风景', 'F风景'));
		document.getElementById('idcarbrandx').options.add(new Option('K科雷傲', 'K科雷傲'));
		document.getElementById('idcarbrandx').options.add(new Option('L拉古那', 'L拉古那'));
	}
	else if (num == 'L力帆')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('L力帆320', 'L力帆320'));
		document.getElementById('idcarbrandx').options.add(new Option('L力帆520', 'L力帆520'));
		document.getElementById('idcarbrandx').options.add(new Option('L力帆620', 'L力帆620'));
	}
	else if (num == 'L莲花汽车')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('J竞速', 'J竞速'));
		document.getElementById('idcarbrandx').options.add(new Option('J竞悦', 'J竞悦'));
		document.getElementById('idcarbrandx').options.add(new Option('L莲花L3', 'L莲花L3'));
	}
	else if (num == 'L林肯')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('L林肯MKS', 'L林肯MKS'));
		document.getElementById('idcarbrandx').options.add(new Option('L林肯MKT', 'L林肯MKT'));
		document.getElementById('idcarbrandx').options.add(new Option('L林肯MKX', 'L林肯MKX'));
		document.getElementById('idcarbrandx').options.add(new Option('L林肯MKZ', 'L林肯MKZ'));
		document.getElementById('idcarbrandx').options.add(new Option('L领航员', 'L领航员'));
	}
	else if (num == 'L铃木')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('A奥拓', 'A奥拓'));
		document.getElementById('idcarbrandx').options.add(new Option('B北斗星', 'B北斗星'));
		document.getElementById('idcarbrandx').options.add(new Option('C超级维特拉', 'C超级维特拉'));
		document.getElementById('idcarbrandx').options.add(new Option('J吉姆尼', 'J吉姆尼'));
		document.getElementById('idcarbrandx').options.add(new Option('K凯泽西', 'K凯泽西'));
		document.getElementById('idcarbrandx').options.add(new Option('L浪迪', 'L浪迪'));
		document.getElementById('idcarbrandx').options.add(new Option('L利亚纳', 'L利亚纳'));
		document.getElementById('idcarbrandx').options.add(new Option('L羚羊', 'L羚羊'));
		document.getElementById('idcarbrandx').options.add(new Option('T天语SX4', 'T天语SX4'));
		document.getElementById('idcarbrandx').options.add(new Option('T天语·尚悦', 'T天语·尚悦'));
		document.getElementById('idcarbrandx').options.add(new Option('Y雨燕', 'Y雨燕'));
	}
	else if (num == 'L陆风')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('F风尚', 'F风尚'));
		document.getElementById('idcarbrandx').options.add(new Option('L陆风X6', 'L陆风X6'));
		document.getElementById('idcarbrandx').options.add(new Option('L陆风X8', 'L陆风X8'));
		document.getElementById('idcarbrandx').options.add(new Option('L陆风X9', 'L陆风X9'));
	}
	else if (num == 'L路虎')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('D第四代发现', 'D第四代发现'));
		document.getElementById('idcarbrandx').options.add(new Option('L揽胜', 'L揽胜'));
		document.getElementById('idcarbrandx').options.add(new Option('L揽胜运动版', 'L揽胜运动版'));
		document.getElementById('idcarbrandx').options.add(new Option('S神行者2', 'S神行者2'));
		document.getElementById('idcarbrandx').options.add(new Option('W卫士', 'W卫士'));
	}
	else if (num == 'MMG')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('MMG3', 'MMG3'));
		document.getElementById('idcarbrandx').options.add(new Option('MMG3SW', 'MMG3SW'));
		document.getElementById('idcarbrandx').options.add(new Option('MMG6', 'MMG6'));
		document.getElementById('idcarbrandx').options.add(new Option('MMG7', 'MMG7'));
		document.getElementById('idcarbrandx').options.add(new Option('MMGTF', 'MMGTF'));
	}
	else if (num == 'MMINI')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('MMINI', 'MMINI'));
		document.getElementById('idcarbrandx').options.add(new Option('MMINICLUBMAN', 'MMINICLUBMAN'));
		document.getElementById('idcarbrandx').options.add(new Option('MMINICOUNTRYMAN', 'MMINICOUNTRYMAN'));
	}
	else if (num == 'M马自达')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('M马自达2', 'M马自达2'));
		document.getElementById('idcarbrandx').options.add(new Option('M马自达2劲翔', 'M马自达2劲翔'));
		document.getElementById('idcarbrandx').options.add(new Option('M马自达3', 'M马自达3'));
		document.getElementById('idcarbrandx').options.add(new Option('M马自达3(进口)', 'M马自达3(进口)'));
		document.getElementById('idcarbrandx').options.add(new Option('M马自达5', 'M马自达5'));
		document.getElementById('idcarbrandx').options.add(new Option('M马自达6', 'M马自达6'));
		document.getElementById('idcarbrandx').options.add(new Option('M马自达8', 'M马自达8'));
		document.getElementById('idcarbrandx').options.add(new Option('M马自达CX-7', 'M马自达CX-7'));
		document.getElementById('idcarbrandx').options.add(new Option('M马自达MX-5', 'M马自达MX-5'));
		document.getElementById('idcarbrandx').options.add(new Option('R睿翼', 'R睿翼'));
	}
	else if (num == 'M玛莎拉蒂')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('GGranCabrio', 'GGranCabrio'));
		document.getElementById('idcarbrandx').options.add(new Option('GGranTurismo', 'GGranTurismo'));
		document.getElementById('idcarbrandx').options.add(new Option('Z总裁', 'Z总裁'));
	}
	else if (num == 'M迈巴赫')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('M迈巴赫', 'M迈巴赫'));
	}
	else if (num == 'O讴歌')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('O讴歌MDX', 'O讴歌MDX'));
		document.getElementById('idcarbrandx').options.add(new Option('O讴歌RL', 'O讴歌RL'));
		document.getElementById('idcarbrandx').options.add(new Option('O讴歌TL', 'O讴歌TL'));
	}
	else if (num == 'O欧宝')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('A安德拉', 'A安德拉'));
		document.getElementById('idcarbrandx').options.add(new Option('S赛飞利', 'S赛飞利'));
		document.getElementById('idcarbrandx').options.add(new Option('W威达', 'W威达'));
		document.getElementById('idcarbrandx').options.add(new Option('Y雅特', 'Y雅特'));
	}
	else if (num == 'Q奇瑞')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('D东方之子', 'D东方之子'));
		document.getElementById('idcarbrandx').options.add(new Option('F风云2', 'F风云2'));
		document.getElementById('idcarbrandx').options.add(new Option('Q奇瑞A1', 'Q奇瑞A1'));
		document.getElementById('idcarbrandx').options.add(new Option('Q奇瑞A3', 'Q奇瑞A3'));
		document.getElementById('idcarbrandx').options.add(new Option('Q奇瑞A5', 'Q奇瑞A5'));
		document.getElementById('idcarbrandx').options.add(new Option('Q奇瑞QQ3', 'Q奇瑞QQ3'));
		document.getElementById('idcarbrandx').options.add(new Option('Q奇瑞QQ6', 'Q奇瑞QQ6'));
		document.getElementById('idcarbrandx').options.add(new Option('Q奇瑞QQme', 'Q奇瑞QQme'));
		document.getElementById('idcarbrandx').options.add(new Option('Q旗云1', 'Q旗云1'));
		document.getElementById('idcarbrandx').options.add(new Option('Q旗云2', 'Q旗云2'));
		document.getElementById('idcarbrandx').options.add(new Option('Q旗云3', 'Q旗云3'));
		document.getElementById('idcarbrandx').options.add(new Option('R瑞虎', 'R瑞虎'));
	}
	else if (num == 'Q起亚')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('B霸锐', 'B霸锐'));
		document.getElementById('idcarbrandx').options.add(new Option('F福瑞迪', 'F福瑞迪'));
		document.getElementById('idcarbrandx').options.add(new Option('J嘉华', 'J嘉华'));
		document.getElementById('idcarbrandx').options.add(new Option('K凯尊', 'K凯尊'));
		document.getElementById('idcarbrandx').options.add(new Option('Q起亚K5', 'Q起亚K5'));
		document.getElementById('idcarbrandx').options.add(new Option('Q起亚VQ', 'Q起亚VQ'));
		document.getElementById('idcarbrandx').options.add(new Option('RRIO锐欧', 'RRIO锐欧'));
		document.getElementById('idcarbrandx').options.add(new Option('S赛拉图', 'S赛拉图'));
		document.getElementById('idcarbrandx').options.add(new Option('S狮跑', 'S狮跑'));
		document.getElementById('idcarbrandx').options.add(new Option('S速迈', 'S速迈'));
		document.getElementById('idcarbrandx').options.add(new Option('S索兰托', 'S索兰托'));
		document.getElementById('idcarbrandx').options.add(new Option('X新佳乐', 'X新佳乐'));
		document.getElementById('idcarbrandx').options.add(new Option('X秀尔', 'X秀尔'));
		document.getElementById('idcarbrandx').options.add(new Option('Y远舰', 'Y远舰'));
		document.getElementById('idcarbrandx').options.add(new Option('Z智跑', 'Z智跑'));
	}
	else if (num == 'R日产')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('L骊威', 'L骊威'));
		document.getElementById('idcarbrandx').options.add(new Option('M玛驰', 'M玛驰'));
		document.getElementById('idcarbrandx').options.add(new Option('P帕拉丁', 'P帕拉丁'));
		document.getElementById('idcarbrandx').options.add(new Option('Q奇骏', 'Q奇骏'));
		document.getElementById('idcarbrandx').options.add(new Option('Q骐达', 'Q骐达'));
		document.getElementById('idcarbrandx').options.add(new Option('R日产GT-R', 'R日产GT-R'));
		document.getElementById('idcarbrandx').options.add(new Option('R日产NV200', 'R日产NV200'));
		document.getElementById('idcarbrandx').options.add(new Option('T天籁', 'T天籁'));
		document.getElementById('idcarbrandx').options.add(new Option('X逍客', 'X逍客'));
		document.getElementById('idcarbrandx').options.add(new Option('X轩逸', 'X轩逸'));
		document.getElementById('idcarbrandx').options.add(new Option('Y阳光', 'Y阳光'));
		document.getElementById('idcarbrandx').options.add(new Option('Y颐达', 'Y颐达'));
	}
	else if (num == 'R荣威')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('R荣威350', 'R荣威350'));
		document.getElementById('idcarbrandx').options.add(new Option('R荣威550', 'R荣威550'));
		document.getElementById('idcarbrandx').options.add(new Option('R荣威750', 'R荣威750'));
	}
	else if (num == 'R瑞麒')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('R瑞麒G5', 'R瑞麒G5'));
		document.getElementById('idcarbrandx').options.add(new Option('R瑞麒M1', 'R瑞麒M1'));
		document.getElementById('idcarbrandx').options.add(new Option('R瑞麒M5', 'R瑞麒M5'));
		document.getElementById('idcarbrandx').options.add(new Option('R瑞麒X1', 'R瑞麒X1'));
	}
	else if (num == 'Ssmart')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('ssmartfortwo', 'ssmartfortwo'));
	}
	else if (num == 'S三菱')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('AASX劲炫', 'AASX劲炫'));
		document.getElementById('idcarbrandx').options.add(new Option('G戈蓝', 'G戈蓝'));
		document.getElementById('idcarbrandx').options.add(new Option('G格蓝迪', 'G格蓝迪'));
		document.getElementById('idcarbrandx').options.add(new Option('J君阁', 'J君阁'));
		document.getElementById('idcarbrandx').options.add(new Option('LLANCER', 'LLANCER'));
		document.getElementById('idcarbrandx').options.add(new Option('L蓝瑟', 'L蓝瑟'));
		document.getElementById('idcarbrandx').options.add(new Option('OOUTLANDEREX', 'OOUTLANDEREX'));
		document.getElementById('idcarbrandx').options.add(new Option('P帕杰罗(进口)', 'P帕杰罗(进口)'));
		document.getElementById('idcarbrandx').options.add(new Option('S三菱翼神', 'S三菱翼神'));
	}
	else if (num == 'S世爵')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('S世爵C8', 'S世爵C8'));
	}
	else if (num == 'S双环')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('S双环SCEO', 'S双环SCEO'));
		document.getElementById('idcarbrandx').options.add(new Option('X小贵族', 'X小贵族'));
	}
	else if (num == 'S双龙')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('A爱腾', 'A爱腾'));
		document.getElementById('idcarbrandx').options.add(new Option('L雷斯特Ⅱ', 'L雷斯特Ⅱ'));
		document.getElementById('idcarbrandx').options.add(new Option('L路帝', 'L路帝'));
		document.getElementById('idcarbrandx').options.add(new Option('X享御', 'X享御'));
	}
	else if (num == 'S斯巴鲁')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('A傲虎', 'A傲虎'));
		document.getElementById('idcarbrandx').options.add(new Option('C驰鹏', 'C驰鹏'));
		document.getElementById('idcarbrandx').options.add(new Option('L力狮', 'L力狮'));
		document.getElementById('idcarbrandx').options.add(new Option('S森林人', 'S森林人'));
		document.getElementById('idcarbrandx').options.add(new Option('Y翼豹', 'Y翼豹'));
	}
	else if (num == 'S斯柯达')
	
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('H昊锐', 'H昊锐'));
		document.getElementById('idcarbrandx').options.add(new Option('J晶锐', 'J晶锐'));
		document.getElementById('idcarbrandx').options.add(new Option('M明锐', 'M明锐'));
	}
	else if (num == 'W威麟')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('W威麟H3', 'W威麟H3'));
		document.getElementById('idcarbrandx').options.add(new Option('W威麟H5', 'W威麟H5'));
		document.getElementById('idcarbrandx').options.add(new Option('W威麟V5', 'W威麟V5'));
		document.getElementById('idcarbrandx').options.add(new Option('W威麟X5', 'W威麟X5'));
	}
	else if (num == 'W威兹曼')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('W威兹曼GT', 'W威兹曼GT'));
	}
	else if (num == 'W沃尔沃')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('W沃尔沃C30', 'W沃尔沃C30'));
		document.getElementById('idcarbrandx').options.add(new Option('W沃尔沃C70', 'W沃尔沃C70'));
		document.getElementById('idcarbrandx').options.add(new Option('W沃尔沃S40', 'W沃尔沃S40'));
		document.getElementById('idcarbrandx').options.add(new Option('W沃尔沃S60', 'W沃尔沃S60'));
		document.getElementById('idcarbrandx').options.add(new Option('W沃尔沃S80L', 'W沃尔沃S80L'));
		document.getElementById('idcarbrandx').options.add(new Option('W沃尔沃XC60', 'W沃尔沃XC60'));
		document.getElementById('idcarbrandx').options.add(new Option('W沃尔沃XC90', 'W沃尔沃XC90'));
	}
	else if (num == 'W五菱汽车')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('W五菱宏光', 'W五菱宏光'));
	}
	else if (num == 'X夏利')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('X夏利', 'X夏利'));
	}
	else if (num == 'X现代')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('HH-1辉翼', 'HH-1辉翼'));
		document.getElementById('idcarbrandx').options.add(new Option('L劳恩斯', 'L劳恩斯'));
		document.getElementById('idcarbrandx').options.add(new Option('L劳恩斯-酷派', 'L劳恩斯-酷派'));
		document.getElementById('idcarbrandx').options.add(new Option('MMOINCA名驭', 'MMOINCA名驭'));
		document.getElementById('idcarbrandx').options.add(new Option('R瑞纳', 'R瑞纳'));
		document.getElementById('idcarbrandx').options.add(new Option('SSONATA·领翔', 'SSONATA·领翔'));
		document.getElementById('idcarbrandx').options.add(new Option('T途胜', 'T途胜'));
		document.getElementById('idcarbrandx').options.add(new Option('W维拉克斯', 'W维拉克斯'));
		document.getElementById('idcarbrandx').options.add(new Option('X现代i30', 'X现代i30'));
		document.getElementById('idcarbrandx').options.add(new Option('X现代ix35', 'X现代ix35'));
		document.getElementById('idcarbrandx').options.add(new Option('X新胜达', 'X新胜达'));
		document.getElementById('idcarbrandx').options.add(new Option('Y雅科仕', 'Y雅科仕'));
		document.getElementById('idcarbrandx').options.add(new Option('Y雅绅特', 'Y雅绅特'));
		document.getElementById('idcarbrandx').options.add(new Option('Y雅尊', 'Y雅尊'));
		document.getElementById('idcarbrandx').options.add(new Option('Y伊兰特', 'Y伊兰特'));
		document.getElementById('idcarbrandx').options.add(new Option('Y悦动', 'Y悦动'));
	}
	else if (num == 'X雪佛兰')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('J景程', 'J景程'));
		document.getElementById('idcarbrandx').options.add(new Option('K科鲁兹', 'K科鲁兹'));
		document.getElementById('idcarbrandx').options.add(new Option('K科帕奇', 'K科帕奇'));
		document.getElementById('idcarbrandx').options.add(new Option('L乐骋', 'L乐骋'));
		document.getElementById('idcarbrandx').options.add(new Option('L乐驰', 'L乐驰'));
		document.getElementById('idcarbrandx').options.add(new Option('L乐风', 'L乐风'));
		document.getElementById('idcarbrandx').options.add(new Option('S赛欧', 'S赛欧'));
		document.getElementById('idcarbrandx').options.add(new Option('S斯帕可SPARK', 'S斯帕可SPARK'));
	}
	else if (num == 'X雪铁龙')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('A爱丽舍', 'A爱丽舍'));
		document.getElementById('idcarbrandx').options.add(new Option('B毕加索', 'B毕加索'));
		document.getElementById('idcarbrandx').options.add(new Option('D大C4毕加索', 'D大C4毕加索'));
		document.getElementById('idcarbrandx').options.add(new Option('K凯旋', 'K凯旋'));
		document.getElementById('idcarbrandx').options.add(new Option('S世嘉', 'S世嘉'));
		document.getElementById('idcarbrandx').options.add(new Option('X雪铁龙C2', 'X雪铁龙C2'));
		document.getElementById('idcarbrandx').options.add(new Option('X雪铁龙C4', 'X雪铁龙C4'));
		document.getElementById('idcarbrandx').options.add(new Option('X雪铁龙C5', 'X雪铁龙C5'));
	}
	else if (num == 'Y一汽')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('S森雅M80', 'S森雅M80'));
		document.getElementById('idcarbrandx').options.add(new Option('S森雅S80', 'S森雅S80'));
		document.getElementById('idcarbrandx').options.add(new Option('W威乐', 'W威乐'));
		document.getElementById('idcarbrandx').options.add(new Option('W威志', 'W威志'));
		document.getElementById('idcarbrandx').options.add(new Option('W威志V2', 'W威志V2'));
		document.getElementById('idcarbrandx').options.add(new Option('X夏利N5', 'X夏利N5'));
	}
	else if (num == 'Y英菲尼迪')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('Y英菲尼迪EX', 'Y英菲尼迪EX'));
		document.getElementById('idcarbrandx').options.add(new Option('Y英菲尼迪FX', 'Y英菲尼迪FX'));
		document.getElementById('idcarbrandx').options.add(new Option('Y英菲尼迪G系', 'Y英菲尼迪G系'));
		document.getElementById('idcarbrandx').options.add(new Option('Y英菲尼迪M系', 'Y英菲尼迪M系'));
		document.getElementById('idcarbrandx').options.add(new Option('Y英菲尼迪QX', 'Y英菲尼迪QX'));
	}
	else if (num == 'Y英伦')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('J金刚', 'J金刚'));
		document.getElementById('idcarbrandx').options.add(new Option('J金鹰', 'J金鹰'));
		document.getElementById('idcarbrandx').options.add(new Option('Y英伦SC5-RV', 'Y英伦SC5-RV'));
		document.getElementById('idcarbrandx').options.add(new Option('Y英伦SC7', 'Y英伦SC7'));
		document.getElementById('idcarbrandx').options.add(new Option('Y英伦TX4', 'Y英伦TX4'));
	}
	else if (num == 'Y永源')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('F飞碟UFO', 'F飞碟UFO'));
	}
	else if (num == 'Z中华')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('Z中华骏捷', 'Z中华骏捷'));
		document.getElementById('idcarbrandx').options.add(new Option('Z中华骏捷Cross', 'Z中华骏捷Cross'));
		document.getElementById('idcarbrandx').options.add(new Option('Z中华骏捷FRV', 'Z中华骏捷FRV'));
		document.getElementById('idcarbrandx').options.add(new Option('Z中华骏捷FSV', 'Z中华骏捷FSV'));
		document.getElementById('idcarbrandx').options.add(new Option('Z中华酷宝', 'Z中华酷宝'));
		document.getElementById('idcarbrandx').options.add(new Option('Z中华尊驰', 'Z中华尊驰'));
	}
	else if (num == 'Z中兴')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('W无限V5', 'W无限V5'));
		document.getElementById('idcarbrandx').options.add(new Option('W无限V7', 'W无限V7'));
	}
	else if (num == 'Z众泰')
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('J江南奥拓', 'J江南奥拓'));
		document.getElementById('idcarbrandx').options.add(new Option('L朗悦', 'L朗悦'));
		document.getElementById('idcarbrandx').options.add(new Option('Z众泰2008', 'Z众泰2008'));
		document.getElementById('idcarbrandx').options.add(new Option('Z众泰5008/乐睿', 'Z众泰5008/乐睿'));
	}
	else if (num == "q其他")
	{
		document.getElementById("idothercarbrand").innerHTML="<input class=\"inputtext\" type=\"text\" name=\"carbrandother\" id=\"idcarbrandother\" size=\"20\" />&nbsp;";
		
        document.getElementById('idcarbrandx').options.add(new Option('Q其他', 'Q其他'));
		document.getElementById("idothercarbrandx").innerHTML="<input class=\"inputtext\" type=\"text\" name=\"carbrandxother\" id=\"idcarbrandxother\" size=\"20\" />&nbsp;";
	}
	else
	{
		
		document.getElementById('idcarbrandx').options.add(new Option('请选择', '请选择'));
	}
}
function checkcarcolor()
{
	var num = document.getElementById("idcarcolor").value;
	if (num == "其他")
	{
		document.getElementById("idothercarcolor").innerHTML="<input class=\"inputtext\" type=\"text\" name=\"carcolorother\" id=\"idcarcolorother\" size=\"20\" />&nbsp;";
	}
	else
	{
		document.getElementById("idothercarcolor").innerHTML="";
	}
}
function checkapplyform()
{
	if (applytype == "北航学生为本人申请")
	{
		if (mytrim(document.getElementById('idapplicant').value) == "")
		{
			alert("请填写 学生姓名");
			document.getElementById('idapplicant').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idpid').value) == "")
		{
			alert("请填写 学生证号");
			document.getElementById('idpid').focus();
			return false;
		}
		else if (mytrim(document.getElementById('ididcard').value) == "")
		{
			alert("请填写 身份证件号");
			document.getElementById('ididcard').focus();
			return false;
		}
		else if (document.getElementById('idcompany').value == "请选择")
		{
			alert("请选择 学院(单位)");
			document.getElementById('idcompany').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcompany').value) == "其他" && mytrim(document.getElementById('idcompanyother').value) == "")
		{
			alert("请填写 学院(单位)");
			document.getElementById('idcompanyother').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idaddress').value) == "")
		{
			alert("请填写 居住地址");
			document.getElementById('idaddress').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmobile').value) == "" || check_phone_num(mytrim(document.getElementById('idmobile').value)) != 0 || mytrim(document.getElementById('idmobile').value).length < 11)
		{
			alert("请正确填写 手机号码(只能填数字 '+' '-')");
			document.getElementById('idmobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone1').value) != "" && check_phone_num(mytrim(document.getElementById('idphone1').value)) != 0)
		{
			alert("请正确填写 宿舍(家庭)电话(只能填数字 '+' '-')");
			document.getElementById('idphone1').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone2').value) != "" && check_phone_num(mytrim(document.getElementById('idphone2').value)) != 0)
		{
			alert("请正确填写 实验室(学院)电话(只能填数字 '+' '-')");
			document.getElementById('idphone2').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idemail').value) == "" || check_email(mytrim(document.getElementById('idemail').value)) != 0)
		{
			alert("请填写 正确的电子邮箱");
			document.getElementById('idemail').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarowner').value) == "")
		{
			alert("请填写 车主姓名");
			document.getElementById('idcarowner').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "本人" && mytrim(document.getElementById('idcarowner').value) != mytrim(document.getElementById('idapplicant').value))
		{
			alert("学生姓名和车主姓名不一致，请确认学生与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "夫妻" && mytrim(document.getElementById('idcarowner').value) == mytrim(document.getElementById('idapplicant').value))
		{
			alert("学生姓名和车主姓名一致，请确认学生与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "其他")
		{
			carnum = mytrim(document.getElementById('idcarnum').value);
			tempurl = "AjaxServer.php?type=warning&carnum=" + carnum + "&info=" + encodeURIComponent("车主与使用申请人关系");
			$.get(tempurl);
			alert("对不起，车辆不是使用人名下财产，不符合申请条件");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarnum').value) == "" || mytrim(document.getElementById('idcarnum').value).length < 5)
		{
			alert("请正确填写 车牌号");
			document.getElementById('idcarnum').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "请选择")
		{
			alert("请选择 车辆类别");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "其他" || document.getElementById('idcartype').value == "货车")
		{
			carnum = mytrim(document.getElementById('idcarnum').value);
			tempurl = "AjaxServer.php?type=warning&carnum=" + carnum + "&info=" + encodeURIComponent("车辆类别");
			$.get(tempurl);
			alert("对不起，车辆类别不符合申请条件");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "请选择")
		{
			alert("请选择 车辆品牌");
			document.getElementById('idcarbrand').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "q其他" && mytrim(document.getElementById('idcarbrandother').value) == "")
		{
			alert("请填写 车辆品牌");
			document.getElementById('idcarbrandother').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "请选择")
		{
			alert("请选择 车系车型");
			document.getElementById('idcarbrandx').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "Q其他" && mytrim(document.getElementById('idcarbrandxother').value) == "")
		{
			alert("请填写 车系车型");
			document.getElementById('idcarbrandxother').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "请选择")
		{
			alert("请选择 车辆颜色");
			document.getElementById('idcarcolor').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "其他" && mytrim(document.getElementById('idcarcolorother').value) == "")
		{
			alert("请填写 车辆颜色");
			document.getElementById('idcarcolorother').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "请选择")
		{
			alert("请选择 车辆座位数");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "19座以上")
		{
			carnum = mytrim(document.getElementById('idcarnum').value);
			tempurl = "AjaxServer.php?type=warning&carnum=" + carnum + "&info=" + encodeURIComponent("核定载客数");
			$.get(tempurl);
			alert("对不起，车辆为大型车辆，不符合申请条件");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else
		{
			return true;
		}
	}
	else if(applytype == "北航教职工为本人申请")
	{
		if (mytrim(document.getElementById('idapplicant').value) == "")
		{
			alert("请填写 教职工姓名");
			document.getElementById('idapplicant').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idpid').value) == "")
		{
			temp = "请填写 " + document.getElementById('idteacherpidtitle').innerHTML;
			alert(temp);
			document.getElementById('idpid').focus();
			return false;
		}
		else if (mytrim(document.getElementById('ididcard').value) == "")
		{
			alert("请填写 身份证件号");
			document.getElementById('ididcard').focus();
			return false;
		}
		else if (document.getElementById('idcompany').value == "请选择")
		{
			alert("请选择 学院(单位)");
			document.getElementById('idcompany').focus();
			return false;
		}
		else if (document.getElementById('idcompany').value == "其他" && mytrim(document.getElementById('idcompanyother').value) == "")
		{
			alert("请填写 学院(单位)");
			document.getElementById('idcompanyother').focus();
			return false;
		}
		else if (document.getElementById('idteachertype').value == "事业编制" && mytrim(document.getElementById('idaddress').value) == "")
		{
			alert("请填写 居住地址");
			document.getElementById('idaddress').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmobile').value) == "" || check_phone_num(mytrim(document.getElementById('idmobile').value)) != 0 || mytrim(document.getElementById('idmobile').value).length < 11)
		{
			alert("请正确填写 手机号码(只能填数字 '+' '-')");
			document.getElementById('idmobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone1').value) != "" && check_phone_num(mytrim(document.getElementById('idphone1').value)) != 0)
		{
			alert("请正确填写 家庭电话(只能填数字 '+' '-')");
			document.getElementById('idphone1').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone2').value) == "" || check_phone_num(mytrim(document.getElementById('idphone2').value)) != 0 || mytrim(document.getElementById('idphone2').value).length < 4)
		{
			alert("请正确填写 学院(单位)电话(只能填数字 '+' '-')");
			document.getElementById('idphone2').focus();
			return false;
		}
		else if ((document.getElementById("idteachertype").value == "事业编制") && (mytrim(document.getElementById('idemail').value) == "" || check_email(mytrim(document.getElementById('idemail').value)) != 0))
		{
			alert("请正确填写 电子邮箱");
			document.getElementById('idemail').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarowner').value) == "")
		{
			alert("请填写 车主姓名");
			document.getElementById('idcarowner').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "本人" && mytrim(document.getElementById('idcarowner').value) != mytrim(document.getElementById('idapplicant').value))
		{
			alert("教职工姓名和车主姓名不一致，请确认教职工与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "夫妻" && mytrim(document.getElementById('idcarowner').value) == mytrim(document.getElementById('idapplicant').value))
		{
			alert("教职工姓名和车主姓名一致，请确认教职工与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "其他")
		{
			carnum = mytrim(document.getElementById('idcarnum').value);
			tempurl = "AjaxServer.php?type=warning&carnum=" + carnum + "&info=" + encodeURIComponent("车主与使用申请人关系");
			$.get(tempurl);
			alert("对不起，车辆不是使用人名下财产，不符合申请条件");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarnum').value) == "" || mytrim(document.getElementById('idcarnum').value).length < 5)
		{
			alert("请正确填写 车牌号");
			document.getElementById('idcarnum').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "请选择")
		{
			alert("请选择 车辆类别");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "其他" || document.getElementById('idcartype').value == "货车")
		{
			carnum = mytrim(document.getElementById('idcarnum').value);
			tempurl = "AjaxServer.php?type=warning&carnum=" + carnum + "&info=" + encodeURIComponent("车辆类别");
			$.get(tempurl);
			alert("对不起，车辆类别不符合申请条件");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "请选择")
		{
			alert("请选择 车辆品牌");
			document.getElementById('idcarbrand').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "q其他" && mytrim(document.getElementById('idcarbrandother').value) == "")
		{
			alert("请填写 车辆品牌");
			document.getElementById('idcarbrandother').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "请选择")
		{
			alert("请选择 车系车型");
			document.getElementById('idcarbrandx').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "Q其他" && mytrim(document.getElementById('idcarbrandxother').value) == "")
		{
			alert("请填写 车系车型");
			document.getElementById('idcarbrandxother').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "请选择")
		{
			alert("请选择 车辆颜色");
			document.getElementById('idcarcolor').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "其他" && mytrim(document.getElementById('idcarcolorother').value) == "")
		{
			alert("请填写 车辆颜色");
			document.getElementById('idcarcolorother').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "请选择")
		{
			alert("请选择 车辆座位数");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "19座以上")
		{
			carnum = mytrim(document.getElementById('idcarnum').value);
			tempurl = "AjaxServer.php?type=warning&carnum=" + carnum + "&info=" + encodeURIComponent("核定载客数");
			$.get(tempurl);
			alert("对不起，车辆为大型车辆，不符合申请条件");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else
		{
			return true;
		}
	}
	else if (applytype == "北航教职工为配偶或子女申请")
	{
		if (mytrim(document.getElementById('idapplicant').value) == "")
		{
			alert("请填写 教职工姓名");
			document.getElementById('idapplicant').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idpid').value) == "")
		{
			alert("请填写 工作证号");
			document.getElementById('idpid').focus();
			return false;
		}
		else if (document.getElementById('idcompany').value == "请选择")
		{
			alert("请选择 学院(单位)");
			document.getElementById('idcompany').focus();
			return false;
		}
		else if (document.getElementById('idcompany').value == "其他" && mytrim(document.getElementById('idcompanyother').value) == "")
		{
			alert("请填写 学院(单位)");
			document.getElementById('idcompanyother').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idaddress').value) == "")
		{
			alert("请填写 教职工居住地址");
			document.getElementById('idaddress').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmobile').value) == "" || check_phone_num(mytrim(document.getElementById('idmobile').value)) != 0 || mytrim(document.getElementById('idmobile').value).length < 4)
		{
			alert("请正确填写 教职工联系电话(只能填数字 '+' '-')");
			document.getElementById('idmobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idrelativename').value) == "")
		{
			temp = "请填写 " + document.getElementById('idrelativenameth').innerHTML;
			alert("temp");
			document.getElementById('idrelativename').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idrelativeidcard').value) == "")
		{
			temp = "请正确填写 " + document.getElementById('idrelativeidcardth').innerHTML;
			alert(temp);
			document.getElementById('idrelativeidcard').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idrelativeaddress').value) == "")
		{
			temp = "请填写 " + document.getElementById('idrelativeaddresstypeth').innerHTML;
			alert(temp);
			document.getElementById('idrelativeaddress').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idrelativemobile').value) == "" || check_phone_num(mytrim(document.getElementById('idrelativemobile').value)) != 0 || mytrim(document.getElementById('idrelativemobile').value).length < 11)
		{
			temp = "请正确填写 " + document.getElementById('idrelativemobileth').innerHTML;
			alert(temp);
			document.getElementById('idrelativemobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idrelativephone1').value) != "" && check_phone_num(mytrim(document.getElementById('idrelativephone1').value)) != 0)
		{
			temp = "请正确填写 " + document.getElementById('idrelativephone1th').innerHTML;
			alert(temp);
			document.getElementById('idrelativephone1').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idrelativephone2').value) != "" && check_phone_num(mytrim(document.getElementById('idrelativephone2').value)) != 0)
		{
			temp = "请正确填写 " + document.getElementById('idrelativephone2th').innerHTML;
			alert(temp);
			document.getElementById('idrelativephone2').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarowner').value) == "")
		{
			alert("请填写 车主姓名");
			document.getElementById('idcarowner').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "本人" && mytrim(document.getElementById('idcarowner').value) != mytrim(document.getElementById('idrelativename').value))
		{
			temp = document.getElementById('idrelativenameth').innerHTML + "和车主姓名不一致，请确认" + document.getElementById('idrelativenameth').innerHTML + "与车主的关系";
			alert(temp);
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "夫妻" && mytrim(document.getElementById('idcarowner').value) == mytrim(document.getElementById('idrelativename').value))
		{
			temp = document.getElementById('idrelativenameth').innerHTML + "和车主姓名一致，请确认" + document.getElementById('idrelativenameth').innerHTML + "与车主的关系";
			alert(temp);
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "其他")
		{
			carnum = mytrim(document.getElementById('idcarnum').value);
			tempurl = "AjaxServer.php?type=warning&carnum=" + carnum + "&info=" + encodeURIComponent("车主与使用申请人关系");
			$.get(tempurl);
			alert("对不起，车辆不是使用人名下财产，不符合申请条件");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarnum').value) == "" || mytrim(document.getElementById('idcarnum').value).length < 5)
		{
			alert("请填写 车牌号");
			document.getElementById('idcarnum').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "请选择")
		{
			alert("请选择 车辆类别");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "其他" || document.getElementById('idcartype').value == "货车")
		{
			carnum = mytrim(document.getElementById('idcarnum').value);
			tempurl = "AjaxServer.php?type=warning&carnum=" + carnum + "&info=" + encodeURIComponent("车辆类别");
			$.get(tempurl);
			alert("对不起，车辆类别不符合申请条件");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "请选择")
		{
			alert("请选择 车辆品牌");
			document.getElementById('idcarbrand').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "q其他" && mytrim(document.getElementById('idcarbrandother').value) == "")
		{
			alert("请填写 车辆品牌");
			document.getElementById('idcarbrandother').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "请选择")
		{
			alert("请选择 车系车型");
			document.getElementById('idcarbrandx').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "Q其他" && mytrim(document.getElementById('idcarbrandxother').value) == "")
		{
			alert("请填写 车系车型");
			document.getElementById('idcarbrandxother').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "请选择")
		{
			alert("请选择 车辆颜色");
			document.getElementById('idcarcolor').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "其他" && mytrim(document.getElementById('idcarcolorother').value) == "")
		{
			alert("请填写 车辆颜色");
			document.getElementById('idcarcolorother').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "请选择")
		{
			alert("请选择 车辆座位数");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "19座以上")
		{
			carnum = mytrim(document.getElementById('idcarnum').value);
			tempurl = "AjaxServer.php?type=warning&carnum=" + carnum + "&info=" + encodeURIComponent("核定载客数");
			$.get(tempurl);
			alert("对不起，车辆为大型车辆，不符合申请条件");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else
		{
			return true;
		}
	}
	else if (applytype == "附中附小幼儿园学生家长申请")
	{
		if (mytrim(document.getElementById('idapplicant').value) == "")
		{
			alert("请填写 家长姓名");
			document.getElementById('idapplicant').focus();
			return false;
		}
		else if (mytrim(document.getElementById('ididcard').value) == "")
		{
			alert("请填写 身份证件号");
			document.getElementById('ididcard').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcompany').value) == "")
		{
			alert("请填写 单位名称");
			document.getElementById('idcompany').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcompanyaddress').value) == "")
		{
			alert("请填写 单位地址");
			document.getElementById('idcompanyaddress').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idaddress').value) == "")
		{
			alert("请填写 居住地址");
			document.getElementById('idaddress').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmobile').value) == "" || check_phone_num(mytrim(document.getElementById('idmobile').value)) != 0 || mytrim(document.getElementById('idmobile').value).length < 11)
		{
			alert("请填写 手机号码(只能填数字 '+' '-')");
			document.getElementById('idmobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone1').value) != "" && check_phone_num(mytrim(document.getElementById('idphone1').value)) != 0)
		{
			alert("请填写 家庭电话(只能填数字 '+' '-')");
			document.getElementById('idphone1').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone2').value) != "" && check_phone_num(mytrim(document.getElementById('idphone2').value)) != 0)
		{
			alert("请填写 单位电话(只能填数字 '+' '-')");
			document.getElementById('idphone2').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idemail').value) != "" && check_email(mytrim(document.getElementById('idemail').value)) != 0)
		{
			alert("请填写 正确的电子邮箱");
			document.getElementById('idemail').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idchildname').value) == "")
		{
			alert("请填写 学生姓名");
			document.getElementById('idchildname').focus();
			return false;
		}
		else if (document.getElementById('idchildschool').value == "请选择")
		{
			alert("请选择 学生学校");
			document.getElementById('idchildschool').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idchildgrade').value) == "")
		{
			alert("请填写 学生班级");
			document.getElementById('idchildgrade').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idchildschoolcharger').value) == "")
		{
			alert("请填写 学校负责人");
			document.getElementById('idchildschoolcharger').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarowner').value) == "")
		{
			alert("请填写 车主姓名");
			document.getElementById('idcarowner').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "其他")
		{
			alert("对不起，车辆不是使用人名下财产，不符合申请条件");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "本人" && mytrim(document.getElementById('idcarowner').value) != mytrim(document.getElementById('idapplicant').value))
		{
			alert("家长姓名和车主姓名不一致，请确认家长与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "夫妻" && mytrim(document.getElementById('idcarowner').value) == mytrim(document.getElementById('idapplicant').value))
		{
			alert("家长姓名和车主姓名一致，请确认家长与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarnum').value) == "" || mytrim(document.getElementById('idcarnum').value).length < 5)
		{
			alert("请正确填写 车牌号");
			document.getElementById('idcarnum').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "请选择")
		{
			alert("请选择 车辆类别");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "其他" || document.getElementById('idcartype').value == "货车" || document.getElementById('idcartype').value == "7座以上客车")
		{
			alert("对不起，车辆类别不符合申请条件");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "请选择")
		{
			alert("请选择 车辆品牌");
			document.getElementById('idcarbrand').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "q其他" && mytrim(document.getElementById('idcarbrandother').value) == "")
		{
			alert("请填写 车辆品牌");
			document.getElementById('carbrandother').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "请选择")
		{
			alert("请选择 车系车型");
			document.getElementById('idcarbrandx').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "Q其他" && mytrim(document.getElementById('idcarbrandxother').value) == "")
		{
			alert("请填写 车系车型");
			document.getElementById('carbrandxother').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "请选择")
		{
			alert("请选择 车辆颜色");
			document.getElementById('idcarcolor').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "其他" && mytrim(document.getElementById('idcarcolorother').value) == "")
		{
			alert("请填写 车辆颜色");
			document.getElementById('idcarcolorother').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "请选择")
		{
			alert("请选择 车辆座位数");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "19座以上" || document.getElementById('idcarseat').value == "7 - 19座")
		{
			alert("对不起，车辆为大型车辆，不符合申请条件");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else
		{
			return true;
		}
	}
	else if (applytype == "北航学校公车申请")
	{
		if (document.getElementById('idcompany').value == "请选择")
		{
			alert("请选择 单位名称");
			document.getElementById('idcompany').focus();
			return false;
		}
		else if (document.getElementById('idcompany').value == "其他" && mytrim(document.getElementById('idcompanyother').value) == "")
		{
			alert("请填写 单位名称");
			document.getElementById('idcompanyother').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmanincharge').value) == "")
		{
			alert("请填写 负责人");
			document.getElementById('idmanincharge').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idoperator').value) == "")
		{
			alert("请填写 经办人");
			document.getElementById('idoperator').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmobile').value) == "" || check_phone_num(mytrim(document.getElementById('idmobile').value)) != 0 || mytrim(document.getElementById('idmobile').value).length < 4)
		{
			alert("请填写 联系电话(只能填数字 '+' '-')");
			document.getElementById('idmobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarnum').value) == "" || mytrim(document.getElementById('idcarnum').value).length < 5)
		{
			alert("请正确填写 车牌号");
			document.getElementById('idcarnum').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "请选择")
		{
			alert("请选择 车辆类别");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "请选择")
		{
			alert("请选择 车辆品牌");
			document.getElementById('idcarbrand').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "q其他" && mytrim(document.getElementById('idcarbrandother').value) == "")
		{
			alert("请填写 车辆品牌");
			document.getElementById('carbrandother').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "请选择")
		{
			alert("请选择 车系车型");
			document.getElementById('idcarbrandx').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "Q其他" && mytrim(document.getElementById('idcarbrandxother').value) == "")
		{
			alert("请填写 车系车型");
			document.getElementById('carbrandxother').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "请选择")
		{
			alert("请选择 车辆颜色");
			document.getElementById('idcarcolor').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "其他" && mytrim(document.getElementById('idcarcolorother').value) == "")
		{
			alert("请填写 车辆颜色");
			document.getElementById('idcarcolorother').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "请选择")
		{
			alert("请选择 车辆座位数");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else
		{
			return true;
		}
		
	}
	else if (applytype == "业务单位人员申请")
	{
		if (document.getElementById('idcompany').value == "请选择")
		{
			alert("请选择 业务单位名称");
			document.getElementById('idcompany').focus();
			return false;
		}
		else if (document.getElementById('idcompany').value == "其他" && mytrim(document.getElementById('idcompanyother').value) == "")
		{
			alert("请填写 业务单位名称");
			document.getElementById('idcompanyother').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmanincharge').value) == "")
		{
			alert("请填写 负责人");
			document.getElementById('idmanincharge').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idoperator').value) == "")
		{
			alert("请填写 经办人");
			document.getElementById('idoperator').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmobile').value) == "" || check_phone_num(mytrim(document.getElementById('idmobile').value)) != 0 || mytrim(document.getElementById('idmobile').value).length < 4)
		{
			alert("请填写 联系电话(只能填数字 '+' '-')");
			document.getElementById('idmobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarowner').value) == "")
		{
			alert("请填写 车主姓名");
			document.getElementById('idcarowner').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarownermobile').value) == "" || check_phone_num(mytrim(document.getElementById('idcarownermobile').value)) != 0 || mytrim(document.getElementById('idcarownermobile').value).length < 11)
		{
			alert("请正确填写 车主手机号码(只能填数字 '+' '-')");
			document.getElementById('idcarownermobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone1').value) != "" && check_phone_num(mytrim(document.getElementById('idphone1').value)) != 0)
		{
			alert("请正确填写 车主家庭电话(只能填数字 '+' '-')");
			document.getElementById('idphone1').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone2').value) != "" && check_phone_num(mytrim(document.getElementById('idphone2').value)) != 0)
		{
			alert("请正确填写 车主办公电话(只能填数字 '+' '-')");
			document.getElementById('idphone2').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idemail').value) != "" && check_email(mytrim(document.getElementById('idemail').value)) != 0)
		{
			alert("请正确填写 车主电子邮箱");
			document.getElementById('idemail').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarownerjob').value) == "")
		{
			alert("请填写 车主职务");
			document.getElementById('idcarownerjob').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarownercompany').value) == "")
		{
			alert("请填写 车主单位");
			document.getElementById('idcarownercompany').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarnum').value) == "" || mytrim(document.getElementById('idcarnum').value).length < 5)
		{
			alert("请正确填写 车牌号");
			document.getElementById('idcarnum').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "请选择")
		{
			alert("请选择 车辆座位数");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "19座以上")
		{
			alert("对不起，车辆为大型车辆，不符合申请条件");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else
		{
			return true;
		}
	}
	else if (applytype == "校内办公的外单位人员申请")
	{
		if (document.getElementById('idcompanyinbuaa').value == "请选择")
		{
			alert("请选择 单位名称");
			document.getElementById('idcompanyinbuaa').focus();
			return false;
		}
		else if (document.getElementById('idcompanyinbuaa').value == "其他" && mytrim(document.getElementById('idcompanyinbuaaother').value) == "")
		{
			alert("请填写 单位名称");
			document.getElementById('idcompanyinbuaaother').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmanincharge').value) == "")
		{
			alert("请填写 负责人");
			document.getElementById('idmanincharge').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idoperator').value) == "")
		{
			alert("请填写 经办人");
			document.getElementById('idoperator').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmobile').value) == "" || check_phone_num(mytrim(document.getElementById('idmobile').value)) != 0 || mytrim(document.getElementById('idmobile').value).length < 4)
		{
			alert("请填写 联系电话(只能填数字 '+' '-')");
			document.getElementById('idmobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarowner').value) == "")
		{
			alert("请填写 车主姓名");
			document.getElementById('idcarowner').focus();
			return false;
		}
		else if (mytrim(document.getElementById('ididcard').value) == "")
		{
			alert("请正确填写 车主身份证件号");
			document.getElementById('ididcard').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarownermobile').value) == "" || check_phone_num(mytrim(document.getElementById('idcarownermobile').value)) != 0 || mytrim(document.getElementById('idcarownermobile').value).length < 11)
		{
			alert("请正确填写 车主手机号码(只能填数字 '+' '-')");
			document.getElementById('idcarownermobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone1').value) != "" && check_phone_num(mytrim(document.getElementById('idphone1').value)) != 0)
		{
			alert("请正确填写 车主家庭电话(只能填数字 '+' '-')");
			document.getElementById('idphone1').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone2').value) != "" && check_phone_num(mytrim(document.getElementById('idphone2').value)) != 0)
		{
			alert("请正确填写 车主办公电话(只能填数字 '+' '-')");
			document.getElementById('idphone2').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idemail').value) != "" && check_email(mytrim(document.getElementById('idemail').value)) != 0)
		{
			alert("请正确填写 车主电子邮箱");
			document.getElementById('idemail').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarnum').value) == "" || mytrim(document.getElementById('idcarnum').value).length < 5)
		{
			alert("请正确填写 车牌号");
			document.getElementById('idcarnum').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "请选择")
		{
			alert("请选择 车辆类别");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "其他" || document.getElementById('idcartype').value == "货车")
		{
			alert("对不起，车辆类别不符合申请条件");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "请选择")
		{
			alert("请选择 车辆品牌");
			document.getElementById('idcarbrand').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "q其他" && mytrim(document.getElementById('idcarbrandother').value) == "")
		{
			alert("请填写 车辆品牌");
			document.getElementById('carbrandother').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "请选择")
		{
			alert("请选择 车系车型");
			document.getElementById('idcarbrandx').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "Q其他" && mytrim(document.getElementById('idcarbrandxother').value) == "")
		{
			alert("请填写 车系车型");
			document.getElementById('carbrandxother').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "请选择")
		{
			alert("请选择 车辆颜色");
			document.getElementById('idcarcolor').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "其他" && mytrim(document.getElementById('idcarcolorother').value) == "")
		{
			alert("请填写 车辆颜色");
			document.getElementById('idcarcolorother').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "请选择")
		{
			alert("请选择 车辆座位数");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "19座以上")
		{
			alert("对不起，车辆为大型车辆，不符合申请条件");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else
		{
			return true;
		}
	}
	else if (applytype == "房主为校内租房的社会人员申请")
	{
		if (mytrim(document.getElementById('idapplicant').value) == "")
		{
			alert("请填写 租房人姓名");
			document.getElementById('idapplicant').focus();
			return false;
		}
		else if (mytrim(document.getElementById('ididcard').value) == "")
		{
			alert("请填写 身份证件号");
			document.getElementById('ididcard').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idaddress').value) == "")
		{
			alert("请填写 居住地址");
			document.getElementById('idaddress').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmobile').value) == "" || check_phone_num(mytrim(document.getElementById('idmobile').value)) != 0 || mytrim(document.getElementById('idmobile').value).length < 11)
		{
			alert("请填写 手机号码(只能填数字 '+' '-')");
			document.getElementById('idmobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone1').value) != "" && check_phone_num(mytrim(document.getElementById('idphone1').value)) != 0)
		{
			alert("请填写 家庭电话(只能填数字 '+' '-')");
			document.getElementById('idphone1').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone2').value) != "" && check_phone_num(mytrim(document.getElementById('idphone2').value)) != 0)
		{
			alert("请填写 单位电话(只能填数字 '+' '-')");
			document.getElementById('idphone2').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idemail').value) != "" && check_email(mytrim(document.getElementById('idemail').value)) != 0)
		{
			alert("请填写 正确的电子邮箱");
			document.getElementById('idemail').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idhouseownername').value) == "")
		{
			alert("请填写 房主姓名");
			document.getElementById('idhouseownername').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idhouseownercompany').value) == "")
		{
			alert("请填写 房主工作单位");
			document.getElementById('idhouseownercompany').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idhouseownermobile').value) == "" || check_phone_num(mytrim(document.getElementById('idhouseownermobile').value)) != 0 || mytrim(document.getElementById('idhouseownermobile').value).length < 4)
		{
			alert("请填写 房主联系电话(只能填数字 '+' '-')");
			document.getElementById('idhouseownermobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idhouseowneridcard').value) == "")
		{
			alert("请填写 房主身份证件号");
			document.getElementById('idhouseowneridcard').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarowner').value) == "")
		{
			alert("请填写 车主姓名");
			document.getElementById('idcarowner').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "其他")
		{
			alert("对不起，车辆不是使用人名下财产，不符合申请条件");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "本人" && mytrim(document.getElementById('idcarowner').value) != mytrim(document.getElementById('idapplicant').value))
		{
			alert("租房人姓名和车主姓名不一致，请确认租房人与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "夫妻" && mytrim(document.getElementById('idcarowner').value) == mytrim(document.getElementById('idapplicant').value))
		{
			alert("租房人姓名和车主姓名一致，请确认租房人与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarnum').value) == "" || mytrim(document.getElementById('idcarnum').value).length < 5)
		{
			alert("请正确填写 车牌号");
			document.getElementById('idcarnum').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "请选择")
		{
			alert("请选择 车辆类别");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "其他" || document.getElementById('idcartype').value == "货车")
		{
			alert("对不起，车辆类别不符合申请条件");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "请选择")
		{
			alert("请选择 车辆品牌");
			document.getElementById('idcarbrand').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "q其他" && mytrim(document.getElementById('idcarbrandother').value) == "")
		{
			alert("请填写 车辆品牌");
			document.getElementById('carbrandother').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "请选择")
		{
			alert("请选择 车系车型");
			document.getElementById('idcarbrandx').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "Q其他" && mytrim(document.getElementById('idcarbrandxother').value) == "")
		{
			alert("请填写 车系车型");
			document.getElementById('carbrandxother').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "请选择")
		{
			alert("请选择 车辆颜色");
			document.getElementById('idcarcolor').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "其他" && mytrim(document.getElementById('idcarcolorother').value) == "")
		{
			alert("请填写 车辆颜色");
			document.getElementById('idcarcolorother').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "请选择")
		{
			alert("请选择 车辆座位数");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "19座以上")
		{
			alert("对不起，车辆为大型车辆，不符合申请条件");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else
		{
			return true;
		}
	}
	else if (applytype == "居住校内的社会人员申请")
	{
		if (mytrim(document.getElementById('idapplicant').value) == "")
		{
			alert("请填写 申请人姓名");
			document.getElementById('idapplicant').focus();
			return false;
		}
		else if (mytrim(document.getElementById('ididcard').value) == "")
		{
			alert("请填写 身份证件号");
			document.getElementById('ididcard').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idaddress').value) == "")
		{
			alert("请填写 居住地址");
			document.getElementById('idaddress').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmobile').value) == "" || check_phone_num(mytrim(document.getElementById('idmobile').value)) != 0 || mytrim(document.getElementById('idmobile').value).length < 11)
		{
			alert("请填写 手机号码(只能填数字 '+' '-')");
			document.getElementById('idmobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone1').value) != "" && check_phone_num(mytrim(document.getElementById('idphone1').value)) != 0)
		{
			alert("请填写 家庭电话(只能填数字 '+' '-')");
			document.getElementById('idphone1').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone2').value) != "" && check_phone_num(mytrim(document.getElementById('idphone2').value)) != 0)
		{
			alert("请填写 单位电话(只能填数字 '+' '-')");
			document.getElementById('idphone2').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idemail').value) != "" && check_email(mytrim(document.getElementById('idemail').value)) != 0)
		{
			alert("请填写 正确的电子邮箱");
			document.getElementById('idemail').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarowner').value) == "")
		{
			alert("请填写 车主姓名");
			document.getElementById('idcarowner').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "其他")
		{
			alert("对不起，车辆不是使用人名下财产，不符合申请条件");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "本人" && mytrim(document.getElementById('idcarowner').value) != mytrim(document.getElementById('idapplicant').value))
		{
			alert("申请人姓名和车主姓名不一致，请确认申请人与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "夫妻" && mytrim(document.getElementById('idcarowner').value) == mytrim(document.getElementById('idapplicant').value))
		{
			alert("申请人姓名和车主姓名一致，请确认申请人与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarnum').value) == "" || mytrim(document.getElementById('idcarnum').value).length < 5)
		{
			alert("请正确填写 车牌号");
			document.getElementById('idcarnum').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "请选择")
		{
			alert("请选择 车辆类别");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "其他" || document.getElementById('idcartype').value == "货车")
		{
			alert("对不起，车辆类别不符合申请条件");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "请选择")
		{
			alert("请选择 车辆品牌");
			document.getElementById('idcarbrand').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "q其他" && mytrim(document.getElementById('idcarbrandother').value) == "")
		{
			alert("请填写 车辆品牌");
			document.getElementById('carbrandother').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "请选择")
		{
			alert("请选择 车系车型");
			document.getElementById('idcarbrandx').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "Q其他" && mytrim(document.getElementById('idcarbrandxother').value) == "")
		{
			alert("请填写 车系车型");
			document.getElementById('carbrandxother').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "请选择")
		{
			alert("请选择 车辆颜色");
			document.getElementById('idcarcolor').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "其他" && mytrim(document.getElementById('idcarcolorother').value) == "")
		{
			alert("请填写 车辆颜色");
			document.getElementById('idcarcolorother').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "请选择")
		{
			alert("请选择 车辆座位数");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "19座以上")
		{
			alert("对不起，车辆为大型车辆，不符合申请条件");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else
		{
			return true;
		}
	}
	else if (applytype == "其他用工和送货施工车辆申请")
	{
		if (mytrim(document.getElementById('idapplicant').value) == "")
		{
			alert("请填写 使用申请人姓名");
			document.getElementById('idapplicant').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmobile').value) == "" || check_phone_num(mytrim(document.getElementById('idmobile').value)) != 0 || mytrim(document.getElementById('idmobile').value).length < 11)
		{
			alert("请填写 手机号码(只能填数字 '+' '-')");
			document.getElementById('idmobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone1').value) != ""&& check_phone_num(mytrim(document.getElementById('idphone1').value)) != 0)
		{
			alert("请填写 家庭电话(只能填数字 '+' '-')");
			document.getElementById('idphone1').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone2').value) != "" && check_phone_num(mytrim(document.getElementById('idphone2').value)) != 0)
		{
			alert("请填写 单位电话(只能填数字 '+' '-')");
			document.getElementById('idphone2').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idemail').value) != "" && check_email(mytrim(document.getElementById('idemail').value)) != 0)
		{
			alert("请填写 正确的电子邮箱");
			document.getElementById('idemail').focus();
			return false;
		}
		
		else if (mytrim(document.getElementById('idservicecompany').value) == "")
		{
			alert("请填写 服务单位");
			document.getElementById('idservicecompany').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idservicecharger').value) == "")
		{
			alert("请填写 服务单位负责人");
			document.getElementById('idservicecharger').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idservicemobile').value) == "" || check_phone_num(mytrim(document.getElementById('idservicemobile').value)) != 0 || mytrim(document.getElementById('idservicemobile').value).length < 4)
		{
			alert("请填写 服务单位电话(只能填数字 '+' '-')");
			document.getElementById('idservicemobile').focus();
			return false;
		}
		
		else if (mytrim(document.getElementById('idcarowner').value) == "")
		{
			alert("请填写 车主姓名");
			document.getElementById('idcarowner').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "本人" && mytrim(document.getElementById('idcarowner').value) != mytrim(document.getElementById('idapplicant').value))
		{
			alert("申请人姓名和车主姓名不一致，请确认申请人与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "夫妻" && mytrim(document.getElementById('idcarowner').value) == mytrim(document.getElementById('idapplicant').value))
		{
			alert("申请人姓名和车主姓名一致，请确认申请人与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idcarownerrelation').value == "其他" && mytrim(document.getElementById('idcarowner').value) == mytrim(document.getElementById('idapplicant').value))
		{
			alert("申请人姓名和车主姓名一致，请确认申请人与车主的关系");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (document.getElementById('idservicetype').value == "其他用工人员" && document.getElementById('idcarownerrelation').value == "其他")
		{
			alert("对不起，车辆不是使用人名下财产，不符合申请条件");
			document.getElementById('idcarownerrelation').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarnum').value) == "" || mytrim(document.getElementById('idcarnum').value).length < 5)
		{
			alert("请正确填写 车牌号");
			document.getElementById('idcarnum').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "请选择")
		{
			alert("请选择 车辆类别");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcartype').value == "请选择")
		{
			alert("请选择 车辆类别");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idservicetype').value == "其他用工人员" && (document.getElementById('idcartype').value == "其他" || document.getElementById('idcartype').value == "货车"))
		{
			alert("对不起，车辆类别不符合申请条件");
			document.getElementById('idcartype').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "请选择")
		{
			alert("请选择 车辆品牌");
			document.getElementById('idcarbrand').focus();
			return false;
		}
		else if (document.getElementById('idcarbrand').value == "q其他" && mytrim(document.getElementById('idcarbrandother').value) == "")
		{
			alert("请填写 车辆品牌");
			document.getElementById('carbrandother').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "请选择")
		{
			alert("请选择 车系车型");
			document.getElementById('idcarbrandx').focus();
			return false;
		}
		else if (document.getElementById('idcarbrandx').value == "Q其他" && mytrim(document.getElementById('idcarbrandxother').value) == "")
		{
			alert("请填写 车系车型");
			document.getElementById('carbrandxother').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "请选择")
		{
			alert("请选择 车辆颜色");
			document.getElementById('idcarcolor').focus();
			return false;
		}
		else if (document.getElementById('idcarcolor').value == "其他" && mytrim(document.getElementById('idcarcolorother').value) == "")
		{
			alert("请填写 车辆颜色");
			document.getElementById('idcarcolorother').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "请选择")
		{
			alert("请选择 车辆座位数");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "19座以上")
		{
			alert("对不起，车辆为大型车辆，不符合申请条件");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else
		{
			return true;
		}
	}
	else if (applytype == "嘉宾")
	{
		if (document.getElementById('idcompany').value == "请选择")
		{
			alert("请选择 校内联系单位名称");
			document.getElementById('idcompany').focus();
			return false;
		}
		else if (document.getElementById('idcompany').value == "其他" && mytrim(document.getElementById('idcompanyother').value) == "")
		{
			alert("请填写 校内联系单位名称");
			document.getElementById('idcompanyother').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmanincharge').value) == "")
		{
			alert("请填写 负责人");
			document.getElementById('idmanincharge').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idoperator').value) == "")
		{
			alert("请填写 经办人");
			document.getElementById('idoperator').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idmobile').value) == "" || check_phone_num(mytrim(document.getElementById('idmobile').value)) != 0 || mytrim(document.getElementById('idmobile').value).length < 4)
		{
			alert("请填写 联系电话(只能填数字 '+' '-')");
			document.getElementById('idmobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarowner').value) == "")
		{
			alert("请填写 车主姓名");
			document.getElementById('idcarowner').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarownermobile').value) == "" || check_phone_num(mytrim(document.getElementById('idcarownermobile').value)) != 0 || mytrim(document.getElementById('idcarownermobile').value).length < 11)
		{
			alert("请正确填写 车主手机号码(只能填数字 '+' '-')");
			document.getElementById('idcarownermobile').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone1').value) != "" && check_phone_num(mytrim(document.getElementById('idphone1').value)) != 0)
		{
			alert("请正确填写 车主家庭电话(只能填数字 '+' '-')");
			document.getElementById('idphone1').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idphone2').value) != "" && check_phone_num(mytrim(document.getElementById('idphone2').value)) != 0)
		{
			alert("请正确填写 车主办公电话(只能填数字 '+' '-')");
			document.getElementById('idphone2').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idemail').value) != "" && check_email(mytrim(document.getElementById('idemail').value)) != 0)
		{
			alert("请正确填写 车主电子邮箱");
			document.getElementById('idemail').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarownerjob').value) == "")
		{
			alert("请填写 车主职务");
			document.getElementById('idcarownerjob').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarownercompany').value) == "")
		{
			alert("请填写 车主单位");
			document.getElementById('idcarownercompany').focus();
			return false;
		}
		else if (mytrim(document.getElementById('idcarnum').value) == "" || mytrim(document.getElementById('idcarnum').value).length < 5)
		{
			alert("请正确填写 车牌号");
			document.getElementById('idcarnum').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "请选择")
		{
			alert("请选择 车辆座位数");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else if (document.getElementById('idcarseat').value == "19座以上")
		{
			alert("对不起，车辆为大型车辆，不符合申请条件");
			document.getElementById('idcarseat').focus();
			return false;
		}
		else
		{
			return true;
		}
	}
	else
	{
		return;
	}
}