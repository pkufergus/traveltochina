        <div id="top_section" style="background: url(./images/tp_header_cn_v2.jpg) no-repeat">
            <div class="header_right">
                <div style="width: 530px; height: 55px" id="contact">
                    <table style="margin: auto auto 0px 4.65pt; width: 100%; border-collapse: collapse;
                        left: 0px" class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0"
                        align="right">
                        <tr>
                         <td align="right">
                                <ul class="glossytopmenu">
                                	<li class="first"><a href="#"><b>注册</b></a></li>
                                	<li><a href="#"><b>登录</b></a></li>
                                    <li><a href="<?PHP 
													if(!(isset($aboutForm))|| $aboutForm == 'USA')
													{
														echo '../index_cnt.php';
													}
													elseif($aboutForm =='CN')
													{
														echo "../index_cn_cnt.php";
													}
													elseif($aboutForm =='ABOUT') 
													{
														 echo "../aboutus_cnt.php";
													}	
													elseif($aboutForm =='VISA') 
													{
														 echo "../chinavisa_cnt.php";
													}
													
													?>"><b>繁体中文</b></a></li>
                                    <li><a href="http://www.facebook.com/TravelToChinaCorp/" target="_blank"><b style=" font-weight:bold;">关注我们</b><img border="0" src="./images/facebook.jpg" /></a></li>
                                </ul>
                         </td>
                        </tr>
                    </table>
                    <table style="margin: auto auto auto 5.4pt; width: 913px; border-collapse: collapse"
                        class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        