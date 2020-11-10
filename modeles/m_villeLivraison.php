<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function allVilleLivraison(){
	$order = array();
	array_push($order, array('nameChamps'=>'nomVille','sens'=>'asc'));
	$req =  new myQueryClass('villeLivraison','',$order);
	$r = $req->myQuerySelect();
	return $r;
}

function villeLivraison($cp){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'cpLivraison','type'=>'=','name'=>'cpLivraison','value'=>$cp));
	$req =  new myQueryClass('villeLivraison',$conditions);
	$r = $req->myQuerySelect();
	$nbVille = count($r);
	if($nbVille == 0){
		return false;
	}else{
	return $r[0];
	}
}