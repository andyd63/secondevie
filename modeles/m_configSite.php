<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');   
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


function changeLogo($location)
{
	$conditions = array();
	$values = array();
	array_push($conditions, array('nameChamps'=>'nomConfig','type'=>'=','name'=>'nom','value'=>'logoSite'));
	array_push($values, array('nameChamps'=>'valeurConfig','name'=>'nomSite','value'=>$location));
	$req =  new myQueryClass('configurationSite',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
}


/** 
 * récuperer valeur d'une configs
 */
function createConfigSite($param) {
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'nomConfig','type'=>'=','name'=>$param,'value'=>$param));
	$req =  new myQueryClass('configurationSite',$conditions,'',$param);
    $r = $req->myQuerySelect();
    return  $r[0]['valeurConfig'];
}
/** 
 * récuperer name d'une configs
 */
function createNameSite($param) {
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'nomConfig','type'=>'=','name'=>$param,'value'=>$param));
	$req =  new myQueryClass('configurationSite',$conditions,'',$param);
    $r = $req->myQuerySelect();
    return  $r[0]['nomConfig'];
}

/**
 *  Activer ou désactiver un module
 */
function actifOrDesactif($param) {
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'nomConfig','type'=>'=','name'=>$param,'value'=>$param));
	$req =  new myQueryClass('configurationSite',$conditions,'',$param);
    $r = $req->myQuerySelect();
    return  $r[0]['actif'];
}


/**
 *  Changer l'encart promo
 */
function updateEncartPromo($encartPromo,$encartActif){
	$conditions = array();
	$values = array();
	array_push($conditions, array('nameChamps'=>'nomConfig','type'=>'=','name'=>'nom','value'=>'encartPromo'));
	array_push($values, array('nameChamps'=>'valeurConfig','name'=>'encartPromo','value'=>$encartPromo));
	array_push($values, array('nameChamps'=>'actif','name'=>'nomSite','value'=>$encartActif));
	$req =  new myQueryClass('configurationSite',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
}


/**
 *  Changer les infos généraux
 */
function updateValeurGeneral($nameSite,$telSite,$emailSite){
	$conditions = array();
	$values = array();
	array_push($conditions, array('nameChamps'=>'nomConfig','type'=>'=','name'=>'nom','value'=>'nomSite'));
	array_push($values, array('nameChamps'=>'valeurConfig','name'=>'nomSite','value'=>$nameSite));
	$req =  new myQueryClass('configurationSite',$conditions,'',$values);
	$r = $req->myQueryUpdate();

	array_push($conditions, array('nameChamps'=>'nomConfig','type'=>'=','name'=>'nom','value'=>'emailSite'));
	array_push($values, array('nameChamps'=>'valeurConfig','name'=>'emailSite','value'=>$emailSite));
	$req =  new myQueryClass('configurationSite',$conditions,'',$values);
	$r = $req->myQueryUpdate();

	array_push($conditions, array('nameChamps'=>'nomConfig','type'=>'=','name'=>'nom','value'=>'telSite'));
	array_push($values, array('nameChamps'=>'valeurConfig','name'=>'telSite','value'=>$telSite));
	$req =  new myQueryClass('configurationSite',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
}




