<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allTaille(){
	$req =  new myQueryClass('taille');
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