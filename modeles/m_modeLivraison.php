<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allModeLivraison(){
	$req =  new myQueryClass('modeLivraison');
	$r = $req->myQuerySelect();
	return $r;
}

function modeLivraison($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idModeLivraison','type'=>'=','name'=>'idModeLivraison','value'=>$id));
	$req =  new myQueryClass('modeLivraison',$conditions);
	$r = $req->myQuerySelect();
	return $r[0];
}