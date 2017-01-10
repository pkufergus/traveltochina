/**
 * 
 */

function lotKeyUp(id) {
	var prefix = $("#" + id).val();
	if (prefix.length > 1) {
		$.ajax({
			type : 'GET',
			url : '/v1/ajax/auto_complete.json',
			data : {
				prefix : prefix
			},
			success : function(result) {
				result = eval(result);
				lotKeyUpCallBack(id, result)
			},
			error : function() {

			}
		});

	}
}

function lotKeyUpCallBack(id, result) {
	var pTmp = "";
	for (var key = 0; key < result.length; key++) {
		// pTmp += "<p " + "onclick=\"lotValue('" + result[key].label + "&"
		// 		+ result[key].value + "&" + id + "')\""
		// 		+ " style='font-size:12px;cursor:pointer'>" + result[key].label
		// 		+ "</p>";
    var labelTmp = result[key].label;
    var valTmp = result[key].value;
    if (key == 0) {
      console.log("befor lab="+labelTmp);
    }
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
    pTmp += "<p " + "onclick=\"lotValue('" + labelTmp + "&"
        + valTmp + "&" + id + "')\""
        + " style='font-size:12px;cursor:pointer'>" + labelTmp
        + "</p>";
	}
	
	$("#lot-show-div").html(pTmp);
	$("#lot-show-div").removeAttr("style");
	if($("#lot-show-div").height() > 268){
		$("#lot-show-div").css("height","268px");
	}
	$("#lot-show-div").show();
	$("#lot-show-div").removeClass();
	$("#lot-show-div").addClass(id + "-class");
}

function lotValue(obj) {
	$("#lot-show-div").html('');
	$("#lot-show-div").hide();
	var objArry = obj.split("&");
	var label = objArry[0];
	var value = objArry[1];
	var id = objArry[2];
	document.getElementById(id).value = label;
	document.getElementById(id + "-hid").value = value + ";" + label;
}

function lotGetCity(id, type) {
	$.ajax({
		type : 'GET',
		url : '/v1/city/from_to_city.json',
		data : {
			country : countryEnd
		},
		success : function(result) {
			lotGetCityCallBack(id, type, result);
		},
		error : function() {
		}

	});

}
function lotGetCityCallBack(id, type, result) {
	if (type == 'from') {
		var pTmp = "";
		for (var key = 0; key < result[0].length; key++) {
			pTmp += "<p " + "onclick=\"lotCityValue('" + result[0][key].cityCode
					+ "&" + result[0][key].chineseName + "&" + id + "')\""
					+ " style='font-size:12px;cursor:pointer'>"
					+ result[0][key].chineseName+"  "+result[0][key].cityCode + "</p>";
		}
		pTmp += "<p style='font-size:12px;cursor:pointer;font-weight:600' onclick=otherCity('"+id+"')>其它城市</p>";

		$("#lot-show-div").html(pTmp);
		$("#lot-show-div").removeAttr("style");
		if($("#lot-show-div").height() > 268){
			$("#lot-show-div").css("height","268px");
		}
		$("#lot-show-div").show();
		$("#lot-show-div").removeClass();
		$("#lot-show-div").addClass(id + "-class");
	} else {
		var pTmp = "";
		
		for (var key = 0; key < result[1].length; key++) {
			pTmp += "<p " + "onclick=\"lotCityValue('" + result[1][key].cityCode
					+ "&" + result[1][key].chineseName + "&" + id + "')\""
					+ " style='font-size:12px;cursor:pointer'>"
					+ result[1][key].chineseName+"  "+result[1][key].cityCode + "</p>";
		}
		pTmp += "<p style='font-size:12px;cursor:pointer;font-weight:600' onclick=otherCity('"+id+"')>其它城市</p>";

		$("#lot-show-div").html(pTmp);
		$("#lot-show-div").removeAttr("style");
		if($("#lot-show-div").height() > 268){
			$("#lot-show-div").css("height","268px");
		}
		$("#lot-show-div").show();
		$("#lot-show-div").removeClass();
		$("#lot-show-div").addClass(id + "-class");
	}
}

function lotCityValue(obj){
	var objArry = obj.split("&");
	var code = objArry[0];
	var cityName = objArry[1];
	var id = objArry[2];
	$("#lot-show-div").html('');
	$("#lot-show-div").hide();
	
	document.getElementById(id).value = cityName + "  " + code;
	document.getElementById(id + "-hid").value = code + ";" + cityName;
}
