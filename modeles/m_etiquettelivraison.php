<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');



function voirEtiquetteNonTraite(){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'statutEtiquette','type'=>'=','name'=>'statutEtiquette','value'=>0));
	$req =  new myQueryClass('etiquetteLivraison',$conditions);
	$r = $req->myQuerySelect();
	return $r;
}

//////////////// AJOUT d'un favoris /////////////////////////
function addEtiquetteLivraison($nom,$numRue,$adresse,$complementAdresse
,$codePostal,$ville,$email,$tel,$nomOption,$idCommande,$pays = 'FR',$statut= 0){
    $conn = bdd();
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'nom','name'=>'nom','value'=>$nom));
    array_push($conditions, array('nameChamps'=>'numRue','name'=>'numRue','value'=>$numRue));
    array_push($conditions, array('nameChamps'=>'complementAdresse','name'=>'complementAdresse','value'=>$complementAdresse));
    array_push($conditions, array('nameChamps'=>'adresse','name'=>'adresse','value'=>$adresse));
    array_push($conditions, array('nameChamps'=>'codePostal','name'=>'cp','value'=>$codePostal));
    array_push($conditions, array('nameChamps'=>'ville','name'=>'ville','value'=>$ville));
    array_push($conditions, array('nameChamps'=>'email','name'=>'email','value'=>$email));
    array_push($conditions, array('nameChamps'=>'tel','name'=>'tel','value'=>$tel));
    array_push($conditions, array('nameChamps'=>'nomOption','name'=>'nomOption','value'=>$nomOption));
    array_push($conditions, array('nameChamps'=>'idCommande','name'=>'idCommande','value'=>$idCommande));
    array_push($conditions, array('nameChamps'=>'pays','name'=>'pays','value'=>$pays));
    array_push($conditions, array('nameChamps'=>'statutEtiquette','name'=>'statutEtiquette','value'=>$statut));
    $req =  new myQueryClass('etiquetteLivraison',$conditions);
	$r = $req->myQueryInsert();
    $conn = null ; //Quitte la connexion
    return $r= '';

}





