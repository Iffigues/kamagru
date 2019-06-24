var img = document.getElementsByClassName("img");
function change() {
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	var image = new Image();
	image.src = "./asset/img/icone/"+tb[parseInt(this.id)];
	image.width = 10;
	image.height = 10;
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	ctx.drawImage(image, 10, 10);
}
for (var i = 0; i < img.length; i++) {
	  img[i].addEventListener("click", change, false);
}

var tb = ["","barbarian.png","dark_cultist.png", "dune_thresher.png","gnarled_walker.png","khazra.png","	undead.png","witch_doctor.png","wizard.png"];
