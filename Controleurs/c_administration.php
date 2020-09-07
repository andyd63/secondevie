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


switch($action)
{
    case 'accueil':
    redirectionNonAdmin(adminexist($_SESSION['mail']));
    $nbEve = count(voir_tous_evenement()); //nb evenements
    $nbCommande = count(allCommandes()); // nb de commande 
	include('./vues/administration/v_admin_def.php');
	break;
	
	case 'stat':
    redirectionNonAdmin(adminexist($_SESSION['mail']));
	include('./vues/administration/v_admin_stat.php');
	break;

    case 'addFacture':       
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        include('./vues/administration/v_ajout_facture.php');
    break;

    case 'act_addFacture':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $idCli = clientByEmail($_POST['emailClient']);
        $nbreUnitairePapier = ($_POST['nbrePapier'] - ($_POST['nbreLot'] *3));
        ajouter_commande($idCli,$_POST['prixCommande'],$_POST['nbreNum'],$_POST['prixNum'],$_POST['nbrePapier'],$_POST['nbreLot'],$_POST['prixLot'],$nbreUnitairePapier,  $_POST['prixU'], '0');
        echo "Votre facture est ajoutée!";       
    break;


	case 'commandes':
    redirectionNonAdmin(adminexist($_SESSION['mail']));
	if(isset($_GET['page'])) {
	    if($_GET['page']>1) {
	        $compteur = ($_GET['page']-1)*50;
            }
            else {
                $compteur = 1;
            }
        }
        else {
            $_GET['page'] = 1;
            $compteur = 1 ;
        }
            $imageparpage = 25 ;
        $comTotal = count(allCommandes());
        $pagesTotales = ceil($comTotal/$imageparpage);
        if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourante = $_GET['page'];
        } else {
            $pageCourante = 1;
        }
        $depart = ($pageCourante-1)*$imageparpage;
        $fin = $depart + $imageparpage;
        $commandes= allCommandes();
	include('./vues/administration/v_mes_commandes.php');
    break;
    
    case 'mesEvenements':
        redirectionNonAdmin(adminexist($_SESSION['mail']));

        $evenements = voir_tous_evenement();
	include('./vues/administration/v_admin_evenement.php');
	break;
	
	
	case 'diapo':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
	$diapos = voir_tous_diapo();
	include('./vues/administration/v_ajout_diapo.php');
	break;
	
	case 'ajout_diapo':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
	$diapos = voir_tous_diapo();
	$ajout = ajouter_diapo();
	?><SCRIPT LANGUAGE="JavaScript">
    document.location.href="index.php?c=admin&action=diapo&a=valid"
    </SCRIPT>
<?php 
	break;	
	
	case 'suppr_diapo':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
	$diapos = voir_tous_diapo();
	if(isset($_GET['num']))
	{
		if(ctype_digit($_GET['num']))
		{
			if(voir_diapo($_GET['num']) == 1 )
			{
			$ajout = delete_diapo($_GET['num']);
			}
		}
	}
		include('./vues/administration/v_ajout_diapo.php');
	break;
	
	
	
	///// Page Ajout evenement //////////
	case 'ajout_eve':
	include('./vues/administration/v_ajout_evenement.php');
    break;	
    

	case 'modif_prix':
	include('./vues/administration/v_modif_prix.php');
	break;
	
	case 'modifprix_act':
	$pri = modifprix($_POST['prix_paquet'],$_POST['prix_unitaire'],$_POST['prix_numerique'],$_POST['nbre_photo_lot'],$_POST['reductionP'],$_POST['reductionN']);
	?><SCRIPT LANGUAGE="JavaScript">document.location.href="index.php?c=admin&action=modif_prix"</SCRIPT>
    <?php
    
    
    case 'act_ajout_eve':
    redirectionNonAdmin(adminexist($_SESSION['mail']));
    $ajout_eve = ajouter_evenement($_POST['nom'],$_POST['date']);
    $message = $ajout_eve;
    $num_dernier_eve = voir_dernier_evenement();
    $dossier = "./assets/img/mes_evenements/$num_dernier_eve";
    $dossier2 = "./assets/img/mes_evenements_photo_normal/$num_dernier_eve";
    mkdir($dossier);
    mkdir($dossier2);
    include('./vues/administration/v_ajout_evenement.php');
    break;

    case 'act_modif_eve':
    redirectionNonAdmin(adminexist($_SESSION['mail']));
    $ajout_eve = modifier_evenement($_POST['nom'],$_GET['id']);
    $message = $ajout_eve;
    $evenements = voir_tous_evenement();
	include('./vues/administration/v_admin_evenement.php');
    break;


    case 'act_ajout_codeP':
        ajoutercodePromo($_POST['nom'],$_POST['pourcentage'],$_POST['multi']);
       ?> <SCRIPT LANGUAGE="JavaScript">document.location.href="index.php?c=admin&action=codeP"</SCRIPT><?php
        break;
    case 'rendreActifCode':
        updateCodePromo($_POST['actif'],"1");
        ?> <SCRIPT LANGUAGE="JavaScript">document.location.href="index.php?c=admin&action=codeP"</SCRIPT><?php
        break;

    case 'rendreNonActifCode':
        updateCodePromo($_POST['actif'],"0");
        ?><SCRIPT LANGUAGE="JavaScript">document.location.href="index.php?c=admin&action=codeP"</SCRIPT><?php
        break;

    case 'module':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $lesModules = voirAllModule();
        include('./vues/administration/v_module.php');
        break;

    case 'codeP':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $allcodePromo = allCodePromo();
        include('./vues/administration/v_codeP.php');

    case 'mesClients':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        include('./vues/administration/v_mesClients.php');
    break;
    
    case 'changerCode':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        updateCodePromo($_POST['idbon'],$_POST['valAction']);
        echo "Votre code promo à changé de valeur!";  
    break;

    case 'supprimerCode':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        deleteCodePromo($_POST['idbon']);
        echo "Votre code promo est supprimé!";  
    break;

  	/*** retourne tout les clients json */
	case 'allclientApi': 
		redirectionNonAdmin(adminexist());
		echo appelAjax(allClientTotal());
	break;
}


?>