<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');


//////////////// AJOUT d'un codePromo /////////////////////////
function ajouterCodePromo($nom,$reduction,$multi,$typePromo){
    $conn = bdd();
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'nomCodePromo','name'=>'nomCodePromo','value'=>$nom));
    array_push($conditions, array('nameChamps'=>'reducPromo','name'=>'reducPromo','value'=>$reduction));
    array_push($conditions, array('nameChamps'=>'multi','name'=>'multi','value'=>$multi));
    array_push($conditions, array('nameChamps'=>'typeCodePromo','name'=>'typeCodePromo','value'=>$typePromo));
    array_push($conditions, array('nameChamps'=>'actif','name'=>'actif','value'=>1));
    array_push($conditions, array('nameChamps'=>'nbreUtilisation','name'=>'nbreUtilisation','value'=>0));
    $req =  new myQueryClass('codepromo',$conditions);
	$r = $req->myQueryInsert();
    $conn = null ; //Quitte la connexion
}



function allCodePromo(){
	$req =  new myQueryClass('codepromo');
	$r = $req->myQuerySelect();
	return $r;
}

/**
 * @return CodePromo selon le nom
 */
function codePromobyPromo($nom) // Sert à renvoyer tout les codes promos
{
    $conn = bdd();
    $requser = $conn->prepare('SELECT * FROM codepromo where nomCodePromo = ? and actif=1');
    $requser->execute(array($nom));
    return $requser->fetch();
}
function codePromobyId($id) // Sert à renvoyer tout les codes promos
{
    $conn = bdd();
    $requser = $conn->prepare('SELECT * FROM codepromo where idCodePromo = ?');
    $requser->execute(array($id));
    return $requser->fetch();
}

/**
 * Changer le statut du code promo : actif ou desactif
 */
function updateCodePromo($id,$act){
	$conn = bdd();
	$modifcli = $conn->prepare('UPDATE codepromo SET actif=?  WHERE idCodePromo = ?');
	$modifcli->execute(array($act,$id));
	$conn = null ; //Quitte la connexion
}

function deleteCodePromo($id){
    $conn = bdd();
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'idCodePromo','type'=>'=','name'=>'a','value'=>$id));
    $req =  new myQueryClass('codepromo',$conditions);
	$r = $req->myQueryDelete();
	$conn = null ; //Quitte la connexion
}
?>