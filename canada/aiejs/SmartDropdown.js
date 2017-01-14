function SmartDropdown(config){this.cmpB_Loc;this.cmpE_Loc;this.firstLine="";this.direction="outbound";this.routes={};this.labels={};this.userOriginLocation="";this.siteDefaultOriginLocation="";if(JSONData!=null&&JSONData.smartDropdownContent!=null){this.routes=JSONData.smartDropdownContent.routes;this.labels=JSONData.smartDropdownContent.labels;this.firstLine=JSONData.smartDropdownContent.firstLine;this.userOriginLocation=JSONData.smartDropdownContent.userOriginLocation;this.siteDefaultOriginLocation=JSONData.smartDropdownContent.siteDefaultOriginLocation;}if(config!=null){this._updateConfiguration(config);}}SmartDropdown.prototype._updateConfiguration=function(config){if(config==null){return;}if(config.direction!=null){this.direction=config.direction;}};SmartDropdown.prototype.populate=function(selectedOrigin,defaultDestinationLocation){this.cmpELoc.options.length=0;if(selectedOrigin==""){var option=document.createElement("option");option.innerHTML=this.firstLine;option.value="";option.selectedIndex=0;this.cmpELoc.appendChild(option);return;}var j;if(this.firstLine==""){j=0;}else{j=1;var option=document.createElement("option");option.innerHTML=this.firstLine;option.value="";option.selectedIndex=0;this.cmpELoc.appendChild(option);}var routes=this.routes["out"];if(this.direction=="inbound"){routes=this.routes["in"];}var destinations=routes[selectedOrigin];var indexToSelect=0;for(var i=0;i<destinations.length;i++){var location=destinations[i];var option=document.createElement("option");option.innerHTML=this.labels[location];option.value=location;option.selectedIndex=j;this.cmpELoc.appendChild(option);if(location==defaultDestinationLocation){indexToSelect=j;}j++;}this.cmpELoc.options[indexToSelect].selected=true;this.cmpELoc.selectedIndex=indexToSelect;};SmartDropdown.prototype.init=function(nameCmpB,nameCmpE,defaultOriginLocation,defaultDestinationLocation){this.cmpBLoc=document.getElementById(nameCmpB);this.cmpELoc=document.getElementById(nameCmpE);this.cmpBLoc.options.length=0;var j;if(this.firstLine==""){j=0;}else{j=1;var option=document.createElement("option");option.innerHTML=this.firstLine;option.value="";option.selectedIndex=0;this.cmpBLoc.appendChild(option);}var routes=this.routes["out"];if(this.direction=="inbound"){routes=this.routes["in"];}var indexDefaultOriginLocation=-1;var indexUserOriginLocation=-1;var indexSiteDefaultOriginLocation=-1;var indexToSelect=0;for(var location in routes){var option=document.createElement("option");option.innerHTML=this.labels[location];option.value=location;option.selectedIndex=j;this.cmpBLoc.appendChild(option);if(location==defaultOriginLocation){indexDefaultOriginLocation=j;}if(location==this.userOriginLocation){indexUserOriginLocation=j;}if(location==this.siteDefaultOriginLocation){indexSiteDefaultOriginLocation=j;}j++;}if(indexSiteDefaultOriginLocation!=-1){indexToSelect=indexSiteDefaultOriginLocation;}if(indexUserOriginLocation!=-1){indexToSelect=indexUserOriginLocation;}if(indexDefaultOriginLocation!=-1){indexToSelect=indexDefaultOriginLocation;}this.cmpBLoc.options[indexToSelect].selected=true;this.cmpBLoc.selectedIndex=indexToSelect;this.populate(this.cmpBLoc.options[indexToSelect].value,defaultDestinationLocation);};