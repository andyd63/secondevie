<?php

require_once "./modeles/m_module.php";
require_once "./modeles/m_genre.php";
require_once "./modeles/m_sousCategorie.php";
require_once "./modeles/m_alert.php";
require_once "./modeles/m_clients.php";
require_once "./modeles/m_commande.php";
require_once('modeles/m_statutCommande.php');
require_once('modeles/m_modeLivraison.php');
require_once('modeles/m_produit.php');
require_once "./assets/inc/function.php";


// S'il est connecté et qu'il n'a pas de profil
if(isConnected()){
	if(!isConnectedandProfil()){
		include("./vues/v_popupProfil.php");
	  exit;}}

if(isset($_GET['action']))
	$action = $_GET['action'];
else{
	$action = "vendre";
}
switch ($action){
	case 'vendre' :
		$allProduitEnfant = sousCategorieEnfant();
		$allProduitAdulte = sousCategorieAdulte();
		include('vues/v_vendre.php');
	break;

	default :
		$allProduitEnfant = sousCategorieEnfant();
		$allProduitAdulte = sousCategorieAdulte();
		include('vues/v_vendre.php');
	break;
}

?>