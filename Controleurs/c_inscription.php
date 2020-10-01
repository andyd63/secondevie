<?php
require_once "./modeles/m_bdd.php";
require_once "./modeles/m_clients.php";
require_once "./modeles/m_alert.php";
require_once "./modeles/m_module.php";
$conn = bdd();

if(isset($_GET['action'])) // SI Y A PAS DE PARAMETRE ACTION DANS L URL
	$action = $_GET['action'];
else
	$action = 'sinscrire';

switch($action) {

	case 'sinscrire':
		include('vues/v_inscription.php');
	break;

	case 'valide': // INSCRIPTION REUSSI
		$mdp = md5($_POST['password']);  
		$jour =  date("d"); 
		$mois =  date("m");  
		$annee =  date("Y");  
		$date = mktime(0, 0, 0, $mois,  $jour, $annee);
		ajouterclient($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['telephone'],$_POST['adresse'],$_POST['cp'],$_POST['ville'],$mdp,$_POST['password'],$date); // modele/m_clients   | Permet d'ajouter client dans bdd
		$derniercli = derclient();
		$_SESSION['id'] = $derniercli;
		$_SESSION['nom'] = $_POST['nom'];
		$_SESSION['prenom'] = $_POST['prenom'];
		$_SESSION['mail'] = $_POST['email'];
		$_SESSION['rang'] = null ;
		$_SESSION['tel'] = $_POST['telephone'];
		$_SESSION['adresse'] = $_POST['adresse'];
		$_SESSION['cp'] = $_POST['cp'];
		$_SESSION['ville'] = $_POST['ville'];
	break;
	
	case 'reussi':
		$cli = derclient() ;
		$moduleInscriptionReussi = voir_module(9);	
		include('vues/v_inscription r.php');
	break;

	default:
		include('vues/v_inscription.php');
	break;
	}
?>