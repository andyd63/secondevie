<?php

require_once "./modeles/m_infosclient.php";
require_once "./modeles/m_clients.php";

if(isset($_GET['action']))
	$action = $_GET['action'];
else
{
	$action = "voircommandes";
}
switch ($action)
{
	case 'voircommandes' :
	$cli=informations($_GET['id']);
	$infos = infosCommandes($_GET['id']);
	require_once('vues/vue_voircommandes.php');
	break;

	case 'modifier' : 
	$cli=informations($_GET['id']);
	$infos = infosCommandes($_GET['id']);
	require_once('vues/vue_modifcli.php');
break;
	case 'modifierAdresse' : 
	$infomodif = modifclient($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['cp'],$_POST['ville'],$_POST['tel']);
break;

}  