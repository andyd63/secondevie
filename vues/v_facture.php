<?php
/**
 * Created by IntelliJ IDEA.
 * User: Andy Douarre
 * Date: 02/03/2019
 * Time: 15:45
 */
require_once './modeles/m_commande.php';
require_once './modeles/m_clients.php';
require_once './modeles/m_codepromo.php';
require_once './modeles/m_produit.php';
$commande = voirCommandeToken($_GET['c']);
$client = informations($commande['idClient']);
$produits = voirProduitByCommande($commande['idCommande']); // tout les produits de la commande

?>
<style type="text/css">
    <!--
    table
    {
        width:  80%;
        margin-left: 10%;
        margin-right: 50%;
        border: solid 1px lightgray;
    }

    .tableInfo
    {
        width:  84%;

        border: solid 1px lightgray;
    }
    .tableTotalCommande {
        width:  30%;
        margin-left: 64%;
        border: solid 1px lightgray;
    }


    td
    {
        text-align: left;
        border: solid 1px lightgray;
    }

    .tableLogo{
        margin-bottom: 60px;
        margin-top: 50px;
        margin-left: 120px;
    }
    .titre{
        text-decoration: underline;
    }
    #info{
        border: 0px solid black;
        padding-left: 40px;

    }
    .active{
        background: lightgray;
    }

    end_last_page div
    {
        border: solid 1mm red;
        height: 27mm;
        margin: 0;
        padding: 0;
        text-align: center;
        font-weight: bold;
    }
    -->
</style>
<table class="tableLogo" style="border: 1px white">
    <colgroup>
        <col style="width: 10%" class="col1">
        <col style="width: 50%">
    </colgroup>
    <tr>
        <td id="info"><img  src="./assets/img/general/logo.png" width="200"></td>
        <td id="info"><h2 class="titre">Facture client<br></h2></td>
    </tr>
</table>

<?php
if(($commande['idClient'] == $_SESSION['id']) ||
($_SESSION['rang'] == 1))
{?>
<table style="border: 1px white">
    <colgroup>
        <col style="width: 50%" class="col1">
        <col style="width: 50%">
    </colgroup>
    <tr>
        <td id="info">Date: Le <?php echo date ("d/m/Y ", $commande['date']) ?>  </td>
        <td id="info">Numéro Facture: <?=$commande['idFacture'];?></td>
    </tr>
</table>
<br>




<table class="tableInfo">
    <colgroup>
        <col style="width: 50%" >
        <col style="width: 50%">
    </colgroup>
    <thead>
    <tr><th></th><th></th></tr>
    </thead>
        <tr>
            <td id="info">Société: DeuxièmeVie</td>
            <td id="info">Client: <?= $client[0]['PRE_CLIENTS'];?> <?= $client[0]['NOM_CLIENTS'];?> </td>
        </tr>
        <tr>
            <td id="info">Téléphone: 06.01.44.63.69</td>
            <td id="info">Adresse: <?= $client[0]['ADRESSE'];?></td>
        </tr>
        <tr>
            <td id="info">Mail: deuxiemevieboutique@gmail.com</td>
            <td id="info">Ville: <?= $client[0]['CODEPOSTAL'];?> <?= $client[0]['VILLE'];?></td>
        </tr>
        <tr>
            <td id="info">Siret: 844	686	287	00013</td>
            <td id="info">Télephone: <?= $client[0]['TEL_CLIENTS'];?></td>
        </tr>
        <tr>
            <td id="info"></td>
            <td id="info">Mail: <?= $client[0]['MAIL_CLIENTS'];?> </td>
        </tr>

</table>
<br>


<table>
    <colgroup>
        <col style="width: 10%" class="col1">
        <col style="width: 15%">
        <col style="width: 35%">
        <col style="width: 10%">
        <col style="width: 30%">
    </colgroup>
    <thead>
    <tr class="active">
        <th>Numéro</th>
        <th>Produit</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Prix après Réduction</th>
    </tr>
    </thead>
    <?php    foreach ($produits as $produitCommande) { ?>
        <tr>
            <td><?=$produitCommande['id'];?></td>
            <td><?=$produitCommande['nom'];?></td>
            <td><?=$produitCommande['description'];?></td>
            <td><?=$produitCommande['prix'];?> €</td>
            <td><span class="price"><del><?= $produitCommande['prix'];?>€</del> <?= $produitCommande['prix'] * (1- $produitCommande['reduction']);?>€ </span></td>
        </tr>
    <?php }?>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<table>
    <colgroup>
        <col style="width: 50%" class="col1">
        <col style="width: 50%">
    </colgroup>
    <thead>
    <tr class="active">
        <th></th>
        <th>Prix</th>

    </tr>
    </thead>
        <tr>
            <td>Total sans réduction</td>
            <td><?=$commande['prixSansReduction'];?>€</td>
        </tr>
        <tr>
            <td>Total avec réduction</td>
            <td><?= $commande['prixCommande'];?>€</td>
        </tr>
</table>

<?php }?>