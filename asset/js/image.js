var img = document.getElementsByClassName("img");
function change() {
	var tb = ["","barbarian.png","witch_doctor.png","wizard.png","dark_cultist.png", "dune_thresher.png","gnarled_walker.png","khazra.png","undead.png"];
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	var image = new Image();
	image.src = "./asset/img/icone/"+tb[parseInt(this.id)];
	var width = image.width;
	var height = image.height;
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	ctx.drawImage(image, 0, 0, width, height);
}
for (var i = 0; i < img.length; i++) {
	  img[i].addEventListener("click", change, false);
}

var tb = ["","barbarian.png","dark_cultist.png", "dune_thresher.png","gnarled_walker.png","khazra.png","	undead.png","witch_doctor.png","wizard.png"];
