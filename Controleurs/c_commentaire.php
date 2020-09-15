<?php 

require_once "./modeles/m_commentaire.php";
require_once "./modeles/m_produits.php";

if(isset($_GET['action']))
	$action = $_GET['action'];
else
{
	$action = "affichercommentaire";
}
switch ($action)
{
	

		case 'affichercommentaire' :  
		$uncom = toutcom($_GET['ref']);
		$unprod = getleproduit($_GET['ref']);
		$moy =  prod_note($_GET['ref']);
	
		include('vues/vue_commentaire.php');

		break;




		case 'ajoutcommentaire' :
		$uncomm = ajoutercom($_POST['idcli'],$_POST['idprod'],$_POST['date'],$_POST['commentaire'],$_POST['note']);

		include('vues/vue_commentaire.php');
		break;

		case 'reussi' : 
		include('vues/v_commentaire_r.php');
		break;
}	
?>