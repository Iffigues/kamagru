<?php
require_once("./db.php");
session_start();

function getImage($e) {
	$db = conn_db();
	$stmt = $db->prepare("SELECT photo.path, photo.likes, photo.date,user.login FROM photo INNER JOIN user ON photo.id_user = user.id ORDER BY photo.date ASC LIMIT $e, 5");
	$stmt->execute();
	$row = $stmt->fetchAll();
	return ($row);
}

if (isset($_GET['nb'])) {
	$a = getImage($_GET['nb']);
	header('Content-Type: application/json');
	echo json_encode($a);
}
