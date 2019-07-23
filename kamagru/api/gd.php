<?php

require_once("./db.php");

function take($z) {
	$tb = ["","barbarian.png","witch_doctor.png","wizard.png","dark_cultist.png", "dune_thresher.png","gnarled_walker.png","khazra.png","undead.png"];
	if ($z['nb'] > 0 && $z['nb'] < count($tb)) {
		$e = imagecreatefrompng("./icone/".$tb[$z['id']]);
		imagealphablending($e, false);
		imagesavealpha($e,true);    
	$e = imagescale($e, $z["width"],$z['height']);
	return $e;
	}
	return false;
}

function add_db($path) {
	$db = conn_db();
	try {
		$stmt = $db->prepare("INSERT INTO photo(id_user, path) VALUES ((SELECT id FROM user WHERE login = :log),:path)");
		$stmt->bindParam(":log", $_SESSION['login']);
		$stmt->bindParam(":path", $path);
		$stmt->execute();
	} catch (PDOexception $e) {
	}
}

function convert($e, $b) {
	$size = [];
	$data = explode(',',$e);
	try {
		if (!$r = @imagecreatefromstring(base64_decode($data[1])))
			return ;
	}catch (Exception $e) {
    	return ;
	}
	$size[0] = imagesx($r);
	$size[1] = imagesy($r);
	if (isset($b) && !empty($b)) {
		foreach ($b as $s) {
			$z = take($s);
			if ($z)
				imagecopy($r, $z, $s['x'], $s['y'], 0, 0, $s['width'], $s['height']);
		}
	} else {
		return ;
	}
	$path = "./lol/".strval(time()).".png";
	add_db($path);
	imagepng($r, $path);
}
