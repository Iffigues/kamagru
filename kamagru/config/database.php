<?php
$DB_DSN = 'mysql:host=localhost;charset=utf8mb4;';
$DB_USER = "iffigues";
$DB_PASSWORD = "Marie1426";
$DB_HOST = "localhost";
$options = [
	\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
	\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
	\PDO::ATTR_EMULATE_PREPARES   => false,
];
