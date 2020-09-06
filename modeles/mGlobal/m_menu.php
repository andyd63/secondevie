<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');   
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


/** 
 * récuperer tous les menus verticaux d'un groupe
 */
function allSiteMenuV($id) {
    $order = array();
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'groupeMenu','type'=>'=','name'=>'groupeMenu','value'=>$id));
	array_push($order, array('nameChamps'=>'ordre','sens'=>'asc'));
    $req =  new myQueryClass('headermenuv',$conditions,$order);
    $r = $req->myQuerySelect();
    return  $r;
}

/** 
 * récuperer tous les menus verticaux  sans groupe
 */
function allSiteMenuVNoGroupe() {
    $order = array();
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'groupeMenu','type'=>'=','name'=>'groupeMenu','value'=>0));
	array_push($order, array('nameChamps'=>'ordre','sens'=>'asc'));
    $req =  new myQueryClass('headermenuv',$conditions,$order);
    $r = $req->myQuerySelect();
    return  $r;
}
/** 
 * récuperer tout les groupe de menu
 */
function allSiteMenuGroupe() {
    $order = array();
	array_push($order, array('nameChamps'=>'ordre','sens'=>'asc'));
    $req =  new myQueryClass('groupemenu','',$order);
    $r = $req->myQuerySelect();
    return  $r;
}
