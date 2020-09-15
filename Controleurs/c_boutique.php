<?php

require_once "./modeles/m_categorie.php";
require_once "./modeles/m_taille.php";
require_once "./modeles/m_produit.php";
require_once "./modeles/m_favoris.php";
require_once "./modeles/m_sousCategorie.php";

$allSousCategorie = allSousCategorie();
$allTaille = allTaille();
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

		case 'addFavoris':
			addFavoris($_POST['idClient'],$_POST['idProduit']);
			return '';
		break;

		case 'supprFavoris':
			supprFavoris($_POST['idClient'],$_POST['idProduit']);
			return '';
		break;
					
	}
		
}
else{
	$categorie = 0;
	include('vues/v_boutique.php');
}



?>