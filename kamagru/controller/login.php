<?php
require_once("./config/db.php");
require_once("./template/func/passwd.php");
require_once("./template/func/csrf.php");
require_once("./template/func/ticket.php");
if (!isset($_SESSION['co']) || !$_SESSION["co"]){
	if ($_SERVER['REQUEST_METHOD'] == "GET")
		require_once("./template/login.php");
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$db = conn_db();
		$mail = $_POST['mail'];
		$pwd = $_POST["pwd"];
		try {
			if (getToken('login')) {
				$stmt = $db->prepare("SELECT *  FROM user WHERE login like :mail LIMIT 1");
				$stmt->execute(array(':mail' => $mail));
				$row = $stmt->fetch();
				if ($row) {
					$active = $row['active'];
					$email = $row["email"];
					$passwd  = $row["password"];
					if ($active) {
						if (verif_pwd($pwd, $passwd)) {
							$_SESSION['co'] = 1;
							$_SESSION['login'] = $row['login'];
							$_SESSION['id']  = $row['id'];
							$_SESSION['email'] = $row['email'];
							setTicket();
							require_once("./template/home.php");
						} else {
							require_once("./template/login.php");
						}
					} else {
						require_once("./template/login.php");
					}
					require_once('./template/login.php');
				} else {
					require_once("./template/login.php");
				}
			} else {
				require_once('./template/login.php');
			}
		} catch (PDOexception $e){
			require_once('./template/login.php');
		}
		db_close($db);
	}
} else {
	require_once("./template/login.php");
}
