        <div id="top_section" style="background:  url(./images/tp_header_ca_cn.jpg) no-repeat">
           <div style="float:left; height:100px;width:270px;">
              <a>
              </a>
              <a href="http://www.e-traveltochina.com/ca"   target="_top"><img src="images/touming_bk.png" border="0"  height="100px"  width="270px" /></a>
            </div>
            <div class="header_right">
                <div style="width: 530px; height: 55px" id="contact">
                    <table style="margin: auto auto 0px 4.65pt; width: 100%; border-collapse: collapse;
                        left: 0px" class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0"
                        align="right">
                        <tr>
                         <td align="right">
                                <ul class="glossytopmenu">
                                	<li class="first" style="display:none;"><a href="#"><b>注册</b></a></li>
                                	<li style="display:none;"><a href="#"  ><b>登录</b></a></li>
                                    <li><a href="<?php if(isset($aboutForm)&& $aboutForm=='ABOUT') echo "current"; ?>"><a href="../aboutus.php"><b>关于我们</b></a></li><li><a href="<?PHP 
										if(!(isset($aboutForm))|| $aboutForm == 'USA')
										{
											echo '../ca_tw/"  target="_parent"';
										}
										elseif($aboutForm =='ABOUT') 
										{
											 echo 'aboutus_cnt.php"';
										}	
										elseif($aboutForm =='CONFIRM') 
													{
														 echo 'confirm_cnt.php"';
													}
													elseif($aboutForm =='VISA') 
													{
														 echo 'chinavisa_cnt.php"';
													}
													elseif($aboutForm =='CPSL') 
													{
														 echo 'chupiaoshili_cnt.php"';
													}
													elseif($aboutForm =='GPJQ') 
													{
														 echo '../article_tw/"  target="_parent"';
													}
										
										?>><b>繁体中文</b></a></li>
                                    <li><a href="http://www.facebook.com/TravelToChinaCorp/" target="_blank"><b style=" font-weight:bold;">关注我们</b><img border="0" src="./images/facebook.jpg" /></a></li>
                                </ul>
                         </td>
                        </tr>
                        <tr><td style="height:50px;">
                        <a href="mailto:sales@e-traveltochina.com" style="margin: 120px 20px 0px 260px;border-collapse: collapse" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    </td></tr>
                    </table>
                    
                </div>
            </div>
        </div>
        