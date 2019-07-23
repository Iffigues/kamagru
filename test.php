<?php 
    ini_set( 'display_errors', 1 );
	echo getHostByName(getHostName());	 
    error_reporting( E_ALL );
 
    $from = "test@votredomaine.com";
 
    $to = "iffigues@vivaldi.net";
 
    $subject = "Vérification PHP mail";
 
    $message = "PHP mail marche";
 
    $headers = "From:" . $from;
 
    mail($to,$subject,$message, $headers);
 
    echo "L'email a été envoyé.";
?>

