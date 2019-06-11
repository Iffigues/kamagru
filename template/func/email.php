<?php

function verif_password($password) {
		if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#', $password))
					return 1;
			return (0);
}

function verif_email($e) {
	$e = trim($e);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		return false;	
	if (substr_count($e, '@') > 1)
		return false;
	while  (substr_count($e,'%40') > 0)
		return false;
	return true;
}
