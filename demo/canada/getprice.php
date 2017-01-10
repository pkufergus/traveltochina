<?php
include_once "./shared/ez_sql_core.php";
include_once "./mysql/ez_sql_mysql.php";
include_once "./config.inc_2.php";
function GetDateAfter($Type,$Today)
{
	date_default_timezone_set (LOCAL_TIMEZONE);
	
	if ($Type == "1") //两周内往返
	{
		$NextDay = date ( "Y-m-d 00:00:00", strtotime ( "2 week" ,strtotime($Today)) )   ;
	} elseif ($Type == "2") //一个月往返
	{
		$NextDay = date ( "Y-m-d 00:00:00", strtotime ( "30 day" ,strtotime($Today)) )   ;
	} elseif ($Type == "3")//三个月往返
	{
		$NextDay = date ( "Y-m-d 00:00:00", strtotime ( "91 day" ,strtotime($Today)) )   ;
	} elseif ($Type == "4") //半年往返
	{
		$NextDay = date ( "Y-m-d 00:00:00", strtotime ( "180 day" ,strtotime($Today)) )  ;
	} elseif ($Type == "5") //一年往返
	{
		$NextDay = date ( "Y-m-d 00:00:00", strtotime ( "300 day" ,strtotime($Today)) )  ;
	}else //一周内往返
	{
		$NextDay = date ( "Y-m-d 00:00:00", strtotime ( "1 week" ,strtotime($Today)) )  ;		
	}
	return $NextDay;
}
function GetPrice2($Departure,$Arrival,$DepartureMonth,$ReturnType,$Lan)
{
	date_default_timezone_set (LOCAL_TIMEZONE);
	$days = get24_in_month($DepartureMonth);
	$flag = ' ';
	$SQLdate = ' ( ';
	for ($i = 0; $i < count($days); $i++) {
		//echo $days[$i].'<br/>';
		$SQLdate .= $flag." ( DepartureDate ='".$days[$i]."' AND ReturnDate='".GetDateAfter($ReturnType,$days[$i])."' )";
		$flag = ' OR ';
	}
	$SQLdate .= ' ) ';
	
	
	
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
								".$SQLdate." 
								ORDER BY Price ASC LIMIT 1" ;
	$masterdata = $db->get_results ($SQL );
	//echo $SQL."<br/>";
	if (is_array ( $masterdata ))
	{	  
		foreach ( $masterdata as $Record ) {
			if($Lan == '0')
			{
				return '<a target="_parent" href="'.str_replace('LANGUAGE=US', 'LANGUAGE=CN',$Record->WebLink ).'">'.('$'.$Record->Price).'</a>';
			}
			else
			{
				return '<a target="_parent" href="'.str_replace('LANGUAGE=US', 'LANGUAGE=TW',$Record->WebLink ).'">'.('$'.$Record->Price).'</a>';
			}			
		}
	}
	else 
	{
		return '&nbsp;';
	}
}
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
								aie_masterdata.DepartureDate ASC,
								aie_masterdata.ReturnDate ASC
								LIMIT 1" ;
	$masterdata = $db->get_results ($SQL );
	//echo $SQL."<br/>";
	if (is_array ( $masterdata ))
	{	  
		foreach ( $masterdata as $Record ) {
			return '<a target="_blank" href="'.$Record->WebLink.'">'.('$'.$Record->Price).'</a>';
		}
	}
	else 
	{
		return '&nbsp;';
	}
}
function GetDepartureCity($code)
{
	$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
	$db->query("set names utf8");
	$masterdata = $db->get_results ( 	"SELECT DISTINCT
										DepartureCity
										FROM
										aie_citypair
										WHERE
										aie_citypair.DepartureCode = '".$code."'
										LIMIT 1" );

	if (is_array ( $masterdata ))
	{	  
		foreach ( $masterdata as $Record ) {
			return $Record->DepartureCity;
		}
	}
	else 
	{
		return "";
	}
}
function GetArrivalCity($code)
{
	$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
	$db->query("set names utf8");
	$masterdata = $db->get_results ( 	"SELECT DISTINCT
										Destination
										FROM
										aie_citypair
										WHERE
										aie_citypair.DestinationCode = '".$code."'
										LIMIT 1" );

	if (is_array ( $masterdata ))
	{	  
		foreach ( $masterdata as $Record ) {
			return $Record->Destination;
		}
	}
	else 
	{
		return "";
	}
}
function GetDepartureCode($name)
{
	$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
	$db->query("set names utf8");
	$masterdata = $db->get_results ( 	"SELECT DISTINCT
										CityCode as DepartureCode
										FROM
										aie_cityname
										WHERE
										aie_cityname.EnglishName = '".$name."'
										LIMIT 1" );

	if (is_array ( $masterdata ))
	{	  
		foreach ( $masterdata as $Record ) {
			return $Record->DepartureCode;
		}
	}
	else 
	{
		return "";
	}
}
function GetArrivalCode($name)
{
	$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
	$db->query("set names utf8");
	$sql = "SELECT DISTINCT
			CityCode as DestinationCode
			FROM
			aie_cityname
			WHERE
			aie_cityname.EnglishName = '".$name."'
			LIMIT 1";
	$masterdata = $db->get_results ( $sql	 );

	if (is_array ( $masterdata ))
	{	  
		foreach ( $masterdata as $Record ) {
			return $Record->DestinationCode;
		}
	}
	else 
	{
		return "";
	}
}
function get24_in_month($yearmonth)
{
	date_default_timezone_set (LOCAL_TIMEZONE);
	$days = array();
	
	$firstday = strtotime($yearmonth."01 00:00:00");
	$daycount = date('t',$firstday);
	$today = date ( "Y-m-d 00:00:00")   ;
	for ($i = 1; $i <= $daycount; $i++) {
		if($i<10)
		{
			$day = strtotime($yearmonth.'0'.$i." 00:00:00");
		}
		else
		{
			$day = strtotime($yearmonth.$i." 00:00:00");
		}
		if(date('w',$day) ==2 ||date('w',$day) ==4) //周二或周四
		{
			//echo date('Y-m-d 00:00:00',$day).'<br/>';
			if($day > strtotime($today))
				array_push($days,date('Y-m-d 00:00:00',$day));
		}		
	}
	return $days;
}
?>