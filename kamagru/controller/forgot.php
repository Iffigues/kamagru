<?php 

require_once("./template/func/csrf.php");
require_once("./config/db.php");
require_once("./template/func/email.php");

function epimail($mail, $login, $cle) {
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
		$passage_ligne = "\r\n";
	else
		$passage_ligne = "\n";
	$en = urlencode($login);
	$ec = urlencode($cle);
	$fr = $_SERVER['HTTP_HOST'];
	$message_html = "<html><head></head><body> That is a bad thing to forgot yur password,
		<br> 
		try to remenber your password next time.
		<br>
		next tim we close account
		Pour recuperer votre compte, veuillez cliquer sur le lien ci dessous
		ou copier/coller dans votre navigateur internet.<br>
		<a href=\"http://$fr/?page=recover&log=$en&cle=$ec\">
		recover</a>
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


function recover($db, $stmt, $cle, $email, $log) {
	try {
		$stmt = $db->prepare("INSERT INTO forgot (email, cle) VALUES (:email, :cle)");
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':cle', $cle);
		$stmt->execute();
		epimail($email, $log, $cle);
	} catch (PDOexception $e) {
		try {
			$stmt = $db->prepare("UPDATE forgot SET cle = :cle WHERE email = :email");
			$stmt->bindParam(':cle', $cle);
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			epimail($email, $log, $cle);
		} catch (PDOexception $e) {
		}
	}
}

if (!isset($_SESSION['co']) || !$_SESSION['co']) {
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (getToken("forgot") && verif_email($_POST['mail'])) {
			$db = conn_db();
			try {
				$stmt = $db->prepare("SELECT email, login  FROM user WHERE email = :mail LIMIT 1");
				if ($stmt->execute(array(':mail' => trim($_POST['mail']))) && $row = $stmt->fetch()) {
					recover($db, $stmt, md5(microtime(TRUE)*100000), $row['email'], $row['login']);
					header("Location: /");
				}
			} catch (PDOexception $e) {
				echo $e->getMessage();
			}
		}
	}
	require_once("./template/forgot.php");
} else {
}
