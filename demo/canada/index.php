<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>加中机票网：北人购买机票首选网站</title>
    <meta name="Description" content="搜索航班时间表，搜索航班时刻表，获取当前航班状态，查找酒店，查找汽车租赁，获取旅行工具，计划旅行。查找机场信息" />
    <meta name="关键字" content="航班查询信息,航班,航班时间表,航班时刻表,便宜航班, 航班状态,酒店搜索,汽车租赁,商务旅行,旅行指南,世界时钟,世界时间,E-travel" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body><a name=FLIGHT></a>
    <div id="maincontainer">
        <?php $language = '0';  require("top.php");?>
        <div id="content_area">
        <table border="0" cellspacing="0" cellpadding="0" style="vertical-align: text-top; ">
        	<tr>
            	<td style="width:240px;" valign="top">
                <?php $language = '0'; require("menu.php");?>
                </td>
                <td style="width:5px;">&nbsp;
                </td>
                <td  style="width:1000px;" valign="top">
                    <table border="0" cellspacing="0" cellpadding="0" style="vertical-align: text-top;">
                        <tr>
                            <td valign="top" colspan="2" style="padding-left:30px;">
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
                        <!--<tr  style="display: none;">
                            <td valign="top" colspan="2" >
                                <?php //require("tjjp.php");//特价机票?>
                            </td>
                        </tr>
                        <tr  style="display: none;">
                            <td colspan="2" valign="top">  
                                <table border="0" cellspacing="0" cellpadding="0" style="vertical-align: text-top;">
                                    <tr>
                                        <td valign="top">
                                            <?php //require("cpsl.php");//出票实例?>
                                        </td>
                                    </tr> 
                                    
                                </table>
                            </td>
                           <!-- <td valign="top">
                                <img src="./images/right_ad.jpg" />
                            </td> -->
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
</html>
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