var img = document.getElementsByClassName("img");

var b = [];

function getid() {
	var i = 0;
	var id = document.getElementsByClassName("icone");
	for (var y = 0; y < id.length; y++) {
		if (i < parseInt(id.id))
			i = parseInt(id.id);
	}
	return (i.toString());
}

function set(e) {
	b.push(e);
	var id = getid();
	var classs = "responsive-img img icone col s2 "+e.id;
	alert(classs);
	e.image.id = id;
	e.image.className = classs;
	document.getElementById("elem").appendChild(e.image);	
	bb();
}


function bb() {
	var canvas = document.getElementById("canvas");
		var ctx = canvas.getContext("2d");
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	for (var i = 0; i < b.length; i++) {
		ctx.drawImage(b[i].image, b[i].x, b[i].y, b[i].width, b[i].height);
	}
}

function change() {
	var tt = {};
	var tb = ["","barbarian.png","witch_doctor.png","wizard.png","dark_cultist.png", "dune_thresher.png","gnarled_walker.png","khazra.png","undead.png"];
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	tt.image = new Image();
	tt.image.src = "./asset/img/icone/"+tb[parseInt(this.id)];
	tt.width = tt.image.width;
	tt.height = tt.image.height;
	tt.x = 0;
	tt.y = 0;
	tt.id = this.id;
	set(tt);
}
for (var i = 0; i < img.length; i++) {
	  img[i].addEventListener("click", change, false);
}

var tb = ["","barbarian.png","dark_cultist.png", "dune_thresher.png","gnarled_walker.png","khazra.png","	undead.png","witch_doctor.png","wizard.png"];
