

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

  <!-- Content -->
  <div id="content"> 
    
    <!-- Popular Products -->
    <section class=" padding-bottom-100">
      <div class="container"> 
        <?php if($produit!= false){?>
        <!-- SHOP DETAIL -->
        <div class="shop-detail">
          <div class="row"> 
            
            <!-- Popular Images Slider -->
            <div class="col-md-7"> 
              
              <!-- Images Slider -->
              <div class="images-slider">
                <ul class="slides">
                  <li data-thumb="<?=$produit['image1'];?>"> <img class="img-responsive" src="<?=$produit['image1'];?>"  alt=""> </li>
                  <li data-thumb="<?=$produit['image2'];?>"> <img class="img-responsive" src="<?=$produit['image2'];?>"  alt=""> </li>
               <!-- dans le cas d'une troisième image   <li data-thumb="images/large-img-3.jpg"> <img class="img-responsive" src="images/large-img-3.jpg"  alt=""> </li> -->
                </ul>
              </div>
            </div>
            
            <!-- COntent -->
            <div class="col-md-5">
              <h4><?=$produit['nom'];?></h4>
              <span class="price"><?=$produit['prix'];?><small>€</small></span> 
              
             
              <!-- en cas de promotion <div class="on-sale"> 10% <span>OFF</span> </div>-->
              <ul class="item-owner">
                <li>Marque :<span> <?=$produit['marque'];?></span></li>
                <li>Etat:<span> <?=$produit['etat'];?></span></li>
              </ul>
              
              <!-- Description -->
              <p> <?=$produit['description'];?></p>
              
              <!-- Short By -->
              <div class="some-info">
                <ul class="row margin-top-30">
                  
                  
                
                  
                  <!-- Ajouter dans le panier -->
                  <li class="col-xs-10"> <a href="#." class="btn">Ajouter dans le panier</a> </li>
                  
                  <!-- LIKE -->
                  <li class="col-xs-2"> <a href="#." class="like-us"><i class="rouge icon-heart"></i></a> </li>
                </ul>
                
                <!-- INFOMATION -->
                <div class="inner-info">
                  <h6>Information de livraison</h6>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum finibus ligula a scelerisque gravida. Nullam laoreet tortor ac maximus alique met, consectetur adipiscing elit. </p>
                  <h6>Information sur le retour</h6>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum finibus ligula a scelerisque gravida. Nullam laoreet tortor ac maximus alique met, consectetur adipiscing elit. </p>
                  <h6>Partagez ce produit</h6>
                  
                  <!-- Social Icons -->
                  <ul class="social_icons">
                    <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                    <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                    <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
                    <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                    <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } else {
            genererError(11,2);
        }?>
        
            
           
        </div>
      </div>
    </section>
    <?php include('./vues/module/dernierProduit.php');?>
  
  </div>
  
  <?php include('./assets/inc/footer.php');?>
  