var img = document.getElementsByClassName("img");
function change() {
	console.log(this.id);
}
for (var i = 0; i < img.length; i++) {
	  img[i].addEventListener("click", change, false);
}

var tb = ["","barbarian.png","dark_cultist.png", "dune_thresher.png","gnarled_walker.png","khazra.png","	undead.png","witch_doctor.png","wizard.png"];
