<?php

require_once("./config/db.php");
require_once("./template/func/passwd.php");
require_once("./template/func/csrf.php");

function changeme($db, $a, $b , $c) {
		try {
			var_dump($b);
			$stmt = $db->prepare($a);
			$stmt->bindParam(":login", $b);
			$stmt->bindParam(":haha", $c);
			$stmt->execute();
			return (1);
		} catch (PDOexception $e) {
			echo ($e->getMessage( ));
		}
	return (0);
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
				if ($c == $d) {
					changeme($db, "UPDATE user SET password = :login WHERE login like :haha", pwd($c), $_SESSION['login']);
			}
		}
	} catch  (PDOexception $e) {
	}
}

function is($e) {
	if (isset($_POST[$e])) {
		return (1);
	}
	return (0);
}

if (isset($_SESSION['co']) && $_SESSION['co']) {
	if (isset($_GET['action']) && !empty($_GET['action']) && getToken('action')) {
		$a = $_GET["action"];
		if ($a == "pwd")
			request($_POST['pwd'], $_POST['pwd1'], $_POST['pwd2']);
		if ($a == "email")
			if(changeme(conn_db(), "UPDATE user SET email = :login WHERE login like :haha", $_POST['email1'], $_SESSION['login']))
				$_SESSION['email'] = $_POST['email1'];
		if ($a == "login")
			changeme(conn_db(), "UPDATE user SET login = :login WHERE login like :haha", $_POST['login1'], $_POST['login']);
		if ($a == "accept")
			if (changeme(conn_db(),"UPDATE user SET accept = :login WHERE login like :haha", is('accept'), $_SESSION['login'])) 
				$_SESSION['login'] = $_POST['login1'];
	}
	require_once("./template/profile.php");
}
