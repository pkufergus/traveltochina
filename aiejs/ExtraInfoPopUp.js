function ExtraInfoPopUp(htmlDirection,lang,charset,baseUrl,headerTitleString,bodyTitleString,closeString,width,height,defaultCss,strCustomCSSes){if(arguments.length>0){this.init(htmlDirection,lang,charset,baseUrl,headerTitleString,bodyTitleString,closeString,width,height,defaultCss,strCustomCSSes);}}ExtraInfoPopUp.prototype.init=function(htmlDirection,lang,charset,baseUrl,headerTitleString,bodyTitleString,closeString,width,height,defaultCss,strCustomCSSes){this.htmlDirection=htmlDirection;this.lang=lang;this.charset=charset;this.baseUrl=baseUrl;this.headerTitleString=headerTitleString;this.bodyTitleString=bodyTitleString;this.closeString=closeString;this.width=width;this.height=height;this.defaultCss=defaultCss;this.strCustomCSSes=strCustomCSSes;};ExtraInfoPopUp.prototype.writeBodyHeader=function(popUpWindow){popUpWindow.document.writeln('<table cellpadding="0" cellspacing="0" width="100%" class="tableHeader"><tr><td>'+this.bodyTitleString+'</td><td align="right"><a href="javascript:close()" class="textSmall2">'+this.closeString+"</a></td></tr></table>");};ExtraInfoPopUp.prototype.writeBodyFooter=function(popUpWindow){popUpWindow.document.writeln('<div class="lineSeparator"></div><table cellspacing="0" cellpadding="0" class="tablePopUp"><tr><td class="footer"><a href="javascript:close()">'+this.closeString+"</a></td></tr></table>");};ExtraInfoPopUp.prototype.writeEmptyLineInContentTable=function(popUpWindow){popUpWindow.document.writeln('<tr><td width="10px">&nbsp;</td><td>&nbsp;</td></tr>');};ExtraInfoPopUp.prototype.writeHeader=function(popUpWindow){popUpWindow.document.writeln('<?xml version="1.0" encoding="iso-8859-1"?>');popUpWindow.document.writeln('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">');popUpWindow.document.writeln('<html dir="'+this.htmlDirection+'" lang="'+this.lang+'" xmlns="http://www.w3.org/1999/xhtml">');popUpWindow.document.writeln("<head>");popUpWindow.document.writeln('   <meta http-equiv="Content-Type" content="text/html; charset='+this.charset+'"/>');popUpWindow.document.writeln('   <base href="'+this.baseUrl+'"/>');popUpWindow.document.writeln("   <title>"+this.headerTitleString+"</title>");if(this.defaultCss&&this.defaultCss.length>0){popUpWindow.document.writeln("   "+this.defaultCss);}if(this.strCustomCSSes&&this.strCustomCSSes.length>0){popUpWindow.document.writeln("   "+this.strCustomCSSes);}popUpWindow.document.writeln("</head>");popUpWindow.document.writeln("<body>");popUpWindow.document.writeln('<div class="divBGRD">');};ExtraInfoPopUp.prototype.writeOverallHeader=function(popUpWindow){this.writeHeader(popUpWindow);this.writeBodyHeader(popUpWindow);popUpWindow.document.writeln('<table cellspacing="0" cellpadding="0" class="tablePopUp">');this.writeEmptyLineInContentTable(popUpWindow);};ExtraInfoPopUp.prototype.writeOverallFooter=function(popUpWindow){this.writeEmptyLineInContentTable(popUpWindow);popUpWindow.document.writeln("</table>");this.writeBodyFooter(popUpWindow);popUpWindow.document.writeln("</div></body></html>");};ExtraInfoPopUp.prototype.redirectToAnExternalPopUp=function(url){WDSCommon.popSizedWin(url,this.width,this.height);};ExtraInfoPopUp.prototype.generatesPopUp=function(description){popUp=WDSCommon.popSizedWin("",this.width,this.height);this.writeOverallHeader(popUp);popUp.document.writeln("<tr><td>&nbsp;</td><td>"+description+"</td></tr>");this.writeOverallFooter(popUp);popUp.document.close();};function openBasicWindow(strURL,strWndName,strWndOptions){var theOpenedWindow=null;theOpenedWindow=window.open(strURL,strWndName,strWndOptions);if(theOpenedWindow!=null&&navigator.appName.toLowerCase()=="netscape"){theOpenedWindow.focus();}return theOpenedWindow;}function openBasicPopup(strURL,strWndName,strWndOptions){openBasicWindow(strURL,strWndName,strWndOptions);}function redirectToAnExternalPopUp(url,width,height,bNoScroll){if(bNoScroll){WDSCommon.popSizedWinNoScroll(url,width,height);}else{WDSCommon.popSizedWin(url,width,height);}}function submitFormToPopup(theForm,strWndName,strWndOptions){if(!theForm||theForm==null){return;}var strURL="";if(location.protocol=="https:"){var theBase=document.getElementsByTagName("base");if(theBase!=null&&theBase.length){strURL=theBase[0].href+"html/web/blank.html";}}var thePopSizedWin=openBasicWindow(strURL,strWndName,strWndOptions);if(thePopSizedWin==null){return;}while(!thePopSizedWin){}theForm.submit();}function submitFormToNewPopUp(form,windowName,width,height,scrollbar){var url="";if(location.protocol=="https:"){var baseObj=document.getElementsByTagName("base");if(baseObj&&baseObj.length){url=baseObj[0].href+"html/web/blank.html";}}if(scrollbar!="no"){scrollbar="yes";}var thePopSizedWin=openBasicWindow(url,windowName,"scrollbars="+scrollbar+",resizable=yes,width="+width+",height="+height+",left=50,top=50");if(thePopSizedWin==null){return;}while(!thePopSizedWin){}if(form&&form!=null){form.submit();}}