function ADVS() {
    this.num_field = null;
    this.passengerList = null;
    this.timeListArray = 0;
    this.timeListArrayText = 0;
    this.timeListArrayMP = 0;
    this.timeListArrayTextMP = 0;
    this.timeWindowEnabledFlows = 0;
    this.timeWindowOptionLabel = "";
    this.fareTypeLists = 0;
    this.fareTypeListSelectedValue = new Array();
    this.enabledItineraries = 0;
    this.enabledItinerariesPreviousFlow = "";
    this.searchDateSelectionPanelsLineUp = 0;
    this.isRadioFlowTypeDisplayed = false;
    this.complexNbSteps = 0;
    this.tripType = "R";
    this.previousTripType = "";
    this.searchFlow = "SD";
    this.previousSearchFlow = "";
    this.OneWayDateListNotInitialized = true;
    this.RoundTripDateListNotInitialized = true;
    this.ComplexDateListNotInitialized = true;
    this.LocationORNotInitialized = true;
    this.LocationMNotInitialized = true;
    this.FlexibleByONotInitialized = true;
    this.FlexibleByRNotInitialized = true;
    this.FlexibleByMNotInitialized = true;
    this.CommercialFFRNotInitialized = true;
    this.logoffUrl = null;
    this.check = ADVS_check;
    this.preCheck = ADVS_preCheck;
    this.__checkProfileFields = ADVS_checkProfileFields;
    this.initTimeList = ADVS_initTimeList;
    this.initTimeWindowEnabledFlows = ADVS_initTimeWindowEnabledFlows;
    this.initFareTypeList = ADVS_initFareTypeList;
    this.initEnabledItineraries = ADVS_initEnabledItineraries;
    this.initSearchDateSelectionPanelsLineUp = ADVS_initSearchDateSelectionPanelsLineUp;
    this.applySearchFlow = ADVS_applySearchFlow;
    this.showTripTypeForm = ADVS_showTripTypeForm;
    this.showOneWayTripForm = ADVS_showOneWayTripForm;
    this.showRoundTripForm = ADVS_showRoundTripForm;
    this.showComplexTripForm = ADVS_showComplexTripForm;
	this.showAgentTripForm = ADVS_showAgentTripForm;
    this.complexUpdateDates = ADVS_complexUpdateDates;
    this.applyTimeWindow = ADVS_applyTimeWindow;
    this.applyTimeWindowEnabledFlows = ADVS_applyTimeWindowEnabledFlows;
    this.applyRangeCheckbox = ADVS_applyRangeCheckbox;
    this.applyDirectFlight = ADVS_applyDirectFlight;
    this.applyMaxNumberOfStops = ADVS_applyMaxNumberOfStops;
    this.applyTimeListChange = ADVS_applyTimeListChange;
    this.applyFareTypeListChange = ADVS_applyFareTypeListChange;
    this.applyEnabledItineraries = ADVS_applyEnabledItineraries;
    this.applySearchDateSelectionPanelsLineUp = ADVS_applySearchDateSelectionPanelsLineUp;
    this.applyFareCabinFlexibilityAirlines = ADVS_applyFareCabinFlexibilityAirlines;
    this.applyGlobalFlexible = ADVS_applyGlobalFlexible;
    this.showHideFlexibleBy = ADVS_showHideFlexibleBy;
    this.setComplexNumberOfSteps = ADVS_setComplexNumberOfSteps;
    this.applyComplexNumberOfSteps = ADVS_applyComplexNumberOfSteps;
    this.callCityLookupPopup = ADVS_callCityLookupPopup;
    this.logoff = ADVS_logoff;
    this.logoffCallback = ADVS_logoffCallback;
    this.applyTripTypeToCFF = ADVS_applyTripTypeToCFF;
    this.initCommercialFamilyList = ADVS_initCommercialFamilyList;
    this.commercialFamilyList = 0;
    this.complexItineraryMode = "OJ";
    this.selectTheDefaultCFF = ADVS_selectTheDefaultCFF;
    this.nbFareFamilyDropDown = 0;
    this.timeComplexEnabledFlows = 0;
    this.initTimeComplexEnabledFlows = ADVS_initTimeComplexEnabledFlows;
    this.applyTimeComplex = ADVS_applyTimeComplex;
    this.applyTimeComplexEnabledFlows = ADVS_applyTimeComplexEnabledFlows;
    this.setSearchFlow = ADVS_setSearchFlow;
    this.getSearchFlow = ADVS_getSearchFlow;
    this.pageOnLoad = ADVS_pageOnLoad;
    this.SAVDatesCities = ADVS_SAVDatesCities;
    this.alreadySubmited = false;
    this.logoffAlreadySubmited = false;
    this.isMasterPricerSearch = false;
    this.isWebfaresSearch = false;
    this.isWebSearchButton = false;
    this.isRedemptionEnable = false;
    this.manageMPCalendarFields = ADVS_manageMPCalendarFields;
}
var ADVS = new ADVS();

function ADVS_check() {
    if (ADVS.alreadySubmited) {} else {
        ADVS.alreadySubmited = true;
        WDSError.init();
        this.preCheck();
        if (WDSError.hasError()) {
            WDSError.show();
            ADVS.alreadySubmited = false;
        } else {
            WDSCommon.updateTag(document.ADVSForm, "backPricingType", ADVS.searchFlow);
            this.SAVDatesCities();
            document.ADVSForm.submit();
            //WDSWaitingImage.pleaseWait("wait");
        }
    }
}

function ADVS_preCheck() {
    this.passengerList.resetNumOfHiddenPax();
    if (this.tripType != 'M') {
        checkNoComplexLocationDate();
    } else {
        checkComplexLocationDate();
    }
    this.passengerList.check();
    this.passengerList.updateWDSErrors();
    checkPreferredAirlines();
    if (this.includeProfileFields) {
        this.__checkProfileFields();
    }
}

function checkNoComplexLocationDate() {
    var b_obj = WDSCommon.getTagValue(document.ADVSForm.B_LOCATION_1);
    var e_obj = WDSCommon.getTagValue(document.ADVSForm.E_LOCATION_1);
    if (b_obj == "") WDSError.add(WDSMessage.getMessage(10004), document.ADVSForm.B_LOCATION_1);
    if (e_obj == "") WDSError.add(WDSMessage.getMessage(10005), document.ADVSForm.E_LOCATION_1);
    else if (b_obj == e_obj) {
        WDSError.add(WDSMessage.getMessage(10001), document.ADVSForm.B_LOCATION_1);
        WDSError.add(" ", document.ADVSForm.E_LOCATION_1, "E", false);
    }
    if (ADVS.tripType == 'R') {
        var beginDate = etravel.getDateTimeComposed("#divB_DATE1"); //DateList1.getDateTimeComposed(DateList1.grpStart);
        var endDate = etravel.getDateTimeComposed("#divE_DATE2"); // DateList1.getDateTimeComposed(DateList1.grpEnd);
        if (beginDate.getTime() > endDate.getTime()) {
            WDSError.add(WDSMessage.getMessage(10000), document.ADVSForm.B_DATE1);
            WDSError.add(" ", document.ADVSForm.E_DATE1, "E", false);
        }
    }
}

function checkComplexLocationDate() {
    var oneFilled = false;
    for (var i = 1; i < ADVS.complexNbSteps; i++) {
        var obj = eval("document.ADVSForm.B_LOCATION_" + i + "_Cpx");
        var e_obj = eval("document.ADVSForm.E_LOCATION_" + i + "_Cpx");
        var bLoc = WDSCommon.getTagValue(obj);
        var eLoc = WDSCommon.getTagValue(e_obj);
        if (bLoc != "" && eLoc == "") WDSError.add(WDSMessage.getMessage(10005), e_obj);
        if (eLoc != "" && bLoc == "") WDSError.add(WDSMessage.getMessage(10004), obj);
        if (eLoc != "" && bLoc == eLoc) {
            WDSError.add(WDSMessage.getMessage(10000), obj);
            WDSError.add(" ", e_obj, "E", false);
        }
        if (eLoc != "" || bLoc != "") oneFilled = true;
    }
    if (!oneFilled) {
        WDSError.add(WDSMessage.getMessage(10005), document.ADVSForm.E_LOCATION_1_Cpx);
        WDSError.add(WDSMessage.getMessage(10004), document.ADVSForm.B_LOCATION_1_Cpx);
    }
    var posSegment = 0;
    do {
        posSegment++;
        var obj = eval("document.ADVSForm.B_LOCATION_" + posSegment + "_Cpx");
        var e_obj = eval("document.ADVSForm.E_LOCATION_" + posSegment + "_Cpx");
        bLoc = WDSCommon.getTagValue(obj);
        eLoc = WDSCommon.getTagValue(e_obj);
    } while (eLoc == "" && bLoc == "" && posSegment < 6);
    if (posSegment != ADVS.complexNbSteps) {
        //eval("var tmpDateList = DateList" + posSegment + "Cpx;");
        var currentTime = etravel.getDateTimeComposed('#divB_DATE'+ posSegment +'Cpx').getTime(); // tmpDateList.getDateTimeComposed(tmpDateList.grpStart).getTime();
        var prevDatePos = posSegment;
        for (var i = posSegment + 1; i < ADVS.complexNbSteps + 1; i++) {
            var obj = eval("document.ADVSForm.B_LOCATION_" + i + "_Cpx");
            var e_obj = eval("document.ADVSForm.E_LOCATION_" + i + "_Cpx");
            bLoc = WDSCommon.getTagValue(obj);
            eLoc = WDSCommon.getTagValue(e_obj);
            if (eLoc != "" || bLoc != "") {
                // eval("var tmpDateList = DateList" + i + "Cpx;");
                var nextTime = etravel.getDateTimeComposed('#divB_DATE' + i + 'Cpx').getTime(); // tmpDateList.getDateTimeComposed(tmpDateList.grpStart).getTime();
                if (nextTime < currentTime) {
                    eval("WDSError.add(WDSMessage.getMessage(10000), document.ADVSForm.B_DATE" + i + "Cpx);");
                    eval("WDSError.add(' ', document.ADVSForm.B_DATE" + prevDatePos + "Cpx,'E',false);");
                }
                prevDatePos = i;
                currentTime = nextTime;
            }
        }
    }
}

function ADVS_SAVDatesCities() {
    document.getElementById("backTRIP_TYPE").value = document.ADVSForm.TRIP_TYPE.value;
    if (this.tripType != 'M') {
        document.getElementById("backB_LOCATION_1").value = document.getElementById("B_LOCATION_1").value;
        document.getElementById("backE_LOCATION_1").value = document.getElementById("E_LOCATION_1").value;
        var beginDate = etravel.getDateTimeComposedString("#divB_DATE1"); //DateList1.getDateTimeComposedString(DateList1.grpStart);
        document.getElementById("backB1Date").value = beginDate;
        var backBeginTime = document.getElementById("backB1DateTime");
        if (backBeginTime) {
            var beginTime = etravel.getTimeString("#divB_DATE1"); // DateList1.getTimeString(DateList1.grpStart);
            backBeginTime.value = beginTime;
        }
        var flexibleByElement = document.getElementById("DATE_RANGE_VALUE_1");
        var flexibleByBackElement = document.getElementById("backDATE_RANGE_VALUE_1");
        if (flexibleByElement && flexibleByBackElement) {
            flexibleByBackElement.value = flexibleByElement.value;
        }
        if (!this.RoundTripDateListNotInitialized) {
            var endDate = etravel.getDateTimeComposedString("#divE_DATE2"); // DateList1.getDateTimeComposedString(DateList1.grpEnd);
            document.getElementById("backE1Date").value = endDate;
            var backEndTime = document.getElementById("backE1DateTime");
            if (backEndTime) {
                var endTime = etravel.getTimeString("#divE_DATE2"); // DateList1.getTimeString(DateList1.grpEnd);
                backEndTime.value = endTime;
            }
            var flexibleByElement = document.getElementById("DATE_RANGE_VALUE_2");
            var flexibleByBackElement = document.getElementById("backDATE_RANGE_VALUE_2");
            if (flexibleByElement && flexibleByBackElement) {
                flexibleByBackElement.value = flexibleByElement.value;
            }
        }
    }
    if (!this.ComplexDateListNotInitialized) {
        for (var i = 1; i < this.complexNbSteps; i++) {
            eval("document.getElementById('backB_LOCATION_" + i + "_Cpx').value=document.getElementById('B_LOCATION_" + i + "_Cpx').value;");
            eval("document.getElementById('backE_LOCATION_" + i + "_Cpx').value=document.getElementById('E_LOCATION_" + i + "_Cpx').value;");
            // eval("var tmpDateList = DateList" + i + "Cpx;");
            var dateCpx = etravel.getDateTimeComposedString('#divB_DATE' + i + 'Cpx'); // tmpDateList.getDateTimeComposedString(tmpDateList.grpStart);
            eval("document.getElementById('backB" + i + "CpxDate').value=dateCpx;");
            eval("var backCpxTime = document.getElementById('backB" + i + "CpxDateTime');");
            if (backCpxTime) {
                var timeCpx = tmpDateList.getTimeString(tmpDateList.grpStart);
                backCpxTime.value = timeCpx;
            }
        }
        var flexibleByElement = document.getElementById("DATE_RANGE_VALUE_Cpx");
        var flexibleByBackElement = document.getElementById("backDATE_RANGE_VALUE_Cpx");
        if (flexibleByElement && flexibleByBackElement) {
            flexibleByBackElement.value = flexibleByElement.value;
        }
        var flexibleByElement = document.ADVSForm.FLEXIBLE_RADIO_Cpx;
        var flexibleByBackElement = document.getElementById("backFLEXIBLE_RADIO_Cpx");
        if (flexibleByElement && flexibleByBackElement) {
            for (var i = 0; i < flexibleByElement.length; i++) {
                if (flexibleByElement[i].checked) {
                    flexibleByBackElement.value = flexibleByElement[i].value;
                }
            }
        }
    }
    for (var i = 1; i <= this.nbFareFamilyDropDown; i++) {
        commercialFF = document.getElementById("COMMERCIAL_FARE_FAMILY_" + i);
        if (commercialFF) {
            WDSCommon.updateTag(document.ADVSForm, "backCOMMERCIAL_FARE_FAMILY_" + i, commercialFF.value);
        }
    }
}

function checkPreferredAirlines() {
    if (document.getElementById("tableTheseAirlinesOnly")) {
        for (i = 1; i < 4; i++) {
            eval("var val=WDSCommon.getTagValue(document.ADVSForm.AIRLINE_" + i + ");");
            if (val.length > 0 && val.length != 2) {
                eval("WDSError.add(WDSMessage.getMessage(10015), document.ADVSForm.AIRLINE_" + i + ");");
            }
        }
    }
}

function ADVS_checkProfileFields() {
    var frequentFlyerAirlineField = document.getElementById("frequentFlyerAirline");
    var frequentFlyerNumberField = document.getElementById("frequentFlyerNumber");
    var tierLevelField = document.getElementById("tierLevel");
    if (frequentFlyerAirlineField && frequentFlyerAirlineField.value == "") {
        WDSError.add(WDSMessage.getMessage(30005), frequentFlyerAirlineField);
    }
    if (frequentFlyerNumberField && frequentFlyerNumberField.value == "") {
        WDSError.add(WDSMessage.getMessage(1305), frequentFlyerNumberField);
    }
    if (tierLevelField && tierLevelField.value == "") {
        WDSError.add(WDSMessage.getMessage(1040).replace(/%s/gi, "tier level"), tierLevelField);
    }
}

function ADVS_showTripTypeForm(type) {
	if (type == "A") 
	{
		this.showAgentTripForm();
	}
	else
	{	
		this.previousTripType = this.tripType;
		this.tripType = type;
		document.ADVSForm.TRIP_TYPE.value = type;
		if (document.getElementById("btnSearchADVSVP") || document.getElementById("btnSearchADVSNFS") || document.getElementById("btnSearchADVSMP")) {
			this.applyEnabledItineraries(type);
			if (type == "O") this.showOneWayTripForm();
			else if (type == "R") this.showRoundTripForm();		
			else this.showComplexTripForm();
		}
	}
}

function ADVS_showRoundTripForm() {
    applyClassName("oneWayTab", "t2_unselected");
    applyClassName("complexTab", "t2_unselected");
	applyClassName("agentTab", "t2_unselected");
    applyClassName("roundTripTab", "t1_selected");
    applyStyle("complexDataId", "hidden", "none");
    applyStyle("nonComplexPanelTr", "visible", "block");
    applyStyle("tableReturnDateDiv", "visible", "block");
	applyStyle("tableTravellers", "visible", "block");
	applyStyle("tableSearch", "visible", "block");
	applyStyle("SDComplexAirlinesDiv", "visible", "block");
	applyStyle("SDComplexCabinDiv", "visible", "block");
	applyStyle("divMaxNumberOfStop", "visible", "block");
	applyStyle("tableAgentDiv", "hidden", "none");
	
	
	
}

function ADVS_showOneWayTripForm() {
    applyClassName("roundTripTab", "t1_unselected");
    applyClassName("complexTab", "t2_unselected");
	applyClassName("agentTab", "t2_unselected");
    applyClassName("oneWayTab", "t2_selected");
    applyStyle("complexDataId", "hidden", "none");
    applyStyle("nonComplexPanelTr", "visible", "block");
    applyStyle("tableReturnDateDiv", "hidden", "none");
	applyStyle("tableTravellers", "visible", "block");
	applyStyle("tableSearch", "visible", "block");
	applyStyle("SDComplexAirlinesDiv", "visible", "block");
	applyStyle("SDComplexCabinDiv", "visible", "block");
	applyStyle("divMaxNumberOfStop", "visible", "block");
	applyStyle("tableAgentDiv", "hidden", "none");
}

function ADVS_showComplexTripForm() {
    applyClassName("roundTripTab", "t1_unselected");
    applyClassName("oneWayTab", "t2_unselected");
	applyClassName("agentTab", "t2_unselected");
    applyClassName("complexTab", "t2_selected");
    cleanAndUpdateLocations();
    this.complexUpdateDates();
    applyStyle("complexDataId", "visible", "block");
    applyStyle("nonComplexPanelTr", "hidden", "none");
    applyStyle("tableReturnDateDiv", "hidden", "none");
	applyStyle("tableTravellers", "visible", "block");
	applyStyle("tableSearch", "visible", "block");
	applyStyle("SDComplexAirlinesDiv", "visible", "block");
	applyStyle("SDComplexCabinDiv", "visible", "block");
	applyStyle("divMaxNumberOfStop", "visible", "block");
	applyStyle("tableAgentDiv", "hidden", "none");
}
function ADVS_showAgentTripForm() {
    applyClassName("roundTripTab", "t1_unselected");
    applyClassName("oneWayTab", "t2_unselected");
	applyClassName("agentTab", "t2_selected");
    applyClassName("complexTab", "t2_unselected");
    cleanAndUpdateLocations();
    this.complexUpdateDates();
    applyStyle("complexDataId", "hidden", "none");
    applyStyle("nonComplexPanelTr", "hidden", "none");
    applyStyle("tableReturnDateDiv", "hidden", "none");
	applyStyle("tableTravellers", "hidden", "none");
	
	applyStyle("tableSearch", "hidden", "none");
	applyStyle("SDComplexAirlinesDiv", "hidden", "none");
	applyStyle("SDComplexCabinDiv", "hidden", "none");
	
	applyStyle("divMaxNumberOfStop", "hidden", "none");
	applyStyle("tableAgentDiv", "visible", "block");

}

function ADVS_applyEnabledItineraries(tripType) {
    var previousFlow = this.searchFlow;
    var isSearchFlowEnabled = false;
    for (var i = 0; i < this.enabledItineraries[tripType].length && !isSearchFlowEnabled; i++) {
        if (this.enabledItineraries[tripType][i] == this.searchFlow) {
            isSearchFlowEnabled = true;
        }
    }
    if (!isSearchFlowEnabled) {
        nextFlow = this.enabledItineraries[tripType][0];
        this.applySearchFlow(nextFlow);
    }
    else if (!this.isRadioFlowTypeDisplayed && this.enabledItineraries[tripType].length > 1) {
        this.applySearchFlow(this.enabledItinerariesPreviousFlow);
    }
    if (this.isRadioFlowTypeDisplayed && this.enabledItineraries[tripType].length == 1) {
        applyStyle("radioFlowType", "hidden", "none");
        this.isRadioFlowTypeDisplayed = false;
        this.enabledItinerariesPreviousFlow = previousFlow;
    }
    else if (!this.isRadioFlowTypeDisplayed && this.enabledItineraries[tripType].length > 1) {
        DOM.getElementById("radio" + this.searchFlow).checked = true;
        applyStyle("radioFlowType", "visible", "block");
        this.isRadioFlowTypeDisplayed = true;
    }
}

function ADVS_applyFareTypeListChange(searchFlow) {
    var currentFareTypeList = DOM.getElementById("cboCabinOption");
    if (!currentFareTypeList) {
        return;
    }
    var cabinListIndex = this.fareTypeLists.indexLists[searchFlow];
    if (!cabinListIndex || cabinListIndex == "") {
        return;
    }
    if (cabinListIndex == this.previousFareTypeListIndex) {
        return;
    }
    this.previousFareTypeListIndex = cabinListIndex;
    var cabinList = this.fareTypeLists.cabinLists[cabinListIndex];
    var fareTypeListSelectedValue = currentFareTypeList.value;
    currentFareTypeList.options.length = cabinList.length;
    for (var i = 0; i < cabinList.length; i++) {
        currentFareTypeList.options[i].value = cabinList[i][0];
        currentFareTypeList.options[i].text = cabinList[i][1];
        if (currentFareTypeList.options[i].value == fareTypeListSelectedValue) {
            currentFareTypeList.options[i].selected = true;
        }
    }
    return;
}

function ADVS_applyTimeListChange(searchFlow) {
    if (this.previousSearchFlow != "" && this.previousSearchFlow != "MP" && searchFlow != "MP") {
        return;
    }
    var currentDepartureList = DOM.getElementById("Hours1");
    var currentDepartureSelectvalue = currentDepartureList.value;
    var currentArrivalList = DOM.getElementById("Hours2");
    var currentArrivalSelectvalue = currentArrivalList.value;
    if (searchFlow != "MP") {
        if (currentDepartureSelectvalue == "EVENING" || currentDepartureSelectvalue == "MORNING" || currentDepartureSelectvalue == "AFTERNOON") {
            currentDepartureSelectvalue = "ANY";
        }
        if (currentArrivalSelectvalue == "EVENING" || currentArrivalSelectvalue == "MORNING" || currentArrivalSelectvalue == "AFTERNOON") {
            currentArrivalSelectvalue = "ANY";
        }
    }
    var isComplexModeExist = false;
    var hours1Cpx = DOM.getElementById("Hours1Cpx");
    if (hours1Cpx && hours1Cpx.tagname == "SELECT") {
        isComplexModeExist = true;
    }
    var timeList;
    var timeListText;
    if (searchFlow != "MP") {
        timeList = this.timeListArray;
        timeListText = this.timeListArrayText;
    }
    else {
        timeList = this.timeListArrayMP;
        timeListText = this.timeListArrayTextMP;
    }
    if (typeof currentDepartureList.options != 'undefined') {
        currentDepartureList.options.length = 0;
        currentArrivalList.options.length = 0;
        for (var i = 0; i < timeList.length; i++) {
            currentDepartureList.options[i] = new Option(timeListText[i], timeList[i]);
            if (currentDepartureList.options[i].value == currentDepartureSelectvalue) {
                currentDepartureList.options[i].selected = true;
            }
            currentArrivalList.options[i] = new Option(timeListText[i], timeList[i]);
            if (currentArrivalList.options[i].value == currentArrivalSelectvalue) {
                currentArrivalList.options[i].selected = true;
            }
        }
        if (isComplexModeExist) {
            for (var i = 1; i < 7; i++) {
                var cpxDepartureList = DOM.getElementById("Hours" + i + "Cpx");
                var cpxDepartureSelectvalue = cpxDepartureList.value;
                if (cpxDepartureSelectvalue == "EVENING" || cpxDepartureSelectvalue == "MORNING" || cpxDepartureSelectvalue == "AFTERNOON") {
                    cpxDepartureSelectvalue = "ANY";
                }
                cpxDepartureList.options.length = timeList.length;
                for (var k = 0; k < timeList.length; k++) {
                    cpxDepartureList.options[k].value = timeList[k];
                    cpxDepartureList.options[k].text = timeListText[k];
                    if (cpxDepartureList.options[k].value == cpxDepartureSelectvalue) {
                        cpxDepartureList.options[k].selected = true;
                    }
                }
            }
        }
    }
    return;
}

function ADVS_applyTimeWindow(index, searchFlow) {
    var timeDropdown = DOM.getElementById("Hours" + index);
    var timeWindowDropdown = DOM.getElementById("B_TIME_WINDOW_" + index);
    if (!timeDropdown || !timeWindowDropdown) {
        return;
    }
    var timeValue = timeDropdown.value;
    var timeWindowValue = timeWindowDropdown.value;
    var checkMaxPossibleTimeWindow = true;
    if (!searchFlow) {
        searchFlow = this.searchFlow;
        checkMaxPossibleTimeWindow = false;
    }
    var hideTimeWindow = true;
    var maxTimeWindow = 23;
    for (var i = 0; i < this.timeWindowEnabledFlows.length; i++) {
        if (searchFlow == this.timeWindowEnabledFlows[i].searchPage) {
            hideTimeWindow = false;
            maxTimeWindow = this.timeWindowEnabledFlows[i].maxTimeWindow;
        }
    }
    if (!hideTimeWindow && checkMaxPossibleTimeWindow) {
        if (typeof timeWindowDropdown.options != 'undefined') {
            var previousLength = timeWindowDropdown.options.length;
            if (previousLength < maxTimeWindow + 1) {
                timeWindowDropdown.options.length = maxTimeWindow + 1;
                for (var i = previousLength; i < maxTimeWindow + 1; i++) {
                    timeWindowDropdown.options[i].value = i;
                    timeWindowDropdown.options[i].text = "+/- " + i + " " + this.timeWindowOptionLabel;
                }
            }
            else if (previousLength > maxTimeWindow + 1) {
                if (timeWindowValue > maxTimeWindow) {
                    timeWindowDropdown.options[maxTimeWindow].selected = true;
                }
                timeWindowDropdown.options.length = maxTimeWindow + 1;
            }
        }
    }
    if (timeValue == "ANY") {
        hideTimeWindow = true;
    }
    if (hideTimeWindow) {
        applyStyle("TimeWindowCmp" + index, "hidden", "none");
    }
    else {
        applyStyle("TimeWindowCmp" + index, "visible", "");
    }
}

function ADVS_applyTimeComplex(index, searchFlow) {
    var timeSelector = DOM.getElementById("timeSelector" + index);
    if (!timeSelector) {
        return;
    }
    if (!searchFlow) {
        searchFlow = this.searchFlow;
    }
    var hideTime = true;
    if (searchFlow == "FP") {
        var flexibilitySelect = DOM.getElementById("FLEXIBLE_RADIO_Cpx0");
        if (flexibilitySelect != null && flexibilitySelect.checked) {
            hideTime = false;
        }
    }
    for (var i = 0; i < this.timeComplexEnabledFlows.length; i++) {
        if (searchFlow == this.timeComplexEnabledFlows[i].searchPage) {
            hideTime = false;
        }
    }
    if (hideTime) {
        applyStyle("timeSelector" + index, "hidden", "none");
        var hoursSelect = DOM.getElementById("Hours" + index);
        if (hoursSelect != null) hoursSelect.selectedIndex = 0;
    }
    else {
        applyStyle("timeSelector" + index, "visible", "");
    }
}

function applyClassName(cmpName, newClassName) {
    var cmp = DOM.getElementById(cmpName);
    if (cmp) cmp.className = newClassName;
}

function applyStyle(cmpName, visibilityType, displayType) {
    var cmp = DOM.getElementById(cmpName);
    if (cmp != null) {
        cmp.style.visibility = visibilityType;
        if (navigator.userAgent.toLowerCase().indexOf('opera 8') != -1) {
            cmp.style.display = "";
            if (visibilityType == "visible") cmp.style.height = "";
            else cmp.style.height = "0px";
        } else {
            cmp.style.height = "";
            cmp.style.display = displayType;
        }
    }
}

function ADVS_applyFareCabinFlexibilityAirlines(searchFlow) {
    var visible = ["visible", "block"];
    var hidden = ["hidden", "none"];
    var fareFamilyDisplay = hidden;
    var displayFlexibleBy = false;
    var cabinDisplay = visible;
    var airlinesDisplay = visible;
    var displayTimeDropdown = true;
    if (searchFlow == "FP") {
        fareFamilyDisplay = visible;
        displayFlexibleBy = true;
        cabinDisplay = hidden;
        airlinesDisplay = hidden;
        displayTimeDropdown = false;
    }
    if (searchFlow == "SD" && this.isRedemptionEnable) {
        fareFamilyDisplay = hidden;
        displayFlexibleBy = true;
        cabinDisplay = visible;
        airlinesDisplay = visible;
        displayTimeDropdown = false;
    }
    if (searchFlow == "FP" && this.isRedemptionEnable) {
        fareFamilyDisplay = hidden;
        cabinDisplay = visible;
    }
    applyStyle("SDComplexCabinDiv", cabinDisplay[0], cabinDisplay[1]);
    applyStyle("SDComplexAirlinesDiv", airlinesDisplay[0], airlinesDisplay[1]);
    applyStyle("fareFamilyDiv", fareFamilyDisplay[0], fareFamilyDisplay[1]);
    this.showHideFlexibleBy(displayFlexibleBy);
}

function ADVS_applyGlobalFlexible(searchFlow) {
    var span = DOM.getElementById("GlobalFlexibleDates");
    if (span) {
        if (searchFlow == "MP") {
            DOM.show(span);
        } else {
            DOM.hide(span);
        }
    }
}

function cleanAndUpdateLocations() {
    var loc1 = WDSCommon.getTagValue(document.ADVSForm, "B_LOCATION_1");
    var loc2 = WDSCommon.getTagValue(document.ADVSForm, "E_LOCATION_1");
    if (loc1 != "") {
        WDSCommon.updateTag(document.ADVSForm, "B_LOCATION_1_Cpx", loc1);
        if (loc2 != "") WDSCommon.updateTag(document.ADVSForm, "E_LOCATION_1_Cpx", loc2);
        if (WDSCommon.getTagValue(document.ADVSForm, "B_LOCATION_2_Cpx") == "") WDSCommon.updateTag(document.ADVSForm, "B_LOCATION_2_Cpx", loc2);
    }
}

function ADVS_complexUpdateDates() {
    if (!ADVS.OneWayDateListNotInitialized) {
        var initDate = etravel.getDateTimeComposedString("#divB_DATE1"); // DateList1.getDateTimeComposedString(DateList1.grpStart);
        var cpxInitDate = etravel.getDateTimeComposedString('#divB_DATE1Cpx'); // DateList1Cpx.getDateTimeComposedString(DateList1Cpx.grpStart);
        if (initDate != cpxInitDate) {
            var hoursOW = document.getElementById("Hours1");
            var anyTime = "FALSE";
            if (hoursOW && hoursOW.value == "ANY") {
                anyTime = "TRUE";
            }
            //DateList1Cpx.setDateTimeComposedString(DateList1Cpx.grpStart, initDate, anyTime);
            //Add7DaysToAllNextSegments(1);
			etravel.setDateTimeComposedString('#divB_DATE1Cpx', initDate);
			etravel.keepCalendarGap('#divB_DATE1Cpx', 7);
        }
    }
}

function ADVS_callCityLookupPopup(location, label) {
    WDSCommon.updateTag(document.ADVSCityLkpForm, "PLTG_TARGETED_OPENER_TAG", document.getElementById(location).name);
    WDSCommon.updateTag(document.ADVSCityLkpForm, "MATCH", document.getElementById(location).value);
    WDSCommon.updateTag(document.ADVSCityLkpForm, "PLTG_TARGETED_OPENER_TAG_LABEL", label);
    submitFormToNewPopUp(document.ADVSCityLkpForm, "ADVSCityLkpWindow", 660, 470);
}

function ADVS_setSearchFlow(searchFlow) {
    this.searchFlow = searchFlow;
    WDSCommon.updateTag(document.ADVSForm, "SEARCH_PAGE", searchFlow);
}

function ADVS_getSearchFlow() {
    return this.searchFlow;
}

function ADVS_manageMPCalendarFields() {
    var disabled = DOM.getElementById("MPCalendarMode").checked;
    var labels = [];
    var inputs = [];
    var input = DOM.getElementById("Departure_Range_1");
    inputs.push(input);
    labels.push(DOM.getParent(input, "DIV"));
    var input = DOM.getElementById("Arrival_Range_1");
    if (input) {
        inputs.push(input);
        labels.push(DOM.getParent(input, "DIV"));
    }
    var input = DOM.getElementById("Hours1");
    inputs.push(input);
    var li = DOM.getParent(input, "LI");
    labels.push(DOM.getAllElements(li, "LABEL")[0]);
    var input = DOM.getElementById("Hours2");
    if (input) {
        inputs.push(input);
        var li = DOM.getParent(input, "LI");
        labels.push(DOM.getAllElements(li, "LABEL")[0]);
    }
    var input = DOM.getElementById("AIR_MAX_CONNECTIONS");
    inputs.push(input);
    var tbody = DOM.getParent(input, "TBODY");
    labels.push(DOM.getElementsByClass(tbody, "TD", "textBold")[0]);
    changeFieldsActivation(inputs, labels, disabled);
}

function changeFieldsActivation(inputs, labels, disabled) {
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = disabled;
    }
    for (var i = 0; i < labels.length; i++) {
        if (disabled) DOM.addClass(labels[i], "disabledFieldSearch");
        else DOM.removeClass(labels[i], "disabledFieldSearch");
    }
}

function ADVS_logoff() {
    ADVS.logoffAlreadySubmited = true;
    var method = "post";
    var wdsAjax = new WDSAjax();
    wdsAjax.setCallBackMethod(this.logoffCallback);
    wdsAjax.sendRequest(this.logoffUrl, method, null, "");
}

function ADVS_logoffCallback() {
    ADVS.logoffAlreadySubmited = false;
    if (DOM.getElementById("isUserLoggedIn")) {
        DOM.getElementById("frequentFlyerAirline").disabled = false;
        DOM.getElementById("frequentFlyerNumber").disabled = false;
        DOM.getElementById("tierLevel").disabled = false;
        DOM.getElementById("isUserLoggedIn").value = "false";
    }
}

