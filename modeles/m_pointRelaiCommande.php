<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


//////////////// AJOUT d'un favoris /////////////////////////
function addPointRelaiCommande($transporteur,$idCommande,$nom,$rue,$codePostal,$ville){
    $conn = bdd();
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'transporteur','name'=>'transporteur','value'=>$transporteur));
    array_push($conditions, array('nameChamps'=>'idCommande','name'=>'idCommande','value'=>$idCommande));
    array_push($conditions, array('nameChamps'=>'nom','name'=>'nom','value'=>$nom));
    array_push($conditions, array('nameChamps'=>'rue','name'=>'rue','value'=>$rue));
    array_push($conditions, array('nameChamps'=>'codePostal','name'=>'codePostal','value'=>$codePostal));
    array_push($conditions, array('nameChamps'=>'ville','name'=>'ville','value'=>$ville));
    $req =  new myQueryClass('pointRelaiCommande',$conditions);
	$r = $req->myQueryInsert();
    $conn = null ; //Quitte la connexion
    return $r= '';

}





