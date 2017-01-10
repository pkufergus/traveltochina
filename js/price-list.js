/**
 * 
 */
$(function() {
	$
			.ajax({
				type : 'GET',
				url : '/v1/price/new_price_list.json',
				success : function(result) {
					var pHtml = "<p class='price-title'> 美国、加拿大到中国特价机票价格一览表<p>"
							+ "<p id='update_time_p' class='price-p1'></p>"
							+ "<p style='text-align:left;margin-left:58px'><a href='http://www.e-traveltochina.com/article'><span class='p-span-1'>人人有用的热帖：购买便宜回国机票的窍门：</span>"
							+ "<span class='p-span-2'>http://www.e-traveltochina.com/article</span></a></p>";
					var updateP = '';
					for (var key = 0; key < result.length; key++) {
						var numTitle = parseInt(key) + 1;
						updateP = "（" + result[key].update_time + "更新）";
						pHtml += "<article>"
								+ "<p class='p-title'>"
								+ numTitle
								+ ")&nbsp;&nbsp;"
								+ result[key].fromP
								+ "到"
								+ result[key].toP
								+ "特价机票：<span style='color:red;'>"
								+ result[key].price_type
								+ result[key].min_price
								+ "</span>起（全包）"
								+ "</p>"
								+ "<table style='margin-left: 56px;text-align:left;margin-top: -6px;'>"
								+ "<thead>" + "<tr>"
								+ "<td><p class='p-price-list'>出发月份</p></td>"
								+ "<td><p class='p-price-list'>两周内往返</p></td>"
								+ "<td><p class='p-price-list'>一个月内往返</p></td>"
								+ "<td><p class='p-price-list'>三个月内往返</p></td>"
								+ "<td><p class='p-price-list'>半年内往返</p></td>"
								+ "</tr>" + "</thead>" + "<tbody>";
						for (var i = 0; i < result[key].objList.length; i++) {
							var p1 = "<p class='p-price-list'><span style='color:red'>"
									+ result[key].price_type
									+ result[key].objList[i].oneP
									+ "</span>起</p>";
							var p2 = "<p class='p-price-list'><span style='color:red'>"
									+ result[key].price_type
									+ result[key].objList[i].twoP
									+ "</span>起</p>";
							var p3 = "<p class='p-price-list'><span style='color:red'>"
									+ result[key].price_type
									+ result[key].objList[i].threeP
									+ "</span>起</p>";
							var p4 = "<p class='p-price-list'><span style='color:red'>"
									+ result[key].price_type
									+ result[key].objList[i].fourP
									+ "</span>起</p>";
							if (result[key].objList[i].oneP == '暂无票价') {
								p1 = "<p class='p-price-list'><span>暂无票价"+ "</span></p>";
							}
							if (result[key].objList[i].twoP == '暂无票价') {
								p2 = "<p class='p-price-list'><span>暂无票价"+ "</span></p>";
							}
							if (result[key].objList[i].threeP == '暂无票价') {
								p3 = "<p class='p-price-list'><span>暂无票价"+ "</span></p>";
							}
							if (result[key].objList[i].fourP == '暂无票价') {
								p4 = "<p class='p-price-list'><span>暂无票价"+ "</span></p>";
							}
							pHtml += "<tr>"
									+ "<td><p class='p-price-list'><span>"
									+ result[key].objList[i].month
									+ "月</span></p></td>"
									+ "<td>"+p1+"</td>"
									+ "<td>"+p2+"</td>"
									+ "<td>"+p3+"</td>"
									+ "<td>"+p4+"</td>" + "</tr>";
						}

						pHtml += "</tbody></table>";
						pHtml += "<p style='text-align: left;margin-left: 58px;'> <a style='color:blue;text-decoration: underline;font-size:14pt' class='price-href' href='http://www.e-traveltochina.com"
								+ result[key].url
								+ "'>http://www.e-traveltochina.com"
								+ result[key].url + "</a></p></article>";
					}

					$("#price-list-div").html(pHtml);
					$("#update_time_p").html(updateP);
				},
				error : function() {

				}
			});
});
