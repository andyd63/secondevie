<?php
/**
 * Created by IntelliJ IDEA.
 * User: Andy Douarre
 * Date: 01/03/2019
 * Time: 15:08
 */

/**
 * @param $files tableau de fichier à archiver
 * @param $idCommande id de la commandes pour le nom de l'archive
 * @param $nameRep : Nom du repertoire soit archives papier ou numérique
 */
function createZip($files,$idCommande,$nameRep){
    $zip = new zipfiles(); //on crée une instance zip
    $i = 0;
    $rep = "Archives/".$nameRep;
    $nomZip = $rep."/".$idCommande.".zip";
    while (count($files) > $i) {
        $file = explode('/', $files[$i]);
        $fichier = $file[0].'/'.$file[1].'/'.$file[2].'/mes_evenements_photo_normal/'.$file[4].'/'.$file[5];
        $fo = fopen($fichier, 'r'); //on ouvre le fichier
        $contenu = fread($fo, filesize($fichier)); //on enregistre le contenu
        $str = explode('/', $fichier);
        fclose($fo); //on ferme fichier
        $zip->addfile($contenu, $str[5]); //on ajoute le fichier
        $i++; //on incrémente i
    }

    $archive = $zip->file(); // on associe l'archive
    // on enregistre l'archive dans un fichier
    $open = fopen($nomZip, "wb");
    fwrite($open, $archive);
    fclose($open);
}


function redirectionNonAdmin($bool){
    if($bool == 0){?>
        <SCRIPT LANGUAGE="JavaScript">
            document.location.href="index.php"
        </SCRIPT>
    <?php }
    else{
    }
}

function redirectUrl($url){
    ?>
        <SCRIPT LANGUAGE="JavaScript">
            document.location.href= <?php echo  json_encode($url);?>
        </SCRIPT>
    <?php }


// Generer l'erreur ou le message à afficher entièrement
function genererError($idModule){
        $module = voir_module($idModule);
        $alert = voirAlert($module['alert']);

        if($module['alert'] == 5){
            echo $alert['part1Alert'].$alert['part2Alert'].$module['texte_module'].$alert['part3Alert'];
        }else{
            echo $alert['part1Alert'].$module['titre_module'].$alert['part2Alert'].$module['texte_module'].$alert['part3Alert'];
        }

}

// Permet de retrouver le prix dans le panier, le total des remises, et les prix avec remises
function totalPrixPanier(){
    $totalPrix = 0;
    $totalRemise = 0;
    //Pour chaque produit
    foreach ($_SESSION['panier']->getCollection() as $produitPanier) {
        $totalPrix += $produitPanier->getPrix();
        $totalRemise += ($produitPanier->getPrix() * (1 - $produitPanier->getReduction() )) ;

    }
    $retour = array('totalAvecRemise'=>number_format(($totalRemise ),2),'totalSansRemise'=>number_format($totalPrix,2),'totalRemise'=>number_format($totalPrix - $totalRemise,2));
    return $retour;
}

// Permet de retrouver le  poids du panier
function totalPanierPoids(){
    $totalPoids = 0;
    //Pour chaque produit
    foreach ($_SESSION['panier']->getCollection() as $produitPanier) {
        $totalPoids += $produitPanier->getPoids();

    }
    return $totalPoids;
}

function siCheckUrl($valeur,$tableau){
    $retour = false;
    if(isset($_GET[$tableau])){ // si le get existe
    $value = explode(",", $_GET[$tableau]);
        foreach($value as $v){ // pour chaque valeur
            if($valeur == $v){
                return true;
            }
        }
    }
    return $retour;
}

// PERMET DE SAVOIR S'IL EST CONNECTé
function isConnected(){
    $r = false;
    if(isset($_SESSION['id'])){
        $r = true;
    }
    return $r;
}

// Permet de retrouver le prix dans le panier pour chaque catégorie
function totalPrixPanierParCategorie(){
    $allCategorie = allCategorie(); // récupere les catégories
    //Pour chaque catérogies
    $totalPanier = array();
    foreach ($allCategorie as $categorie) {
        //Pour chaque produit du panier
        $totalPrix = 0;
        $totalRemise = 0;
        foreach ($_SESSION['panier']->getCollection() as $produitPanier) {
            if($produitPanier->getCategorie() == $categorie['idCategorie']){
                $totalPrix += $produitPanier->getPrix();
                $totalRemise += ($produitPanier->getPrix() * (1 - $produitPanier->getReduction() )) ;
            }
       
        }
        array_push($totalPanier, array('id'=>$categorie['idCategorie'],'totalAvecRemise'=>number_format(($totalRemise ),2),'totalSansRemise'=>number_format($totalPrix,2),'totalRemise'=>number_format($totalPrix - $totalRemise,2)));
    }

    return $totalPanier;
}


// Permet de retrouver le prix de la commande pour chaque catégorie
function totalPrixCommandeParCategorie($id){
    $allCategorie = allCategorie(); // récupere les catégories
    //Pour chaque catérogies
    $totalPanier = array();
    foreach ($allCategorie as $categorie) {
        //Pour chaque produit du panier
        $totalPrix = 0;
        $totalRemise = 0;
        $produits = voirProduitByCommande($id); // tout les produits de la commande
        foreach ($produits as $produitPanier) {
            if($produitPanier['categorie'] == $categorie['idCategorie']){
                $totalPrix += $produitPanier['prix'];
                $totalRemise += ($produitPanier['prix'] * (1 - $produitPanier['reduction'] )) ;
            }
       
        }
        array_push($totalPanier, array('id'=>$categorie['idCategorie'],'totalAvecRemise'=>number_format(($totalRemise ),2),'totalSansRemise'=>number_format($totalPrix,2),'totalRemise'=>number_format($totalPrix - $totalRemise,2)));
    }

    return $totalPanier;
}


function prixReel($prix){
    $margeFixe = 0.25;
    $margePourcent = 0.014;
    $prixReel = ($prix * (1-$margePourcent)) - $margeFixe;
    return $prixReel;

}

function appelAjax($data){
	header('Content-Type: application/json');
	echo $data;
}


function countNbreImageDossierCopyright($idEvenement){
    $nbFichiers = 0;
    $nomRep = "./assets/img/mes_evenements/".$idEvenement;
    if(is_dir($nomRep) == true){
    $repertoire = opendir($nomRep);
    while ($fichier = readdir($repertoire)) {
        $nbFichiers += 1;
    }
    }
    else {
        $nbFichiers = 'Dossier inexistant';
    }              
    return  $nbFichiers;
}

// Verifie les réservations dans le panier si ça fait plus d'une heure qu'il est réservé
function supprReservationProduitPanier(){
    foreach ($_SESSION['panier']->getCollection() as $produitPanier) {
        $difference = time() - $produitPanier->getDateReservation(); // diffrence entre les deux heures
        if($difference >= 3600){ // temps de réservation au dessus d'une heure
            $_SESSION['panier']->supprimer($produitPanier->getId()); // supprime le produit du panier
            changeProduitStatut($produitPanier->getId(),'0',null,null,null);
        }
    }
}


// Quand se connecte réaffecte les produit reserve à lui 
function associerProduitAuPanier($id){
    foreach ($_SESSION['panier']->getCollection() as $produitPanier) {
        changeProduitStatut($produitPanier->getId(),'1',null,$_SESSION['id'],'false');
    }

}

function videReservation(){
    foreach ($_SESSION['panier']->getCollection() as $produitPanier) {
        changeProduitStatut($produitPanier->getId(),'0',null,null,null);
    }
}



// FUNCTION qui sert à envoyer des mails : 
// si bdd = null : Prendre message, sinon prendre le message correspondant à l'id dans messsage
function envoieMail($configSite,$sujet,$mail,$message_txt,$message_html, $bdd = null){
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    }
    else{
        $passage_ligne = "\n";
    }
    //=====Création de la boundary
    $boundary = "-----=".md5(rand());
    //==========
    
    //=====Création du header de l'e-mail.
    $header = "From: \"Deuxièmevie\"<".$configSite->emailSite.">".$passage_ligne;
    $header.= "Reply-to: \"Deuxiemevie\"<".$configSite->emailSite.">".$passage_ligne;
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
    }



function mailCommandeClient($configSite,$commande,$produits){

$sujet = 'Votre commande est validée!';
$mailClient = $_SESSION['mail']; // Déclaration de l'adresse de destination.
$tel = $_SESSION['tel'] ;

if($commande['modeLivraison'] == 1){
$messageInfo = 'Merci votre commande est un succès ! <br>Après avoir pris un rendez-vous pour la livraison à domicile, vous allez recevoir un mail de confirmation de votre livraison.<br>
Le statut de votre commande sur notre site se mettra à jour d\'ici quelques heure.';

}else{
    $messageInfo = 'Merci votre commande est un succès !<br> Votre commande va être traitée dans les plus brefs délai par notre équipe.<br>';
}

$tableauProduit = '<table><tr><td>Produit</td><td>Prix</td></tr>';

foreach($produits as $produit){
    $tableauProduit.='<tr><td>'.$produit['nom'].'</td><td>'.$produit['prix'] * $produit['reduction'].'</td><tr>';
}


//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Bonjour, Voici le récapitulatif de votre commande ! ";
$message_html = "<html><head></head><body><b>Bonjour,</b><br>".$messageInfo."
Voici un résumé des informations de votre commande : <br>
Email : $mailClient <br>
Tel : $tel <br>
Prix de la commande : ".$commande['prixCommande']." 	&#8364;<br>

Voici les produits achetés :
<table>
$tableauProduit	
</table>


 </body></html>";

 envoieMail($configSite,$sujet,$mailClient,$message_txt,$message_html);
}
?>

