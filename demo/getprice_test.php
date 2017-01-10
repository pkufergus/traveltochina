<?php
include_once "./shared/ez_sql_core.php";
include_once "./mysql/ez_sql_mysql.php";
include_once "./config.inc.php";

function GetPrice($Departure,$Arrival,$DepartureDate,$ReturnDate)
{
	$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
	$db->query("set names utf8");
	$SQL = "SELECT
								Price,
								WebLink,
								ID,
								Undone,
								ArrivalCity,
								DepartureCity,
								ReturnDate,
								DepartureDate
								FROM
								aie_masterdata
								WHERE
								aie_masterdata.DepartureCity = '".$Departure."' AND
								aie_masterdata.ArrivalCity = '".$Arrival."' AND
								aie_masterdata.DepartureDate >= '".$DepartureDate."' AND
								aie_masterdata.ReturnDate >= '".$ReturnDate."'
								ORDER BY
								aie_masterdata.DepartureCity ASC,
								aie_masterdata.ReturnDate ASC
								LIMIT 1" ;
	$masterdata = $db->get_results ($SQL );
	echo $SQL."<br/>";

	if (is_array ( $masterdata ))
	{	  
		foreach ( $masterdata as $Record ) {
			return '$'.$Record->Price." --" .$Record->ID;
		}
	}
	else 
	{
		return "&nbsp;";
	}
}
?>