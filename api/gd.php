<?php

function take($z) {
	$tb = ["","barbarian.png","witch_doctor.png","wizard.png","dark_cultist.png", "dune_thresher.png","gnarled_walker.png","khazra.png","undead.png"];
	if ($z['nb'] > 0 && $z['nb'] < count($tb)) {
		$e = imagecreatefrompng("./icone/barbarian.png");
		imagealphablending($e, false);
		imagesavealpha($e,true);
	      }   
 
	$e = imagescale($e, $z["width"],$z['height']);
	return $e;
}

function convert($e, $b) {
	$size = [];
	$data = explode(',',$e);
	$r = imagecreatefromstring(base64_decode($data[1]));
	$size[0] = imagesx($r);
	$size[1] = imagesy($r);
	if (isset($b) && !empty($b)) {
		foreach ($b as $s) {
			$z = take($s);
			imagecopy($r, $z, 0, 0, 0, 0, $s['width'], $s['height']);
		}
	}
	imagepng($r,"./lol/fils.png");
}
