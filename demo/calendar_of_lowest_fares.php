<?php
$Lan='0';
header ( "Content-Type: text/html; charset=utf-8" );
include_once "./shared/ez_sql_core.php";
include_once "./mysql/ez_sql_mysql.php";
include_once "./getprice_v2.php";
include_once "./config.inc_2.php";

date_default_timezone_set (LOCAL_TIMEZONE); 
$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );

$DepartureCity = $_GET ['from'];//'NYC';//trim ( $_GET ['from'] );
$ArrivalCity = $_GET ['to'];//'BJS';//trim ( $_GET ['to'] );
$fromdate = strtotime($_GET ['fromdate']);

$Stay = intval($_GET ['stay'])*3600*24;

$Query_ReturnDate = date("Y-m-d",$fromdate+$Stay); 

$DepartureCityCode = GetDepartureCode($DepartureCity);
$ArrivalCityCode = GetArrivalCode($ArrivalCity);

$Query_DepartureDate = date("Y-m-d",$fromdate); 

$db->query("set names utf8");
	$SQL = "SELECT
				ID,
				DepartureDate,
				ReturnDate,
				DepartureCity,
				ArrivalCity,
				Price,
				Stops,
				AirlineCode,
				AirlineName,
				WebLink
			FROM
				aie_masterdata
			WHERE
				DepartureDate = '".$Query_DepartureDate."' AND
				ReturnDate  = '".$Query_ReturnDate."' AND
				DepartureCity  = '".$DepartureCityCode."' AND
				ArrivalCity = '".$ArrivalCityCode."' LIMIT 1" ;
	//echo $SQL."<br/>";
	$masterdata = $db->get_results ($SQL );
	$R_DepartureDate = '';
	$R_ReturnDate = "";
	$R_ArrivalCity = '';
	$R_Price = '';
	$R_Stops = '';
	$R_AirlineCode = '';
	$R_AirlineName = '';
	$R_WebLink = '';
	$R_HaveData = false;
	if (is_array ( $masterdata ))
	{	  
		foreach ( $masterdata as $Record ) {
			$R_DepartureDate = $Record->DepartureDate;
			$R_ReturnDate = $Record->ReturnDate;
			$R_ArrivalCity = $Record->ArrivalCity;
			$R_Price = $Record->Price;
			$R_Stops = intval($Record->Stops)>0 ?'可经停':'直飞';
			$R_AirlineCode = $Record->AirlineCode;
			$R_AirlineName = $Record->AirlineName;
			$R_WebLink = $Record->WebLink;
				//echo '<a target="_parent" href="'.str_replace('LANGUAGE=US', 'LANGUAGE=CN',$Record->WebLink ).'">'.('$'.$Record->Price).'</a>';
			$R_HaveData = true;
		}
	}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php if($Lan=='0') echo '精选出票实例'; else echo '精選出票實例';?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet" type="text/css" href="./css/cpsl.css">
    <script src="./js/jquery-1.4.2.js" language="JavaScript" type="text/javascript"></script>
</head>
<body class="body-class" >
    <div id="zc-component">
    	<img src="./images/tjjp.jpg" border="0"  />
        <table id="zc-pane" cellspacing="0" cellpadding="0" width="200px">
            <tbody>
                <div style="clear: both">
                    <table class="zc-viewtable" cellspacing="0" cellpadding="3" elname="zc-viewtable">
                        <!-- $Id$ -->
                        <tbody>

							<tr style="height:5px; BORDER-TOP: #dee8f9 1px solid;">
								<td>
                        
                                </td>
                                <td>    
                                </td>
							</tr>  
							<tr class="zc-viewrow zc-row-1" >
								<td  style="color:#FFF; padding-left:5px; background-color:#40a8dd; font-style:normal; font-size:12px; vertical-align:middle; width:120px;">
                                始发城市或机场
                                </td>
                                <td style="font-size:12px;vertical-align:middle;padding-left:5px; ">
                                <?php echo $R_HaveData==true ? $DepartureCity:'&nbsp;';?>
                                </td>
							</tr>  
                            <tr class="zc-viewrow zc-row-2">
								<td  style="color:#FFF; background-color:#40a8dd;font-size:12px;vertical-align:middle;padding-left:5px; ">
                                目的城市或机场
                                </td>
                                <td style="font-size:12px;vertical-align:middle;padding-left:5px; ">
                                <?php echo $R_HaveData==true ? $ArrivalCity:'&nbsp;';?>
                                </td>
							</tr>
                            <tr class="zc-viewrow zc-row-1">
								<td  style="color:#FFF; background-color:#40a8dd;font-size:12px;vertical-align:middle;padding-left:5px; ">
                                启程日期
                                </td>
                                <td style="font-size:12px;vertical-align:middle;padding-left:5px; ">
                                <?php echo $R_HaveData==true ? $R_DepartureDate:'&nbsp;';?>
                                </td>
							</tr>
                            <tr class="zc-viewrow zc-row-2">
								<td  style="color:#FFF; background-color:#40a8dd;font-size:12px;vertical-align:middle;padding-left:5px; ">
                                返程日期
                                </td>
                                <td style="font-size:12px;vertical-align:middle;padding-left:5px; ">
                                <?php echo $R_HaveData==true ? $R_ReturnDate:'&nbsp;';?>
                                </td>
							</tr>
                            <tr class="zc-viewrow zc-row-1">
								<td style="color:#FFF; background-color:#40a8dd;font-size:12px;vertical-align:middle;padding-left:5px; ">
                                停靠
                                </td>
                                <td style="font-size:12px;vertical-align:middle;padding-left:5px; ">
                                <?php echo $R_HaveData==true ? $R_Stops:'&nbsp;';?>
                                </td>
							</tr>
                            <tr class="zc-viewrow zc-row-1">
								<td style="color:#FFF; background-color:#40a8dd;font-size:12px;vertical-align:middle;padding-left:5px; ">
                                航空公司
                                </td>
                                <td style="font-size:12px;vertical-align:middle;padding-left:5px; ">
                                <?php echo $R_HaveData==true ? $R_AirlineName.'('.$R_AirlineCode.')':'&nbsp;';?>
                                </td>
							</tr>
                            <tr class="zc-viewrow zc-row-2">
								<td style="color:#FFF; background-color:#40a8dd;font-size:12px;vertical-align:middle;padding-left:5px; ">
                                价格
                                </td>
                                <td style="font-size:12px;vertical-align:middle;padding-left:5px; ">
                                <?php echo $R_HaveData==true ? '<a target="_parent" href="'.str_replace('LANGUAGE=US', 'LANGUAGE=CN',$R_WebLink ).'">'.('$'.$R_Price).'</a>':'&nbsp;'; ?>
                                </td>
							</tr>
                            
                               
                        </tbody>
                    </table>                   
                </div>
            </tbody>
        </table>
    </div>   
</body>
</html>