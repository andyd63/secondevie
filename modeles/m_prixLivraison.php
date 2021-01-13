<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');




function voirPrixSelonPoids($poids,$value){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'libPrixLivraison','type'=>'like','name'=>'libPrixLivraison','value'=>"%".$value."%"));
	array_push($conditions, array('nameChamps'=>'poidsPrixLivraison','type'=>'<','name'=>'poidsmin','value'=>$poids, 'int'=>'1'));
	array_push($conditions, array('nameChamps'=>'poidsMaxLivraison','type'=>'>=','name'=>'poidsMax','value'=>$poids, 'int'=>'1'));
	$req =  new myQueryClass('prixlivraison',$conditions);
	$r = $req->myQuerySelect();
	return $r[0];
}