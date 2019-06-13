<?php

require_once('./config/db.php');

function is_recover() {
}

if ($_SERVER['REQUEST_METHOD'] == "GET")
	require_once('./template/recover>php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$cle = $_POST['cle'];
	$pwd = $_POST['password'];
	$pwd1 = $_POST['pwd'];
	$db = conn_db();
	$stmt = $db->prepare("SELECT * FROM forgot WHERE cle = :cle LIMIT 1");
	if ($stmt->execute(array(':cle' => $cle)) && $row = $stmt->fetch()) {
		
	}
}
