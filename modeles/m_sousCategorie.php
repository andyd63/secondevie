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


/// CATEGORIE 0 : ENFANT 
/// CATEGORIE 1 : LES DEUX
// CATEGORIE 2 : ADULTES
function sousCategorieEnfant(){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'typeBoutique','type'=>'<=','name'=>'typeBoutique','value'=>1));
	$req =  new myQueryClass('sousCategorie',$conditions);
	$r = $req->myQuerySelect();
	return $r;
}

function sousCategorieAdulte(){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'typeBoutique','type'=>'>=','name'=>'typeBoutique','value'=>1));
	$req =  new myQueryClass('sousCategorie',$conditions);
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