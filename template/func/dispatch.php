<?php

function dispatch($e) {
	if ($_SESSION['co']) {
		require_once("./template/func/ticket.php");
	} else {
		require_once("./controller/$e");
	}
}
