<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');

//////////////// AJOUT d'un client /////////////////////////
function addproduit($nom,$marque,$prix,$etat,$taille,$categorie,$image1,$image2,$description){
    $conn = bdd();
 
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'nom','name'=>'nom','value'=>$nom));
    array_push($conditions, array('nameChamps'=>'marque','name'=>'marque','value'=>$marque));
    array_push($conditions, array('nameChamps'=>'prix','name'=>'prix','value'=>$prix));
    array_push($conditions, array('nameChamps'=>'etat','name'=>'etat','value'=>$etat));
    array_push($conditions, array('nameChamps'=>'taille','name'=>'taille','value'=>$taille));
    array_push($conditions, array('nameChamps'=>'categorie','name'=>'categorie','value'=>$categorie));
    array_push($conditions, array('nameChamps'=>'image1','name'=>'image1','value'=>$image1));
    array_push($conditions, array('nameChamps'=>'image2','name'=>'image2','value'=>$image2));
    array_push($conditions, array('nameChamps'=>'description','name'=>'description','value'=>$description));
    $req =  new myQueryClass('produit',$conditions);
	$r = $req->myQueryInsert();
    $conn = null ; //Quitte la connexion

}


//function retrouve le dernier produit 
function voirDernierProduit(){
$order = array();
array_push($order, array('nameChamps'=>'id','sens'=>'desc'));
$req =  new myQueryClass('produit','',$order);
$r = $req->myQuerySelect();
return $r[0] ;
}
?>