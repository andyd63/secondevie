<?php
require_once('./modeles/m_bdd.php');  

function compteall(){   ////////////// AFFICHE TOUT LES COMPTES
	$conn = bdd();
	$allcolonne = mescolonnes(); //toutes les colonnes de l'utilisateur
	$info = null ; // initialise info
	foreach($allcolonne as $colonne)
	{
	$info = $colonne['nom_colonne'].','.$info; // ajoute la colonne à info
	}
	$nbrecara = strlen($info);
	$info = substr($info,$nbrecara); // enleve la première virgule pour éviter les erreurs

	if($info == null) { $info = "*" ;} // si info vide on choisit tout pour eviter les erreurs
	$infoscommandes = $conn->prepare("SELECT $info FROM compte  inner join password  on  password.useroidval = compte.useroidval  inner join password_temp  on  password_temp.useroidval = compte.useroidval ");
	$infoscommandes->execute();
	$lesinfoscomm = $infoscommandes->fetchAll();

	return $lesinfoscomm;

}
function nbre_compteall()  // NOMBRE DE COMPTES
{
$conn = bdd();
$nbrecompteall = $conn->prepare("SELECT count(*) as nbre FROM compte  inner join password  on  password.useroidval = compte.useroidval  inner join password_temp  on  password_temp.useroidval = compte.useroidval ");
$nbrecompteall->execute();
$nbrecompte = $nbrecompteall->fetch();

$nombreDePages = nbre_compte_par_page($nbrecompte['nbre']);
return $nombreDePages;
}

function nbre_comptedispo() // NOMBRE DE COMPTES
{
$conn = bdd();
$nbrecompteall = $conn->prepare("SELECT count(*) as nbre FROM compte  inner join password  on  password.useroidval = compte.useroidval  inner join password_temp  on  password_temp.useroidval = compte.useroidval  where RESERVE IS NULL ");
$nbrecompteall->execute();
$nbrecompte = $nbrecompteall->fetch();

$nombreDePages = nbre_compte_par_page($nbrecompte['nbre']);
return $nombreDePages;
}

function nbremescomptes() // NOMBRE DE COMPTES
{
$conn = bdd();
$prefixe = prefixe_client();
$nbrecompteall = $conn->prepare("SELECT count(*) as nbre FROM compte  inner join password  on  password.useroidval = compte.useroidval  inner join password_temp  on  password_temp.useroidval = compte.useroidval  where RESERVE = '$prefixe' ");
$nbrecompteall->execute();
$nbrecompte = $nbrecompteall->fetch();

$nombreDePages = nbre_compte_par_page($nbrecompte['nbre']);
return $nombreDePages;
}


function nbre_compte_par_page($nbre)
{
if(!isset($_GET['nbre']))
{
$messagesParPage=50; //Nous allons afficher 5 messages par page.
}
else
{
$messagesParPage= $nbre ;
}
//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($nbre/$messagesParPage);

return $nombreDePages;
}

function messageparpage($pageActuelle,$nbremess)
{
$allcolonne = mescolonnes(); //toutes les colonnes de l'utilisateur
	$info = null ; // initialise info
	foreach($allcolonne as $colonne)
	{
	$info = $colonne['nom_colonne'].','.$info; // ajoute la colonne à info
	}
	$nbrecara = strlen($info);
	$info = substr($info,$nbrecara); // enleve la première virgule pour éviter les erreurs

	if($info == null) { $info = "*" ;} // si info vide on choisit tout pour eviter les erreurs
	
if(isset($_GET['nbre']))
{
$conn = bdd();

// La requête sql pour récupérer les messages de la page actuelle.
$infoscommandes = $conn->prepare("SELECT $info FROM compte  inner join password  on  password.useroidval = compte.useroidval  inner join password_temp  on  password_temp.useroidval = compte.useroidval ");
$infoscommandes->execute();
$lesinfoscomm = $infoscommandes->fetchAll();
}

else
{
$conn = bdd();

$premiereEntree=($pageActuelle-1)*50; // On calcul la première entrée à lire
// La requête sql pour récupérer les messages de la page actuelle.
$infoscommandes = $conn->prepare("SELECT $info FROM compte  inner join password  on  password.useroidval = compte.useroidval  inner join password_temp  on  password_temp.useroidval = compte.useroidval LIMIT $premiereEntree, $nbremess");
$infoscommandes->execute();
$lesinfoscomm = $infoscommandes->fetchAll();

}


return $lesinfoscomm;
}



function comptedispo($pageActuelle){
	$conn = bdd();
	$allcolonne = mescolonnes(); //toutes les colonnes de l'utilisateur
	$info = null ; // initialise info
	foreach($allcolonne as $colonne)
	{
	$info = $colonne['nom_colonne'].','.$info; // ajoute la colonne à info
	}
	$nbrecara = strlen($info);
	$info = substr($info,$nbrecara); // enleve la première virgule pour éviter les erreurs

	if($info == null) { $info = "*" ;} // si info vide on choisit tout pour eviter les erreurs
	
	$messagesParPage=50;
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
// La requête sql pour récupérer les messages de la page actuelle.
$infoscommandes = $conn->prepare("SELECT $info FROM compte  inner join password  on  password.useroidval = compte.useroidval  inner join password_temp  on  password_temp.useroidval = compte.useroidval  where RESERVE IS NULL LIMIT $premiereEntree, $messagesParPage");
$infoscommandes->execute();
$lesinfoscomm = $infoscommandes->fetchAll();
	return $lesinfoscomm;

}

function mescomptes($pageActuelle){
	$conn = bdd();
	$allcolonne = mescolonnes(); //toutes les colonnes de l'utilisateur
	$info = null ; // initialise info
	foreach($allcolonne as $colonne)
	{
	$info = $colonne['nom_colonne'].','.$info; // ajoute la colonne à info
	}
	$nbrecara = strlen($info);
	$info = substr($info,$nbrecara); // enleve la première virgule pour éviter les erreurs

	if($info == null) { $info = "*" ;} // si info vide on choisit tout pour eviter les erreurs
	$prefixe = $_SESSION['prefixe'];

	
	$messagesParPage=50;
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
// La requête sql pour récupérer les messages de la page actuelle.
$infoscommandes = $conn->prepare("SELECT $info FROM compte  inner join password  on  password.useroidval = compte.useroidval  inner join password_temp  on  password_temp.useroidval = compte.useroidval  where RESERVE = '$prefixe' LIMIT $premiereEntree, $messagesParPage");

$infoscommandes->execute();
$lesinfoscomm = $infoscommandes->fetchAll();
	return $lesinfoscomm;

}


function compte_spe($login){
	$conn = bdd();
	$allcolonne = mescolonnes(); //toutes les colonnes de l'utilisateur
	$info = null ; // initialise info
	foreach($allcolonne as $colonne) {
	$info = $colonne['nom_colonne'].','.$info; // ajoute la colonne à info
	}
	$nbrecara = strlen($info);
	$info = substr($info,$nbrecara); // enleve la première virgule pour éviter les erreurs
	if($info == null) { $info = "*" ;} // si info vide on choisit tout pour eviter les erreurs
	$infoscommandes = $conn->prepare("SELECT $info FROM compte  inner join password  on  password.useroidval = compte.useroidval  inner join password_temp  on  password_temp.useroidval = compte.useroidval where compte.login=? ");
	$infoscommandes->execute(array($login));
	$lesinfoscomm = $infoscommandes->fetch();
	return $lesinfoscomm;

}



	
function reserv_compte($useroidval){  // PERMET DE RESERVE UN COMPTE
	$conn = bdd();
	$modifcli = $conn->prepare('UPDATE compte SET  RESERVE= ? WHERE USEROIDVAL = ?;'); 
	$modifcli->execute(array($_SESSION['nom'],$useroidval));
	$conn = null ; //Quitte la connexion
	
}
function liberer_compte($useroidval){ // PERMET DE LIBERER UN COMPTE
	$conn = bdd();
	$modifcli = $conn->prepare('UPDATE compte SET  RESERVE= "" WHERE USEROIDVAL = ?;'); 
	$modifcli->execute(array($useroidval));
	$conn = null ; //Quitte la connexion
	
}


// ?>
