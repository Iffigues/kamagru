<?php

require_once("./config/db.php");
require_once("./template/func/passwd.php");

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
	$sujet = "Hey mon ami !";
	$header = "From: \"admin\"<admin@gopiko.fr>".$passage_ligne;
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
	try {
		$cle = md5(microtime(TRUE)*100000);
		$stmt = $db->prepare("INSERT INTO user (email, login,password, cle) VALUES (:email, :login,:password, :cle)");
		$stmt->bindParam(':email', $_POST['email']);
		$stmt->bindParam(':login', $_POST['login']);
		$stmt->bindParam(':password', pwd($_POST['password']));
		$stmt->bindParam(':cle', $cle);
		$stmt->execute();
		epimail($_POST["email"], $_POST["login"],$cle);
	} catch (PDOexception $e) {
		echo 'Échec lors de la connexion : ' . $e->getMessage();
	}
}
