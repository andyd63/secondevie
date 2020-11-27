<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allAvatarEnfantGarcon(){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idGenre','type'=>'=','name'=>'cpLivraison','value'=>'3'));
	$req =  new myQueryClass('avatar',$conditions);
	$r = $req->myQuerySelect();
	return $r;
}

function allAvatarEnfantFille(){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idGenre','type'=>'=','name'=>'cpLivraison','value'=>'4'));
	$req =  new myQueryClass('avatar',$conditions);
	$r = $req->myQuerySelect();
	return $r;
}
