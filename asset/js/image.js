var img = document.getElementsByClassName("img");
var b = [];
var c = {};
var imgs;
var vit = 1;

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
	tt.x = c.x;
	tt.y = c.y;
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
			else if (i < b.length)
				c = b[i + 1];
			return;
		}
	}
}

function take() {
	var img = new Image();
	var imj = document.getElementById("ii");
	var	myOnlineCamera	= document.getElementById('my'),
		video		= document.getElementById('video'),
		canvas		= document.getElementById('canvas'),
		pop		= document.getElementById("nop");
	
	var context = canvas.getContext('2d');
	if (imgs)
		context.drawImage(imgs, 0, 0);
	else
		context.drawImage(video,0,0);
	img.src = canvas.toDataURL("image/png");	
	pop.style.display  = "block";
	vv();
	imj.src = canvas.toDataURL("image/png");
	document.getElementById('pf').addEventListener("click", function() {
		var obj = {};
		obj.img = imj.src;
		obj.icone = b;
		sender(obj, "https://gopiko.fr?page=img", null);
		
	}, false);

}

function binding(event) {
	if (event.key == "=") {
		c.x = 0;
		c.y = 0;
		bb();
	}
	if (event.key == "*") {
		if (vit < 50)
			vit = vit + 1;
	}
	if (event.key  == "/") {
		if (vit > 1 )
			vit = vit - 1;
	}
	if (event.key == "-") {
		rr('-');
		bb();
	}
	if (event.key == "+") {
		rr("+");
		bb();
	}
	if (event.key == "9") {
		c.height = c.height + vit;
		bb();
	}
	if (event.key == "7") {
		c.width = c.width + vit;
		bb();
	}
	if (event.key == "4") {
		c.width = c.width - vit;
		bb();
	}
	if (event.key == "6") {
		c.height = c.height - vit;
		bb();
	}
	if (event.key == "5") {
		c.y = c.y - vit; 
		bb();
	}
	if (event.key == "2") {
		c.y = c.y + vit;
		bb();
	}
	if (event.key == "1") {
		c.x = c.x - vit;
		bb();
	}
	if (event.key == "3") {
		c.x = c.x + vit;
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
		take();
	}
}

function set(e) {
	var id = getid();
	var classs = "responsive-img img icone col s2 "+e.id;
	e.image.id = id;
	e.image.className = classs;
	e.image.addEventListener('click', event => {c = e});
	document.getElementById("elem").appendChild(e.image);
	b.push(e);
	c = e;
	bb();
}

function vv() {
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	for (var i = 0; i < b.length; i++)
		ctx.drawImage(b[i].image, b[i].x, b[i].y,b[i].width, b[i].height);
}

function bb() {
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	if (imgs) {
		console.log('fd');
		ctx.drawImage(imgs,0,0);
	}
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

function pic() {
	var canvas = document.getElementById("canvas");
	var reader = new FileReader();
	reader.readAsDataURL(this.files[0]); 
	reader.onload = function(event){;
		document.getElementById('video').style.display = 'none';
		document.getElementById('delete').style.display = 'block';
		imgs = new Image();
		imgs.src = reader.result;
		canvas.width = imgs.width;
		canvas.height = imgs.height;
		bb();
	}
}

function elf() {
	imgs = 0;
	var video = document.getElementById('video');
	video.style.display = 'inline-block';
	document.getElementById('delete').style.display = 'none';
	var canvas = document.getElementById('canvas');
	var width = video.videoWidth;
	var height = video.videoHeight;
	canvas.width = video.videoWidth;
	canvas.height = video.videoHeight;
	document.getElementById("load").value = "";
	bb();
}


document.getElementById('delete').addEventListener('click', elf, false);
document.getElementById('load').addEventListener('change',pic, false);
document.addEventListener('keydown', (event) => {binding(event)}, false);
document.getElementById("sf").addEventListener('click',function(){
	document.getElementById('nop').querySelector('img').src = '';
	document.getElementById('nop').style.display = 'none';
	bb();
},false);
