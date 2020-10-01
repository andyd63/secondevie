<?php
require_once "./modeles/m_clients.php";
require_once "./modeles/m_commande.php";
require_once "./assets/inc/function.php";
if(isset($_GET['action']))
	$action = $_GET['action'];
else{
	$action = "profil";
}
switch ($action){
	case 'profil' :
	if((isset($_SESSION['id']) && isset($_GET['ajx'])))
	{
		if(isset($_SESSION['id'])){
				$id = $_SESSION['id'];
		} else {
				$id = isset($_GET['ajx']);
		}
		$cli = informationsRest($id);
		if(!isset($_GET['ajx'])){ //appel normal
				$cli = json_decode($cli);
				$cli = $cli->result;
				require_once('vues/vue_profil.php');
		} else	{ // Appel Ajax
				appelAjax($cli);
		}	
	}else{
		redirectUrl("index.php?c=accueil");
	}
	break;

	case 'mescommandes' : 
	if((isset($_SESSION['id']) && isset($_GET['ajx'])))
	{  
		$commandes= mescommandes($_SESSION['id']);
		if(!isset($_GET['ajx'])){ //appel normal
			$commandes = json_decode($commandes);
			$commandes = $commandes->result;
			require_once('vues/v_mescommandes.php');
		} else	{ // Appel Ajax
			appelAjax($commandes);
		}	
	}else{
		redirectUrl("index.php?c=accueil");
	}
	break;
	
	case 'macommande' :
	if((isset($_SESSION['id']) && isset($_GET['ajx'])))
	{    
		$commandes= mescommandes($_SESSION['id']);
		if(!isset($_GET['ajx'])){ //appel normal
			$commandes = json_decode($commandes);
			$commandes = $commandes->result;
			require_once('vues/v_mescommandes.php');
		} else	{ // Appel Ajax
			appelAjax($commandes);
		}
	}else{
		redirectUrl("index.php?c=accueil");
	}	
	break;
	

	/*** retourne tout les clients json */
	case 'allclient': 
		if(adminexist() == 0){
		redirectionNonAdmin(adminexist());
		} else {
		appelAjax(allClient($_GET['term']));
		}
	break;

	case 'modif' : 
	$message = modifclient($_POST['adresse'],$_POST['cp'],$_POST['ville'],$_POST['telephone']);
	$cli = informationsRest($_SESSION['id']);
	$cli = json_decode($cli);
	require_once('vues/vue_profil.php');
	
	break;

	case 'modif_mdp' : 
	$message = modifmdp($_POST['password']);
	$cli = informationsRest($_SESSION['id']);
	$cli = json_decode($cli);
	require_once('vues/vue_profil.php');
	break;


	//Test si mail existe
	case 'verifMail' : 
	if(isset($_GET['ajx'])){
		$erreur = userMailExist($_GET['email']);
		appelAjax($erreur);
	}
	break;

	default :
	if((isset($_SESSION['id']) && isset($_GET['ajx'])))
	{  
		$cli = informationsRest($_SESSION['id']);
		if(!isset($_GET['ajx'])){ //appel normal
			$cli = json_decode($cli);
			require_once('vues/vue_profil.php');
		} else	{ // Appel Ajax
			appelAjax($cli);
		}
	}else{
		redirectUrl("index.php?c=accueil");
	}
        break;
}

?>