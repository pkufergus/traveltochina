(function(window, undefined) {
	Function.prototype.bind = function(obj) {
		var method = this;
		tmp = function() {
			return method.apply(obj, arguments);
		};
	
		return tmp;
	}
 
 	function ETravel() {
		this.datelst = new DateList();
		this.CN      = "CN";
		this.calendarIds = [['#divB_DATE1', '#divE_DATE2'], ['#divB_DATE1Cpx', '#divB_DATE2Cpx', '#divB_DATE3Cpx']];
		this.calSelector = "span[id^=linkCalendar]";
		this.monthSelector = "select[id^=Month]";
		this.daySelector = "select[id^=Day]";
		this.dayOfWeekSelector = "span[id^=originDateDayOfWeek]";
		this.hourSelector = "select[id^=Hours]";
		
		this.calendarHtml = $("<div id='div_popup_container' class='divBGRD'>" +
								"<table cellpadding='0' cellspacing='0'>" +
								"<tr>" +
								"<td class='calendarSeparator'></td>" +
								"<td id='calendar_0' class='calendarTD'></td>" +
								"<td class='calendarSeparator'></td>" +
								"<td id='calendar_1' class='calendarTD'></td>" +
								"<td class='calendarSeparator'></td>" +
								"</tr>" +
								"<tr><td class='footer' colspan='4'><a id='closer' href=''>close</a></td></tr>" +
								"</table>" +
								"</div>");
	};

	String.prototype.trim = function()
	{
		return this.replace(/(^[\s0])|([\s0]&)/g, "");
	}

	ETravel.prototype = 
	{
		initDateLst: function(month, day) 
		{
			// Date lists management
			// Data comming from DataMap, booking engine, DataBase
			this.datelst.monthsNames = month;
			this.datelst.daysNames = day;
			this.datelst.startAvailDate = "H72";
			this.datelst.endAvailDate = "M10";
			this.datelst.currentDate = new Date();
			this.datelst.betweenDays = 7;
			// HTML components
			this.datelst.classDisabled = "dateListsDisabled";
		},
		dateStr1: function(timestr) 
		{
			var prevDate = new Date(timestr);
			// Convert date to String
			var str = "";
			var prevDateYear = prevDate.getYear();
			var prevDateMonth = prevDate.getMonth() + 1;
			var prevDateDay = prevDate.getDate();
			var prevDateHours = prevDate.getHours();
			var prevDateMinutes = prevDate.getMinutes();
			var prevDateSeconds = prevDate.getSeconds();

			if (prevDateYear < 1000) prevDateYear+=1900;
			str += prevDateYear+"-" ;
			if (prevDateMonth<10) str += "0";
			str += prevDateMonth+"-" ;
			if (prevDateDay<10) str += "0";
			str += prevDateDay;
			
			return str;
		},
		dateStr: function(year, month, day, dayOff) 
		{
			var prevDate = new Date();
			prevDate.setFullYear(year);
			prevDate.setMonth(month - 1);
			prevDate.setDate(day);

			prevDate.setTime(prevDate.getTime() + (dayOff * 24 * 60 * 60 * 1000));   // N days in milliseconds

			// Convert date to String
			var str = "";
			var prevDateYear = prevDate.getYear();
			var prevDateMonth = prevDate.getMonth() + 1;
			var prevDateDay = prevDate.getDate();
			var prevDateHours = prevDate.getHours();
			var prevDateMinutes = prevDate.getMinutes();
			var prevDateSeconds = prevDate.getSeconds();

			if (prevDateYear < 1000) prevDateYear+=1900;
			str += prevDateYear;
			if (prevDateMonth<10) str += "0";
			str += prevDateMonth;
			if (prevDateDay<10) str += "0";
			str += prevDateDay;
			if (prevDateHours<10) str += "0";
			str += prevDateHours;
			if (prevDateMinutes<10) str += "0";
			str += prevDateMinutes;
			if (prevDateSeconds<10) str += "0";
			str += prevDateSeconds;

			return str;
		},
		initCalendarPannel: function(calId, daysToIncrease)
		{
			var prevDate;

			// get prev calendar date
			if (daysToIncrease != undefined)
				prevDate = this.datelst.getDateTimeComposedString(this.datelst.grpStart, "", "");

			this.getCalendar(calId);
			this.datelst.initDateLists();

			// get default date
			if (daysToIncrease == undefined)
				prevDate = this.datelst.getDateTimeComposedString(this.datelst.grpStart, "", "");

			this.setDateTimeComposedString(calId, prevDate, daysToIncrease);
		},
		getCalendar: function(calId)
		{
			this.datelst.grpStart = [$("select[id^=Month]", calId)[0],
								$("select[id^=Day]",   calId)[0],
								$("span[id^=originDateDayOfWeek]", calId)[0],
								$("select[id^=Hours]", calId)[0]];
			return this.datelst;
		},
		getDateTimeComposedString: function(calId)
		{
			this.getCalendar(calId);
			return this.datelst.getDateTimeComposedString(this.datelst.grpStart, "", "");
		},
		getDateTimeComposed: function(calId)
		{
			this.getCalendar(calId);
			return this.datelst.getDateTimeComposed(this.datelst.grpStart);
		},
		getTimeString: function(calId)
		{
			this.getCalendar(calId);
			return this.datelst.getTimeString(this.datelst.grpStart);
		},
		setDateTimeComposedString: function(calId, dateStr, daysToIncrease)
		{
			this.getCalendar(calId);
			var dateStr = this.dateStr(parseInt(dateStr.substr(0, 4).trim()),
								parseInt(dateStr.substr(4, 2).trim()),
								parseInt(dateStr.substr(6, 2).trim()),
								daysToIncrease == undefined? 0: daysToIncrease);
			this.datelst.setDateTimeComposedString(this.datelst.grpStart, dateStr, "!");
			this.datelst.updateDays(this.datelst.grpStart[0]);
		},
		keepCalendarGap: function(fromCal, days)
		{
			$.each(etravel.calendarIds, function(idx, calGrp){
				var ret = true;
				$.each(calGrp, function(idx, calId){
					if (calId == fromCal)
					{
						// update day of week
						this.getCalendar(calId);
						this.datelst.grpStart[2].innerHTML = this.datelst.getNameDay(this.datelst.getDateTimeComposed(this.datelst.grpStart));

						// update Days
						this.datelst.updateDays(this.datelst.grpStart[0]);

						// forward keep the gap
						for(var bckIdx = idx + 1; bckIdx < calGrp.length; bckIdx++)
							this.setDateTimeComposedString(calGrp[bckIdx], this.getDateTimeComposedString(calGrp[bckIdx-1]), days);

						// false to break the loop
						ret = false;
						return ret;
					}
				}.bind(this));
				// break the loop
				if (!ret)
					return ret;
			}.bind(this));
			if((fromCal == "#divB_DATE1"  || fromCal ==  "#divE_DATE2") && SelectTab=="R" )
			{

			}
			
			
		},
		openCalendar: function(calId)
		{
			this.calId = calId;
			window.open('calendar.html',
						'',
						'scrollbars=yes,resizable=yes,width=350,height=275,left=50,top=50');

			if(navigator.appName=="Netscape"){
				thePopSizedWin.focus();
			}
		},
		openAirLine: function(formid)
		{
			var result = showModalDialog('AirlineSelectorPopUp.html', 'window', 'dialogWidth:320px;dialogHeight:380px;center:yes;');  

			if(result != null && result !="")
				document.getElementById(formid).value = result;  
		},
		openLocation: function(formid)
		{
			var result = showModalDialog('CitiesSelectorPopUp2.html', 'window', 'dialogWidth:320px;dialogHeight:380px;center:yes;');  

			if(result != null && result !="")
				document.getElementById(formid).value = result;  
		}
	};

	etravel = new ETravel();

})(window);

function selectChange(formid,formid2)
{
	var result = document.getElementById(formid).value ;
    document.getElementById(formid2).value = result;
	       
	
	if(result =="Others")
	{
                //openLocation(formid,formid2);	
				var table2id = "Table2_"+formid2;
                var tableid = "Table_"+formid2; 
				document.getElementById(formid2).value = "";
				//document.getElementById(formid).add(new Option(result,result)); 
				//document.getElementById(formid).value= result; 
				

                document.getElementById(table2id).style.display="none";
                document.getElementById(tableid ).style.display="";
                //document.getElementById(tableid).style.display="";                 	
	}
	else
	{
	
		//document.getElementById(tableid).style.display="none";
	}
	
}function openLocation(formid,formid2)
{
	var result = showModalDialog('CitiesSelectorPopUp2.html', 'window', 'dialogWidth:320px;dialogHeight:380px;center:yes;'); 
        var table2id = "Table2_"+formid2;
        var tableid = "Table_"+formid2; 
 
	if(result != null && result !="")
	{
		document.getElementById(formid2).value = result;
		//document.getElementById(formid).add(new Option(result,result)); 
		//document.getElementById(formid).value= result; 	

                document.getElementById(table2id).style.display="none";
                document.getElementById(tableid ).style.display="";

	}
	else
	{
		document.getElementById(formid2).value = "";
		//document.getElementById(formid).value= ""; 
                document.getElementById(table2id).style.display="";
                document.getElementById(tableid ).style.display="none";

	}
}
function writeSelect(obj){   
	obj.options[0].selected = "select";   
	obj.options[0].text = obj.options[0].text + String.fromCharCode(event.keyCode);   
	event.returnValue=false;   
	return obj.options[0].text;   
}   
