<?php

$q = strtolower ( $_GET ["q"] );
if (! $q)
	return;

include_once "../shared/ez_sql_core.php";
include_once "../mysql/ez_sql_mysql.php";
include_once "../config.inc.php";

$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
$db->query ( "set names utf8" );
$SQL = "SELECT
		citycode.`code`,
		citycode.`city`,
		citycode.`state`,
		citycode.`airport`
		FROM
		citycode
		WHERE
		code='".strtoupper($q)."'
		union 
		SELECT
		citycode.`code`,
		citycode.`city`,
		citycode.`state`,
		citycode.`airport`
		FROM
		citycode
		WHERE
		lower(city) like'".strtoupper($q)."%'"; 
$result = $db->get_results ( $SQL);
if (is_array ( $result ))
{	  
	echo json_encode($result);
}
?>