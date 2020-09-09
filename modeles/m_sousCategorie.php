<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allSousCategorie(){
	$req =  new myQueryClass('souscategorie');
	$r = $req->myQuerySelect();
	return $r;
}

function sousCategorie($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idSousCategorie','type'=>'=','name'=>'idSousCategorie','value'=>$id));
	$req =  new myQueryClass('sousCategorie',$conditions);
	$r = $req->myQuerySelect();
	return $r[0];
}