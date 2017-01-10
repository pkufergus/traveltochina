<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DataMonitor</title>
<meta name="Description" content="www.e-traveltochina.com （美中機票網）" />
<meta name="关键字" content="航班可售機位,航班,航班排期表,航班時間,低價航班,航班狀態,旅館搜尋,租車,商務旅遊,旅遊指南,世界時鐘,世界時間,E-trave" />
<link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body>
<a name=FLIGHT></a>
<div id="maincontainer">
  <?php $language = '1';   require("top.php");?>
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
                    <td><?php 
					   $QUERYDAY = date('Y-m-d');
                       include_once "./config.inc_2.php";
                                                    date_default_timezone_set (LOCAL_TIMEZONE);
												
										
													?>
                      <script type="text/javascript">
						function selectchang()
						{
							var FromOption = document.getElementById("FROM");
							var FromCity = FromOption.options[FromOption.selectedIndex].text;
							var FROM = document.getElementById("FROM").value;
							var TOOption = document.getElementById("TO");
							var ToCity = TOOption.options[TOOption.selectedIndex].text;
							var TO = document.getElementById("TO").value;
							var MONTH = document.getElementById("MONTH").value;
							var STAYDAYS = document.getElementById("STAYDAYS").value;
							var STOPS = "0";
							document.getElementById("iframepage_calendar").src = "calendar_6m_datamonotor.php?lan=CN&from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS+"&title="+FromCity+"至"+ToCity+"特价机票";
							//alert("calendar.php?from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS);
							
						}
						</script>
                      <table  cellspacing="0" cellpadding="0" style="width: 100%; height: 300px;">
                        <tr>
                          <td><table class="border" cellspacing="0" cellpadding="0" style="width: 100%; height: 30px;">
                              <tr>
                                <td width="10px">&nbsp;</td>
                                <td width="160px" align="left" ><span style="font-size: 12px; font-weight: bold;">始发城市</span>
                                  <select id="FROM" name="FROM" style="width: 100px;">
                                    <option value="LAX" selected="selected">洛杉矶</option>
                                    <option value="NYC">纽约</option>
                                    <option value="BOS">波士顿</option>
                                    <option value="HOU">休斯敦</option>
                                    <option value="WAS">华盛顿</option>
                                    <option value="SFO">旧金山</option>
                                    <option value="CHI">芝加哥</option>
                                    <option value="SEA">西雅图</option>
                                    <option value="YTO">多伦多</option>
                                    <option value="YVR">温哥华</option>
                                    <option value="YUL">蒙特利尔</option>
                                  </select></td>
                                <td width="5px"  >&nbsp;</td>
                                <td width="180px"  align="left" ><span style="font-size: 12px; font-weight: bold;">目的地城市</span>
                                  <select id="TO" name="TO" style="width: 100px;">
                                    <option value="BJS">北京</option>
                                    <option value="SHA" selected="selected">上海</option>
                                  </select></td>
                                <td width="5px" >&nbsp;</td>
                                <td width="120px"  align="left" ><span style="font-size: 12px; font-weight: bold;">出发月份</span>
                                  <SELECT style="width:60px; font-size:12px;" name="MONTH" id="MONTH" onchange=""  >
                                    <?php 
                                                    include_once "./config.inc_2.php";
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
                                <td width="5px" >&nbsp;</td>
                                <td width="160px"  align="left"><span style="font-size: 12px; font-weight: bold;">停留时间</span>
                                  <select id="STAYDAYS" name="STAYDAYS" style="width: 100px;">
                                    <option selected="selected" value="14">兩周內往返 </option>
                                    <option value="28">一个月內往返 </option>
                                    <option value="91">三个月內往返 </option>
                                    <option value="182">半年內往返 </option>
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
                          <td colspan="3" ><iframe src="<?php echo 'calendar_6m_datamonotor_all.php?lan=CN&from=LAX&to=SHA&stops=0&staydays=14&title='.urlencode('洛杉矶至上海特价机票').'&month='.date('Ym')?>" id="iframepage_calendar" name="iframepage_calendar" frameBorder="0" scrolling="no" width="969px"  height="1070px"></iframe></td>
                        </tr>
                      </table>
                      <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                        <tbody>
                          <tr>
                            <td height="5" ><img border="0" src="./images/content_line_bk.jpg"  /></td>
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
