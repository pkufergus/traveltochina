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
        <li ><a href="../us/"  target="_parent"><b>美国始发机票</b></a></li>
        <li class="<?php if(!(isset($aboutForm)) || $aboutForm =='USA') echo "current"; ?>"><a href="../ca/" target="_parent"><b>加拿大始发机票</b></a></li>
        <li><a href="../cn/"  target="_parent"> <b>中国始发机票</b></a></li>
        <li ><a href="http://wftc1.e-travel.com/plnext/AIEADBLADBL/StartOver.action?TYPE_FLOW=hotel&SITE=ADBLADBL&LANGUAGE=CN" > <b>酒店预订</b></a></li>
        <li class="<?php if(isset($aboutForm)&& $aboutForm == 'GROUP') echo "current"; ?>"><a href="../groupflight.php" title="团体机票" > <b>团体机票</b></a></li>
        <li><a href="chupiaoshili.php"><b>出票实例</b></a></li>
        <li><a  target="_blank" href="https://www.checkmytrip.com/cmt/apf/cmtng/index?LANGUAGE=CN&SITE=NCMTNCMT"><b>机票确认</b></a></li>
        <li class="<?php if(isset($aboutForm)&& $aboutForm =='GPJQ') echo "current_visa"; ?>"><a target="_parent" href="../article/"><b>购票诀窍</b></a></li>
        <li  class="<?php if(isset($aboutForm)&& $aboutForm =='VISA') echo "current_visa"; ?>"><a href="../chinavisa.php"><b>中国签证</b></a></li>
        <li  class="<?php if(isset($aboutForm)&& $aboutForm =='IPAD') echo "current_visa"; ?>"><a href="../simulation/simulation.php"><b>iPad抽奖</b></a></li>
        <li  style="display:none;"><a target="_blank" href="https://www.checkmytrip.com/cmt/apf/cmtng/index?LANGUAGE=CN&SITE=NCMTNCMT#cmtng/home"><b>机票验真</b></a></li>
        <li class="<?php if(isset($aboutForm)&& $aboutForm =='CONFIRM') echo "current"; ?>"><a href="confirm.php"><b>订购流程</b></a></li>
        <li><a href="../cheap-flights-from-toronto-to-beijing/" target="_parent"><b style="color:#b0071f;">多伦多至北京特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-toronto-to-shanghai/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">多伦多至上海特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-toronto-to-hongkong/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">多伦多至香港特价机票</b></a> </li>
        <li><a href="javascript:void(0);" onclick="showSubMenu('subtoronto');" style="font-size:12px"> <b style="color:#b0071f;">多伦多至其它城市特价机票</b></a>
          <ul class="glossymenu" id="subtoronto" style="display:none;">
            <li><a href="../cheap-flights-from-toronto-to-guangzhou/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至广州</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-chengdu/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至成都</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-fuzhou/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至福州</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-shenzhen/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至深圳</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-chongqing/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至重庆</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-xiamen/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至厦门</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-changsha/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至长沙</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-wuhan/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至武汉</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-tianjin/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至天津</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-nanjing/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至南京</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-qingdao/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至青岛</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-dalian/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至大连</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-weizhou/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至温州</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-shenyang/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至沈阳</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-hangzhou/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至杭州</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-guiyang/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至贵阳</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-zhengzhou/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至郑州</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-harbin/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至哈尔滨</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-kunming/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至昆明</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-xi-an/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至西安</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-nanning/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至南宁</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-jinan/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至济南</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-taiyuan/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至太原</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-haikou/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至海口</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-nanchang/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至南昌</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-changchun/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至长春</b></a> </li>
            <li><a href="../cheap-flights-from-toronto-to-urumqi/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">多伦多至乌鲁木齐</b></a> </li>
          </ul>
        </li>
        <li><a href="../cheap-flights-from-vancouver-to-beijing/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至北京特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-vancouver-to-shanghai/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至上海特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-vancouver-to-hongkong/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至香港特价机票</b></a> </li>
        <li><a href="javascript:void(0);" onclick="showSubMenu('subvancouver');" style="font-size:12px"> <b style="color:#b0071f;">温哥华至其它城市特价机票</b></a>
          <ul class="glossymenu" id="subvancouver" style="display:none;">
            <li><a href="../cheap-flights-from-vancouver-to-guangzhou/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至广州</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-chengdu/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至成都</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-fuzhou/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至福州</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-shenzhen/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至深圳</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-chongqing/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至重庆</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-xiamen/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至厦门</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-changsha/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至长沙</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-wuhan/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至武汉</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-tianjin/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至天津</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-nanjing/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至南京</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-qingdao/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至青岛</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-dalian/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至大连</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-weizhou/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至温州</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-shenyang/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至沈阳</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-hangzhou/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至杭州</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-guiyang/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至贵阳</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-zhengzhou/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至郑州</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-harbin/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至哈尔滨</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-kunming/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至昆明</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-xi-an/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至西安</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-nanning/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至南宁</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-jinan/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至济南</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-taiyuan/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至太原</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-haikou/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至海口</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-nanchang/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至南昌</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-changchun/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至长春</b></a> </li>
            <li><a href="../cheap-flights-from-vancouver-to-urumqi/" target="_parent" style="font-size:12px;"> <b style="color:#b0071f;">温哥华至乌鲁木齐</b></a> </li>
          </ul>
        </li>
        <li><a href="../cheap-flights-from-montreal-to-beijing/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">蒙特利尔至北京特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-montreal-to-shanghai/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">蒙特利尔至上海特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-calgary-to-beijing/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">卡尔加里至北京特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-calgary-to-shanghai/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">卡尔加里至上海特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-edmonton-to-beijing/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">埃德蒙顿至北京特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-edmonton-to-shanghai/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">埃德蒙顿至上海特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-ottawa-to-beijing/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">渥太华至北京特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-ottawa-to-shanghai/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">渥太华至上海特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-winnipeg-to-beijing/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">温尼伯至北京特价机票</b></a> </li>
        <li><a href="../cheap-flights-from-winnipeg-to-shanghai/" target="_parent" style="font-size:12px"> <b style="color:#b0071f;">温尼伯至上海特价机票</b></a> </li>
      </ul></td>
  </tr>
  <tr id="menu_left_bottom" >
    <td>&nbsp;</td>
  </tr>
</table>
