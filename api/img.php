<?php
require_once("./gd.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST" && $_SESSION['co']) {
	header('Content-Type: application/json');
	$data = json_decode( file_get_contents( 'php://input' ), true );
	convert($data['img'], $data['icone']);
	http_response_code(201);
}
