<?php
require_once("./config/setup.php");

function create_user($db) {
	try {
		$user = "
		CREATE TABLE IF NOT EXISTS user(
		id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
		email VARCHAR(100) NOT NULL UNIQUE,
		login VARCHAR(50) NOT NULL UNIQUE,
		cle VARCHAR(32)NOT NULL UNIQUE,
		active BOOLEAN DEFAULT NULL,
		password varchar(100) NOT NULL
	);";
	$db->exec($user);
	} catch (PDOexception $e) {
		echo $e->getMessage();
		return false;
	}
}

try {
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $options);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->exec("CREATE DATABASE IF NOT EXISTS kamagru;");
	$dbh->exec("use kamagru;");
	create_user($dbh);
} catch (PDOException $e) {
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	        die();
}
?>
