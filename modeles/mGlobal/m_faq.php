<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');

function voirFaq($id)
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
function voirAllFaq()
{
	$req =  new myQueryClass('faq');
	$r = $req->myQuerySelect();
	return $r;
}

function modifFaq($id,$partie,$text,$titre)
{
	$conditions = array();
	$values = array();
	array_push($conditions, array('nameChamps'=>'idFaq','type'=>'=','name'=>'id_module','value'=>$id));
	array_push($values, array('nameChamps'=>'textFaq','name'=>'textFaq','value'=>$text));
	array_push($values, array('nameChamps'=>'partieFaq','name'=>'partieFaq','value'=>$partie));
	array_push($values, array('nameChamps'=>'titreFaq','name'=>'titretitreFaq_module','value'=>$titre));
	$req =  new myQueryClass('faq',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
}





