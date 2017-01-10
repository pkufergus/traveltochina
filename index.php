<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>美中机票网 – 华人购买机票首选网站</title>
  <meta name="Description" content="美中机票网是北美首家全中文服务、网上即时订购机票的在线旅行社。我公司提供纽约至北京特价机票，纽约至上海特价机票，洛杉矶至北京特价机票，洛杉矶至上海特价机票，旧金山至北京特价机票，旧金山至上海特价机票，芝加哥至北京特价机票，芝加哥至上海特价机票，休斯顿至北京特价机票，休斯顿至上海特价机票，波士顿至北京特价机票，波士顿至上海特价机票" />
    <meta name="关键字" content="航班查询信息,航班,航班时间表,航班时刻表,便宜航班, 航班状态,酒店搜索,汽车租赁,商务旅行,旅行指南,世界时钟,世界时间,E-travel" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
	<script src="js/jquery-1.4.2.js"></script>
</head>
<body>
<?php
	$locat=$_GET['location'];
	$aboutForm=$_GET['location'];
	 
?>
<a name=FLIGHT></a>
    <div id="maincontainer">
        <?php $language = '0'; 
       	$country = $locat;
        require("top.php");?>
        <div id="content_area">
        <table border="0" cellspacing="0" cellpadding="0" style="vertical-align: text-top; ">
        	<tr>
            	<td style="width:240px;" valign="top" style=" vertical-align:top;">
                <?php $language = '0'; 
                $param_test = $locat;
                $from_param = $_GET['fromCode'];
                $to_param = $_GET['toCode'];
                require("menu.php");
                 
                ?>
                </td>
                <td style="width:5px;">&nbsp;
                </td>
                <td  style="width:1000px;" valign="top">
                    <table border="0" cellspacing="0" cellpadding="0" style="vertical-align: text-top; ">
                    <tr style="height:25px;">
                        <td valign="top" style="padding-left:30px; height:25px;">
                            <?php require("notice.php");//通知公告?>
                        </td>
                    </tr>
                    <tr id="content_top">
                        	<td>
                            </td>
                        </tr>
                        <tr id="content_middle">
                            <td valign="top" colspan="2" >
                                <?php require("flight.php");//机票查询?>
                            </td>
                        </tr>
                        <tr id="content_bottom">
                        	<td>&nbsp;
                            </td>
                        </tr>
                    <!--<tr style="display: none;">
                        <td valign="top" colspan="2" >
                            <?php //require("tjjp.php");//特价机票?>
                        </td>
                    </tr>
                    <tr  style="display: none;">
                        <td colspan="2"  valign="top">  
                            <table border="0" cellspacing="0" cellpadding="0" style="vertical-align: text-top;">
                                <tr>
                                    <td valign="top">
                                        <?php //require("cpsl.php");//出票实例?>
                                    </td>
                                </tr> 
                                
                            </table>
                        </td>
                        <!--  <td valign="top">
                            <img src="./images/right_ad.jpg" />
                        </td>--> 
                    <!--</tr>
                    <tr  style="display: none;">
                        <td valign="top"  colspan="2">
                            <?php //require("confirm.php");//航空公司确认流程?>
                        </td>
                    </tr> -->
                	</table>
                </td>
            </tr>
            <tr>
              <td colspan="3">
              <?php //require("ad.php");?>
              </td>
            <tr>
            
         </table>
            
        </div>
        <?php require("footer.php");?>
    </div>
</body>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25112573-2']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</html>


