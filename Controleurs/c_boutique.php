<?php

require_once "./modeles/m_produits.php";

if(isset($_GET['cat']))
{
	$action = $_GET['cat'];
	$prod = produit($action);
	$cate = categorie($action);
	include('./vues/vue_boutique.php');

	
}

if(isset($_GET['action']))
{
	$prod = rech_produit();
	$nbre_rech = nb_rech_p();
	include('./vues/vue_boutique.php');

	
}

if((empty($_GET['action'])) and (empty($_GET['cat'])))
{
	$action = 'def';
	
include('./vues/vue_boutique.php');
}



?>