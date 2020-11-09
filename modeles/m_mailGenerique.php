<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');

function voirMailGenerique($id)
{
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idMailGenerique','type'=>'=','name'=>'idMailGenerique','value'=>$id));
	$req =  new myQueryClass('mailGenerique',$conditions);
	$r = $req->myQuerySelect();
	return $r[0] ;
}

/**
 * Permet de retourner tout les modules
 * @param $id
 * @return mixed
 */
function voirAllMailGenerique()
{
	$conn = bdd();
	$eve = $conn->prepare("SELECT * FROM module ");
	$eve->execute();
    $lesModules = $eve->fetchAll();
	return $lesModules;

}







