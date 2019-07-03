(function () {
var cc = 0;
function xml() {
		if (window.XMLHttpRequest)
				return (new XMLHttpRequest());
		else if (window.ActiveXObject)
				return (new ActiveXObject("Microsoft.XMLHTTP"));
}
function sender (url) {
		var t = xml();
		t.onreadystatechange = function(ii,oo,bb) {
					if (t.readyState > 3 && t.status ==202) {
						create(JSON.parse(t.responseText));
			}
		};
		t.open("POST", url, true);
		t.setRequestHeader("Content-Type", "application/json");
		t.send();
}
var v = cc.toString();
sender("https://gopiko.fr/api/getimage.php?nb=".concat(v));
}());
