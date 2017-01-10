/**
 * 
 */

$(function() {
	var param_temp = $("#param_hid").val();

	$
			.ajax({
				type : 'GET',
				url : '/v1/menu/webmenulist.json',
				data : {
					country : param_temp
				},
				success : function(result) {
					var liTemp = '';
					for ( var key in result) {
						if (result[key].srcPlace != '后台管理') {
							liTemp += '<li id="travel_'
									+ result[key].srcCode
									+ '_'
									+ result[key].destCode
									+ '"  name=travel-menu-li><a href="'
									+ result[key].href
									+ '" target="_parent" style="font-size:12px">'
									+ '<b style="color:#b0071f;">'
									+ result[key].srcPlace + '至'
									+ result[key].destPlace + '特价机票'
									+ '</b></a> </li>';
						} else {
							liTemp += '<li name=travel-menu-li><a href="'
									+ result[key].href
									+ '" target="_parent" style="font-size:12px">'
									+ '<b style="color:#b0071f;">'
									+ result[key].srcPlace + '</b></a> </li>';
						
						}

					}
					$("#liTempSpan").html(liTemp);

					if (document.getElementById("travel_"
							+ $("#from_param_hid").val() + "_"
							+ $("#to_param_hid").val()) != null) {
						document.getElementById("travel_"
								+ $("#from_param_hid").val() + "_"
								+ $("#to_param_hid").val()).className = 'current';
					}

				},
				error : function() {
				}
			});

});
function showChild(){
	
}
function showSubMenu(submenuid) {
	var display = document.getElementById(submenuid).style.display;
	if (display.length > 0) {
		document.getElementById(submenuid).style.display = "";
	} else {
		document.getElementById(submenuid).style.display = "none";
	}
}
function showHideBg(obj) {

	var idTemp = obj;
	var liArry = document.getElementsByName("travel-menu-li");

	for ( var key in liArry) {
		liArry[key].style.background = '';
	}
	$("#" + idTemp).addClass("li-travel")

	document.getElementById(obj).style.background = 'url(./images/menu_left_hover_bk.jpg)';

	// alert(document.getElementById(obj).className);
}
