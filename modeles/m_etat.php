<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allEtat(){
	$req =  new myQueryClass('etat');
	$r = $req->myQuerySelect();
	return $r;
}

function etat($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idEtat','type'=>'=','name'=>'idEtat','value'=>$id));
	$req =  new myQueryClass('etat',$conditions);
	$r = $req->myQuerySelect();
	return $r[0];
}