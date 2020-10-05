<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function menuAdminByNom($name){
	$conditions = array();
	$ordre = array();
	array_push($conditions, array('nameChamps'=>'nomMenu','type'=>'=','name'=>'nomMenu','value'=>$name));
	array_push($ordre, array('nameChamps'=>'ordre','sens'=>'asc'));
	$req =  new myQueryClass('menuadmin',$conditions,$ordre);
	$r = $req->myQuerySelect();
	return $r;
}