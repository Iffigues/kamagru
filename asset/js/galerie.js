(function () {
var cc = 0;
function xml() {
		if (window.XMLHttpRequest)
				return (new XMLHttpRequest());
		else if (window.ActiveXObject)
				return (new ActiveXObject("Microsoft.XMLHTTP"));
}


function add(e, x) {
	var img = document.createElement("IMG");
	img.src = "./api/"+x['path'];
	e.append(img);
}

function create(e) {
	var gal = document.getElementById('gal');
	var photo = document.getElementById('photo');
	if (photo)
		for (var i = 0; i < photo.length; i++)
			photo[i].remove();
	for (var i = 0; i < e.length; i++ )
		add(gal, e[i]);
}

function sender (url) {
		var t = xml();
		t.onreadystatechange = function(ii,oo,bb) {
					if (t.readyState > 3) {
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
