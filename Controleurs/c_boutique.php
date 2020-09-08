<?php

//require_once "./modeles/m_produits.php";

if(isset($_GET['action']))
{
	$action = $_GET['action'];
	include('./vues/v_boutique.php');

	
}else {
	include('./vues/v_boutique.php');
}


?>