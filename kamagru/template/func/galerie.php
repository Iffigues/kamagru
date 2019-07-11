<?php

require_once("./config/db.php");

function getComment($db, $id) {
	$stmt = $db->prepare("SELECT mess, author, date FROM mess WHERE id_photo = :e ORDER BY date DESC");
	$stmt->bindParam(":e", $id);
	$stmt->execute();
	$row = $stmt->fetchAll();
	return ($row);
}

function getimg($e) {
	$g = [];
	$db = conn_db();
	$stmt = $db->prepare("SELECT * FROM photo WHERE id = :id limit 1");
	$stmt->bindParam(":id", $e);
	$stmt->execute();
	$row = $stmt->fetch();
	$a = getComment($db, $row['id']);
	$g[0] = $row;
	$g[1] = $a;
	return ($g);
}
