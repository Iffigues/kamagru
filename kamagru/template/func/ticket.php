<?php

function setTicket() {
	$cookie_name = "ticket";
	$ticket = session_id().microtime().rand(0,9999999999);
	$ticket = hash('sha512', $ticket);
	setcookie($cookie_name, $ticket, time() + (60 * 20));
	$_SESSION['ticket'] = $ticket;
}

function getTicket() {
	if (isset($_COOKIE['ticket']) && isset($_SESSION['ticket']))
		if ($_COOKIE['ticket'] === $_SESSION['ticket'])
		{
			$ticket = session_id().microtime().rand(0,9999999999);
			$ticket = hash('sha512', $ticket);
			setcookie('ticket', $ticket, time() + (60 * 20));
			$_SESSION['ticket'] = $ticket;
			return (1);
		} else {
			$_SESSION = array();
			session_destroy();
		} else {
			$_SESSION = array();
			session_destroy();
	}
	return (0);
}
