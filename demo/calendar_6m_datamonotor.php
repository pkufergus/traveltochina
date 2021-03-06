<?php 
include_once "./shared/ez_sql_core.php";
include_once "./mysql/ez_sql_mysql.php";
include_once "./config.inc_2.php";
function getWeek($year,$month,$day){
	$week=date("w",mktime(0,0,0,$month,$day,$year));//获得星期
	return $week;//获得星期
}

function GetPrice($Departure,$Arrival,$DepartureDate,$ReturnDate,$Stops,$day)
{
	$str_where = "";
	if($Stops == '1')
	{
		$str_where = 'Stops < 1';
	}
	else
	{
		$str_where = 'Stops <= 2';
	}
	$db = new ezSQL_mysql ( DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE, DB_SERVER );
	$db->query("set names utf8");
	$SQL = "SELECT *
			FROM
			aie_masterdata_log
			WHERE
			UpdatedDate = '".$day."' AND
			DepartureCity = '".$Departure."' AND
			ArrivalCity = '".$Arrival."' AND
			DepartureDate = '".$DepartureDate."' AND
			ReturnDate = '".$ReturnDate."' AND
			".$str_where."
			LIMIT 1" ;
	$masterdata = $db->get_results ($SQL );
	//echo $SQL."<br/>";
	if (is_array ( $masterdata ))
	{	  
		foreach ( $masterdata as $Record ) {
			return '<a style="margin:0; padding:0;" target="_blank" href="'.$Record->WebLink.'">'.(intval($Record->Price)).'</a>';
		}
	}
	else 
	{
		return '';
	}
}

$month=date("m"); //默认为本月
$year=date("Y"); //默认为本年

$queryday = date("Y-m-d");

if(isset($_GET["month"]))
{
	$month = date("m",strtotime($_GET["month"].'01'));
	$year=date("Y",strtotime($_GET["month"].'01'));
}
$title = ""; 
/*
var FROM = document.getElementById("FROM").value;
							//alert(FROM);
							var TO = document.getElementById("TO").value;
							//alert(TO);
							var MONTH = document.getElementById("MONTH").value;
							//alert(MONTH);
							var STAYDAYS = document.getElementById("STAYDAYS").value;
							//alert(STAYDAYS);
							var STOPS = document.getElementById("STOPS").value;
							document.getElementById("iframepage_calendar").src = "calendar.php?from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS;
							*/
if(isset($_GET["from"]))
{
	$from = $_GET["from"];
}
if(isset($_GET["title"]))
{
	$title = $_GET["title"];
}
if(isset($_GET["to"]))
{
	$to = $_GET["to"];
}
if(isset($_GET["staydays"]))
{
	$staydays = $_GET["staydays"];
}
if(isset($_GET["stops"]))
{
	$stops = $_GET["stops"];
}
if(isset($_GET["lan"]))
{
	$lan = $_GET["lan"];
}
if(isset($_GET["queryday"]))
{
	$queryday = $_GET["queryday"];
}
							
$week=getWeek($year,$month,1);
$beforedays = 0;
if($week ==0)
{
	$beforedays = 7;
}
else
{
	$beforedays = $week;
}

$firstday = strtotime ( "-".$beforedays." day" ,mktime(0,0,0,$month,1,$year));

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <link rel="stylesheet" type="text/css" href="./css/calendar.css" />
</head>
<body>
<table border='0' cellspacing='0' cellpadding='0'>
<tr>
	<td>
	
    <table border='0' cellspacing='0' cellpadding='0'>
   		 <tr>
            <td style="height: 25px; padding: 0px 0 0 30px;">
                <span style="font-size: 12px; font-weight: bold;"><?php echo $title;?></span>
            </td>
        </tr>
        <tr>
            <td style="height: 25px; padding: 0px 0 0 30px;">
                <?php echo intval($month);?>月
            </td>
        </tr>
        <tr>
            <td>
                <table cellspacing="3" cellpadding="3" class="calendar">
                    <tr class="header">
                        <td colspan="7">&nbsp;
                            
                        </td>
                    </tr>
                    <?php 
                    for($Tmpa=0;$Tmpa<6;$Tmpa++){
                    	echo '<tr class="row">';
                    	for($Tmpb=0;$Tmpb<7;$Tmpb++){
                    		if (intval(date("m",$firstday))== intval($month))
                    		{
	                    		echo '<td class="currentmonth">';
	                            echo intval(date("d",$firstday));
								if(date("w",$firstday)>0 && date("w",$firstday)<5)
								{
									//echo '<br/>'.date("w",$firstday);
									$price_temp = str_replace('LANGUAGE=US', 'LANGUAGE='.$lan,GetPrice($from,$to,date("Y-m-d",$firstday),date("Y-m-d",strtotime ( $staydays." day" ,$firstday)),$stops,$queryday) ) ;
									
									if(!empty($price_temp))
									{
										echo '<br/><div class= "price'.date("w",$firstday).'">';
										echo $price_temp;
										echo  '</div>';
									}
									else
									{
										echo '<br/><div class= "price">';
										echo "&nbsp;";
										echo  '</div>';
									}
								}
								
	                        	echo '</td>';
                    		}
                    		else
                    		{
                    			echo '<td>';
                    			echo intval(date("d",$firstday));
								echo '<br/><div class= "price">&nbsp;';
									
									echo  '</div>';
                    			echo '</td>';
                    		}
                    		
                    		$firstday = strtotime ( "1 day" ,$firstday);
                    		 
                    	}
                    	echo '</tr>';
                    }                    
                    ?>                    
                </table>
            </td>
        </tr>
    </table>
    </td>
    <td style="width:1px;">
    	
    </td>
    <td>
    
    <?php 
    $month = date("m",$firstday);
    $year = date("y",$firstday);
    
    $week=getWeek($year,$month,1);
    $beforedays = 0;
    if($week ==0)
    {
    	$beforedays = 7;
    }
    else
    {
    	$beforedays = $week;
    }
    
    $firstday = strtotime ( "-".$beforedays." day" ,mktime(0,0,0,$month,1,$year));
    
    ?>
    
    <table border='0' cellspacing='0' cellpadding='0'>
    <tr>
            <td style="height: 25px; padding: 0px 0 0 30px;">                
                <span style="font-size: 12px; font-weight: bold;"><?php echo $title;?></span>
            </td>
        </tr>
        <tr>
            <td style="height: 25px; padding: 0px 0 0 30px;">
                <?php echo intval($month);?>月
            </td>
        </tr>
        <tr>
            <td>
                <table cellspacing="3" cellpadding="3" class="calendar">
                    <tr class="header">
                        <td colspan="7">&nbsp;
                            
                        </td>
                    </tr>
                    <?php 
                    for($Tmpa=0;$Tmpa<6;$Tmpa++){//打印星期标头
                    	echo '<tr class="row">';
                    	for($Tmpb=0;$Tmpb<7;$Tmpb++){//打印星期标头
                    		if (intval(date("m",$firstday))== intval($month))
                    		{
	                    		echo '<td class="currentmonth">';
	                            echo intval(date("d",$firstday));
								if(date("w",$firstday)>0 && date("w",$firstday)<5)
								{
									$price_temp = str_replace('LANGUAGE=US', 'LANGUAGE='.$lan,GetPrice($from,$to,date("Y-m-d",$firstday),date("Y-m-d",strtotime ( $staydays." day" ,$firstday)),$stops,$queryday) ) ;
									
									if(!empty($price_temp))
									{
										echo '<br/><div class= "price'.date("w",$firstday).'">';
										echo $price_temp;
										echo  '</div>';
									}
									else
									{
										echo '<br/><div class= "price">';
										echo "&nbsp;";
										echo  '</div>';
									}
								}
								
	                        	echo '</td>';
                    		}
                    		else
                    		{
                    			echo '<td>';
                    			echo intval(date("d",$firstday));
								echo '<br/><div class= "price">&nbsp;';
									
									echo  '</div>';
                    			echo '</td>';
                    		}
                    		
                    		$firstday = strtotime ( "1 day" ,$firstday);
                    		 
                    	}
                    	echo '</tr>';
                    }                    
                    ?>                    
                </table>
            </td>
        </tr>
    </table>
    </td>
	</tr>
    
    
    <tr>
    <?php 
    $month = date("m",$firstday);
    $year = date("y",$firstday);
    
    $week=getWeek($year,$month,1);
    $beforedays = 0;
    if($week ==0)
    {
    	$beforedays = 7;
    }
    else
    {
    	$beforedays = $week;
    }
    
    $firstday = strtotime ( "-".$beforedays." day" ,mktime(0,0,0,$month,1,$year));
    
    ?>
	<td>
	
    <table border='0' cellspacing='0' cellpadding='0'>
    <tr>
            <td style="height: 25px; padding: 0px 0 0 30px;">
                <span style="font-size: 12px; font-weight: bold;"><?php echo $title;?></span>
            </td>
        </tr>
        <tr>
            <td style="height: 25px; padding: 0px 0 0 30px;">
                <?php echo intval($month);?>月
            </td>
        </tr>
        <tr>
            <td>
                <table cellspacing="3" cellpadding="3" class="calendar">
                    <tr class="header">
                        <td colspan="7">&nbsp;
                            
                        </td>
                    </tr>
                    <?php 
                    for($Tmpa=0;$Tmpa<6;$Tmpa++){
                    	echo '<tr class="row">';
                    	for($Tmpb=0;$Tmpb<7;$Tmpb++){
                    		if (intval(date("m",$firstday))== intval($month))
                    		{
	                    		echo '<td class="currentmonth">';
	                            echo intval(date("d",$firstday));
								if(date("w",$firstday)>0 && date("w",$firstday)<5)
								{
									//echo '<br/>'.date("w",$firstday);
									$price_temp = str_replace('LANGUAGE=US', 'LANGUAGE='.$lan,GetPrice($from,$to,date("Y-m-d",$firstday),date("Y-m-d",strtotime ( $staydays." day" ,$firstday)),$stops,$queryday) ) ;
									
									if(!empty($price_temp))
									{
										echo '<br/><div class= "price'.date("w",$firstday).'">';
										echo $price_temp;
										echo  '</div>';
									}
									else
									{
										echo '<br/><div class= "price">';
										echo "&nbsp;";
										echo  '</div>';
									}
								}
								
	                        	echo '</td>';
                    		}
                    		else
                    		{
                    			echo '<td>';
                    			echo intval(date("d",$firstday));
								echo '<br/><div class= "price">&nbsp;';
									
									echo  '</div>';
                    			echo '</td>';
                    		}
                    		
                    		$firstday = strtotime ( "1 day" ,$firstday);
                    		 
                    	}
                    	echo '</tr>';
                    }                    
                    ?>                    
                </table>
            </td>
        </tr>
    </table>
    </td>
    <td style="width:1px;">
    	
    </td>
    <td>
    
    <?php 
    $month = date("m",$firstday);
    $year = date("y",$firstday);
    
    $week=getWeek($year,$month,1);
    $beforedays = 0;
    if($week ==0)
    {
    	$beforedays = 7;
    }
    else
    {
    	$beforedays = $week;
    }
    
    $firstday = strtotime ( "-".$beforedays." day" ,mktime(0,0,0,$month,1,$year));
    
    ?>
    
    <table border='0' cellspacing='0' cellpadding='0'>
    <tr>
            <td style="height: 25px; padding: 0px 0 0 30px;">
                <span style="font-size: 12px; font-weight: bold;"><?php echo $title;?></span>
            </td>
        </tr>
        <tr>
            <td style="height: 25px; padding: 0px 0 0 30px;">
                <?php echo intval($month);?>月
            </td>
        </tr>
        <tr>
            <td>
                <table cellspacing="3" cellpadding="3" class="calendar">
                    <tr class="header">
                        <td colspan="7">&nbsp;
                            
                        </td>
                    </tr>
                    <?php 
                    for($Tmpa=0;$Tmpa<6;$Tmpa++){//打印星期标头
                    	echo '<tr class="row">';
                    	for($Tmpb=0;$Tmpb<7;$Tmpb++){//打印星期标头
                    		if (intval(date("m",$firstday))== intval($month))
                    		{
	                    		echo '<td class="currentmonth">';
	                            echo intval(date("d",$firstday));
								if(date("w",$firstday)>0 && date("w",$firstday)<5)
								{
									$price_temp = str_replace('LANGUAGE=US', 'LANGUAGE='.$lan,GetPrice($from,$to,date("Y-m-d",$firstday),date("Y-m-d",strtotime ( $staydays." day" ,$firstday)),$stops,$queryday) ) ;
									
									if(!empty($price_temp))
									{
										echo '<br/><div class= "price'.date("w",$firstday).'">';
										echo $price_temp;
										echo  '</div>';
									}
									else
									{
										echo '<br/><div class= "price">';
										echo "&nbsp;";
										echo  '</div>';
									}
								}
								
	                        	echo '</td>';
                    		}
                    		else
                    		{
                    			echo '<td>';
                    			echo intval(date("d",$firstday));
								echo '<br/><div class= "price">&nbsp;';
									
									echo  '</div>';
                    			echo '</td>';
                    		}
                    		
                    		$firstday = strtotime ( "1 day" ,$firstday);
                    		 
                    	}
                    	echo '</tr>';
                    }                    
                    ?>                    
                </table>
            </td>
        </tr>
    </table>
    </td>
	</tr>
    
     
    <tr>
    <?php 
    $month = date("m",$firstday);
    $year = date("y",$firstday);
    
    $week=getWeek($year,$month,1);
    $beforedays = 0;
    if($week ==0)
    {
    	$beforedays = 7;
    }
    else
    {
    	$beforedays = $week;
    }
    
    $firstday = strtotime ( "-".$beforedays." day" ,mktime(0,0,0,$month,1,$year));
    
    ?>
	<td>
	
    <table border='0' cellspacing='0' cellpadding='0'>
    <tr>
            <td style="height: 25px; padding: 0px 0 0 30px;">
                <span style="font-size: 12px; font-weight: bold;"><?php echo $title;?></span>
            </td>
        </tr>
        <tr>
            <td style="height: 25px; padding: 0px 0 0 30px;">
                <?php echo intval($month);?>月
            </td>
        </tr>
        <tr>
            <td>
                <table cellspacing="3" cellpadding="3" class="calendar">
                    <tr class="header">
                        <td colspan="7">&nbsp;
                            
                        </td>
                    </tr>
                    <?php 
                    for($Tmpa=0;$Tmpa<6;$Tmpa++){
                    	echo '<tr class="row">';
                    	for($Tmpb=0;$Tmpb<7;$Tmpb++){
                    		if (intval(date("m",$firstday))== intval($month))
                    		{
	                    		echo '<td class="currentmonth">';
	                            echo intval(date("d",$firstday));
								if(date("w",$firstday)>0 && date("w",$firstday)<5)
								{
									//echo '<br/>'.date("w",$firstday);
									$price_temp = str_replace('LANGUAGE=US', 'LANGUAGE='.$lan,GetPrice($from,$to,date("Y-m-d",$firstday),date("Y-m-d",strtotime ( $staydays." day" ,$firstday)),$stops,$queryday) ) ;
									
									if(!empty($price_temp))
									{
										echo '<br/><div class= "price'.date("w",$firstday).'">';
										echo $price_temp;
										echo  '</div>';
									}
									else
									{
										echo '<br/><div class= "price">';
										echo "&nbsp;";
										echo  '</div>';
									}
								}
								
	                        	echo '</td>';
                    		}
                    		else
                    		{
                    			echo '<td>';
                    			echo intval(date("d",$firstday));
								echo '<br/><div class= "price">&nbsp;';
									
									echo  '</div>';
                    			echo '</td>';
                    		}
                    		
                    		$firstday = strtotime ( "1 day" ,$firstday);
                    		 
                    	}
                    	echo '</tr>';
                    }                    
                    ?>                    
                </table>
            </td>
        </tr>
    </table>
    </td>
    <td style="width:1px;">
    	
    </td>
    <td>
    
    <?php 
    $month = date("m",$firstday);
    $year = date("y",$firstday);
    
    $week=getWeek($year,$month,1);
    $beforedays = 0;
    if($week ==0)
    {
    	$beforedays = 7;
    }
    else
    {
    	$beforedays = $week;
    }
    
    $firstday = strtotime ( "-".$beforedays." day" ,mktime(0,0,0,$month,1,$year));
    
    ?>
    
    <table border='0' cellspacing='0' cellpadding='0'>
    <tr>
            <td style="height: 25px; padding: 0px 0 0 30px;">
                <span style="font-size: 12px; font-weight: bold;"><?php echo $title;?></span>
            </td>
        </tr>
        <tr>
            <td style="height: 25px; padding: 0px 0 0 30px;">
                <?php echo intval($month);?>月
            </td>
        </tr>
        <tr>
            <td>
                <table cellspacing="3" cellpadding="3" class="calendar">
                    <tr class="header">
                        <td colspan="7">&nbsp;
                            
                        </td>
                    </tr>
                    <?php 
                    for($Tmpa=0;$Tmpa<6;$Tmpa++){//打印星期标头
                    	echo '<tr class="row">';
                    	for($Tmpb=0;$Tmpb<7;$Tmpb++){//打印星期标头
                    		if (intval(date("m",$firstday))== intval($month))
                    		{
	                    		echo '<td class="currentmonth">';
	                            echo intval(date("d",$firstday));
								if(date("w",$firstday)>0 && date("w",$firstday)<5)
								{
									$price_temp = str_replace('LANGUAGE=US', 'LANGUAGE='.$lan,GetPrice($from,$to,date("Y-m-d",$firstday),date("Y-m-d",strtotime ( $staydays." day" ,$firstday)),$stops,$queryday) ) ;
									
									if(!empty($price_temp))
									{
										echo '<br/><div class= "price'.date("w",$firstday).'">';
										echo $price_temp;
										echo  '</div>';
									}
									else
									{
										echo '<br/><div class= "price">';
										echo "&nbsp;";
										echo  '</div>';
									}
								}
								
	                        	echo '</td>';
                    		}
                    		else
                    		{
                    			echo '<td>';
                    			echo intval(date("d",$firstday));
								echo '<br/><div class= "price">&nbsp;';
									
									echo  '</div>';
                    			echo '</td>';
                    		}
                    		
                    		$firstday = strtotime ( "1 day" ,$firstday);
                    		 
                    	}
                    	echo '</tr>';
                    }                    
                    ?>                    
                </table>
            </td>
        </tr>
    </table>
    </td>
	</tr>
</table>
</body>
</html>

