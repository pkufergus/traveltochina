<?php

include_once "./shared/ez_sql_core.php";
include_once "./mysql/ez_sql_mysql.php";
include_once "./config.inc.php";

$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
$db->query ( "set names utf8" );
$SQL = "SELECT
		hotprice.ID,
		hotprice.displaytext,
		hotprice.queryfrom,
		hotprice.queryto
		FROM
		hotprice
		"; 
$result = $db->get_results ( $SQL);
if (is_array ( $result ))
{	  
	echo json_encode($result);
}
?>

