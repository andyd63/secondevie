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
function genererError($idModule,$idAlert){
        $module = voir_module($idModule);
        $alert = voirAlert($idAlert);
        echo $alert['part1Alert'].$module['titre_module'].$alert['part2Alert'].$module['texte_module'].$alert['part3Alert'];
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

function countNbreImageDossierNormal($idEvenement){
    $nbFichiers = 0;
    $nomRep = "./assets/img/mes_evenements_photo_normal/".$idEvenement;
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

?>

