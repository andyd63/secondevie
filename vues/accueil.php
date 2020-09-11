

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
    <section class="padding-top-30 padding-bottom-30">
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
        <?php foreach($lesProduits as $produit){ ?>
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="<?=$produit['image1'];?>" alt="" > <img class="img-2" src="<?=$produit['image2'];?>" alt="" > 
              <!-- Overlay -->
           
                  <div class="inn margin-top-30">
                    <a href="<?=$produit['image1'];?>" data-lighter><i class="icon-magnifier"></i></a>
                    <a href="#." data-toggle="tooltip" data-placement="top" title="Ajouter dans le panier"><i class="icon-basket"></i></a> 
                    <a href="#." data-toggle="tooltip" data-placement="top" title="Ajouter aux favoris"><i id="coeur" class="icon-heart"></i></a>
                  </div>
            
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">st</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>$</small>299</span> </div>
        <?php }?>
        </div>
        </section>
      
    

    
   
  </div>
  
  <?php include('./assets/inc/footer.php');?>
  