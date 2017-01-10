<?php 

include_once "./shared/ez_sql_core.php";
include_once "./mysql/ez_sql_mysql.php";
include_once "./config.inc.php";
include_once "./getprice.php";

date_default_timezone_set (LOCAL_TIMEZONE); 
if(!isset($_REQUEST["lan"]))
{
	$Lan="0";
}
else 
{
	$Lan = $_REQUEST["lan"];
}
if(!isset($_REQUEST["type"]))
{
	$Type="0";
}
else 
{
	$Type = $_REQUEST["type"];
}
if(!isset($_REQUEST["time"]))
{
	$queryTime=date('Ym');
}
else 
{
	$queryTime = $_REQUEST["time"];
}

$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
$db->query("set names utf8");
$Departure = $db->get_results ( "SELECT DISTINCT
								DepartureCode as DepartureCode,
								ChineseName as DepartureCity_CN,
								TraditionalChineseName as DepartureCity_TW,
								EnglishName as DepartureCity
								FROM
								aie_citypair
								left JOIN aie_cityname ON aie_cityname.CityCode = aie_citypair.DepartureCode" );

$Destination = $db->get_results ( "SELECT DISTINCT
								DestinationCode as DestinationCode,
								EnglishName as Destination,
								ChineseName as Destination_CN,
								TraditionalChineseName as Destination_TW 
								FROM
								aie_citypair
								left JOIN aie_cityname ON aie_citypair.DestinationCode = aie_cityname.CityCode" );

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php if($Lan=='0') echo '精选出票实例'; else echo '精選出票實例';?></title>
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
                            	<th class="zc-viewrowheader" style="width:110px;">
									    <?php if($Lan=='0') echo '目的地\出发地'; else echo '目的地 \出發地';?>                          
                        		</th>
				               <?php 
				               if (is_array ( $Departure )) //add
								{	  
									foreach ( $Departure as $Record ) {
										?> 
										<th class="zc-viewrowheader">
											<?php if($Lan=='0') echo $Record->DepartureCity_CN; else echo $Record->DepartureCity_TW; ?>                                 
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
										
										
										<td class="zc-viewrowheader" style="color:#FFF; font-size:12px;"><?php  if($Lan=='0') echo $Destination_Record->Destination_CN; else echo $Destination_Record->Destination_TW;?> </td>
										<?php 
										foreach ( $Departure as $Departure_Record ) {
											?><td>
		                                    <?php echo GetPrice2($Departure_Record->DepartureCode, $Destination_Record->DestinationCode, $queryTime, $Type,$Lan);?> 
		                                	</td><?php
										 }
										?></tr>
										<?php $row = !$row;
									}
									
								}?>       
                        </tbody>
                    </table>
                    <table cellpadding="0"  cellspacing="0" border="0" style=" width:100%;height:25px; vertical-align:middle; padding-left:30px; padding-top:5px; text-align:center;">
                    <tr align="center">
                        <td>
                        	<span style="font-size:12px; text-align:center;">  <?php if($Lan=='0') echo '因航空公司价格和座位销售情况变化迅速,以上价格仅供参考. '; else echo '因航空公司價格和座位銷售情況變化迅速,以上價格僅供參考.';?></span>
                        </td>
                    </tr>   
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
                pTar.height = pTar.contentDocument.body.offsetHeight+10;
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
