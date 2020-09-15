

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
                  <li class="col-xs-2"> 
                      <?php if(voirSiFavoris($_SESSION['id'],$produit['id']) == 0) { ?>
                        <a id="linkAddFavoris<?=$produit['id'];?>" href="#."  style="display:bl" data-toggle="tooltip" data-placement="top" title="Ajouter aux favoris"><i id="<?=$produit['id'];?>"  class="coeur addFavoris  fa-2x icon-heart"></i></a>
                            <a id="linkSupprFavoris<?=$produit['id'];?>" href="#." style="display:none" data-toggle="tooltip" data-placement="top" title="Supprimer des favoris"><i id="<?=$produit['id'];?>" class="coeur supprFavoris fa-2x fas fa-heart"></i></a>
                           <?php } else { ?>
                            <a id="linkAddFavoris<?=$produit['id'];?>" href="#."  style="display:none" data-toggle="tooltip" data-placement="top" title="Ajouter aux favoris"><i id="<?=$produit['id'];?>"  class="coeur addFavoris fa-2x icon-heart"></i></a>
                            <a id="linkSupprFavoris<?=$produit['id'];?>" href="#."  data-toggle="tooltip" data-placement="top" title="Supprimer des favoris"><i id="<?=$produit['id'];?>" class="coeur supprFavoris fas fa-2x fa-heart"></i></a>
                          <?php }?></li>
                </ul>
                
                <!-- INFOMATION sur le retour et le l'envoie -->
                <div class="inner-info">
                  <?php  genererError(12);?>
                  <?php  genererError(13);?>
                 <!-- <br><h6>Partagez le produit</h6>
                  
                  <ul class="social_icons">
                    <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                    <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                    <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
                    <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                    <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
                  </ul>-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } else {
            genererError(11);
        }?>
        
            
           
        </div>
      </div>
    </section>
    <?php include('./vues/module/dernierProduit.php');?>
  
  </div>
  <?php include('./js/page/boutique.php');?>
  <?php include('./assets/inc/footer.php');?>
  