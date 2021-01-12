<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');




function voirPrixSelonPoids($poids,$value){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'libPrixLivraison','type'=>'like','name'=>'libPrixLivraison','value'=>"%".$value."%"));
	array_push($conditions, array('nameChamps'=>'poidsPrixLivraison','type'=>'<=','name'=>'poidsPrixLivraison','value'=>$poids));
	array_push($conditions, array('nameChamps'=>'poidsMaxLivraison','type'=>'>','name'=>'poidsMaxLivraison','value'=>$poids));
	$req =  new myQueryClass('prixlivraison',$conditions);
	$r = $req->myQuerySelect();
	return $r[0];
}