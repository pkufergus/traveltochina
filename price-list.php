<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>华人购买机票首选网站</title>
    <meta name="Description" content="搜索航班时间表，搜索航班时刻表，获取当前航班状态，查找酒店，查找汽车租赁，获取旅行工具，计划旅行。查找机场信息" />
    <meta name="关键字" content="航班查询信息,航班,航班时间表,航班时刻表,便宜航班, 航班状态,酒店搜索,汽车租赁,商务旅行,旅行指南,世界时钟,世界时间,E-travel" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
     <link rel="stylesheet" type="text/css" href="./css/register.css" />
     <link rel="stylesheet" type="text/css" href="./css/price.css" />
</head>
<script src="js/jquery-1.4.2.js"></script>
<script src="js/md5.js"></script>
<script src="js/login.js"></script>
<script src="js/price-list.js"></script>
<script>
 
 
</script>
<body>
<a name=FLIGHT></a>
    <div id="maincontainer">
        <?php $aboutForm = 'ABOUT'; 
		require("./top.php");
		?>
        <div id="content_area">
        <table border="0" cellspacing="0" cellpadding="0" style="vertical-align: text-top; ">
        	<tr>
            	<td style="width:240px;" valign="top">
                <?php $language = '0';
				  $from_param = 'CN';
				                  $to_param = 'VISA';
				require("./menu.php");?>
                </td>
                <td style="width:5px;">&nbsp;
                </td>
                <td  style="width:1000px;" valign="top">
                    <table border="0" cellspacing="0" width="1000px" cellpadding="0" style="vertical-align: text-top;">
                     <tr>
                            <td valign="top" colspan="2" style="padding-left:30px;">
                                <?php require("./notice.php");//通知公告?>
                            </td>
                        </tr>
                        <tr id="content_top">
                        	<td>
                            </td>
                        </tr>
                       
                        <tr id="content_middle">
                            <td valign="top" colspan="2" >
                                <table cellspacing="0" cellpadding="0" style="width: 100%; height: 10px;">
                                    <tr>
                                        <td  colspan="2" align="left" style="width: 100%;padding-top:20px;padding-left:3px;" valign="top">
                                        
                                        
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    <tr>
									 <div id="price-list-div" style="text-align: center;">
									<p class="price-title"> 美国、加拿大到 中国特价机票价格一览表<p>
									 <p class="price-p1">（2017年01月01日更新）</p>
									<p><a href='http://www.e-traveltochina.com/article'><span class='p-span-1'>人人有用的热帖：购买便宜回国机票的窍门：</span>
									<span class='p-span-2'>http://www.e-traveltochina.com/article</span></a></p>
									 
									 </div>
                                    </tr>
                                   
                                </table>
                                
        </div>
        <?php require("./footer.php");?>
    </div>
</body>
</html>
