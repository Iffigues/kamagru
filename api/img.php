<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST" && $_SESSION['co']) {
	header('Content-Type: application/json');
	$data = json_decode( file_get_contents( 'php://input' ), true );
	echo json_encode($data);
	exit();
}