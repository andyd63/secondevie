<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allTaille(){
	$order = array();
	array_push($order, array('nameChamps'=>'idTaille','sens'=>'asc'));
	$req =  new myQueryClass('taille','',$order);
	$r = $req->myQuerySelect();
	return $r;
}

function tailleEnfant(){
	$conditions = array();
	$order = array();
	array_push($conditions, array('nameChamps'=>'typeBoutique','type'=>'=','name'=>'typeBoutique','value'=>0));
	array_push($order, array('nameChamps'=>'idTaille','sens'=>'asc'));
	$req =  new myQueryClass('taille',$conditions,$order);
	$r = $req->myQuerySelect();
	return $r;
}


function tailleAdulte(){
	$conditions = array();
	$order = array();
	array_push($conditions, array('nameChamps'=>'typeBoutique','type'=>'=','name'=>'typeBoutique','value'=>1));
	array_push($order, array('nameChamps'=>'idTaille','sens'=>'asc'));
	$req =  new myQueryClass('taille',$conditions,$order);
	$r = $req->myQuerySelect();
	return $r;
}


function taille($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idTaille','type'=>'=','name'=>'idTaille','value'=>$id));
	$req =  new myQueryClass('taille',$conditions);
	$r = $req->myQuerySelect();
	return $r[0];
}