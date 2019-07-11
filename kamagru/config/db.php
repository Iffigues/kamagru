<?php

function conn_db() {
	try {
		$db = new PDO("mysql:dbname=kamagru;host=localhost", "iffigues", "Marie1426" );
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		return $db;
	} catch(PDOException $e) {
		echo $e->getMessage();
		return false;
	}
}


function db_close(&$a, &...$b) {
	$a = null;
	foreach ($b as $k =>$v)
		$b[$k] = null;
}
