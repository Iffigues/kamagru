function xml() {
	if (window.XMLHttpRequest)
		return (new XMLHttpRequest());
	else if (window.ActiveXObject)
		return (new ActiveXObject("Microsoft.XMLHTTP"));
}

function sender (e, url, bb) {
	var t = xml();
	document.getElementById("pf").style.display = "none";
	document.getElementById("sf").style.display = "none";
	t.onreadystatechange = function(ii) {
		if (t.readyState>3 /*$&& t.status==204*/) {
		}
		document.getElementById("sf").style.display = "block";
		document.getElementById("pf").style.display = "block";
		document.getElementById('nop').querySelector('img').src = '';
		document.getElementById('nop').style.display = 'none';
		document.getElementById("my").style.display = "block";
		document.getElementById("vv").style.display = "block";
		bb();
	};
	t.open("POST", url, true);
	t.setRequestHeader("Content-Type", "application/json");
	t.send(e);
}
