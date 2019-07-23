<?php

require_once("./config/db.php");

function carous() {
	$db = conn_db();
	$stmt = $db->prepare("SELECT photo.id, photo.path FROM photo, user WHERE  photo.id_user = user.id AND user.login  = :log");
	$stmt->bindParam(":log", $_SESSION['login']);
	$stmt->execute();
	$row = $stmt->fetchAll();
	return ($row);
}
