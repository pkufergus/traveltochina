<?php

header ( "Content-Type: text/html; charset=utf-8" );
require_once ('./jpgraph/jpgraph.php');
require_once ('./jpgraph/jpgraph_line.php');
require_once ("./jpgraph/jpgraph_date.php");
include_once "./shared/ez_sql_core.php";
include_once "./mysql/ez_sql_mysql.php";
include_once "./getprice.php";

include_once "./config.inc_2.php";
date_default_timezone_set (LOCAL_TIMEZONE); 
$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );

$Type = $_GET ['type'];//"MONTH";
$DepartureCity = $_GET ['from'];//'NYC';//trim ( $_GET ['from'] );
$ArrivalCity = $_GET ['to'];//'BJS';//trim ( $_GET ['to'] );
$Query_DepartureDate = strtotime($_GET ['fromdate']);
$Query_ReturnDate = strtotime($_GET ['todate']);

$DepartureCityCode = GetDepartureCode($DepartureCity);
$ArrivalCityCode = GetArrivalCode($ArrivalCity);

$timediff = $Query_ReturnDate-$Query_DepartureDate;
$QueryDaySpan = round(($Query_ReturnDate-$Query_DepartureDate)/3600/24); 

//if($QueryDaySpan < 7)//返程日期与启始日期最小间隔7天。
//	return ;

if ($Type == "YEAR") // 一个月内
{
	$LastDay =  strtotime("last year",$Query_DepartureDate);
}
else // MONTH 一年内
{
	$LastDay =  strtotime("last month",$Query_DepartureDate);	
}

$ydata_Price = array ();
$ydata_datetime = array ();

$SQL = "SELECT
		AVG(aie_masterdata.Price) as price,
		DATE_ADD(NOW(),INTERVAL -TIMESTAMPDIFF(week,aie_masterdata.DepartureDate,NOW())WEEK) as weekdate
		FROM
		aie_masterdata
		WHERE
		aie_masterdata.DepartureDate <= '".date ( "Y-m-d 23:59:59", $Query_DepartureDate)."' AND
		aie_masterdata.DepartureDate >= '".date ( "Y-m-d 00:00:00", $LastDay)."' AND
		TIMESTAMPDIFF(DAY,DepartureDate,ReturnDate) = ".$QueryDaySpan." AND
		aie_masterdata.DepartureCity = '".$DepartureCityCode."' AND 
		aie_masterdata.ArrivalCity = '".$ArrivalCityCode."'		
		GROUP BY (TIMESTAMPDIFF(week,aie_masterdata.DepartureDate,NOW())) 
		ORDER BY (TIMESTAMPDIFF(week,aie_masterdata.DepartureDate,NOW())) DESC ";

$QueryResult = $db->get_results ( $SQL);
$havedata = true;
if(count($QueryResult)<=0)
{
	$havedata = false;
	$maxnumT = 2000;
	$minnumT = 0;
}

$i = 0;
if (is_array ( $QueryResult )) //add
{
	$b_havedate = true;
	$maxnumT = doubleval(0);
	$minnumT = doubleval(1000000);
	foreach ( $QueryResult as $Record ) {
		//array_push($ydata_Price, doubleval ( $Record->price ));
		$ydata_Price [$i] = doubleval ( $Record->price );
		//array_push($ydata_datetime, strtotime ( $Record->weekdate ));
		$ydata_datetime[$i] =  strtotime ( $Record->weekdate ) ;		
		if($maxnumT <doubleval ( $Record->price ))
		{
			$maxnumT = doubleval ( $Record->price ) ;
		}			
		if($minnumT > doubleval ( $Record->price ))
		{
			$minnumT = doubleval ( $Record->price );
		}	
		++ $i;
	}
	$maxnumT =intval($maxnumT +50);	
	$minnumT =intval($minnumT -50);
}


$graph = new Graph ( 400, 210 );
$graph->SetMargin ( 40, 20, 30, 30 );
$graph->SetScale ( 'datlin', $minnumT, $maxnumT, $LastDay, $Query_DepartureDate );
$graph->title->SetFont ( FF_BIG5, FS_NORMAL );
if ($Type == "YEAR") // 一个月内
{
		$graph->title->Set ($DepartureCity."至". $ArrivalCity."價格年走勢圖" );
}
else // MONTH 一年内
{
		$graph->title->Set ($DepartureCity."至". $ArrivalCity."價格月走勢圖" );
}

$graph->xaxis->title->SetFont ( FF_BIG5, FS_NORMAL, 10 );
$graph->xaxis->SetLabelFormatString("m/d",true);//Y-m-d  H:i:s
$graph->xaxis->SetTextLabelInterval(4);
$graph->xaxis->SetFont ( FF_BIG5, FS_NORMAL, 10 );
$graph->xaxis->HideLine ( false );
$graph->xaxis->HideTicks ( true, false );
$graph->yaxis->HideLine ( false );

$graph->yaxis->HideTicks ( false, false );
$graph->yaxis->title->SetFont ( FF_BIG5, FS_NORMAL, 10 );
$graph->xaxis->SetPos("min");
$graph->xgrid->SetLineStyle ( "solid" );
$graph->xgrid->SetColor ( '#E3E3E3' );

$graph->xgrid->Show ();
$graph->legend->SetFont ( FF_BIG5, FS_NORMAL );
//$graph->legend->SetPos ( 0.5, 0.95, 'center', 'center' );

if($havedata)
{
	$line = new LinePlot ( $ydata_Price, $ydata_datetime );
	
	
	$graph->Add ( $line );
	$line->SetColor("red");
	$line->SetWeight(0.5);
}

$graph->Stroke ();

?>
