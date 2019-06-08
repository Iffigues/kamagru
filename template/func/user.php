<?php

require_once("./config/dg.php");

function new_user() {
	$db = conn_db();
	$stmp = $db->prepare("INSERT INTO user (email, login,passwordi)");
}
