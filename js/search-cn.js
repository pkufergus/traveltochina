/**
 * 
 */
// var baseUrl = "https://staging.epower.amadeus.com/etraveltochina/";
var baseUrl = "https://www-amer.epower.amadeus.com/etraveltochina/";
$(function() {

	$(document).bind("click", function(e) {
		var target = $(e.target);
		if (target.closest(".pop").length == 0) {
			$("#auto-parent-div").hide();
			$("#lot-show-div").hide();

		}
	});

	changeTripType('double');
	$("#d-deperate-city").keyup(function() {
		var deperateCity = $("#d-deperate-city").val();
		if (deperateCity.length > 1) {
			keyUpAjax('deperate', deperateCity);
		}
	});
	$("#d-to-city").keyup(function() {
		var toCityNew = $("#d-to-city").val();
		if (toCityNew.length > 1) {
			keyUpAjax('arrive', toCityNew);
		}
	});

	$("#s-from-city").keyup(function() {
		var deperateCity = $("#s-from-city").val();
		if (deperateCity.length > 1) {
			keyUpAjax('deperate', deperateCity);
		}
	});

	$("#double-search-btn").click(function() {
		doubleSearch();
	});

	$("#single-search-btn").click(function() {
		singleSearch();
	});

	$("#lot-search-btn").click(function() {
		lotSearch();
	});
});

function keyUpAjaxAir(type) {
	var prefix = $("#" + type + "-air-company").val();
	if (prefix.length > 1) {
		$.ajax({
			type : 'GET',
			url : '/v1/ajax/auto_complete_air.json',
			data : {
				mode : 'airline',
				prefix : prefix
			},
			success : function(result) {
				keyUpAjaxAirCallBack(eval(result), type);
			},
			error : function() {

			}
		});
	}

}
function keyUpAjaxAirCallBack(result, type) {
	var pTmp = "";
	for (var key = 0; key < result.length; key++) {
		console.log(result[key].label);
		pTmp += "<p class=auto-air-p onclick=\"keyUpAjaxAirClick('"
				+ result[key].label + "&" + result[key].value + "&" + type
				+ "')\">" + result[key].label + "</p>";
	}
	if (type == 'lot') {
		$("#lot-show-div").removeClass();
		$("#lot-show-div").addClass("auto-air-" + type);
		$("#lot-show-div").show();
		$("#lot-show-div").html(pTmp);
	} else {
		$("#auto-parent-div").removeClass();
		$("#auto-parent-div").addClass("auto-air-" + type);
		$("#auto-parent-div").show();
		$("#auto-parent-div").html(pTmp);
	}

}

function keyUpAjaxAirClick(obj) {

	var label = obj.split("&")[0];
	var value = obj.split("&")[1];
	var type = obj.split("&")[2];
	$("#" + type + "-air-company").val(label);
	$("#" + type + "-air-company-hid").val(value);
	if (type == 'lot') {
		$("#lot-show-div").hide();
	} else {
		$("#auto-parent-div").hide();
	}

}

function keyUpAjax(type, city) {
	$.ajax({
		type : 'GET',
		url : '/v1/ajax/auto_complete.json',
		data : {
			prefix : city
		},
		success : function(result) {
			keyUpCallBack(type, result);
		},
		error : function() {

		}
	});
}
function keyUpCallBack(type, result) {
	var divTemp = "";
	result = eval(result);
	for (var key = 0; key < result.length; key++) {
		var labelTmp = result[key].label;
    var valTmp = result[key].value;
    var pos = labelTmp.lastIndexOf("<span class='FoundedStr'>");
    var i = 0;
    while (i < 5 && pos >= 0) {
      labelTmp = labelTmp.replace("<span class='FoundedStr'>", "");
      i++;
      pos = labelTmp.lastIndexOf("<span class='FoundedStr'>");
    }
    pos = labelTmp.lastIndexOf("</span>");
    i = 0;
    while (i < 5 && pos >= 0) {
      labelTmp = labelTmp.replace("</span>", "");
      i++;
      pos = labelTmp.lastIndexOf("</span>");
    }
    divTemp += "<p onclick=\"autoClick" + type + "('" + labelTmp + "&"
      + valTmp + "')\" class='auto-child-p'>" + result[key].label
      + "</p>"
  }
  $("#auto-parent-div").removeAttr("style");
  $("#auto-parent-div").html(divTemp);
  if($("#auto-parent-div").height() > 268){
    $("#auto-parent-div").css("height","268px");
  }
  $("#auto-parent-div").removeClass();
  $("#auto-parent-div").addClass("auto-" + type + "-city");
  $("#auto-parent-div").show();

}
function autoClickdeperate(obj) {
  $("#auto-parent-div").hide();
  $("#auto-parent-div").html('');
  var label = obj.split("&")[0];
  var value = obj.split("&")[1];
  // $("#d-deperate-ciy").attr("value",label);
  document.getElementById("d-deperate-city").value = label;
  document.getElementById("d-deperate-city-hid").value = value;
  // $("#d-deperate-ciy-hid").attr("value", value);
}
function autoClickarrive(obj) {
  $("#auto-parent-div").hide();
  $("#auto-parent-div").html('');
  var label = obj.split("&")[0];
  var value = obj.split("&")[1];
  // $("#d-deperate-ciy").attr("value",label);
  document.getElementById("d-to-city").value = label;
  document.getElementById("d-to-city-hid").value = value;
  // $("#d-deperate-ciy-hid").attr("value", value);
}
function autoClicksfrom(obj) {
  $("#auto-parent-div").hide();
  $("#auto-parent-div").html('');
  var label = obj.split("&")[0];
  var value = obj.split("&")[1];
  // $("#d-deperate-ciy").attr("value",label);
  document.getElementById("s-from-city").value = label;
  document.getElementById("s-from-city-hid").value = value;
}
function autoClicksto(obj) {
  $("#auto-parent-div").hide();
  $("#auto-parent-div").html('');
  var label = obj.split("&")[0];
  var value = obj.split("&")[1];
  // $("#d-deperate-ciy").attr("value",label);
  document.getElementById("s-to-city").value = label;
  document.getElementById("s-to-city-hid").value = value;
}
function otherCity(obj) {
  $("#auto-parent-div").hide();
  $("#" + obj).focus();
}
function cityAutoComplete(obj) {
  $
    .ajax({
      type : 'GET',
      url : '/v1/city/from_to_city.json',
      data : {
        country : 'CN'
      },
      success : function(result) {
        if (obj == 'dfrom') {
          var pTmp = "";
          for (var k = 0; k < result[0].length; k++) {
            pTmp += "<p onclick=\"deperateSelClick('"
              + result[0][k].chineseName
              + "&"
              + result[0][k].cityCode
              + "')\" style='font-size:12px;cursor:pointer'>"
              + result[0][k].chineseName + "&nbsp;&nbsp;"
              + result[0][k].cityCode + "</p>"
          }
          pTmp += "<p style='font-size:12px;cursor:pointer;font-weight:600' onclick=otherCity('d-deperate-city')>其它城市(中文或英文)</p>";
          $("#auto-parent-div").removeAttr("style");
          $("#auto-parent-div").html(pTmp);
          $("#auto-parent-div").removeClass();
          console.log("height:"+$("#auto-parent-div").height());
          if($("#auto-parent-div").height() > 268){
            $("#auto-parent-div").css("height","268px");
          }

          $("#auto-parent-div").addClass("auto-deperate-city");
          $("#auto-parent-div").show();

        } else if (obj == 'dto') {
          var pTmp = "";
          for (var k = 0; k < result[1].length; k++) {
            pTmp += "<p onclick=\"toSelClick('"
              + result[1][k].chineseName
              + "&"
              + result[1][k].cityCode
              + "')\" style='font-size:12px;cursor:pointer'>"
              + result[1][k].chineseName + "&nbsp;&nbsp;"
									+ result[1][k].cityCode + "</p>"
						}
						pTmp += "<p style='font-size:12px;cursor:pointer;font-weight:600' onclick=otherCity('d-to-city')>其它城市(中文或英文)</p>";
						$("#auto-parent-div").html(pTmp);
						$("#auto-parent-div").removeAttr("style");
						if($("#auto-parent-div").height() > 268){
							$("#auto-parent-div").css("height","268px");
						}
						
						$("#auto-parent-div").removeClass();
						$("#auto-parent-div").addClass("auto-arrive-city");
						$("#auto-parent-div").show();
						
					} else if (obj == 'sfrom') {

						var pTmp = "";
						for (var k = 0; k < result[0].length; k++) {
							pTmp += "<p onclick=\"SdeperateSelClick('"
									+ result[0][k].chineseName
									+ "&"
									+ result[0][k].cityCode
									+ "')\" style='font-size:12px;cursor:pointer'>"
									+ result[0][k].chineseName + "&nbsp;&nbsp;"
									+ result[0][k].cityCode + "</p>"
						}
						pTmp += "<p style='font-size:12px;cursor:pointer;font-weight:600' onclick=otherCity('s-from-city')>其它城市(中文或英文)</p>";
						$("#auto-parent-div").html(pTmp);
						$("#auto-parent-div").removeAttr("style");
						if($("#auto-parent-div").height() > 268){
							$("#auto-parent-div").css("height","268px");
						}
						$("#auto-parent-div").removeClass();
						$("#auto-parent-div").addClass("auto-deperate-city-s");
						$("#auto-parent-div").show();
						 

					} else if (obj == 'sto') {

						var pTmp = "";
						for (var k = 0; k < result[1].length; k++) {
							pTmp += "<p onclick=\"StoSelClick('"
									+ result[1][k].chineseName
									+ "&"
									+ result[1][k].cityCode
									+ "')\" style='font-size:12px;cursor:pointer'>"
									+ result[1][k].chineseName + "&nbsp;&nbsp;"
									+ result[1][k].cityCode + "</p>"
						}
						pTmp += "<p style='font-size:12px;cursor:pointer;font-weight:600' onclick=otherCity('s-to-city')>其它城市(中文或英文)</p>";
						$("#auto-parent-div").html(pTmp);
						$("#auto-parent-div").removeAttr("style");
						if($("#auto-parent-div").height() > 268){
							$("#auto-parent-div").css("height","268px");
						}
						$("#auto-parent-div").removeClass();
						$("#auto-parent-div").addClass("auto-arrive-city-s");
						$("#auto-parent-div").show();
						 

					}

				},
				error : function() {

				}
			});
}
function deperateSelClick(obj) {
	$("#auto-parent-div").hide();
	$("#auto-parent-div").html('');
	document.getElementById("d-deperate-city").value = obj.split("&")[0] + "  "
			+ obj.split("&")[1];
	document.getElementById("d-deperate-city-hid").value = obj.split("&")[1]
			+ ";" + obj.split("&")[0];
}

function SdeperateSelClick(obj) {
	$("#auto-parent-div").hide();
	$("#auto-parent-div").html('');
	document.getElementById("s-from-city").value = obj.split("&")[0] + "  "
			+ obj.split("&")[1];
	document.getElementById("s-from-city-hid").value = obj.split("&")[1] + ";"
			+ obj.split("&")[0];
}

function StoSelClick(obj) {

	$("#auto-parent-div").hide();
	$("#auto-parent-div").html('');
	document.getElementById("s-to-city").value = obj.split("&")[0] + "  "
			+ obj.split("&")[1];
	document.getElementById("s-to-city-hid").value = obj.split("&")[1] + ";"
			+ obj.split("&")[0];

}

function toSelClick(obj) {

	$("#auto-parent-div").hide();
	$("#auto-parent-div").html('');
	document.getElementById("d-to-city").value = obj.split("&")[0] + "  "
			+ obj.split("&")[1];
	document.getElementById("d-to-city-hid").value = obj.split("&")[1] + ";"
			+ obj.split("&")[0];

}
function doubleSearch() {
	if (!doubleCheck()) {
		return;
	}
	var doubleBaseUrl = baseUrl;

	var AdtCount = $("#adt-select").val();
	doubleBaseUrl += "#AdtCount=" + AdtCount;

	var childCount = $("#child-select").val();
	if (childCount != '0') {
		doubleBaseUrl += "&ChdCount=" + childCount;
	}

	doubleBaseUrl += "&Culture=zh-CN";

	var babyCount = $("#baby-select").val();
	if (babyCount != '0') {
		doubleBaseUrl += "&InfCount=" + babyCount;
	}

	var fromDate = $("#d-from-date").val();
	// fromDate = fromDate.replace(/\-/g,"/");
	// var fromDateArry = fromDate.split("-");
	// fromDate = fromDateArry[1] + "/" + fromDateArry[2] + "/" +
	// fromDateArry[0];
	doubleBaseUrl += "&DepartureDate=" + fromDate;

	var deperateCity = $("#d-deperate-city-hid").val().split(";")[0];
	doubleBaseUrl += "&From=" + deperateCity;

	doubleBaseUrl += "&ManualCostAmount=&ManualCostType=none&Method=Search&QFrom=C&QTo=C";

	var toDate = $("#d-to-date").val();
	// toDate = toDate.replace(/\-/g,"/");
	// var toDateArry = toDate.split("-");
	// toDate = toDateArry[1] + "/" + toDateArry[2] + "/" + toDateArry[0];
	doubleBaseUrl += "&ReturnDate=" + toDate;

	var toCity = $("#d-to-city-hid").val().split(";")[0];
	doubleBaseUrl += "&To=" + toCity;

	var fromTime = $("#d-departure-time").val();
	if (fromTime != '00:01') {
		doubleBaseUrl += "&DepartureTime=" + fromTime;
	}

	var toTime = $("#d-to-time").val();
	if (toTime != '00:01') {
		doubleBaseUrl += "&ReturnTime=" + toTime;
	}
	doubleBaseUrl += "&ArrivalFlexibleDate=" + $("#d-from-flex").val()
			+ "&DepartureFlexibleDate=" + $("#d-to-flex").val()
			+ "&CabinClass=" + $("#d-cabin-class").val()
			+ "&DirectFlightsOnly=" + $('#d-flight-chk').is(':checked');
	var airCompany = $("#d-air-company-hid").val();
	if (airCompany != '') {
		doubleBaseUrl += "&PrefAirline1=" + airCompany;
	}
	doubleBaseUrl += "&FamilyCardDiscount=&FamilyDiscount=&IsMajorCabin=";
	$("#warn-span").html('');
	console.log(doubleBaseUrl);
	window.open(doubleBaseUrl);
}
function doubleCheck() {
	var fromCity = $("#d-deperate-city").val();
	var toCity = $("#d-to-city").val();
	var fromDate = $("#d-from-date").val();
	var toDate = $("#d-to-date").val();
	var fromTime = $("#d-departure-time").val();
	var toTime = $("#d-to-time").val();
	if (fromCity == '') {
		$("#d-deperate-city").focus();
		$("#warn-span").html('请填写始发城市');
		return false;
	}

	if (toCity == '') {
		$("#d-to-city").focus();
		$("#warn-span").html('请填写目的城市');
		return false;
	}

	if (fromDate == '') {
		$("#d-from-date").focus();
		$("#warn-span").html('请填写目的城市');
		return false;
	}

	if (toDate == '') {
		$("#d-to-date").focus();
		$("#warn-span").html('请填写目的城市');
		return false;
	}
	if ($("#adt-select").val() == '0') {
		$("#adt-select").focus();
		$("#warn-span").html('成人数不能为0');
		return false;
	}
	return true;
}
function IFrameReSize(obj) {
	var realHeight = 0;
	if (navigator.userAgent.indexOf("Firefox") > 0
			|| navigator.userAgent.indexOf("Mozilla") > 0
			|| navigator.userAgent.indexOf("Safari") > 0
			|| navigator.userAgent.indexOf("Chrome") > 0) { // Mozilla,
		// Safari,Chrome,
		// ...
		realHeight = window.document.documentElement.offsetHeight;
	} else if (navigator.userAgent.indexOf("MSIE") > 0) { // IE
		var bodyScrollHeight = window.document.body.scrollHeight; // 取得body的scrollHeight
		var elementScrollHeight = window.document.documentElement.scrollHeight; // 取得documentElement的scrollHeight
		realHeight = Math.max(bodyScrollHeight, elementScrollHeight); // 取当中比较大的一个
	} else {// 其他浏览器
		realHeight = window.document.body.scrollHeight
				+ window.document.body.clientHeight;
	}
	if ('double' == obj || 'single' == obj) {
		realHeight = 386;
		$("#demo-iframe").removeClass();
		$("#demo-iframe").addClass("iframe-single-double");
		if(navigator.userAgent.indexOf("MSIE 8.0") > 0 || navigator.userAgent.indexOf("MSIE 9.0") > 0){
			realHeight = 500;
		}
		// $("#demo-iframe").css("margin-top","-339px");
	} else {
		$("#demo-iframe").removeClass();
		$("#demo-iframe").addClass("iframe-lot");
		realHeight = 480;
		if(navigator.userAgent.indexOf("MSIE 8.0") > 0 || navigator.userAgent.indexOf("MSIE 9.0") > 0){
			realHeight = 700;
		}
		// $("#demo-iframe").css("margin-top","-428px");
	}
	parent.document.getElementById("iframepage").height = realHeight;

}

function changeTripType(obj) {
	var tripHtml = '';
	if (obj == 'double') {
		tripHtml = getDoubleTrip();
	} else if (obj == 'single') {
		tripHtml = getSingleTrip();
	} else if (obj == 'lot') {
		tripHtml = getLotTrip();
	}

	$("#trip-change-div").html(tripHtml);
	IFrameReSize(obj);
	dateRegister();
	$("#d-deperate-city").keyup(function() {
		var deperateCity = $("#d-deperate-city").val();
		if (deperateCity.length > 1) {
			keyUpAjax('deperate', deperateCity);
		}
	});
	$("#d-to-city").keyup(function() {
		var toCityNew = $("#d-to-city").val();
		if (toCityNew.length > 1) {
			keyUpAjax('arrive', toCityNew);
		}
	});

}
function getDoubleTrip() {
	var doubleHtml = "<table>"
			+

			"<tbody>"
			+ "<tr>"
			+

			// 飞行模式
			"<td colspan=2 class='round-trip-p'><div style='' id='auto-parent-div' class='auto-deperate-city'></div>"
			+ "<input type='radio' onclick=changeTripType('double') id='flightTypeRoundTrip' name='flightType' checked='checked' value='RoundTrip'>"
			+ "<label for='flightTypeRoundTrip' data-fld='NoLocalize'>往返</label>"
			+ "<input type='radio' onclick=changeTripType('single') id='flightTypeOneWay' name='flightType' value='OneWay' class='valid'> "
			+ "<label for='flightTypeOneWay' data-fld='NoLocalize'>单程</label>"
			+ " <input type='radio' onclick=changeTripType('lot') id='flightTypeMultiLeg' name='flightType' value='MultiLeg' class='valid'>"
			+ "<label for='flightTypeMultiLeg' data-fld='NoLocalize'>多航段</label>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td>"
			+ "<p class='city-p'>"

			+ "<label>始发城市</label>"
			+ "</p>"
			+ "<p id='d-deperate-city-p'>"
			+ "<input type='hidden' id='d-deperate-city-hid' />"
			+ "<input type=text id='d-deperate-city' class=sea-text />"
			+ "<span onclick=cityAutoComplete('dfrom') class='select-img-deperate'></span>"
			+ "</p>"
			+ "</td>"
			+ "<td>"
			+ "<p class='city-p'><label style=''>目的城市</label></p>"

			+ "<p><input type='hidden' id='d-to-city-hid' />"
			+ "<input style='' type=text id='d-to-city' class=sea-text />"
			+ "<span onclick=cityAutoComplete('dto') class='select-img-arrival'></span>"
			+ "</p>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td>"
			+ "<p class='city-p'>"
			+ "<label>启程日期</label>"
			+ "<label style='margin-left:120px;'>日期灵活</label>"

			+ "</p>"
			+ "<p>"
			+ "<input id='d-from-date'  class='date-pick Wdate  Wdate'"
			+ " type='text' > <select "
			+ "name='DepartureTime' id='d-departure-time' class='selectText'>"
			+ "<option value='00:01'>不限</option>"
			+ "<option value='MORNING'>上午</option>"
			+ "<option value='AFTERNOON'>下午</option>"
			+ "<option value='EVENING'>晚上</option>"
			+ "<option value='00:00'>00:00</option>"
			+ "<option value='01:00'>01:00</option>"
			+ "<option value='02:00'>02:00</option>"
			+ "<option value='03:00'>03:00</option>"
			+ "<option value='04:00'>04:00</option>"
			+ "<option value='05:00'>05:00</option>"
			+ "<option value='06:00'>06:00</option>"
			+ "<option value='07:00'>07:00</option>"
			+ "<option value='08:00'>08:00</option>"
			+ "<option value='09:00'>09:00</option>"
			+ "<option value='10:00'>10:00</option>"
			+ "<option value='11:00'>11:00</option>"
			+ "<option value='12:00'>12:00</option>"
			+ "<option value='13:00'>13:00</option>"
			+ "<option value='14:00'>14:00</option>"
			+ "<option value='15:00'>15:00</option>"
			+ "<option value='16:00'>16:00</option>"
			+ "<option value='17:00'>17:00</option>"
			+ "<option value='18:00'>18:00</option>"
			+ "<option value='19:00'>19:00</option>"
			+ "<option value='20:00'>20:00</option>"
			+ "<option value='21:00'>21:00</option>"
			+ "<option value='22:00'>22:00</option>"
			+ "<option value='23:00'>23:00</option>"
			+ "</select>"
			+ "<select id='d-from-flex' style='width: 80px;margin-left: 10px;' class='selectText'>"
			+ "<option value=''>确切日期</option>"
			+ "<option value='1C'>-1/+1 天</option>"
			+ "</select>"
			+ "</p>"
			+ "</td>"
			+ "<td>"
			+ "<p class='city-p'>"
			+ "<label>返程日期</label>"
			+ "<label style='margin-left: 114px;'>日期灵活</label>"
			+ "</p>"
			+ "<p>"
			+ "<input id='d-to-date'  class='date-pick Wdate  d-back-date' "
			+ " type='text' /> <select "
			+ "name='ReturnTime' id='d-to-time' class='selectText'>"
			+ "<option value='00:01'>不限</option>"
			+ "<option value='MORNING'>上午</option>"
			+ "<option value='AFTERNOON'>下午</option>"
			+ "<option value='EVENING'>晚上</option>"
			+ "<option value='00:00'>00:00</option>"
			+ "<option value='01:00'>01:00</option>"
			+ "<option value='02:00'>02:00</option>"
			+ "<option value='03:00'>03:00</option>"
			+ "<option value='04:00'>04:00</option>"
			+ "<option value='05:00'>05:00</option>"
			+ "<option value='06:00'>06:00</option>"
			+ "<option value='07:00'>07:00</option>"
			+ "<option value='08:00'>08:00</option>"
			+ "<option value='09:00'>09:00</option>"
			+ "<option value='10:00'>10:00</option>"
			+ "<option value='11:00'>11:00</option>"
			+ "<option value='12:00'>12:00</option>"
			+ "<option value='13:00'>13:00</option>"
			+ "<option value='14:00'>14:00</option>"
			+ "<option value='15:00'>15:00</option>"
			+ "<option value='16:00'>16:00</option>"
			+ "<option value='17:00'>17:00</option>"
			+ "<option value='18:00'>18:00</option>"
			+ "<option value='19:00'>19:00</option>"
			+ "<option value='20:00'>20:00</option>"
			+ "<option value='21:00'>21:00</option>"
			+ "<option value='22:00'>22:00</option>"
			+ "<option value='23:00'>23:00</option>"
			+ "</select>"
			+ "<select id='d-to-flex' style='width: 85px;margin-left: 3px;' class='selectText'>"
			+ "<option value=''>确切日期</option>"
			+ "<option value='1C'>-1/+1 天</option>"
			+ "</select>"
			+ "</p>"
			+ "</td>"
			+ "</tr>"
			+ "<tr>"
			+ "<td>"
			+ "<p><label style='margin-left: 0px;' class='city-p'>只选直飞航班</label>"
			+ "</td>"
			+ "<td>"
			+ "<p>"
			+ "<input id='d-flight-chk' style='' type='checkbox' />"
			+ "</p>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td>"
			+ "<lable style='margin-left: 0px;' class='city-p'>价格类型</label>"
			+ "</td>"
			+ "<td>"
			+ "<select style='' id='d-cabin-class' class='air-comp-txt'>"
			+ "<option value='Y'>经济舱</option>"
			+ "<option value='W'>高级经济舱</option>"
			+ "<option value='C'>公务舱</option>"
			+ "<option value='F'>头等舱</option>"
			+ "</select>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td>"
			+ "<p><labe style='margin-left: 0px;' class='city-p'>首选航空公司</label>"
			+ "</td>"
			+ "<td>"
			+ "<input type='hidden' id='d-air-company-hid' />"
			+ "<input onkeyup=keyUpAjaxAir('d') id='d-air-company' style='' class='air-comp-txt' type='text' /></p>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td colspan=2>"
			+ "<p class='guest-p'>旅客</p>"
			+ "</td>"
			+ "</tr>"
			+ "<tr>"
			+ "<td>"
			+ "<p class='city-p'><label>成人</label>"
			+ "</p></td>"
			+ "<td>"
			+ "<select style='width:85px'"
			+ " id='adt-select' name='ADT' class='selectText'>"
			+ "<option value='0'>0</option>"
			+ "<option selected='selected' value='1'>1</option>"
			+ "<option value='2'>2</option>"
			+ "<option value='3'>3</option>"
			+ "<option value='4'>4</option>"
			+ "<option value='5'>5</option>"
			+ "<option value='6'>6</option>"
			+ "<option value='7'>7</option>"
			+ "<option value='8'>8</option>"
			+ "<option value='9'>9</option>"
			+ "</select>"
			+ "</td></tr>"
			+ "<tr>"
			+ "<td>"
			+ "<p class='city-p'><label style=''>儿童</label></p></td><td>"
			+ "<select name='ADT' id='child-select' style='width:85px' class='selectText'>"
			+ "<option selected='selected' value='0'>0</option>"
			+ "<option  value='1'>1</option>"
			+ "<option value='2'>2</option>"
			+ "<option value='3'>3</option>"
			+ "<option value='4'>4</option>"
			+ "<option value='5'>5</option>"
			+ "<option value='6'>6</option>"
			+ "<option value='7'>7</option>"
			+ "<option value='8'>8</option>"
			+ "<option value='9'>9</option>"
			+ "</select>"
			+ "</td>"
			+ "</tr>"
			+ "<tr>"
			+ "<td>"
			+ "<label class='city-p'>婴儿 (0-2)</label></td><td>"
			+ "<select id='baby-select' style='width:85px;' name='ADT' class='selectText'>"
			+ "<option value='0'>0</option>"
			+ "	<option value='1'>1</option>"
			+ "<option value='2'>2</option>"
			+ "<option value='3'>3</option>"
			+ "<option value='4'>4</option>"
			+ "<option value='5'>5</option>"
			+ "<option value='6'>6</option>"
			+ "<option value='7'>7</option>"
			+ "<option value='8'>8</option>"
			+ "<option value='9'>9</option>"
			+ "</select>"
			+ "</td>"
			+ "</tr>"
			+ "</tbody>"
			+

			"<tfoot>"
			+ "<tr>"
			+ "<td>"
			+ "<span><a class='high-sea-href' style='margin-left: 0px;' onclick=clearEdition('flightTypeRoundTrip') href='javascript:void(0)'>清除查询条件</a></span>"
			+ "<span id='warn-span' class='warn-span'></span></td><td>"
			+ "<span><input style='' type='button' onclick=doubleSearch() id='double-search-btn' value='' class='href-button-search' /></span>"
			+ "<span><input type='button' onclick='showOrderMailDiv()' style='    position: absolute; margin-left: 28px' id='double-search-btn' value='' class='href-button' /></span>"
			+ "</td>" + "</tr>" + "</tfoot>" + "</table>";

	return doubleHtml;
}

function clearEditionD() {
	document.getElementById("d-deperate-city").value = "";
	document.getElementById("d-deperate-city-hid").value = "";
	document.getElementById("d-to-city").value = "";
	document.getElementById("d-to-city-hid").value = "";
	document.getElementById("d-from-date").value = "";
	document.getElementById("d-to-date").value = "";
}

function clearEdition(id) {
	// document.getElementById("s-from-city").value="";
	// document.getElementById("s-from-city-hid").value="";
	// document.getElementById("s-to-city").value="";
	// document.getElementById("s-to-city-hid").value="";
	// document.getElementById("s-from-date").value="";
	// document.getElementById("d-to-date").value="";
	document.getElementById(id).click();
}
function sFromKeyUp() {
	var deperateCity = $("#s-from-city").val();
	if (deperateCity.length > 1) {
		keyUpAjax('sfrom', deperateCity);
	}
}
function sToKeyUp() {
	var deperateCity = $("#s-to-city").val();
	if (deperateCity.length > 1) {
		keyUpAjax('sto', deperateCity);
	}
}
function singleSearch() {
	if (!singleCheck()) {
		return;
	}

	var singleUrl = baseUrl;

	var AdtCount = $("#s-adult-count").val();
	singleUrl += "#AdtCount=" + AdtCount;

	singleUrl += "&Culture=zh-CN";

	singleUrl += "&FlightType=OneWay";

	var ChdCount = $("#s-child-count").val();
	if (ChdCount != '0') {
		singleUrl += "&ChdCount=" + ChdCount;
	}

	var InfCount = $("#s-baby-count").val();
	if (InfCount != '0') {
		singleUrl += "&InfCount=" + InfCount;
	}

	var fromCity = $("#s-from-city-hid").val().split(";")[0];
	singleUrl += "&From=" + fromCity;

	var toCity = $("#s-to-city-hid").val().split(";")[0];
	singleUrl += "&To=" + toCity;

	var fromDate = $("#s-from-date").val();
	// var fromDateArry = fromDate.split("-");
	// fromDate = fromDateArry[1] + "/" + fromDateArry[2] + "/" +
	// fromDateArry[0];
	singleUrl += "&DepartureDate=" + fromDate;

	var fromTime = $("#s-from-time").val();
	if (fromTime != '00:01') {
		singleUrl += "&DepartureTime=" + fromTime;
	}

	singleUrl += "&ManualCostAmount=&ManualCostType=none&Method=Search&QFrom=C&QTo=C";

	var returnDate = dateOperator($("#s-from-date").val(), 7, "+");
	var returnArry = returnDate.split("-");
	returnDate = returnArry[1] + "/" + returnArry[2] + "/" + returnArry[0];
	singleUrl + "&ReturnDate=" + returnDate;

	singleUrl += "&DepartureFlexibleDate=" + $("#s-from-flex").val()
			+ "&CabinClass=" + $("#s-cabin-class").val()
			+ "&DirectFlightsOnly=" + $('#s-flight-chk').is(':checked');
	var airCompany = $("#s-air-company-hid").val();
	if (airCompany != '') {
		singleUrl += "&PrefAirline1=" + airCompany;
	}
	singleUrl += "&FamilyCardDiscount=&FamilyDiscount=&IsMajorCabin=";

	console.log(singleUrl);
	window.open(singleUrl);
}
function singleCheck() {
	var fromCity = $("#s-from-city").val();
	var toCity = $("#s-to-city").val();
	var date = $("#s-from-date").val();
	var adtCount = $("#s-adult-count").val();
	if (fromCity == '') {
		$("#s-from-city").focus();
		$("#warn-span").html('请填写始发城市');
		return false;
	}
	if (toCity == '') {
		$("#s-to-city").focus();
		$("#warn-span").html('请填写目的城市');
		return false;
	}
	if (date == '') {
		$("#s-from-date").focus();
		$("#warn-span").html('请填写启程日期');
		return false;
	}
	if (adtCount == '') {
		$("#s-adult-count").focus();
		$("#warn-span").html('成人数不能为0');
		return false;
	}
	return true;
}
function getSingleTrip() {
	var doubleHtml = "<table>"
			+ "<tbody>"
			+ "<tr>"
			+
			// 飞行模式
			"<td colspan=2 class='round-trip-p'>"
			+ "<input type='radio' onclick=changeTripType('double') id='flightTypeRoundTrip' name='flightType' value='RoundTrip'>"
			+ "<label for='flightTypeRoundTrip' data-fld='NoLocalize'>往返</label>"
			+ "<input type='radio' onclick=changeTripType('single') id='flightTypeOneWay'  checked='checked' name='flightType' value='OneWay' class='valid'> "
			+ "<label for='flightTypeOneWay' data-fld='NoLocalize'>单程</label>"
			+ " <input type='radio' onclick=changeTripType('lot') id='flightTypeMultiLeg' name='flightType' value='MultiLeg' class='valid'>"
			+ "<label for='flightTypeMultiLeg' data-fld='NoLocalize'>多航段</label><div id='auto-parent-div' class='auto-deperate-city'></div>"
			+ "</td>"
			+ "</tr>"
			+ "<tr>"
			+ "<td>"
			+ "<p class='city-p'>"
			+ "<label>始发城市</label>"
			+ "</p>"
			+ "<p id='s-deperate-city-p'>"
			+ "<input onkeyup='sFromKeyUp()' id='s-from-city' type=text class=sea-text />"
			+ "<span onclick=cityAutoComplete('sfrom') class=select-img-deperate></span>"
			+ "<input type='hidden' id='s-from-city-hid' />"
			+ "</p></td>"
			+ "<td>"
			+ "<p class='city-p'>"
			+ "<label style=''>目的城市</label></p><p>"
			+ "<input style='' onkeyup='sToKeyUp()' id='s-to-city' type=text class=sea-text />"
			+ "<span style='' onclick=cityAutoComplete('sto') class=select-img-arrival></span>"
			+ "<input type='hidden' id='s-to-city-hid' />"
			+ "</p>"
			+ "</td>"
			+ "</tr>"
			+ "<tr>"
			+ "<td>"
			+ "<p class='city-p'><label>启程日期</label><label style='margin-left:120px;'>日期灵活</label>"
			+ "</p>"
			+ "<p>"
			+ "<input  id='s-from-date' "
			+ "class='date-pick Wdate ' type='text' /> <select "
			+ "name='DepartureTime' id='s-from-time' class='selectText'>"
			+ "<option value='00:01'>不限</option>"
			+ "<option value='MORNING'>上午</option>"
			+ "<option value='AFTERNOON'>下午</option>"
			+ "<option value='EVENING'>晚上</option>"
			+ "<option value='00:00'>00:00</option>"
			+ "<option value='01:00'>01:00</option>"
			+ "<option value='02:00'>02:00</option>"
			+ "<option value='03:00'>03:00</option>"
			+ "<option value='04:00'>04:00</option>"
			+ "<option value='05:00'>05:00</option>"
			+ "<option value='06:00'>06:00</option>"
			+ "<option value='07:00'>07:00</option>"
			+ "<option value='08:00'>08:00</option>"
			+ "<option value='09:00'>09:00</option>"
			+ "<option value='10:00'>10:00</option>"
			+ "<option value='11:00'>11:00</option>"
			+ "<option value='12:00'>12:00</option>"
			+ "<option value='13:00'>13:00</option>"
			+ "<option value='14:00'>14:00</option>"
			+ "<option value='15:00'>15:00</option>"
			+ "<option value='16:00'>16:00</option>"
			+ "<option value='17:00'>17:00</option>"
			+ "<option value='18:00'>18:00</option>"
			+ "<option value='19:00'>19:00</option>"
			+ "<option value='20:00'>20:00</option>"
			+ "<option value='21:00'>21:00</option>"
			+ "<option value='22:00'>22:00</option>"
			+ "<option value='23:00'>23:00</option>"
			+ "</select>"

			+ "<select id='s-from-flex' style='width: 80px;margin-left: 10px;' class='selectText'>"
			+ "<option value=''>确切日期</option>"
			+ "<option value='1C'>-1/+1 天</option>"
			+ "</select>"
			+ "</p>"
			+ "</td><td></td>"
			+ "</tr>"

			+ "<tr>"
			+ "<td>"
			+ "<p><labe style='margin-left: 0px;' class='city-p'>只选直飞航班</label>"
			+ "</p></td>"
			+ "<td><p>"
			+ "<input id='s-flight-chk' style='' type='checkbox' />"
			+ "</p>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td>"
			+ "<lable style='margin-left: 0px;' class='city-p'>价格类型</label></td>"
			+ "<td>"
			+ "<select style='' id='s-cabin-class' class='air-comp-txt'>"
			+ "<option value='Y'>经济舱</option>"
			+ "<option value='W'>高级经济舱</option>"
			+ "<option value='C'>公务舱</option>"
			+ "<option value='F'>头等舱</option>"
			+ "</select>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td>"
			+ "<p><label style='margin-left: 0px;' class='city-p'>首选航空公司</label>"
			+ "</p>"
			+ "</td>"
			+ "<td>"
			+ "<input type='hidden' id='s-air-company-hid' />"
			+ "<input onkeyup=keyUpAjaxAir('s') id='s-air-company'"
			+ " style='' class='air-comp-txt' type='text' />"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td colspan=2>"
			+ "<p class='guest-p'>旅客</p>"
			+ "</td>"
			+ "</tr>"

			+ "<tr>"
			+ "<td>"
			+ "<p class='city-p'><label>成人</label></td><td><p>"
			+ "<select style='width:85px' id='s-adult-count' name='ADT' class='selectText'>"
			+ "<option value='0'>0</option>"
			+ "<option selected='selected' value='1'>1</option>"
			+ "<option value='2'>2</option>"
			+ "<option value='3'>3</option>"
			+ "<option value='4'>4</option>"
			+ "<option value='5'>5</option>"
			+ "<option value='6'>6</option>"
			+ "<option value='7'>7</option>"
			+ "<option value='8'>8</option>"
			+ "<option value='9'>9</option>"
			+ "</select>"
			+ "</p>"
			+ "<td>"
			+ "</tr>"
			+ "<tr>"
			+ "<td>"
			+ "<p class=city-p>"
			+ "<label style=''>儿童</label></td>"
			+ "<td>"
			+ "<select name='ADT' id='s-child-count' style='width:85px' class='selectText'>"
			+ "<option selected='selected' value='0'>0</option>"
			+ "<option  value='1'>1</option>"
			+ "<option value='2'>2</option>"
			+ "<option value='3'>3</option>"
			+ "<option value='4'>4</option>"
			+ "<option value='5'>5</option>"
			+ "<option value='6'>6</option>"
			+ "<option value='7'>7</option>"
			+ "<option value='8'>8</option>"
			+ "<option value='9'>9</option>"
			+ "</select>"
			+ "</td>"
			+ "</tr>"
			+ "<tr>"
			+ "<td>"
			+ "<label class='city-p'>婴儿 (0-2)</label></td>"
			+ "<td>"
			+ "<select id='s-baby-count' style='width:85px;' name='ADT' class='selectText'>"
			+ "<option value='0'>0</option>"
			+ "	<option value='1'>1</option>"
			+ "<option value='2'>2</option>"
			+ "<option value='3'>3</option>"
			+ "<option value='4'>4</option>"
			+ "<option value='5'>5</option>"
			+ "<option value='6'>6</option>"
			+ "<option value='7'>7</option>"
			+ "<option value='8'>8</option>"
			+ "<option value='9'>9</option>"
			+ "</select>"
			+ "</td>"
			+ "</tr>"
			+ "</tbody>"
			+

			"<tfoot>"
			+ "<tr>"
			+ "<td>"
			+ "<span><a style='margin-left:0px' class='high-sea-href' onclick=clearEdition('flightTypeOneWay') href='javascript:void(0)'>清除查询条件</a></span>"
			+ "<span id='warn-span' class='warn-span'></span></td><td>"
			+ "<span><input id='single-search-btn' onclick='singleSearch()' type='button' value='' class='href-button-search' /></span>"
			+ "<span><input onclick='showOrderMailDiv()' type='button' style='    position: absolute; margin-left: 28px' id='double-search-btn' value='' class='href-button' /></span>"
			+ "</td>" + "</tr>" + "</tfoot>" + "</table>";

	return doubleHtml;
}
function lotCheck() {
	if ($("#l-from-city").val() == '') {
		$("#l-from-city").focus();
		$("#warn-span").html('请填写始发城市');
		return false;
	}
	if ($("#l-arrive-city").val() == '') {
		$("#l-arrive-city").focus();
		$("#warn-span").html('请填写目的城市');
		return false;
	}
	if ($("#l-from-date").val() == '') {
		$("#l-from-date").focus();
		$("#warn-span").html('请填写启程日期');
		return false;
	}
	if ($("#l-from-city1").val() == '') {
		$("#l-from-city1").focus();
		$("#warn-span").html('请填写始发城市');
		return false;
	}
	if ($("#l-arrive-city1").val() == '') {
		$("#l-arrive-city1").focus();
		$("#warn-span").html('请填写目的城市');
		return false;
	}
	if ($("#l-from-date1").val() == '') {
		$("#l-from-date1").focus();
		$("#warn-span").html('请填写启程日期');
		return false;
	}

	if ($("#l-from-city2").val() != '') {
		if ($("#l-arrive-city2").val() == '') {
			$("#l-arrive-city2").focus();
			$("#warn-span").html('请填写目的城市');
			return false;
		}
		if ($("#l-from-date2").val() == '') {
			$("#l-from-date2").focus();
			$("#warn-span").html('请填写启程日期');
			return false;
		}
	}

//	if ($("#l-from-city3").val() != '') {
//		if ($("#l-arrive-city3").val() == '') {
//			$("#l-arrive-city3").focus();
//			$("#warn-span").html('请填写目的城市');
//			return false;
//		}
//		if ($("#l-from-date3").val() == '') {
//			$("#l-from-date3").focus();
//			$("#warn-span").html('请填写启程日期');
//			return false;
//		}
//	}
//
//	if ($("#l-from-city4").val() != '') {
//		if ($("#l-arrive-city4").val() == '') {
//			$("#l-arrive-city4").focus();
//			$("#warn-span").html('请填写目的城市');
//			return false;
//		}
//		if ($("#l-from-date4").val() == '') {
//			$("#l-from-date4").focus();
//			$("#warn-span").html('请填写启程日期');
//			return false;
//		}
//	}
//
//	if ($("#l-from-city5").val() != '') {
//		if ($("#l-arrive-city5").val() == '') {
//			$("#l-arrive-city5").focus();
//			$("#warn-span").html('请填写目的城市');
//			return false;
//		}
//		if ($("#l-from-date5").val() == '') {
//			$("#l-from-date5").focus();
//			$("#warn-span").html('请填写启程日期');
//			return false;
//		}
//	}

	if ($("#l-adt-count").val() == '') {
		$("#l-adt-count").focus();
		$("#warn-span").html('成人数不能为0');
		return false;
	}

	return true;
}
function lotSearch() {
	if (!lotCheck()) {
		return;
	}
	$("#warn-span").html('');
	var lotUrl = baseUrl;

	var adtCount = $("#l-adt-count").val();
	lotUrl += "#AdtCount="
			+ adtCount
			+ "&Culture=zh-CN&FlightType=MultiLeg&ManualCostAmount=&ManualCostType=none&Method=Search";

	var childCount = $("#l-child-count").val();
	if (childCount != '0') {
		lotUrl += "&ChdCount=" + childCount;
	}

	var babyCount = $("#l-baby-count").val();
	if (babyCount != '0') {
		lotUrl += '&InfCount=' + babyCount;
	}

	var From = $("#l-from-city-hid").val().split(";")[0];
	var To = $("#l-arrive-city-hid").val().split(";")[0];
	var DepartureDate = $("#l-from-date").val();
	var DepartureFlexibleDate0 = $("#l-from-time").val();
	lotUrl += "&From=" + From + "&To=" + To + "&DepartureDate=" + DepartureDate
			+ "&DepartureFlexibleDate0=" + DepartureFlexibleDate0
			+ "&QFrom=C&QTo=C";

	var From1 = $("#l-from-city1-hid").val().split(";")[0];
	var To1 = $("#l-arrive-city1-hid").val().split(";")[0];
	var DepartureDate1 = $("#l-from-date1").val();
	var DepartureFlexibleDate1 = $("#l-from-time1").val();
	lotUrl += "&From1=" + From1 + "&To1=" + To1 + "&DepartureDate1="
			+ DepartureDate1 + "&DepartureFlexibleDate1="
			+ DepartureFlexibleDate1 + "&QFrom1=C&QTo1=C&DepartureTime1=00:01";

	var From2 = $("#l-from-city2-hid").val();
	if (From2 != '') {
		From2 = From2.split(";")[0];
		var To2 = $("#l-arrive-city2-hid").val().split(";")[0];
		var DepartureDate2 = $("#l-from-date2").val();
		var DepartureFlexibleDate2 = $("#l-from-time2").val();
		lotUrl += "&From2=" + From2 + "&To2=" + To2 + "&DepartureDate2="
				+ DepartureDate2 + "&DepartureFlexibleDate2="
				+ DepartureFlexibleDate2
				+ "&QFrom2=C&QTo2=C&DepartureTime2=00:01";
	}

//	var From3 = $("#l-from-city3-hid").val();
//	if (From3 != '') {
//		From3 = From3.split(";")[0]
//		var To3 = $("#l-arrive-city3-hid").val().split(";")[0];
//		var DepartureDate3 = $("#l-from-date3").val();
//		var DepartureFlexibleDate3 = $("#l-from-time3").val();
//		lotUrl += "&From3=" + From3 + "&To3=" + To3 + "&DepartureDate3="
//				+ DepartureDate3 + "&DepartureFlexibleDate3="
//				+ DepartureFlexibleDate3
//				+ "&QFrom3=C&QTo3=C&DepartureTime3=00:01";
//	}
//
//	var From4 = $("#l-from-city4-hid").val();
//	if (From4 != '') {
//		From4 = From4.split(";")[0]
//		var To4 = $("#l-arrive-city4-hid").val().split(";")[0];
//		var DepartureDate4 = $("#l-from-date4").val();
//		var DepartureFlexibleDate4 = $("#l-from-time4").val();
//		lotUrl += "&From4=" + From4 + "&To4=" + To4 + "&DepartureDate4="
//				+ DepartureDate4 + "&DepartureFlexibleDate4="
//				+ DepartureFlexibleDate4
//				+ "&QFrom4=C&QTo4=C&DepartureTime4=00:01";
//	}
//
//	var From5 = $("#l-from-city5-hid").val();
//
//	if (From5 != '') {
//		From5 = From5.split(";")[0]
//		var To5 = $("#l-arrive-city5-hid").val().split(";")[0];
//		var DepartureDate5 = $("#l-from-date5").val();
//		var DepartureFlexibleDate5 = $("#l-from-time5").val();
//		lotUrl += "&From5=" + From5 + "&To5=" + To5 + "&DepartureDate5="
//				+ DepartureDate5 + "&DepartureFlexibleDate5="
//				+ DepartureFlexibleDate5
//				+ "&QFrom5=C&QTo5=C&DepartureTime5=00:01";
//	}

	lotUrl += "&FamilyCardDiscount=&FamilyDiscount=&IsMajorCabin=";

	lotUrl += "&CabinClass=" + $("#lot-cabin-class").val()
			+ "&DirectFlightsOnly=" + $('#lot-flight-chk').is(':checked');
	var airCompany = $("#lot-air-company-hid").val();
	if (airCompany != '') {
		lotUrl += "&PrefAirline1=" + airCompany;
	}

	console.log(lotUrl);
	window.open(lotUrl);
}
function getDate(obj) {
	var date = "";
	var objArry = obj.split("-");
	date = objArry[1] + "/" + objArry[2] + "/" + objArry[0];
	return date;
}
function getLotTrip() {

	var doubleHtml = "<table style='font-size:12px'>"
			+ "<tbody>"
			+ "<tr>"
			// 飞行模式
			+ "<td colspan=2 class='round-trip-p'>"
			+ "<input type='radio' onclick=changeTripType('double') id='flightTypeRoundTrip' name='flightType' value='RoundTrip'>"
			+ "<label for='flightTypeRoundTrip' data-fld='NoLocalize'>往返</label>"
			+ "<input type='radio' onclick=changeTripType('single') id='flightTypeOneWay' name='flightType' value='OneWay' class='valid'> "
			+ "<label for='flightTypeOneWay' data-fld='NoLocalize'>单程</label>"
			+ " <input type='radio' onclick=changeTripType('lot') id='flightTypeMultiLeg' name='flightType' value='MultiLeg'  checked='checked' class='valid'>"
			+ "<label for='flightTypeMultiLeg' data-fld='NoLocalize'>多航段</label>"
			+ "<div id='lot-show-div'></div>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td>"
			+ "<p class='lot-p-label'>"
			+ "<label>始发城市</label>"
			+ "<label class='arrive-city-label'>目的城市</label></p></td>"
			+ "<td><p class='lot-p-label'>"
			+ "<label class='arrive-date-label'>启程日期</label>"
			+ "<label class='date-casul-label'>日期灵活</label>"
			+ "</p>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td>"
			+ "<input type='hidden' id='l-from-city-hid' />"
			+ "<input type='hidden' id='l-arrive-city-hid' />"
			+ "<span style='margin-top:1px;' onclick=lotGetCity('l-from-city','from') class=from-span-sel></span>"
			+ "<input onkeyup=lotKeyUp('l-from-city') id='l-from-city' class='lot-p-text' type=text /> "
			
			+ "<span style='margin-top:-25px;' onclick=lotGetCity('l-arrive-city','to') class=to-span-sel></span>"
			
			+ "<input onkeyup=lotKeyUp('l-arrive-city') id='l-arrive-city' class='lot-p-text' type=text /> "
			+ "</td>"
			+ "<td>"
			+ "<input  id='l-from-date' style='height:26px' class='date-pick Wdate  date-txt' type='text' >"
			+ "<select id='l-from-time'  class='selectText date-casul-txt' >"
			+ "<option value=''>确切日期</option>"
			+ "<option value='1C'>-1/+1 天</option>"
			+ "</select>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td>"
			+ "<span onclick=lotGetCity('l-from-city1','from') class=from-span-sel1></span><span onclick=lotGetCity('l-arrive-city1','to') class=to-span-sel1></span>"
			+ "<input id='l-from-city1' onkeyup=lotKeyUp('l-from-city1') class='lot-p-text' type=text /> "
			+ "<input type='hidden' id='l-from-city1-hid' />"
			+ "<input type='hidden' id='l-arrive-city1-hid' />"
			+ "<input id='l-arrive-city1' onkeyup=lotKeyUp('l-arrive-city1') class='lot-p-text' type=text /> "
			+ "</td>"
			+ "<td>"
			+ "<input   id='l-from-date1' style='height:26px' class='date-pick Wdate  date-txt' type='text' >"
			
			+ "<select id='l-from-time1'  name='' class='selectText date-casul-txt' >"
			+ "<option value=''>确切日期</option>"
			+ "<option value='1C'>-1/+1 天</option>"
			+ "</select>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td>"
			+ "<span onclick=lotGetCity('l-from-city2','from') class=from-span-sel2></span><span onclick=lotGetCity('l-arrive-city2','to') class=to-span-sel2></span>"
			+ "<input id='l-from-city2' onkeyup=lotKeyUp('l-from-city2')  class='lot-p-text' type=text /> "
			+ "<input id='l-arrive-city2' onkeyup=lotKeyUp('l-arrive-city2')  class='lot-p-text' type=text /> "
			+ "</td>"
			+ "<td>"

			+ "<input type='hidden' id='l-from-city2-hid' />"
			+ "<input type='hidden' id='l-arrive-city2-hid' />"
			+ "<input  id='l-from-date2' style='height:26px' class='date-pick Wdate  date-txt' type='text' >"
			+ "<select  id='l-from-time2' name='' class='selectText date-casul-txt' >"
			+ "<option value=''>确切日期</option>"
			+ "<option value='1C'>-1/+1 天</option>"
			+ "</select>"
			+ "</td>"
			+ "</tr>"
			+

//			"<tr>"
//			+ "<td>"
//			+ "<span onclick=lotGetCity('l-from-city3','from') class=from-span-sel3></span><span onclick=lotGetCity('l-arrive-city3','to') class=to-span-sel3></span>"
//			+ "<input id='l-from-city3' onkeyup=lotKeyUp('l-from-city3')  class='lot-p-text' type=text /> "
//			+ "<input id='l-arrive-city3' onkeyup=lotKeyUp('l-arrive-city3')  class='lot-p-text' type=text /> "
//			+ "<input type='hidden' id='l-from-city3-hid' />"
//			+ "<input type='hidden' id='l-arrive-city3-hid' />"
//			+ "</td>"
//			+ "<td>"
//			+ "<input  id='l-from-date3' style='height:26px' class='date-pick Wdate  date-txt' type='text' >"
//			+ "<select  id='l-from-time3' name='' class='selectText date-casul-txt' >"
//			+ "<option value=''>确切日期</option>"
//			+ "<option value='1C'>-1/+1 天</option>"
//			+ "</select>"
//			+ "</td>"
//			+ "</tr>"
//			+
//
//			"<tr>"
//			+ "<td>"
//			+ "<span onclick=lotGetCity('l-from-city4','from') class=from-span-sel4></span><span onclick=lotGetCity('l-arrive-city4','to') class=to-span-sel4></span>"
//			+ "<input id='l-from-city4' onkeyup=lotKeyUp('l-from-city4')  class='lot-p-text' type=text /> "
//			+ "<input  id='l-arrive-city4' onkeyup=lotKeyUp('l-arrive-city4')  class='lot-p-text' type=text /> "
//			+ "<input type='hidden' id='l-from-city4-hid' />"
//			+ "<input type='hidden' id='l-arrive-city4-hid' />"
//			+ "</td>"
//			+ "<td>"
//			+ "<input  id='l-from-date4' style='height:26px' class='date-pick Wdate  date-txt' type='text' >"
//			+ "<select id='l-from-time4' name='' class='selectText date-casul-txt' >"
//			+ "<option value=''>确切日期</option>"
//			+ "<option value='1C'>-1/+1 天</option>"
//			+ "</select>"
//			+ "</td>"
//			+ "</tr>"
//			+
//
//			"<tr>"
//			+ "<td>"
//			+ "<span onclick=lotGetCity('l-from-city5','from') class=from-span-sel5></span><span onclick=lotGetCity('l-arrive-city5','to') class=to-span-sel5></span>"
//			+ "<input id='l-from-city5' onkeyup=lotKeyUp('l-from-city5')  class='lot-p-text' type=text /> "
//			+ "<input id='l-arrive-city5' onkeyup=lotKeyUp('l-arrive-city5')  class='lot-p-text' type=text /> "
//			+ "<input type='hidden' id='l-from-city5-hid' />"
//			+ "<input type='hidden' id='l-arrive-city5-hid' />"
//			+ "</td>"
//			+ "<td>"
//			+ "<input  id='l-from-date5' style='height:26px' class='date-pick Wdate  date-txt' type='text' >"
//			+ "<select id='l-from-time5' name='' class='selectText date-casul-txt' >"
//			+ "<option value=''>确切日期</option>"
//			+ "<option value='1C'>-1/+1 天</option>"
//			+ "</select>"
//			+ "</td>"
//			+ "</tr>"
//			+

			"<tr>"
			+ "<td>"
			+ "<p><labe style='margin-left: 0px;' class='city-p'>只选直飞航班</label></p></td>"
			+ "<td><p>"
			+ "<input id='lot-flight-chk' style='' type='checkbox' />"
			+ "</p>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td>"
			+ "<lable style='margin-left: 0px;' class='city-p'>价格类型</label></td><td>"
			+ "<select id='lot-cabin-class' style='' class='air-comp-txt'>"
			+ "<option value='Y'>经济舱</option>"
			+ "<option value='W'>高级经济舱</option>"
			+ "<option value='C'>公务舱</option>"
			+ "<option value='F'>头等舱</option>"
			+ "</select>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td>"
			+ "<p><labe style='margin-left: 0px;' class='city-p'>首选航空公司</label></td>"
			+ "<td>"
			+ "<input type='hidden' id='lot-air-company-hid' />"
			+ "<input onkeyup=keyUpAjaxAir('lot') id='lot-air-company'"
			+ " style='' class='air-comp-txt' type='text' /></p>"
			+ "</td>"
			+ "</tr>"
			+

			"<tr>"
			+ "<td colspan=2>"
			+ "<p class='guest-p'>旅客</p>"
			+ "</td>"
			+ "</tr>"

			+ "<tr>"
			+ "<td>"
			+ "<p class='city-p'><label>成人</label></p></td>"
			+ "<td><p>"
			+ "<select style='width:85px' id='l-adt-count' name='ADT' class='selectText'>"
			+ "<option value='0'>0</option>"
			+ "<option selected='selected' value='1'>1</option>"
			+ "<option value='2'>2</option>"
			+ "<option value='3'>3</option>"
			+ "<option value='4'>4</option>"
			+ "<option value='5'>5</option>"
			+ "<option value='6'>6</option>"
			+ "<option value='7'>7</option>"
			+ "<option value='8'>8</option>"
			+ "<option value='9'>9</option>"
			+ "</select></p></td>"
			+ "<tr>"
			+ "<td>"
			+ "<p class='city-p'>"
			+ "<label style=''>儿童</label></p></td><td>"
			+ "<select name='ADT' id='l-child-count' style='width:85px' class='selectText'>"
			+ "<option selected='selected' value='0'>0</option>"
			+ "<option  value='1'>1</option>"
			+ "<option value='2'>2</option>"
			+ "<option value='3'>3</option>"
			+ "<option value='4'>4</option>"
			+ "<option value='5'>5</option>"
			+ "<option value='6'>6</option>"
			+ "<option value='7'>7</option>"
			+ "<option value='8'>8</option>"
			+ "<option value='9'>9</option>"
			+ "</select>"
			+ "</td>"
			+ "</tr>"
			+ "<tr>"
			+ "<td>"
			+ "<label class='city-p'>婴儿 (0-2)</label></td><td>"
			+ "<select id='l-baby-count' style='width:85px;' name='ADT' class='selectText'>"
			+ "<option value='0'>0</option>"
			+ "	<option value='1'>1</option>"
			+ "<option value='2'>2</option>"
			+ "<option value='3'>3</option>"
			+ "<option value='4'>4</option>"
			+ "<option value='5'>5</option>"
			+ "<option value='6'>6</option>"
			+ "<option value='7'>7</option>"
			+ "<option value='8'>8</option>"
			+ "<option value='9'>9</option>"
			+ "</select>"
			+ "</td>"
			+ "</tr>"
			+ "</tbody>"
			+

			"<tfoot>"
			+ "<tr>"
			+ "<td>"
			+ "<span><a style='margin-left:0px' onclick=clearEdition('flightTypeMultiLeg') class='high-sea-href' href='javascript:void(0)'>清除查询条件</a></span>"
			+ "<span id='warn-span' class='warn-span'></span></td><td>"
			+ "<span><input onclick='lotSearch()' id='lot-search-btn' type='button' value='' class='href-button-search' /></span>"
			+ "<span><input onclick='showOrderMailDiv()' type='button' style='    position: absolute; margin-left: 28px' id='double-search-btn' value='' class='href-button' /></span>"
			+ "</td>" + "</tr>" + "</tfoot>" + "</table>";

	return doubleHtml;

}

function dateOperator(date, days, operator)

{

	date = date.replace(/-/g, "/"); // 更改日期格式
	var nd = new Date(date);
	nd = nd.valueOf();
	if (operator == "+") {
		nd = nd + days * 24 * 60 * 60 * 1000;
	} else if (operator == "-") {
		nd = nd - days * 24 * 60 * 60 * 1000;
	} else {
		return false;
	}
	nd = new Date(nd);

	var y = nd.getFullYear();
	var m = nd.getMonth() + 1;
	var d = nd.getDate();
	if (m <= 9)
		m = "0" + m;
	if (d <= 9)
		d = "0" + d;
	var cdate = y + "-" + m + "-" + d;
	return cdate;
}

function dateRegister() {
	$("#d-from-date").datepicker({
		minDate : +2,
		numberOfMonths : 2
	});

	$("#d-to-date").datepicker({
		minDate : +2,
		numberOfMonths : 2
	});

	$("#s-from-date").datepicker({
		minDate : +2,
		numberOfMonths : 2
	});

	$("#l-from-date").datepicker({
		minDate : +2,
		numberOfMonths : 2
	});

	$("#l-from-date1").datepicker({
		minDate : +2,
		numberOfMonths : 2
	});

	$("#l-from-date2").datepicker({
		minDate : +2,
		numberOfMonths : 2
	});

	$("#l-from-date3").datepicker({
		minDate : +2,
		numberOfMonths : 2
	});

	$("#l-from-date4").datepicker({
		minDate : +2,
		numberOfMonths : 2
	});

	$("#l-from-date5").datepicker({
		minDate : +2,
		numberOfMonths : 2
	});

}
