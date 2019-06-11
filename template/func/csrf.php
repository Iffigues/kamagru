<?php 
function addToken($e) {
	$token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
	$_SESSION['token'][$e] = $token;
	return ($token);
}

function  getToken($e) {
	if (isset($_SESSION['token'][$e]) AND isset($_POST['token']) AND !empty($_SESSION['token'][$e]) AND !empty($_POST['token'])) {
		if ($_SESSION['token'][$e] == $_POST['token'])
			return true;
	} else 
		return false;
}
