<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allCategorie(){
	$req =  new myQueryClass('categorie');
	$r = $req->myQuerySelect();
	return $r;
}

function categorie($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idCategorie','type'=>'=','name'=>'idCategorie','value'=>$id));
	$req =  new myQueryClass('categorie',$conditions);
	$r = $req->myQuerySelect();
	return $r[0];
}