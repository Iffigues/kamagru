var img = document.getElementsByClassName("img");
var b = [];
var c = {};

function getid() {
	var i = 0;
	var id = b;
	for (var y = 0; y < id.length; y++) {
		if (i <= parseInt(id[y].image.id))
			i = parseInt(id[y].image.id);
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

function copy() {
	var tt = {};
	tt.image = new Image();
	tt.image.src = c.image.src;
	tt.width = c.width;
	tt.height = c.height;
	tt.x = 0;
	tt.y = 0;
	tt.id = c.id;
	set(tt);
}

function delone(e, id) {
	for (var i = 0; i < e.length; i++) {
		if (e[i].id == id) {
			e[i].remove();
			return;
		}
	}
}

function del() {
	var id = c.image.id;
	for (var i = 0; i < b.length; i++) {
		if (id == b[i].image.id) {
			b.splice(i, 1);
			delone(document.getElementsByClassName("icone"), id);
			if (i > 0)
				c = b[i - 1];
			else if (i < b.length){
				c = b[i + 1];
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
	if (event.key == "8") {
		copy();
		bb();
	}
	if (event.key == "Clear") {
		del();
		bb();
	}
	if (event.key == "0") {
		alert(event.key);
	}
}

function set(e) {
	var id = getid();
	alert(id);
	var classs = "responsive-img img icone col s2 "+e.id;
	e.image.id = id;
	e.image.className = classs;
	e.image.addEventListener('click', event => {c = e});
	document.getElementById("elem").appendChild(e.image);
	b.push(e);
	c = e;
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

document.addEventListener('keydown', (event) => {binding(event)}, false);
