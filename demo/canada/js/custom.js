function selectChange(formid)
    var result = showModalDialog('CitiesSelectorPopUp2.html', 'window', 'dialogWidth:320px;dialogHeight:380px;center:yes;');

    if (result != null && result != "")
        document.getElementById(formid).value = result;
}

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

}
function openLocation(formid,formid2)
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