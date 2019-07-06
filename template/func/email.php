<?php

require_once('./template/func/error.php');

function verif_password($password) {
	if (strlen($password < 8)) {
		return (0);
	}
	if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#', $password))
			return 1;
		return (0);
}

function verif_email($e) {
	if(!filter_var($e, FILTER_VALIDATE_EMAIL))
		return false;	
	if (substr_count($e, '@') > 1)
		return false;
	if  (substr_count($e,'%40') > 0)
		return false;
	return true;
}

function check_out($e) {
	if (!verif_password($e[1]) || $e[2] != $e[1]) {
		setError('register', "verifier que votre mot de passe est bien securiser ou que vous l ayer bien ecrit");
		return 0;
	}
	if (!verif_email($e[3])) {
		setError("register", "mail non valide");
		return 0;
	}
	return 1;
}
