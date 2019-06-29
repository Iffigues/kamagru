<?php

function convert($e) {
	$data = explode(',',$e);
	$r = imagecreatefromstring(base64_decode($data[1]));
	$size = getimagwesize($r);
		
}
