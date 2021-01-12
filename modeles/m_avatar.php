<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allAvatar(){
	$req =  new myQueryClass('avatar');
	$r = $req->myQuerySelect();
	return $r;
}



function monAvatar($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idAvatar','type'=>'=','name'=>'idAvatar','value'=>$id));
	$req =  new myQueryClass('avatar',$conditions);
	$r = $req->myQuerySelect();
	return $r[0];
}
