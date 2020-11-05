<?php
require_once('modeles/m_panier.php');
require_once('modeles/m_produit.php');
require_once('modeles/m_pointRelaiCommande.php');
require_once('modeles/m_clients.php');
require_once('modeles/m_etiquetteLivraison.php');
require_once('modeles/m_categorie.php');
require_once('modeles/m_sousCategorie.php');
require_once('modeles/m_prixLivraison.php');
require_once('modeles/m_alert.php');
require_once('modeles/m_module.php');
require_once('modeles/m_commande.php');
require_once('modeles/m_statutCommande.php');
require_once('modeles/m_modeLivraison.php');
require_once('./modeles/m_configSite.php');
//require_once('modeles/Transaction.php');
//require_once('./modeles/m_codepromo.php');
//require_once ('./classes/zipfiles.php');
require_once ('./assets/inc/function.php');


$configSite=  new configSite(createConfigSite('nomSite'),createConfigSite('logoSite'),createConfigSite('telSite'),createConfigSite('emailSite'),createConfigSite('encartPromo'), actifOrDesactif('encartPromo'));


if(isset($_GET['action']))
	$action = $_GET['action'];
else{
	$action = "voirpanier";
}
switch ($action){
	case 'viderP' :
        videReservation();
        $_SESSION['panier']->vider();
        
        echo "Votre panier est bien vidé!";
	break;


    /// PERMET D'AJOUTER AU PANIER
    case 'addPanier':
        //Cherche le produit correspondant 
        $produit = voirProduitById($_POST['idProduit']);
        $poids = voirPoids($produit['genre'],$produit['sousCategorie']);
        // Ajouter le produit au panier
        $_SESSION['panier']->ajouter(new produits($produit['id'],$produit['categorie'],$produit['nom'],$produit['prix'],$produit['reduction'],$produit['image1'],$produit['description'],$poids, time()),$produit['id'] );       
        // Réserve le produit pendant 60 minutes
        if(!isset($_SESSION['id'])){
            $cli = null;
        }else{
            $cli = $_SESSION['id'];
        }
        changeProduitDateReservation($produit['id'],1,$cli);
        echo json_encode($produit);
        ?>
        <?php
        break;

    /// PERMET DE SAVOIR LE NOMBRE DE PRODUIT DANS LE PANIER

    case 'nbreProduitPanier':
        echo  $_SESSION['panier']->getNbCollection();
    break;

    // VOIR PANIER
    case 'voirpanier' :
        $error = false;
        require_once('./vues/v_panier.php');
    break;

	case 'supprPanier' : // action pour Supprimer dans le panier
        // Supprime le produit du panier
        $_SESSION['panier']->supprimer($_POST['idProduit'] );       
        changeProduitStatut($_POST['idProduit'],'0',null,null,null);
    // DERESERVE LE PRODUIT
    break;

    case 'cancel':
        $error = true;
        if(isset($_GET['id'])){
        $commande = voirCommandeToken($_GET['id']);
        if($commande != 'false'){
            deleteCommandeToken($_GET['id']);
        }
        }
        // supprime la commande 
        require_once('./vues/v_panier.php');
        break;


        case 'success' :
            $error = true; // affiche un message de félicitation pour la commande
            $idcli= $_SESSION['id']; // id du client
            if(isset($_GET['id'])){ // si y a un token
                $commande = voirCommandeToken($_GET['id']); // verifie si le token a une correspondance
        
                if($commande != false){ // si celui ci a une commande
                    $derFacture = voirDerniereCommandeAvecFacture();
                    $idC = $derFacture['idFacture'] + 1;
                    if($commande['modeLivraison'] == 2){ // si le mode de livraison est par relai
                        $cli = clientByEmail($_SESSION['mail']);

                        addPointRelaiCommande($_SESSION['livraison']['transporteur'],$idC,$_SESSION['livraison']['name'],
                        $_SESSION['livraison']['num'].' '.$_SESSION['livraison']['street'], $_SESSION['livraison']['postal'],$_SESSION['livraison']['city'] );
                        $poidsPanier = totalPanierPoids();
                        if($_SESSION['livraison']['transporteur'] == 'colissimo'){
                            $prixLivraison = voirPrixSelonPoids($poidsPanier, 'Colissimo');
                        }else{
                            $prixLivraison = voirPrixSelonPoids($poidsPanier, 'Relay');
                        }
                        addEtiquetteLivraison($cli['PRE_CLIENTS'].' '.$cli['NOM_CLIENTS']
                        ,$cli['ADRESSE'],'',$cli['CODEPOSTAL'],$cli['VILLE'],$cli['MAIL_CLIENTS'],$cli['TEL_CLIENTS'], $prixLivraison['libPrixLivraison'].' '.$prixLivraison['libPrix2'], $idC);
                        
                        changeCommandeFacture($_GET['id'],$derFacture['idFacture']+1);// change l'id de la facture
                        changeCommandeToken($_GET['id'],'1');// change le statut de la commande
            
                        foreach ($_SESSION['panier']->getCollection() as $produitPanier) {
                            changeProduitStatut($produitPanier->getId(),'2',$commande['idCommande'],$_SESSION['id']);// change le statut de la commande
                        }
                         // $_SESSION['panier']->vider(); // vider le panier
                        //recuperer la commande avec le prix
                        $commande = voirCommandeToken($_GET['id']);
                        $allStatutCommande = allStatutCommande(); // récupère tout les statuts
                        $statutCommande = statutCommande($commande['statutCommande']); // le statut de la commande
                        $modeLivraison = modeLivraison($commande['modeLivraison']); // le mode de livraison de la commande
                        $produits = voirProduitByCommande($commande['idCommande']); // tout les produits de la commande
                        // recuperer les produits de la commande    
                        require_once('./vues/v_commande.php');

                    }else{
                        changeCommandeFacture($_GET['id'],$derFacture['idFacture']+1);// change l'id de la facture
                        changeCommandeToken($_GET['id'],'1');// change le statut de la commande
            
                        foreach ($_SESSION['panier']->getCollection() as $produitPanier) {
                            changeProduitStatut($produitPanier->getId(),'2',$commande['idCommande'],$_SESSION['id']);// change le statut de la commande
                        }
                        require_once('./vues/v_confirmLivraison.php');

                    }
                    
                }
      
        
        }
        break;


    case 'choixLivraison':
        $error = true;
        $poidsPanier = totalPanierPoids();
        $prixColissimo = voirPrixSelonPoids($poidsPanier, 'Colissimo');
        $prixRelay = voirPrixSelonPoids($poidsPanier, 'Relay');
        require_once('./vues/v_choixLivraison.php');
    break;


    case 'addLivraison':
        $_SESSION['livraison'] = $_GET;
    break;






    

    case 'mettreCode':
        $codeP = codePromobyPromo($_POST['nomCode']);
        if($codeP != false){
            $_SESSION['promo'] = $codeP['pourcentagePromo'];
            $_SESSION['idPromo'] = $codeP['idCodePromo'];
            ?>
            <SCRIPT LANGUAGE="JavaScript">document.location.href="index.php?c=panier"</SCRIPT>
           <?php  }
        else{?>
            <SCRIPT LANGUAGE="JavaScript">document.location.href="index.php?c=panier&err=1"</SCRIPT>
        <?php }
        break;

    case 'viderCode':
        unset($_SESSION['promo']);?>
        <SCRIPT LANGUAGE="JavaScript">document.location.href="index.php?c=panier"</SCRIPT>
    <?php
        break;

    case 'payment':
        require_once('./vues/create_payment.php');
    break;

	
    



/* 
    /////////////////////////////////////////
    // PREPARATION MAIL
    //////////////////////////////////////////
    $totPhoto = $_SESSION['configPanierPapier']->getPhotoPanier()->getNbCollection() + $_SESSION['configPanierNum']->getPhotoPanier()->getNbCollection();
    $text = "<tr><td>Evenement</td><td>référence</td><td>Lien site </td><td>Quantite</td><tr>";
    $text_client = "<tr><td>Reference</td><td>Quantite</td><tr>";


    foreach ($_SESSION['configPanierPapier']->getPhotoPanier()->getCollection() as $produit) {
        $text_client.= "<tr><td>".$produit->getRef()."</td><td>".$produit->getQte()." Photos papier(s) </td>";
        $text.= "<tr><td>".$produit->getRep()."</td><td>".$produit->getRef()."</td><td>".$produit->getLien()."</td><td>".$produit->getQte()." Photos papiers </td>";
    }

    foreach ($_SESSION['configPanierNum']->getPhotoPanier()->getCollection() as $produit) {
        $text_client.= "<tr><td>".$produit->getRef()."</td><td>".$produit->getQte()." Photos numerique(s) </td>";
        $text.= "<tr><td>".$produit->getRep()."</td><td>".$produit->getRef()."</td><td>".$produit->getLien()."</td><td>".$produit->getQte()." Photos numériques </td>";
    }

//////////////////////////////////////////////////////////////////////////////////////////
///////////////// ENVOIE MAIL ADMIN
//////////////////////////////////////////////////////////////////////////////////////////


$mail = $configSite->emailSite; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){ // On filtre les serveurs qui rencontrent des bogues.

	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
$email = $_SESSION['mail'] ;
$tel = $_SESSION['tel'] ;
$adresse = $_SESSION['adresse'] ;
$ville = $_SESSION['ville'] ;
$cp = $_SESSION['cp'] ;
$nom = $_SESSION['nom'] ;
$prenom = $_SESSION['prenom'] ;
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Bonjour, Une nouvelle commande est arrivee ! Elle est disponible sur le panneau administrateur de votre site !";
$message_html = "<html><head></head><body><b>Bonjour</b>, Une nouvelle commande est arrivee ! Vous pouvez la retrouver sur le panneau administrateur de votre site ! <br> 
<br>Voici les informations importantes de la commande :<br>
Prenom et nom : ".$prenom." ".$nom."<br> 
Adresse : ".$adresse.",".$cp." ".$ville."<br>
Email : $email <br>
Tel : $tel <br>
Prix de la commande : ".$_SESSION['prixTotalTempo']."&#8364; <br>
Nombre de photo: ".$totPhoto." dont : 
<ul> 
	<li>".$_SESSION['configPanierPapier']->getPhotoPanier()->getNbCollection()." photo(s) papier(s) </li>
	<li>".$_SESSION['configPanierNum']->getPhotoPanier()->getNbCollection()." photo(s) numerique(s) </li>
</ul>
Voici les photos choisis :
<table>
$text	
</table>

 </body></html>";
//==========
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========

//=====Définition du sujet.
$sujet = "Une nouvelle commande";
//=========

//=====Création du header de l'e-mail.
$header = "From: \"Jcphotographie\"<jcphotographies.jc@gmail.com>".$passage_ligne;
$header.= "Reply-to: \"Jeremy\" <jcphotographies.jc@gmail.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========

//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========

//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========


//////////////////////////////////////////////////////////////////////////////////////////
///////////////// ENVOIE MAIL CLIENT
//////////////////////////////////////////////////////////////////////////////////////////
$mail2 = $_SESSION['mail']; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
$email = $_SESSION['mail'] ;
$tel = $_SESSION['tel'] ;
//=====Déclaration des messages au format texte et au format HTML.
$message_txt2 = "Bonjour, Voici le récapitulatif de votre commande ! ";
$message_html2 = "<html><head></head><body><b>Bonjour</b>, voici le recapitulatif de votre commande ! <br> 
Voici les infos important de la commande : <br>
Email : $email <br>
Tel : $tel <br>
Prix de la commande : ".$_SESSION['prixTotalTempo']." 	&#8364;<br>
Nombre de photo: ".$totPhoto." dont : 
<ul> 
    <li>".$_SESSION['configPanierPapier']->getPhotoPanier()->getNbCollection()." photo(s) papier(s) </li>
    <li>".$_SESSION['configPanierNum']->getPhotoPanier()->getNbCollection()." photo(s) numerique(s) </li>
</ul>
Voici les photos choisis :
<table>
$text_client	
</table>




 </body></html>";
//==========

//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========

//=====Définition du sujet.
$sujet2 = "Reception de votre recapitulatif de commande";
//=========

//=====Création du header de l'e-mail.
$header2 = "From: \"Jcphotographie\"<Jcphotographies.jc@gmail.com>".$passage_ligne;
$header2 .= "Reply-to: \"Jcphotographie\" <Jcphotographies.jc@gmail.com>".$passage_ligne;
$header2.= "MIME-Version: 1.0".$passage_ligne;
$header2.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========

//=====Création du message.
$message2 = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message2.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message2.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message2.= $passage_ligne.$message_txt2.$passage_ligne;
//==========
$message2.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message2.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message2.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message2.= $passage_ligne.$message_html2.$passage_ligne;
//==========
$message2.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message2.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========

//=====Envoi de l'e-mail.
mail($mail2,$sujet2,$message2,$header2);
//==========
*/


    case "reussi" :
        include('./vues/vue_panier_reussi.php');
}

?>
