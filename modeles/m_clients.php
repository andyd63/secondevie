<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');
require_once ('./assets/inc/function.php');

/**
 * Retourne tout les clients
 */
function allClient($ask){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'MAIL_CLIENTS','type'=>'like','name'=>'a','value'=>$ask.'%'));
	$req =  new myQueryClass('client', $conditions);
	$r = $req->myQuerySelect("MAIL_CLIENTS",true);
	return reponse_jsonAlone($r);
}

// change le token de reinit du mot de passe
function updateTokenClient($email)
{
	$token =genererChaineAleatoire(18);
	$conditions = array();
	$values = array();
	array_push($conditions, array('nameChamps'=>'MAIL_CLIENTS','type'=>'=','name'=>'MAIL_CLIENTS','value'=>$email));
	array_push($values, array('nameChamps'=>'tokenMdp','name'=>'tokenMdp','value'=>$token));
	$req =  new myQueryClass('client',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
	return $token;
}

// change le token de reinit du mot de passe
function updateMdpClient($token,$mdp){
	$conditions = array();
	$values = array();
	$mdp = md5($mdp);
	array_push($conditions, array('nameChamps'=>'tokenMdp','type'=>'=','name'=>'tokenMdp','value'=>$token));
	array_push($values, array('nameChamps'=>'mdp_clients','name'=>'mdp_clients','value'=>$mdp));
	$req =  new myQueryClass('client',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
	return $token;
}


/**
 * Retourne tout les clients
 */
function allClientTotal(){
	$req =  new myQueryClass('client');
	$r = $req->myQuerySelect("CONCAT(PRE_CLIENTS, ' ', NOM_CLIENTS) AS nom,MAIL_CLIENTS,TEL_CLIENTS,CONCAT(ADRESSE, ', ', CODEPOSTAL, ' ', VILLE) AS ville, CAST(FROM_UNIXTIME(client.date) as date) as dateInscription,  CAST(FROM_UNIXTIME(date_connecte) as date) as dateConnecte");
	return $r;
}


function clientByEmail($email){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'MAIL_CLIENTS','type'=>'=','name'=>'t','value'=>$email));
	$req =  new myQueryClass('client', $conditions);
	$r = $req->myQuerySelect("ID_CLIENTS",true);
	return $r[0];
}


//////////////// AJOUT d'un client /////////////////////////
function ajouterclient($nom,$prenom,$email,$tel,$adresse,$cp,$ville,$password,$date){
	$conn = bdd();
	$newclient = $conn->prepare('INSERT INTO client (pre_clients, nom_clients, mail_clients,
	 tel_clients, VILLE, ADRESSE,CODEPOSTAL, mdp_clients,date,date_connecte) 
								VALUES (?,?,?,?,?,?,?,?,?,?)');
	$newclient->execute(array($nom,$prenom,$email,$tel,$ville,$adresse,$cp,$password,$date,$date));
	$conn = null ; //Quitte la connexion
	
}

function modifclient($adresse,$cp,$ville,$tel){
	$conn = bdd();
	$id = $_SESSION['id'];
	$modifcli = $conn->prepare('UPDATE client SET adresse=? , CODEPOSTAL = ?, VILLE = ?,tel_clients=?  WHERE id_clients = ?;'); 
	$modifcli->execute(array($adresse,$cp,$ville,$tel,$id));
	$conn = null ; //Quitte la connexion
	$_SESSION['tel'] = $tel;
	$_SESSION['adresse'] = $adresse;
	$_SESSION['cp'] = $cp;
	$_SESSION['ville'] = $ville;	
	$conn = null ; //Quitte la connexion
}

function modifmdp($mdp){
	$conn = bdd();
	$id = $_SESSION['id'];
	$password = md5($mdp);
	$modifcli = $conn->prepare('UPDATE client SET mdp_clients = ? , MDP_claire = ?  WHERE id_clients = ?;'); 
	$modifcli->execute(array($password,$mdp,$id));
	$message = "Le mot de passe de votre compte sont à jour!";
		return $message ;	
	$conn = null ; //Quitte la connexion
}


function userexist($mail,$mdp) // Sert à savoir si le client existe
{
	$conn = bdd();
	$requser = $conn->prepare('SELECT * FROM client WHERE mail_clients= ? AND mdp_clients = ?');
	  $requser->execute(array($mail, $mdp));
        $userexit = $requser->rowCount();
		return $userexit ;
}

function adminexist($mail = null) // Sert à savoir si le client existe
{
	if(isset($_SESSION['mail'])){
	$conn = bdd();
	$requser = $conn->prepare('SELECT * FROM client WHERE mail_clients= ? AND RANG = 1');
	  $requser->execute(array($_SESSION['mail']));
		$userexit = $requser->rowCount();
	}
	else{
		$userexit = false;
	}
	return $userexit ;
}


function derclient() // Sert à savoir si le client existe
{
	$conn = bdd();
	$requser = $conn->prepare('SELECT * FROM client order by ID_CLIENTS desc limit 1');
	  $requser->execute();
       $lesclients = $requser->fetch();
		return $lesclients['ID_CLIENTS'] ;   
}


function getclient($mail,$mdp) // Sert à renvoyer les données du client
{
	$conn = bdd();
	$requser = $conn->prepare('SELECT * FROM client WHERE mail_clients= ? AND mdp_clients = ?');
	  $requser->execute(array($mail, $mdp));
      return $requser->fetch();	    
}

function userMailExist($mail) // Sert à savoir si le client existe
{
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'MAIL_CLIENTS','type'=>'=','name'=>'MAIL_CLIENTS','value'=>$mail));
	$req =  new myQueryClass('client',$conditions);
	$r = $req->myQuerySelect();
	if(count($r) == 0){
		$success = false;
	}else{
		$success = 'true';
	}
	return reponse_json($success,"");
}



function informationsRest($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'ID_CLIENTS','type'=>'=','name'=>'idCli','value'=>$id));
	$req =  new myQueryClass('client',$conditions);
	$r = $req->myQuerySelect();
		$data['clients'] = $r;
		$success = 'true';
		return reponse_json($success, $data);
}


function informations($id){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'ID_CLIENTS','type'=>'=','name'=>'idCli','value'=>$id));
	$req =  new myQueryClass('client',$conditions);
	$r = $req->myQuerySelect();
		$success = true;
		$data['clients'] = $r;
		return $data['clients'];
}

function getClientToken($token){
	$conditions = array();
	array_push($conditions, array('nameChamps'=>'tokenMdp','type'=>'=','name'=>'tokenMdp','value'=>$token));
	$req =  new myQueryClass('client',$conditions);
	$r = $req->myQuerySelect();
		$success = true;
		$data['clients'] = $r;
		return $data['clients'];
}

function getmdp($mail) // Sert à renvoyer les données du client
{
	$conn = bdd();
	$requser = $conn->prepare('SELECT * FROM client WHERE mail_clients= ?');
	  $requser->execute(array($mail));
          $lesclients = $requser->fetch();
	  return  $lesclients['MDP_claire'];
}


function maj_co($id){
	$jour =  date("d"); 
		$mois =  date("m");  
		$annee =  date("Y");  
		$date = mktime(0, 0, 0, $mois,  $jour, $annee);
		$conn = bdd();
		$modifcli = $conn->prepare('UPDATE client SET date_connecte = ? where ID_CLIENTS = ?'); 
		$modifcli->execute(array($date,$id));
		$conn = null ; //Quitte la connexion
}

function deconnexionclient()
{
	session_start();
	unset($_SESSION['id']);
	unset($_SESSION['nom']);
	unset($_SESSION['prenom']);
	unset($_SESSION['mail']);
	unset($_SESSION['rang']);
	unset($_SESSION['tel']);
	unset($_SESSION['adresse']);
	unset($_SESSION['cp']);
	unset($_SESSION['ville']);
	header("Location:index.php");
}

?>