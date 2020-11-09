<?php

require_once "./modeles/m_module.php";
require_once "./modeles/m_genre.php";
require_once "./modeles/m_clients.php";
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
			$allCategories = allCategorie();
			$barFilter = true;
			$nbProduitParLigne = 3;
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
			$allCategories = allCategorie();
			$barFilter = true;
			$nbProduitParLigne = 3;
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
			$allCategories = allCategorie();
			$barFilter = true;
			$nbProduitParLigne = 3;
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
			$barFilter = true;
			$nbProduitParLigne = 3;
			$produit = voirProduitById($_GET['id']);
			$etat = etat($produit['etat']);
			$moduleDernierProduit = voir_module(3);
			$lesDerniersProduits = voir10DernierProduit($_GET['id']); 
			include('vues/v_produitDetail.php');
			return '';
		break;

		case 'search':
			$ask = null;
			if(isset($_POST['ask'])){
				$ask = $_POST['ask'];
			}
			if(isset($_GET['ask'])){
				$ask = $_GET['ask'];
			}
			if($ask != null ){
			$barFilter = false;
			$nbProduitParLigne = 4;
			$produits = searchProduit($ask,$_GET);
			$allGenre =  allGenre();	
			$allSousCategorie = allSousCategorie();	
			$allTaille = allTaille();	
			include('vues/v_boutique.php');
			}else{ // erreur sans recherche
				$barFilter = true;
				$nbProduitParLigne = 3;
				$categorie =  categorie(1);
				$allSousCategorie = sousCategorieAdulte();
				$allGenre = genreAdulte();
				$allTaille = tailleAdulte();
				unset($_GET['c']);
				unset($_GET['action']);
				$produits = allProduitByCategorie(1,$_GET);
				include('vues/v_boutique.php');
			}
		break;

		// Case de la séléction
		case '4':
			if(isConnected()){
			$allCategories = allCategorie();
			$barFilter = true;
			$nbProduitParLigne = 4;
			$categorie =  categorie(4);
			$page = 'selection'; // nom de la page
			unset($_GET['c']);
			unset($_GET['action']);
			$leClient = clientByEmail($_SESSION['mail']); //récupère les infos du client 
			$produits = allProduitBySelection($_GET,$leClient['tailleBas'],$leClient['tailleHaut'],$leClient['genre']); // récupère les produits selon ses infos
			$allGenre =  allGenre();	
			$allSousCategorie = allSousCategorie();	
			$allTaille = allTaille();	
			include('vues/v_boutique.php');
			}else{
				include('vues/v_globalBoutique.php');
			}
			
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
			include('vues/v_globalBoutique.php');
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
			include('vues/v_globalBoutique.php');
}



?>