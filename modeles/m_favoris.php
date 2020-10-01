<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');

function voirFavoris($id)
{
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'idClient','type'=>'=','name'=>'idClient','value'=>$id));
	$req =  new myQueryClass('favoris',$conditions);
	$r = $req->myQuerySelect();
	return $r;
}

//voir si le produit est dans favoris
// retourne le nombre de ligne
function voirSiFavoris($idClient,$idProduit)
{
	$conditions = array();
    array_push($conditions, array('nameChamps'=>'idClient','type'=>'=','name'=>'idClient','value'=>$idClient));
    array_push($conditions, array('nameChamps'=>'idProduit','type'=>'=','name'=>'idProduit','value'=>$idProduit));
	$req =  new myQueryClass('favoris',$conditions);
    $r = $req->myQuerySelect();
	return count($r);
}

//////////////// AJOUT d'un favoris /////////////////////////
function addFavoris($idClient,$idProduit){
    $conn = bdd();
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'idClient','name'=>'idClient','value'=>$idClient));
    array_push($conditions, array('nameChamps'=>'idProduit','name'=>'idProduit','value'=>$idProduit));
    $req =  new myQueryClass('favoris',$conditions);
	$r = $req->myQueryInsert();
    $conn = null ; //Quitte la connexion
    return $r= '';

}

function supprFavoris($idClient,$idProduit){
    $conn = bdd();
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'idClient','name'=>'idClient','type'=>'=','value'=>$idClient));
    array_push($conditions, array('nameChamps'=>'idProduit','name'=>'idProduit','type'=>'=','value'=>$idProduit));
    $req =  new myQueryClass('favoris',$conditions);
	$r = $req->myQueryDelete();
	$conn = null ; //Quitte la connexion
}







