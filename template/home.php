<div class="container">
	<device type="media" onchange="update(this.data)"></device>
	<div class="row" style="position:relative">
			<video  class="responsive-video col s12" style="padding:0px;margin:0px;z-index:-1;position:absolute;left:0px;width:auto,height:auto" id="video" autoplay></video>
			<canvas class="col s12 responsive-video" style="padding:0px;margin:0px;z-index:3;" id="canvas"></canvas>
	</div>
	<div class="row">
		<div class="col s12" id="elem"></div>
		<div class="row">
			<div class="row">
				<div class="col s2">
					<img class="responsive-img" src="./asset/img/icone/barbarian.png">
				</div>
				<div class="col s2">
				<img class="responsive-img" src="./asset/img/icone/witch_doctor.png">
			</div>
			<div class="col s2">
				<img class="responsive-img" src="./asset/img/icone/wizard.png">	
			</div>	
			</div>
			<div class="row">
			<div class="col s2">
				<img class="responsive-img" src="./asset/img/icone/dark_cultist.png">
			</div>
			<div class="col s2">	
				<img class="responsive-img" src="./asset/img/icone/dune_thresher.png">
			</div>
			<div class="col s2">
				<img class="responsive-img" src="./asset/img/icone/gnarled_walker.png">
			</div>
			<div class="col s2">	
				<img class="responsive-img" src="./asset/img/icone/khazra.png">	
			</div>
			<div class="col s2">				
				<img class="responsive-img" src="./asset/img/icone/undead.png">
			</div>
			</div>
		</div>
		<button class="col s12" id="startbutton">Take</button>
	</div>
</div>
<script type="text/javascript" src="./asset/js/video.js"></script>
<script type="text/javascript" src="./asset/js/scale.js"></script>
