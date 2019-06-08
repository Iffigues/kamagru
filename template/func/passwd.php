<?php

function pwd($pwd) {
	return (password_hash($pwd, PASSWORD_DEFAULT));
}

function verif_pwd($a, $b) {
	return (password_verify($a, $b));
}
