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
	var a = document.createElement("A");
	a.href = "/?page=imagerie&id="+x["id"];
	img.src = "./api/"+x['path'];
	img.classList.add("foto");
	img.classList.add("responsive-img");
	img.style.width = "20%";
	a.append(img);
	e.append(a);
}

function create(e) {
	if (e && e.length > 0) {
		var gal = document.getElementById('gal');
		var photo = document.getElementsByTagName('img');
		if (photo.length)
			gal.innerHTML = "";
		for (var i = 0; i < e.length; i++)
			add(gal, e[i]);
	} else 
		if (cc > 0)
			cc = cc - 5;
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
sender("/api/getimage.php?nb=".concat(v));

document.getElementById("prev").addEventListener("click", function() {
	if (cc > 0) {
		cc = cc - 5;
		var v = cc.toString();
		sender("/api/getimage.php?nb=".concat(v));
	}
});

document.getElementById("next").addEventListener("click", function() {
	cc = cc + 5;
	var v = cc.toString();
	sender("/api/getimage.php?nb=".concat(v));
});

}());
