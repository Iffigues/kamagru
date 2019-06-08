<?php

require_once("./config/db.php");
require_once("./template/func/passwd.php");

function new_user() {
	$db = conn_db();
	$cle = md5(microtime(TRUE)*100000);
	$stmt = $db->prepare("INSERT INTO user (email, login,password, cle) VALUES (:email, :login,:password, :cle)");
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':login', $_POST['login']);
	$stmt->bindParam(':password', pwd($_POST['password']));
	$stmt->bindParam(':cle', $cle);
	$stmt->execute();
}
