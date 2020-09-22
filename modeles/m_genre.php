<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allGenre(){
	$req =  new myQueryClass('genre');
	$r = $req->myQuerySelect();
	return $r;
}


function genreAdulte(){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'typeBoutique','type'=>'=','name'=>'typeBoutique','value'=>0));
	$req =  new myQueryClass('genre',$conditions);
	$r = $req->myQuerySelect();
	return $r;
}

function genreEnfant(){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'typeBoutique','type'=>'=','name'=>'typeBoutique','value'=>1));
	$req =  new myQueryClass('genre',$conditions);
	$r = $req->myQuerySelect();
	return $r;
}
