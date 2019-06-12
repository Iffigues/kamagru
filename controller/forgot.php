<?php 
require_once("./template/func/csrf.php");

if (!$_SESSION['co']) {
	if ($_SERVER['REQUEST_METHOD'] == "GET") 
		require_once("./template/forgot.php");
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
	}
} else {
}
