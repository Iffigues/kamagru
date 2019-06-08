<?php
if ($_SESSION['co'])
	header('Location: /');
if ($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "GET")
	require_once('./template/register.php');
