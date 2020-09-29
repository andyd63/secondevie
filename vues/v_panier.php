

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

  
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="padding-top-30 padding-bottom-100 pages-in chart-page">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart text-center">
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
              <li class="col-sm-1"> </li>
            </ul>
          </div>
          <?php    foreach ($_SESSION['panier']->getCollection() as $produitPanier) { ?>
            <!-- Cart Details -->
            <ul class="row cart-details">
            
              <li class="col-sm-6">
                <div class="media"> 
                  <!-- Media Image -->
                  <div class="media-left media-middle"> <a class="item-img"> <img class="media-object" src="<?= $produitPanier->getImage();?>" alt="photo du produit"> </a> </div>
                  
                  <!-- Item Name -->
                  <div class="media-body">
                    <div class="position-center-center">
                      <h5><?= $produitPanier->getNom();?></h5>
                      <p><?= $produitPanier->getDescription();?></p>
                    </div>
                  </div>
                </div>
              </li>
              
              <!-- PRICE -->
              <li class="col-sm-2">
                <div class="position-center-center"> <span class="price"><?= $produitPanier->getPrix();?>€</span> </div>
              </li>
              
              <!-- REMOVE -->
              <li class="col-sm-1">
                <div class="position-center-center"> <a href="#."><i class="icon-close"></i></a> </div>
              </li>
            </ul>
          <?php }?>
          
          <!-- Cart Details -->
          <ul class="row cart-details">
            <li class="col-sm-6">
              <div class="media"> 
                <!-- Media Image -->
                <div class="media-left media-middle"> <a href="#." class="item-img"> <img class="media-object" src="images/cart-img-2.jpg" alt=""> </a> </div>
                
                <!-- Item Name -->
                <div class="media-body">
                  <div class="position-center-center">
                    <h5>STOOL</h5>
                    <p>Lorem ipsum dolor sit amet</p>
                  </div>
                </div>
              </div>
            </li>
            
            <!-- PRICE -->
            <li class="col-sm-2">
              <div class="position-center-center"> <span class="price"><small>$</small>299</span> </div>
            </li>

            <!-- REMOVE -->
            <li class="col-sm-1">
              <div class="position-center-center"> <a href="#."><i class="icon-close"></i></a> </div>
            </li>
          </ul>
          
          <!-- Cart Details -->
          <ul class="row cart-details">
            <li class="col-sm-6">
              <div class="media"> 
                <!-- Media Image -->
                <div class="media-left media-middle"> <a href="#." class="item-img"> <img class="media-object" src="images/cart-img-3.jpg" alt=""> </a> </div>
                
                <!-- Item Name -->
                <div class="media-body">
                  <div class="position-center-center">
                    <h5>wood SPOON</h5>
                    <p>Lorem ipsum dolor sit amet</p>
                  </div>
                </div>
              </div>
            </li>
            
            <!-- PRICE -->
            <li class="col-sm-2">
              <div class="position-center-center"> <span class="price"><small>$</small>299</span> </div>
            </li>
            
            <!-- REMOVE -->
            <li class="col-sm-1">
              <div class="position-center-center"> <a href="#."><i class="icon-close"></i></a> </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
    
    <!--======= PAGES INNER =========-->
    <section class="padding-top-100 padding-bottom-100 light-gray-bg shopping-cart small-cart">
      <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          <div class="row"> 
            
            <!-- DISCOUNT CODE -->
            <div class="col-sm-7">
              <h6>Code de réduction</h6>
              <form>
                <input type="text" value="" placeholder="Entrer le code de réduction">
                <button type="submit" class="btn btn-small btn-dark">Appliquer</button>
              </form>
              <div class="coupn-btn textAlignCenter"> <a href="#." class="btn">Continuer</a> </div>
            </div>
            
            <!-- SUB TOTAL -->
            <div class="col-sm-5">
              <h6>Récapitulatif</h6>
              <div class="grand-total">
                <div class="order-detail">
                  <p>WOOD CHAIR <span>$598 </span></p>
                  <p>STOOL <span>$199 </span></p>
                  <p>WOOD SPOON <span> $139</span></p>
                  
                  <!-- SUB TOTAL -->
                  <p class="all-total">Total panier <span> $998</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <?php include('./js/page/boutique.php');?>
  <?php include('./assets/inc/footer.php');?>
  