<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function menuAdminByNom($name){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'nomMenu','type'=>'=','name'=>'nomMenu','value'=>$name));
	$req =  new myQueryClass('menuadmin',$conditions);
	$r = $req->myQuerySelect();
	return $r;
}