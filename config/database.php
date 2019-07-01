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

function create_photo($db) {
	try {
		$photo = "
		CREATE TABLE IF NOT EXISTS photo(
			id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
			id_user INT,
			path VARCHAR(100) NOT NULL UNIQUE,
			FOREIGN KEY (id_user) REFERENCES user(id)
			);";
		$db->exec($photo);
	} catch (PDOexception $e) {
		echo $e->getMessage();
	}
}

function create_forgot($db) {
	try {
		$forgot = "
		CREATE TABLE IF NOT EXISTS forgot(
		email VARCHAR(100) NOT NULL UNIQUE,
		cle VARCHAR(32) NOT NULL UNIQUE
		);";
		$db->exec($forgot);
	} catch (PDOexception $e) {
		echo $e->getMessage();
	}
}

try {
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $options);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->exec("CREATE DATABASE IF NOT EXISTS kamagru;");
	$dbh->exec("use kamagru;");
	create_user($dbh);
	create_forgot($dbh);
	create_photo($dbh);
} catch (PDOException $e) {
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	        die();
}
?>
