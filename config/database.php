<?php
require_once("./config/setup.php");

function create_db($db) {
	return false;
}

try {
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $options);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->exec("CREATE DATABASE IF NOT EXISTS kamagru;");
	$dbh->exec("use kamagru;");
} catch (PDOException $e) {
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	        die();
}
?>
