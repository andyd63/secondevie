<?php

require_once "./modeles/m_module.php";
require_once "./modeles/m_genre.php";
require_once "./modeles/m_alert.php";
require_once "./modeles/m_categorie.php";
require_once "./modeles/m_etat.php";
require_once "./modeles/m_taille.php";
require_once "./modeles/m_produit.php";
require_once "./modeles/m_favoris.php";
require_once "./modeles/m_sousCategorie.php";

			
$allEtat = allEtat();

// requete qui prend toutes les catégories
if(isset($_GET['action'])){
	$laCategorie = $_GET['action'];
	switch ($_GET['action'])
	{
		case 1: 
			$categorie =  categorie(1);
			$allSousCategorie = sousCategorieAdulte();
			$allGenre = genreAdulte();
			$allTaille = tailleAdulte();
			unset($_GET['c']);
			unset($_GET['action']);
			$produits = allProduitByCategorie(1,$_GET);
			include('vues/v_boutique.php');
		break;
		case 2: 
			$categorie =  categorie(2);
			$allSousCategorie = sousCategorieEnfant();
			$allGenre = genreEnfant();
			$allTaille = tailleEnfant();
			unset($_GET['c']);
			unset($_GET['action']);
			$produits = allProduitByCategorie(2,$_GET);
			include('vues/v_boutique.php');
		break;
		case 3: 
			$categorie =  categorie(3);	
			$allGenre =  allGenre();	
			$allSousCategorie = allSousCategorie();	
			$allTaille = allTaille();	
			unset($_GET['c']);
			unset($_GET['action']);
			$produits = allProduitByCategorie(3,$_GET);
			include('vues/v_boutique.php');
		break;

		case 'addFavoris':
			addFavoris($_POST['idClient'],$_POST['idProduit']);
			return '';
		break;

		case 'favoris':
			$produits = voirFavoris($_SESSION['id']);
			include('vues/v_favoris.php');
		break;
			
		case 'voirProduit':
			$produit = voirProduitById($_GET['id']);
			$etat = etat($produit['etat']);
			$moduleDernierProduit = voir_module(3);
			$lesDerniersProduits = voir10DernierProduit($_GET['id']); 
			include('vues/v_produitDetail.php');
			return '';
		break;

		case 'search':
			$produits = searchProduit($_POST['ask']);
			$allGenre =  allGenre();	
			$allSousCategorie = allSousCategorie();	
			$allTaille = allTaille();	
			include('vues/v_boutique.php');
		break;

		//ERREUR 
		default: 
			$categorie =  categorie(1);
			$allSousCategorie = sousCategorieAdulte();
			$allGenre = genreAdulte();
			$allTaille = tailleAdulte();
			unset($_GET['c']);
			unset($_GET['action']);
			$produits = allProduitByCategorie(1,$_GET);
			include('vues/v_boutique.php');
		break;
		

		case 'supprFavoris':
			supprFavoris($_POST['idClient'],$_POST['idProduit']);
			return '';
		break;
					
	}
		
}
else{
	$categorie =  categorie(1);
			$allSousCategorie = sousCategorieAdulte();
			$allGenre = genreAdulte();
			$allTaille = tailleAdulte();
			unset($_GET['c']);
			unset($_GET['action']);
			$produits = allProduitByCategorie(1,$_GET);
			include('vues/v_boutique.php');
}



?>