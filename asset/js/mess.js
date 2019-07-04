var c = document.querySelector("img").id;
function xml() {
	if (window.XMLHttpRequest)
		return (new XMLHttpRequest());
	else if (window.ActiveXObject)
		return (new ActiveXObject("Microsoft.XMLHTTP"));
}

function sender (url, g) {
	var t = xml();
	console.log(g);
	t.onreadystatechange = function(ii,oo,bb) {
		if (t.readyState > 3) {
			location.reload();
			console.log(t.responseText);
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
