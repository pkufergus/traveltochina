<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body>
<a name=FLIGHT></a>
<div id="maincontainer">
  <?php $language = '0';  require("top.php");?>
  <div id="content_area">
    <table border="0" cellspacing="0" cellpadding="0" style="vertical-align: text-top; ">
        <tr>
      
      <td style="width:240px;" valign="top"><?php $language = '0'; require("menu.php");?></td>
      <td style="width:5px;">&nbsp;</td>
      <td  style="width:1000px;" valign="top"><table border="0" cellspacing="0" width="1000px" cellpadding="0" style="vertical-align: text-top;">
          <tr>
            <td valign="top" colspan="2" style="padding-left:30px;"><?php require("notice.php");//通知公告?></td>
          </tr>
          <tr id="content_top">
            <td></td>
          </tr>
            <tr id="content_middle">
          
          <td valign="top" colspan="2" ><table cellspacing="0" cellpadding="0" style="width: 100%; height: 300px;">
             
              <tr>
                <td>
                  <table class="border" cellspacing="0" cellpadding="0" style="width: 960px; height: 230px;">
                    <tr height="5">
                      <td colspan="3" ></td>
                    </tr>
                    <tr>
                      <td align="left" style="width: 495px;padding-left:3px;" valign="top"><script type="text/javascript" language="javascript">  
									                  function IFrameReSize(iframename) {
									                      var pTar = document.getElementById(iframename);
									                      if (pTar) {//ff
									                          if (pTar.contentDocument && pTar.contentDocument.body.offsetHeight) {
									                              pTar.height = pTar.contentDocument.body.offsetHeight;
									                          }else if(pTar.Document && pTar.Document.body.scrollHeight)
									                          {//ie
									                              pTar.height = pTar.Document.body.scrollHeight;
									                          }
									                      }
									                  }
									                  var flighturl = "chinese_from_usa_hou_cha.php";
									              </script>
                        <iframe src="chinese_from_usa_hou_cha.php" id="iframepage" name="iframepage" frameBorder="0" scrolling="no" width="960px"  onLoad="IFrameReSize('iframepage');" ></iframe></td>
                    </tr>
                  </table></td>
              <tr style="height:10px;">
                <td>&nbsp;</td>
              </tr>
                </tr>
              
              
                <td><?php 
                                                    include_once "./config.inc.php";
                                                    date_default_timezone_set (LOCAL_TIMEZONE);
												
										
													?>
                  <script type="text/javascript">
						function selectchang()
						{
							var FROM = "HOU";
							//alert(FROM);
							var TO = "SHA";
							//alert(TO);
							var MONTH = <?php echo date('Ym');?>;
							//alert(MONTH);
							var STAYDAYS = document.getElementById("STAYDAYS").value;
							//alert(STAYDAYS);
							var STOPS = "0";
							//alert(STOPS);

							document.getElementById("iframepage_calendar").src = "calendar_6m.php?lan=CN&from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS+"&title=休斯敦至上海特价机票";
							//alert("calendar.php?from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS);
							
						}
						</script>
                  <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                    <tbody>
                      <tr>
                        <td height="5" ><img border="0" src="./images/content_line_bk.jpg"  /></td>
                      </tr>
                    </tbody>
                  </table>
                  <table  cellspacing="0" cellpadding="0" style="width: 100%; height: 300px;">
                    <tr>
                      <td><table class="border" cellspacing="0" cellpadding="0" style="width: 100%; height: 30px;">
                          <tr>
                            <td width="10px">&nbsp;</td>
                            <td width="160px" align="left" style="display:none;"><span style="font-size: 12px; font-weight: bold;">始发城市</span>
                              <select id="FROM" name="FROM" style="width: 100px;">
                                <option value="HOU">Houston</option>
                                <option value="LAX">Los Angeles</option>
                                <option value="SFO">San Francisco</option>
                              </select></td>
                            <td width="5px"  style="display:none;">&nbsp;</td>
                            <td width="180px"  align="left" style="display:none;"><span style="font-size: 12px; font-weight: bold;">目的地城市</span>
                              <select id="TO" name="TO" style="width: 100px;">
                                <option value="CHA">Beijing</option>
                                <option value="SHA">Shanghai</option>
                              </select></td>
                            <td width="5px" style="display:none;">&nbsp;</td>
                            <td width="120px"  align="left" style="display:none;"><span style="font-size: 12px; font-weight: bold;">出发月份</span>
                              <SELECT style="width:60px; font-size:12px;" name="MONTH" id="MONTH" onchange=""  >
                                <?php 
                                                    include_once "./config.inc.php";
                                                    date_default_timezone_set (LOCAL_TIMEZONE);
													$MonthText = array('一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月');
													$cur_month = intval(date('m')); 
													$cur_year = date('Y');
													for($i=1;$i<=11;$i++)
													{
														if($cur_month <10)
														{
															echo '<OPTION value="'.$cur_year.'0'.($cur_month).'">'.$MonthText[$cur_month-1].'</OPTION>';//$cur_month.$MonthText[$cur_month-1].'<br/>';
														}
														else
														{
															echo '<OPTION value="'.$cur_year.($cur_month).'">'.$MonthText[$cur_month-1].'</OPTION>';//$cur_month.$MonthText[$cur_month-1].'<br/>';
														}
														
														if($cur_month >=12)
														{
															$cur_month = $cur_month - 12;
															$cur_year = $cur_year + 1;
														}
														$cur_month++;
													}
													?>
                              </SELECT></td>
                            <td width="5px" style="display:none;">&nbsp;</td>
                            <td width="160px"  align="left"><span style="font-size: 12px; font-weight: bold;">停留时间</span>
                              <select id="STAYDAYS" name="STAYDAYS" style="width: 100px;">
                                <option value="7">一周内往返 </option>
                                <option selected="selected" value="14">两周内往返 </option>
                                <option value="28">一个月内往返 </option>
                                <option value="91">三个月内往返 </option>
                                <option value="182">半年内往返 </option>
                              </select></td>
                            <td width="5px">&nbsp;</td>
                            <td width="120px"  align="left"  style="display:none;"><span style="font-size: 12px; font-weight: bold;">是否直飞</span>
                              <select id="STOPS" style="width: 40px;">
                                <option value="1">是</option>
                                <option selected="selected" value="0">否</option>
                              </select></td>
                            <td  align="left"><a href="javascript:void(0);"  onclick="selectchang();" ><img border="0" src="./images/search_flight.png" /></a></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr height="335px">
                      <td colspan="3" ><iframe src="<?php echo 'calendar_6m.php?lan=CN&from=HOU&to=SHA&stops=0&&staydays=14&title='.urlencode('休斯敦至上海特价机票').'&month='.date('Ym');?>" id="iframepage_calendar" name="iframepage_calendar" frameBorder="0" scrolling="no" width="969px"  height="1070px"></iframe></td>
                    </tr>
                  </table>
                  <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                    <tbody>
                      <tr>
                        <td height="5" ><img border="0" src="./images/content_line_bk.jpg"  /></td>
                      </tr>
                    </tbody>
                  </table>
                  </td>
              </tr>
               <tr>
                <td valign="top" ><table width="100%">
                    <tbody>
                      <tr id="tr_right_Chinese">
                        <td colspan="2"><p style="padding-bottom: 18px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 8px"> <font color="#004483" size="3" face="微软雅黑">美中机票网评论: 休斯顿至上海航班</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 1) 线路：休斯顿至上海暂无直飞航班，须转机。可搭乘美国联合航空公司 (United Airlines) 、达尔美 (Delta Airlines) 、美利坚航空公司 (American Airlines)和加拿大航空公司(Air Canada) 在纽约、芝加哥、底特律、旧金山、洛杉矶、西雅图和多伦多、温哥华等枢纽机场转机至上海或中国其他城市；也可以转机至纽约、芝加哥、洛杉矶、旧金山、西雅图等枢纽机场再搭乘国航、东航、南航、海航和其它航空公司航班飞往上海或中国其他城市；也可以搭乘日航、大韩、韩亚、国泰、全日空等在韩国、日本、香港中转至上海或中国其他城市。</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 2) 机场：主要为乔治•布什国际机场 (IAH) 。</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 3) 航班衔接：美联航、达尔美 、美利坚航空公司和加航在美国国内及加拿大境内航班衔接网络极其完善，大多城市当日衔接。</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 4) 中转须知：休斯顿飞上海中转时注意最好不要选择过夜航班；回程建议预留三个小时左右转机时间；加航对中国公民在加当日转机提供免签证服务。</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体"> 5）价格：就休斯顿飞上海航班而言，通常来讲，1 月到3 月初（中国春节除外）、11 月到12 月初的价格最为便宜；4 月和5月、9 月和10 月其次；6 月中到9 月初、12 月中到1 月初和中国春节期间，价格最贵。行程在1个月以内的较便宜；1个月以上、3个月以内会贵一些；3个月以上、6个月以内更贵一些；6个月以上最贵。</font></p>
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;line-height:20px;
                                                                margin-bottom: 0px; padding-top: 0px"> <font color="#000000" size="2" face="宋体">6） 学生寒、暑假回国时，机票价格很高，在考试和放假日期确定后，尽量提前订票，尽量晚走、早回。探亲访友的旅客，最好选择在淡季出行，最好不要超过1个月。</font></p>
                          
                          <p style="padding-bottom: 11px; margin-top: 0px; padding-left: 20px; width: 930px;
                                                                margin-bottom: 0px; padding-top: 0px"> </p></td>
                      </tr>
                    </tbody>
                  </table></td>
              </tr>
            </table>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
              <tbody>
                <tr>
                  <td height="5"></td>
                </tr>
              </tbody>
            </table></td>
            </tr>
          
          <tr id="content_bottom">
            <td>&nbsp;</td>
          </tr>
        </table></td>
        </tr>
      
    </table>
  </div>
  <?php require("footer.php");?>
</div>
</body>
</html>