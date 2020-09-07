<?php
require_once "./modeles/m_bdd.php";
require_once "./modeles/m_clients.php";
require_once "./modeles/m_evenements.php";
$conn = bdd();

if(isset($_GET['action']))
{
	$action = $_GET['action'];
}
else
	$action = 'accueil';


switch($action)
{
	 case 'accueil':  
	$touslesevenements = voir_tous_evenement();
	include('./vues/tous_evenements.php');
	break;
	
	
	///// Ajout evenement //////////
	case 'evenement':
	$id = $_GET['a'] ;
	$evenement = voir_evenement($_GET['a']);
	$compteur_photo = compte_nbre_photo($_GET['a']);
	include('./vues/evenement.php');
	break;
	
	
}


?>