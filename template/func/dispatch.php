<?php

function dispatch($e) {
	if ($_SESSION['co']) {
		require_once("./template/func/ticket.php");
		if (getTicket())
			require_once("./controller/$e");
		else
			require_once("./template/home.php");
	} else {
		require_once("./controller/$e");
	}
}
