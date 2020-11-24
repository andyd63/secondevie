<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');

function voirFaq($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idFaq','type'=>'=','name'=>'idFaq','value'=>$id));
	$req =  new myQueryClass('faq',$conditions);
	$r = $req->myQuerySelect();
	return $r[0] ;
}

function addFaq($text,$titre,$partie){
$conditions = array();
array_push($conditions, array('nameChamps'=>'textFaq','name'=>'textFaq','value'=>$text));
array_push($conditions, array('nameChamps'=>'titreFaq','name'=>'titreFaq','value'=>$titre));
array_push($conditions, array('nameChamps'=>'partieFaq','name'=>'partieFaq','value'=>$partie));
array_push($conditions, array('nameChamps'=>'ordreFaq','name'=>'ordreFaq','value'=>'0')); // a modifié plus tard pour trier dans lordre qu'on veut
$req =  new myQueryClass('faq',$conditions);
$r = $req->myQueryInsert();
}
/**
 * Permet de retourner tout les faq
 * @param $id
 * @return mixed
 */
function voirAllFaq()
{
	$req =  new myQueryClass('faq');
	$r = $req->myQuerySelect();
	return $r;
}

function modifFaq($id,$text,$titre)
{
	$conditions = array();
	$values = array();
	array_push($conditions, array('nameChamps'=>'idFaq','type'=>'=','name'=>'idFaq','value'=>$id));
	array_push($values, array('nameChamps'=>'textFaq','name'=>'textFaq','value'=>$text));
	array_push($values, array('nameChamps'=>'titreFaq','name'=>'titretitreFaq_module','value'=>$titre));
	$req =  new myQueryClass('faq',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
}





