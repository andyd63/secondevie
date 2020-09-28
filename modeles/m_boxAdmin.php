<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function voirBoxAdmin($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idBox','type'=>'=','name'=>'idBox','value'=>$id));
	$req =  new myQueryClass('boxadmin',$conditions);
	$r = $req->myQuerySelect();
	return $r[0];
}