<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allSousCategorie(){
	$order = array();
	array_push($order, array('nameChamps'=>'nomSousCategorie','sens'=>'asc'));
	$req =  new myQueryClass('sousCategorie','',$order);
	$r = $req->myQuerySelect();
	return $r;
}


/// CATEGORIE 0 : ENFANT 
/// CATEGORIE 1 : LES DEUX
// CATEGORIE 2 : ADULTES
function sousCategorieEnfant(){
	$conditions = array();
	$order = array();
	array_push($order, array('nameChamps'=>'nomSousCategorie','sens'=>'asc'));
	array_push($conditions, array('nameChamps'=>'typeBoutique','type'=>'<=','name'=>'typeBoutique','value'=>1));
	$req =  new myQueryClass('sousCategorie',$conditions,$order);
	$r = $req->myQuerySelect();
	return $r;
}

function sousCategorieAdulte(){
	$conditions = array();
	$order = array();
	array_push($order, array('nameChamps'=>'nomSousCategorie','sens'=>'asc'));
	array_push($conditions, array('nameChamps'=>'typeBoutique','type'=>'>=','name'=>'typeBoutique','value'=>1));
	$req =  new myQueryClass('sousCategorie',$conditions,$order);
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


function voirPoids($genre,$sousCategorie){
	if($genre >=2){
		$conditions = array();
		array_push($conditions, array('nameChamps'=>'idSousCategorie','type'=>'=','name'=>'idSousCategorie','value'=>$sousCategorie));
		$req =  new myQueryClass('sousCategorie',$conditions);
		$r = $req->myQuerySelect();
		return $r[0]['poidsEnfant'];
	}else{
		$conditions = array();
		array_push($conditions, array('nameChamps'=>'idSousCategorie','type'=>'=','name'=>'idSousCategorie','value'=>$sousCategorie));
		$req =  new myQueryClass('sousCategorie',$conditions);
		$r = $req->myQuerySelect();
		return $r[0]['poidsAdulte'];
	}

}