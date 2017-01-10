       
        <div id="top_section" style="background: url(./images/tp_header_cn_tw.jpg) no-repeat">
            <div style="float:left; height:100px;width:270px;">
              <a>
              </a>
              <a href="http://www.e-traveltochina.com/us_tw" target="_top"><img src="images/touming_bk.png" border="0"  height="100px"  width="270px" /></a>
            </div>
            <div class="header_right">
            <div style="width: 530px; height: 55px" id="contact">
                    <table style="margin: auto auto 0px 4.65pt; width: 100%; border-collapse: collapse;
                        left: 0px" class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0"
                        align="right">
                        <tr>
                         <td align="right">
                                <ul class="glossytopmenu">
                                	<li class="first" style="display:none;"><a href="#"><b>注冊</b></a></li>
                                	<li style="display:none;"><a href="#"><b>登錄</b></a></li>
                                    <li><a href="<?php if(isset($aboutForm)&& $aboutForm=='ABOUT') echo "current"; ?>"><a href="./aboutus_cnt.php"><b>關於我們</b></a></li>
                                    <li><a href="<?PHP 
												
													if(!(isset($aboutForm))|| $aboutForm == 'USA')
													{
														echo './us/" target="_parent" ';
													}
													elseif($aboutForm =='CN')
													{
														echo './cn/" target="_parent" ';
													} 
													elseif($aboutForm =='GROUP') 
													{
														 echo 'groupflight.php"';
													}	
													elseif($aboutForm =='ABOUT') 
													{
														 echo 'aboutus.php"';
													}
													elseif($aboutForm =='VISA') 
													{
														 echo 'chinavisa.php"';
													}
													elseif($aboutForm =='CONFIRM') 
													{
														 echo 'confirm.php"';
													}
													elseif($aboutForm =='CPSL') 
													{
														 echo 'chupiaoshili.php"';
													}
													elseif($aboutForm =='GPJQ') 
													{
														echo '../article/"  target="_parent"';
													}
													
													?>><b>简体中文</b></a></li>
                                    <li><a href="http://www.facebook.com/TravelToChinaCorp/" target="_blank"><b style=" font-weight:bold;">關注我們</b><img border="0" src="./images/facebook.jpg" /></a></li>
                                </ul>
                         </td>
                        </tr><tr><td style="height:50px;">
                        <a href="mailto:sales@e-traveltochina.com" style="margin: 120px 20px 0px 260px;border-collapse: collapse" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    </td></tr>
                    </table>
                    
                </div>
                
            </div>
        </div>
       