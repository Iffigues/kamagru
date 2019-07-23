<?php

require_once("./config/db.php");

if (isset($_SESSION['co']) && $_SESSION['co'] && isset($_GET['id'])) {
	$db = conn_db();
	$e = $_GET['id'];
	$r = $_SESSION['id'];
	$stmt = $db->prepare("DELETE FROM photo WHERE id = :id AND id_user = :user");
	$stmt->bindParam(':id', $e);
	$stmt->bindParam(':user', $r);
	$stmt->execute();
	header('Location: ?page=make'); 
}

