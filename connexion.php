<?php
include('param.inc');
try
{
	// On se connecte à MySQL
	$bdd = new PDO("mysql:host=$dbHost;dbname=$dbNomBD",$dbUser, $dbMotPasse, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	
	// Pour lancer les exceptions lorsqu'il y des erreurs PDO.
   $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );

}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
	die('Erreur : '.$e->getMessage());
}

?>
