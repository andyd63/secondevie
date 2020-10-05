<?php
require_once "./modeles/m_bdd.php";
require_once "./modeles/m_clients.php";
require_once "./modeles/m_menuadmin.php";
require_once "./modeles/m_etiquettelivraison.php";
require_once "./modeles/m_couleur.php";
require_once "./modeles/m_etat.php";
require_once "./modeles/m_boxAdmin.php";
require_once "./modeles/m_commande.php";
require_once "./modeles/m_codepromo.php";
require_once "./modeles/m_genre.php";
require_once "./modeles/m_panier.php";
require_once "./modeles/m_produit.php";
require_once "./modeles/m_module.php";
require_once "./modeles/m_categorie.php";
require_once "./modeles/m_sousCategorie.php";
require_once "./modeles/m_taille.php";


require_once "./assets/inc/function.php";
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
    redirectionNonAdmin(adminexist($_SESSION['mail']));
    $menuAdmin = menuAdminByNom('General');
	include('./vues/administration/v_admin_def.php');
    break;
    
    case 'accueilProduit':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $menuAdmin = menuAdminByNom('Produit');
        include('./vues/administration/v_admin_def.php');
    break;
	
    case 'accueilCommande':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $menuAdmin = menuAdminByNom('Commande');
        include('./vues/administration/v_admin_def.php');
    break;

    case 'lesEtiquettes':
        $etiquetteNonTraite = voirEtiquetteNonTraite();
        include('./vues/administration/v_mesEtiquettes.php'); 
    break;

    case 'UpdateEtiquettesNonTraite':
        $touteCommande = AllEtiquetteNonTraite();
        foreach($touteCommande as $com){// change le statut des commandes non traité
            UpdateCommandeNonTraite($com['idCommande']);
        }
        UpdateAllEtiquetteNonTraite(); // change le statut des etiquettes
        echo 'Les étiquettes sont désormais en préparation!';
    break;
	
    case 'addproduit':
    $allTaille = allTaille();
    $allCategorie = allCategorie(); // toutes les catégories
    $allEtat = allEtat();
    $allSousCategorieEnfant =sousCategorieEnfant(); // sous categorie enfant + tous 
    $allSousCategorieAdulte = sousCategorieAdulte();// sous categorie adulte + tous 
    $allGenre = allGenre(); // tous les genre ()
 
    include('./vues/administration/v_addproduit.php');
    break;  

    case 'addproduitValide':
    $allTaille = allTaille();
    $allEtat = allEtat();
    $allCategorie = allCategorie(); // toutes les catégories
    $allSousCategorieEnfant =sousCategorieEnfant(); // sous categorie enfant + tous 
    $allSousCategorieAdulte = sousCategorieAdulte();// sous categorie adulte + tous 
    $allGenre = allGenre(); // tous les genre ()
    $numDerProduit = voirDernierProduit(); // récupère dernier id produit
    $numDerProduit = $numDerProduit['id'] +1;
    $dossier = "./assets/img/produits/$numDerProduit/"; //crée le dossier du  
    mkdir($dossier);
    $img1 = $_FILES['img1']['tmp_name'];
    $img2 = $_FILES['image2']['tmp_name'];
    move_uploaded_file($img1, $dossier.$_FILES['img1']['name']);
    move_uploaded_file($img2, $dossier.$_FILES['image2']['name']);
    if($_POST['sousCategorieAdulteProduit'] == '0'){
        $sousCat = $_POST['sousCategorieEnfantProduit'];
    }else{
        $sousCat = $_POST['sousCategorieAdulteProduit'];
    }
    addproduit($_POST['nomProduit'],$_POST['marqueProduit'],$_POST['prixProduit'],$_POST['etatProduit'],$_POST['tailleProduit'],$_POST['categorieProduit'],'./assets/img/produits/'.$numDerProduit.'/'.$_FILES['img1']['name'],'./assets/img/produits/'.$numDerProduit.'/'.$_FILES['image2']['name'],$_POST['description'],
    $sousCat,$_POST['genreProduit'],$_POST['reducProduit']);
    $errorSuccess = "Le produit est ajouté!";
    include('./vues/administration/v_addproduit.php');
    break;    

    case 'mesProduits':
        $allProduitDispo = voirProduitParEtat(0);
        $allProduitReserve = voirProduitParEtat(1);
        $allProduitVendu = voirProduitParEtat(2);
        include('./vues/administration/v_mesProduits.php'); 
    break;



    //LES COMMANDES ET SA GESTION 
    case 'lesCommandes' : 
        if(isset($_SESSION['id']))
        {  
            $commandes= allCommandes();
            if(!isset($_GET['ajx'])){ //appel normal
                $commandes = json_decode($commandes);
                $commandes = $commandes->result;
                require_once('vues/administration/v_lescommandes.php');
            } else	{ // Appel Ajax
                appelAjax($commandes);
            }	
        }else{
            redirectUrl("index.php?c=accueil");
        }
        break;


    default: 
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $nbCommande = count(allCommandes()); // nb de commande 
        $menuAdmin = menuAdminByNom('General');
        include('./vues/administration/v_admin_def.php');
    break;

   
}


?>