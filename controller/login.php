<?php
if (!$_SESSION["co"]){
	if ($_SERVER['REQUEST_METHOD'] == "GET")
		require_once("./template/login.php");
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$mail = $_POST['email'];
		$pwd= $_POST["pwd"];
	}

}
