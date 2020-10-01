

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

  
  <!-- Content -->
  <div id="content"> 
    

  
    <!--======= PAGES INNER =========-->
    <section class="padding-top-100 padding-bottom-100 light-gray-bg shopping-cart small-cart">
      <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          <div class="row"> 
            
            <!-- DISCOUNT CODE -->
            <div class="col-sm-7">
              <h6>Statut de votre commande du <?= date('d/m/Y', $commande['date']);?></h6>
            </div>
            <?php var_dump($commande);?>
            <!-- SUB TOTAL -->
            <div class="col-sm-5">
              <h6>Récapitulatif</h6>
              <div class="grand-total">
                <div class="order-detail">
                  <?php
                  $totPanierCategories =  totalPrixPanierParCategorie(); 
                  foreach($totPanierCategories as $tot){
                    $cat = categorie($tot['id']);?>
                    <p>Produit <?=$cat['nomCategorie'];?> 
                    <?php if($tot['totalRemise'] == '0' ){ ?><span><?= $tot['totalSansRemise'];?>€</span><?php } else{ ?>
                      <span><del><?= $tot['totalSansRemise'];?>€</del><?= $tot['totalAvecRemise'];?>€</span>
                    <?php } ?>
                  </p>
                  <?php } ?>
                  <!-- SUB TOTAL -->
                  <?php $totalPanier = totalPrixPanier();?>
                  <p class="all-total">Total sans réduction: <span><?= $commande['prixSansReduction']?>€</span></p>
                  <p class="all-total">Total avec réduction: <span ><?= $commande['prixCommande'];?>€</span></p>
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
        <?php if($error){ echo genererError(16); }?>
        
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
              <li class="col-sm-1">
                <div id="panierSuppr<?=$produitCommande['id'];?>" class="position-center-center"> <a class="supprPanierproduit supprPanierLigne" href="#."><i  id="<?=  $produitCommande['id'];?>"  class="icon-close"></i></a> </div>
              </li>
            </ul>
          <?php }?>
          
        
        </div>
      </div>
    </section>
    
    
    <?php include('./js/page/boutique.php');?>
  <?php include('./assets/inc/footer.php');?>
  