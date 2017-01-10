<?php 
$from = "San Francisco";
$setfrom = false;
$setto = false;
try { 
	if(!empty($_REQUEST["from"]))
	{
		$from = $_REQUEST["from"];
		$setfrom = true;
	}
}catch (Exception $e) {}
$to = "Beijing";
try { 
	if(!empty($_REQUEST["to"]))
	{
		$to = $_REQUEST["to"];
		$setto = true;
	}
}catch (Exception $e) {}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" lang="zh" xml:lang="zh" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- PTR03048448 -->
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <link rel="stylesheet" type="text/css" href="./css/main.css" />
    <link rel="stylesheet" type="text/css" href="./css/ADVS.css" />
    <link rel="stylesheet" type="text/css" href="./css/pltg.css" />
    <link rel="stylesheet" type="text/css" href="./css/style_print.css" media="print" />

    <script src="./aiejs/WDSCore.js"
        language="JavaScript" type="text/javascript"></script>

    <script src="./aiejs/PLTGWDSDefinitions.js"
        language="JavaScript" type="text/javascript"></script>

    <script src="./aiejs/json.js"
        language="JavaScript" type="text/javascript"></script>

    <script language="JavaScript" type="text/JavaScript">
    
    

<!--




function getTop(MyObject) {
if (MyObject.offsetParent) return (MyObject.offsetTop + getTop(MyObject.offsetParent));
else return (MyObject.offsetTop);
}
function getLeft(MyObject) {
if (MyObject.offsetParent) return (MyObject.offsetLeft + getLeft(MyObject.offsetParent));
else return (MyObject.offsetLeft);
}
function ShowTipsPassengers() {
// Change the size of the iFrame tips on Opera navigator
var iFrame=document.getElementById("popup2iFrame");
var popup1Cmp=document.getElementById("popup1");
var popup2Cmp=document.getElementById("popup2");
// We need to put the tip over every elements of the page.
if(popup1Cmp.parentNode.tagName.toLowerCase()!="body") {
popup1Cmp.parentNode.removeChild(popup1Cmp);
document.body.appendChild(popup1Cmp);
}
if(popup2Cmp.parentNode.tagName.toLowerCase()!="body") {
popup2Cmp.parentNode.removeChild(popup2Cmp);
document.body.appendChild(popup2Cmp);
}
if (navigator.userAgent.toLowerCase().indexOf('opera') != -1) {
iFrame.style.width="0px";
iFrame.style.height="0px";
} else {
var sX=popup1Cmp.offsetWidth+"px";
var sY=popup1Cmp.offsetHeight+"px";
iFrame.style.width=sX;
iFrame.style.height=sY;
popup2Cmp.style.width=sX;
popup2Cmp.style.height=sY;
}
// Move the position of the tips
var iCmp = document.getElementById("lnkTraInfo");
var pY = getTop(iCmp) + 15;
var pX = getLeft(iCmp) + 15;
popup1Cmp.style.top=pY+"px";
popup1Cmp.style.left=pX+"px";
popup2Cmp.style.top=pY+"px";
popup2Cmp.style.left=pX+"px";
// Force the size of the iframe and div to 0 in case IE < 5.1
var navig = navigator.userAgent.toLowerCase();
var msie50x = navig.indexOf("msie 5.0");
if (msie50x != -1) {
popup2Cmp.style.width=0;
popup2Cmp.style.height=0;
iFrame.style.height=0;
iFrame.style.width=0;
}
MM_showHideLayers('popup2','','show','popup1','','show');
}
function HideTipsPassengers() {
var iFrame=document.getElementById("popup2iFrame");
iFrame.style.width="0px";
iFrame.style.height="0px";
MM_showHideLayers('popup2','','hide','popup1','','hide');
}

function Add7Days (bDateList,eDateList,eAnyTime) {
var expr = "eDateList.setDateTimeComposedString(eDateList.grpStart,\"";
eval("var prevDate = bDateList.getDateTimeComposed(bDateList.grpStart);");
var prevDateTime = prevDate.getTime();   // Time of prevDate (milliseconds since 1970)
prevDate.setTime(prevDateTime+(7 * 24 * 60 * 60 * 1000));   // 7 days in milliseconds
// Convert date to String
var prevDateString = "";
var prevDateYear = prevDate.getYear();
var prevDateMonth = prevDate.getMonth() + 1;
var prevDateDay = prevDate.getDate();
var prevDateHours = prevDate.getHours();
var prevDateMinutes = prevDate.getMinutes();
var prevDateSeconds = prevDate.getSeconds();
if (prevDateYear < 1000) prevDateYear+=1900;
prevDateString += prevDateYear;
if (prevDateMonth<10) prevDateString += "0";
prevDateString += prevDateMonth;
if (prevDateDay<10) prevDateString += "0";
prevDateString += prevDateDay;
if (prevDateHours<10) prevDateString += "0";
prevDateString += prevDateHours;
if (prevDateMinutes<10) prevDateString += "0";
prevDateString += prevDateMinutes;
if (prevDateSeconds<10) prevDateString += "0";
prevDateString += prevDateSeconds;
expr += prevDateString;
expr += "\",eAnyTime);";
eval(expr);
}

function Add7DaysToAllNextSegments (currentSegment,notAChange) {
if(notAChange==null) {
hasBeenModifiedByUser[currentSegment] = true;
}
for(segmentIndex=currentSegment;segmentIndex<ADVS.complexNbSteps;segmentIndex++) {
if (! hasBeenModifiedByUser[segmentIndex+1]) {
var exprSegment = "Add7Days(DateList"+(segmentIndex)+"Cpx,DateList"+(segmentIndex+1)+"Cpx,\"TRUE\");";
eval(exprSegment);
}
}
}

// One Way / Round Trip
function LocationsInitOR () {
if (ADVS.LocationORNotInitialized) {
// Init B_Location and E_Location smartdropdown and fields with old value in case of back navigator
var B_LOC = "";
var E_LOC = "";
var backBLoc = document.getElementById("backB_LOCATION_1").value;
var backELoc = document.getElementById("backE_LOCATION_1").value;
if (backBLoc != "") {
B_LOC = backBLoc;
E_LOC = backELoc;

document.ADVSForm.B_LOCATION_1.value=backBLoc;
document.ADVSForm.E_LOCATION_1.value=backELoc;

}
else {





}

ADVS.LocationORNotInitialized = false;
}
}

// Complex Itinerary
function LocationsInitM () {
if (ADVS.LocationMNotInitialized) {
var numbOfStep = 3;


// Init B_Location and E_Location fields with old value in case of back navigator

for(var i=1;i<numbOfStep;i++) {
eval("var backBLoc = document.getElementById('backB_LOCATION_"+i+"_Cpx').value;");
eval("var backELoc = document.getElementById('backE_LOCATION_"+i+"_Cpx').value;");
if (backBLoc != "") {
eval("document.getElementById('B_LOCATION_"+i+"_Cpx').value = backBLoc;");
eval("document.getElementById('E_LOCATION_"+i+"_Cpx').value = backELoc;");
}
}


ADVS.LocationMNotInitialized = false;
}
}
















// Set the flexible by dropdown list
function FlexibleByInitO () {
if (ADVS.FlexibleByONotInitialized) {
var dateRange1 = document.ADVSForm.DATE_RANGE_VALUE_1;
if (dateRange1 && dateRange1.tagName.toLowerCase()=="select") {

// In case of back browser, we init with the old value
var backDateRangeValue1 = document.getElementById("backDATE_RANGE_VALUE_1");
if(backDateRangeValue1 && backDateRangeValue1.value != "") {
for(i=0;i<dateRange1.options.length;i++) {
dateRange1.options[i].selected = false;
if(dateRange1.options[i].value == backDateRangeValue1.value) {
dateRange1.selectedIndex = i;
}
}
dateRange1.options[dateRange1.selectedIndex].selected=true;
//ADVS.showTimeSelection(document.ADVSForm.DATE_RANGE_VALUE_1,1);
}

//ADVS.showTimeSelection(document.ADVSForm.FLEXIBLE_CHK_1,1);
}
ADVS.FlexibleByONotInitialized = false;
}
}

// Set the flexible by dropdown list
function FlexibleByInitR () {
if (ADVS.FlexibleByRNotInitialized) {

var dateRange2 = document.ADVSForm.DATE_RANGE_VALUE_2;
if (dateRange2 && dateRange2.tagName.toLowerCase()=="select") {

// In case of back browser, we init with the old value
var backDateRangeValue2 = document.getElementById("backDATE_RANGE_VALUE_2");
if(backDateRangeValue2 && backDateRangeValue2.value != "") {
for(i=0;i<dateRange2.options.length;i++) {
dateRange2.options[i].selected=false;
if(dateRange2.options[i].value == backDateRangeValue2.value) {
dateRange2.selectedIndex = i;
}
}
dateRange2.options[dateRange2.selectedIndex].selected=true;
//ADVS.showTimeSelection(document.ADVSForm.DATE_RANGE_VALUE_2,2);
}

//ADVS.showTimeSelection(document.ADVSForm.FLEXIBLE_CHK_2,2);


}
ADVS.FlexibleByRNotInitialized = false;
}
}

// Set the flexible by dropdown list
function FlexibleByInitM () {
if(ADVS.FlexibleByMNotInitialized) {


var dateRangeCpx = document.ADVSForm.DATE_RANGE_VALUE_Cpx;
// Flexible with dropdown
if (dateRangeCpx && dateRangeCpx.tagName.toLowerCase()=="select") {
// In case of back browser, we init with the old value
var backDateRangeCpx = document.getElementById("backDATE_RANGE_VALUE_Cpx");
if(backDateRangeCpx && backDateRangeCpx.value != "") {
dateRangeCpx.selectedIndex = 0;
for(i=0;i<dateRangeCpx.options.length;i++) {
dateRangeCpx.options[i].selected=false;
if(dateRangeCpx.options[i].value == backDateRangeCpx.value) {
dateRangeCpx.selectedIndex = i;
}
}
dateRangeCpx.options[dateRangeCpx.selectedIndex].selected=true;
//ADVS.showComplexTimeSelection(document.ADVSForm.DATE_RANGE_VALUE_Cpx);
}
}

// Flexible with radio buttons
var dateRangeCpx = document.ADVSForm.FLEXIBLE_RADIO_Cpx;
if (dateRangeCpx && dateRangeCpx.length==2 &&
dateRangeCpx[0].type=="radio" && dateRangeCpx[1].type=="radio") {
var backDateRangeCpx = document.getElementById("backFLEXIBLE_RADIO_Cpx");
if(backDateRangeCpx && backDateRangeCpx.value != "") {
if(backDateRangeCpx.value > 0) {
document.getElementById("FLEXIBLE_RADIO_Cpx1").checked = true;
}
else {
document.getElementById("FLEXIBLE_RADIO_Cpx0").checked = true;
}
//ADVS.showComplexTimeSelection(document.ADVSForm.FLEXIBLE_RADIO_Cpx);
}
}



ADVS.FlexibleByMNotInitialized = false;
}
}

// Set the commercial fare family dropdown list
function CommercialFFInit () {
if (ADVS.CommercialFFRNotInitialized) {
var commercialFF;
var indexToSelect;




commercialFF = document.ADVSForm.COMMERCIAL_FARE_FAMILY_1;
if (commercialFF) {
indexToSelect = -1;
for(i=0;i<commercialFF.options.length;i++) {
commercialFF.options[i].selected=false;
if (commercialFF.options[i].value == "" ) {
indexToSelect = i;
}
}
if (indexToSelect != -1) {
commercialFF.options[indexToSelect].selected=true;
commercialFF.selectedIndex = indexToSelect;
}
else if(commercialFF.options.length>0) {

commercialFF.options[0].selected=true;
commercialFF.selectedIndex = 0;
}
}

ADVS.CommercialFFRNotInitialized = false;
}
}
var SelectTab = 'R';
function selectOTab() {
SelectTab = 'O';

// Set components
FlexibleByInitO();
LocationsInitOR();
// CR 1324561
//  CommercialFFInit();
ADVS.applyTripTypeToCFF('O');
//END OF CR 1324561
// Display Tab components
ADVS.showTripTypeForm('O');


IFrameReSize('iframepage');IFrameReSizeWidth('iframepage');
}
function selectRTab() {
SelectTab = 'R';
// Set components
FlexibleByInitO();
FlexibleByInitR();
LocationsInitOR();

// CR 1324561
//CommercialFFInit();
ADVS.applyTripTypeToCFF('R');
//END OF CR 1324561

// Display Tab components
ADVS.showTripTypeForm('R');

IFrameReSize('iframepage');IFrameReSizeWidth('iframepage');
}

function selectMTab() {
SelectTab = 'M';
// Display Tab components
ADVS.showTripTypeForm('M');
// Set components
FlexibleByInitM();
LocationsInitM();
ADVS.applyTripTypeToCFF('M');
ADVS.complexUpdateDates();

var from_b = document.getElementById("From_B_LOCATION_1").value;
var form_e = document.getElementById("From_E_LOCATION_1").value
document.getElementById("From_B_LOCATION_1_Cpx").value = document.getElementById("From_B_LOCATION_1").value;
document.getElementById("From_E_LOCATION_1_Cpx").value = document.getElementById("From_E_LOCATION_1").value;
if(from_b =="Others")
{
	document.getElementById("Table2_B_LOCATION_1_Cpx").style.display="none";
	document.getElementById("Table_B_LOCATION_1_Cpx" ).style.display="";
	document.getElementById("From_B_LOCATION_1_Cpx").value = "";
}
else
{
	document.getElementById("B_LOCATION_1_Cpx").value = document.getElementById("B_LOCATION_1").value;
}
if(form_e =="Others")
{
	document.getElementById("Table2_E_LOCATION_1_Cpx").style.display="none";
	document.getElementById("Table_E_LOCATION_1_Cpx" ).style.display="";
	document.getElementById("From_E_LOCATION_1_Cpx").value = "";
}
else
{
	document.getElementById("E_LOCATION_1_Cpx").value = document.getElementById("E_LOCATION_1").value;
}
IFrameReSize('iframepage');IFrameReSizeWidth('iframepage');
}
function IFrameReSize(iframename) {
    var pTar = parent.document.getElementById(iframename);
    if (pTar) {//ff
        if (pTar.contentDocument && pTar.contentDocument.body.offsetHeight) {
            pTar.height = pTar.contentDocument.body.offsetHeight-12;
        }else if(pTar.Document && pTar.Document.body.scrollHeight)
        {//ie
            pTar.height = pTar.Document.body.scrollHeight-12;
        }
    }
}
function IFrameReSizeWidth(iframename) {
    var pTar = parent.document.getElementById(iframename);
    if (pTar){//ff
        if (pTar.contentDocument && pTar.contentDocument.body.offsetWidth) {
            pTar.width = pTar.contentDocument.body.offsetWidth;
        }
        else if (pTar.Document && pTar.Document.body.scrollWidth) {//ie
            pTar.width = pTar.Document.body.scrollWidth;
        }
    }
}
/*
function: initEnabledItineraries
This function init the enable trip types for each activated flow
*/
function ADVS_initEnabledItineraries() {
if(this.enabledItineraries == 0) {
this.isRadioFlowTypeDisplayed = true;
this.enabledItineraries = eval('({"O":["SD","MP"],"M":["SD","MP"],"R":["SD","MP"]})');
}
return;
}

/*
function: initFareTypeList
This function init the possible values ot cabin
which will depend of the searchFlow.
In fact for searchFlow MP, the cabin list is restricted to E,B,F
*/
function ADVS_initFareTypeList() {
if(this.fareTypeLists == '0') {
this.fareTypeLists = eval('({"indexLists":{"MP":"0","SD":"0"},"cabinLists":{"0":[["F","头等舱"],["B","商务舱"],["E","经济舱"]]}})');
this.previousFareTypeListIndex = this.fareTypeLists.indexLists[this.searchFlow];
}
}

/*

*/

function ADVS_initCommercialFamilyList(){
if(this.commercialFamilyList =='0'){
this.commercialFamilyList = eval('({"indexLists":[],"CffLists":[]})');
}
this.complexItineraryMode = "";

this.nbFareFamilyDropDown = 1;
}

/*
function: initTimeList
This function init the possible values ot time dropdown
which will depend of the searchFlow.
In fact for searchFlow MP, we add morning, afternoon and evening
*/
function ADVS_initTimeList() {
if (this.timeListArray == '0'){
this.timeListArray = new Array();
this.timeListArrayText = new Array();
this.timeListArrayMP = new Array();
this.timeListArrayTextMP = new Array();


this.timeListArray[0]="ANY";
this.timeListArrayText[0]="任意时间";

this.timeListArray[1]="0000";
this.timeListArrayText[1]="00:00";

this.timeListArray[2]="0100";
this.timeListArrayText[2]="1:00";

this.timeListArray[3]="0200";
this.timeListArrayText[3]="2:00";

this.timeListArray[4]="0300";
this.timeListArrayText[4]="3:00";

this.timeListArray[5]="0400";
this.timeListArrayText[5]="4:00";

this.timeListArray[6]="0500";
this.timeListArrayText[6]="5:00";

this.timeListArray[7]="0600";
this.timeListArrayText[7]="6:00";

this.timeListArray[8]="0700";
this.timeListArrayText[8]="7:00";

this.timeListArray[9]="0800";
this.timeListArrayText[9]="8:00";

this.timeListArray[10]="0900";
this.timeListArrayText[10]="9:00";

this.timeListArray[11]="1000";
this.timeListArrayText[11]="10:00";

this.timeListArray[12]="1100";
this.timeListArrayText[12]="11:00";

this.timeListArray[13]="1200";
this.timeListArrayText[13]="12:00";

this.timeListArray[14]="1300";
this.timeListArrayText[14]="13:00";

this.timeListArray[15]="1400";
this.timeListArrayText[15]="14:00";

this.timeListArray[16]="1500";
this.timeListArrayText[16]="15:00";

this.timeListArray[17]="1600";
this.timeListArrayText[17]="16:00";

this.timeListArray[18]="1700";
this.timeListArrayText[18]="17:00";

this.timeListArray[19]="1800";
this.timeListArrayText[19]="18:00";

this.timeListArray[20]="1900";
this.timeListArrayText[20]="19:00";

this.timeListArray[21]="2000";
this.timeListArrayText[21]="20:00";

this.timeListArray[22]="2100";
this.timeListArrayText[22]="21:00";

this.timeListArray[23]="2200";
this.timeListArrayText[23]="22:00";

this.timeListArray[24]="2300";
this.timeListArrayText[24]="23:00";



this.timeListArrayMP[0]="ANY";
this.timeListArrayTextMP[0]="任意时间";




this.timeListArrayMP[1]="MORNING";
this.timeListArrayTextMP[1]="上午";


this.timeListArrayTextMP[1]="早上";



this.timeListArrayMP[2]="AFTERNOON";
this.timeListArrayTextMP[2]="下午";



this.timeListArrayTextMP[2]="下午";


this.timeListArrayMP[3]="EVENING";
this.timeListArrayTextMP[3]="晚上";

this.timeListArrayTextMP[3]="晚上";




this.timeListArrayMP[4]="0000";
this.timeListArrayTextMP[4]="0:00";




this.timeListArrayMP[5]="0100";
this.timeListArrayTextMP[5]="1:00";




this.timeListArrayMP[6]="0200";
this.timeListArrayTextMP[6]="2:00";




this.timeListArrayMP[7]="0300";
this.timeListArrayTextMP[7]="3:00";




this.timeListArrayMP[8]="0400";
this.timeListArrayTextMP[8]="4:00";




this.timeListArrayMP[9]="0500";
this.timeListArrayTextMP[9]="5:00";




this.timeListArrayMP[10]="0600";
this.timeListArrayTextMP[10]="6:00";




this.timeListArrayMP[11]="0700";
this.timeListArrayTextMP[11]="7:00";




this.timeListArrayMP[12]="0800";
this.timeListArrayTextMP[12]="8:00";




this.timeListArrayMP[13]="0900";
this.timeListArrayTextMP[13]="9:00";




this.timeListArrayMP[14]="1000";
this.timeListArrayTextMP[14]="10:00";




this.timeListArrayMP[15]="1100";
this.timeListArrayTextMP[15]="11:00";




this.timeListArrayMP[16]="1200";
this.timeListArrayTextMP[16]="12:00";




this.timeListArrayMP[17]="1300";
this.timeListArrayTextMP[17]="13:00";




this.timeListArrayMP[18]="1400";
this.timeListArrayTextMP[18]="14:00";




this.timeListArrayMP[19]="1500";
this.timeListArrayTextMP[19]="15:00";




this.timeListArrayMP[20]="1600";
this.timeListArrayTextMP[20]="16:00";




this.timeListArrayMP[21]="1700";
this.timeListArrayTextMP[21]="17:00";




this.timeListArrayMP[22]="1800";
this.timeListArrayTextMP[22]="18:00";




this.timeListArrayMP[23]="1900";
this.timeListArrayTextMP[23]="19:00";




this.timeListArrayMP[24]="2000";
this.timeListArrayTextMP[24]="20:00";




this.timeListArrayMP[25]="2100";
this.timeListArrayTextMP[25]="21:00";




this.timeListArrayMP[26]="2200";
this.timeListArrayTextMP[26]="22:00";




this.timeListArrayMP[27]="2300";
this.timeListArrayTextMP[27]="23:00";




}
this.applyTimeListChange(this.searchFlow);
}

/*
function: initTimeWindowEnabledFlows
This function init the possible flows on which time window is enabled
In fact for searchFlow MP, the time window can't be displayed
*/
function ADVS_initTimeWindowEnabledFlows() {
if(this.timeWindowEnabledFlows==0) {
this.timeWindowEnabledFlows = eval('([{"searchPage":"SD","maxTimeWindow":23}])');
this.timeWindowOptionLabel = "\u5C0F\u65F6";
}
}

/*
function: initTimeComplexEnabledFlows
This function init the possible flows on which time is enabled in complex
In fact for searchFlow FP in complex, the time is not displayed when user is flexible
*/
function ADVS_initTimeComplexEnabledFlows() {
if(this.timeComplexEnabledFlows==0) {
this.timeComplexEnabledFlows = eval('([{"searchPage":"MP"},{"searchPage":"SD"}])');
}
}

function ADVS_initSearchDateSelectionPanelsLineUp() {
if(this.searchDateSelectionPanelsLineUp == 0) {
// Instanciate a new element line up object
this.searchDateSelectionPanelsLineUp = new pui.util.ElementLineUp();
// Define elements to be bound
this.searchDateSelectionPanelsLineUp.bindElements("DateCmp1", "DateCmp2");
this.searchDateSelectionPanelsLineUp.bindElements("FlexibleByCmp1", "FlexibleByCmp2");


this.searchDateSelectionPanelsLineUp.bindElements("timeCell1", "timeCell2");

this.searchDateSelectionPanelsLineUp.bindElements("TimeWindowCmp1", "TimeWindowCmp2");


}
}

/*
function: applySearchFlow
This function is called to change the display of the search page
depending on the search flow (SD, VP, MP, FP).
It does not change the current tripType.
*/
function ADVS_applySearchFlow(searchFlow) {
if (searchFlow == this.previousSearchFlow) {
// If the searchFlow is the same, we do nothing.
return;
}
this.setSearchFlow(searchFlow);


this.applyComplexNumberOfSteps(searchFlow);


this.applyFareCabinFlexibilityAirlines(searchFlow);


this.applyTimeComplexEnabledFlows(searchFlow);



this.applyTimeWindowEnabledFlows(searchFlow);



this.applyRangeCheckbox(searchFlow);





this.applyMaxNumberOfStops(searchFlow);


this.applyTimeListChange(searchFlow);
this.applyFareTypeListChange(searchFlow);


this.passengerList.applySearchFlow(searchFlow);




this.previousSearchFlow = searchFlow;
}
/*
This function fills the commercial fare family drop and selects the default one
*/

function ADVS_applyTripTypeToCFF(nextTripType){
var commercialFF;
var commercialFFListIndex;
if((this.tripType =='R' && nextTripType =='O') || (this.tripType =='O' && nextTripType =='R')){
return;
}


commercialFF = document.ADVSForm.COMMERCIAL_FARE_FAMILY_1;
if(commercialFF){
if(this.complexItineraryMode == "OJ"){
if(commercialFF && commercialFF.options.length == 0){
commercialFFListIndex = this.commercialFamilyList.indexLists['R'];
}
else{
return;
}
}
else{
if(nextTripType == 'R' || nextTripType == 'O'){
commercialFFListIndex = this.commercialFamilyList.indexLists['R'];
}
if(nextTripType == 'M'){
commercialFFListIndex = this.commercialFamilyList.indexLists['C'];
}
}
var commercialFFList = this.commercialFamilyList.cffLists[commercialFFListIndex];
commercialFF.options.length = commercialFFList.length;
for(var i=0;i<commercialFFList.length;i++){
commercialFF.options[i].value = commercialFFList[i][0];
commercialFF.options[i].text = commercialFFList[i][1];
}
}

this.selectTheDefaultCFF();
}

function ADVS_selectTheDefaultCFF(){
var fareFamilies = new Array();
var indexToSelect;
var found;//Used to select the default CFF







commercialFF = document.ADVSForm.COMMERCIAL_FARE_FAMILY_1;
backcommercialFF = document.ADVSForm.backCOMMERCIAL_FARE_FAMILY_1;
if (commercialFF) {
indexToSelect = -1;
found = -1;
if(backcommercialFF && backcommercialFF.value!=""){
commercialFF.value == backcommercialFF.value
}
else{
for(var i=0;i<commercialFF.options.length;i++){
for(var j=0; j<fareFamilies.length;j++){
if(commercialFF.options[i].value == fareFamilies[j]){
if(indexToSelect == -1 || j < found){
indexToSelect = i;
found = j;
commercialFF.options[indexToSelect].selected=true;
commercialFF.selectIndex = indexToSelect;
}
}
}
}
if((indexToSelect == -1) && (commercialFF.options.length > 0)){
commercialFF.options[0].selected=true;
commercialFF.selectIndex = 0;
}
}
}


}

function ADVS_setComplexNumberOfSteps(searchFlow) {
var nbStepsForSD = 6;
var nbStepsForVP = 6;
var nbStepsForFP = 2;
var nbStepsForMP = 3;

switch(searchFlow) {
case "SD":
this.complexNbSteps = nbStepsForSD;
break;
case "MP":
this.complexNbSteps = nbStepsForMP;
break;
case "FP":
this.complexNbSteps = nbStepsForFP;
break;
case "VP":
this.complexNbSteps = nbStepsForVP;
break;
}
}

/*
function: applyComplexNumberOfSteps
This function display the number of steps in the complex flow
depending of the searchFlow.
The minimum is 2.
The possible searchFlow are:
- SD
- MP
- FP
- VP
*/
function ADVS_applyComplexNumberOfSteps(searchFlow) {
var oldNumberOfSteps = this.complexNbSteps;
this.setComplexNumberOfSteps(searchFlow);

if(this.complexNbSteps == oldNumberOfSteps) {
return;
}

if(this.complexNbSteps > oldNumberOfSteps) {
// We update the dates
Add7DaysToAllNextSegments(oldNumberOfSteps,true);
}

var visible = ["visible","block"];
var hidden = ["hidden","none"];

var divComplexStep_3 = visible;
var divComplexStep_4 = visible;
var divComplexStep_5 = visible;
var divComplexStep_6 = visible;

if(this.complexNbSteps <= 5) { divComplexStep_6 = hidden; }
if(this.complexNbSteps <= 4) { divComplexStep_5 = hidden; }
if(this.complexNbSteps <= 3) { divComplexStep_4 = hidden; }
if(this.complexNbSteps <= 2) { divComplexStep_3 = hidden; }

applyStyle("divComplexStep_3",divComplexStep_3[0],divComplexStep_3[1]);
applyStyle("divComplexStep_4",divComplexStep_4[0],divComplexStep_4[1]);
applyStyle("divComplexStep_5",divComplexStep_5[0],divComplexStep_5[1]);
applyStyle("divComplexStep_6",divComplexStep_6[0],divComplexStep_6[1]);

return;
}

/*
function: showHideFlexibleBy
This function display or not the days flexible by dropdown.

params:
- isVisible : boolean;
*/
function ADVS_showHideFlexibleBy(isVisible) {
var visible = ["visible","inline"];
var hidden = ["hidden","none"];

var visibility = hidden;
if(isVisible) {
visibility = visible;
// We need to update the elementLineUp of searchDateSelection.
if((this.tripType == "R" || this.tripType == "O") && this.searchDateSelectionPanelsLineUp!=0) {
this.applySearchDateSelectionPanelsLineUp();
}
}

applyStyle("FlexibleByCmp1",visibility[0],visibility[1]);       // Flexibility Begin
applyStyle("FlexibleByCmp2",visibility[0],visibility[1]);       // Flexibility End



if(isVisible) {
applyStyle("FlexibleByComplexForAll",visibility[0],"");     // Flexibility Cpx
}
else {
applyStyle("FlexibleByComplexForAll",visibility[0],visibility[1]);     // Flexibility Cpx
}












}





/*
function: applyTimeWindowEnabledFlows
This function display or not all the time window dropdown depending on the flow and
the time dropdown value corresponding.
In fact for searchFlow MP, the time window can't be displayed
*/
function ADVS_applyTimeWindowEnabledFlows(searchFlow) {
this.applyTimeWindow("1",searchFlow);
this.applyTimeWindow("2",searchFlow);


for(var i = 1 ; i < 7 ; i++) {
this.applyTimeWindow(i+"Cpx",searchFlow);
}

}

/*
function: applyTimeComplexEnabledFlows
This function display or not all the time selectors depending on the flow and
In fact for searchFlow FP in complex, the time selector is not displayed if user is flexible
*/
function ADVS_applyTimeComplexEnabledFlows(searchFlow)
{

for(var i = 1 ; i < 7 ; i++) {
this.applyTimeComplex(i+"Cpx",searchFlow);
}

}


/*
function: applyRangeCheckbox
This function display or not the search range checkboxes.

params:
- searchFlow : the search flow (SD, VP, FP, MP)
*/
function ADVS_applyRangeCheckbox(searchFlow) {
if (searchFlow != "MP" ) {
// SD or VP or FP => hide range checkboxes
applyStyle("SearchRangeDepartureRow_1","hidden","none");       // Range check box for departure
applyStyle("SearchRangeArrivalRow_1","hidden","none");         // Range check box for arrival

for(var i=1;i<7;i++) {
applyStyle("SearchRangeDepartureRow_"+i+"_Cpx","hidden","none");       // Range check box for departure
applyStyle("SearchRangeArrivalRow_"+i+"_Cpx","hidden","none");         // Range check box for arrival
}
} else {
// MP => Show range checkboxes
applyStyle("SearchRangeDepartureRow_1","visible","");     // Range check box for departure
applyStyle("SearchRangeArrivalRow_1","visible","");       // Range check box for arrival

for(var i=1;i<7;i++) {
applyStyle("SearchRangeDepartureRow_"+i+"_Cpx","visible","");
applyStyle("SearchRangeArrivalRow_"+i+"_Cpx","visible","");
}
}
return;
}

/*
function: applyMaxNumberOfStops
This function display or not the max number of stops dropdown.

params:
- searchFlow : the search flow (SD, VP, FP, MP)
*/
function ADVS_applyMaxNumberOfStops(searchFlow) {
if (searchFlow != "MP" ) {
//hide-show number of connection
applyStyle("divMaxNumberOfStop","hidden","none");
} else {
applyStyle("divMaxNumberOfStop","visible","block");
}
return;
}

/*
function: applyDirectFlight
This function display or not the direct flights only checkbox.

params:
- searchFlow : the search flow (SD, VP, FP, MP)
*/
function ADVS_applyDirectFlight(searchFlow) {
if (searchFlow != "MP" ) {
//hide-show direct flight
applyStyle("divDirectFlight","visible","block");
} else {
applyStyle("divDirectFlight","hidden","none");
}
return;
}

/*
function: applySearchDateSelectionPanelsLineUp
This function apply the search date selection panel line up correctly.
*/
function ADVS_applySearchDateSelectionPanelsLineUp() {
if(this.tripType != "M") {
var cmp1 = DOM.getElementById("FlexibleByCmp1");
var cmp2 = DOM.getElementById("FlexibleByCmp2");
var cmp1Displayed = true;
var cmp2Displayed = true;
if(cmp1) {
cmp1Displayed = (cmp1.style.display != "none");
}
if(cmp2) {
cmp2Displayed = (cmp2.style.display != "none");
}
if(!cmp1Displayed) {
cmp1.style.visibility = "hidden";
cmp1.style.display = "inline";
}
if(!cmp2Displayed) {
cmp2.style.visibility = "hidden";
cmp2.style.display = "inline";
}
this.searchDateSelectionPanelsLineUp.apply();
if(!cmp1Displayed) {
cmp1.style.display = "none";
}
if(!cmp2Displayed) {
cmp2.style.display = "none";
}
}
}

function ADVS_pageOnLoad () {
this.tripType="R";
this.searchFlow = "MP";
this.isRedemptionEnable = false;
this.includeProfileFields = false;
this.complexNbSteps = 3;
this.logoffUrl = 'http://www.e-traveltochina.com/chinese.htm'.replace("&amp;", "&");

LocalErrorInit();
this.passengerList = new search.PassengerList(document.ADVSForm);

// Search requested
this.isMasterPricerSearch = true;
this.isWebfaresSearch = false;
this.isWebSearchButton = false;

// The OF flow has to be treated as a FP flow.
if(this.searchFlow == "OF") {
this.searchFlow = "FP";
}

// In case of back browser
var backPricingType = DOM.getElementById("backPricingType");
if(backPricingType && backPricingType.value!=""){
this.searchFlow = backPricingType.value;
}

var backTripType = DOM.getElementById("backTRIP_TYPE");
if(backTripType && backTripType.value != "") {
this.tripType = backTripType.value;
}


this.initFareTypeList();

this.initCommercialFamilyList();

this.selectTheDefaultCFF();

this.initTimeList();

this.initEnabledItineraries();

this.initTimeWindowEnabledFlows();

this.initTimeComplexEnabledFlows();

// In case of back, display the correct tab
var backPricingType = DOM.getElementById("backPricingType");
if(backPricingType && backPricingType.value!=""){
this.applySearchFlow(backPricingType.value);
}
else {
// Already done in applySearchFlow so if not called we just call the setComplexNumberOfSteps
this.setComplexNumberOfSteps(this.searchFlow);
}

var backTripType = DOM.getElementById("backTRIP_TYPE").value;
if(backTripType != "") {
// A back browser
eval("select"+backTripType+"Tab();");
} else {
eval("select"+this.tripType+"Tab();");
// Not a back browser
// this method to display the BE error has not to be called in case
// of back browser as if there is a back browser, this means that
// there is no more BE error since the user does a back on the avail
// page. And as the browser keeps the BE error which is set in jstl
// this method has to be called only if this is not a back !
initWDSErrorBE();
}
ADVS.showTripTypeForm(ADVS.tripType,ADVS.searchFlow);


this.initSearchDateSelectionPanelsLineUp();


// Apply the binding
this.applySearchDateSelectionPanelsLineUp();
/* ! IMPORTANT
* If the content of the elements does change dynamically on the page, call the apply method like this: aligner.apply(true)
*/





if(this.includeProfileFields) {
this.logoff();
}




}
//-->
</script>

    <script src="./aiejs/script.js"
        language="JavaScript" type="text/javascript"></script>

    <script src="./aiejs/ExtraInfoPopUp.js"
        language="JavaScript" type="text/javascript"></script>

    <script src="./aiejs/helpPopUp.js"
        language="JavaScript" type="text/javascript"></script>

    <script src="./aiejs/DateList.js"
        language="JavaScript" type="text/javascript"></script>

    <script src="./aiejs/DOM.js"
        language="JavaScript" type="text/javascript"></script>

    <script src="./aiejs/ElementLineUp.js"
        language="JavaScript" type="text/javascript"></script>

    <script src="./aiejs/PassengerList.js"
        language="JavaScript" type="text/javascript"></script>

    <script src="./aiejs/SmartDropdown.js"
        language="JavaScript" type="text/javascript"></script>

    <script type="text/javascript" src="js/jquery-1.4.2.js"></script>

    <script type="text/javascript" src="js/etravel.js"></script>

    <script type="text/javascript" src="js/ADVS.js"></script>


    
    <script type='text/javascript' src='./autocomplete/js/jquery.autocomplete.js'></script>
    <link rel="stylesheet" type="text/css" href="./autocomplete/css/jquery.autocomplete.css" />


    <script language="javascript" type="text/javascript">
<!--

        var LOCK_CHECK_ENTER = false;

        Netscape = (navigator.appName.substring(0, 3) == "Net");
        function checkEnter(event) {
            var code = 0;
            if (Netscape) {
                code = event.which;
            } else {
                code = window.event.keyCode;
            }
            if (code == 13) {
                var result = false;

                return result;
            }
        }
        document.onkeypress = checkEnter;
-->
</script>

    <script language="JavaScript" type="text/javascript">
        $(document).ready(function() {
            // 1. initialize calendar
            etravel.initDateLst(["一月 ", "二月 ", "三月 ", "四月 ", "五月 ", "六月 ", "七月 ", "八月 ", "九月 ", "十月 ", "十一月 ", "十二月 ", ""],
						["日", "一", "二", "三", "四", "五", "六"]);

            // 2. initialize each calendar
            $.each(etravel.calendarIds, function(idx, calGrp) {
                $.each(calGrp, function(idx, calId) {
                    this.initCalendarPannel(calId, idx == 0 ? undefined : 7);
                    $("span[id^=linkCalendar]", calId).click(function() {
                        this.datelst.grpStart = [$("select[id^=Month]", calId)[0],
								$("select[id^=Day]", calId)[0],
								$("span[id^=originDateDayOfWeek]", calId)[0],
								$("select[id^=Hours]", calId)[0]];
                        this.openCalendar(calId);
                    } .bind(this));
                } .bind(this));
            } .bind(etravel));
        });
</script>

</head>
<body onload="javascript:ADVS.pageOnLoad();; " onunload="" id="advs">
    <div id="customDHTML" style="display: none">
        <center>
            <form name="custom">
            <table border="1">
                <tbody>
                    <tr>
                        <td>
                            <b>Requested Segment information 0:</b>
                        </td>
                        <td>
                            beginLocation
                            <input type="text" name="requestBeginLocationCode_0" id="requestBeginLocationCode_0"
                                value="" />
                            <br />
                            endLocation
                            <input type="text" name="requestEndLocationCode_0" id="requestEndLocationCode_0"
                                value="" />
                            <br />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Requested Segment information 1:</b>
                        </td>
                        <td>
                            beginLocation
                            <input type="text" name="requestBeginLocationCode_1" id="requestBeginLocationCode_1"
                                value="" />
                            <br />
                            endLocation
                            <input type="text" name="requestEndLocationCode_1" id="requestEndLocationCode_1"
                                value="" />
                            <br />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Number of Traveller :
                        </td>
                        <td>
                            <input type="text" name="nbTrav" id="nbTrav" value="9" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Cabin :
                        </td>
                        <td>
                            <input type="text" name="cabin" id="cabin" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Language :
                        </td>
                        <td>
                            <input type="text" name="language" id="language" value='CN' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Office Id :
                        </td>
                        <td>
                            <input type="text" name="officeId" id="officeId" value="LGA1S38AB" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Agency information:</b>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Agency email :
                        </td>
                        <td>
                            <input type="text" name="AgencyEmail" id="AgencyEmail" value="sales@e-traveltochina.com" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Agency adress :
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            seat preference :
                        </td>
                        <td>
                            <input type="text" name="seatMapSelectionList" id="seatMapSelectionList" value="" /><br />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ext id :
                        </td>
                        <td>
                            <input type="text" name="cust_external_id" id="cust_external_id" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            templateName :
                        </td>
                        <td>
                            <input type="text" name="custom_templateName" id="custom_templateName" value="advs" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Portal Environment Variable 1:
                        </td>
                        <td>
                            <input type="text" name="pe_variable1" id="pe_variable1" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Portal Environment Variable 2:
                        </td>
                        <td>
                            <input type="text" name="pe_variable2" id="pe_variable2" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Portal Environment Variable 3:
                        </td>
                        <td>
                            <input type="text" name="pe_variable3" id="pe_variable3" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Portal Environment Variable 4:
                        </td>
                        <td>
                            <input type="text" name="pe_variable4" id="pe_variable4" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Portal Environment Variable 5:
                        </td>
                        <td>
                            <input type="text" name="pe_variable5" id="pe_variable5" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Flex Pricer Mode:
                        </td>
                        <td>
                            <input type="text" name="flex_pricer_mode" id="flex_pricer_mode" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Flex Pricer Page Type:
                        </td>
                        <td>
                            <input type="text" name="flex_pricer_page_type" id="flex_pricer_page_type" value="" />
                        </td>
                    </tr>
            </table>
            </form>
        </center>
    </div>

    <script type="text/javascript" language="javascript">
<!--
        var waitLanguage = 'CN';

        if (waitLanguage == 'GB') {
            waitLanguage = 'en';
        }
        WDSWaitingImage.setLanguage("languages/" + waitLanguage);
        WDSWaitingImage.setPrivateLabel(null);
        WDSWaitingImage.setProgressImg("progress.gif")
        WDSWaitingImage.preload("wait");
-->
</script>

    <center>
        <div id="WDSWaitingImageDivID" style="display: none; align: center;">
            <div id="divWait">
                <p id="logo">
                    <img id="WDSWaitingImageImgID" name="WDSWaitingImageName" /></p>
                <p id="title">
                    我们正在处理您的申请，请稍候...</p>
                <p id="indicator">
                    <img id="WDSProgressImageImgID" alt='我们正在处理您的申请，请稍候...' /></p>
                <p id="info">
                </p>
            </div>
        </div>
    </center>
    
    <div id="container">
        <table class="layoutTable">
            <tr>
                <td class="layoutBody">

                    <script language="javascript" type="text/javascript">
                        // init messages
                        WDSMessage.setMessage("WDSError.HeaderMessage", "请注意：");
                        WDSMessage.setMessage("WDSError.Title.E", "出现以下错误");
                        WDSMessage.setMessage("WDSError.Title.W", "出现以下警告");
                        WDSMessage.setMessage("WDSError.Title.I", "出现以下警告");
                        WDSMessage.setMessage("WDSError.Title.F", "出现以下致命错误");

                        //init local error message list


                        function LocalErrorInit() {



                            WDSMessage.setMessage(1040, "%s 是必需填写的域。请输入 %s。 (1040)");



                            WDSMessage.setMessage(1305, "请检查所输入的频繁乘客编号并重试。 (1305)");



                            WDSMessage.setMessage(5117, "可得性查询请求的最大乘客数为 9。 请修改请求乘客数并重试。 (5117)");



                            WDSMessage.setMessage(5118, "可得性查询请求的最大旅客数为 {0}。请修改您的请求并重试。 (5118)");



                            WDSMessage.setMessage(5121, "每位成人只能携带一位婴儿旅客。 (5121)");



                            WDSMessage.setMessage(5122, "儿童不能独自出行而必须由成年旅客陪伴。 (5122)");



                            WDSMessage.setMessage(5123, "请提供一个以上的旅客。 (5123)");



                            WDSMessage.setMessage(5124, "婴儿不能独自出行而必须由成人陪伴。 (5124)");



                            WDSMessage.setMessage(5125, "不能选择超过 6 种类型的乘客。请修改您的请求并重试。 (5125)");



                            WDSMessage.setMessage(5126, "您目前的旅客选择不符合要求。 婴幼儿和儿童必须有成年旅客陪伴出行。 (5126)");



                            WDSMessage.setMessage(10000, "返程日期/时间同于或早于启程日期/时间。请调整有关日期/时间并重试。 (10000)");



                            WDSMessage.setMessage(10001, "您的启程城市和到达城市相同。请修改您的请求并重试。 (10001)");



                            WDSMessage.setMessage(10004, "请提供启程城市或机场代码。 (10004)");



                            WDSMessage.setMessage(10005, "请提供到达城市或机场代码。 (10005)");



                            WDSMessage.setMessage(10015, "无法处理所选航空公司。请检查您的输入内容并重试。 (10015)");



                            WDSMessage.setMessage(10025, "请提供到达城市并重试。 (10025)");



                            WDSMessage.setMessage(10020, "请提供启程城市并重试。 (10020)");



                            WDSMessage.setMessage(10031, "所请求的启程日期太仓促。有效日期从当前^DATA(START_RANGE_NUM)直至下一个 ^DATA(END_RANGE_NUM)。请修改有关日期并重试，或与我们联系以获得进一步的信息。 (10031)");



                            WDSMessage.setMessage(10051, "婴儿不能单独旅行。如果此次旅行中带有婴儿，请选择携带此婴儿的乘客姓名旁的婴儿复选框。 (10051)");



                            WDSMessage.setMessage(30005, "必须定义航空公司。请修改您的输入内容并重试。 (30005)");

                        }

</script>

                    <div id="WDSError" style="display: none">
                        <table cellspacing="0" cellpadding="0" class="tableError">
                            <tr>
                                <td class="textBold" valign="top">
                                    <div class="ImgError">
                                        &nbsp;</div>
                                </td>
                                <td class="textNormal" width="100%">
                                    <div id="WDSErrorContainer" class="" />
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--<form name="ADVSForm" id="ADVSForm" method="post" target="_parent" action="http://wftc1.e-travel.com/plnext/AIEADBLADBL/Override.action?EMBEDDED_TRANSACTION=TravelShopperAvailability&SITE=ADBLADBL&LANGUAGE=CN" class="transparentForm">-->
                    <form name="ADVSForm" id="ADVSForm" target="_parent" method="post" action="http://wftc1.e-travel.com/plnext/AIEADBLADBL/AvailabilityFlowDispatcher.action?SITE=ADBLADBL&LANGUAGE=CN"
                    class="transparentForm">
                    <input type="hidden" name="SEVEN_DAY_SEARCH" value="TRUE" />
                    <input type="hidden" id="SEARCH_PAGE" name="SEARCH_PAGE" value="MP" />
                    <input type="hidden" id="backPricingType" name="backPricingType" />
                    <input type="hidden" name="PLTG_FROMPAGE" value="ADVS" />
                    <input type="hidden" name="TITLE" />
                    <input type="hidden" name="FIRST_NAME" />
                    <input type="hidden" name="LAST_NAME" />
                    <!--input type="hidden" name="SITE" value='ADBLADBL' />
<input type="hidden" name="LANGUAGE" value='CN' /> -->
                    <input type="hidden" name="TRIP_TYPE" value="R" />
                    <input type="hidden" id="backTRIP_TYPE" />
                    <input type="hidden" name="MAX_PAX_VALUE" value="9" />
                    <input type="hidden" name="REFRESH" value="0" />
                    <input type="hidden" name="userLoggedTravellerType" value="" />
                    <input type="hidden" name="ARRANGE_BY" value="N" />
                    <table width="100%" cellspacing="0" cellpadding="0" class="tableSearchDiv">
                        <tr>
                            <td>
                                <div id="rt">
                                    <ul id="tabnav">
                                        <li id="roundTripTab" class="t2_selected"><a id="roundTripTabLink" href="javascript:selectRTab();">
                                            往返旅行</a> </li>
                                            
                                        <li id="oneWayTab" class="t2_unselected"><a id="oneWayTabLink" href="javascript:selectOTab();">
                                            单程</a> </li>
                                        <li id="complexTab" class="t2_unselected"><a id="complexTabLink" href="javascript:selectMTab();">
                                            多目的地</a>
                                            <input type="hidden" name="COMPLEX" id="COMPLEX" />
                                        </li>
                                    </ul>
                                    <div class="divTitle" style="display:none;">
                                        航班</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table cellspacing="0" cellpadding="0" class="tableSearch">
                        <tr>
                            <td>
                                <table cellspacing="0" cellpadding="0" class="tableSearchMain">
                                    <tr>
                                        <td colspan="3">
                                            <div id="complexDataId" style="visibility: hidden; display: none; height: 1px;">
                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                    <tr style="display:none;">
                                                        <td>
                                                            <span class="textSmaller">* 如果不确定某个城市或机场的英文拼写，请输入前 3 个或更多字母并加上一个星号 (*)。&nbsp;</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="tableSearchSelect">
                                                                <div id="divComplexStep_1">
                                                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            
                                                                            <td colspan="4">&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>
                                                                                <div class="divNumbTab">
                                                                                    1</div>
                                                                            </td>
                                                                            <td style="padding: 0px">
                                                                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                    <tr id="TRB_LOCATION_1_Cpx">
                                                                                        <td style="padding: 0px;">
                                                                                            <input id="backB_LOCATION_1_Cpx" type="hidden" />
                                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                <tr>
                                                                                                    <td style="padding: 0px;">
                                                                                                        <span class="ImgError" id="WDSErrorImgTRB_LOCATION_1_Cpx" style="display: none">&nbsp;</span><span
                                                                                                            class="textBold">始发</span>城市或机场*
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table_B_LOCATION_1_Cpx" style="display: none">
                                                                                                    <td>
                                                                                                        <span class="nowrap">
                                                                                                            <input name="B_LOCATION_1_Cpx" id="B_LOCATION_1_Cpx" value="Los Angeles" type="text"
                                                                                                                size="30" />
                                                                                                            <span class="ImgLookUp" title="单击此处可启动首选航空公司弹出窗口" onclick="javascript:etravel.openLocation('B_LOCATION_1_Cpx');">
                                                                                                                &nbsp;</span> </span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table2_B_LOCATION_1_Cpx">
                                                                                                    <td nowrap="nowrap">
                                                                                                        <select style="width: 190px;" name="From_B_LOCATION_1_Cpx" id="From_B_LOCATION_1_Cpx"
                                                                                                            onchange="selectChange('From_B_LOCATION_1_Cpx','B_LOCATION_1_Cpx')">
                                                                                                            <option  value="Los Angeles">Los Angeles</option>
                                                                                                            <option value="New York">New York</option>
                                                                                                            
                                                                                                            <option value="San Francisco" selected="selected" >San Francisco</option>
                                                                                                            
                                                                                                            <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="SearchRangeDepartureRow_1_Cpx">
                                                                                                    <td style="padding: 0px">
                                                                                                        <div style="padding: 0px; margin: 0px;">
                                                                                                            <input style="padding: 0px; margin: 0px;" type="checkbox" name="B_SEARCH_RANGE_1_Cpx"
                                                                                                                id="Departure_Range_1_Cpx" value="100" />
                                                                                                            及 100 英里以内的机场
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td style="padding: 0px;">
                                                                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                    <tr id="TRE_LOCATION_1_Cpx">
                                                                                        <td style="padding: 0px;">
                                                                                            <input id="backE_LOCATION_1_Cpx" type="hidden" />
                                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                <tr>
                                                                                                    <td style="padding: 0px;">
                                                                                                        <span class="ImgError" id="WDSErrorImgTRE_LOCATION_1_Cpx" style="display: none">&nbsp;</span><span
                                                                                                            class="textBold">目的</span>城市或机场*
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table_E_LOCATION_1_Cpx" style="display: none">
                                                                                                    <td>
                                                                                                        <span class="nowrap">
                                                                                                            <input name="E_LOCATION_1_Cpx" id="E_LOCATION_1_Cpx" value="Beijing" type="text"
                                                                                                                size="30" />
                                                                                                        </span><span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('E_LOCATION_1_Cpx');">
                                                                                                            &nbsp;</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table2_E_LOCATION_1_Cpx">
                                                                                                    <td id="departureLocationCell_1" nowrap="nowrap">
                                                                                                        <select style="width: 190px;" name="From_E_LOCATION_1_Cpx" id="From_E_LOCATION_1_Cpx"
                                                                                                            onchange="selectChange('From_E_LOCATION_1_Cpx','E_LOCATION_1_Cpx')">
                                                                                                            <option selected="selected" value="Beijing">Beijing</option>
                                                                                                            <option value="Shanghai">Shanghai</option>
                                                                                                            <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="SearchRangeArrivalRow_1_Cpx">
                                                                                                    <td style="padding: 0px">
                                                                                                        <div style="padding: 0px; margin: 0px;">
                                                                                                            <input style="padding: 0px; margin: 0px;" type="checkbox" name="E_SEARCH_RANGE_1_Cpx"
                                                                                                                id="Arrival_Range_1_Cpx" value="100" />
                                                                                                            及 100 英里以内的机场
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td style="padding: 0px" colspan="3">
                                                                                <!-- Search date selection panel (1Cpx) -->
                                                                                <div class="searchDateSelectionPanel" id="divB_DATE1Cpx">
                                                                                    <ul class="selector date">
                                                                                        <!-- First selection: date (month and day) -->
                                                                                        <li class="value" id="DateCmp1Cpx">
                                                                                            <label for="Month1Cpx">
                                                                                                <span class="ImgError" id="WDSErrorImgB_DATE1Cpx" style="display: none">&nbsp;</span>启程日期</label>
                                                                                            <select name="Month1Cpx" id="Month1Cpx" onchange="etravel.keepCalendarGap('#divB_DATE1Cpx', 7);"
                                                                                                onkeypress="etravel.keepCalendarGap('#divB_DATE1Cpx', 7);">
                                                                                            </select>
                                                                                            <select id="Day1Cpx" name="Day1Cpx" onchange="etravel.keepCalendarGap('#divB_DATE1Cpx', 7);"
                                                                                                onkeypress="etravel.keepCalendarGap('#divB_DATE1Cpx', 7);">
                                                                                            </select>
                                                                                            <span id="linkCalendar1Cpx" title="单击此处可搜索日期" class="ImgCal">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                                            <span class="dayOfWeek" id="originDateDayOfWeekCell1Cpx" name="originDateDayOfWeekCell1Cpx">
                                                                                            </span>
                                                                                            <input type="hidden" id="backB1CpxDate" />
                                                                                            <input type="hidden" name="B_DATE1Cpx" id="B_DATE1Cpx" value="" />
                                                                                        </li>
                                                                                        <!-- Date flexibility selection -->
                                                                                    </ul>
                                                                                    <ul class="selector time" id="timeSelector1Cpx">
                                                                                        <!-- Time selection -->
                                                                                        <li class="value" id="timeCell1Cpx">
                                                                                            <label for="Hours1Cpx">
                                                                                                启程时间
                                                                                            </label>
                                                                                            <span id="timeCellDropDown1Cpx">
                                                                                                <select id="Hours1Cpx" name="Hours1Cpx">
                                                                                                    <option value="ANY" selected="selected">任意时间 </option>
                                                                                                    <option value="0000">00:00 </option>
                                                                                                    <option value="0100">1:00 </option>
                                                                                                    <option value="0200">2:00 </option>
                                                                                                    <option value="0300">3:00 </option>
                                                                                                    <option value="0400">4:00 </option>
                                                                                                    <option value="0500">5:00 </option>
                                                                                                    <option value="0600">6:00 </option>
                                                                                                    <option value="0700">7:00 </option>
                                                                                                    <option value="0800">8:00 </option>
                                                                                                    <option value="0900">9:00 </option>
                                                                                                    <option value="1000">10:00 </option>
                                                                                                    <option value="1100">11:00 </option>
                                                                                                    <option value="1200">12:00 </option>
                                                                                                    <option value="1300">13:00 </option>
                                                                                                    <option value="1400">14:00 </option>
                                                                                                    <option value="1500">15:00 </option>
                                                                                                    <option value="1600">16:00 </option>
                                                                                                    <option value="1700">17:00 </option>
                                                                                                    <option value="1800">18:00 </option>
                                                                                                    <option value="1900">19:00 </option>
                                                                                                    <option value="2000">20:00 </option>
                                                                                                    <option value="2100">21:00 </option>
                                                                                                    <option value="2200">22:00 </option>
                                                                                                    <option value="2300">23:00 </option>
                                                                                                </select>
                                                                                            </span>
                                                                                            <input type="hidden" id="backB1CpxDateTime" />
                                                                                        </li>
                                                                                        <!-- Time flexibility selection -->
                                                                                    </ul>
                                                                                </div>
                                                                                <!-- End of search date selection panel -->
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div id="divComplexStep_2">
                                                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            
                                                                            <td colspan="4" style="padding: 0px" class="lineSeparatorPassenger">&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                           
                                                                            <td colspan="4">&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                           
                                                                            <td>
                                                                                <div class="divNumbTab">
                                                                                    2</div>
                                                                            </td>
                                                                            <td style="padding: 0px">
                                                                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                    <tr id="TRB_LOCATION_2_Cpx">
                                                                                        <td style="padding: 0px;">
                                                                                            <input id="backB_LOCATION_2_Cpx" type="hidden" />
                                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                <tr>
                                                                                                    <td style="padding: 0px;">
                                                                                                        <span class="ImgError" id="WDSErrorImgTRB_LOCATION_2_Cpx" style="display: none">&nbsp;</span><span
                                                                                                            class="textBold">始发</span>城市或机场*
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table_B_LOCATION_2_Cpx" style="display: none">
                                                                                                    <td>
                                                                                                        <span class="nowrap">
                                                                                                            <input name="B_LOCATION_2_Cpx" id="B_LOCATION_2_Cpx" type="text" size="30" />
                                                                                                            <span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('B_LOCATION_2_Cpx');">
                                                                                                                &nbsp;</span> </span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table2_B_LOCATION_2_Cpx">
                                                                                                    <td nowrap="nowrap">
                                                                                                        <select style="width: 190px;" name="From_B_LOCATION_2_Cpx" id="From_B_LOCATION_2_Cpx"
                                                                                                            onchange="selectChange('From_B_LOCATION_2_Cpx','B_LOCATION_2_Cpx')">
                                                                                                            <option value=""></option>
                                                                                                            <option value="Los Angeles">Los Angeles</option>
                                                                                                            <option value="New York" >New York</option>
                                                                                                            
                                                                                                            <option value="San Francisco" selected="selected" >San Francisco</option>
                                                                                                            <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="SearchRangeDepartureRow_2_Cpx">
                                                                                                    <td style="padding: 0px">
                                                                                                        <div style="padding: 0px; margin: 0px;">
                                                                                                            <input style="padding: 0px; margin: 0px;" type="checkbox" name="B_SEARCH_RANGE_2_Cpx"
                                                                                                                id="Departure_Range_2_Cpx" value="100" />
                                                                                                            及 100 英里以内的机场
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td style="padding: 0px;">
                                                                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                    <tr id="TRE_LOCATION_2_Cpx">
                                                                                        <td style="padding: 0px;">
                                                                                            <input id="backE_LOCATION_2_Cpx" type="hidden" />
                                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                <tr>
                                                                                                    <td style="padding: 0px;">
                                                                                                        <span class="ImgError" id="WDSErrorImgTRE_LOCATION_2_Cpx" style="display: none">&nbsp;</span><span
                                                                                                            class="textBold">目的</span>城市或机场*
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table_E_LOCATION_2_Cpx" style="display: none">
                                                                                                    <td>
                                                                                                        <span class="nowrap">
                                                                                                            <input name="E_LOCATION_2_Cpx" id="E_LOCATION_2_Cpx" type="text" size="30" />
                                                                                                            <span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('E_LOCATION_2_Cpx');">
                                                                                                                &nbsp;</span> </span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table2_E_LOCATION_2_Cpx">
                                                                                                    <td nowrap="nowrap">
                                                                                                        <select style="width: 190px;" name="From_E_LOCATION_2_Cpx" id="From_E_LOCATION_2_Cpx"
                                                                                                            onchange="selectChange('From_E_LOCATION_2_Cpx','E_LOCATION_2_Cpx')">
                                                                                                            <option value=""></option>
                                                                                                            <option value="Beijing">Beijing</option>
                                                                                                            <option value="Shanghai">Shanghai</option>
                                                                                                            <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="SearchRangeArrivalRow_2_Cpx">
                                                                                                    <td style="padding: 0px">
                                                                                                        <div style="padding: 0px; margin: 0px;">
                                                                                                            <input style="padding: 0px; margin: 0px;" type="checkbox" name="E_SEARCH_RANGE_2_Cpx"
                                                                                                                id="Arrival_Range_2_Cpx" value="100" />
                                                                                                            及 100 英里以内的机场
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                          
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td style="padding: 0px" colspan="3">
                                                                                <!-- Search date selection panel (2Cpx) -->
                                                                                <div class="searchDateSelectionPanel" id="divB_DATE2Cpx">
                                                                                    <ul class="selector date">
                                                                                        <!-- First selection: date (month and day) -->
                                                                                        <li class="value" id="DateCmp2Cpx">
                                                                                            <label for="Month2Cpx">
                                                                                                <span class="ImgError" id="WDSErrorImgB_DATE2Cpx" style="display: none">&nbsp;</span>启程日期</label>
                                                                                            <select name="Month2Cpx" id="Month2Cpx" onchange="etravel.keepCalendarGap('#divB_DATE2Cpx', 7);"
                                                                                                onkeypress="etravel.keepCalendarGap('#divB_DATE2Cpx', 7);">
                                                                                            </select>
                                                                                            <select id="Day2Cpx" name="Day2Cpx" onchange="etravel.keepCalendarGap('#divB_DATE2Cpx', 7);"
                                                                                                onkeypress="etravel.keepCalendarGap('#divB_DATE2Cpx', 7);">
                                                                                            </select>
                                                                                            <span id="linkCalendar2Cpx" title="单击此处可搜索日期" class="ImgCal">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                                            <span class="dayOfWeek" id="originDateDayOfWeekCell2Cpx" name="originDateDayOfWeekCell2Cpx">
                                                                                            </span>
                                                                                            <input type="hidden" id="backB2CpxDate" />
                                                                                            <input type="hidden" name="B_DATE2Cpx" id="B_DATE2Cpx" value="" />
                                                                                        </li>
                                                                                        <!-- Date flexibility selection -->
                                                                                    </ul>
                                                                                    <ul class="selector time" id="timeSelector2Cpx">
                                                                                        <!-- Time selection -->
                                                                                        <li class="value" id="timeCell2Cpx">
                                                                                            <label for="Hours2Cpx">
                                                                                                启程时间
                                                                                            </label>
                                                                                            <span id="timeCellDropDown2Cpx">
                                                                                                <select id="Hours2Cpx" name="Hours2Cpx">
                                                                                                    <option value="ANY" selected="selected">任意时间 </option>
                                                                                                    <option value="0000">00:00 </option>
                                                                                                    <option value="0100">1:00 </option>
                                                                                                    <option value="0200">2:00 </option>
                                                                                                    <option value="0300">3:00 </option>
                                                                                                    <option value="0400">4:00 </option>
                                                                                                    <option value="0500">5:00 </option>
                                                                                                    <option value="0600">6:00 </option>
                                                                                                    <option value="0700">7:00 </option>
                                                                                                    <option value="0800">8:00 </option>
                                                                                                    <option value="0900">9:00 </option>
                                                                                                    <option value="1000">10:00 </option>
                                                                                                    <option value="1100">11:00 </option>
                                                                                                    <option value="1200">12:00 </option>
                                                                                                    <option value="1300">13:00 </option>
                                                                                                    <option value="1400">14:00 </option>
                                                                                                    <option value="1500">15:00 </option>
                                                                                                    <option value="1600">16:00 </option>
                                                                                                    <option value="1700">17:00 </option>
                                                                                                    <option value="1800">18:00 </option>
                                                                                                    <option value="1900">19:00 </option>
                                                                                                    <option value="2000">20:00 </option>
                                                                                                    <option value="2100">21:00 </option>
                                                                                                    <option value="2200">22:00 </option>
                                                                                                    <option value="2300">23:00 </option>
                                                                                                </select>
                                                                                            </span>
                                                                                            <input type="hidden" id="backB2CpxDateTime" />
                                                                                        </li>
                                                                                        <!-- Time flexibility selection -->
                                                                                    </ul>
                                                                                </div>
                                                                                <!-- End of search date selection panel -->
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div id="divComplexStep_3">
                                                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            
                                                                            <td colspan="4" style="padding: 0px" class="lineSeparatorPassenger">&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td colspan="4">&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>
                                                                                <div class="divNumbTab">
                                                                                    3</div>
                                                                            </td>
                                                                            <td style="padding: 0px">
                                                                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                    <tr id="TRB_LOCATION_3_Cpx">
                                                                                        <td style="padding: 0px;">
                                                                                            <input id="backB_LOCATION_3_Cpx" type="hidden" />
                                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                <tr>
                                                                                                    <td style="padding: 0px;">
                                                                                                        <span class="ImgError" id="WDSErrorImgTRB_LOCATION_3_Cpx" style="display: none">&nbsp;</span><span
                                                                                                            class="textBold">始发</span>城市或机场*
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table_B_LOCATION_3_Cpx" style="display: none">
                                                                                                    <td>
                                                                                                        <span class="nowrap">
                                                                                                            <input name="B_LOCATION_3_Cpx" id="B_LOCATION_3_Cpx" type="text" size="30" />
                                                                                                            <span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('B_LOCATION_3_Cpx');">
                                                                                                                &nbsp;</span> </span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table2_B_LOCATION_3_Cpx">
                                                                                                    <td nowrap="nowrap">
                                                                                                        <select style="width: 190px;" name="From_B_LOCATION_3_Cpx" id="From_B_LOCATION_3_Cpx"
                                                                                                            onchange="selectChange('From_B_LOCATION_3_Cpx','B_LOCATION_3_Cpx')">
                                                                                                            <option value=""></option>
                                                                                                            <option value="Los Angeles">Los Angeles</option>
                                                                                                            <option value="New York"  >New York</option>
                                                                                                            
                                                                                                            <option value="San Francisco" selected="selected" >San Francisco</option>
                                                                                                            <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="SearchRangeDepartureRow_3_Cpx">
                                                                                                    <td style="padding: 0px">
                                                                                                        <div style="padding: 0px; margin: 0px;">
                                                                                                            <input style="padding: 0px; margin: 0px;" type="checkbox" name="B_SEARCH_RANGE_3_Cpx"
                                                                                                                id="Departure_Range_3_Cpx" value="100" />
                                                                                                            及 100 英里以内的机场
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td style="padding: 0px;">
                                                                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                    <tr id="TRE_LOCATION_3_Cpx">
                                                                                        <td style="padding: 0px;">
                                                                                            <input id="backE_LOCATION_3_Cpx" type="hidden" />
                                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                <tr>
                                                                                                    <td style="padding: 0px;">
                                                                                                        <span class="ImgError" id="WDSErrorImgTRE_LOCATION_3_Cpx" style="display: none">&nbsp;</span><span
                                                                                                            class="textBold">目的</span>城市或机场*
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table_E_LOCATION_3_Cpx" style="display: none">
                                                                                                    <td>
                                                                                                        <span class="nowrap">
                                                                                                            <input name="E_LOCATION_3_Cpx" id="E_LOCATION_3_Cpx" type="text" size="30" />
                                                                                                            <span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('E_LOCATION_3_Cpx');">
                                                                                                                &nbsp;</span> </span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table2_E_LOCATION_3_Cpx">
                                                                                                    <td nowrap="nowrap">
                                                                                                        <select style="width: 190px;" name="From_E_LOCATION_3_Cpx" id="From_E_LOCATION_3_Cpx"
                                                                                                            onchange="selectChange('From_E_LOCATION_3_Cpx','E_LOCATION_3_Cpx')">
                                                                                                            <option value=""></option>
                                                                                                            <option value="Beijing">Beijing</option>
                                                                                                            <option value="Shanghai">Shanghai</option>
                                                                                                            <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="SearchRangeArrivalRow_3_Cpx">
                                                                                                    <td style="padding: 0px">
                                                                                                        <div style="padding: 0px; margin: 0px;">
                                                                                                            <input style="padding: 0px; margin: 0px;" type="checkbox" name="E_SEARCH_RANGE_3_Cpx"
                                                                                                                id="Arrival_Range_3_Cpx" value="100" />
                                                                                                            及 100 英里以内的机场
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td style="padding: 0px" colspan="3">
                                                                                <!-- Search date selection panel (3Cpx) -->
                                                                                <div class="searchDateSelectionPanel" id="divB_DATE3Cpx">
                                                                                    <ul class="selector date">
                                                                                        <!-- First selection: date (month and day) -->
                                                                                        <li class="value" id="DateCmp3Cpx">
                                                                                            <label for="Month3Cpx">
                                                                                                <span class="ImgError" id="WDSErrorImgB_DATE3Cpx" style="display: none">&nbsp;</span>启程日期</label>
                                                                                            <select name="Month3Cpx" id="Month3Cpx" onchange="etravel.keepCalendarGap('#divB_DATE3Cpx', 7);"
                                                                                                onkeypress="etravel.keepCalendarGap('#divB_DATE3Cpx', 7);">
                                                                                            </select>
                                                                                            <select id="Day3Cpx" name="Day3Cpx" onchange="etravel.keepCalendarGap('#divB_DATE3Cpx', 7);"
                                                                                                onkeypress="etravel.keepCalendarGap('#divB_DATE3Cpx', 7);">
                                                                                            </select>
                                                                                            <span id="linkCalendar3Cpx" title="单击此处可搜索日期" class="ImgCal">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                                            <span class="dayOfWeek" id="originDateDayOfWeekCell3Cpx" name="originDateDayOfWeekCell3Cpx">
                                                                                            </span>
                                                                                            <input type="hidden" id="backB3CpxDate" />
                                                                                            <input type="hidden" name="B_DATE3Cpx" id="B_DATE3Cpx" value="" />
                                                                                        </li>
                                                                                        <!-- Date flexibility selection -->
                                                                                    </ul>
                                                                                    <ul class="selector time" id="timeSelector3Cpx">
                                                                                        <!-- Time selection -->
                                                                                        <li class="value" id="timeCell3Cpx">
                                                                                            <label for="Hours3Cpx">
                                                                                                启程时间
                                                                                            </label>
                                                                                            <span id="timeCellDropDown3Cpx">
                                                                                                <select id="Hours3Cpx" name="Hours3Cpx">
                                                                                                    <option value="ANY" selected="selected">任意时间 </option>
                                                                                                    <option value="0000">00:00 </option>
                                                                                                    <option value="0100">1:00 </option>
                                                                                                    <option value="0200">2:00 </option>
                                                                                                    <option value="0300">3:00 </option>
                                                                                                    <option value="0400">4:00 </option>
                                                                                                    <option value="0500">5:00 </option>
                                                                                                    <option value="0600">6:00 </option>
                                                                                                    <option value="0700">7:00 </option>
                                                                                                    <option value="0800">8:00 </option>
                                                                                                    <option value="0900">9:00 </option>
                                                                                                    <option value="1000">10:00 </option>
                                                                                                    <option value="1100">11:00 </option>
                                                                                                    <option value="1200">12:00 </option>
                                                                                                    <option value="1300">13:00 </option>
                                                                                                    <option value="1400">14:00 </option>
                                                                                                    <option value="1500">15:00 </option>
                                                                                                    <option value="1600">16:00 </option>
                                                                                                    <option value="1700">17:00 </option>
                                                                                                    <option value="1800">18:00 </option>
                                                                                                    <option value="1900">19:00 </option>
                                                                                                    <option value="2000">20:00 </option>
                                                                                                    <option value="2100">21:00 </option>
                                                                                                    <option value="2200">22:00 </option>
                                                                                                    <option value="2300">23:00 </option>
                                                                                                </select>
                                                                                            </span>
                                                                                            <input type="hidden" id="backB3CpxDateTime" />
                                                                                        </li>
                                                                                        <!-- Time flexibility selection -->
                                                                                    </ul>
                                                                                </div>
                                                                                <!-- End of search date selection panel -->
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div id="divComplexStep_4" style="display: none;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            
                                                                            <td colspan="4" style="padding: 0px" class="lineSeparatorPassenger">&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td colspan="4">&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>
                                                                                <div class="divNumbTab">
                                                                                    4</div>
                                                                            </td>
                                                                            <td style="padding: 0px">
                                                                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                    <tr id="TRB_LOCATION_4_Cpx">
                                                                                        <td style="padding: 0px;">
                                                                                            <input id="backB_LOCATION_4_Cpx" type="hidden" />
                                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                <tr>
                                                                                                    <td style="padding: 0px;">
                                                                                                        <span class="ImgError" id="WDSErrorImgTRB_LOCATION_4_Cpx" style="display: none">&nbsp;</span><span
                                                                                                            class="textBold">始发</span>城市或机场*
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table_B_LOCATION_4_Cpx" style="display: none">
                                                                                                    <td>
                                                                                                        <span class="nowrap">
                                                                                                            <input name="B_LOCATION_4_Cpx" id="B_LOCATION_4_Cpx" type="text" size="30" />
                                                                                                            <span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('B_LOCATION_4_Cpx');">
                                                                                                                &nbsp;</span> </span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table2_B_LOCATION_4_Cpx">
                                                                                                    <td nowrap="nowrap">
                                                                                                        <select style="width: 190px;" name="From_B_LOCATION_4_Cpx" id="From_B_LOCATION_4_Cpx"
                                                                                                            onchange="selectChange('From_B_LOCATION_4_Cpx','B_LOCATION_4_Cpx')">
                                                                                                            <option value=""></option>
                                                                                                            <option value="Los Angeles">Los Angeles</option>
                                                                                                            <option value="New York"  >New York</option>
                                                                                                            
                                                                                                            <option value="San Francisco" selected="selected" >San Francisco</option>
                                                                                                            <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="SearchRangeDepartureRow_4_Cpx">
                                                                                                    <td style="padding: 0px">
                                                                                                        <div style="padding: 0px; margin: 0px;">
                                                                                                            <input style="padding: 0px; margin: 0px;" type="checkbox" name="B_SEARCH_RANGE_4_Cpx"
                                                                                                                id="Departure_Range_4_Cpx" value="100" />
                                                                                                            及 100 英里以内的机场
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td style="padding: 0px;">
                                                                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                    <tr id="TRE_LOCATION_4_Cpx">
                                                                                        <td style="padding: 0px;">
                                                                                            <input id="backE_LOCATION_4_Cpx" type="hidden" />
                                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                <tr>
                                                                                                    <td style="padding: 0px;">
                                                                                                        <span class="ImgError" id="WDSErrorImgTRE_LOCATION_4_Cpx" style="display: none">&nbsp;</span><span
                                                                                                            class="textBold">目的</span>城市或机场*
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table_E_LOCATION_4_Cpx" style="display: none">
                                                                                                    <td>
                                                                                                        <span class="nowrap">
                                                                                                            <input name="E_LOCATION_4_Cpx" id="E_LOCATION_4_Cpx" type="text" size="30" />
                                                                                                            <span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('E_LOCATION_4_Cpx');">
                                                                                                                &nbsp;</span> </span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table2_E_LOCATION_4_Cpx">
                                                                                                    <td nowrap="nowrap">
                                                                                                        <select style="width: 190px;" name="From_E_LOCATION_4_Cpx" id="From_E_LOCATION_4_Cpx"
                                                                                                            onchange="selectChange('From_E_LOCATION_4_Cpx','E_LOCATION_4_Cpx')">
                                                                                                            <option value=""></option>
                                                                                                            <option value="Beijing">Beijing</option>
                                                                                                            <option value="Shanghai">Shanghai</option>
                                                                                                            <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="SearchRangeArrivalRow_4_Cpx">
                                                                                                    <td style="padding: 0px">
                                                                                                        <div style="padding: 0px; margin: 0px;">
                                                                                                            <input style="padding: 0px; margin: 0px;" type="checkbox" name="E_SEARCH_RANGE_4_Cpx"
                                                                                                                id="Arrival_Range_4_Cpx" value="100" />
                                                                                                            及 100 英里以内的机场
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td style="padding: 0px" colspan="3">
                                                                                <!-- Search date selection panel (4Cpx) -->
                                                                                <div class="searchDateSelectionPanel" id="divB_DATE4Cpx">
                                                                                    <ul class="selector date">
                                                                                        <!-- First selection: date (month and day) -->
                                                                                        <li class="value" id="DateCmp4Cpx">
                                                                                            <label for="Month4Cpx">
                                                                                                <span class="ImgError" id="WDSErrorImgB_DATE4Cpx" style="display: none">&nbsp;</span>启程日期</label>
                                                                                            <select name="Month4Cpx" id="Month4Cpx" onchange="etravel.keepCalendarGap('#divB_DATE4Cpx', 7);"
                                                                                                onkeypress="etravel.keepCalendarGap('#divB_DATE4Cpx', 7);">
                                                                                            </select>
                                                                                            <select id="Day4Cpx" name="Day4Cpx" onchange="etravel.keepCalendarGap('#divB_DATE4Cpx', 7);"
                                                                                                onkeypress="etravel.keepCalendarGap('#divB_DATE4Cpx', 7);">
                                                                                            </select>
                                                                                            <span id="linkCalendar4Cpx" title="单击此处可搜索日期" class="ImgCal">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                                            <span class="dayOfWeek" id="originDateDayOfWeekCell4Cpx" name="originDateDayOfWeekCell4Cpx">
                                                                                            </span>
                                                                                            <input type="hidden" id="backB4CpxDate" />
                                                                                            <input type="hidden" name="B_DATE4Cpx" id="B_DATE4Cpx" value="" />
                                                                                        </li>
                                                                                        <!-- Date flexibility selection -->
                                                                                    </ul>
                                                                                    <ul class="selector time" id="timeSelector4Cpx">
                                                                                        <!-- Time selection -->
                                                                                        <li class="value" id="timeCell4Cpx">
                                                                                            <label for="Hours4Cpx">
                                                                                                启程时间
                                                                                            </label>
                                                                                            <span id="timeCellDropDown4Cpx">
                                                                                                <select id="Hours4Cpx" name="Hours4Cpx">
                                                                                                    <option value="ANY" selected="selected">任意时间 </option>
                                                                                                    <option value="0000">00:00 </option>
                                                                                                    <option value="0100">1:00 </option>
                                                                                                    <option value="0200">2:00 </option>
                                                                                                    <option value="0300">3:00 </option>
                                                                                                    <option value="0400">4:00 </option>
                                                                                                    <option value="0500">5:00 </option>
                                                                                                    <option value="0600">6:00 </option>
                                                                                                    <option value="0700">7:00 </option>
                                                                                                    <option value="0800">8:00 </option>
                                                                                                    <option value="0900">9:00 </option>
                                                                                                    <option value="1000">10:00 </option>
                                                                                                    <option value="1100">11:00 </option>
                                                                                                    <option value="1200">12:00 </option>
                                                                                                    <option value="1300">13:00 </option>
                                                                                                    <option value="1400">14:00 </option>
                                                                                                    <option value="1500">15:00 </option>
                                                                                                    <option value="1600">16:00 </option>
                                                                                                    <option value="1700">17:00 </option>
                                                                                                    <option value="1800">18:00 </option>
                                                                                                    <option value="1900">19:00 </option>
                                                                                                    <option value="2000">20:00 </option>
                                                                                                    <option value="2100">21:00 </option>
                                                                                                    <option value="2200">22:00 </option>
                                                                                                    <option value="2300">23:00 </option>
                                                                                                </select>
                                                                                            </span>
                                                                                            <input type="hidden" id="backB4CpxDateTime" />
                                                                                        </li>
                                                                                        <!-- Time flexibility selection -->
                                                                                    </ul>
                                                                                </div>
                                                                                <!-- End of search date selection panel -->
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div id="divComplexStep_5" style="display: none;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            
                                                                            <td colspan="4" style="padding: 0px" class="lineSeparatorPassenger">&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td colspan="4">&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>
                                                                                <div class="divNumbTab">
                                                                                    5</div>
                                                                            </td>
                                                                            <td style="padding: 0px">
                                                                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                    <tr id="TRB_LOCATION_5_Cpx">
                                                                                        <td style="padding: 0px;">
                                                                                            <input id="backB_LOCATION_5_Cpx" type="hidden" />
                                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                <tr>
                                                                                                    <td style="padding: 0px;">
                                                                                                        <span class="ImgError" id="WDSErrorImgTRB_LOCATION_5_Cpx" style="display: none">&nbsp;</span><span
                                                                                                            class="textBold">始发</span>城市或机场*
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table_B_LOCATION_5_Cpx" style="display: none">
                                                                                                    <td>
                                                                                                        <span class="nowrap">
                                                                                                            <input name="B_LOCATION_5_Cpx" id="B_LOCATION_5_Cpx" type="text" size="30" />
                                                                                                            <span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('B_LOCATION_5_Cpx');">
                                                                                                                &nbsp;</span> </span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table2_B_LOCATION_5_Cpx">
                                                                                                    <td nowrap="nowrap">
                                                                                                        <select style="width: 190px;" name="From_B_LOCATION_5_Cpx" id="From_B_LOCATION_5_Cpx"
                                                                                                            onchange="selectChange('From_B_LOCATION_5_Cpx','B_LOCATION_5_Cpx')">
                                                                                                            <option value=""></option>
                                                                                                             <option value="Los Angeles">Los Angeles</option>
                                                                                                             <option value="New York"  >New York</option>
                                                                                                           
                                                                                                            <option value="San Francisco" selected="selected" >San Francisco</option>
                                                                                                            <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="SearchRangeDepartureRow_5_Cpx">
                                                                                                    <td style="padding: 0px">
                                                                                                        <div style="padding: 0px; margin: 0px;">
                                                                                                            <input style="padding: 0px; margin: 0px;" type="checkbox" name="B_SEARCH_RANGE_5_Cpx"
                                                                                                                id="Departure_Range_5_Cpx" value="100" />
                                                                                                            及 100 英里以内的机场
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td style="padding: 0px;">
                                                                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                    <tr id="TRE_LOCATION_5_Cpx">
                                                                                        <td style="padding: 0px;">
                                                                                            <input id="backE_LOCATION_5_Cpx" type="hidden" />
                                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                <tr>
                                                                                                    <td style="padding: 0px;">
                                                                                                        <span class="ImgError" id="WDSErrorImgTRE_LOCATION_5_Cpx" style="display: none">&nbsp;</span><span
                                                                                                            class="textBold">目的</span>城市或机场*
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table_E_LOCATION_5_Cpx" style="display: none">
                                                                                                    <td>
                                                                                                        <span class="nowrap">
                                                                                                            <input name="E_LOCATION_5_Cpx" id="E_LOCATION_5_Cpx" type="text" size="30" />
                                                                                                            <span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('E_LOCATION_5_Cpx');">
                                                                                                                &nbsp;</span> </span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table2_E_LOCATION_5_Cpx">
                                                                                                    <td nowrap="nowrap">
                                                                                                        <select style="width: 190px;" name="From_E_LOCATION_5_Cpx" id="From_E_LOCATION_5_Cpx"
                                                                                                            onchange="selectChange('From_E_LOCATION_5_Cpx','E_LOCATION_5_Cpx')">
                                                                                                            <option value=""></option>
                                                                                                            <option value="Beijing">Beijing</option>
                                                                                                            <option value="Shanghai">Shanghai</option>
                                                                                                            <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="SearchRangeArrivalRow_5_Cpx">
                                                                                                    <td style="padding: 0px">
                                                                                                        <div style="padding: 0px; margin: 0px;">
                                                                                                            <input style="padding: 0px; margin: 0px;" type="checkbox" name="E_SEARCH_RANGE_5_Cpx"
                                                                                                                id="Arrival_Range_5_Cpx" value="100" />
                                                                                                            及 100 英里以内的机场
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td style="padding: 0px" colspan="3">
                                                                                <!-- Search date selection panel (5Cpx) -->
                                                                                <div class="searchDateSelectionPanel" id="divB_DATE5Cpx">
                                                                                    <ul class="selector date">
                                                                                        <!-- First selection: date (month and day) -->
                                                                                        <li class="value" id="DateCmp5Cpx">
                                                                                            <label for="Month5Cpx">
                                                                                                <span class="ImgError" id="WDSErrorImgB_DATE5Cpx" style="display: none">&nbsp;</span>启程日期</label>
                                                                                            <select name="Month5Cpx" id="Month5Cpx" onchange="etravel.keepCalendarGap('#divB_DATE5Cpx', 7);"
                                                                                                onkeypress="etravel.keepCalendarGap('#divB_DATE5Cpx', 7);">
                                                                                            </select>
                                                                                            <select id="Day5Cpx" name="Day5Cpx" onchange="etravel.keepCalendarGap('#divB_DATE5Cpx', 7);"
                                                                                                onkeypress="etravel.keepCalendarGap('#divB_DATE5Cpx', 7);">
                                                                                            </select>
                                                                                            <span id="linkCalendar5Cpx" title="单击此处可搜索日期" class="ImgCal">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                                            <span class="dayOfWeek" id="originDateDayOfWeekCell5Cpx" name="originDateDayOfWeekCell5Cpx">
                                                                                            </span>
                                                                                            <input type="hidden" id="backB5CpxDate" />
                                                                                            <input type="hidden" name="B_DATE5Cpx" id="B_DATE5Cpx" value="" />
                                                                                        </li>
                                                                                        <!-- Date flexibility selection -->
                                                                                    </ul>
                                                                                    <ul class="selector time" id="timeSelector5Cpx">
                                                                                        <!-- Time selection -->
                                                                                        <li class="value" id="timeCell5Cpx">
                                                                                            <label for="Hours5Cpx">
                                                                                                启程时间
                                                                                            </label>
                                                                                            <span id="timeCellDropDown5Cpx">
                                                                                                <select id="Hours5Cpx" name="Hours5Cpx">
                                                                                                    <option value="ANY" selected="selected">任意时间 </option>
                                                                                                    <option value="0000">00:00 </option>
                                                                                                    <option value="0100">1:00 </option>
                                                                                                    <option value="0200">2:00 </option>
                                                                                                    <option value="0300">3:00 </option>
                                                                                                    <option value="0400">4:00 </option>
                                                                                                    <option value="0500">5:00 </option>
                                                                                                    <option value="0600">6:00 </option>
                                                                                                    <option value="0700">7:00 </option>
                                                                                                    <option value="0800">8:00 </option>
                                                                                                    <option value="0900">9:00 </option>
                                                                                                    <option value="1000">10:00 </option>
                                                                                                    <option value="1100">11:00 </option>
                                                                                                    <option value="1200">12:00 </option>
                                                                                                    <option value="1300">13:00 </option>
                                                                                                    <option value="1400">14:00 </option>
                                                                                                    <option value="1500">15:00 </option>
                                                                                                    <option value="1600">16:00 </option>
                                                                                                    <option value="1700">17:00 </option>
                                                                                                    <option value="1800">18:00 </option>
                                                                                                    <option value="1900">19:00 </option>
                                                                                                    <option value="2000">20:00 </option>
                                                                                                    <option value="2100">21:00 </option>
                                                                                                    <option value="2200">22:00 </option>
                                                                                                    <option value="2300">23:00 </option>
                                                                                                </select>
                                                                                            </span>
                                                                                            <input type="hidden" id="backB5CpxDateTime" />
                                                                                        </li>
                                                                                        <!-- Time flexibility selection -->
                                                                                    </ul>
                                                                                </div>
                                                                                <!-- End of search date selection panel -->
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div id="divComplexStep_6" style="display: none;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                        <tr>
                                                                            
                                                                            <td colspan="4" style="padding: 0px" class="lineSeparatorPassenger">&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                           
                                                                            <td colspan="4">&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>
                                                                                <div class="divNumbTab">
                                                                                    6</div>
                                                                            </td>
                                                                            <td style="padding: 0px">
                                                                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                    <tr id="TRB_LOCATION_6_Cpx">
                                                                                        <td style="padding: 0px;">
                                                                                            <input id="backB_LOCATION_6_Cpx" type="hidden" />
                                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                <tr>
                                                                                                    <td style="padding: 0px;">
                                                                                                        <span class="ImgError" id="WDSErrorImgTRB_LOCATION_6_Cpx" style="display: none">&nbsp;</span><span
                                                                                                            class="textBold">始发</span>城市或机场*
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table_B_LOCATION_6_Cpx" style="display: none">
                                                                                                    <td>
                                                                                                        <span class="nowrap">
                                                                                                            <input name="B_LOCATION_6_Cpx" id="B_LOCATION_6_Cpx" type="text" size="30" />
                                                                                                            <span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('B_LOCATION_6_Cpx');">
                                                                                                                &nbsp;</span> </span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table2_B_LOCATION_6_Cpx">
                                                                                                    <td nowrap="nowrap">
                                                                                                        <select style="width: 190px;" name="From_B_LOCATION_6_Cpx" id="From_B_LOCATION_6_Cpx"
                                                                                                            onchange="selectChange('From_B_LOCATION_6_Cpx','B_LOCATION_6_Cpx')">
                                                                                                            <option value=""></option>
                                                                                                              <option value="Los Angeles">Los Angeles</option>
                                                                                                              <option value="New York"  >New York</option>
                                                                                                          
                                                                                                            <option value="San Francisco" selected="selected" >San Francisco</option>
                                                                                                            <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="SearchRangeDepartureRow_6_Cpx">
                                                                                                    <td style="padding: 0px">
                                                                                                        <div style="padding: 0px; margin: 0px;">
                                                                                                            <input style="padding: 0px; margin: 0px;" type="checkbox" name="B_SEARCH_RANGE_6_Cpx"
                                                                                                                id="Departure_Range_6_Cpx" value="100" />
                                                                                                            及 100 英里以内的机场
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td style="padding: 0px;">
                                                                                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                    <tr id="TRE_LOCATION_6_Cpx">
                                                                                        <td style="padding: 0px;">
                                                                                            <input id="backE_LOCATION_6_Cpx" type="hidden" />
                                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                <tr>
                                                                                                    <td style="padding: 0px;">
                                                                                                        <span class="ImgError" id="WDSErrorImgTRE_LOCATION_6_Cpx" style="display: none">&nbsp;</span><span
                                                                                                            class="textBold">目的</span>城市或机场*
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table_E_LOCATION_6_Cpx" style="display: none">
                                                                                                    <td>
                                                                                                        <span class="nowrap">
                                                                                                            <input name="E_LOCATION_6_Cpx" id="E_LOCATION_6_Cpx" type="text" size="30" />
                                                                                                            <span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('E_LOCATION_6_Cpx');">
                                                                                                                &nbsp;</span> </span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="Table2_E_LOCATION_6_Cpx">
                                                                                                    <td nowrap="nowrap">
                                                                                                        <select style="width: 190px;" name="From_E_LOCATION_6_Cpx" id="From_E_LOCATION_6_Cpx"
                                                                                                            onchange="selectChange('From_E_LOCATION_6_Cpx','E_LOCATION_6_Cpx')">
                                                                                                            <option value=""></option>
                                                                                                            <option value="Beijing">Beijing</option>
                                                                                                            <option value="Shanghai">Shanghai</option>
                                                                                                            <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr id="SearchRangeArrivalRow_6_Cpx">
                                                                                                    <td style="padding: 0px">
                                                                                                        <div style="padding: 0px; margin: 0px;">
                                                                                                            <input style="padding: 0px; margin: 0px;" type="checkbox" name="E_SEARCH_RANGE_6_Cpx"
                                                                                                                id="Arrival_Range_6_Cpx" value="100" />
                                                                                                            及 100 英里以内的机场
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                           
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            
                                                                            <td>&nbsp;
                                                                                
                                                                            </td>
                                                                            <td style="padding: 0px" colspan="3">
                                                                                <!-- Search date selection panel (6Cpx) -->
                                                                                <div class="searchDateSelectionPanel" id="divB_DATE6Cpx">
                                                                                    <ul class="selector date">
                                                                                        <!-- First selection: date (month and day) -->
                                                                                        <li class="value" id="DateCmp6Cpx">
                                                                                            <label for="Month6Cpx">
                                                                                                <span class="ImgError" id="WDSErrorImgB_DATE6Cpx" style="display: none">&nbsp;</span>启程日期</label>
                                                                                            <select name="Month6Cpx" id="Month6Cpx" onchange="etravel.keepCalendarGap('#divB_DATE6Cpx', 7);"
                                                                                                onkeypress="etravel.keepCalendarGap('#divB_DATE6Cpx', 7);">
                                                                                            </select>
                                                                                            <select id="Day6Cpx" name="Day6Cpx" onchange="etravel.keepCalendarGap('#divB_DATE6Cpx', 7);"
                                                                                                onkeypress="etravel.keepCalendarGap('#divB_DATE6Cpx', 7);">
                                                                                            </select>
                                                                                            <span id="linkCalendar6Cpx" title="单击此处可搜索日期" class="ImgCal">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                                            <span class="dayOfWeek" id="originDateDayOfWeekCell6Cpx" name="originDateDayOfWeekCell6Cpx">
                                                                                            </span>
                                                                                            <input type="hidden" id="backB6CpxDate" />
                                                                                            <input type="hidden" name="B_DATE6Cpx" id="B_DATE6Cpx" value="" />
                                                                                        </li>
                                                                                        <!-- Date flexibility selection -->
                                                                                    </ul>
                                                                                    <ul class="selector time" id="timeSelector6Cpx">
                                                                                        <!-- Time selection -->
                                                                                        <li class="value" id="timeCell6Cpx">
                                                                                            <label for="Hours6Cpx">
                                                                                                启程时间
                                                                                            </label>
                                                                                            <span id="timeCellDropDown6Cpx">
                                                                                                <select id="Hours6Cpx" name="Hours6Cpx">
                                                                                                    <option value="ANY" selected="selected">任意时间 </option>
                                                                                                    <option value="0000">00:00 </option>
                                                                                                    <option value="0100">1:00 </option>
                                                                                                    <option value="0200">2:00 </option>
                                                                                                    <option value="0300">3:00 </option>
                                                                                                    <option value="0400">4:00 </option>
                                                                                                    <option value="0500">5:00 </option>
                                                                                                    <option value="0600">6:00 </option>
                                                                                                    <option value="0700">7:00 </option>
                                                                                                    <option value="0800">8:00 </option>
                                                                                                    <option value="0900">9:00 </option>
                                                                                                    <option value="1000">10:00 </option>
                                                                                                    <option value="1100">11:00 </option>
                                                                                                    <option value="1200">12:00 </option>
                                                                                                    <option value="1300">13:00 </option>
                                                                                                    <option value="1400">14:00 </option>
                                                                                                    <option value="1500">15:00 </option>
                                                                                                    <option value="1600">16:00 </option>
                                                                                                    <option value="1700">17:00 </option>
                                                                                                    <option value="1800">18:00 </option>
                                                                                                    <option value="1900">19:00 </option>
                                                                                                    <option value="2000">20:00 </option>
                                                                                                    <option value="2100">21:00 </option>
                                                                                                    <option value="2200">22:00 </option>
                                                                                                    <option value="2300">23:00 </option>
                                                                                                </select>
                                                                                            </span>
                                                                                            <input type="hidden" id="backB6CpxDateTime" />
                                                                                        </li>
                                                                                        <!-- Time flexibility selection -->
                                                                                    </ul>
                                                                                </div>
                                                                                <!-- End of search date selection panel -->
                                                                            </td>
                                                                            <td class="hide">&nbsp;
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                    <tr>
                                                                        
                                                                        <td colspan="4">&nbsp;
                                                                            
                                                                        </td>
                                                                        <td class="hide">&nbsp;
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div id="nonComplexPanelTr">
                                                <table cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table cellspacing="0" cellpadding="0" class="tableSearchSelect">
                                                                <tr>
                                                                    <td class="hide">&nbsp;
                                                                        
                                                                    </td>
                                                                    <td width="100%">&nbsp;
                                                                        
                                                                    </td>
                                                                    <td>&nbsp;
                                                                        
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="hide">&nbsp;
                                                                        
                                                                    </td>
                                                                    <td style="padding: 0px">
                                                                        <div class="searchLocationsSelectionPanel">
                                                                            <table cellspacing="0" cellpadding="0" width="100%" border="0" id="tableLOCATION_1">
                                                                                <tr>
                                                                                    <td style="padding: 0px">
                                                                                        <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                            <tr id="TRB_LOCATION_1">
                                                                                                <td style="padding: 0px;">
                                                                                                    <input id="backB_LOCATION_1" type="hidden" />
                                                                                                    <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                        <tr>
                                                                                                            <td style="padding: 0px;">
                                                                                                                <span class="ImgError" id="WDSErrorImgTRB_LOCATION_1" style="display: none">&nbsp;</span><span
                                                                                                                    class="textBold">始发</span>城市或机场*
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr id="Table_B_LOCATION_1" <?php if($setfrom) echo ''; else echo 'style="display: none"'; ?>>
                                                                                                            <td nowrap="nowrap">
                                                                                                                <input name="B_LOCATION_1" id="B_LOCATION_1" _defaultvalue="<?php echo $from; ?>" type="text"
                                                                                                                    size="30" value="<?php echo $from; ?>" />
                                                                                                                <span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('B_LOCATION_1');">
                                                                                                                    &nbsp;</span>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr id="Table2_B_LOCATION_1" <?php if(!$setfrom) echo ''; else echo 'style="display: none"'; ?>>
                                                                                                            <td nowrap="nowrap">
                                                                                                                <select style="width: 190px;" name="From_B_LOCATION_1" id="From_B_LOCATION_1" onchange="selectChange('From_B_LOCATION_1','B_LOCATION_1')">
                                                                                                                    <option value="Los Angeles">Los Angeles</option>
                                                                                                                     <option  value="New York">New York</option>
                                                                                                                   
                                                                                                                    <option value="San Francisco" selected="selected" >San Francisco</option>
                                                                                                                    <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr id="SearchRangeDepartureRow_1">
                                                                                                            <td style="padding: 0px">
                                                                                                                <div style="padding: 0px; margin: 0px;">
                                                                                                                    <input style="padding: 0px; margin: 0px;" type="checkbox" name="B_SEARCH_RANGE_1"
                                                                                                                        id="Departure_Range_1" value="100" />
                                                                                                                    及 100 英里以内的机场
                                                                                                                </div>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>&nbsp;
                                                                                        
                                                                                    </td>
                                                                                    <td style="padding: 0px">
                                                                                        <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                            <tr id="TRE_LOCATION_1">
                                                                                                <td style="padding: 0px;">
                                                                                                    <input id="backE_LOCATION_1" type="hidden" />
                                                                                                    <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                                                                                        <tr>
                                                                                                            <td style="padding: 0px;">
                                                                                                                <span class="ImgError" id="WDSErrorImgTRE_LOCATION_1" style="display: none">&nbsp;</span><span
                                                                                                                    class="textBold">目的</span>城市或机场*
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr id="Table_E_LOCATION_1" <?php if($setto) echo ''; else echo 'style="display: none"'; ?>>
                                                                                                            <td id="arrivalLocationCell_1" nowrap="nowrap">
                                                                                                                <input name="E_LOCATION_1" id="E_LOCATION_1" _defaultvalue="<?php echo $to; ?>" type="text"
                                                                                                                    size="30" value="<?php echo $to; ?>" />
                                                                                                                <span class="ImgLookUp" title="单击此处可启动城市弹出窗口" onclick="javascript:etravel.openLocation('E_LOCATION_1');">
                                                                                                                    &nbsp;</span>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                            </tr>
                                                                                            <tr id="Table2_E_LOCATION_1"    <?php if(!$setto) echo ''; else echo 'style="display: none"'; ?>>
                                                                                                <td nowrap="nowrap">
                                                                                                    <select style="width: 190px;" name="From_E_LOCATION_1" id="From_E_LOCATION_1" onchange="selectChange('From_E_LOCATION_1','E_LOCATION_1')">
                                                                                                        <option selected value="Beijing">Beijing</option>
                                                                                                        <option value="Shanghai">Shanghai</option>
                                                                                                        <option style="font-weight: bold" value="Others">OTHERS CITIES(英文填写任何其它城市或机场）</option>
                                                                                                    </select>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr id="SearchRangeArrivalRow_1">
                                                                                                <td style="padding: 0px;">
                                                                                                    <div style="padding: 0px; margin: 0px;">
                                                                                                        <input style="padding: 0px; margin: 0px;" type="checkbox" name="E_SEARCH_RANGE_1"
                                                                                                            id="Arrival_Range_1" value="100" />
                                                                                                        及 100 英里以内的机场
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                            </div>
                                        </td>
                                        <td>&nbsp;
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="space hide">
                                        </td>
                                    </tr>
                                    <tr style="display:none;">
                                        <td class="hide">&nbsp;
                                            
                                        </td>
                                        <td >
                                            <span class="spellingLabel">* 如果不确定某个城市或机场的英文拼写，请输入前 3 个或更多字母并加上一个星号 (*)。 </span>
                                        </td>
                                        <td>&nbsp;
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hide">&nbsp;
                                            
                                        </td>
                                        <td class="lineSeparator">&nbsp;
                                            
                                        </td>
                                        <td>&nbsp;
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hide">&nbsp;
                                            
                                        </td>
                                        <td>&nbsp;
                                            
                                        </td>
                                        <td>&nbsp;
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hide">&nbsp;
                                            
                                        </td>
                                        <td style="padding: 0px">
                                            <!-- Search date selection panel (1) -->
                                            <div class="searchDateSelectionPanel" id="divB_DATE1">
                                                <ul class="selector date">
                                                    <!-- First selection: date (month and day) -->
                                                    <li class="value" id="DateCmp1">
                                                        <label for="Month1">
                                                            <span class="ImgError" id="WDSErrorImgB_DATE1" style="display: none">&nbsp;</span>启程日期</label>
                                                        <select name="Month1" id="Month1" onchange="etravel.keepCalendarGap('#divB_DATE1', 7);"
                                                            onkeypress="etravel.keepCalendarGap('#divB_DATE1', 7);">
                                                        </select>
                                                        <select id="Day1" name="Day1" onchange="etravel.keepCalendarGap('#divB_DATE1', 7);"
                                                            onkeypress="etravel.keepCalendarGap('#divB_DATE1', 7);">
                                                        </select>
                                                        <span id="linkCalendar1" title="单击此处可搜索日期" class="ImgCal">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        <span class="dayOfWeek" id="originDateDayOfWeekCell1" name="originDateDayOfWeekCell1">
                                                        </span>
                                                        <input type="hidden" id="backB1Date" />
                                                        <input type="hidden" name="B_DATE1" id="B_DATE1" value="" />
                                                    </li>
                                                    <!-- Date flexibility selection -->
                                                </ul>
                                                <ul class="selector time" id="timeSelector1">
                                                    <!-- Time selection -->
                                                    <li class="value" id="timeCell1">
                                                        <label for="Hours1">
                                                            启程时间
                                                        </label>
                                                        <span id="timeCellDropDown1">
                                                            <select id="Hours1" name="Hours1" onchange="ADVS.applyTimeWindow('1')">
                                                                <option value="ANY" selected="selected">任意时间 </option>
                                                                <option value="0000">00:00 </option>
                                                                <option value="0100">1:00 </option>
                                                                <option value="0200">2:00 </option>
                                                                <option value="0300">3:00 </option>
                                                                <option value="0400">4:00 </option>
                                                                <option value="0500">5:00 </option>
                                                                <option value="0600">6:00 </option>
                                                                <option value="0700">7:00 </option>
                                                                <option value="0800">8:00 </option>
                                                                <option value="0900">9:00 </option>
                                                                <option value="1000">10:00 </option>
                                                                <option value="1100">11:00 </option>
                                                                <option value="1200">12:00 </option>
                                                                <option value="1300">13:00 </option>
                                                                <option value="1400">14:00 </option>
                                                                <option value="1500">15:00 </option>
                                                                <option value="1600">16:00 </option>
                                                                <option value="1700">17:00 </option>
                                                                <option value="1800">18:00 </option>
                                                                <option value="1900">19:00 </option>
                                                                <option value="2000">20:00 </option>
                                                                <option value="2100">21:00 </option>
                                                                <option value="2200">22:00 </option>
                                                                <option value="2300">23:00 </option>
                                                            </select>
                                                        </span>
                                                        <input type="hidden" id="backB1DateTime" />
                                                    </li>
                                                    <!-- Time flexibility selection -->
                                                    <li class="flexibility" id="TimeWindowCmp1" style="display: none;">
                                                        <label for="B_TIME_WINDOW_1">
                                                            灵活范围</label>
                                                        <select name="B_TIME_WINDOW_1" id="B_TIME_WINDOW_1">
                                                            <option value="">全部显示</option>
                                                            <option value="1">+/- 1 小时 </option>
                                                            <option value="2" selected="selected">+/- 2 小时 </option>
                                                            <option value="3">+/- 3 小时 </option>
                                                            <option value="4">+/- 4 小时 </option>
                                                            <option value="5">+/- 5 小时 </option>
                                                            <option value="6">+/- 6 小时 </option>
                                                            <option value="7">+/- 7 小时 </option>
                                                            <option value="8">+/- 8 小时 </option>
                                                            <option value="9">+/- 9 小时 </option>
                                                            <option value="10">+/- 10 小时 </option>
                                                            <option value="11">+/- 11 小时 </option>
                                                            <option value="12">+/- 12 小时 </option>
                                                        </select>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- End of search date selection panel -->
                                            <div id="tableReturnDateDiv">
                                                <!-- Search date selection panel (2) -->
                                                <div class="searchDateSelectionPanel" id="divE_DATE2">
                                                    <ul class="selector date">
                                                        <!-- First selection: date (month and day) -->
                                                        <li class="value" id="DateCmp2">
                                                            <label for="Month2">
                                                                <span class="ImgError" id="WDSErrorImgE_DATE2" style="display: none">&nbsp;</span>返程日期</label>
                                                            <select name="Month2" id="Month2" onchange="etravel.keepCalendarGap('#divE_DATE2', 7);"
                                                                onkeypress="etravel.keepCalendarGap('#divE_DATE2', 7);">
                                                            </select>
                                                            <select id="Day2" name="Day2" onchange="etravel.keepCalendarGap('#divE_DATE2', 7);"
                                                                onkeypress="etravel.keepCalendarGap('#divE_DATE2', 7);">
                                                            </select>
                                                            <span id="linkCalendar2" title="单击此处可搜索日期" class="ImgCal">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                            <span class="dayOfWeek" id="originDateDayOfWeekCell2" name="originDateDayOfWeekCell2">
                                                            </span>
                                                            <input type="hidden" id="backE1Date" />
                                                            <input type="hidden" name="E_DATE1" id="E_DATE1" value="" />
                                                        </li>
                                                        <!-- Date flexibility selection -->
                                                    </ul>
                                                    <ul class="selector time" id="timeSelector2">
                                                        <!-- Time selection -->
                                                        <li class="value" id="timeCell2">
                                                            <label for="Hours2">
                                                                返程时间
                                                            </label>
                                                            <span id="timeCellDropDown2">
                                                                <select id="Hours2" name="Hours2" onchange="ADVS.applyTimeWindow('2')">
                                                                    <option value="ANY" selected="selected">任意时间 </option>
                                                                    <option value="0000">00:00 </option>
                                                                    <option value="0100">1:00 </option>
                                                                    <option value="0200">2:00 </option>
                                                                    <option value="0300">3:00 </option>
                                                                    <option value="0400">4:00 </option>
                                                                    <option value="0500">5:00 </option>
                                                                    <option value="0600">6:00 </option>
                                                                    <option value="0700">7:00 </option>
                                                                    <option value="0800">8:00 </option>
                                                                    <option value="0900">9:00 </option>
                                                                    <option value="1000">10:00 </option>
                                                                    <option value="1100">11:00 </option>
                                                                    <option value="1200">12:00 </option>
                                                                    <option value="1300">13:00 </option>
                                                                    <option value="1400">14:00 </option>
                                                                    <option value="1500">15:00 </option>
                                                                    <option value="1600">16:00 </option>
                                                                    <option value="1700">17:00 </option>
                                                                    <option value="1800">18:00 </option>
                                                                    <option value="1900">19:00 </option>
                                                                    <option value="2000">20:00 </option>
                                                                    <option value="2100">21:00 </option>
                                                                    <option value="2200">22:00 </option>
                                                                    <option value="2300">23:00 </option>
                                                                </select>
                                                            </span>
                                                            <input type="hidden" id="backE1DateTime" />
                                                        </li>
                                                        <!-- Time flexibility selection -->
                                                        <li class="flexibility" id="TimeWindowCmp2" style="display: none;">
                                                            <label for="B_TIME_WINDOW_2">
                                                                灵活范围</label>
                                                            <select name="B_TIME_WINDOW_2" id="B_TIME_WINDOW_2">
                                                                <option value="">全部显示</option>
                                                                <option value="1">+/- 1 小时 </option>
                                                                <option value="2" selected="selected">+/- 2 小时 </option>
                                                                <option value="3">+/- 3 小时 </option>
                                                                <option value="4">+/- 4 小时 </option>
                                                                <option value="5">+/- 5 小时 </option>
                                                                <option value="6">+/- 6 小时 </option>
                                                                <option value="7">+/- 7 小时 </option>
                                                                <option value="8">+/- 8 小时 </option>
                                                                <option value="9">+/- 9 小时 </option>
                                                                <option value="10">+/- 10 小时 </option>
                                                                <option value="11">+/- 11 小时 </option>
                                                                <option value="12">+/- 12 小时 </option>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- End of search date selection panel -->
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hide">&nbsp;
                                            
                                        </td>
                                        <td style="padding: 0px" class="hideLine">&nbsp;
                                            
                                        </td>
                                        <td>&nbsp;
                                            
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
    </div>
    </td> 
    <td >
    	<table cellpadding="0" cellspacing="0" width="410px" >
        <tr>
        <td class="hide" height="12px">  </td>
        </tr>
        <tr>
         <td width="170" valign="bottom">
            <table cellpadding="0" cellspacing="0" id="tableTravellers" >
                <tr>
                    <td class="textBold" colspan="2">
                        <span class="ImgError" id='WDSErrorImgtableTravellers' style="display: none">&nbsp;</span>旅客
                        <span class="ImgHelp" id="lnkTraInfo" style="padding-right: 15px" onmouseover="ShowTipsPassengers();"
                            onmouseout="HideTipsPassengers();">&nbsp;</span>
                        <div id="popup2" style="width: 200px; position: absolute; z-index: 1; visibility: hidden;
                            left: 192px; top: 500px;">
                            <iframe id="popup2iFrame" style="visibility: visible; width: 0px; height: 0px; z-index: 1;
                                left: 0px; position: absolute; top: 0px;" src="./html/web/blank.html" frameborder="0"
                                scrolling="no"></iframe>
                        </div>
                        <div id="popup1" style="position: absolute; z-index: 2; background-color: #FFFFFF;
                            border: 1px solid #F5F5F5; left: 192px; top: 500px; visibility: hidden;">
                            <table border="0" cellspacing="0" cellpadding="0" class="tablePU">
                                <tr>
                                    <td class="textBold">
                                        旅客信息
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 10px">
                                        - 婴儿：两岁以下。<br />
                                        - 儿童：两岁至十一岁。<br />
                                        - 成人:十二岁及以上。
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <input type="hidden" name="MAX_PAX_VALUE" value="9" />
                <input type="hidden" name="MAX_PAX_TYPES_VALUE" value="6" />
                <tr id="passengerADTRow" _ispassengercontainer="true">
                    <td>
                        成人(十二岁及以上）
                    </td>
                    <td id="ADTCell">
                        <select name="FIELD_ADT_NUMBER" id="FIELD_ADT_NUMBER">
                            <option value="0">0</option>
                            <option value="1" selected="selected">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                        <input type="hidden" name="ALLOW_PRIMARY_ADT" id="ALLOW_PRIMARY_ADT" value="Y" />
                    </td>
                </tr>
                <tr id="passengerCHDRow" _ispassengercontainer="true">
                    <td>
                        儿童（两岁至十一岁）
                    </td>
                    <td id="CHDCell">
                        <select name="FIELD_CHD_NUMBER" id="FIELD_CHD_NUMBER">
                            <option value="0" selected="selected">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                        <input type="hidden" name="ALLOW_PRIMARY_CHD" id="ALLOW_PRIMARY_CHD" value="Y" />
                    </td>
                </tr>
                <tr id="passengerINFANTSRow" _ispassengercontainer="true">
                    <td>
                        婴儿（两岁以下）
                    </td>
                    <td id="INFANTSCell">
                        <select name="FIELD_INFANTS_NUMBER" id="FIELD_INFANTS_NUMBER">
                            <option value="0" selected="selected">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </td>
                </tr>
            </table>
        </td>
        <td valign="bottom" id="fareTypeIdTD">
            <div>
                <!--<td valign="top" id="cabinTypeIdTD" >-->
                <!-- VP page so only one fare Familiy -->
                <div id="SDComplexCabinDiv">
                    <table cellpadding="0" cellspacing="0" id="tablePricingType">
                        <tr>
                            <td>
                                <span class="ImgError" id='WDSErrorImgtablePricingType' style="display: none">&nbsp;</span>
                            </td>
                            <td class="textBold">
                                价格类型
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                                
                            </td>
                            <td>
                                <select name="CABIN" id="cboCabinOption">
                                    <option value="F">头等舱</option>
                                    <option value="B">商务舱</option>
                                    <option value="E" selected="selected">经济舱</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br />
                </div>
                <div id="divMaxNumberOfStop">
                    <table cellpadding="0" cellspacing="0" id="tableMaxNumberOfStop">
                        <tr>
                            <td>&nbsp;
                                
                            </td>
                            <td class="textBold">
                                最高停靠次数
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                                
                            </td>
                            <td>
                                <select name="AIR_MAX_CONNECTIONS" id="AIR_MAX_CONNECTIONS">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option selected value="2">2</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
        </td>
        <td width="145px" valign="bottom">
            <div id="SDComplexAirlinesDiv">
                <table cellpadding="0" cellspacing="0" id="tableTheseAirlinesOnly">
                    <tr>
                        <td class="textBold" colspan="2">
                            <span class="ImgError" id='WDSErrorImgtableTheseAirlinesOnly' style="display: none">
                                &nbsp;</span>仅这些航空公司
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1
                        </td>
                        <td  nowrap="nowrap"><input name="AIRLINE_1" id="AIRLINE_1" type="text" size="14" maxlength="2" />
                            <span class="ImgLookUp" title="单击此处可启动首选航空公司弹出窗口" onclick="javascript:etravel.openAirLine('AIRLINE_1');">
                                &nbsp;</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            <input name="AIRLINE_2" id="AIRLINE_2" type="text" size="14" maxlength="2" />
                            <span class="ImgLookUp" title="单击此处可启动首选航空公司弹出窗口" onclick="javascript:etravel.openAirLine('AIRLINE_2');">
                                &nbsp;</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3
                        </td>
                        <td>
                            <input name="AIRLINE_3" id="AIRLINE_3" type="text" size="14" maxlength="2" />
                            <span class="ImgLookUp" title="单击此处可启动首选航空公司弹出窗口" onclick="javascript:etravel.openAirLine('AIRLINE_3');">
                                &nbsp;</span>
                        </td>
                    </tr>
                </table>
            </div>
            <!--</td>-->
            </div>
        </td>
        </tr>
        </table>
        <table width="100%" cellpadding="0" cellspacing="0" style="height:115px; width:100%; "  >
          <tr>
            <td style="text-align:right; vertical-align:bottom;" ><a href="javascript:ADVS.check();" onclick="return !ADVS.alreadySubmited;" id="btnSearchADVSNFS"><img border="0" src="images/btn_search.jpg" /></a></td>
          </tr>
        </table>
    </td>
    
    </tr>
    <tr>
        <td colspan="4">&nbsp;
            
        </td>
    </tr>

    </table> </td> </tr> </table> </form>
    <table width="100%" cellpadding="0" cellspacing="1" class="tableSearchNavHeader" style="display:none;">
        <tr>
        <td valign="middle" nowrap="nowrap">
        <span style="font-size:12px; color:red; "><a href="paytype.php" target="_parent" style="color:red;display:none;">United, Continental, All Nippon 及 Delta信用卡支付，需另加3%手续费。</a></span>
        </td>
            <td align="right" style="padding-left:0px;">
                <div >
                    <a href="javascript:ADVS.check();" onclick="return !ADVS.alreadySubmited;" id="btnSearchADVSNFS"><img border="0" src="images/btn_search.jpg" /></a><span id="btnEdgeSearchADVSNFS"></span></div>
            </td>
        </tr>
    </table>

    <sc:parameter id="siteWarnServValueLost" key="SITE_WARN_SERV_VALUELOST" type="java.lang.Boolean"
        display="false" />

    <script language="javascript" type="text/javascript">
function initWDSErrorBE () {
WDSError.init();
WDSError.setTitle(WDSMessage.getMessage("WDSError.Title.E"));


<!--test-->

<!--end test-->
if (WDSError.hasError()) {
WDSError.show();
}
}
</script>

    <script language="JavaScript" type="text/JavaScript">
<!--
        // For Opera 7.02 who does not realise on time (when page is too large) that the flexible_chk_* is checked
        if (navigator.userAgent.toLowerCase().indexOf('opera') != -1) {
            ADVS_pageOnLoad();
        }
-->
</script>

    </td> </tr>
    <tr>
        <td class="layoutBottom">
        </td>
    </tr>
    </table> 
    
 <script type="text/javascript">
$(function() {
	function format(row) {
		return row.city + " , " + row.airport  + " , " + row.state + " , " + row.code ;
	}
	$("#B_LOCATION_1").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	$("#E_LOCATION_1").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	
	
	$("#B_LOCATION_1_Cpx").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	$("#E_LOCATION_1_Cpx").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	
	
	$("#B_LOCATION_2_Cpx").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	$("#E_LOCATION_2_Cpx").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 310,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	$("#B_LOCATION_3_Cpx").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	$("#E_LOCATION_3_Cpx").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	$("#B_LOCATION_4_Cpx").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	$("#E_LOCATION_4_Cpx").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	$("#B_LOCATION_5_Cpx").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	$("#E_LOCATION_5_Cpx").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	$("#B_LOCATION_6_Cpx").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
	$("#E_LOCATION_6_Cpx").autocomplete('./autocomplete/getcity.php', {
		minChars: 3,
		width: 450,
		multiple: false,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.city,
					result: row.code
				}
			});
		},
		formatItem: function(item) {
			return format(item);
		}
	}).result(function(e, item) {});
});


</script>
<script type="text/javascript">
var city =  '<?php echo $CityName;?>';
if(city !=null && city != '')
{
	var From_B_LOCATION_1=document.getElementById('From_B_LOCATION_1');
	for(var i=0;i<From_B_LOCATION_1.options.length;i++)
	{
		if(From_B_LOCATION_1.options[i].value==city)
		{ 
			From_B_LOCATION_1.value = city;
			document.getElementById("B_LOCATION_1").value = city;
			break;
		}
	}
}
</script>
</body>
</html>
