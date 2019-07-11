<?php 
function addToken($e) {
	$token = bin2hex(random_bytes(64));
	$_SESSION['token'][$e] = [];
	$_SESSION['token'][$e]['name'] = $token;
	$_SESSION['token'][$e]['time']  = time();
	return ($token);
}

function  getToken($e) {
	if (isset($_SESSION['token'][$e]) AND isset($_POST['token']) AND !empty($_SESSION['token'][$e]) AND !empty($_POST['token'])) {
		if ($_SESSION['token'][$e]["name"] == $_POST['token']) {
			$t = 10 * 60 * 1000;
			if ((time() - $_SESSION['token'][$e]['time']) <= $t)
				return true;
		}
		return false;
	}
}
