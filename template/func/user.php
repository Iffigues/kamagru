<?php

require_once("./config/db.php");
require_once("./template/func/passwd.php");
require_once("./template/func/csrf.php");

function epimail($mail, $login, $cle) {
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
		$passage_ligne = "\r\n";
	else
		$passage_ligne = "\n";

	$en = urlencode($login);
	$ec = urlencode($cle);
$message_html = "<html><head></head><body>Bienvenue sur VotreSite,
<br> 
Pour activer votre compte, veuillez cliquer sur le lien ci dessous
ou copier/coller dans votre navigateur internet.<br>
 <a href=\"http://gopiko.fr/?page=act&log=$en&cle=$ec\">
 register</a>
	Ceci est un mail automatique, Merci de ne pas y répondre";
	$boundary = "-----=".md5(rand());
	$sujet = "Registration Kamagru";
	$header = "From: \"Kamagru\"<admin@gopiko.fr>".$passage_ligne;
	$header.= "Reply-to: \"WeaponsB\" <$mail>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	mail($mail,$sujet,$message,$header);
}

function new_user() {
	$db = conn_db();
	$e = getToken("register");
	try {
		$cle = md5(microtime(TRUE)*100000);
		$stmt = $db->prepare("INSERT INTO user (email, login,password, cle) VALUES (:email, :login,:password, :cle)");
		$stmt->bindParam(':email', $_POST['email']);
		$stmt->bindParam(':login', $_POST['login']);
		$stmt->bindParam(':password', pwd($_POST['password']));
		$stmt->bindParam(':cle', $cle);
		$stmt->execute();
		epimail($_POST["email"], $_POST["login"],$cle);
		db_close($db,$stmt);
	} catch (PDOexception $e) {
	}
}

function resend() {
	$db = conn_db();
	$user = $_GET['log'];
	try {
		$stmt = $db->prepare("SELECT email, active FROM user WHERE login = :log");
		if ($stmt->execute(array(':log' => $user)) && $row = $stmt->fetch()) {
			if (!row['active']) {
				$cle = md5(microtime(TRUE) * 100000);
				$stmt = $db->prepare("UPDATE user SET cle = :cle WHERE email = :mail");
				$stmt->bindParam(":cle", $cle);
				$stmt->bindPAram(":mail", row['email']);
				$stmt->execute();
				epimail(row['email'], $user, $cle);
			} else {
			}
		}
	} catch (PDOexception $e){}
	db_close($db);
}
