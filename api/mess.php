<?php

require_once("./db.php");
require_once("./checked.php");
session_start();

function sendMail($mail) {
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
		$passage_ligne = "\r\n";
	else
		$passage_ligne = "\n";
	$message_html = "<html><head></head><body> That is a bad thing to forgot yur password,
		<br> 
		try to remenber your password next time.
			<br>
			next tim we close account
			Pour recuperer votre compte, veuillez cliquer sur le lien ci dessous
			ou copier/coller dans votre navigateur internet.<br>
			recover
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

if (isset($_SESSION['co']) && $_SESSION['co'] && $_GET['id']) {
	header("Content-Type: application/json");
	$db = conn_db();
	$data = json_decode( file_get_contents( 'php://input' ), true );
	if (isset($data) && $data) {
		$stmt = $db->prepare("INSERT INTO mess (id_photo, author ,mess) VALUES (:lol,:hihi,:haha)");
		$stmt->bindParam(':lol', $_GET['id']);
		$stmt->bindParam(':hihi', $_SESSION['login']);
		$stmt->bindParam(':haha', $data,PDO::PARAM_STR);
		$stmt->execute();
		$rrr = checked();
		$rr =$rrr['accept'];
		if ($rr) {
			sendMail($_SESSION['email']);
		}
	}
}
