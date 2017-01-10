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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style=" padding-left:30px;"><ul class="glossymenu">
        <li ><a href="../us_tw/" target="_parent"><b>美國始發機票</b></a></li>
        <li class="<?php if(!(isset($aboutForm))|| $aboutForm=='USA') echo "current"; ?>"><a href="../ca_tw/"  target="_parent"><b>加拿大始發機票</b></a></li>
        <li><a href="../cn_tw/"  target="_parent"> <b>中國始發機票</b></a></li>
        <li ><a href="http://wftc1.e-travel.com/plnext/AIEADBLADBL/StartOver.action?TYPE_FLOW=hotel&SITE=ADBLADBL&LANGUAGE=TW" title="酒店預訂" > <b>酒店預訂</b></a></li>
        <li  class="<?php if(isset($aboutForm)&& $aboutForm == 'GROUP') echo "current"; ?>"><a href="../groupflight_cnt.php" title="團體機票" > <b>團體機票</b></a></li>
        <li><a href="chupiaoshili_cnt.php"><b>出票實例</b></a></li>
        <li><a  target="_blank" href="https://www.checkmytrip.com/cmt/apf/cmtng/index?LANGUAGE=TW&SITE=NCMTNCMT"><b>機票確認</b></a></li>
        <li class="<?php if(isset($aboutForm)&& $aboutForm =='GPJQ') echo "current_visa"; ?>"><a target="_parent" href="../article_tw/"><b>購票訣竅</b></a></li>
        <li><a href="#"><b>中國簽證</b></a></li>
        <li  class="<?php if(isset($aboutForm)&& $aboutForm =='IPAD') echo "current_visa"; ?>"><a href="../simulation/simulation.php"><b>iPad抽獎</b></a></li>
        <li  style="display:none;"><a target="_blank"  href="https://www.checkmytrip.com/cmt/apf/cmtng/index?LANGUAGE=TW&SITE=NCMTNCMT#cmtng/home"><b>機票驗真</b></a></li>
        <li class="<?php if(isset($aboutForm)&& $aboutForm =='CONFIRM') echo "current"; ?>"><a href="confirm_cnt.php"><b>訂購流程</b></a></li>
        <li><a href="../cheap-flights-from-toronto-to-beijing-tw/" target="_parent"><b style="color:#b0071f;">多倫多至北京特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-toronto-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">多倫多至上海特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-toronto-to-hongkong-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">多倫多至香港特價機票</b></a> </li>
        <li><a href="javascript:void(0);" onclick="showSubMenu('subtoronto');" style="font-size:12px"> <b style="color:#b0071f;">多倫多至其它城市特價機票</b></a>
          <ul class="glossymenu" id="subtoronto" style="display:none;">
            <li><a href="../cheap-flights-from-toronto-to-guangzhou-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至廣州</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-chengdu-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至成都</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-fuzhou-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至福州</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-shenzhen-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至深圳</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-chongqing-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至重慶</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-xiamen-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至廈門</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-changsha-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至長沙</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-wuhan-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至武漢</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-tianjin-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至天津</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-nanjing-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至南京</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-qingdao-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至青島</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-dalian-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至大連</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-weizhou-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至溫州</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-shenyang-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至瀋陽</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-hangzhou-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至杭州</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-guiyang-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至貴陽</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-zhengzhou-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至鄭州</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-harbin-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至哈爾濱</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-kunming-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至昆明</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-xi-an-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至西安</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-nanning-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至南寧</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-jinan-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至濟南</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-taiyuan-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至太原</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-haikou-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至海口</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-nanchang-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至南昌</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-changchun-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至長春</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-urumqi-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多倫多至烏魯木齊</b></a> </li>
          </ul>
        </li>
        <li><a href="../cheap-flights-from-vancouver-to-beijing-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">溫哥華至北京特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-vancouver-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">溫哥華至上海特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-vancouver-to-hongkong-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">溫哥華至香港特價機票</b></a> </li>
        <li><a href="javascript:void(0);" onclick="showSubMenu('subvancouver');" style="font-size:12px"> <b style="color:#b0071f;">溫哥華至其它城市特價機票</b></a>
          <ul class="glossymenu" id="subvancouver" style="display:none;">
            <li><a href="../cheap-flights-from-vancouver-to-guangzhou-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至廣州</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-chengdu-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至成都</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-fuzhou-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至福州</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-shenzhen-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至深圳</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-chongqing-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至重慶</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-xiamen-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至廈門</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-changsha-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至長沙</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-wuhan-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至武漢</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-tianjin-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至天津</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-nanjing-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至南京</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-qingdao-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至青島</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-dalian-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至大連</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-weizhou-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至溫州</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-shenyang-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至瀋陽</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-hangzhou-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至杭州</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-guiyang-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至貴陽</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-zhengzhou-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至鄭州</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-harbin-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至哈爾濱</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-kunming-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至昆明</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-xi-an-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至西安</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-nanning-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至南寧</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-jinan-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至濟南</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-taiyuan-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至太原</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-haikou-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至海口</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-nanchang-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至南昌</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-changchun-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至長春</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-urumqi-tw/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">溫哥華至烏魯木齊</b></a> </li>
          </ul>
        </li>
        <li><a href="../cheap-flights-from-montreal-to-beijing-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">蒙特利爾至北京特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-montreal-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">蒙特利爾至上海特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-calgary-to-beijing-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">卡爾加里至北京特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-calgary-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">卡爾加里至上海特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-edmonton-to-beijing-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">埃德蒙頓至北京特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-edmonton-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">埃德蒙頓至上海特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-ottawa-to-beijing-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">渥太華至北京特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-ottawa-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">渥太華至上海特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-winnipeg-to-beijing-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">溫尼伯至北京特價機票</b></a> </li>
        <li><a href="../cheap-flights-from-winnipeg-to-shanghai-tw/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">溫尼伯至上海特價機票</b></a> </li>
      </ul></td>
  </tr>
  <tr id="menu_left_bottom" >
    <td>&nbsp;</td>
  </tr>
</table>
