<?php

require_once("./config/db.php");

function activate($db, $cle, $cles, $log) {
	if ($cle == $cles)  {
		echo "Votre compte viens d'être activer";
		try {
			$stmt = $db->prepare("UPDATE user SET active = 1 WHERE login like :login");
			$stmt->bindParam(':login', $log);
			$stmt->execute();
		} catch (PDOexception $e) {}
	} else {
		require_once("./template/resend.php");
	}

}

function validate($db, $log, $cle) {
	try {
		$stmt = $db->prepare("SELECT cle, active FROM user WHERE login = :log");
		if ($stmt->execute(array(':log' => $log)) && $row = $stmt->fetch()) {
			$cles = $row['cle'];
			$active = $row['active'];
		} else {
			require_once("./template/register.php");
			return ;
		}
	} catch (PDOexception $e){
	}
	if ($active)
		echo("my bad");
	else 
		activate($db, $cle, $cles, $log);
	db_close($stmt);
}

function act() {
	if (!isset($_SESSION['co']) || !$_SESSION['co']) {
		$cle = $_GET["cle"];
		$login = $_GET["log"];
		$db = conn_db();
		validate($db, $login, $cle);
		db_close($db);
	} else {
	}
}
act();
