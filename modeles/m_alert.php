<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');

function voirAlert($id)
{
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idAlert','type'=>'=','name'=>'idAlert','value'=>$id));
	$req =  new myQueryClass('alert',$conditions);
	$r = $req->myQuerySelect();
	return $r[0] ;
}
function allAlert(){
	$req =  new myQueryClass('alert');
	$r = $req->myQuerySelect();
	return $r;
}





