<?php
require_once("./db.php");
session_start();

function getImage($e) {
	$db = conn_db();
	$r = 5;
	$e = intVal($e);
	$stmt = $db->prepare("SELECT photo.id,  photo.path, photo.likes, photo.date,user.login FROM photo INNER JOIN user ON photo.id_user = user.id ORDER BY photo.date DESC LIMIT :e,:s");
	$stmt->bindParam(':e', $e, PDO::PARAM_INT);
	$stmt->bindParam(':s', $r, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetchAll();
	return ($row);
}

if (isset($_GET['nb'])) {
	$a = getImage($_GET['nb']);
	header('Content-Type: application/json');
	echo json_encode($a);
}
