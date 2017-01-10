         <script type="text/javascript">
		function showSubMenu(submenuid){
			var display = document.getElementById(submenuid).style.display;
			if(display.length > 0)
			{
				document.getElementById(submenuid).style.display = "";
			}
			else
			{
				document.getElementById(submenuid).style.display = "none";
			}			
		}
		
		</script>

<table id="mainmenu" border="0" cellspacing="0" cellpadding="0">
            <tr id="menu_left_top" >
                <td>&nbsp;
                </td>
            </tr>
            <tr>
			<td style=" padding-left:30px;">
            <ul class="glossymenu">
            
               <li class="<?php if(!(isset($aboutForm))|| $aboutForm == 'USA') echo "current"; ?>"><a href="./us_tw/" target="_parent" ><b>美國始發機票</b></a></li>
                <li><a href="./ca_tw/" target="_parent" ><b>加拿大始發機票</b></a></li>
                <li class="<?php if(isset($aboutForm)&& $aboutForm =='CN') echo "current";?>"><a href="./cn_tw/" target="_parent" >
                    <b>中國始發機票</b></a></li>
                <li><a href="http://wftc1.e-travel.com/plnext/AIEADBLADBL/StartOver.action?TYPE_FLOW=hotel&SITE=ADBLADBL&LANGUAGE=TW" title="酒店" >
                    <b>酒店預訂</b></a></li>  
                <li class="<?php if(isset($aboutForm)&& $aboutForm =='GROUP') echo "current"; ?>"><a href="groupflight_cnt.php" title="團體機票" >
                    <b>團體機票</b></a></li>                    
                <li><a href="chupiaoshili_cnt.php"><b>出票實例</b></a></li>
                <li><a  target="_blank" href="https://www.checkmytrip.com/cmt/apf/cmtng/index?LANGUAGE=TW&SITE=NCMTNCMT"><b>機票確認</b></a></li>
                <li class="<?php if(isset($aboutForm)&& $aboutForm =='GPJQ') echo "current_visa"; ?>"><a target="_parent" href="/article_tw/"><b>購票訣竅</b></a></li>
                 <li  class="<?php if(isset($aboutForm)&& $aboutForm =='VISA') echo "current_visa"; ?>"><a href="chinavisa_cnt.php"><b>中國簽證</b></a></li>
                <li  class="<?php if(isset($aboutForm)&& $aboutForm =='IPAD') echo "current_visa"; ?>"><a href="./simulation/simulation.php"><b>iPad抽獎</b></a></li>
                
                <li  style="display:none;"><a target="_blank"  href="https://www.checkmytrip.com/cmt/apf/cmtng/index?LANGUAGE=TW&SITE=NCMTNCMT#cmtng/home"><b>機票驗真</b></a></li> 
                <li class="<?php if(isset($aboutForm)&& $aboutForm =='CONFIRM') echo "current"; ?>"><a href="confirm_cnt.php"><b>訂購流程</b></a></li>
                <li><a href="./cheap-flights-from-new-york-to-beijing-tw/" target="_parent"><b style="color:#b0071f;">紐約至北京特價機票</b></a> </li>
                <li><a href="./cheap-flights-from-new-york-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">紐約至上海特價機票</b></a>  </li>
                <li><a href="javascript:void(0);" onclick="showSubMenu('subtoronto');" style="font-size:12px"><b style="color:#b0071f;">紐約至其它城市特價機票</b></a> 
                <ul class="glossymenu" id="subtoronto" style="display:none;">
                	<li><a href="./cheap-flights-from-new-york-to-guangzhou-tw/" target="_parent" style="font-size:12px"> <b >紐約至廣州</b></a>  
                    <li><a href="./cheap-flights-from-new-york-to-chengdu-tw/" target="_parent" style="font-size:12px"> <b >紐約至成都</b></a>  
                    <li><a href="./cheap-flights-from-new-york-to-fuzhou-tw/" target="_parent" style="font-size:12px"> <b >紐約至福州</b></a> 
                </ul>
                </li>
                <li><a href="./cheap-flights-from-san-francisco-to-beijing-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">三藩市至北京特價機票</b></a> </li>
                <li><a href="./cheap-flights-from-san-francisco-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">三藩市至上海特價機票</b></a> </li>
                <li><a href="./cheap-flights-from-los-angeles-to-beijing-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">洛杉磯至北京特價機票</b></a> </li>
                <li><a href="./cheap-flights-from-los-angeles-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">洛杉磯至上海特價機票</b></a> </li>
                <li><a href="./cheap-flights-from-boston-to-beijing-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">波士頓至北京特價機票</b></a> </li>
                <li><a href="./cheap-flights-from-boston-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">波士頓至上海特價機票</b></a> </li>
                <li><a href="./cheap-flights-from-seattle-to-beijing-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">西雅圖至北京特價機票</b></a> </li>
                <li><a href="./cheap-flights-from-seattle-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">西雅圖至上海特價機票</b></a> </li>
                <li><a href="./cheap-flights-from-houston-to-beijing-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">休士頓至北京特價機票</b></a></li>
                <li><a href="./cheap-flights-from-houston-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">休士頓至上海特價機票</b></a></li>
                <li><a href="./cheap-flights-from-chicago-to-beijing-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">芝加哥至北京特價機票</b></a> </li>
                <li><a href="./cheap-flights-from-chicago-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">芝加哥至上海特價機票</b></a> </li>
                <li><a href="./cheap-flights-from-washington-to-beijing-tw/" target="_parent" style="font-size:12px; "> <b style="color:#b0071f;">華盛頓至北京特價機票</b></a> </li>
                <li><a href="./cheap-flights-from-washington-to-shanghai-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">華盛頓至上海特價機票</b></a> </li>
            </ul>
            
       </td>
       </tr>
       		<tr id="menu_left_bottom" >
                <td>&nbsp;
                </td>
            </tr>
       </table>
      