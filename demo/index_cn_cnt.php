<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>華人購買機票首選網站</title>
    <meta name="Description" content="搜尋航班排期表、搜尋航班時刻表、取得目前航班狀態、尋找旅館、尋找租車、取得行程工具、計劃行程。尋找機場資訊" />
    <meta name="关键字" content="航班可售機位,航班,航班排期表,航班時間,低價航班,航班狀態,旅館搜尋,租車,商務旅遊,旅遊指南,世界時鐘,世界時間,E-trave" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body><a name=FLIGHT></a>
    <div id="maincontainer">
        <?php  $language = '1'; $aboutForm = 'CN'; require("top_cn_cnt.php");?>
        <div id="content_area">
        <table border="0" cellspacing="0" cellpadding="0" style="vertical-align: text-top; ">
        	<tr>
            	<td style="width:240px;" valign="top">
                <?php $language = '0'; require("menu_cnt.php");?>
                </td>
                <td style="width:5px;">&nbsp;
                </td>
                <td  style="width:1000px;"  valign="top">
                    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="vertical-align: text-top;">
                        <tr  style="height:25px;">
                            <td valign="top" colspan="2" style="padding-left:30px;">
                                <?php require("notice_cnt.php");//通知公告?>
                            </td>
                        </tr>
                        <tr id="content_top">
                        	<td>
                            </td>
                        </tr>
                        <tr id="content_middle">
                            <td valign="top" colspan="2" >
                                <?php require("flight_cn_cnt.php");//机票查询?>
                            </td>
                        </tr>
                        <tr id="content_bottom">
                        	<td>&nbsp;
                            </td>
                        </tr>
                        <!--<tr style="display: none;">
                            <td valign="top" colspan="2" >
                                <?php //require("tjjp_cnt.php");//特价机票?>
                            </td>
                        </tr>
                        <tr style="display: none;">
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
                       <!-- </tr>
                        <tr style="display: none;">
                            <td valign="top"  colspan="2">
                                <?php //require("confirm_cnt.php");//航空公司确认流程?>
                            </td> -->
                        </tr> 
                    </table>
                 </td>
            </tr>
            <tr>
              <td  colspan="3">
              <?php //require("ad_cnt.php");?>
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