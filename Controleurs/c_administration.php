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
require_once('modeles/m_statutCommande.php');
require_once('modeles/m_modeLivraison.php');


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
        $commandeTraite = voirCommandeRelaiTraite();
        $commandeEnLivraison = voirCommandeRelaienLivraison();
        include('./vues/administration/v_mesEtiquettes.php'); 
    break;

    case 'leslivraisons':
        $commandeNonTraite = voirCommandeLivraisonNonTraite();
        $commandeEnLivraison = voirCommandeDomicileenLivraison();
        include('./vues/administration/v_meslivraisons.php'); 
    break;

    case 'mesClients':
        $allClient = allClientTotal();
        include('./vues/administration/v_mesClients.php'); 
    break;

   
    case 'changeDateLivraison';
    redirectionNonAdmin(adminexist($_SESSION['mail']));
    updateStatutCommande($_POST['id'],$_POST['statut']); //change le statut de la commande
    changeCommandeDateLivraison($_POST['id'],$_POST['date']); // change la date de livraison
    echo 'Date mis à jour!';
    break;

    case 'changeDateLivrer';
    redirectionNonAdmin(adminexist($_SESSION['mail']));
    updateStatutCommande($_POST['id'],'4'); //change le statut de la commande
    changeCommandeDateLivrer($_POST['id'],$_POST['date']); // change la date de livraison
    echo 'Commande mise à jour!';
    break;

    case 'changeHeureLivraison';
    redirectionNonAdmin(adminexist($_SESSION['mail']));
    changeCommandeHeureLivraison($_POST['id'],$_POST['date']);
    echo 'Heure mis à jour!';
    break;

    case 'UpdateEtiquettesNonTraite':
        $touteCommande = AllEtiquetteNonTraite();
        foreach($touteCommande as $com){// change le statut des commandes non traité
            updateStatutCommande($com['idCommande'],2);
        }
        UpdateAllEtiquetteNonTraite(); // change le statut des etiquettes
        echo 'Les étiquettes sont désormais en préparation!';
    break;
	
    case 'addproduit':
    redirectionNonAdmin(adminexist($_SESSION['mail']));
    $allTaille = allTaille();
    $allCategorie = allCategorie(); // toutes les catégories
    $allEtat = allEtat();
    $allSousCategorieEnfant =sousCategorieEnfant(); // sous categorie enfant + tous 
    $allSousCategorieAdulte = sousCategorieAdulte();// sous categorie adulte + tous 
    $allGenre = allGenre(); // tous les genre ()
 
    include('./vues/administration/v_addproduit.php');
    break;  

    case 'addproduitValide':
    redirectionNonAdmin(adminexist($_SESSION['mail']));
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
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $allProduitDispo = voirProduitParEtat(0);
        $allProduitReserve = voirProduitParEtat(1);
        $allProduitVendu = voirProduitParEtat(2);
        include('./vues/administration/v_mesProduits.php'); 
    break;

    case 'lacommande' :
        redirectionNonAdmin(adminexist($_SESSION['mail']));
            $commande = voirCommandeId($_GET['id']);
            if($commande != false){ // si elle n'existe pas
                $allStatutCommande = allStatutCommande(); // récupère tout les statuts
                $statutCommande = statutCommande($commande['statutCommande']); // le statut de la commande
                $modeLivraison = modeLivraison($commande['modeLivraison']); // le mode de livraison de la commande
                $produits = voirProduitByCommande($commande['idCommande']); // tout les produits de la commande
                // recuperer les produits de la commande    
                require_once('./vues/v_commande.php');
            } else{
                redirectUrl("index.html");
            }
    break;

    //LES COMMANDES ET SA GESTION 
    case 'lesCommandes' :
        redirectionNonAdmin(adminexist($_SESSION['mail'])); 
        $commandes= allCommandes();
            if(!isset($_GET['ajx'])){ //appel normal
                $commandes = json_decode($commandes);
                $commandes = $commandes->result;
                require_once('vues/administration/v_lescommandes.php');
            } else	{ // Appel Ajax
                appelAjax($commandes);
            }	
        break;

    //LES COMMANDES d'un client en particulier 
    case 'commandeClient' :
        redirectionNonAdmin(adminexist($_SESSION['mail'])); 
        $commandes= mescommandes($_GET['id']);
            if(!isset($_GET['ajx'])){ //appel normal
                $commandes = json_decode($commandes);
                $commandes = $commandes->result;
                require_once('vues/administration/v_lescommandes.php');
            } else	{ // Appel Ajax
                appelAjax($commandes);
            }	
        break;


    default: 
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $menuAdmin = menuAdminByNom('General');
        include('./vues/administration/v_admin_def.php');
    break;

   
}


?>