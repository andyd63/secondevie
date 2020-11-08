

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

  
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="padding-top-30 padding-bottom-100 pages-in chart-page shopping-cart small-cart cart-ship-info">
      <div class="container"> 
      <div class="row"> 
      <?php if(isset($error)){ echo genererError(16); } ?>
      <div class="col-sm-3"></div>
      <div class="col-sm-6 cart-ship-info">
              <h6>Récapitulatif avant paiement</h6>
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
                  <?php } $fraideport = 0; 
                  if(isset($_SESSION['livraison'])){ $fraideport = $_SESSION['livraison']['prixLivraison']; ?><p> Frais de port: <span><?= $_SESSION['livraison']['prixLivraison'];?>€</span></p> <?php }?>
                  <!-- SUB TOTAL -->
                  <?php $totalPanier = totalPrixPanier();?>
                  <p class="all-total">Total sans réduction: <span><?= $totalPanier['totalSansRemise'] + $fraideport;?>€</span></p>
                  <p class="all-total">Total avec réduction: <span ><?= $totalPanier['totalAvecRemise'] + $fraideport;?>€</span></p>
                </div>
              </div>
              <br><hr>
              
              <h6>Vous avez un code de réduction?</h6>
              <form>
                <input type="text" value="" placeholder="Entrer le code de réduction">
                <button type="submit" class="btn btn-small btn-dark">Ok</button>
              </form>
              <div class="coupn-btn textAlignCenter"> 
                <?php if(isConnected()){?>
                <a href="index.php?c=panier&action=payment" class="btn">Paiement</a> 
                <?php }else{?>
                  <a href="index.php?c=connexion" class="btn">Connectez-vous!</a>
                <?php }?>
              </div>
            </div>        
        </div>
      </div>
    </section>
    
    
    
    <?php include('./js/page/boutique.php');?>
  <?php include('./assets/inc/footer.php');?>
  