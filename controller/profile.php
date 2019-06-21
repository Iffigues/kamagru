<?php

require_once("./config/db.php");
require_once("./template/func/passwd.php");

function changeme($db, $a, $b , $c) {
	echo "lol";
	if ($b == $c) {
		try {
			$stmt = $db->prepare($a);
			$stmt->bindParam(":login", pwd($b));
			$stmt->bindParam(":haha", $_SESSION["login"]);
			$stmt->execute();
		} catch (PDOexception $e) {
		}
	}
}

function request($b, $c, $d) {
	$db = conn_db();
	try {
		echo "dsddssddsdsdsdsds";
		$stmt = $db->prepare("SELECT * FROM user WHERE login like :login LIMIT 1");
		$stmt->bindParam(":login", $_SESSION['login']);
		$stmt->execute();
		$row = $stmt->fetch();
		if ($row) {
			if (verif_pwd($b, $row['password'])){
				changeme($db, "UPDATE user SET password = :login WHERE login like :haha", $c, $d);
			}
		}
	} catch  (PDOexception $e) {
		echo "dsssssssssssss";
	}
}

if ($_SESSION['co']) {
	if (isset($_GET['action']) && !empty($_GET['action'])) {
		$a = $_GET["action"];
		if ($a == "pwd")
			request($_POST['pwd'], $_POST['pwd1'], $_POST['pwd2']);
		if ($a == "email")"UPDATE user SET password = :login WHERE login like :haha", $_POST['email'], $_POST['email1']);
			changeme(conn_db(), );
		if ($a == "login")
		;
	}
	require_once("./template/profile.php");
}
