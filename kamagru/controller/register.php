<?php
if (isset($_SESSION['co']) && $_SESSION['co'])
	require_once("./template/home.php");
else
	if ($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "GET")
		require_once('./template/register.php');
