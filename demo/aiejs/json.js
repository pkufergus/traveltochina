var JSON=function(){var m_bIncludeFunctions=false;var m={"\b":"\\b","\t":"\\t","\n":"\\n","\f":"\\f","\r":"\\r",'"':'\\"',"\\":"\\\\"},s={array:function(x){var a=["["],b,f,i,l=x.length,v;for(i=0;i<l;i+=1){v=x[i];f=s[typeof v];if(f){v=f(v);if(v!=null){if(typeof v=="string"){if(b){a[a.length]=",";}a[a.length]=v;b=true;}}}}a[a.length]="]";return a.join("");},"boolean":function(x){return String(x);},"null":function(x){return"null";},number:function(x){return isFinite(x)?String(x):"null";},object:function(x){if(x){if(x instanceof Array){return s.array(x);}var a=["{"],b,f,i,v;for(i in x){v=x[i];f=s[typeof v];if(f){v=f(v);if(v!=null){if(typeof v=="string"){if(b){a[a.length]=",";}a.push(s.string(i),":",v);b=true;}}}}a[a.length]="}";return a.join("");}return"null";},string:function(x){if(/["\\\x00-\x1f]/.test(x)){x=x.replace(/([\x00-\x1f\\"])/g,function(a,b){var c=m[b];if(c){return c;}c=b.charCodeAt();return"\\u00"+Math.floor(c/16).toString(16)+(c%16).toString(16);});}return'"'+x+'"';},"function":function(x){if(m_bIncludeFunctions){return String(x);}else{return null;}}};this.toJSONString=function(obj,bool){if(bool){m_bIncludeFunctions=bool;}var type=(typeof obj).toLowerCase();switch(type){case"string":return s.string(obj);case"object":return s.object(obj);case"array":return s.array(obj);default:break;}};this.parseJSONString=function(string){try{return !(/[^,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t]/.test(string.replace(/"(\\.|[^"\\])*?"/g,"")))&&eval("("+string+")");}catch(e){return false;}};};var JSON=new JSON();