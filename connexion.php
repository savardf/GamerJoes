<?php
include('param_bd.inc');
try
{
	// On se connecte � MySQL
	$conn= new PDO("mysql:host=$dbHost;dbname=$dbNom",$dbUser, $dbMotPasse, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	
	// Pour lancer les exceptions lorsqu'il y des erreurs PDO.
   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );

}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arr�te tout
	die('Erreur : '.$e->getMessage());
}

?>
