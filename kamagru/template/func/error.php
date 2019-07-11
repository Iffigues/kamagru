<?php

function setError($e,$a){
	$_SESSION['error'][$e] = $a;
}

function getError($e) {
	if (isset($_SESSION['error'][$e]) && !empty($_SESSION['error'][$e])) {
		$r = $_SESSION['error'][$e];
		unset($_SESSION['error'][$e]);
		return $r;
	}
	return 0;
}
