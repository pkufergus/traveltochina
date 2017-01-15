var PageControlModule = (function () {
    function Module() {
    }
    var url_key="last_url_key";
    Module.storeUrl = function(val) {
      try {
        localstore.set(url_key, val);
      } catch(e) {
        console.log("store except:" + e.toString());
        localstore.clear();
        localstore.set(url_key, val);
      }
    }
    Module.readUrl = function() {
        var data = localstore.get(url_key);
        if (typeof data == 'undefined' || data == null) {
            return "";
        }
        return data;
    }
    Module.onClick = function(obj) {
        console.log("going to store url:"+obj.href);
        this.storeUrl(obj.href);
        console.log("store url:"+obj.href);
    }
    return Module;
}());

