<?php

require_once("./config/db.php");
require_once("./template/func/passwd.php");

if (!$_SESSION["co"]){
	if ($_SERVER['REQUEST_METHOD'] == "GET")
		require_once("./template/login.php");
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$db = conn_db();
		$mail = $_POST['mail'];
		$pwd = $_POST["pwd"];
		try {
			$stmt = $db->prepare("SELECT *  FROM user WHERE email like :mail LIMIT 1");
			$stmt->execute(array(':mail' => $mail));
			$row = $stmt->fetch();
			if ($row) {
				$active = $row['active'];
				$email = $row["email"];
				$passwd  = $row["password"];
				if ($active) {
					if (verif_pwd($pwd, $passwd)) {
						$_SESSION['co'] = 1;
						require_once("./template/home.php");
					} else {
						require_once("./template/login.php");
					}
				} else {
				}
			}

		} catch (PDOexception $e){
			echo $e->getMessage();
		}
		db_close($db);
	}
} else {
	require_once("./template/register.php");
}
