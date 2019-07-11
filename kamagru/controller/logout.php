<?php

require_once("./template/func/csrf.php");

if (isset($_SESSION['co']) && $_SESSION["co"] && $_GET["token"]) {
	$_POST['token'] = $_GET["token"];
	if (getToken("logout")) {
		session_destroy();
		header('Location: /');
	}
}
