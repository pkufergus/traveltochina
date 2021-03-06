
String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g,"");};var WDS_JSLIBRARY_VERSION="WDS_JSLIBRARY_V16_300106";function WDSBrowser(){var agent=navigator.userAgent.toLowerCase();this.major=parseInt(navigator.appVersion);this.mac=(navigator.appVersion.indexOf("Mac")!=-1)?true:false;this.minor=parseFloat(navigator.appVersion);this.ns=((agent.indexOf('mozilla')!=-1)&&((agent.indexOf('spoofer')==-1)&&(agent.indexOf('compatible')==-1)));this.ns4=(this.ns&&(this.major==4));this.ns6=(this.ns&&(this.major>=5));this.opera=(agent.indexOf("opera")!=-1);this.ie=(agent.indexOf("msie")!=-1);this.ie3=(this.ie&&(this.major<4));this.ie4=(this.ie&&(this.major==4)&&(agent.indexOf("msie 5.0")==-1));this.ie5=(this.ie&&(this.major==4)&&(agent.indexOf("msie 5.0")!=-1));this.ie55=(this.ie&&(this.major==4)&&(agent.indexOf("msie 5.5")!=-1));this.ie6=(this.ie&&(agent.indexOf("msie 6.0")!=-1));this.NG=(this.ns&&(this.major>=5))||(this.ie&&(this.major==4)&&(agent.indexOf("msie 5.0")!=-1))||(this.ie&&(this.major==4)&&(agent.indexOf("msie 5.5")!=-1))||(this.ie&&(agent.indexOf("msie 6.0")!=-1))}
var WDSBrowser=new WDSBrowser();if(document.all&&!document.getElementById){document.getElementById=function(id){return(document.all(id));}
document.getElementsByTagName=function(id){return(document.all.tags(id));}}
if(document.layers){document.getElementById=function(id){return(document.layers[id]);}}
function WDSTrace(){this.enable=false;this.init=WDSTrace_init;this.dump=WDSTrace_dump;this.close=WDSTrace_close;this.onError=WDSTrace_onError;}
var WDSTrace=new WDSTrace();function WDSTrace_init(){this.enable=true;top.traceWin=window.open("","WDSDump");top.traceWin.document.open();top.traceWin.document.writeln("<pre>");}
function WDSTrace_dump(str){try{top.traceWin.document.writeln(str);top.traceWin.focus();}catch(error){if(this.enable){this.init();}}}
function WDSTrace_close(){try{if(null!=top.traceWin){top.traceWin.document.close();top.traceWin.close();top.traceWin=null;}}catch(error){return;}}
function WDSTrace_onError(err_msg,url,line){this.dumpToWin(document.URL+': '+err_msg+': '+url+' at line '+line);return true;}
function WDSCommon(){this.getTag=WDSCommon_getTag;this.updateTag=WDSCommon_updateTag;this.updateSelect=WDSCommon_updateSelect;this.updateCheckBox=WDSCommon_updateCheckBox;this.updateRadio=WDSCommon_updateRadio;this.updateInputText=WDSCommon_updateInputText;this.checkCheckBox=WDSCommon_checkCheckBox;this.getTagValue=WDSCommon_getTagValue;this.disableTag=WDSCommon_disableTag;this.disableRadio=WDSCommon_disableRadio;this.popWin=WDSCommon_popWin;this.popSizedWin=WDSCommon_popSizedWin;this.popSizedWinNoScroll=WDSCommon_popSizedWinNoScroll;this.formatNumber=WDSCommon_formatNumber;this.unEscapeXml=WDSCommon_unEscapeXml;this.replaceStr=WDSCommon_replaceStr;}
var WDSCommon=new WDSCommon();function WDSCommon_getTag(tag,name){if(tag.tagName){if(tag.tagName.toUpperCase()=="FORM"){var form=tag;tag=eval("form."+name);}}
if(!tag){WDSTrace.dump("WDSCommon.getTag return NULL !");return null;}
return tag;}
function WDSCommon_updateTag(tag,name,value,jsonchange){tag=WDSCommon.getTag(tag,name);if(!tag){return;}
var type=tag.type;if(tag.tagName=="SELECT"){this.updateSelect(tag,value,jsonchange);}else if(tag.tagName=="INPUT"){if(type.toUpperCase()=="CHECKBOX"){this.updateCheckBox(tag,value);}else if(type.toUpperCase()=="TEXT"){this.updateInputText(tag,value);}else if(type.toUpperCase()=="RADIO"){this.updateRadio(tag,value,jsonchange);}else if(tag.length){if(tag[0].type.toUpperCase()=="RADIO"){this.updateRadio(tag,value,jsonchange);}}else{this.updateInputText(tag,value);}}else if(tag.tagName=="TEXTAREA"){this.updateInputText(tag,value);}else{if(tag.length){if(tag[0].type.toUpperCase()=="RADIO"){this.updateRadio(tag,value,jsonchange);}}}}
function WDSCommon_disableTag(tag,name,disable,value){tag=WDSCommon.getTag(tag,name);if(!tag){return;}
var type=tag.type;if(tag.tagName=="SELECT"){tag.disabled=disable;}else if(tag.tagName=="INPUT"){if(type.toUpperCase()=="TEXT"){tag.disabled=disable;}else if(type.toUpperCase()=="CHECKBOX"){tag.disabled=disable;}else if(type.toUpperCase()=="RADIO"){this.disableRadio(tag,disable,value);}else if(tag.length){if(tag[0].type.toUpperCase()=="RADIO"){this.disableRadio(tag,disable,value);}}else{tag.disabled=disable;}}else if(tag.tagName=="TEXTAREA"){tag.disabled=disable;}else if(tag.length){if(tag[0].type.toUpperCase()=="RADIO"){this.disableRadio(tag,disable,value);}}}
function WDSCommon_disableRadio(tag,disable,value){if(tag.length){for(i=0;i<tag.length;i++){var currElem=tag[i];if(!value||currElem.value==value||disable==false){currElem.disabled=disable;}}}else{if(tag.value==value){tag.disabled=disable;}}}
function WDSCommon_updateInputText(tag,value,jsonchange){if(value==null){value="";}
tag.value=value;}
function WDSCommon_updateRadio(tag,value,jsonchange){if(value==null){return;}
if(tag.length){for(i=0;i<tag.length;i++){var currElem=tag[i];if(currElem.value==value){currElem.checked=true;if(null!=jsonchange){eval(jsonchange);}
return;}}}else{if(tag.value==value){tag.checked=true;if(null!=jsonchange){eval(jsonchange);}
return;}}}
function WDSCommon_updateSelect(tag,value,jsonchange){if(tag.tagName=="SELECT"){if(null==value){if(tag.options){if(tag.options.length>0){tag.options[0].selected=true;if(null!=jsonchange){eval(jsonchange);}}}
return;}
for(var i=0;i<tag.options.length;i++){var currvalue=tag.options[i].value;if(currvalue.toUpperCase()==value.toUpperCase()){tag.options[i].selected=true;if(null!=jsonchange){eval(jsonchange);}}}}}
function WDSCommon_updateCheckBox(tag,value){var type=tag.type;if(type.toUpperCase()=="CHECKBOX"){if(((tag.value==value)&&(!tag.checked))||((tag.value!=value)&&(tag.checked))){tag.click();}}}
function WDSCommon_checkCheckBox(id){var tag=null;tag=document.getElementById(id);if(!tag){return;}
tag.checked=true;}
function WDSCommon_getTagValue(tag,name){if(tag.tagName){if(tag.tagName.toUpperCase()=="FORM"){var form=tag;tag=eval("form."+name);}}
if(!tag){WDSTrace.dump("WDSCommon_getTagValue : input "+name+" does not exist");return"";}
var type=tag.type;if(tag.tagName=="SELECT"){WDSTrace.dump("WDSCommon_getTagValue : SELECT : "+tag.value);return tag.value;}else if(tag.tagName=="INPUT"){if(tag.length){if(tag[0].type.toUpperCase()=="RADIO"){for(i=0;i<tag.length;i++){var currElem=tag[i];if(currElem.type.toUpperCase()=="RADIO"&&currElem.checked){WDSTrace.dump("WDSCommon_getTagValue : RADIO : "+currElem.value);return currElem.value;}}}}else{if(tag.type.toUpperCase()=="CHECKBOX"){if(tag.checked==true){WDSTrace.dump("WDSCommon_getTagValue : CHECKBOX : "+tag.value);return tag.value;}}else{WDSTrace.dump("WDSCommon_getTagValue : ? : "+tag.value);return tag.value;}}}else if(tag.tagName=="TEXTAREA"){return tag.value;}else{if(tag.length){for(i=0;i<tag.length;i++){var currElem=tag[i];if(currElem.type.toUpperCase()=="RADIO"&&currElem.checked){WDSTrace.dump("WDSCommon_getTagValue : RADIO : "+tag.value);return currElem.value;}}}else{if(tag.checked){WDSTrace.dump("WDSCommon_getTagValue : ? : "+tag.value);return tag.value;}}}
WDSTrace.dump("WDSCommon_getTagValue : bad");return"";}
function WDSCommon_popWin(uri){var thePopwin=window.open(uri,'','scrollbars=yes,resizable=yes,width=650,height=450,left=50,top=50');return thePopwin;}
function WDSCommon_popSizedWin(uri,width,height){var thePopSizedWin=window.open(uri,'','scrollbars=yes,resizable=yes,width='+width+',height='+height+',left=50,top=50');if(navigator.appName=="Netscape"){thePopSizedWin.focus();}
return thePopSizedWin;}
function WDSCommon_popSizedWinNoScroll(uri,width,height){var thePopSizedWin=window.open(uri,'','scrollbars=no,resizable=no,width='+width+',height='+height+',left=50,top=50');if(navigator.appName=="Netscape"){thePopSizedWin.focus();}
return thePopSizedWin;}
function WDSCommon_formatNumber(n,d){n=n;d=d||2;var f=Math.pow(10,d);n=Math.round(n*f)/f;n+=Math.pow(10,-(d+1));n+='';return d==0?n.substring(0,n.indexOf('.')):n.substring(0,n.indexOf('.')+d+1);}
function WDSCommon_replaceStr(string,text,by){var strLength=string.length,txtLength=text.length;if((strLength==0)||(txtLength==0))return string;var i=string.indexOf(text);if((!i)&&(text!=string.substring(0,txtLength)))return string;if(i==-1)return string;var newstr=string.substring(0,i)+by;if(i+txtLength<strLength)
newstr+=WDSCommon.replaceStr(string.substring(i+txtLength,strLength),text,by);return newstr;}
function WDSCommon_unEscapeXml(text){text=WDSCommon.replaceStr(text,'&#039;',"'");text=WDSCommon.replaceStr(text,'&#034;',"\"");text=WDSCommon.replaceStr(text,'&amp;',"&");text=WDSCommon.replaceStr(text,'&lt;',"<");text=WDSCommon.replaceStr(text,'&gt;',">");return text;}
function WDSMessage(){this.messages=new Array();this.setMessage=WDSMessage_setMessage;this.getMessage=WDSMessage_getMessage;}
var WDSMessage=new WDSMessage();function WDSMessage_setMessage(key,message){this.messages[key]=message.replace("&quot;","\"").replace("&#39;","\'");}
function WDSMessage_getMessage(key){if(!this.messages[key]){return"WDSMessage WARNING - key not found : "+key;}
return this.messages[key];}
function WDSList(name){this.name=name;this.records=new Array();this.add=WDSList_add;this.addList=WDSList_addList;this.get=WDSList_get;this.size=WDSList_size;this.updateHtmlSelect=WDSList_updateHtmlSelect;this.toString=WDSList_toString;}
function WDSList_add(code,value){this.records[this.records.length]=new WDSListRecord(code,value);}
function WDSList_addList(list){for(var i=0;i<list.size();i++){this.add(list.records[i].getCode(),list.records[i].getValue());}}
function WDSList_get(code){for(var i=0;i<this.records.length;i++){if(this.records[i].getCode()==code){return this.records[i].getValue();}}
return"";}
function WDSList_updateHtmlSelect(selectId,value){if(!selectId){WDSTrace.dump("WDSList_updateHtmlSelect : argument missing");return;}
var object=null;if(typeof(selectId)=='string'){object=document.getElementById(selectId);if(!object){WDSTrace.dump("WDSList_updateHtmlSelect : object id="+selectId+" not found missing");return;}}else{if(selectId.type=='select-one'){object=selectId;}else{WDSTrace.dump("WDSList_updateHtmlSelect : object id="+selectId.name+" not a select tag")
return;}}
object.options.length=0;var selected=false;for(var i=0;i<this.records.length;i++){object.options[object.options.length]=new Option(this.records[i].value,this.records[i].code);if(null!=value&&!selected){if(this.records[i].code==value){selected=true;object.options[object.options.length-1].selected=true;}}}}
function WDSList_size(){return this.records.length;}
function WDSList_toString(){var stringList="WDSList : "+this.name+"\n\n";for(var i=0;i<this.size();i++){stringList+=this.records[i].getCode()+":"+this.records[i].getValue()+"\n";}
return stringList;}
function WDSListRecord(code,value){this.code=code;this.value=value
this.getCode=WDSListRecord_getCode;this.getValue=WDSListRecord_getValue;}
function WDSListRecord_getCode(){return this.code;}
function WDSListRecord_getValue(){return this.value;}
function WDSClass(){}
WDSClass.prototype.extend=function(subClass,superClass){eval("for (property in "+superClass+".prototype) { "+subClass+".prototype[property] = "+superClass+".prototype[property]; }");eval(subClass+".prototype.constructor = "+subClass+";");eval(subClass+".superclass = "+superClass+".prototype;");if(WDSBrowser.ie5){var superClassPrototype=eval(subClass+".superclass");for(var property in superClassPrototype){superClassPrototype[property].call=this.simulateCall;}
superClassPrototype.constructor.call=this.simulateCall;}}
WDSClass.prototype.simulateCall=function(){var myObj=arguments[0];var func=new String(this);var indexArg=func.indexOf("(");var indexArg2=func.indexOf(")",indexArg+1);var funcArg=func.substring(indexArg+1,indexArg2);if(funcArg.length>0){var argumentList=funcArg.split(",");for(var i=0;i<argumentList.length;i++){var j=i+1;eval("var "+argumentList[i]+" = arguments["+j+"];");}}
var indexBody=func.indexOf("{");var indexBody2=func.lastIndexOf("}");var funcBody=func.substring(indexBody+1,indexBody2);funcBody=WDSCommon.replaceStr(funcBody,"this.","myObj.");funcBody=WDSCommon.replaceStr(funcBody,"return;","");eval(funcBody);}
var WDSClass=new WDSClass();function WDSForm(formName,waitingImage,submitOnlyOnce){this.formName=formName;this.waitingImage=waitingImage;this.submitOnlyOnce=false;if(arguments.length==3){this.submitOnlyOnce=submitOnlyOnce;}
this.isAlreadySubmited=false;}
WDSForm.prototype.check=function(){}
WDSForm.prototype.prepareSubmit=function(){}
WDSForm.prototype.preFill=function(){}
WDSForm.prototype.getForm=function(){return eval("document."+this.formName);}
WDSForm.prototype.submit=function(){if(this.submitOnlyOnce&&this.isAlreadySubmited){return;}
WDSError.init();this.check();if(WDSError.hasError()){WDSError.reset();WDSError.show();}else{this.prepareSubmit();this.getForm().submit();this.isAlreadySubmited=true;if(this.waitingImage!=null&&this.waitingImage!=""){WDSWaitingImage.pleaseWait(this.waitingImage);}}}
function WDSPanel(){if(!(arguments.length==1&&arguments[0]=="prototyping")){this.fields=new Array();}}
WDSPanel.prototype.check=function(){};WDSPanel.prototype.add=function(field){this.fields[field.id]=field;};WDSPanel.prototype.prefill=function(){for(f in this.fields){this.fields[f].update();}};function WDSError(){this.WDSErrorDivID="WDSError";this.WDSErrorContentDivID="WDSErrorContainer";this.errorMessages=new Array();this.errorMessages.length=0;this.previousErrorMessages=new Array();this.previousErrorMessages.length=0;this.title="ERROR : please check those fields";this.linkObject=true;this.popup=false;this.popupResource=false;this.popupNoScroll=true;this.popupWidth=100;this.popupHeight=100;this.add=WDSError_add;this.init=WDSError_init;this.show=WDSError_show;this.reset=WDSError_reset;this.waitAndDisplay=WDSError_waitAndDisplay;this.display=WDSError_display;this.hasError=WDSError_hasError;this.setTitle=WDSError_setTitle;this.setLinkObject=WDSError_setLinkObject;this.setPopup=WDSError_setPopup;}
var WDSError=new WDSError();var WDSErrorPopup=null;function WDSError_add(msg,object,type,isInPanel){if(msg.length>0){if(!object){object=null;}
if(isInPanel!=false){isInPanel=true;}
if(!type){type="E";}
this.errorMessages[this.errorMessages.length]=new WDSObjectError(msg,object,type,isInPanel);}}
function WDSError_waitAndDisplay(){if(!WDSErrorPopup.document.getElementById(this.WDSErrorContentDivID)){setTimeout("WDSError.waitAndDisplay();",20);return false;}else{this.display(WDSErrorPopup);}}
function WDSError_display(myWindow){var wdsErrorContentDivID=myWindow.document.getElementById(this.WDSErrorContentDivID);var wdsErrorDivID=myWindow.document.getElementById(this.WDSErrorDivID);var html="";if((this.title)&&(this.errorMessages.length>0)){html+="<h1 style='font-size:120%;'>"+this.title+"</h1>";}
html+="<ul>";for(var i=0;i<this.errorMessages.length;i++){html+=this.errorMessages[i].getInnerHTML();if(null!=this.errorMessages[i].object){this.errorMessages[i].modifySrcElement();}}
html+="</ul>";wdsErrorContentDivID.innerHTML=html;wdsErrorDivID.style.display="";myWindow.scrollTo(0,0);myWindow.focus();}
function WDSError_show(){this.reset();var popUpToCreate=true;if(WDSErrorPopup){if(WDSErrorPopup.closed){popUpToCreate=true;}else{popUpToCreate=false;}}
if(this.popup&&popUpToCreate){var popupProperties="";if(this.popupNoScroll){popupProperties+="scrollbars=no,resizable=no";}else{popupProperties+="scrollbars=yes,resizable=yes";}
popupProperties+=",width="+this.popupWidth;popupProperties+=",height="+this.popupHeight;WDSErrorPopup=window.open(this.popupResource,'',popupProperties);this.waitAndDisplay();}else{var myWindow=self;if(WDSErrorPopup){myWindow=top.WDSErrorPopup;}
this.display(myWindow);}
return false;}
function WDSError_init(){this.previousErrorMessages=this.errorMessages;this.errorMessages=new Array();this.errorMessages.length=0;}
function WDSError_reset(){for(var i=0;i<this.previousErrorMessages.length;i++){if(null!=this.previousErrorMessages[i].object){this.previousErrorMessages[i].initSrcElement();}}
if(!this.popup){var wdsErrorContentDivID=document.getElementById(this.WDSErrorContentDivID);var wdsErrorDivID=document.getElementById(this.WDSErrorDivID);wdsErrorContentDivID.innerHTML="";wdsErrorDivID.style.display="none";}else{if(!WDSErrorPopup){return;}
WDSErrorPopup.close();WDSErrorPopup=null;}}
function WDSError_hasError(){return this.errorMessages.length>0;}
function WDSError_setTitle(title){this.title=title;}
function WDSError_setLinkObject(value){this.linkObject=value;}
function WDSError_setPopup(resource,noscroll,width,height){if(resource==false){this.popup=false;}else{this.popup=true;this.popupResource=resource;this.popupNoScroll=noscroll;this.popupWidth=width;this.popupHeight=height;}}
function WDSObjectError(message,object,type,isInPanel){this.message=message;this.object=object;this.type=type;this.isInPanel=isInPanel;if((WDSError.linkObject)&&(this.object)){this.anchor='#'+this.object.name;}
this.getInnerHTML=WDSObjectError_getInnerHTML;this.modifySrcElement=WDSObjectError_modifySrcElement;this.initSrcElement=WDSObjectError_initSrcElement;}
function WDSObjectError_getInnerHTML(){if(!this.isInPanel){return"";}
var html="";if(this.message!=" "){html="<li class='WDSError"+this.type+"'>";if((this.object!=null)&&(WDSError.linkObject)&&!WDSError.popup){if((this.object.type=="hidden")||(this.object.style&&this.object.style.display=="none")){html+="<a href=\"javascript:void(null)\">";}else if(this.object.id){html+="<a href=\"javascript:document.getElementById('"+this.object.id+"').focus();\">";}else{html+="<a href=\""+this.anchor+"\">";}
html+=this.message;html+="</a>";}else{html+=this.message;}
html+="</li>";}
return html;}
function WDSObjectError_modifySrcElement(){if((null==this.object)&&(!WDSError.linkObject)){return;}
var parent=this.object.parentNode.parentNode;parent.firstChild.insertBefore(document.createTextNode(" # "),parent.firstChild.firstChild);}
function WDSObjectError_initSrcElement(){if((null==this.object)&&(!WDSError.linkObject)){return;}
var parent=this.object.parentNode.parentNode;parent.firstChild.removeChild(parent.firstChild.firstChild);}
function WDSCheck(){this.REGEXP_ALPHA=/^[A-Z]+$/gi;this.REGEXP_NUMERIC=/^[0-9]+$/gi;this.REGEXP_ALPHANUMERIC=/^[0-9A-Z]+$/gi;this.REGEXP_TEXT_INPUT=/^[^\<\>\;\'\"]*$/g;this.REGEXP_NUMERIC_SPACE_DASH=/^[0-9 \-]+$/;this.REGEXP_DASH_COMMA_ALPHANUMERIC=/^[A-Za-z0-9\.\-\,]+$/;this.REGEXP_PHONE_ALPHANUMERIC=/^[A-Za-z0-9 \-\+\(\)]+$/;this.REGEXP_INTERNATIONAL_ALPHANUMERIC=/^[-.'0-9ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz �������������������������������������������������������������� ]+$/g;this.REGEXP_INTERNATIONAL_ALPHA=/^[-.'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz �������������������������������������������������������������� ]+$/g;this.REGEXP_EMAILPAT=/^(.+)@(.+)$/;this.REGEXP_IPDOMAINPAT=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;this.PAST_DATE="PAST_DATE";this.FUTURE_DATE="FUTURE_DATE";this.TODAY="TODAY";this.checkForMatch=WDSCheck_checkForMatch;this.checkMandatory=WDSCheck_checkMandatory;this.checkSize=WDSCheck_checkSize;this.checkEmail=WDSCheck_checkEmail;this.checkPhone=WDSCheck_checkPhone;this.checkDate=WDSCheck_checkDate;this.checkDateOrder=WDSCheck_checkDateOrder;this.checkLuhn=WDSCheck_checkLuhn;this.checkCreditCard=WDSCheck_checkCreditCard;this.checkVirginAtlanticValidity=WDSCheck_checkVirginAtlanticValidity;}
var WDSCheck=new WDSCheck();function WDSCheck_checkForMatch(obj,message,regex){var value=WDSCommon.getTagValue(obj);if(!value.match(regex)){WDSError.add(message,obj);return false;}
return true;}
function WDSCheck_checkMandatory(obj,message){var value=WDSCommon.getTagValue(obj);if(value==""){WDSError.add(message,obj);return false;}
return true;}
function WDSCheck_checkSize(obj,message,min,max){var value=WDSCommon.getTagValue(obj);if((value.length>max)||(value.length<min)){WDSError.add(message,obj);return false;}
return true;}
function WDSCheck_checkEmail(obj,message){var localMessage=WDSMessage.getMessage("WDSCheck.EmailError");if(message){localMessage=message;}
var emailStr=WDSCommon.getTagValue(obj).trim();var specialChars="\\(\\)<>@!#$%^&*+=?/\\',;:\\\\\\\"\\.\\[\\]\\{\\}";var validChars="\[^\\s"+specialChars+"\]";var quotedUser="(\"[^\"]*\")";var atom=validChars+'+';var word="("+atom+"|"+quotedUser+")";var userPat=new RegExp("^"+word+"(\\."+word+")*$");var domainPat=new RegExp("^"+atom+"(\\."+atom+")*$");var matchArray=emailStr.match(this.REGEXP_EMAILPAT);if(matchArray==null){WDSError.add(localMessage,obj);return false;}
var user=matchArray[1];var domain=matchArray[2];if(user.match(userPat)==null){WDSError.add(localMessage,obj);return false;}
var IPArray=domain.match(this.REGEXP_IPDOMAINPAT);if(IPArray!=null){for(var i=1;i<=4;i++){if(IPArray[i]>255){WDSError.add(localMessage,obj);return false;}}
return true;}
var domainArray=domain.match(domainPat);if(domainArray==null){WDSError.add(localMessage,obj);return false;}
var atomPat=new RegExp(atom,"g");var domArr=domain.match(atomPat);var len=domArr.length;if(domArr[domArr.length-1].length<2||domArr[domArr.length-1].length>6){WDSError.add(localMessage,obj);return false;}
if(len<2){WDSError.add(localMessage,obj);return false;}
return true;}
function WDSCheck_checkPhone(obj,type){var phoneNumberPattern=/^[0-9()+-]{1,60}$/gi;var number=WDSCommon.getTagValue(obj);var tmpnumber=number.replace(/ /g,"");var flg=tmpnumber.match(phoneNumberPattern)?0:1;if(flg==1){WDSError.add(WDSMessage.getMessage("WDSCheck."+type+"NumberError"),obj);return false;}
return true;}
function WDSCheck_checkDate(dayObj,monthObj,yearObj,message){WDSTrace.dump("WDSCheck_checkDate :");var dayLocalMessage=WDSMessage.getMessage("WDSCheck.DayError");var monthLocalMessage=WDSMessage.getMessage("WDSCheck.MonthError");var yearLocalMessage=WDSMessage.getMessage("WDSCheck.YearError");if(message){dayLocalMessage=message;monthLocalMessage=message;yearLocalMessage=message;}
var intDay;var intMonth;var intYear;intDay=parseInt(WDSCommon.getTagValue(dayObj),10);if(isNaN(intDay)){WDSError.add(dayLocalMessage,dayObj);return false;}
if(!yearObj){if(!this.checkMandatory(monthObj,monthLocalMessage)){return false;}
intMonth=parseInt(WDSCommon.getTagValue(monthObj).substring(4,6),10);intYear=parseInt(WDSCommon.getTagValue(monthObj).substring(0,4),10);}else{if(!this.checkMandatory(monthObj,monthLocalMessage)){return false;}else if(!this.checkMandatory(yearObj,yearLocalMessage)){return false;}
intMonth=parseInt(WDSCommon.getTagValue(monthObj),10);intYear=parseInt(WDSCommon.getTagValue(yearObj),10);}
if(isNaN(intMonth)){WDSError.add(monthLocalMessage,monthObj);return false;}
if(isNaN(intYear)){WDSError.add(yearLocalMessage,yearObj);return false;}
if(intMonth>12||intMonth<1){WDSError.add(monthLocalMessage,monthObj);return false;}
if(intDay>31||intDay<1){WDSError.add(dayLocalMessage,dayObj);return false;}
if((intMonth==4||intMonth==6||intMonth==9||intMonth==11)&&intDay>30){WDSError.add(dayLocalMessage,dayObj);return false;}
if(intMonth==2){if((intYear%100==0&&intYear%400==0)||(intYear%4==0)){if(intDay>29){WDSError.add(dayLocalMessage,dayObj);return false;}}
else{if(intDay>28){WDSError.add(dayLocalMessage,dayObj);return false;}}}
var today=new Date();var date=new Date(intYear,intMonth-1,intDay);if((date.getYear()==today.getYear())&&(date.getMonth()==today.getMonth())&&(date.getDate()==today.getDate())){WDSTrace.dump("            TODAY");return this.TODAY;}
else if(date.getTime()>today.getTime()){WDSTrace.dump("            FUTURE_DATE");return this.FUTURE_DATE;}
else if(date.getTime()<today.getTime()){WDSTrace.dump("            PAST_DATE");return this.PAST_DATE;}}
function WDSCheck_checkDateOrder(criteria,dayObjReference,dayObj,monthObjReference,monthObj,yearObjReference,yearObj,message){WDSTrace.dump("WDSCheck_checkDateOrder :");var localMessage=WDSMessage.getMessage("WDSCheck.DateOrderError");if(message){localMessage=message;}
var intDayReference;var intMonthReference;var intYearReference;var intDay;var intMonth;var intYear;var result;intDayReference=parseInt(WDSCommon.getTagValue(dayObjReference),10);if(!yearObjReference){intMonthReference=parseInt(WDSCommon.getTagValue(monthObjReference).substring(4,6),10);intYearReference=parseInt(WDSCommon.getTagValue(monthObjReference).substring(0,4),10);}else{intMonthReference=parseInt(WDSCommon.getTagValue(monthObjReference),10);intYearReference=parseInt(WDSCommon.getTagValue(yearObjReference),10);}
intDay=parseInt(WDSCommon.getTagValue(dayObj),10);if(!yearObj){intMonth=parseInt(WDSCommon.getTagValue(monthObj).substring(4,6),10);intYear=parseInt(WDSCommon.getTagValue(monthObj).substring(0,4),10);}else{intMonth=parseInt(WDSCommon.getTagValue(monthObj),10);intYear=parseInt(WDSCommon.getTagValue(yearObj),10);}
var dateReference=new Date(intYearReference,intMonthReference-1,intDayReference);var date=new Date(intYear,intMonth-1,intDay);if((dateReference.getYear()==date.getYear())&&(dateReference.getMonth()==date.getMonth())&&(dateReference.getDate()==date.getDate())){WDSTrace.dump("            TODAY");result=this.TODAY;}
else if(dateReference.getTime()<date.getTime()){WDSTrace.dump("            FUTURE_DATE");result=this.FUTURE_DATE;}
else if(dateReference.getTime()>date.getTime()){WDSTrace.dump("            PAST_DATE");result=this.PAST_DATE;}
if(result!=criteria){WDSError.add(localMessage,monthObj);}
return result;}
function WDSCheck_checkLuhn(cardNumbersOnly){var cardNumberLength=cardNumbersOnly.length;if(cardNumberLength==0){return false;}
var numberProductDigitIndex;var checkSumTotal=0;cardNumbersOnly=cardNumbersOnly.split("").reverse();for(var digitCounter=0;digitCounter<cardNumberLength;digitCounter++){var numberProduct=parseInt(cardNumbersOnly[digitCounter]);if(digitCounter%2==1){numberProduct*=2;var numberString=String(numberProduct).split("");for(var secondCounter=0;secondCounter<numberString.length;secondCounter++){checkSumTotal+=parseInt(numberString[secondCounter]);}}
else{checkSumTotal+=numberProduct;}}
return(checkSumTotal%10==0);}
function WDSCheck_checkCreditCard(numberObj,monthObj,yearObj,indexCC){WDSTrace.dump("WDSCheck_checkCreditCard ...");if(!indexCC){indexCC="";}
var dateError=false;var cardsum=0;var dnum=0;var test=0;var number=WDSCommon.getTagValue(numberObj);var expMonth=WDSCommon.getTagValue(monthObj);var expYear;if(!yearObj){if(!this.checkMandatory(monthObj,WDSMessage.getMessage("WDSCheck.ExpiryDateMandatoryError"+indexCC))){WDSTrace.dump("   ExpiryDateMandatoryError !");dateError=true;}
if(expMonth.match("[/]")){var dateTab=expMonth.split("/");expMonth=dateTab[0];expYear="20"+dateTab[1];}}else{if(!this.checkMandatory(monthObj,WDSMessage.getMessage("WDSCheck.ExpiryMonthMandatoryError"+indexCC))){WDSTrace.dump("   ExpiryMonthMandatoryError !");dateError=true;}else if(!this.checkMandatory(yearObj,WDSMessage.getMessage("WDSCheck.ExpiryYearMandatoryError"+indexCC))){WDSTrace.dump("   ExpiryYearMandatoryError !");dateError=true;}
expMonth=WDSCommon.getTagValue(monthObj);expYear="20"+WDSCommon.getTagValue(yearObj);}
today=new Date();expiry=new Date();expiry.setYear(expYear);expiry.setMonth(parseInt(expMonth,10)-1);if(!dateError&&(today.getTime()>expiry.getTime())){WDSError.add(WDSMessage.getMessage("WDSCheck.ExpiryDateError"+indexCC),monthObj);WDSTrace.dump("   ExpiryDateError !");dateError=true;}
var completecc=number+expMonth+expYear;if(completecc.match(/^[0-9 ]{15,28}$/g)==null){WDSError.add(WDSMessage.getMessage("WDSCheck.CreditCardError"+indexCC),numberObj);WDSTrace.dump("   CreditCardError : match !");return false;}
if(number.length<13){WDSError.add(WDSMessage.getMessage("WDSCheck.CreditCardError"+indexCC),numberObj);WDSTrace.dump("   CreditCardError : length !");return false;}
var ccNumber=number.replace(/ /g,'');for(var i=ccNumber.length;i>=1;i--){test=test+1;num=ccNumber.charAt(i-1);if((test%2)!=0){cardsum=cardsum+_parseInt(num);}else{dnum=_parseInt(num)*2;if(dnum>=10){cardsum=cardsum+1+dnum-10;}else{cardsum=cardsum+dnum;}}}
if((cardsum%10)!=0){WDSError.add(WDSMessage.getMessage("WDSCheck.CreditCardError"+indexCC),numberObj);WDSTrace.dump("   CreditCardError : algo !");return false;}else{return!dateError;}}
function WDSCheck_checkVirginAtlanticValidity(number,message){var localMessage=WDSMessage.getMessage("WDSCheck.VirginAtlanticInvalid");if(message){localMessage=message;}
if(isNaN(number)||number.length!=11||number.substr(0,2)!="00"||number[2]<6){WDSError.add(localMessage);return false;}
var checkDigit=number.charAt(10);var evenNumbers=number.charAt(1)*2+number.charAt(3)*2+number.charAt(5)*2+number.charAt(7)*2+number.charAt(9)*2;var oddNumbers=number.charAt(0)*1+number.charAt(2)*1+number.charAt(4)*1+number.charAt(6)*1+number.charAt(8)*1;var total=evenNumbers+oddNumbers;var roundedTotal=Math.ceil(total/10)*10;var computedCheckDigit=roundedTotal-total;if(checkDigit!=computedCheckDigit){WDSError.add(localMessage);return false;}
return true;}
function WDSCookie(name){this.DEBUG=false;this.COOKIE_SEP=";";this.SEP_VALUE="^";this.name=(!name)?"WDSCookie":name;this.records=new Array();var today=new Date();this.expires=new Date(today.getFullYear()+1,today.getMonth());this.path=null;this.domain=null;this.secure=false;this.reinit=WDSCookie_reinit;this.add=WDSCookie_add;this.getText=WDSCookie_getText;this.get=WDSCookie_get;this.notEmpty=WDSCookie_notEmpty;this.save=WDSCookie_save;this.load=WDSCookie_load;this.remove=WDSCookie_remove;this.parseValue=WDSCookie_parseValue;this.getCookieVal=WDSCookie_getCookieVal;this.setExpires=WDSCookie_setExpires;this.setPath=WDSCookie_setPath;this.setDomain=WDSCookie_setDomain;this.setSecure=WDSCookie_setSecure;}
function WDSCookie_reinit(){this.records=new Array();this.records.length=0;var today=new Date();this.expires=new Date(today.getFullYear()+1,today.getMonth());}
function WDSCookie_remove(){this.reinit();this.setExpires(new Date("January 1, 1970"));this.save();}
function WDSCookie_getCookieVal(offset){var endstr=document.cookie.indexOf(";",offset);if(endstr==-1)
endstr=document.cookie.length;return unescape(document.cookie.substring(offset,endstr));}
function WDSCookie_load(){var cookieValue=null;var arg=this.name+"=";var alen=arg.length;var clen=document.cookie.length;var i=0;while(i<clen){var j=i+alen;if(document.cookie.substring(i,j)==arg){cookieValue=this.getCookieVal(j);}
i=document.cookie.indexOf(" ",i)+1;if(i==0)break;}
if(cookieValue!=null){this.parseValue(cookieValue);}
WDSTrace.dump("WDSCookie : loaded - "+this.name);}
function WDSCookie_add(name,value){WDSTrace.dump("WDSCookie_add : "+name+", "+value);var obj=null;try{obj=eval(name);}catch(error){WDSTrace.dump("WDSCookie_add : input does not exist for "+this.name);}
if(obj!=null){var record=null;if((!value)&&(typeof(value)!="undefined")){record=new WDSCookieRecord(name);}else{record=new WDSCookieRecord(name,value);}
this.records[this.records.length]=record;}}
function WDSCookie_getText(){var text="";for(var i=0;i<this.records.length;i++){var value=this.records[i].getText();text+=value;if(value.indexOf(this.COOKIE_SEP)>=0){WDSTrace.dump("WDSCookie_getText : ERROR : '"+this.COOKIE_SEP+"' found in cookie value !!!! (cookie name: "+this.name+") - "+value);}
if(i<this.records.length-1){text+=this.SEP_VALUE;}}
return text;}
function WDSCookie_get(index){if(this.value!=null){this.parseValue();this.value=null;}
if(index<this.records.length){return this.records[index];}
WDSTrace.dump("WDSCookie_get : index = "+index);WDSTrace.dump("WDSCookie_get : this.records.length = "+this.records.length);return null;}
function WDSCookie_notEmpty(){return(this.records.length>0);}
function WDSCookie_save(){var result=this.name+"="+this.getText();result+=this.COOKIE_SEP+"EXPIRES="+this.expires.toGMTString();result+=((this.domain!=null)?this.COOKIE_SEP+"DOMAIN="+this.domain:"");result+=((this.domain!=null)?this.COOKIE_SEP+"PATH="+this.path:"");result+=(this.secure)?this.COOKIE_SEP+"SECURE":"";WDSTrace.dump("WDSCookie_save :"+result);if(result.length>=4050){WDSTrace.dump("WDSCookie_save : ERROR : Cookie is too large ( > 4050 characters - cookie name: "+this.name+") - "+result);}
document.cookie=result;return result;}
function WDSCookie_parseValue(valueString){this.reinit();var values=valueString.split(this.SEP_VALUE);if(!(values.length==1&&values[0].length==0)){for(var i=0;i<values.length;i+=2){this.add(values[i],values[i+1]);WDSTrace.dump("WDSCookie_update ?");if(null!=this.get(i/2)){WDSTrace.dump("WDSCookie_update !");this.get(i/2).update();}}}}
function WDSCookie_setExpires(expires){this.expires=expires;}
function WDSCookie_setPath(path){this.path=path;}
function WDSCookie_setValue(value){this.value=value;}
function WDSCookie_setDomain(domain){this.domain=domain;}
function WDSCookie_setSecure(secure){this.secure=secure;}
function WDSCookieRecord(name,value){WDSTrace.dump("WDSCookieRecord : "+name+", "+value);this.name=name;this.SEP_VALUE="^";if(!value){WDSTrace.dump("WDSCookieRecord : typeof(value) - "+typeof(value));WDSTrace.dump("WDSCookieRecord : name = "+this.name);try{var obj=eval(this.name);if(obj){WDSTrace.dump("WDSCookieRecord : obj = "+obj.name);this.value=WDSCommon.getTagValue(obj,null,this.value);}}catch(error){WDSTrace.dump("WDSCookieRecord : Exception for "+this.name);}}else{this.value=value;}
this.getText=WDSCookieRecord_getText;this.update=WDSCookieRecord_update;}
function WDSCookieRecord_getText(){if((typeof(this.value)=='string')&&(this.value.indexOf(this.SEP_VALUE)>=0)){WDSTrace.dump("WDSCookieRecord_getText : ERROR : '"+this.SEP_VALUE+"' found in cookie value !!!! (record name: "+this.name+") - "+this.value);}
return this.name+this.SEP_VALUE+this.value;}
function WDSCookieRecord_update(){WDSTrace.dump("WDSCookieRecord_update :");try{var obj=eval(this.name);if(obj){WDSTrace.dump("WDSCookieRecord_update : obj = "+obj.name);WDSCommon.updateTag(obj,null,this.value);}}catch(error){WDSTrace.dump("WDSCookieRecord.update : Exception for "+this.name);}}
function WDSHttpRequest(){this.removeParameter=WDSHttpRequest_removeParameter;this.replaceParameter=WDSHttpRequest_replaceParameter;}
var WDSHttpRequest=new WDSHttpRequest();function WDSHttpRequest_removeParameter(httpRequest,parameter){regExp=new RegExp("&"+parameter+"=[^&]*|&"+parameter+"=.*$");httpRequest=httpRequest.replace(regExp,"");return httpRequest;}
function WDSHttpRequest_replaceParameter(httpRequest,parameter,value){if(httpRequest.indexOf(parameter)<0){httpRequest+=((httpRequest.indexOf('?')<0)?"?":"&")+parameter+"="+value;}else{if(value==null){value="";}
regExp=new RegExp("&"+parameter+"=[^&]*|&"+parameter+"=.*$");httpRequest=httpRequest.replace(regExp,"&"+parameter+"="+value);regExp=new RegExp("[?]"+parameter+"=[^&]*|[?]"+parameter+"=.*$");httpRequest=httpRequest.replace(regExp,"?"+parameter+"="+value);}
return httpRequest;}
function WDSOverrideValue(){this.overrides=new Array();this.addOverride=WDSOverrideValue_addOverride;this.xml=WDSOverrideValue_xml;}
function WDSOverrideValue_addOverride(value){this.overrides[this.overrides.length]=value;}
function WDSOverrideValue_xml(){var result="<SO_GL>";for(var i=0;i<this.overrides.length;i++){result+=this.overrides[i];}
result+="</SO_GL>";return result;}
function WDSWaitingImage(){this.IMG_ID="WDSWaitingImageImgID";this.DIV_ID="WDSWaitingImageDivID";this.PROGRESS_ID="WDSProgressImageImgID";this.path=null;this.language="en";this.privateLabel="STANDARD";this.progressImg="progress.gif";this.setLanguage=WDSWaitingImage_setLanguage;this.setPrivateLabel=WDSWaitingImage_setPrivateLabel;this.setProgressImg=WDSWaitingImage_setProgressImg;this.setPath=WDSWaitingImage_setPath;this.preload=WDSWaitingImage_preload;this.pleaseWait=WDSWaitingImage_pleaseWait;}
var WDSWaitingImage=new WDSWaitingImage();function WDSWaitingImage_setLanguage(language){if(language!=""){this.language=language.toLowerCase();}}
function WDSWaitingImage_setProgressImg(progressImg){if(progressImg!=""){this.progressImg=progressImg;}}
function WDSWaitingImage_setPrivateLabel(privateLabel){if(privateLabel==null){this.privateLabel=null;}else if(privateLabel!=""){this.privateLabel=privateLabel;}}
function WDSWaitingImage_setPath(path){if(path!=""){this.path=path;}}
function WDSWaitingImage_preload(waitingImg){try{if(WDSBrowser.mac){return;}}catch(error){return;}
var wiSrc="";if(this.path!=null){wiSrc+=this.path+"/";wiSrc+=this.language+"/";}else{if(this.privateLabel!=null){wiSrc+="PrivateLabel/"+this.privateLabel+"/";}
wiSrc+="img/"+this.language+"/";}
wiSrc+=waitingImg+".gif";var wiSrcImgPreload=new Image();wiSrcImgPreload.src=wiSrc;var piSrc="";if(this.path!=null){piSrc+=this.path+"/";piSrc+=this.language+"/";}else{if(this.privateLabel!=null){piSrc+="PrivateLabel/"+this.privateLabel+"/";}
piSrc+="img/"+this.language+"/";}
piSrc+=this.progressImg;var piSrcImgPreload=new Image();piSrcImgPreload.src=piSrc;}
function WDSWaitingImage_pleaseWait(waitingImg){try{if(WDSBrowser.mac){return;}}catch(error){return;}
var waitingImageDiv=document.getElementById(WDSWaitingImage.DIV_ID);if(!waitingImageDiv){return;}
var container=document.getElementById("container");var wiSrc="";if(this.path!=null){wiSrc+=this.path+"/";wiSrc+=this.language+"/";}else{if(this.privateLabel!=null){wiSrc+="PrivateLabel/"+this.privateLabel+"/";}
wiSrc+="img/"+this.language+"/";}
wiSrc+=waitingImg+".gif";var piSrc="";if(this.path!=null){piSrc+=this.path+"/";piSrc+=this.language+"/";}else{if(this.privateLabel!=null){piSrc+="PrivateLabel/"+this.privateLabel+"/";}
piSrc+="img/"+this.language+"/";}
piSrc+=this.progressImg;if(document.getElementById(WDSWaitingImage.IMG_ID)){document.getElementById(WDSWaitingImage.IMG_ID).src=wiSrc;}else{WDSTrace.dump("WDSWaitingImage_pleaseWait : element id = WDSWaitingImage.IMG_ID NOT FOUND and MANDATORY");}
if(document.getElementById(WDSWaitingImage.PROGRESS_ID)){document.getElementById(WDSWaitingImage.PROGRESS_ID).src=piSrc;}else{WDSTrace.dump("WDSWaitingImage_pleaseWait : element id = WDSWaitingImage.PROGRESS_ID NOT FOUND");}
waitingImageDiv.style.display="block";waitingImageDiv.style.visibility="visible";container.style.display="none";self.scrollTo(0,0);}
function WDSEffect(tableID){this.tableID=tableID;this.selectedCell=null;}
WDSEffect.prototype.getTable=function(){var table=document.getElementById(this.tableID);if(!table){return null;}
return table;}
WDSEffect.prototype.effectOn=function(obj){var newclassname="";var classtab=obj.className.split(" ");for(var i=0;i<classtab.length;i++){var classname=new String(classtab[i]);if(classname.match("EffectOff")){newclassname+=" "+classname.replace(/EffectOff/g,"EffectOn");}else{newclassname+=" "+classname;}}
obj.className=newclassname;}
WDSEffect.prototype.effectOff=function(obj){var newclassname="";var classtab=obj.className.split(" ");for(var i=0;i<classtab.length;i++){var classname=new String(classtab[i]);if(classname.match("EffectOn")){newclassname+=" "+classname.replace(/EffectOn/g,"EffectOff");}else{newclassname+=" "+classname;}}
obj.className=newclassname;}
WDSEffect.prototype.effectHeaderOff=function(obj){if(this.getTable()==null){return;}
var indexCol=0;var indexRow=0;var nbCols=0;var nbRows=this.getTable().tBodies[0].rows.length-1;for(var r=0;r<this.getTable().tBodies[0].rows.length;r++){var row=this.getTable().tBodies[0].rows[r];nbCols=row.cells.length-1;for(var c=0;c<row.cells.length;c++){if(obj==row.cells[c]){indexCol=c;indexRow=r;}}}
this.effectOff(obj);if(this.getTable().tBodies[0].rows[indexRow].cells[0].tagName.toUpperCase()=="TH"){this.effectOff(this.getTable().tBodies[0].rows[indexRow].cells[0]);}
if(this.getTable().tBodies[0].rows[indexRow].cells[nbCols].tagName.toUpperCase()=="TH"){this.effectOff(this.getTable().tBodies[0].rows[indexRow].cells[nbCols]);}
if(this.getTable().tBodies[0].rows[0].cells[indexCol].tagName.toUpperCase()=="TH"){this.effectOff(this.getTable().tBodies[0].rows[0].cells[indexCol]);}
if(this.getTable().tBodies[0].rows[nbRows].cells[indexCol].tagName.toUpperCase()=="TH"){this.effectOff(this.getTable().tBodies[0].rows[nbRows].cells[indexCol]);}}
WDSEffect.prototype.effectHeaderOn=function(obj){if(this.getTable()==null){return;}
var indexCol=0;var indexRow=0;var nbCols=0;var nbRows=this.getTable().tBodies[0].rows.length-1;for(var r=0;r<this.getTable().tBodies[0].rows.length;r++){var row=this.getTable().tBodies[0].rows[r];nbCols=row.cells.length-1;for(var c=0;c<row.cells.length;c++){if(obj==row.cells[c]){indexCol=c;indexRow=r;}}}
this.effectOn(obj);if(this.getTable().tBodies[0].rows[indexRow].cells[0].tagName.toUpperCase()=="TH"){this.effectOn(this.getTable().tBodies[0].rows[indexRow].cells[0]);}
if(this.getTable().tBodies[0].rows[indexRow].cells[nbCols].tagName.toUpperCase()=="TH"){this.effectOn(this.getTable().tBodies[0].rows[indexRow].cells[nbCols]);}
if(this.getTable().tBodies[0].rows[0].cells[indexCol].tagName.toUpperCase()=="TH"){this.effectOn(this.getTable().tBodies[0].rows[0].cells[indexCol]);}
if(this.getTable().tBodies[0].rows[nbRows].cells[indexCol].tagName.toUpperCase()=="TH"){this.effectOn(this.getTable().tBodies[0].rows[nbRows].cells[indexCol]);}}
WDSEffect.prototype.select=function(obj){if(this.selectedCell!=null){this.unselect(this.selectedCell);}
var newclassname="";var classtab=obj.className.split(" ");for(var i=0;i<classtab.length;i++){var classname=new String(classtab[i]);if(classname.match("SelectedEffect")){newclassname+=" "+classname;}else if(classname.match("EffectOn")){newclassname+=" "+classname.replace(/EffectOn/g,"SelectedEffectOn");}else if(classname.match("EffectOff")){newclassname+=" "+classname.replace(/EffectOff/g,"SelectedEffectOff");}else{newclassname+=" "+classname;}}
obj.className=newclassname;var nbchilds=obj.childNodes.length;var chd=obj.childNodes[0];var indexChild=0;var tagName="";if(!chd.tagName){tagName="";}else{tagName=chd.tagName;}
while((tagName.toUpperCase()!="INPUT")&&(indexChild<nbchilds)){indexChild++;chd=obj.childNodes[indexChild];if(!chd.tagName){tagName="";}else{tagName=chd.tagName;}}
if(chd!=null){chd.click();}
this.selectedCell=obj;this.customActionOnSelect();}
WDSEffect.prototype.unselect=function(obj){var newclassname="";var classtab=obj.className.split(" ");for(var i=0;i<classtab.length;i++){var classname=new String(classtab[i]);if(classname.match("SelectedEffectOn")){newclassname+=" "+classname.replace(/SelectedEffectOn/g,"EffectOn");}else if(classname.match("SelectedEffectOff")){newclassname+=" "+classname.replace(/SelectedEffectOff/g,"EffectOff");}else{newclassname+=" "+classname;}}
obj.className=newclassname;}
WDSEffect.prototype.customActionOnSelect=function(){}
function WDSPrefill(varForm){this.varForm=varForm;this.actions=new Array();this.trace=new Array();}
WDSPrefill.prototype.addField=function(name,value){this.trace[this.actions.length]=name+" = "+value;this.actions[this.actions.length]="window.opener.WDSCommon.updateTag(window.opener."+this.varForm+".getForm(), \""+name+"\", \""+value+"\");";}
WDSPrefill.prototype.addAction=function(action){this.trace[this.actions.length]=action;this.actions[this.actions.length]=action;}
WDSPrefill.prototype.prefill=function(){for(var i=0;i<this.actions.length;i++){eval(this.actions[i]);}}
WDSPrefill.prototype.submit=function(){eval("window.opener."+this.varForm+".submit()");}
WDSPrefill.prototype.toString=function(){for(var i=0;i<this.trace.length;i++){document.writeln(this.trace[i]+"<br>");}}
function WDSAjax(callBackMethod){this.callBackContext=this;this.callBackMethod=callBackMethod;if(window.XMLHttpRequest)
this.requestObject=new XMLHttpRequest();else{if(window.ActiveXObject)
this.requestObject=new ActiveXObject("Microsoft.XMLHTTP");}}
WDSAjax.prototype.sendRequest=function(action,method,async,param){var doAsync=true;if(async!=null){doAsync=async;}
if(!method){method="post";}
if(method.toLowerCase()=="get"){var firstChar=(action.indexOf("?")==-1)?"?":"&";action+=firstChar+param;}
var netLoader=this;this.requestObject.onreadystatechange=function(){WDSAjax.handleResponse(netLoader);}
this.requestObject.open(method,action,doAsync);if(method.toLowerCase()=="post"){this.requestObject.setRequestHeader("Content-Type","application/x-www-form-urlencoded");this.requestObject.send(param);}
else{this.requestObject.send(null);}}
WDSAjax.handleResponse=function(WDSAjaxObject){if(WDSAjaxObject.requestObject.readyState==4){if(WDSAjaxObject.callBackMethod){WDSAjaxObject.callBackMethod(WDSAjaxObject.callBackContext);}}}
WDSAjax.prototype.setCallBackMethod=function(callBackMethod){this.callBackMethod=callBackMethod;}
WDSAjax.prototype.setCallBackContext=function(callBackContext){this.callBackContext=callBackContext;}
WDSAjax.prototype.abort=function(){this.requestObject.abort();}
function WDSXmlHttpRequest(callBackMethod){var self=this;this.callBackContext=this;this.callBackMethod=callBackMethod;if(navigator.appName=="Microsoft Internet Explorer"){this.xmlHttpRequest=new ActiveXObject("Microsoft.XMLHTTP");}else{this.xmlHttpRequest=new XMLHttpRequest();}
this.xmlHttpRequest.onreadystatechange=function(){if(self.callBackMethod!=null&&self.xmlHttpRequest.readyState==4&&(self.xmlHttpRequest.status==0||self.xmlHttpRequest.status==200)){self.callBackMethod(self.callBackContext);}}}
WDSXmlHttpRequest.prototype.sendRequest=function(action,method,async,param){var doAsync=true;if(async!=null){doAsync=async;}
if(!method){method="post";}
if(method.toLowerCase()=="get"){var firstChar=(action.indexOf("?")==-1)?"?":"&";action+=firstChar+param;}
try{this.xmlHttpRequest.open(method,action,doAsync);this.xmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");this.xmlHttpRequest.send(param);return true;}catch(ex){window.WDSXmlHttpRequestException=ex;return false;}}
WDSXmlHttpRequest.prototype.setCallBackMethod=function(callBackMethod){this.callBackMethod=callBackMethod;}
WDSXmlHttpRequest.prototype.setCallBackContext=function(callBackContext){this.callBackContext=callBackContext;}