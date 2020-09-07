<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');

/**
 * @return Retourne l'id du prochain id
 */
function dernierPanier(){
    $conn = bdd();
    $requser = $conn->prepare('SELECT idPanier FROM panier limit 1');
    $requser->execute();
    $r = $requser->fetch();
    return $r['idPanier'] + 1;
}

function ajouterPanier($idPanier,$idPhoto,$qteProd,$type,$idClient,$date){
    $conn = bdd();
    $newclient = $conn->prepare('INSERT INTO panier (idPanier,idClient,idPhoto,qteProduit,type,date) VALUES (?,?,?,?,?,?)');
    $newclient->execute(array($idPanier,$idClient,$idPhoto,$qteProd,$type,$date));
    $conn = null ; //Quitte la connexion
}

function deletePanier($idPanier){
    $conn = bdd();
    $eve = $conn->prepare("DELETE FROM panier where idPanier = ? ");
    $eve->execute(array($idPanier));
    return $eve ;
}

function nbreligne_panier()
{
$nbreligne = count($_SESSION['Panier']); // nbre de ligne actuellement tableau
return $nbreligne;
}


function nbreproduit()
{
    $compteur = 0;
    foreach ($_SESSION['Panier'] as $produit) // pour chaque ligne
    {
        $compteur = $compteur + $produit[2];
    }
    return $compteur;
}

function nbreproduitNum()
{
    $compteur = 0;
    foreach ($_SESSION['Panier'] as $produit) // pour chaque ligne
    {
        if($produit[4] == 2) {
            $compteur = $compteur + 1;
        }
    }
    return $compteur;
}
function nbreproduitPapier()
{
    $compteur = 0;
    foreach ($_SESSION['Panier'] as $produit) // pour chaque ligne
    {
        if($produit[4] == 1) {
            $compteur = $compteur + $produit[2];
        }
    }
    return $compteur;
}

function ajouter_photo($id_commande,$nom_photo,$lien_photo,$qte,$evenement,$choix){
    $conn=bdd();
    $newclient = $conn->prepare("INSERT INTO photos (id_commande,nom_photo,adresse_photo,qte_photo,evenement,choix) 
							VALUES ($id_commande, '$nom_photo', '$lien_photo' ,$qte, $evenement,$choix)");
    $newclient->execute();
}

function lesprix(){
	$conn=bdd();
	$dernierecomm = $conn->prepare('SELECT * from prix ');
	$dernierecomm-> execute();
	$laderniercom = $dernierecomm->fetch();
	$conn=null;
	return $laderniercom;
}

function modifprix($prix_paquet,$prix_unitaire,$prix_numerique,$nbre_photo_lot,$reductionP,$reductionN){ // PERMET DE LIBERER UN COMPTE
	$conn = bdd();
	$modifcli = $conn->prepare('UPDATE prix SET prix_paquet = ? , prix_unitaire = ? , prix_numerique = ? , nbre_photo_groupe = ? , reductionP = ?, reductionN = ?'); 
	$modifcli->execute(array($prix_paquet,$prix_unitaire,$prix_numerique,$nbre_photo_lot,$reductionP,$reductionN));
	$conn = null ; //Quitte la connexion
	
}

