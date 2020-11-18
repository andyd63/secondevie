<?php
require_once "./modeles/m_bdd.php";
require_once "./modeles/m_clients.php";
require_once "./modeles/m_menuadmin.php";
require_once "./modeles/m_couleur.php";
require_once "./modeles/m_configSite.php";
require_once "./modeles/m_boxAdmin.php";
require_once "./modeles/m_commande.php";
require_once "./modeles/m_codepromo.php";
require_once "./modeles/m_panier.php";
require_once "./modeles/m_produit.php";
require_once "./modeles/m_module.php";
require_once "./modeles/m_alert.php";
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
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $menuAdmin = menuAdminByNom('ConfigSite');
        include('./vues/administration/v_admin_def.php');
        break;

    //Les textes du sites
    case 'module':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $allModule = voirAllModule();
        include('./vues/administration/v_module.php');
        break;

    //page pour edit text du sites
    case 'moduleDetail':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $lesAlerts = allAlert();
        $module = voirModule($_GET['id']);
        include('./vues/administration/v_moduleDetail.php');
        break;


    //ajax edite text du sites
    case 'UpdateModuleDetail':
        modifModule($_GET['id'],$_POST['text'],$_POST['type'],$_POST['titre']);
        echo reponse_json(true,'','Le module est modifié!');
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        break;

    case 'global':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        include('./vues/configSite/v_global.php');
    break;

    case 'encartPromo':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        include('./vues/configSite/v_encartPromo.php');
    break;

    case 'updatePromo':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        updateEncartPromo($_POST['encartPromo'],$_POST['encartArtif']);
        echo "L'encart promo est modifié!";
    break;


    case 'changerGeneral':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        updateValeurGeneral($_POST['nameSite'],$_POST['telSite'],$_POST['emailSite']);
        echo "Les informations généraux du site sont mises à jour!";
    break;

    case 'changeLogo':
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        /* Getting file name */
        $filename = $_FILES['file']['name'];

        /* Location */
        $location = "assets/img/imgGlobal/logo/".$filename;
        $uploadOk = 1;
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);

        /* Valid extensions */
        $valid_extensions = array("jpg","jpeg","png");

        /* Check file extension */
        if(!in_array(strtolower($imageFileType), $valid_extensions)) {
        $uploadOk = 0;
        }

        if($uploadOk == 0){
        echo 0;
        }else{
            /* Upload file */
            if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                changelogo($location);
                echo $location;
            }else{
                echo 0;
            }
        }
    break;

    default:
        redirectionNonAdmin(adminexist($_SESSION['mail']));
        $nbCommande = count(allCommandes()); // nb de commande 
        $menuAdmin = menuAdminByNom('ConfigSite');
        include('./vues/administration/v_admin_def.php');
    break;

}


?>