<?php

require_once("./db.php");

function like($a) {
	$db = conn_db();
	$stmt = $db->prepare("SELECT COUNT(id) FROM likes WHERE id_photo = :lol AND user = :xd ");
	$stmt->bindParam(":lol", $a);
	$stmt->bindParam(":xd", $_SESSION['id']);
	$stmt->execute();
	$row = $stmt->fetch();
	if ($row[0] == 0)
		return (0);
	return (1);
}
