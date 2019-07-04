<?php

session_start();

require_once("./likes.php");
require_once("./db.php");

function setLike($e) {
	$db = conn_db();
	$stmt = $db->prepare("INSERT INTO likes(id_photo,user) VALUES(:l,:e)");
	$stmt->bindPAram(":l", $e);
	$stmt->bindParam(":e", $_SESSION['id']);
	$stmt->execute();
}

function dislike($e) {
	$db = conn_db();
	$stmt = $db->prepare("DELETE FROM likes WHERE id_photo = :l AND user = :e");
	$stmt->bindParam(":l", $e);
	$stmt->bindParam(":e", $_SESSION["id"]);
	$stmt->execute();
}

if (isset($_SESSION["co"]) && $_SESSION['co']) {
	if (isset($_GET["action"])) {
		if ($_GET['action'] == "like") {
			if (!(like($_GET['id']))) {
				setLike($_GET['id']);
			}
		}
		if ($_GET["action"] == "dislike") {
			if ((like($_GET['id'])))
				dislike($_GET['id']);
		}
	}
}
