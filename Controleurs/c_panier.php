<?php
require_once('modeles/m_panier.php');
require_once('modeles/m_mailGenerique.php');
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
        unset($_SESSION['livraison']);
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


    // VOIR PANIER
    case 'terminer' :
        
        require_once('./vues/v_recapitulatif.php');
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
                        ,$cli['ADRESSE'],'',$cli['CODEPOSTAL'],$cli['VILLE'],$cli['MAIL_CLIENTS'],$cli['TEL_CLIENTS'], $prixLivraison['libPrixLivraison'].' '.$prixLivraison['libPrix2'], $commande['idCommande']);
                        
                        changeCommandeFacture($_GET['id'],$derFacture['idFacture']+1 , $prixLivraison['prixFraisLivraison']);// change l'id de la facture et les frais de port
                        changeCommandeToken($_GET['id'],'1');// change le statut de la commande
            
                        foreach ($_SESSION['panier']->getCollection() as $produitPanier) {
                            changeProduitStatut($produitPanier->getId(),'2',$commande['idCommande'],$_SESSION['id']);// change le statut de la commande
                        }
                         $_SESSION['panier']->vider(); // vider le panier
                        //recuperer la commande avec le prix
                        $commande = voirCommandeToken($_GET['id']);
                        

                        // envoie mail de la commande
                        $produits = voirProduitByCommande($commande['idCommande']); // tout les produits de la commande
                        // envoie mail de la commande
                        mailCommandeClient($configSite,$commande,$produits);
                        redirectUrl('index.php?c=profil&action=macommande&id='.$_GET['id']);
                    }else{
                      
                        changeCommandeFacture($_GET['id'],$derFacture['idFacture']+1,'3');// change l'id de la facture et le prix des frais de livraison 3€
                        changeCommandeToken($_GET['id'],'1');// change le statut de la commande
                    
                        foreach ($_SESSION['panier']->getCollection() as $produitPanier) {
                            changeProduitStatut($produitPanier->getId(),'2',$commande['idCommande'],$_SESSION['id']);// change le statut de la commande
                        }
                        $_SESSION['panier']->vider(); // vider le panier


                        // envoie mail de la commande
                        $produits = voirProduitByCommande($commande['idCommande']); // tout les produits de la commande
                        mailCommandeClient($configSite,$commande,$produits);
                        
                        redirectUrl('index.php?c=profil&action=confirmLivraison&id='.$_GET['id']);

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









    case "reussi" :
        include('./vues/vue_panier_reussi.php');
}

?>
