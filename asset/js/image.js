var img = document.getElementsByClassName("img");
var b = [];
var c = {};

function getid() {
	var i = 0;
	var id = document.getElementsByClassName("icone");
	for (var y = 0; y < id.length; y++) {
		if (i <= parseInt(id[y].id))
			i = parseInt(id[y].id);
	}
	i++;
	return (i.toString());
}

function rr(ii) {
	var id = c.image.id;
	for ( var i = 0; i < b.length; i++ ) {
		if (id == b[i].image.id) {
			if (ii == '-') {
				if (i > 0) {
					b[i] = b[i - 1];
					b[i - 1] = c;
				}
			} 
			if (ii == '+') {
				if (i < b.length - 1 ) {
					b[i] = b[i + 1];
					b[i + 1] = c;
				}
			}
			return;
		}
	}
}

function binding(event) {
	if (event.key == "-") {
		rr('-');
		bb();
	}
	if (event.key == "+") {
		rr("+");
		bb();
	}
	if (event.key == "9") {
		c.height = c.height + 1;
		bb();
	}
	if (event.key == "7") {
		c.width = c.width + 1;
		bb();
	}
	if (event.key == "4") {
		c.width = c.width - 1;
		bb();
	}
	if (event.key == "6") {
		c.height = c.height - 1;
		bb();
	}
	if (event.key == "5") {
		c.y = c.y - 1; 
		bb();
	}
	if (event.key == "2") {
		c.y = c.y + 1;
		bb();
	}
	if (event.key == "1") {
		c.x = c.x - 1;
		bb();
	}
	if (event.key == "3") {
		c.x = c.x + 1;
		bb();
	}

}

function set(e) {
	b.push(e);
	var id = getid();
	var classs = "responsive-img img icone col s2 "+e.id;
	e.image.id = id;
	e.image.className = classs;
	e.image.addEventListener('click', event => {c = e});
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
	c = tt;
	set(tt);
}
for (var i = 0; i < img.length; i++) {
	  img[i].addEventListener("click", change, false);
}

document.addEventListener('keydown', (event) => {binding(event)}, false);
