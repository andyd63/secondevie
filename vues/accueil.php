

  <!--- Include Header et menu --->
  <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');
  $moduleVendre = voir_module(1);
  $moduleConcept = voir_module(2);
  $moduleDernierProduit = voir_module(3);
  $lesProduits = voir10DernierProduit(); 
  ?>

  
  <!-- Content -->
  <div id="content"> 
    
    <!-- New Arrival -->
    <section class="padding-top-30 padding-bottom-100">
      <div class="container"> 
      <div class="heading row">
        <div class="col-md-6">
          <h4 class="textAlignCenter"><?php echo $moduleVendre['titre_module'];?></h5>
          <p><?php echo $moduleVendre['texte_module'];?></p>
        </div>
        <div  class="col-md-6">
          <h4  class="textAlignCenter"><?php echo $moduleConcept['titre_module'];?></h5>
          <p><?php echo $moduleConcept['texte_module'];?></p>
        </div>
      </div>
      <hr>
      </div>
        <!-- Main Heading -->
        <div class="heading text-center">
     
          <h4>new arrival</h4>
          <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. 
          Sed feugiat, tellus vel tristique posuere, diam</span> </div>
      </div>
      
</section>
    
    <!-- Dernier produit -->
    <section class="padding-top-50 padding-bottom-150">
      <div class="container"> 
        
        <!-- Main Heading -->
        <div class="heading text-center">
          <h4><?php echo $moduleDernierProduit['titre_module'];?></h4>
          <p> <?php echo $moduleDernierProduit['texte_module'];?></p>
          </div>
        
        <!-- Popular Item Slide -->
        <div class="papular-block block-slide">   
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="images/product-1.jpg" alt="" > <img class="img-2" src="images/product-2.jpg" alt="" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn"><a href="images/product-1.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i class="icon-heart"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">stone cup</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
          
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="images/product-2.jpg" alt="" > <img class="img-2" src="images/product-2.jpg" alt="" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn"><a href="images/product-2.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i class="icon-heart"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">gray bag</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
          
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="images/product-3.jpg" alt="" > <img class="img-2" src="images/product-2.jpg" alt="" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn"><a href="images/product-3.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i class="icon-heart"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">chiar</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
          
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="images/product-4.jpg" alt="" > <img class="img-2" src="images/product-2.jpg" alt="" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn"><a href="images/product-4.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i class="icon-heart"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">STool</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
        </div>
      </div>
    </section>
    

    
   
  </div>
  
  <?php include('./assets/inc/footer.php');?>
  