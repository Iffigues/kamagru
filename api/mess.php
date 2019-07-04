<?php

require_once("./db.php");
session_start();

if (isset($_SESSION['co']) && $_SESSION['co'] && $_GET['id']) {
	header("Content-Type: application/json");
	$db = conn_db();
	$data = json_decode( file_get_contents( 'php://input' ), true );
	if (isset($data) && $data) {
	$stmt = $db->prepare("INSERT INTO mess (id_photo, author ,mess) VALUES (:lol,:hihi,:haha)");
	$stmt->bindParam(':lol', $_GET['id']);
	$stmt->bindParam(':hihi', $_SESSION['login']);
	$stmt->bindParam(':haha', $data);
	$stmt->execute();
	}
}
