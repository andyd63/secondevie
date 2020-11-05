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
        echo $alert['part1Alert'].$module['titre_module'].$alert['part2Alert'].$module['texte_module'].$alert['part3Alert'];
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
        }
    }
}

// Verifie les réservations dans le panier si ça fait plus d'une heure qu'il est réservé
function supprReservationProduitBdd(){
    foreach ($_SESSION['panier']->getCollection() as $produitPanier) {
        $difference = time() - $produitPanier->getDateReservation(); // diffrence entre les deux heures
        if($difference >= 3600){ // temps de réservation au dessus d'une heure
            $_SESSION['panier']->supprimer($produitPanier->getId()); // supprime le produit du panier
        }
    }
    supprProduitReservation();
}




?>

