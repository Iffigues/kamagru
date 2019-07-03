document.getElementById("look").addEventListener("click", function(){
	document.getElementById("my_photos").style.display = "block";
	this.style.display = "none";
	document.getElementById("my").style.display = "none";
	document.getElementById("vv").style.display = "none";
});
document.getElementById("close").addEventListener("click", function(){
	document.getElementById("my_photos").style.display = "none";
	document.getElementById("look").style.display = "block";
	document.getElementById("my").style.display = "block";
	document.getElementById("vv").style.display = "block";
});
