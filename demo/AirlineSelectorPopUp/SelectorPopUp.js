function SelectorPopUp() {
	this.targetedForm=null;
	this.targetedTag=null;
	this.targetedTagLbl=null;
	this.openerConverterForm=null;
	this.openerMethodToLaunch=null;
	this.parentPage=null;
	this.parentCurrencyInput=null;
	this.alphabetArray=null;
	this.itemDisplayedNames=new Array();
	this.itemCodes=new Array();
	this.check=SelectorPopUp_check;
	this.update=SelectorPopUp_update;
	this.pageOnLoad=SelectorPopUp_pageOnLoad;
	this.init=SelectorPopUp_init;
	this.focus=SelectorPopUp_focus;
	this.getItemsWithIdenticalFirstLetter=SelectorPopUp_getItemsWithIdenticalFirstLetter;
	this.getItemDisplayedCell=SelectorPopUp_getItemDisplayedCell;
	this.generateAllItems=SelectorPopUp_generateAllItems;
	this.writeAllItemsNames=SelectorPopUp_writeAllItemsNames;
}
var SelectorPopUp=new SelectorPopUp();
function SelectorPopUp_check() {
	var valueTosubmit=WDSCommon.getTagValue(this.targetedForm,this.targetedTag);
	WDSCommon.updateTag(this.openerConverterForm,this.targetedTag,valueTosubmit);
	this.openerConverterForm.submit();
	self.close();
}
function SelectorPopUp_update(value,id) {
	window.returnValue=value;
	//alert(window.returnValue);
	window.close();
	
	/*WDSCommon.updateTag(this.targetedForm,this.targetedTag,value);
	if(this.targetedTagLbl!=null&&this.targetedTagLbl!='') {
		var lbl="";
		if(this.alphabetArray!=null) {
			lbl=this.itemDisplayedNames[id[0]][id[1]];
		}else {
			var lastSpace=this.itemDisplayedNames[i].lastIndexOf(' ');
			lbl=this.itemDisplayedNames[i].substr(0,lastSpace-4);
		}
		WDSCommon.updateTag(this.targetedForm,this.targetedTagLbl,lbl);
	}
	if(this.openerConverterForm==null) {
		if(this.openerMethodToLaunch!=null&&this.openerMethodToLaunch!='') {
			eval(this.openerMethodToLaunch);
			window.setTimeout('self.close()',200);
		}else {
			self.close();
		}
	}*/
}
function SelectorPopUp_pageOnLoad() {
	this.init();
}
function SelectorPopUp_getItemsWithIdenticalFirstLetter(letterIndex) {
	var htmlLine="";
	for(i=0;i==0||i<this.itemDisplayedNames[letterIndex].length-1;i++) {
		htmlLine+="<tr>";
		if(i==0) {
			htmlLine+='<td width="20" class="textBold"><a name="'+this.alphabetArray[letterIndex]+'" id="'+this.alphabetArray[letterIndex]+'"></a>'+this.alphabetArray[letterIndex]+'</td>';
		}else {
			htmlLine+='<td class="textBold">&nbsp;</td>';
		}
		htmlLine+=this.getItemDisplayedCell(letterIndex,i);
		htmlLine+="<td></td></tr>";
	}
	return htmlLine;
}
function SelectorPopUp_getItemDisplayedCell(letterIndex,itemIndex) {
	var itemCode=this.itemCodes[letterIndex][itemIndex];
	var htmlCell='<td><a target="_self" href="javascript:SelectorPopUp.update(\''+itemCode+'\',[\''+letterIndex+'\','+itemIndex+'])">';
	htmlCell+=this.itemDisplayedNames[letterIndex][itemIndex];
	htmlCell+='</a></td>';
	return htmlCell;
}
function SelectorPopUp_generateAllItems() {
	for(j=0;j<this.alphabetArray.length-1;j++) {
		document.writeln(this.getItemsWithIdenticalFirstLetter(j));
		document.writeln('<tr><td class="textBold">&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>');
	}
}
function SelectorPopUp_writeAllItemsNames() {
	for(i=0;i==0||i<this.itemDisplayedNames.length-1;i++) {
		var lastSpace=this.itemDisplayedNames[i].lastIndexOf(' ');
		var itemCode=this.itemDisplayedNames[i].substr(lastSpace+1);
		var itemName=this.itemDisplayedNames[i].substr(0,lastSpace-4);
		var htmlLine='<tr><td class="textBold">&nbsp;</td><td><a target="_self" href="javascript:SelectorPopUp.update(\''+itemCode+'\','+i+')">';
		htmlLine+=itemName+'('+itemCode+')';
		htmlLine+="</a></td><td></td></tr>";
		document.writeln(htmlLine);
	}
}
function SelectorPopUp_AriaUpdate(value,id) {
	var currencyInput=$(this.parentCurrencyInput,{
		_section:'currencyChoice'
	});
	if(currencyInput!=null) {
		currencyInput.setValue(value);
	}
	if(this.parentPage!=null&&this.parentPage.currencyDialog!=null) {
		this.parentPage.currencyDialog.hide();
	}
}
function SelectorPopUp_focus(letter) {
	var letterNode=$(letter);
	if(letterNode!=undefined) {
		var top=letterNode.offsetParent.offsetTop;
		$('itemScroller').scrollTop=top;
	}
}