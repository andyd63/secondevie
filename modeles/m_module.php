<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');

function voirModule($id)
{
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'id_module','type'=>'=','name'=>'id_module','value'=>$id));
	$req =  new myQueryClass('module',$conditions);
	$r = $req->myQuerySelect();
	return $r[0] ;
}

/**
 * Permet de retourner tout les modules
 * @param $id
 * @return mixed
 */
function voirAllModule()
{
	$conn = bdd();
	$eve = $conn->prepare("SELECT * FROM module ");
	$eve->execute();
    $lesModules = $eve->fetchAll();
	return $lesModules;

}

function modif_module($text,$id)
{
	$conn = bdd();
	$eve = $conn->prepare("UPDATE module SET texte_module = ? WHERE id_module = ? ");
	$eve->execute(array($text,$id));
}





