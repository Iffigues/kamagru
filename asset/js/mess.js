var c = document.querySelector("img").id;
function xml() {
	if (window.XMLHttpRequest)
		return (new XMLHttpRequest());
	else if (window.ActiveXObject)
		return (new ActiveXObject("Microsoft.XMLHTTP"));
}

function send(url) {
	var t = xml();
	t.onreadystatechange = function(ii,oo,bb) {
		if (t.readyState > 3)
			location.reload();
	};
	t.open("POST", url, true);
	t.send();
}

function sender (url, g) {
	var t = xml();
	t.onreadystatechange = function(ii,oo,bb) {
		if (t.readyState > 3) {
			location.reload();
		}
	};
	t.open("POST", url, true);
	t.setRequestHeader("Content-Type", "application/json");
	t.send(g);
}

document.getElementById("me").addEventListener("click", function () {
	var x = document.getElementById("story");
	var text = x.value;
	sender("https://gopiko.fr/api/mess.php?id="+c, JSON.stringify(text));
	x.value = "";
});

if (document.getElementById("like"))
document.getElementById("like").addEventListener('click', function () {
	send("https://gopiko.fr/api/like.php?action=like&id="+c);
});

if (document.getElementById("dislike"))
document.getElementById("dislike").addEventListener('click', function() {
	send("https://gopiko.fr/api/like.php?action=dislike&id="+c);
});
