function xml() {
	if (window.XMLHttpRequest)
		return (new XMLHttpRequest());
	else if (window.ActiveXObject)
		return (new ActiveXObject("Microsoft.XMLHTTP"));
}

function sender (e, url, b) {
	var t = xml();
	t.onreadystatechange = function(ii,oo,bb) {
		if (t.readyState>3 && t.status==202) {
			console.log(t.status);
			console.log(this.responseText);
		}
	};
	t.open("POST", url, true);
	t.setRequestHeader("Content-Type", "application/json");
	t.send(e);
}
