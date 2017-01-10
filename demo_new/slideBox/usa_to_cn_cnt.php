

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
	$('#demo1').slideBox();
	$('#demo2').slideBox({
		direction : 'top',
		duration : 0.3,
		easing : 'linear',
		delay : 5,
		startIndex : 1
	});
});
</script>
</head>

<body>
<div id="demo1" class="slideBox">
  <ul class="items">
    <li><a href="javascript:void(0);" title="&nbsp;&nbsp;&nbsp;紐約至北京&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo GetPrice('NYC','BJS','$');  ?>"><img src="img/beijing.png" width="254" height="154"></a></li>
    <li><a href="javascript:void(0);" title="&nbsp;&nbsp;&nbsp;洛杉機至上海&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo GetPrice('LAX','SHA','$');  ?>"><img src="img/shanghai..png" width="254" height="154"></a></li>
    <li><a href="javascript:void(0);" title="&nbsp;&nbsp;&nbsp;三藩市至北京&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo GetPrice('SFO','BJS','$');  ?>"><img src="img/beijing.png" width="254" height="154"></a></li>
    <li><a href="javascript:void(0);" title="&nbsp;&nbsp;&nbsp;紐約至上海&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo GetPrice('NYC','SHA','$');  ?>"><img src="img/shanghai..png" width="254" height="154"></a></li>
    <li><a href="javascript:void(0);" title="&nbsp;&nbsp;&nbsp;洛杉機至北京&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo GetPrice('LAX','BJS','$');  ?>"><img src="img/beijing.png" width="254" height="154"></a></li>
	<li><a href="javascript:void(0);" title="&nbsp;&nbsp;&nbsp;三藩市至上海&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo GetPrice('SFO','SHA','$');  ?>"><img src="img/shanghai..png" width="254" height="154"></a></li>
  </ul>
</div>

</body>
</html>
