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
									                  var flighturl = "chinese_from_usa_{###FROM_CITY_CODE_l###}_{###TO_CITY_CODE_l###}.php";
									              </script>
                        <iframe src="chinese_from_usa_{###FROM_CITY_CODE_l###}_{###TO_CITY_CODE_l###}.php" id="iframepage" name="iframepage" frameBorder="0" scrolling="no" width="960px"  onLoad="IFrameReSize('iframepage');" ></iframe></td>
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
							var FROM = "{###FROM_CITY_CODE###}";
							//alert(FROM);
							var TO = "{###TO_CITY_CODE###}";
							//alert(TO);
							var MONTH = <?php echo date('Ym');?>;
							//alert(MONTH);
							var STAYDAYS = document.getElementById("STAYDAYS").value;
							//alert(STAYDAYS);
							var STOPS = "0";
							//alert(STOPS);

							document.getElementById("iframepage_calendar").src = "calendar_6m.php?lan=CN&from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS+"&title={###FROM_CITY_NAME###}至{###TO_CITY_NAME###}特价机票";
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
                                <option value="YTO">Toronto</option>
                                <option value="LAX">Los Angeles</option>
                                <option value="SFO">San Francisco</option>
                              </select></td>
                            <td width="5px"  style="display:none;">&nbsp;</td>
                            <td width="180px"  align="left" style="display:none;"><span style="font-size: 12px; font-weight: bold;">目的地城市</span>
                              <select id="TO" name="TO" style="width: 100px;">
                                <option value="BJS">Beijing</option>
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
                      <td colspan="3" ><iframe src="<?php echo 'calendar_6m.php?lan=CN&from={###FROM_CITY_CODE###}&to={###TO_CITY_CODE###}&stops=0&&staydays=14&title='.urlencode('{###FROM_CITY_NAME###}至{###TO_CITY_NAME###}特价机票').'&month='.date('Ym');?>" id="iframepage_calendar" name="iframepage_calendar" frameBorder="0" scrolling="no" width="969px"  height="1065px"></iframe></td>
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
                        <td colspan="2">{###CONTENT###}</td>
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
