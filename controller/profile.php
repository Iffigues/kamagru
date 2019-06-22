<?php

require_once("./config/db.php");
require_once("./template/func/passwd.php");

function changeme($db, $a, $b , $c) {
		try {
			$stmt = $db->prepare($a);
			$stmt->bindParam(":login", $b);
			$stmt->bindParam(":haha", $c);
			var_dump($stmt->execute());
		} catch (PDOexception $e) {
		}
}

function request($b, $c, $d) {
	$db = conn_db();
	try {
		$stmt = $db->prepare("SELECT * FROM user WHERE login like :login LIMIT 1");
		$stmt->bindParam(":login", $_SESSION['login']);
		$stmt->execute();
		$row = $stmt->fetch();
		if ($row) {
			if (verif_pwd($b, $row['password']))
				if ($c == $d)
					changeme($db, "UPDATE user SET password = :login WHERE login like :haha", pwd($c), $_SESSION['login']);
		}
	} catch  (PDOexception $e) {
	}
}

if ($_SESSION['co']) {
	if (isset($_GET['action']) && !empty($_GET['action'])) {
		$a = $_GET["action"];
		if ($a == "pwd")
			request($_POST['pwd'], $_POST['pwd1'], $_POST['pwd2']);
		if ($a == "email")
			changeme(conn_db(), "UPDATE user SET email = :login WHERE login like :haha", $_POST['email1'], $_SESSION['login']);
		if ($a == "login")
			changeme(conn_db(), "UPDATE user SET login = :login WHERE login like :haha", $_POST['login1'], $_POST['login']);
	}
	require_once("./template/profile.php");
}
