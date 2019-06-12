<?php

function verif_password($password) {
		if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#', $password))
					return 1;
			return (1);
}

function verif_email($e) {
	if(!filter_var($e, FILTER_VALIDATE_EMAIL))
		return false;	
	if (substr_count($e, '@') > 1)
		return false;
	while  (substr_count($e,'%40') > 0)
		return false;
	return true;
}

function check_out($e) {
	if (!verif_password($e[1]) || $e[2] != $e[1])
		return 0;
	if (!verif_email($e[3]))
		return 0;
	return 1;
}
