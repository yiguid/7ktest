
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

function setPrinterId(){
	//alert(getRadioValue('printer_address'));
	document.getElementById('printerid').value = getRadioValue('printer_address');
}

//核查校内居住职工库
function check_addresstype(url, addresstype) {
	var pid = document.getElementById('idpid').value;
	$.post(url + "ajaxfile/ajax/check_addresstype", {
		addresstype : addresstype,
		pid : pid
	}, function(data) {
		if (data == "错误")
			alert("对不起，系统显示您在校内有房，请确认");
	});
}

function IdentityCodeValid() {
	code = document.getElementById('idcard').value
	if(!code) {
		document.getElementById('s-form').submit();
		return
	}
	
	var city = {
		11 : "北京",
		12 : "天津",
		13 : "河北",
		14 : "山西",
		15 : "内蒙古",
		21 : "辽宁",
		22 : "吉林",
		23 : "黑龙江 ",
		31 : " 上海",
		32 : "江苏",
		33 : "浙江",
		34 : "安徽",
		35 : "福建",
		36 : "江西",
		37 : "山东",
		41 : "河南",
		42 : "湖 北 ",
		43 : "湖南",
		44 : "广东",
		45 : "广西",
		46 : "海南",
		50 : "重庆",
		51 : "四川",
		52 : "贵州",
		53 : "云南",
		54 : " 西藏 ",
		61 : "陕西",
		62 : "甘肃",
		63 : "青海",
		64 : "宁夏",
		65 : "新疆",
		71 : "台湾",
		81 : "香港",
		82 : "澳 门",
		91 : "国外 "
	};
	var tip = "";
	var pass = true;
	if (!code
			|| !/^\d{6}(18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i
					.test(code)) {
		tip = "身份证号格式错误";
		pass = false;
	} else if (!city[code.substr(0, 2)]) {
		tip = "地址编码错误";
		pass = false;
	} else {
		// 18位身份证需要验证最后一位校验位
		if (code.length == 18) {
			code = code.split('');
			// ∑(ai×Wi)(mod 11)
			// 加权因子
			var factor = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2 ];
			// 校验位
			var parity = [ 1, 0, 'X', 9, 8, 7, 6, 5, 4, 3, 2 ];
			var sum = 0;
			var ai = 0;
			var wi = 0;
			for ( var i = 0; i < 17; i++) {
				ai = code[i];
				wi = factor[i];
				sum += ai * wi;
			}
			var last = parity[sum % 11];
			if (parity[sum % 11] != code[17]) {
				tip = "校验位错误";
				pass = false;
			}
		}
	}
	if (!pass)
		alert(tip);
	else
		document.getElementById('s-form').submit();
	return pass;
}

// 教职工类型申请时提示需审核材料
function approve_addresstype(addresstype) {
	if (addresstype == "北航校外") {
		document.getElementById('addresstype_material').innerHTML = "&bull;&nbsp;校外购房合同或校外房产证原件;<br>";
		// $("#approve_material").after('<span>&bull;&nbsp;校外购房合同或校外房产证原件;<br></span>');
	}
	if (addresstype == "北航校内") {
		document.getElementById('addresstype_material').innerHTML = "<br>";
	}
}

// 工作人员申请时根据车主关系显示需审核材料
function approve_carownerrelation(carownerrelation) {
	if (carownerrelation == "本人")
		document.getElementById('carownerrelation_material').innerHTML = "";
	if (carownerrelation == "其他")
		document.getElementById('carownerrelation_material').innerHTML = "";
	if (carownerrelation == "夫妻")
		document.getElementById('carownerrelation_material').innerHTML = "&bull;&nbsp;结婚证(户口本或双方关系的证明材料);";
	// $("#approve_material").after('<span>&bull;&nbsp;结婚证(户口本或双方关系的证明材料);<br></span>');
	if (carownerrelation == "他人私车")
		document.getElementById('carownerrelation_material').innerHTML = "&bull;&nbsp;教工所在单位出具的证明材料(正职领导签字并盖公章);";
	// $("#approve_material").after('<span>&bull;&nbsp;教工所在单位出具的证明材料(正职领导签字并盖公章);<br></span>');
	if (carownerrelation == "单位公车")
		document.getElementById('carownerrelation_material').innerHTML = "&bull;&nbsp;公车提供单位出具的证明以及教工所在单位出具的证明材料(正职领导签字并盖公章);";
	// $("#approve_material").after('<span>&bull;&nbsp;公车提供单位出具的证明以及教工所在单位出具的证明材料(正职领导签字并盖公章);<br></span>');
}

// 查看或审核表格时自动加载车主关系需审核的材料
// $(function()
// {
// var carownerrelation = document.getElementById('idcarownerrelation').value;
// var addresstype = document.getElementById('idaddresstype').value;
// if(addresstype == "北航校外" && document.getElementById('idteachertype') != null)
// {
// $("#approve_material").after('<span>&bull;&nbsp;校外购房合同或校外房产证原件;<br></span>');
// }
// if(carownerrelation == "夫妻")
// $("#approve_material").after('<span>&bull;&nbsp;结婚证(户口本或双方关系的证明材料);<br></span>');
// if(carownerrelation == "他人私车")
// $("#approve_material").after('<span>&bull;&nbsp;教工所在单位出具的证明材料(正职领导签字并盖公章);<br></span>');
// if(carownerrelation == "单位公车")
// $("#approve_material").after('<span>&bull;&nbsp;公车提供单位出具的证明以及教工所在单位出具的证明材料(正职领导签字并盖公章);<br></span>');
// });

// 车主与申请人的关系
function set_relation(applicant) {
	var carowner = document.getElementById("idcarowner").value;
	if (applicant != carowner)
		document.getElementById("idcarownerrelation").value = '夫妻';
	else
		document.getElementById("idcarownerrelation").value = '本人';
}

// 车辆品牌及车系型号的联动
function get_carbrand(pid, url) {
	document.getElementById("idothercarbrand").innerHTML = "";
	document.getElementById("idothercarbrandx").innerHTML = "";
	if (pid == "其他") {
		document.getElementById('idcarbrandx').options.length = 0;
		document.getElementById("idothercarbrand").innerHTML = "<input class=\"inputtext\" type=\"text\" name=\"carbrandother\" id=\"idcarbrandother\" size=\"20\" />&nbsp;";
		document.getElementById('idcarbrandx').options.add(new Option('其他',
				'其他'));
		document.getElementById("idothercarbrandx").innerHTML = "<input class=\"inputtext\" type=\"text\" name=\"carbrandxother\" id=\"idcarbrandxother\" size=\"20\" />&nbsp;";
	} else {
		$.post(url + "ajaxfile/ajax/carbrand", {
			id : pid
		}, function(data) {
			$("#carbrandx").html(data);
		});
	}
}

// 当车辆品牌确定，但车系为"其他"时，仅显示车系输入框
function get_carbrandx() {
	document.getElementById("idothercarbrandx").innerHTML = "";
	var num = document.getElementById("idcarbrandx").value;
	if (num == "其他") {
		document.getElementById("idothercarbrandx").innerHTML = "<input class=\"inputtext\" type=\"text\" name=\"carbrandxother\" id=\"idcarbrandxother\" size=\"20\" />&nbsp;";
	}
}

// 当输入工作证号时，系统默认显示对应的姓名、身份证号、编制类型和学院单位
function get_peopleinfo(pid, url) {
	$.get(url + "ajaxfile/ajax/peopleinfo", {
		id : pid
	}, function(data) {
		var array = data.split("|");
		if (array[0] != "无") {
			document.getElementById("idapplicant").value = array[0];
		}
		if (array[1] != "无") {
			document.getElementById("idcompany").value = array[1];
		}
		if (array[2] != "无") {
			document.getElementById("ididcard").value = array[2];
		}
		if (array[3] != "无") {
			document.getElementById("idteachertype").value = array[3];
		}
	});

}

// 教职工为子女申请判断生存状态
function get_livestatus(pid, url) {
	$.get(url + "ajaxfile/ajax/livestatus", {
		id : pid
	}, function(data) {
		if (data == "去世") {
			document.getElementById("idlivestatus").value = '去世';
		}
	});
}

// 系统获取701所职工信息
function get_701info(pid, url) {
	$.get(url + "ajaxfile/ajax/info701", {
		id : pid
	}, function(data) {
		var array = data.split("|");
		if (array[0] != "无") {
			document.getElementById("idapplicant").value = array[0];
		}
		if (array[1] != "无") {
			document.getElementById("ididcard").value = array[1];
		}
	});
}

// 车主与申请人的关系为其他时，显示输入框
function get_otherrelation() {
	document.getElementById("idotherrelation").innerHTML = "";
	var num = document.getElementById("idcarownerrelation").value;
	if (num == "其他") {
		alert("对不起，由于车辆不是申请人名下财产，不符合申请条件!\n如若申请，请填写信息，需由管理员审批。");
		document.getElementById("idotherrelation").innerHTML = "<input class=\"inputtext\" type=\"text\" name=\"relationother\" id=\"idrelationother\" size=\"10\" value=\"\"/>&nbsp;";
	}
}

// 若车辆座位数选择“19座以上”,提醒需管理员审核
function carseat_waring() {
	var seat = document.getElementById("idcarseat").value;
	if (seat == "19座以上") {
		alert("对不起，由于您的车辆为大型车辆，不符合申请条件!\n如若申请，需由管理员审批。");
	}
}

// 若车辆类型为“货车”或“其他”,提醒需管理员审核
function cartype_waring() {
	var type = document.getElementById("idcartype").value;
	if (type == "货车" || type == "其他") {
		alert("对不起，您的车辆类型不符合申请条件!\n如若申请，需由管理员审批。");
	}
}

// 教职工为子女申请时，若与教职工关系为“其他”,提醒需管理员审核
function teacherrelation_waring() {
	var relation = document.getElementById("idteacherrelation").value;
	if (relation == "其他") {
		alert("对不起，申请人与教职工关系不符合申请条件!\n如若申请，需由管理员审批。");
	}
}

// 设置年份
function set_year(url) {
	var num = document.getElementById('idsetyear').value;
	$.post(url + "ajaxfile/ajax/setyear", {
		id : num
	}, function(data) {
		alert(data);
	});
}

// 管理员手动向数据库中添加车辆
function add_car(url) {
	var brand = document.getElementById('idcarbrand').value;
	var brandx = document.getElementById('idcarbrandx').value;
	$.post(url + "ajaxfile/ajax/addcar", {
		carbrand : brand,
		carbrandx : brandx
	}, function(data) {
		alert(data);
	});
}

// 管理员拒绝工作人员添加的车辆信息
function refuse_car(url, brand, brandx) {
	$.post(url + "ajaxfile/ajax/refusecar", {
		carbrand : brand,
		carbrandx : brandx
	}, function(data) {
		// alert(data);
		$(this).parents("tr").remove();
	});
}

// 管理员审核通过工作人员添加的车辆信息
function approve_car(url, brand, brandx) {
	$.post(url + "ajaxfile/ajax/approvecar", {
		carbrand : brand,
		carbrandx : brandx
	}, function(data) {
		// alert(data);
		$(this).parents("tr").remove();
	});
}

// 工作人员审核申请信息时申请向数据库中添加不存在的车辆信息
function apply_car(url) {
	if (document.getElementById('idcarbrand').value == '其他')
		var brand = document.getElementById('idcarbrandother').value;
	else
		var brand = document.getElementById('idcarbrand').value;
	if (document.getElementById('idcarbrandx').value == '其他')
		var brandx = document.getElementById('idcarbrandxother').value;
	else
		var brandx = document.getElementById('idcarbrandx').value;
	$.post(url + "ajaxfile/ajax/applycar", {
		carbrand : brand,
		carbrandx : brandx
	}, function(data) {
		alert(data);
		document.getElementById('applycar').disabled = true;
	});
}
// 用户管理界面更新用户权限
function update_user(url, username) {
	if (document.getElementById('idapply_'+username).checked == true) {
		var apply = 1;
	} else {
		var apply = 0;
	}
	if (document.getElementById('idmanage_'+username).checked == true) {
		var manage = 1;
	} else {
		var manage = 0;
	}
	if (document.getElementById('idprint_'+username).checked == true) {
		var print = 1;
	} else {
		var print = 0;
	}
	if (document.getElementById('idpara_'+username).checked == true) {
		var para = 1;
	} else {
		var para = 0;
	}
	if (document.getElementById('idblack_'+username).checked == true) {
		var black = 1;
	} else {
		var black = 0;
	}
	if (document.getElementById('iddata_'+username).checked == true) {
		var data = 1;
	} else {
		var data = 0;
	}
	if (document.getElementById('idquser_'+username).checked == true) {
		var quser = 1;
	} else {
		var quser = 0;
	}
	if (document.getElementById('idqcar_'+username).checked == true) {
		var qcar = 1;
	} else {
		var qcar = 0;
	}
	if (document.getElementById('idviolate_'+username).checked == true) {
		var violate = 1;
	} else {
		var violate = 0;
	}
	if (document.getElementById('idviolatem_'+username).checked == true) {
		var violatem = 1;
	} else {
		var violatem = 0;
	}
	if (document.getElementById('idusers_'+username).checked == true) {
		var users = 1;
	} else {
		var users = 0;
	}

	$.post(url + "admin/users/update_user", {
		username : username,
		apply : apply,
		manage : manage,
		print : print,
		para : para,
		users : users,
		black : black,
		data : data,
		quser : quser,
		qcar : qcar,
		violate : violate,
		violatem : violatem
	}, function(data) {
		alert(data);
		location.reload();
	});
}
// 用户管理界面添加用户
function add_user(url) {
	var username = document.getElementById('idusername').value;
	var password = document.getElementById('idpassword').value;
	if (document.getElementById('idapply').checked == true) {
		var apply = 1;
	} else {
		var apply = 0;
	}
	if (document.getElementById('idmanage').checked == true) {
		var manage = 1;
	} else {
		var manage = 0;
	}
	if (document.getElementById('idprint').checked == true) {
		var print = 1;
	} else {
		var print = 0;
	}
	if (document.getElementById('idpara').checked == true) {
		var para = 1;
	} else {
		var para = 0;
	}
	if (document.getElementById('idblack').checked == true) {
		var black = 1;
	} else {
		var black = 0;
	}
	if (document.getElementById('iddata').checked == true) {
		var data = 1;
	} else {
		var data = 0;
	}
	if (document.getElementById('idquser').checked == true) {
		var quser = 1;
	} else {
		var quser = 0;
	}
	if (document.getElementById('idqcar').checked == true) {
		var qcar = 1;
	} else {
		var qcar = 0;
	}
	if (document.getElementById('idviolate').checked == true) {
		var violate = 1;
	} else {
		var violate = 0;
	}
	if (document.getElementById('idviolatem').checked == true) {
		var violatem = 1;
	} else {
		var violatem = 0;
	}

	$.post(url + "admin/users/add_user", {
		username : username,
		password : password,
		apply : apply,
		manage : manage,
		print : print,
		para : para,
		black : black,
		data : data,
		quser : quser,
		qcar : qcar,
		violate : violate,
		violatem : violatem
	}, function(data) {
		if (data == "错误") {
			alert("用户名和密码皆不能为空");
		} else {
			alert("添加成功");
			location.reload();
			//$("#list_header").after(data);
		}
	});
}

// 用户管理界面删除用户
function delete_user(url, username) {
	$.post(url + "admin/users/delete_user", {
		username : username
	}, function(data) {
		alert(data);
		location.reload();
	});
}

// 删除申请记录
function delete_record(url, aid, status, applytype) {
	if (status == "已通过") {
		alert("该申请已通过，不能删除");
	} else {
		$.post(url + "ajaxfile/ajax/delete_record", {
			aid : aid,
			applytype : applytype
		}, function(data) {
			if (data == "删除成功") {
				$(this).parents("tr").remove();
			} else
				alert(data);
		});
	}
}
// 参数页面添加违规类型
function add_violate_type(url) {
	var viotype = document.getElementById('idviotype').value;
	$.post(url + "admin/para/add_violate_type", {
		type : viotype
	}, function(data) {
		if (data == "错误") {
			alert("表格不能为空");
		} else {
			alert("添加成功");
			$("#list_header_violate_type").after(data);
		}
	});
}
// 参数界面删除违规类型
function delete_violate_type(url, viotype) {
	$.post(url + "admin/para/del_violate_type", {
		type : viotype
	}, function(data) {
		alert(data);
		$(this).parents("tr").remove();
	});
}

// 参数页面添加违规地点
function add_violate_addr(url) {
	var vioaddr = document.getElementById('idvioaddr').value;
	$.post(url + "admin/para/add_violate_addr", {
		addr : vioaddr
	}, function(data) {
		if (data == "错误") {
			alert("表格不能为空");
		} else {
			alert("添加成功");
			$("#list_header_violate_addr").after(data);
		}
	});
}

// 参数界面删除违规地址
function delete_violate_addr(url, vioaddr) {
	$.post(url + "admin/para/del_violate_addr", {
		addr : vioaddr
	}, function(data) {
		alert(data);
		$(this).parents("tr").remove();
	});
}

// 参数界面添加ip地址
function add_ip(url) {
	var ip = document.getElementById('idip').value;
	var ipinfo = document.getElementById('idipinfo').value;
	$.post(url + "admin/para/add_ip", {
		ip : ip,
		ipinfo : ipinfo
	}, function(data) {
		if (data == "错误") {
			alert("表格不能为空");
		} else {
			alert("添加成功");
			$("#list_header").after(data);
		}
	});
}

// 参数界面删除ip地址
function delete_ip(url, ip) {
	$.post(url + "admin/para/delete_ip", {
		ip : ip
	}, function(data) {
		alert(data);
		$(this).parents("tr").remove();
	});
}

// 黑名单管理界面添加黑名单车辆
function add_black(url) {
	var carnum = document.getElementById('blackcar').value;
	var info = document.getElementById('blackinfo').value;
	$.post(url + "admin/blacklist/add_black", {
		carnum : carnum,
		info : info
	}, function(data) {
		if (data == "错误") {
			alert("车牌号和备注信息皆不能为空");
		} else if (data == "添加失败") {
			alert("该信息已存在");
		} else {
			alert("添加成功");
			$("#list_header").after(data);
		}
	});
}

// 黑名单管理界面删除黑名单中的车辆
function delete_black(url, carnum) {
	$.post(url + "admin/blacklist/delete_black", {
		carnum : carnum
	}, function(data) {
		$(this).parents("tr").remove();
		alert(data);
	});
}

// 黑名单管理界面解除锁定黑名单中的车辆
function unlock_black(url, carnum) {
	$.post(url + "admin/blacklist/unlock_black", {
		carnum : carnum
	}, function(data) {
		alert(data);
	});
}

// 黑名单管理界面永久锁定黑名单中的车辆
function lock_black(url, carnum) {
	$.post(url + "admin/blacklist/lock_black", {
		carnum : carnum
	}, function(data) {
		alert(data);
	});
}

// 数据维护界面根据申请类别不同调出不同的checkbox
function getcheckbox() {
	var applytype = document.getElementById('idapplytype').value;
	if (applytype == "请选择") {
		document.getElementById('data').innerHTML = "";
	}
	if (applytype == "全部类别") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"applytype\"/>申请类型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"applicant\"/>申请人&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>申请人手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone1\"/>申请人家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone2\"/>申请人单位电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownermobile\"/>驾驶人手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"pid\"/>工作证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"company\"/>学院(单位)&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;<input type=\"checkbox\" name=\"check\" value=\"money\"/>收费金额&nbsp;<input type=\"checkbox\" name=\"check\" value=\"parkingpermitid\"/>停车证号&nbsp;";
	}
	if (applytype == "北航教职工为本人或配偶申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"applicant\"/>教职工姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"teachertype\"/>编制类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"pid\"/>工作证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"company\"/>学院(单位)&nbsp;<input type=\"checkbox\" name=\"check\" value=\"address\"/>居住地址&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone1\"/>家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone2\"/>学院(单位)电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"email\"/>电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownerrelation\"/>与车主关系&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "北航教职工为子女申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"applicant\"/>教职工姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"pid\"/>工作证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"company\"/>学院(单位)&nbsp;<input type=\"checkbox\" name=\"check\" value=\"address\"/>居住地址&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>联系电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"teacherrelation\"/>与子女关系&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativename\"/>子女姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativeidcard\"/>子女身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativeaddress\"/>子女居住地址&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativemobile\"/>子女手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativephone1\"/>子女家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativephone2\"/>子女单位电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativeemail\"/>子女电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownerrelation\"/>与车主关系&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "北航学生为本人申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"applicant\"/>学生姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"pid\"/>学生证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"company\"/>学院&nbsp;<input type=\"checkbox\" name=\"check\" value=\"address\"/>居住地址&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone1\"/>家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone2\"/>学院(单位)电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"email\"/>电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownerrelation\"/>与车主关系&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "北航学校公车申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"company\"/>学院(单位)&nbsp;<input type=\"checkbox\" name=\"check\" value=\"manincharge\"/>负责人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"operator\"/>经办人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>联系电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "附中附小幼儿园学生家长申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"applicant\"/>家长姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"pid\"/>学生证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"company\"/>单位名称&nbsp;<input type=\"checkbox\" name=\"check\" value=\"companyaddress\"/>单位地址&nbsp;<input type=\"checkbox\" name=\"check\" value=\"address\"/>居住地址&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone1\"/>家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone2\"/>单位电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"email\"/>电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"childname\"/>学生姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"childschool\"/>学生学校&nbsp;<input type=\"checkbox\" name=\"check\" value=\"childgrade\"/>学生班级&nbsp;<input type=\"checkbox\" name=\"check\" value=\"childschoolcharger\"/>学校负责人&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownerrelation\"/>与车主关系&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "居住校内的社会人员申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"applicant\"/>申请人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"address\"/>居住地址&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone1\"/>家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone2\"/>单位电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"email\"/>电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownerrelation\"/>与车主关系&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "房主为校内租房的社会人员申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"applicant\"/>租房人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"address\"/>居住地址&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone1\"/>家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone2\"/>单位电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"email\"/>电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"houseownername\"/>房主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"houseownerpid\"/>房主工作证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"houseowneridcard\"/>房主身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"houseownercompany\"/>房主工作单位&nbsp;<input type=\"checkbox\" name=\"check\" value=\"houseownermobile\"/>房主联系电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownerrelation\"/>与车主关系&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "校内办公的外单位人员申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"companyinbuaa\"/>单位名称&nbsp;<input type=\"checkbox\" name=\"check\" value=\"manincharge\"/>负责人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"operator\"/>经办人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>联系电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>车主身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownermobile\"/>车主手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone1\"/>车主家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone2\"/>车主办公电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"email\"/>车主电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "其他用工和送货施工车辆申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"applicant\"/>申请人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone1\"/>家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone2\"/>单位电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"email\"/>电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"servicecompany\"/>服务单位&nbsp;<input type=\"checkbox\" name=\"check\" value=\"servicecharger\"/>负责人&nbsp;<input type=\"checkbox\" name=\"check\" value=\"servicemobile\"/>服务单位电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"servicetype\"/>服务人员类型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownerrelation\"/>与车主关系&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "业务单位人员申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"company\"/>单位名称&nbsp;<input type=\"checkbox\" name=\"check\" value=\"manincharge\"/>负责人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"operator\"/>经办人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>联系电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>车主身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownermobile\"/>车主手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone1\"/>车主家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone2\"/>车主办公电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"email\"/>车主电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownerjob\"/>车主职务&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownercompany\"/>车主单位&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "嘉宾") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"company\"/>单位名称&nbsp;<input type=\"checkbox\" name=\"check\" value=\"manincharge\"/>负责人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"operator\"/>经办人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>联系电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>车主身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownermobile\"/>车主手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone1\"/>车主家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone2\"/>车主办公电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"email\"/>车主电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownerjob\"/>车主职务&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownercompany\"/>车主单位&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "701所职工为本人或配偶申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"applicant\"/>职工姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"pid\"/>工作证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"address\"/>居住地址&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone1\"/>家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone2\"/>单位电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"email\"/>电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownerrelation\"/>与车主关系&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "701所职工为子女申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"applicant\"/>职工姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"pid\"/>工作证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"address\"/>居住地址&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>联系电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"teacherrelation\"/>与子女关系&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativename\"/>子女姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativeidcard\"/>子女身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativeaddress\"/>子女居住地址&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativemobile\"/>子女手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativephone1\"/>子女家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativephone2\"/>子女单位电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"relativeemail\"/>子女电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownerrelation\"/>与车主关系&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "701所业务单位人员申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"manincharge\"/>负责人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"operator\"/>经办人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>联系电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carowner\"/>车主姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"idcard\"/>车主身份证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownermobile\"/>车主手机号码&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone1\"/>车主家庭电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"phone2\"/>车主办公电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"email\"/>车主电子邮箱&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownerjob\"/>车主职务&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carownercompany\"/>车主单位&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
	if (applytype == "通用车证申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"manincharge\"/>负责人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"operator\"/>经办人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>联系电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"time\"/>申请时间&nbsp;";
	}
}

// NMB数据维护界面根据申请类别不同调出不同的checkbox
function getcheckboxfornmb() {
	var applytype = document.getElementById('idapplytype').value;
	if (applytype == "请选择") {
		document.getElementById('data').innerHTML = "";
	}
	if (applytype == "北航教职工为本人或配偶申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"applicant\"/>教职工姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"pid\"/>工作证号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"company\"/>学院(单位)&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;";
	}
	if (applytype == "北航学校公车申请") {
		document.getElementById('data').innerHTML = "<input type=\"checkbox\" name=\"check\" value=\"company\"/>学院(单位)&nbsp;<input type=\"checkbox\" name=\"check\" value=\"manincharge\"/>负责人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"operator\"/>经办人姓名&nbsp;<input type=\"checkbox\" name=\"check\" value=\"mobile\"/>联系电话&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carnum\"/>车牌号&nbsp;<input type=\"checkbox\" name=\"check\" value=\"cartype\"/>车辆类别&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrand\"/>车辆品牌&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carbrandx\"/>车系车型&nbsp;<input type=\"checkbox\" name=\"check\" value=\"carcolor\"/>车辆颜色&nbsp;";
	}
}

// 数据维护界面导出所需数据项
function export_info(url) {
	var begintime = document.getElementById('begintime').value;
	var endtime = document.getElementById('endtime').value;
	var applytype = document.getElementById('idapplytype').value;
	var checkedoption = document.getElementsByName('check');
	var checked_string = "";// 数据库select的字段
	// var checked_value = [];
	var checked_num = 0;// 获取导入表所需的列数
	for ( var i = 0; i < checkedoption.length; i++) {
		if (checkedoption[i].checked) {
			checked_string += checkedoption[i].value;
			checked_string += ",";
			// checked_value[checked_num] = checkedoption[i].value;
			checked_num++;
		}
	}
	// alert(checked_value);
	// for (var m = 0;m<j ;m++ )
	// {
	// alert(array[m]);
	// }
	$.post(url + "admin/data/export", {
		begintime : begintime,
		endtime : endtime,
		applytype : applytype,
		checked_string : checked_string,
		checked_num : checked_num
	}, function(data) {
		alert("导出成功，点击下载链接下载文件");
		// $(this).parents("tr").remove();
		$("#download").html(data);

	});
}

// 数据维护界面导出各类别统计出的申请人数和费用
function export_count(url) {
	var begintime = document.getElementById('begintime_count').value;
	var endtime = document.getElementById('endtime_count').value;
	$.post(url + "admin/data/export_count", {
		begintime : begintime,
		endtime : endtime
	}, function(data) {
		alert("导出成功，点击下载链接下载文件");
		$("#download_count").html(data);
	});
}

// 数据维护界面统计申请数量、申请费用等数据
function count_info(url) {
	var begintime = document.getElementById('begintime_count').value;
	var endtime = document.getElementById('endtime_count').value;
	var applytype = document.getElementById('idapplytype_count').value;
	var company = document.getElementById('idcompany').value;
	var status = document.getElementById('idstatus').value;
	var isprint = document.getElementById('idprint').value;
	var info = document.getElementById('idinfo').value;
	var opuser = document.getElementById('idopuser').value;
	var teachertype = document.getElementById('idteachertype').value;
	var livestatus = document.getElementById('idlivestatus').value;
	var addresstype = document.getElementById('idaddresstype').value;
	var carownerrelation = document.getElementById('idcarownerrelation').value;
	var cartype = document.getElementById('idcartype').value;
	var carseat = document.getElementById('idcarseat').value;
	var content = document.getElementById('idcontent').value;
	$.post(url + "admin/data/count_info", {
		begintime : begintime,
		endtime : endtime,
		applytype : applytype,
		company : company,
		status : status,
		isprint : isprint,
		info : info,
		opuser : opuser,
		teachertype : teachertype,
		livestatus : livestatus,
		addresstype : addresstype,
		carownerrelation : carownerrelation,
		cartype : cartype,
		carseat : carseat,
		content : content
	}, function(data) {
		$("#count_info").html(data);

	});
}

// 参数设置界面设置费用
function set_money(url) {
	var applytype = document.getElementById('idapplytype').value;
	var teachertype = document.getElementById('idteachertype').value;
	var addresstype = document.getElementById('idaddresstype').value;
	var carcount = document.getElementById('idcarcount').value;
	var jan = document.getElementById('idjan').value;
	var feb = document.getElementById('idfeb').value;
	var mar = document.getElementById('idmar').value;
	var apr = document.getElementById('idapr').value;
	var may = document.getElementById('idmay').value;
	var jun = document.getElementById('idjun').value;
	var jul = document.getElementById('idjul').value;
	var aug = document.getElementById('idaug').value;
	var sep = document.getElementById('idsep').value;
	var oct = document.getElementById('idoct').value;
	var nov = document.getElementById('idnov').value;
	var dec = document.getElementById('iddec').value;
	$.post(url + "admin/para/set_money", {
		applytype : applytype,
		teachertype : teachertype,
		addresstype : addresstype,
		carcount : carcount,
		jan : jan,
		feb : feb,
		mar : mar,
		apr : apr,
		may : may,
		jun : jun,
		jul : jul,
		aug : aug,
		sep : sep,
		oct : oct,
		nov : nov,
		dec : dec
	}, function(data) {
		alert(data);

	});
}

// 当选择申请类型、居住类型和车辆数目时，自动填充月份费用设置
function get_money(url) {
	var applytype = document.getElementById('idapplytype').value;
	var teachertype = document.getElementById('idteachertype').value;
	var addresstype = document.getElementById('idaddresstype').value;
	var carcount = document.getElementById('idcarcount').value;
	$.get(url + "admin/para/get_money", {
		applytype : applytype,
		teachertype : teachertype,
		addresstype : addresstype,
		carcount : carcount
	}, function(data) {
		var array = data.split("|");
		document.getElementById("idjan").value = array[0];
		document.getElementById("idfeb").value = array[1];
		document.getElementById("idmar").value = array[2];
		document.getElementById("idapr").value = array[3];
		document.getElementById("idmay").value = array[4];
		document.getElementById("idjun").value = array[5];
		document.getElementById("idjul").value = array[6];
		document.getElementById("idaug").value = array[7];
		document.getElementById("idsep").value = array[8];
		document.getElementById("idoct").value = array[9];
		document.getElementById("idnov").value = array[10];
		document.getElementById("iddec").value = array[11];
	});
}

// 动态获取应交费用
function compute_money(url, type, applytype, teachertype, addresstype, pid,
		carseat) {
	var carownerrelation = document.getElementById('idcarownerrelation').value;
	//alert(carownerrelation);
	$.post(url + "ajaxfile/ajax/compute_money", {
		type : type,
		applytype : applytype,
		teachertype : teachertype,
		addresstype : addresstype,
		pid : pid,
		carseat : carseat,
		carownerrelation : carownerrelation
	}, function(data) {
		document.getElementById("idmoney").value = data;
	});
}

// 若工作人员快速申请时选择了需要管理员审核的信息，将‘通过’按钮置灰
function disable_approve(usertype) {
	if (usertype == 'user') {
		var carseat = document.getElementById('idcarseat').value;
		var carownerrelation = document.getElementById('idcarownerrelation').value;
		var cartype = document.getElementById('idcartype').value;
		if (carseat == '19座以上' || cartype == '货车' || cartype == '其他'
				|| carownerrelation == '其他' || carownerrelation == '他人私车'
				|| carownerrelation == '单位公车')
			document.getElementById("approve").disabled = true;
		else
			document.getElementById("approve").disabled = false;
	}
}

// 通用车证申请，根据通用类型决定是否显示费用
function general_money(generaltype) {
	var generaltype = document.getElementById('idgeneraltype').value;
	if (generaltype == '通用嘉宾') {
		document.getElementById('general_money').style.display = 'none';
	}
	if (generaltype == '通用业务') {
		document.getElementById('general_money').style.display = '';
	}
}

function warningChange(){
	alert("请勿修改此项！");
}