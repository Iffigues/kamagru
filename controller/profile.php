<?php

require_once("./config/db.php");
require_once("./template/func/passwd.php");

function changeme($db, $a, $b , $c) {
}

function request($a, $b, $c, $d) {
	$db = conn_db();
	try {
		$stmt = db->prepare("SELECT * FROM user WHERE login like :login LIMIT 1");
		$stmt->bindParam(":login", $_SESSION['login']);
		$stmt->execute();
		$row = $stmt->fetch();
		if ($row) {
			if (verif_pwd($b, $row['password'])){
				changeme($db, $c, $d);
			}
		}
	} (PDOexception $e) {
	}
}

if ($_SESSION['co']) {
	if (isset($_GET['action']) && !empty($_GET['action'])) {
		$a = $_GET["action"];
		if ($a == "mdp")
			request("UPDATE user SET password = ? WHERE login like ?", $_POST['pwd'], $_POST['pwd2'], $_POST['pwd3']);
		if ($a == "email")
		;
		if ($a == "login")
		;
	}
	require_once("./template/profile.php");
}
