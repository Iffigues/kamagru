<?php

require_once('./config/db.php');
require_once('./template/func/passwd.php');

function record($a, $b, $c) {
	$db = conn_db();
	if ($a == $b) {
		try {
			$stmt = $db->prepare("UPDATE user SET password = :pwd WHERE email like :email");
			$stmt->bindParam(':pwd', pwd($a));
			$stmt->bindParam(':email', $c);
			$stmt->execute();
			return 1;
		} catch (PDOexception $e){
			echo $e->getMessage();
		}
	}
	return 0;
}

function is_recover($cle) {
	$db = conn_db();
	try {
	$stmt = $db->prepare("SELECT * FROM forgot WHERE cle = :cle LIMIT 1");
	if ($stmt->execute(array(':cle' => $cle)) && $row = $stmt->fetch()) {
		return ($row['email']);			
	}
	} catch (PDOexception $e) {
		echo $e->getMessage();
	}
	return (0);
}

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['cle']) && is_recover($_GET['cle']))
	require_once('./template/recover.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$cle = $_POST['cle'];
	$pwd = $_POST['password'];
	$pwd1 = $_POST['pwd'];
	if ($cle && $mail = is_recover($cle)) {
		if (record($pwd, $pwd1, $mail))
			require_once("./template/login.php");
		else
			require_once("./template/recover.php");
	}
}
