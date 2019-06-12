<?php 

require_once("./template/func/csrf.php");
require_once("./config/db.php");

if (!$_SESSION['co']) {
	if ($_SERVER['REQUEST_METHOD'] == "GET") 
		require_once("./template/forgot.php");
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (getToken("forgot")) {
			$db = conn_db();
		}
	}
} else {
}
