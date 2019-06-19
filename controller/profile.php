<?php
if ($_SESSION['co']) {
	if (isset($_GET['action']) && !empty($_GET['action'])) {
		$a = $_GET["action"];
		if ($a == "mdp")
		;
		if ($a == "email")
		;
		if ($a == "login")
		;
	}
	require_once("./template/profile.php");
}
