<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function voirCouleur($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idCouleur','type'=>'=','name'=>'idCouleur','value'=>$id));
	$req =  new myQueryClass('couleur',$conditions);
	$r = $req->myQuerySelect();
	return $r[0];
}