/**
 * 
 */
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