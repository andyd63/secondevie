<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allStatutCommande(){
	$req =  new myQueryClass('statutcommande');
	$r = $req->myQuerySelect();
	return $r;
}

function statutCommande($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idStatutCommande','type'=>'=','name'=>'idStatutCommande','value'=>$id));
	$req =  new myQueryClass('statutcommande',$conditions);
	$r = $req->myQuerySelect();
	return $r[0];
}