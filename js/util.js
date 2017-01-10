/**
 * 
 */
function   request(paramName)  
{  
    var sSource=String(window.document.location);  
    var sName= paramName;    
    var sReturn="";     
    var sQUS="?";     
    var sAMP="&";     
    var sEQ="=";     
    var iPos;  
  
    iPos=sSource.indexOf(sQUS);  
    if(iPos==-1)   
        return;   
      
    var strQuery=sSource.substr(iPos,sSource.length-iPos);   
  
    var   strLCQuery = strQuery.toLowerCase();     
    var   strLCName  = sName.toLowerCase();   
  
    iPos   = strLCQuery.indexOf(sQUS + strLCName + sEQ);  
    if(iPos == -1)     
    {     
        iPos = strLCQuery.indexOf(sAMP + strLCName + sEQ);     
    }  
  
    if(iPos != -1)  
    {      
        sReturn = strQuery.substr(iPos + sName.length + 2,strQuery.length-(iPos + sName.length + 2));     
        var iPosAMP = sReturn.indexOf(sAMP);     
        if (iPosAMP == -1)  
        {  
            return   sReturn;     
        }  
        else  
        {     
            sReturn = sReturn.substr(0,iPosAMP);     
        }     
    }  
    return   sReturn;   
} 