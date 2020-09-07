<?php
require_once "./modeles/m_bdd.php";
require_once "./modeles/m_clients.php";
require_once "./modeles/m_commande.php";
require_once "./modeles/m_codepromo.php";
require_once "./modeles/m_panier.php";
require_once "./modeles/m_module.php";
require_once "./modeles/m_evenements.php";
require_once "./assets/inc/function.php";
$conn = bdd();

if(isset($_GET['action']))
{
	$action = $_GET['action'];
}
else
	$action = 'accueil';


switch($action){
    case 'accueil':
        $lesEvenements = voirDernierEvenement(); //nb evenements
        $NameEvenement = voirNameEvenement();
        include('./vues/accueil.php');
	break;
	
    default:
        include('./vues/accueil.php');
    break;
}


?>