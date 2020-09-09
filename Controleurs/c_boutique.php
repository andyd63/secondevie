<?php

require_once "./modeles/m_categorie.php";
require_once "./modeles/m_produit.php";
require_once "./modeles/m_sousCategorie.php";

$allSousCategorie = allSousCategorie();
// requete qui prend toutes les catégories
if(isset($_GET['action'])){
	$laCategorie = $_GET['action'];
	switch ($_GET['action'])
	{
		case 1: 
			$categorie =  categorie(1);
			$produits = allProduitByCategorie(1);
			include('vues/v_boutique.php');
		break;
		case 2: 
			$categorie =  categorie(2);
			include('vues/v_boutique.php');
		break;
		case 3: 
			$categorie =  categorie(3); 
			include('vues/v_boutique.php');
		break;
		case 4: 
			$categorie =  categorie(4); 
			include('vues/v_boutique.php');
		break;	
					
	}
		
}
else{
	$categorie = 0;
	include('vues/v_boutique.php');
}



?>