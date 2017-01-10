<?php 

include_once "./shared/ez_sql_core.php";
include_once "./mysql/ez_sql_mysql.php";
include_once "./config.inc.php";
include_once "./getprice_test.php";

date_default_timezone_set (LOCAL_TIMEZONE); 
if(empty($_REQUEST["type"]))
{
	$Type="0";
}
else 
{
	$Type = $_REQUEST["type"];
}

$Today = date ( "Y-m-d 00:00:00", strtotime ( "3 day" ) ) ;


//echo $Today."<br/>";

if ($Type == "1") //一个月往返
{
	$NextDay = date ( "Y-m-d  H:i:s",strtotime ( date ( "Y-m-d 00:00:00", strtotime ( "1 month" )+3600*24*3 ) ) ) ;
} elseif ($Type == "2")//三个月往返
{
	$NextDay = date ( "Y-m-d  H:i:s",strtotime ( date ( "Y-m-d 00:00:00", strtotime ( "3 month" )+3600*24*3 ) ) ) ;
} elseif ($Type == "3") //半年往返
{
	$NextDay = date ( "Y-m-d  H:i:s",strtotime ( date ( "Y-m-d 00:00:00", strtotime ( "6 month" )+3600*24*3 ) ) ) ;
} elseif ($Type == "4") //一年往返
{
	$NextDay = date ( "Y-m-d  H:i:s",strtotime ( date ( "Y-m-d 00:00:00", strtotime ( "1 year" )+3600*24*3 ) ) ) ;
}else //两周内往返
{
	$NextDay = date ( "Y-m-d  H:i:s",strtotime ( date ( "Y-m-d 00:00:00", strtotime ( "2 week" )+3600*24*3 ) ) ) ;
	
}
//echo $NextDay."<br/>";

$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
$db->query("set names utf8");
$Departure = $db->get_results ( "SELECT DISTINCT
								aie_citypair.DepartureCode,
								aie_citypair.DepartureCity
								FROM
								aie_citypair" );

$Destination = $db->get_results ( "SELECT DISTINCT
								aie_citypair.Destination,
								aie_citypair.DestinationCode
								FROM
								aie_citypair
								" );


?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>精选出票实例</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet" type="text/css" href="./css/cpsl.css">
    <script src="./js/jquery-1.4.2.js"
        language="JavaScript" type="text/javascript"></script>
</head>
<body class="body-class">
    <div id="zc-component">
        <table id="zc-pane" cellspacing="0" cellpadding="0">
            <tbody>
                <div style="clear: both">
                    <table class="zc-viewtable" cellspacing="0" cellpadding="3" width="100%" elname="zc-viewtable">
                        <!-- $Id$ -->
                        <tbody>
                            <tr class="zc-row-header" elname="zc-colheaderrow">
                            	<th class="zc-viewrowheader">
									目的地/出发地                                   
                        		</th>
				               <?php 
				               if (is_array ( $Departure )) //add
								{	  
									foreach ( $Departure as $Record ) {
										?> 
										<th class="zc-viewrowheader">
											<?php echo $Record->DepartureCity; ?>                                 
				                        </th>
									<?php }
								}
				               ?> 
				             </tr>
                         
                                <?php if (is_array ( $Departure )&& is_array ( $Destination )) //add
								{	  
									$row = true;
									foreach ( $Destination as $Destination_Record ) {
										?>
										<tr class="<?php if($row) echo 'zc-viewrow zc-row-1'; else echo 'zc-viewrow zc-row-2';?>">
										
										
										<td><?php echo $Destination_Record->Destination;?> </td>
										<?php 
										foreach ( $Departure as $Departure_Record ) {
											?><td>
		                                    <?php echo GetPrice($Departure_Record->DepartureCode, $Destination_Record->DestinationCode, $Today, $NextDay);?> 
		                                	</td><?php
										 }
										?></tr>
										<?php $row = !$row;
									}
									
								}?>       
                        </tbody>
                    </table>
                </div>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
    function IFrameReSize(iframename) {
        var pTar = parent.document.getElementById(iframename);
        if (pTar) {//ff
            if (pTar.contentDocument && pTar.contentDocument.body.offsetHeight) {
                pTar.height = pTar.contentDocument.body.offsetHeight-12;
            }else if(pTar.Document && pTar.Document.body.scrollHeight)
            {//ie
                pTar.height = pTar.Document.body.scrollHeight+10;
            }
        }
    }
    function IFrameReSizeWidth(iframename) {
        var pTar = parent.document.getElementById(iframename);
        if (pTar){//ff
            if (pTar.contentDocument && pTar.contentDocument.body.offsetWidth) {
                pTar.width = pTar.contentDocument.body.offsetWidth;
            }
            else if (pTar.Document && pTar.Document.body.scrollWidth) {//ie
                pTar.width = pTar.Document.body.scrollWidth;
            }
        }
    }
    $(document).ready(function() {
    	IFrameReSize('iframe_tjjp');
  	});
	//IFrameReSizeWidth('iframe_tjjp');
	</script>
</body>
</html>
