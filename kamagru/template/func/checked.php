<?php

require_once("config/db.php");

function checked() {
	$db = conn_db();
	$stmt = $db->prepare("SELECT accept FROM user WHERE login = :log LIMIT 1");
	$stmt->bindParam(":log", $_SESSION["login"]);
	$stmt->execute();
	$row = $stmt->fetch();
	return ($row);
}
