						<?php 
						$fromdate = date ( "Y-m-d", strtotime ( "3 day" ) ) ;
						$todate = date ( "Y-m-d", strtotime ( "10 day" ) ) ;
						$month = "pricechart.php?type=MONTH&from=Los Angeles&to=Beijing&fromdate=".$fromdate."&todate=".$todate."";
						$year = "pricechart.php?type=YEAR&from=Los Angeles&to=Beijing&fromdate=".$fromdate."&todate=".$todate."";
						?>
                        <script type="text/javascript">
						function selectchang()
						{
							var FROM = document.getElementById("FROM").value;
							//alert(FROM);
							var TO = document.getElementById("TO").value;
							//alert(TO);
							var MONTH = document.getElementById("MONTH").value;
							//alert(MONTH);
							var STAYDAYS = document.getElementById("STAYDAYS").value;
							//alert(STAYDAYS);
							var STOPS = document.getElementById("STOPS").value;
							//alert(STOPS);

							document.getElementById("iframepage_calendar").src = "calendar.php?lan=TW&from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS;
							//alert("calendar.php?from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS);
							
						}
						</script>
						<table class="border" cellspacing="0" cellpadding="0" style="width: 960px; height: 230px;">
                        	<tr height="5">
                            <td colspan="3" ></td>
                            </tr>
                            <tr>
                                <td align="left" style="width: 495px;padding-left:3px;" valign="top">
	                                <script type="text/javascript" language="javascript">  
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
									                  var flighturl = "<?php if(!(isset($aboutForm))|| $aboutForm == 'USA')
																			{
																				echo 'chinese_from_usa_cnt.php';
																			}
																			else//if($aboutForm =='CN')
																			{
																				echo "chinese_from_cn_cnt.php";
																			}?>";
									              </script>						
                        			<iframe src="<?php if(!(isset($aboutForm))|| $aboutForm == 'USA')
																			{
																				echo 'chinese_from_usa_cnt.php';
																			}
																			else//if($aboutForm =='CN')
																			{
																				echo "chinese_from_cn_cnt.php";
																			}?>" id="iframepage" name="iframepage" frameBorder="0" scrolling="no" width="960px"  onLoad="IFrameReSize('iframepage');" ></iframe>                    
                                </td>
                                
                                </tr>
                                </table>
                                <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                            <tbody>
                                <tr>
                                    <td height="5">
                                    <img border="0" src="./images/content_line_bk.jpg"  />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table  cellspacing="0" cellpadding="0" style="width: 100%; height: 300px;">
                        <tr>
                            <td>
                                <table class="border" cellspacing="0" cellpadding="0" style="width: 100%; height: 30px;">
                                    <tr>
                                        <td width="10px">&nbsp;
                                        </td>
                                        <td width="160px" align="left">
                                            <span style="font-size: 12px; font-weight: bold;">始發城市</span>
                                            <select id="FROM" name="FROM" style="width: 100px;">
                                            <option value="BJS">北京</option>
                                            <option value="SHA">上海</option>
                                            </select>
                                        </td>
                                        <td width="5px">&nbsp;
                                        </td>
                                        <td width="180px"  align="left">
                                            <span style="font-size: 12px; font-weight: bold;">目的地城市</span>
                                            <select id="TO" name="TO" style="width: 100px;">
                                            	<option value="NYC">紐約</option>
                                                <option value="LAX">洛杉磯</option>
                                                <option value="BOS">波士頓</option>
                                                <option value="HOU">休士頓</option>
                                                <option value="WAS">華盛頓</option>
                                                <option value="SFO">三藩市</option>
                                                <option value="CHI">芝加哥</option>
                                                <option value="SEA">西雅圖</option>
                                            </select>
                                        </td>
                                        <td width="5px">&nbsp;
                                        </td>
                                        <td width="120px"  align="left">
                                            <span style="font-size: 12px; font-weight: bold;">出發月份</span>
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
                                                                                                           
                                            	</SELECT>
                                        </td>
                                        <td width="5px">&nbsp;
                                        </td>
                                        <td width="160px"  align="left">
                                            <span style="font-size: 12px; font-weight: bold;">停留時間</span>
                                            <select id="STAYDAYS" name="STAYDAYS" style="width: 100px;">
                                                <option selected="selected" value="7">一周內往返 </option>
                                                <option value="14">兩周內往返 </option>
                                                <option value="28">一個月內往返 </option>
                                                <option value="91">三個月內往返 </option>
                                                <option value="182">半年內往返 </option>
                                            </select>
                                        </td>
                                        <td width="5px">&nbsp;
                                        </td>
                                        <td width="120px"  align="left" style="display:none;">
                                            <span style="font-size: 12px; font-weight: bold;">是否直飛</span>
                                            <select id="STOPS" style="width: 40px;">
                                                <option value="1">是</option>
                                                <option selected="selected" value="0">否</option>
                                            </select>
                                        </td>
                                        <td  align="left">
                                        <a href="javascript:void(0);"  onclick="selectchang();" ><img border="0" src="./images/search_flight.png" /></a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr height="335px">
                            <td colspan="3" >
                            <iframe src="<?php  echo 'calendar.php?lan=TW&from=BJS&to=NYC&stops=0&&staydays=7&month='.date('Ym');?>" id="iframepage_calendar" name="iframepage_calendar" frameBorder="0" scrolling="no" width="969px"  height="335px"></iframe> 
                            </td>
                        </tr>
                        
                    </table>   
                                
                          
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                            <tbody>
                                <tr>
                                    <td height="5" >
                                    <img border="0" src="./images/content_line_bk.jpg"  />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                         <table class="border" cellspacing="0" cellpadding="0" style="width: 100%;  margin-top:5px;">  
                                <tr>
                                <td align="center" colspan="3" style="width: 100%;padding-left:3px; padding-top:10px; padding-bottom:5px;" valign="top"> 
                                	<table cellspacing="0" cellpadding="0">
                                	<tr>
                                	<td><img name="pricechart_month" id="pricechart_month" alt=" " src="<?php echo $month;?>" >
                                	</td>
                                    <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td><img  name="pricechart_year" id="pricechart_year"  alt=" " src="<?php echo $year;?>">
                                	</tr>
                                    
                                	
                                	</table>
                                </td>
                            </tr>
                           
                        </table>
                       
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                            <tbody>
                                <tr>
                                    <td height="5">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
