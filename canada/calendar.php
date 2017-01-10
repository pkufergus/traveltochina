<?php 

function getWeek($year,$month,$day){
	$week=date("w",mktime(0,0,0,$month,$day,$year));//获得星期
	return $week;//获得星期
}

if(isset($_POST["month"]))
{ 
	$month=$_POST["month"];
}
else
{
	$month=date("m"); //默认为本月
}
if(isset($_POST["year"]))
{ 
	$year=$_POST["year"];
}
else
{
	$year=date("Y"); //默认为本年
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
    <title>华人购买机票首选网站</title>
    <meta name="Description" content="搜索航班时间表，搜索航班时刻表，获取当前航班状态，查找酒店，查找汽车租赁，获取旅行工具，计划旅行。查找机场信息" />
    <meta name="关键字" content="航班查询信息,航班,航班时间表,航班时刻表,便宜航班, 航班状态,酒店搜索,汽车租赁,商务旅行,旅行指南,世界时钟,世界时间,E-travel" />
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
	                        	echo '</td>';
                    		}
                    		else
                    		{
                    			echo '<td>';
                    			echo intval(date("d",$firstday));
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
	                        	echo '</td>';
                    		}
                    		else
                    		{
                    			echo '<td>';
                    			echo intval(date("d",$firstday));
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
