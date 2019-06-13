<?php

function dispatch($e) {
	if (isset($_SESSION['co']) && $_SESSION['co']) {
		require_once("./template/func/ticket.php");
		if (getTicket())
			require_once("./controller/$e");
		else
			require_once("./template/home.php");
	} else {
		require_once("./controller/$e");
	}
}
