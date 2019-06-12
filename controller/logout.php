<?php

require_once("./template/func/csrf.php");

if ($_SESSION["co"] && $_GET["token"]) {
	$_POST['token'] = $_GET["token"];
	if (getToken("logout")) {
		session_destroy();
		header('Location: http://gopiko.fr');
	}
}
