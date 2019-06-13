<?php 

require_once("./template/func/csrf.php");
require_once("./config/db.php");

function recover($db, $stmt, $cle, $email) {
	try {
		$stmt = $db->prepare("INSERT INTO forgot (email, cle) VALUES (:email, :cle)");
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':cle', $cle);
		$stmt->execut();
	} catch (PDOexception $e) {
		try {
			$stmt = $db->prepare("UPDATE forgot SET cle = :cle WHERE email = :email");
			$stmt->bindParam(':cle', $cle);
			$stmt->bindParam(':email', $email);
			$stmt->execute();
		} catch (PDOexception $e) {
		}
	}
}

if (!$_SESSION['co']) {
	if ($_SERVER['REQUEST_METHOD'] == "GET") 
		require_once("./template/forgot.php");
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (getToken("forgot")) {
			$db = conn_db();
			$stmt = $db->prepare("SELECT email  FROM user WHERE email = :mail LIMIT 1");
			if ($stmt->execute(array(':mail' => trim($_POST['email']))) && $row = $stmt->fetch()) {
				recover($db, $stmt, md5(microtime(TRUE)*100000), $row['email']);
			}
		}
	}
} else {
}
