<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>华人购买机票首选网站</title>
    <meta name="Description" content="搜索航班时间表，搜索航班时刻表，获取当前航班状态，查找酒店，查找汽车租赁，获取旅行工具，计划旅行。查找机场信息" />
    <meta name="关键字" content="航班查询信息,航班,航班时间表,航班时刻表,便宜航班, 航班状态,酒店搜索,汽车租赁,商务旅行,旅行指南,世界时钟,世界时间,E-travel" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
     <link rel="stylesheet" type="text/css" href="./css/register.css" />
</head>
<script src="js/jquery-1.4.2.js"></script>
<script src="js/md5.js"></script>
<script src="js/login.js"></script>
<script>
function changeImg(){
    document.getElementById("validateCodeImg").src="/v1/image/DrawImage?"+Math.random();
}


function BindEnter(obj)
{
    //使用document.getElementById获取到按钮对象
    var button = document.getElementById('login_btn');
    if(obj.keyCode == 13)
        {
            button.click();
            obj.returnValue = false;
        }
}
</script>
<body onkeydown="BindEnter(event)">
<a name=FLIGHT></a>
    <div id="maincontainer">
        <?php $aboutForm = 'ABOUT'; 
		require("./top.php");
		?>
        <div id="content_area">
        <table border="0" cellspacing="0" cellpadding="0" style="vertical-align: text-top; ">
        	<tr>
            	<td style="width:240px;" valign="top">
                <?php $language = '0'; require("./menu.php");?>
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
									 
									<div class="warn-msg" id='errorMsgDiv'></div>
									 
									<div style='font-family: "微软雅黑"; font-size :12px;text-align: center;'>
										
										<p style='position: absolute; margin-left: 351px;'> 邮箱&nbsp;&nbsp;&nbsp;&nbsp;<input style='height:30px' class='login-txt' type="text" id="emailTxt" name="name" ><span class="warn-msg" id="emailTxt-span"></span>
										</p>
										<p  style=' position: absolute;  margin-left: 351px; margin-top: 59px;'>
										密码&nbsp;&nbsp;&nbsp;&nbsp;<input class='login-txt' style='height:30px'  type="password" id="pwdTxt" name="password"><span class="warn-msg" id="pwdTxt-span"></span>
										</p>
										<p style='margin-left: -8px;'>
										<input type="text" style=' width: 120px; margin-left:47px;margin-top:105px;position: absolute; height: 30px;border-radius:3px;border: solid 1px rgb(194, 184, 184);' placeholder="请输入验证码" id="checkCodeTxt"/>
										<img style='margin-top: 108px;margin-left: 196px;  height: 30px;  width: 98px;' alt="验证码看不清，换一张" src="/v1/image/DrawImage" id="validateCodeImg" onclick="changeImg()">
										<br/>
										<a href="javascript:void(0)" class='login-a'  style='position: absolute; margin-top: 3px;  margin-left: -103px;' onclick="changeImg()">看不清，换一张</a>
										<span style='  position: absolute; margin-top: 2px;  margin-left: 52px;' class="warn-msg"  id="checkCodeTxt-span"></span>
										</p>
									 
										
										<p style='margin-top: 29px;'>
										<input class='login-btn-login' style='height:35px;  margin-left: -69px;' type="button" id="login_btn" value="登&nbsp;&nbsp;录">
										 
										<a class='login-a' href="forgetpwd.php" >忘记密码</a>
										</p>
									</div>
									</form>
                                    
                                    </tr>
                                   
                                </table>
                                <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                                    <tbody>
                                        <tr>
                                            <td height="5">
                                            <table cellspacing="0" cellpadding="0" style="width: 98%; height: 10px;     border-top: solid 1px rgb(194, 184, 184);">
                                    <tbody><tr>
                                        <td colspan="2" align="left" style="width: 100%;padding-top:20px;padding-left:3px;" valign="top">
                                        
                                        
                                        <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 95%;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                   &nbsp;&nbsp; 美中机票网是北美首家全中文服务、网上即时订购机票的在线旅行社。我公司致力于为我们的客户提供最好的价格、最方便的服务、最安全的购买流程。</font></p>
                                                                
                                                                <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: width: 95%;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                    公司的主要创始人均为航空界、海运界及法律界高级管理人员，均持有国际航空运输协会航空管理硕士或剑桥经营管理硕士学位。</font></p>
                                                                
          
                                                                        
        
                                        </td>
                                    </tr>
                                    <tr>
                                    <td valign="top">
                                    <table width="40%">
                                                <tbody>
                                                    <tr id="tr_right_Chinese">
                                                        <td colspan="2">
                                                            <p style="padding-bottom: 18px; margin-top: 0px; padding-left: 20px; width: 350px;
                                                                margin-bottom: 0px; padding-top: 8px">
                                                                <font color="#004483" size="3" face="微软雅黑">我们承诺</font></p>
                                                            <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 350px;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                    <img style="padding-bottom: 0px; margin: 1px 3px 0px 0px; padding-left: 0px; padding-right: 0px;
                                                                        vertical-align: top; padding-top: 0px" alt="" src="./images/check_mark_15.jpg">以批发价格销售回国机票；</font></p>
                                                            
                                                             <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 350px;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                    <img style="padding-bottom: 0px; margin: 1px 3px 0px 0px; padding-left: 0px; padding-right: 0px;
                                                                        vertical-align: top; padding-top: 0px" alt="" src="./images/check_mark_15.jpg">即时邮件确认；</font></p>
                                                            
                                                            
                                                            <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 350px;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                    <img style="padding-bottom: 0px; margin: 1px 3px 0px 0px; padding-left: 0px; padding-right: 0px;
                                                                        vertical-align: top; padding-top: 0px" alt="" src="./images/check_mark_15.jpg">24小时内出票；</font></p>
                                                            <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 350px;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                    <img style="padding-bottom: 0px; margin: 1px 3px 0px 0px; padding-left: 0px; padding-right: 0px;
                                                                        vertical-align: top; padding-top: 0px" alt="" src="./images/check_mark_15.jpg">出票后即寄送电子客票及Invoice；</font></p>
                                                            <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 350px;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                    <img style="padding-bottom: 0px; margin: 1px 3px 0px 0px; padding-left: 0px; padding-right: 0px;
                                                                        vertical-align: top; padding-top: 0px" alt="" src="./images/check_mark_15.jpg">出发前3日提示旅行日期...</font></p>
                                                          
                                                            <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 350px;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                </p>
                                                           
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    <table width="60%">
                                                <tbody>
                                                    <tr id="tr_right_Chinese">
                                                        <td colspan="2">
                                                            <p style="padding-bottom: 18px; margin-top: 0px; padding-left: 20px; width: 270px;
                                                                margin-bottom: 0px; padding-top: 8px">
                                                                <font color="#004483" size="3" face="微软雅黑">选择我们的理由</font></p>
                                                            <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 270px;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                    <img style="padding-bottom: 0px; margin: 1px 3px 0px 0px; padding-left: 0px; padding-right: 0px;
                                                                        vertical-align: top; padding-top: 0px" alt="" src="./images/check_mark_15.jpg">最佳美中、加中机票价格及行程安排；</font></p>
                                                            <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 270px;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                    <img style="padding-bottom: 0px; margin: 1px 3px 0px 0px; padding-left: 0px; padding-right: 0px;
                                                                        vertical-align: top; padding-top: 0px" alt="" src="./images/check_mark_15.jpg">网上直接查询订购，方便简单；</font></p>
                                                            <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 270px;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                    <img style="padding-bottom: 0px; margin: 1px 3px 0px 0px; padding-left: 0px; padding-right: 0px;
                                                                        vertical-align: top; padding-top: 0px" alt="" src="./images/check_mark_15.jpg">超过1，000万种行程选择；</font></p>
                                                            <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 270px;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                    <img style="padding-bottom: 0px; margin: 1px 3px 0px 0px; padding-left: 0px; padding-right: 0px;
                                                                        vertical-align: top; padding-top: 0px" alt="" src="./images/check_mark_15.jpg">与全球顶级供应商密切合作；</font></p>
                                                            <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 270px;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                    <img style="padding-bottom: 0px; margin: 1px 3px 0px 0px; padding-left: 0px; padding-right: 0px;
                                                                        vertical-align: top; padding-top: 0px" alt="" src="./images/check_mark_15.jpg">行业协会认证会员，信誉保证；</font></p>
                                                            <p style="padding-bottom: 35px; margin-top: 0px; padding-left: 20px; width: 270px;
                                                                margin-bottom: 0px; padding-top: 0px">
                                                                <font color="#000000" size="2" face="宋体">
                                                                    <img style="padding-bottom: 0px; margin: 1px 3px 0px 0px; padding-left: 0px; padding-right: 0px;
                                                                        vertical-align: top; padding-top: 0px" alt="" src="./images/check_mark_15.jpg">旅客及支付信息加密保护，安全可靠；</font></p>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                    
                                    </td>
                                    
                                    </tr>
                                   
                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>	   
                        <tr id="content_bottom">
                        	<td>&nbsp;
                        	
                            </td>
                        </tr>         
                    </table>
                     </td>
            </tr>
         </table>
        </div>
        <?php require("./footer.php");?>
    </div>
</body>
</html>
