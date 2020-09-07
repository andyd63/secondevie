<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');

//////////////// AJOUT d'un client /////////////////////////
function ajoutercodePromo($nom,$pourcentage,$type){
	$conn = bdd();
	$newclient = $conn->prepare('INSERT INTO codepromo (nomCodePromo,pourcentagePromo,multi,actif) 	VALUES (?,?,?, 1)');
	$newclient->execute(array($nom,$pourcentage,$type));
	$conn = null ; //Quitte la connexion
}

function allCodePromo() // Sert à renvoyer tout les codes promos
{
    $conn = bdd();
    $requser = $conn->prepare('SELECT * FROM codepromo');
    $requser->execute();
    return $requser->fetchAll();
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