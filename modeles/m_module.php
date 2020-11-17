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

function modifModule($id,$text,$alert,$sujet)
{
	$conditions = array();
	$values = array();
	array_push($conditions, array('nameChamps'=>'id_module','type'=>'=','name'=>'id_module','value'=>$id));
	array_push($values, array('nameChamps'=>'texte_module','name'=>'texte_module','value'=>$text));
	array_push($values, array('nameChamps'=>'alert','name'=>'alert','value'=>$alert));
	array_push($values, array('nameChamps'=>'titre_module','name'=>'titre_module','value'=>$sujet));
	$req =  new myQueryClass('module',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
}





