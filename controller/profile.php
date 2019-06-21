<?php
if ($_SESSION['co']) {
	if (isset($_GET['action']) && !empty($_GET['action'])) {
		$a = $_GET["action"];
		if ($a == "mdp")
			request("UPDATE user SET password = ? WHERE login like ?", $_POST['pwd'], $_POST['pwd2']);
		if ($a == "email")
		;
		if ($a == "login")
		;
	}
	require_once("./template/profile.php");
}
