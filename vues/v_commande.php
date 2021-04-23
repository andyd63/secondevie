

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

  
  <!-- Content -->
  <div id="content"> 
    

  
    <!--======= PAGES INNER =========-->
    <section class="padding-top-30 padding-bottom-100 light-gray-bg shopping-cart small-cart">
      <div class="container"> 
      <?php if(!isset($error)){?>
      <a class="btn btnPrecedent" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i> Page Précédente</A>	
	  <a class="btn btnPrecedent" href="GenerateFacture.php?c=<?= $_GET['id'];?>"  target="_blank"><i class="far fa-file-pdf fa-lg"></i> Voir facture</a>
  
        
      <hr>
      <?php } else{  genererError(17); }?>
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          <div class="row"> 
            <!-- DISCOUNT CODE -->
            <div class="col-sm-7">
            <h6>Information sur la commande #<?= $commande['idCommande'] ;?> </h6>
            <p><i class="far fa-calendar-alt"></i> Date de la commande: <span class='enGras'><?= date('d/m/Y', $commande['date']);?></p>
            <p>Mode de livraison: <span class='enGras'><?= $modeLivraison['libModeLivraison'];?></span></p>
            <?php if($modeLivraison['idModeLivraison'] == 1) {
              $dateLivraison =$commande['dateLivraison'];
              $dateLivraison =  date('d-m-Y', strtotime($dateLivraison));?>
            <p><i class="fas fa-truck"></i> Date de livraison: <?php if($commande['dateLivraison'] != null){?><span class='enGras'><?php echo $dateLivraison;?> à <?php echo $commande['heureLivraison'];?></span></p><?php }?> <!-- si à domicile -->
            <?php }else{?>
            <p><i class="far fa-calendar-alt"></i> Date dépot colis: <?php if($commande['dateLivraison'] != null){
              $dateColis =$commande['dateLivraison'];
              $dateColis =  date('d-m-Y', strtotime($dateColis));
              ?><span class='enGras'><?php echo $dateColis;?> à <?php echo $commande['heureLivraison'];?></span></p><?php }?><!-- si relai coli-->
            <?php }?>
            <?php if($commande['datelivrer'] != null){
              $dateLiv =$commande['datelivrer'];
			        $dateLiv =  date('d-m-Y', strtotime($dateLiv));
              ?><p><i class="fas fa-truck-loading"></i> Date livré: <span class='enGras'><?php echo $dateLiv;?></span></p><?php }?><!-- si relai coli-->
            <br>

            <h6>Statut de la commande</h6>
            <ul class="progressbar">
              <?php foreach($allStatutCommande as $statut){
                ?>
     
              <li <?php if($statut['idStatutCommande'] <= $statutCommande['idStatutCommande']){ echo 'class="active"';}?>><?= $statut['libStatutCommande'];?></li>
              <?php }?>
            </ul>
            </div>
            <!-- SUB TOTAL -->
            <div class="col-sm-5">
              <h6>Récapitulatif</h6>
              <div class="grand-total">
                <div class="order-detail">
                  <?php
                
                  $totPanierCategories =  totalPrixCommandeParCategorie($commande['idCommande']); 
                  foreach($totPanierCategories as $tot){
                    $cat = categorie($tot['id']);?>
                    <p>Produit <?=$cat['nomCategorie'];?> 
                    <?php if($tot['totalRemise'] == '0' ){ ?><span><?= $tot['totalSansRemise'];?>€</span><?php } else{ ?>
                      <span><del><?= $tot['totalSansRemise'];?>€</del><?= $tot['totalAvecRemise'];?>€</span>
                    <?php } ?>
                  </p>
                  
                  <?php } ?>
                  <p>Frais de livraison / port: <span><?=$commande['fraisCommande'];?>€</span></p>
                  <!-- SUB TOTAL -->
                  <?php $totalPanier = totalPrixPanier();?>
                  <p class="all-total">Total sans réduction: <span><?= $commande['prixSansReduction'] + $commande['fraisCommande']?>€</span></p>
                  <p class="all-total">Total avec réduction: <span ><?= $commande['prixCommande'] + $commande['fraisCommande'];?>€</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--======= PAGES INNER =========-->
    <section class="padding-top-30 padding-bottom-100 pages-in chart-page">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div id="tabPanier" class="shopping-cart text-center">
          <div class="cart-head">
            <ul class="row">
              <!-- PRODUCTS -->
              <li class="col-sm-2 text-left">
                <h6>Produit</h6>
              </li>
              <!-- NAME -->
              <li class="col-sm-4 text-left">
                <h6>Nom</h6>
              </li>
              <!-- PRICE -->
              <li class="col-sm-2">
                <h6>Prix</h6>
              </li>
              <li class="col-sm-2">
                <h6>Réduction</h6>
              </li>                 
              <li class="col-sm-1"> </li>
            </ul>
          </div>
          <?php    foreach ($produits as $produitCommande) { ?>
            <!-- Cart Details -->
            <ul id="produit-panier-<?=$produitCommande['id'];?>" class="row cart-details">
            
              <li class="col-sm-6">
                <div class="media"> 
                  <!-- Media Image -->
                  <div class="media-left media-middle"> <a class="item-img"> <img class="media-object" src="<?= $produitCommande['image1'];?>" alt="photo du produit"> </a> </div>
                  
                  <!-- Item Name -->
                  <div class="media-body">
                    <div class="position-center-center">
                      <h5><?= $produitCommande['nom']?></h5>
                      <p><?= $produitCommande['description'];?></p>
                    </div>
                  </div>
                </div>
              </li>
              
              <!-- PRICE -->
              <li class="col-sm-2">
              <?php if($produitCommande['reduction'] != '0'){?>
                <div class="position-center-center"> <span class="price"><del><?= $produitCommande['prix'];?>€</del> <?= $produitCommande['prix'] * (1- $produitCommande['reduction']);?>€ </span> </div>
              <?php }else{?>
                <div class="position-center-center"> <span class="price"><?= $produitCommande['prix'];?>€</span> </div>
              <?php }?>
              </li>
              
              <li class="col-sm-2">
          <?php if($produitCommande['reduction'] != '0'){?><div class="position-center-center"> <span class="price"><?=$produitCommande['reduction'] *100?>%</span> </div><?php }?>
              </li>
              <!-- REMOVE -->
              
            </ul>
          <?php }?>
          
        
        </div>
      </div>
    </section>
    
    
    <?php include('./js/page/boutique.php');?>
  <?php include('./assets/inc/footer.php');?>
  