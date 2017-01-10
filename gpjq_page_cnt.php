<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>人人有用的热帖：购买便宜回国机票的窍门</title>
<style> 
body { margin: 0; padding: 0; font-size: 14px; background: #f7f7f7; color: #555; line-height: 1.7em; font-family: "微软雅黑", Microsoft YaHei, Verdana, Geneva, sans-serif; }
.container { width: 950px; margin: 5px auto; margin-top:0px; padding: 30px 0px 30px 10px; padding-top:0px; clear: both; height: 100%; overflow: hidden; background-color: #fff; border-radius: 10px 10px 10px 10px; box-shadow: 0 0 5px 5px #eee; }
h1 { font-size: 32px; text-align: center; display: block; border-bottom: 1px solid #eee; padding-bottom: 20px; }
h3 { font-size: 20px; color: #BD2430; padding-top: 20px; }
ul { list-style: none; padding: 0; margin: 0; padding-left: 10px; background: #f2f2f2; padding: 10px 20px; display: block; border-radius: 5px 5px 5px 5px; }
ul li { padding: 6px 0; }
.red { color: #BD2430; }
.str { font-weight: bold; border-radius: 5px 5px 5px 5px; display: block; background: #f2f2f2; padding: 10px 20px; }
a { color: #555; }
a:hover { color: #BD2430; }
</style>
</head> 
<body>
<div class="container">
<h1>人人有用的熱帖：購買便宜回國機票的竅門</h1>
 
<p>從事航空旅遊行業多年，被問得最多的一個問題就是“怎麼才能買到便宜的中國機票？”。實際上，只要做好“功課”，完全可以買到便宜的機票，做一個聰明的“空中飛人”。</p>
 <?php 
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
							document.getElementById("iframepage_calendar").src = "calendar_6m_datamonotor_all.php?lan=TW&from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS+"&title="+FromCity+"至"+ToCity+"特價機票";
							//alert("calendar.php?from="+FROM+"&to="+TO+"&month="+MONTH+"&staydays="+STAYDAYS+"&stops="+STOPS);
							
						}
						</script>
                      <table  cellspacing="0" cellpadding="0" style="width: 100%; height: 300px;">
                        <tr>
                          <td><table class="border" cellspacing="0" cellpadding="0" style="width: 100%; height: 30px;">
                              <tr>
                                <td width="10px">&nbsp;</td>
                                <td width="160px" align="left" ><span style="font-size: 12px; font-weight: bold;">始發城市</span>
                                  <select id="FROM" name="FROM" style="width: 100px;">
                                    <option value="LAX" selected="selected">洛杉磯</option>
                                    <option value="NYC">紐約</option>
                                    <option value="BOS">波士頓</option>
                                    <option value="HOU">休士頓</option>
                                    <option value="WAS">華盛頓</option>
                                    <option value="SFO">三藩市</option>
                                    <option value="CHI">芝加哥</option>
                                    <option value="SEA">西雅圖</option>
                                    <option value="YTO">多倫多</option>
                                    <option value="YVR">溫哥華</option>
                                    <option value="YUL">蒙特利爾</option>
									<option value="YWG">溫尼伯</option>
<option value="YYC">卡爾加里</option>
                                  </select></td>
                                <td width="5px"  >&nbsp;</td>
                                <td width="180px"  align="left" ><span style="font-size: 12px; font-weight: bold;">目的地城市</span>
                                  <select id="TO" name="TO" style="width: 100px;">
                                    <option value="BJS">北京</option>
                                    <option value="SHA" selected="selected">上海</option>
									<option value="CGO">鄭州</option>
<option value="CGQ">長春</option>
<option value="CKG">重慶</option>
<option value="CSX">長沙</option>
<option value="CTU">成都</option>
<option value="DLC">大連</option>
<option value="FOC">福州</option>
<option value="HAK">海口</option>
<option value="HGH">杭州</option>
<option value="HKG">香港</option>
<option value="HRB">哈爾濱</option>
<option value="KHN">南昌</option>
<option value="KMG">昆明</option>
<option value="KWE">貴陽</option>
<option value="NKG">南京</option>
<option value="NNG">南寧</option>
<option value="SHE">瀋陽</option>
<option value="SZX">深圳</option>
<option value="TAO">青島</option>
<option value="TNA">濟南</option>
<option value="TSN">天津</option>
<option value="TYN">太原</option>
<option value="URC">烏魯木齊</option>
<option value="WNZ">溫州</option>
<option value="WUH">武漢</option>
<option value="XIY">西安</option>
<option value="XMN">廈門</option>
                                  </select></td>
                                <td width="5px" >&nbsp;</td>
                                <td width="120px"  align="left" ><span style="font-size: 12px; font-weight: bold;">出發月份</span>
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
                                <td width="160px"  align="left"><span style="font-size: 12px; font-weight: bold;">停留時間</span>
                                  <select id="STAYDAYS" name="STAYDAYS" style="width: 100px;">
                                    <option selected="selected" value="14">兩周內往返 </option>
                                    <option value="28">一個月內往返  </option>
                                    <option value="91">三個月內往返  </option>
                                    <option value="182">半年內往返  </option>
                                  </select></td>
                                <td width="5px">&nbsp;</td>
                                <td width="120px"  align="left"  style="display:none;"><span style="font-size: 12px; font-weight: bold;">是否直飛</span>
                                  <select id="STOPS" style="width: 40px;">
                                    <option value="1">是</option>
                                    <option selected="selected" value="0">否</option>
                                  </select></td>
                                <td  align="left"><a href="javascript:void(0);"  onclick="selectchang();" ><img border="0" src="./images/search_flight.png" /></a></td>
                              </tr>
                            </table></td>
                        </tr>
                        <tr height="335px">
                          <td colspan="3" ><iframe src="<?php echo 'calendar_6m_datamonotor_all.php?lan=CN&from=LAX&to=SHA&stops=0&staydays=14&title='.urlencode('洛杉矶至上海特價機票').'&month='.date('Ym')?>" id="iframepage_calendar" name="iframepage_calendar" frameBorder="0" scrolling="no" width="969px"  height="1070px"></iframe></td>
                        </tr>
                      </table>
<h3>美國、加拿大購買便宜機票第一原則： 提前購票，貨比三家</h3>
 
<p>聽起來好像是老生常談，實際上能夠買到便宜機票的“行家裡手”使用最多的就是這個竅門。經常買票的朋友通常會提前2-3 個月就開始查詢機票價格。有的甚至提前6 個月就開始訂購暑假或聖誕機票了。這樣的確是需要花費一些時間，但是每個旅客也往往至少會節省300 到400刀。計算下來，一家4 口大概可以節省1000 刀了。足夠買禮品饋贈親朋好友了。</p>
 
<p>舉一個實例。岳女士2012 年10 月12 日從我網購買了3 張從紐約紐華克到北京的來回程機票（3 個大人）。出發日期是2013年6 月10 號，回程是2013年6 月30 日。承運人是達爾美航空公司(Delta Airlines) 。當時的價格是USD2907.63 (即USD969.21/旅客)。類似行程的價格，可以到“美中機票網” （<a href="http://www.e-traveltochina.com/ca" target="_blank" rel="nofollow">www.e-traveltochina.com</a>）查詢。</p>
 
<p>許多朋友查詢機票是，常常有無從下手之感。我們建議您要簡單瞭解航空公司放出低價艙位的時間。航空公司為了提高收益，往往“惜位如金”，不願意提早將便宜的位置放出來銷售。<span class="red">總體而言，在美國，美國本土的航空公司的競爭能力較強，往往在航班起飛前一至兩個月才放出低價機位。</span>亞洲的航空公司，比如東航（China Eastern Airlines）則往往提前三個月甚至更久放出一些比較便宜的機位以搶佔市場份額。近年來，加拿大航空公司（Air Canada）為搶佔美國市場份額，也經常採取這種競爭戰略。對於淡季銷售，大多數的航空公司大都提前銷售，試探市場。美國的航空公司市場競爭的觀念“根深蒂固”，淡季銷售往往是“不計成本、血拼銷售”。但是航空公司“價格戰”的發動時間不固定、銷售市場不固定、銷售期也不長久，<b>旅客朋友可以經常查詢並註冊我們的Facebook或者Linkedin等， 以便及時得到通知。</b></p>
 
<p>許多朋友也是常常提前問價，但是效果往往不佳。這其實是方法不當造成的。大多數的朋友查詢機票主要是通過機票代理。而機票代理人的傭金大多都在USD25 元到USD50 元之間(加東地區的部分旅行社他和手續費還要低一些)，所以不可能每天都幫助同樣的客人去查找同樣或類似的行程；客人也不好意思每天都查詢。而我公司的機票訂購網站是24 小時不間歇服務的，而且每次查詢的結果都有200 種不同的航班組合。另外，由於代理人眾多，幫助客人占的位置較多；航空公司也往往在半夜以後清理出或直接放出低價的艙位。所以只要使用得當，通過網站訂購的機票常常比通過代理人訂購的機票要更為便宜。</p>
 
 
 <h3>加國購買便宜機票訣竅： 善用加國護照或美簽，省錢多多</h3>
 
<p>在加拿大，加航處於無可爭議的壟斷地位。為佔領或保有市場份額，<b>多數情況下，美國的航空公司的價格要比加航便宜<span class="red">CAD150</span>以上。</b>因為要過境美國，旅客需要持有加拿大護照或辦理美簽。實際上，過境美國沒有想像中的那麼麻煩。旅客可以在多倫多、蒙特利爾等主要機場直接入美國海關。出發到中國或東南亞的航班，在美國過境時無需提取行李。</p>
 
<p>舉一個實例。樂先生2012 年11 月15 日從我網購買了2 張從多倫多到上海的來回程機票（2 個大人）。出發日期是11 月27 號，回程2013年2 月20 日。承運人是美國聯合航空公司（經美國芝加哥中轉）。當時的價格是CAD1035.22/人。同樣的旅行日期美利堅航空公司（American Airlines）的價格為CAD1072.22，而加航的價格是CAD1573.45。我們經常跟加拿大的旅客開玩笑說：“加拿大的護照要比美國護照要值錢多了。”關於美國和加拿大航空公司價格的差異，可以到 “<b>加中機票網</b>”（<a href="http://www.e-traveltochina.com/ca" target="_blank" rel="nofollow">www.e-traveltochina.com/ca</a>）查詢。</p>
 
 
<h3>購買便宜機票的竅門：網上購買</h3>
 
<p>網上訂票是航空公司最先創意和實行的。目的是爭奪旅客資源、降低成本、提高競爭力。但是，航空公司網站的獨家性限制其發展。90 年代後期，各類網上訂票公司如雨後春筍，迅速發展，為旅客訂購機票提供了方便。<a href="http://www.travelocity.com" target="_blank" rel="nofollow">www.travelocity.com</a>、购机票提供了方便。<a href="http://www.priceline.com" target="_blank" rel="nofollow">www.priceline.com</a>、购机票提供了方便。<a href="http://www.expedia.com" target="_blank" rel="nofollow">www.expedia.com</a>等公司都是比较成功的网站。此類網站的優點是信譽佳、產品齊全、安全性高；其缺點是價格優勢越來越不明顯、無中文（或其他語言服務）。原因是航空公司大多視其為競爭對手而不願意輕易支付較高的傭金和提供較低的價格。因此，專門服務特定市場的網站因不會成為航空公司的直接競爭對手往往可以從特定的管道得到比較好的價格。在這方面，“美中機票網”（<a href="http://www.e-traveltochina.com" target="_blank" rel="nofollow">www.e-traveltochina.com</a>）和“加中機票網”（<a href="http://www.e-traveltochina.com/ca" target="_blank" rel="nofollow">www.e-traveltochina.com/ca</a>）是辦得比較成功的網站。本網站提供的中美機票價格較為便宜，主要服務廣大華人市場，而且全部使用中文服務，是華人購買機票首選網站。本網在3個月、6個月以上的競爭實力，更為明顯。</p>
 
<p>網上訂購的力捧者是學生和各類專業人士。其實，只要懂得上網的朋友都可以在網上詢價和訂購。以下僅以“美中機票網”（<a href="http://www.e-traveltochina.com" target="_blank" rel="nofollow">www.e-traveltochina.com</a>）和“加中機票網”（<a href="http://www.e-traveltochina.com/ca" target="_blank" rel="nofollow">www.e-traveltochina.com/ca</a>）為例，簡單介紹使用網站的幾個竅門。</p>
<ul>
<li>1. 輸入英文城市或機場名稱。因為臺灣國語、中國普通話及香港粵語對城市及機場名稱都有不同的翻譯；</li>
<li>2. 如可能，日期儘量選擇非週末日期（有些航空公司視週五為週末）以避免週末附加費；週二及週四的價格可能會低一些；</li>
<li>3. 尽量使用“检查替代日期（check alternative dates）”（位于航空公司价格排列页的右上方扁长方块内），可以搜索到指定旅行日期前后各一天的票价。如近期旅行，使用此功能往往可以搜到更便宜的价格；如是远期规划，此功能的作用不明显。這是航空公司的座位管理政策決定的；</li>
<li>4. 使用“顯示篩選”（位於檢查替代日期下一行）功能可以選擇同城不同的機場；</li>
<li>5. 如持有某航空公司常旅客卡，可以在搜尋引擎首頁指定航空公司（以航空公司英文第一個字母為序）；在定位過程中，一定要輸入您的常旅客計畫卡號碼；另外，指定航空公司可以進行深度搜索，可能找到更為便宜的價格；</li>
<li>6. 如非直達航班，應留出足夠的中國出境和美國入境的時間；另外，銜接航班也可能因天氣或機械故障延誤。</li>
<li>7. 如需境外中轉並無美加護照或綠卡，請查詢有關國家使領館是否需要辦理過境簽證。搭乘加拿大航空公司(Air Canada)中轉加拿大多倫多或溫哥華，無需任何簽證；在香港、東京、首爾轉機，絕大多數情況下，無需簽證。</li>
<li>8. 許多網友反映，半夜時，比較容易找到低價的位置。</li>
<li>9. 去程及回程，或國內銜接航班，儘量使用同一家航空公司，以避免不必要的麻煩。另外，由於航空公司原因，本網不支持有美國航空公司（American Airlines）聯運的3家及3家以上航空公司共同承運的行程。</li>
<li>10. 中轉時，應首選同一機場。同一城市，不同機場轉機，價格可能會便宜；但是，行李需取出並再交運，比較麻煩，也容易誤機。</li>
</ul>
 
<h3>購買便宜機票的常識：瞭解航空公司的運價規則</h3>
 
<p>中國北方有句俗話：“買的不如賣的精。”旅客是消費者，很難outsmart 大多由美國名校MBA 畢業的航空公司收益管理部門和運價部門。因為他們的目標就是通過管理倉位元來提高其單位價格。換句話說，在兼顧市場份額的情況下，航空公司目標就是爭取賣高價。這也是航空公司劃分很多艙位等級的基本原因。但是通過瞭解一些航空公司的票價規則，旅客可以少花“冤枉錢” 、少為航空公司“貢獻”一些利潤。</p>
 
<p>航空公司按照歷史資料劃分銷售“季節”。每家航空公司的定義略有不同。但是一般分為淡季、平季、旺季。有的航空公司還在同一季節內再細分。多數航空公司都是以出發日期確定銷售季節。通常來講，1 月到3 月初（中國年除外）、11 月到12 月初的價格最為便宜；4 月和5月、9 月和10 月其次；6 月中到9 月初、12 月中到1 月初和中國年期間，價格最貴。如果旅客的旅行時間安排比較靈活，可以參照航空公司的“季節”劃分來大致確定行程。</p>
 
<p>除“基礎運價”外，航空公司一般還會收取週末附加費。每家航空公司對週末的定義略有不同。收取的附加費也可能不同。一般的旅客不可能詳細知道有關細節。最好的辦法是回避週五到周日。如可能，最好選擇週二和週四的美國離境航班。</p>
 
<p>航空公司還會收取燃油附加費，並代收機場稅和政府稅費。林林總總，各有不同。一般的機票代理人也不可能（也沒有時間）全部詳細告知。網上訂票之所以漸漸流行，價格明細清楚、可以選擇前後各一天的出發日期、多家航空公司同時比較是其主要的優勢。具體可參考“美中機票網” （<a href="http://www.e-traveltochina.com/ca" target="_blank" rel="nofollow">www.e-traveltochina.com</a>）和“加中機票網”（<a href="http://www.e-traveltochina.com/ca" target="_blank" rel="nofollow">www.e-traveltochina.com/ca</a>）這樣的主攻中國市場的網站。也可參考等<a href="http://www.travelocity.com" target="_blank" rel="nofollow">www.travelocity.com</a>,<a href="http://www.priceline.com" target="_blank" rel="nofollow">www.priceline.com</a>、<a href="http://www.expedia.com" target="_blank" rel="nofollow">www.expedia.com</a> 等主流網站。</p>
 
<h3>購買便宜機票的注意事項：預防欺詐</h3>
 
<p>許多職業人士和相當一部分的學生已經十分習慣在網上訂購機票。但是，也有相當一部分朋友對網上訂票的安全性“心存疑慮”。事實上，確實有一部分朋友曾經“受騙上當”。在加拿大曾經就出現過通過網上訂票的方式詐騙的案件。此類案件的受害人往往不會有太多的經濟損失。這主要是因為網上訂票是通過信用卡支付，而信用卡公司在收到確切證據的情況下，往往會退還票款。但是，受害人的行程往往會被打亂，而且可能不得不因需要臨時購買機票而付高價。</p>
 
<p>事實上，只要稍加留意即可識別欺詐網站。</p>
 
<p>瞭解一家機票訂購網站的口碑的最好辦法是使用<a href="http://www.google.com" target="_blank" rel="nofollow">www.google.com</a>。將需要查詢的網站的位址輸入，然後對搜尋結果在創辦人的背景、網站的創辦時間、被連結網站的口碑等方面大致分析，即可以得到一個初步的判斷。搜索結果頁中的<a href="http://www.linkedin.com" target="_blank" rel="nofollow">www.linkedin.com</a> 和<a href="http://www.facebook.com" target="_blank" rel="nofollow">www.facebook.com</a>商務網頁是重要的參考內容。</p>
 
<p>專業的機票訂購網站會在您訂購機票後自動通過電子郵件即時發送行程和價格情況；在行程記錄上方一定會有航空公司的記錄號碼（confirmation number/passenger record locator）的資訊；購票人可以到有關航空公司的網站上核對有關資訊；</p>
 
<p>一般的專業訂票網站都會需要在出票前人工核對機票的行程和價格資訊；但是24 小時之內一定會出票（周日除外）。<span class="red">旅客可以在訂票當日或次日到航空公司的網站再次核對有關資訊。此時，應該在比較明顯的位置看到“已出票（Ticketed）”的字樣；旅客也可以致電航空公司確認是否已經出票。在航班起飛之前3 – 5日，應該再次核對、確認。</span></p>
 
<p>專業網站的價格往往比傳統旅行社便宜；但是肯定不會便宜得十分離譜。這是因為航空公司不可能提供離譜的傭金；傳統旅行社的價格往往已經較低（但是畢竟是勞動密集型產業，人工成本相對網站要高）；因此專業網站的價格可能低廉，但是一定會低廉的有限；而欺詐性的網站的價格常常低得十分離譜。</p>
 
<p>一些專業網站的價格確實能夠提供十分便宜的票價，主要是通過強大的搜索功能實現的。比如可以提供+/- 一日的搜索功能；選擇航空公司深度搜索功能等。而欺詐性的網站的搜索功能往往設計得很不完善、也很粗糙；</p>
 
<p>專業的網站一般會是有關協會或組織（往往同旅遊有關）的成員；此類協會或組織會准許成員使用其標識（logo）。點擊該標識會看到有關的詳細資訊；</p>
 
<p>一般的專業網站會提供公司的地址；公司的地址和區號一般應一致；</p>
 
<p>訂購人也可以電話問詢。一般情況下，機票訂購網站的電話會相對繁忙。但是如留下詳細的聯絡資訊，應該會有電必複。另外，專業機票網站的優勢是使用方便兼顧價格便宜；而欺詐性的網站往往依靠極低的價格引人上當。</p>
 
<h3>購買便宜機票需防範信用卡盜用</h3>
 
<p>購買機票最大的問題，並不是到哪裡能買得便宜的機票；而是保護隱私、防範信用卡盜用。傳統的旅行社需要您提供信用卡號碼和有效日期。911 之後，由於防恐的原因，還需要您的出生日期及性別等。這實際上就為極少數旅行社盜用旅客信用卡資訊提供了方便之門。近些年，旅行社盜用旅客信用卡的事件時有發生，即是明證。通過正規的網站、旅行社訂票，信用卡的資訊和其他隱私資訊應該是經過加密處理的。即便是網站的內部管理人員，也只能看到信用卡最後4位元數字和有效日期。在這方面，網站的優勢將愈加明顯。</p>
 
<p>我們希望您使用機票訂購專業的網站“美中機票網” （<a href="http://www.e-traveltochina.com" target="_blank" rel="nofollow">www.e-traveltochina.com</a>）和“加中機票網”（<a href="http://www.e-traveltochina.com/ca" target="_blank" rel="nofollow">www.e-traveltochina.com/ca</a>）。真正做到買得便宜，買得放心。</p>
 
<p>有關本網創始人的簡介請參見：<a href="http://www.linkedin.com/in/chenyangli" target="_blank" rel="nofollow">www.linkedin.com/in/chenyangli</a>，並請FOLLOW或添加。</p>
 
<p>有FB的朋友，請LIKE我們：<a href="http://www.facebook.com/TraveltoChinaCorp" target="_blank" rel="nofollow">http://www.facebook.com/TraveltoChinaCorp</a>，我們會及時發佈特價資訊。</p>
 
<p class="str">編後：我們深信“文以載商之道”，特彙集我們多年的管理經驗，編輯此文，希望為大家節省一點時間、節省一點金錢，並為我網做一些宣傳。為此目的，本文所有內容，歡迎全文或部分轉發。本文所有內容，均為原創，為智慧財產權保護，請勿用於任何其他商業目的。</p>
 
</div>
<div style="clear: both;"></div>
</body>
</html>

