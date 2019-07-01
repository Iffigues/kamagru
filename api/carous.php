<?php

require_once("./db.php");

session_start();

function carous() {
	$db = conn_db();
	$stmt->prepare("SELECT photo.path FROM photo INNER JOIN user ON  photo.id_user = user.id WHERE user.login  = :log");
	$stmt->bindParam(":log", $_SESSION['login']);
	$row = $stmt->execute();
}
