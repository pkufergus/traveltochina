
function WDSObjectError_modifySrcElement(){if(this.object){var errorImg=null;var parent=getFirstAncestorByClassName(this.object);if(parent!=null){if(parent.className&&parent.className!=""){parent.className+=" ErrorBgrd";}
else{parent.className="ErrorBgrd";}
errorImg=document.getElementById("WDSErrorImg"+parent.id);}
if(!errorImg&&this.object.id){errorImg=document.getElementById("WDSErrorImg"+this.object.id);}
if(errorImg){errorImg.style.display="";}}}
function WDSObjectError_initSrcElement(){if(this.object){var errorImg=null;var parent=getFirstAncestorByClassName(this.object);if(parent!=null){parent.className=parent.className.replace(/( *)ErrorBgrd/,"");errorImg=document.getElementById("WDSErrorImg"+parent.id);}
if(!errorImg&&this.object.id){errorImg=document.getElementById("WDSErrorImg"+this.object.id);}
if(errorImg){errorImg.style.display="none";}}}
function getFirstAncestorByClassName(target){var parent=target;var strTagName;var objectId=null;if(target.id){objectId=target.id;}
while(parent=parent.parentNode){if(parent.tagName){strTagName=parent.tagName;if(('TR'==strTagName.toUpperCase())||('TABLE'==strTagName.toUpperCase())||('TD'==strTagName.toUpperCase())){if(parent.id){if(parent.id.length>0){if((objectId&&parent.id.indexOf(objectId)!=-1)||!objectId){return parent;}}}}
if(parent.id&&parent.id.length>0&&objectId&&parent.id.indexOf(objectId)!=-1){return parent;}}}
return null;}
function WDSObjectError_getInnerHTML(){if(!this.isInPanel){return"";}
var html="";if(this.message!=" "){html="<li class='WDSError"+this.type+"'>";if((this.object!=null)&&(WDSError.linkObject)&&!WDSError.popup&&!((this.object.type=="hidden")||(this.object.style&&this.object.style.display=="none"))){if(this.object.id){var event="";if(typeof c!="undefined"){c.require("aria.EventCommunicationBus");if(this.object.paxId!=null){event="a.ecb.fire('WDSErrorMessageClicked', ['"+this.object.id+"','"+this.object.paxId+"']);";}else{event="a.ecb.fire('WDSErrorMessageClicked', '"+this.object.id+"');";}}
html+="<a href=\"javascript:"+event+"document.getElementById('"+this.object.id+"').focus();\">";}else{html+="<a href=\""+this.anchor+"\">";}
html+=this.message;html+="</a>";}else{html+=this.message;}
html+="</li>";}
return html;}