<?php

require_once("./config/db.php");

function getimg($e) {
	$db = conn_db();
	$stmt = $db->prepare("SELECT * FROM photo WHERE id = :id limit 1");
	$stmt->bindParam(":id", $e);
	$stmt->execute();
	$row = $stmt->fetch();
	return ($row);
}
