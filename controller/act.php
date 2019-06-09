<?php

require_once("./config/db.php");

function validate($db, $log, $cle) {
	try {
	$stmt = $db->prepare("SELECT cle, active FROM user WHERE login = :log");
	if($stmt->execute(array(':log' => $log)) && $row = $stmt->fetch())
	{
		$cles = $row['cle'];
		$active = $row['active'];
	}
	} catch (PDOexception $e){
	}
	if ($active)
		echo "another time";
	else {
		if ($cle == $cles) {
			echo "Votre compte a bien ét activer";
			try {
			$stmt = $db->prepare("UPDATE user SET active = 1 WHERE login like :login");
			$stmt->bindParam(':login', $log);
			$stmt->execute();
			} catch (PDOexception $e) {
			}
		} else {
			echo "Erreur ! Votre compte ne peut être activé.";
		}
	}
	db_close($stmt);
}

function act() {
	$cle = $_GET["cle"];
	$login = $_GET["log"];
	$db = conn_db();
	validate($db, $login, $cle);
	db_close($db);
}
act();
