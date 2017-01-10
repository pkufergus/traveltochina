
<?php 
include_once "../shared/ez_sql_core.php";
include_once "../mysql/ez_sql_mysql.php";
include_once "../config.inc_2.php";

function GetPrice($Departure,$Arrival,$USD)
{
	$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
	$db->query("set names utf8");
	$SQL = "SELECT 	min(Price) AS Price
			  FROM
				(
					SELECT CONVERT (Price, DECIMAL) AS Price
					FROM aie_masterdata
					WHERE DepartureCity = '".$Departure."'
					   and ArrivalCity = '".$Arrival."'
					   and DepartureDate >= now()
				 ) AS t";
	$masterdata = $db->get_results ($SQL );
	//echo $SQL."<br/>";
	if (is_array ( $masterdata ))
	{	  
		foreach ( $masterdata as $Record ) {
			return $USD.(intval($Record->Price))."";
		}
	}
	else 
	{
		return '';
	}
}

?>


<html>
<head>
<meta charset="utf-8">
<title></title>
<link href="css/jquery.slideBox.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/jquery.slideBox.js" type="text/javascript"></script>
<script>
jQuery(function($){
	
});
</script>
<script>
	$(function(){
		$.ajax({
			type : 'GET',
			url : '/v1/homepage/get_show_image.json',
			data : {
				country : 'USA'
			},
			success : function(result){
			var ulHtml = "<ul class='items'>";
				for(var key = 0 ; key < result.length ; key++){
					ulHtml += "<li><a target='parent' href='http://www.e-traveltochina.com/"+result[key].href+"' title='&nbsp;&nbsp;&nbsp;"+result[key].srcPlace
					+"至"+result[key].destPlace+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
					+result[key].price_type+result[key].price+"'>"
					+"<img src='/v1/asset/img/"+result[key].image_url+"' width='300' height='200' /></a></li>"
					;
				}
				ulHtml += "</ul>";
				$("#demo1").html(ulHtml);
				$('#demo1').slideBox();
	$('#demo2').slideBox({
		direction : 'top',
		duration : 0.3,
		easing : 'linear',
		delay : 5,
		startIndex : 1
	});
			},
			error : function(){}
		});
	});
</script>
</head>

<body>
<div id="demo1" class="slideBox">
  
</div>

</body>
</html>
