

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Products -->
    <section class="shop-page  padding-bottom-100">
      <div class="container">
        <div class="row"> 
        <div class="col-sm-12">

          <h5><?=$categorie['iconeCategorie']?><?=$categorie['nomCategorie']?></h5><hr>
        </div>
          <!-- Shop SideBar -->
          <div class="col-sm-3">
            <h6 class="textAlignCenter"> <i class="fas fa-filter"></i> Filtrer </h5><hr>
            <div class="shop-sidebar"> 
              
            <!-- Category -->
             <h5 class="cursor shop-tittle margin-bottom-30" onclick="changeVisibilite('divGenre','spanGenre')">Genre <span class="cursor" id="spanGenre" ><i  class="fas fa-angle-up"></i></span></h5>
              <span class="transparent" id="nbGenre"><?=count($allGenre);?></span> 
              <ul style="display:block" id="divGenre"  class="shop-cate">
                <?php
                if(isset($_GET['genre'])){
                  $getGenre = explode(',',$_GET['genre']); // tableau des genre dans le get
                }
                foreach($allGenre as $genre){       
                ?>
                  <li  class="checkGenre<?=$genre['idGenre'];?>">
                    <input type="checkbox" id="genre-<?=$genre['idGenre'];?>" class="form-check-input " <?php if(isset($getGenre)){ if(in_array($genre['idGenre'],$getGenre)){ echo 'checked';}}?>> <?=$genre['iconeGenre']?> <?=$genre['libGenre']?>
                  </li>
                <?php
              }?>
              </ul>
              

              <!-- Category -->
              <h5 class="cursor shop-tittle margin-bottom-30" onclick="changeVisibilite('divCategorie','spanCategorie')">Catégorie <span class="cursor" id="spanCategorie" ><i  class="fas fa-angle-down"></i></span></h5>
              <ul style="display:none" id="divCategorie" class="shop-cate">
              <span class="transparent" id="nbCategorie"><?=count($allSousCategorie);?></span>
                <?php foreach($allSousCategorie as $sCat){?>
                  <li class="souscategorie"> <input type="checkbox" id="souscategorie-<?=$sCat['idSousCategorie'];?>" class="form-check-input "> <?=$sCat['iconeSousCategorie']?> <?=$sCat['nomSousCategorie']?></li>
                <?php }?>
              </ul>
              
               
              <!-- Category -->
              <h5 class="cursor shop-tittle margin-top-30 margin-bottom-30"  onclick="changeVisibilite('divTaille','spanTaille')">Taille <span id="spanTaille" ><i  class="fas fa-angle-down"></i></span></h5>
              <ul style="display:none" id="divTaille" class="shop-cate">
              <span class="transparent" id="nbTaille"><?=count($allTaille);?></span>
                <?php foreach($allTaille as $taille){?>
                  <li class="taille"> <input type="checkbox" class="form-check-input " id="taille-<?=$taille['idTaille']?>"> <?=$taille['iconeTaille']?> <?=$taille['nomTaille']?></li>
                <?php }?>
              </ul>
              <!-- FILTER BY PRICE -->
              <h5 class="cursor shop-tittle margin-top-30 margin-bottom-30"  onclick="changeVisibilite('divPrix','spanPrix')">Filtrer par prix <span id="spanPrix"><i  class="fas fa-angle-down"></i></span></h5>
              <div style="display:none" id="divPrix" data-role="rangeslider">
                <label for="price-min">Prix minimum: <span id="prixMinValue">0</span>€</label>
                <input type="range" name="price-min" id="price-min" value="0" min="0" max="100">
                <label for="price-max">Prix maximum: <span id="prixMaxValue">100</span>€</label>
                <input type="range" name="price-max" id="price-max" value="100" min="0" max="100">
              </div>
              <!-- 
              <h5 class="shop-tittle margin-top-60 margin-bottom-30">FILTER BY COLORS</h5>
              <ul class="colors">
                <li><a href="#." style="background:#958170;"></a></li>
                <li><a href="#." style="background:#c9a688;"></a></li>
                <li><a href="#." style="background:#c9c288;"></a></li>
                <li><a href="#." style="background:#a7c988;"></a></li>
                <li><a href="#." style="background:#9ed66b;"></a></li>
                <li><a href="#." style="background:#6bd6b1;"></a></li>
                <li><a href="#." style="background:#82c2dc;"></a></li>
                <li><a href="#." style="background:#8295dc;"></a></li>
                <li><a href="#." style="background:#9b82dc;"></a></li>
                <li><a href="#." style="background:#dc82d9;"></a></li>
                <li><a href="#." style="background:#dc82a2;"></a></li>
                <li><a href="#." style="background:#e04756;"></a></li>
                <li><a href="#." style="background:#f56868;"></a></li>
                <li><a href="#." style="background:#eda339;"></a></li>
                <li><a href="#." style="background:#edd639;"></a></li>
                <li><a href="#." style="background:#daed39;"></a></li>
                <li><a href="#." style="background:#a3ed39;"></a></li>
                <li><a href="#." style="background:#f56868;"></a></li>
              </ul>-->
              
              <!-- BRAND -->
              <h5 class="cursor shop-tittle margin-top-30 margin-bottom-30"  onclick="changeVisibilite('divEtat','spanEtat')">Etat <span id="spanEtat"><i  class="fas fa-angle-down"></i></span></h5>
              <ul style="display:none" id="divEtat" class="shop-cate">
                <?php foreach($allEtat as $etat){?>
                  <li class="etat"> <input type="checkbox" class="form-check-input " id="etat-<?=$etat['idEtat']?>"> <?=$etat['libEtat']?></li>
                <?php }?>
              </ul>
            

               <!-- Plus tard possibilite de trier par marque     
              
               <h5 class="cursor shop-tittle margin-top-30 margin-bottom-30"  onclick="changeVisibilite('divMarque','spanMarque')">Marque <span id="spanMarque"><i  class="fas fa-angle-down"></i></span></h5>
              <ul style="display:none" id="divMarque" class="shop-tags">
                <li> <input type="checkbox" class="form-check-input " id=""> Towels</li>
                <li> <input type="checkbox" class="form-check-input " id=""> Towels</li>
                <li> <input type="checkbox" class="form-check-input " id=""> Towels</li>
                <li> <input type="checkbox" class="form-check-input " id=""> Towels</li>
                <li> <input type="checkbox" class="form-check-input " id=""> Towels</li>
                <li> <input type="checkbox" class="form-check-input " id=""> Towels</li>
                <li> <input type="checkbox" class="form-check-input " id=""> Towels</li>
                <li> <input type="checkbox" class="form-check-input " id=""> Towels</li>
              </ul>-->
              
              <li class="col-md-12  margin-top-30 margin-bottom-30 text-center">
                      <button id="btnFiltrer" class="btn btnSmall"><i class="fas fa-sync-alt"></i> Filtrer</button>
              </li>

              <!-- SIDE BACR BANER -->
              <div class="side-bnr margin-top-50"> <img class="img-responsive" src="images/sidebar-bnr.jpg" alt="">
                <div class="position-center-center"> <span class="price"><small>$</small>299</span>
                  <div class="bnr-text">
                    PROMO</div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Item Content -->
          <div class="col-sm-9">
            <div class="item-display">
              <div class="row">
                <div class="col-xs-6"> <span class="product-num">Affichage de  1 - 10 sur 30 produits</span> </div>
                
                <!-- Products Select -->
                <div class="col-xs-6">
                  <div class="pull-right"> 
                    
                    <!-- Short By -->
                    <select class="form-control">
                      <option>Trier par</option>
                      <option>Short By</option>
                      <option>Short By</option>
                    </select>
                  
                    
                    </div>
                </div>
              </div>
            </div>
            <div class="papular-block row"> 
              <div class='row'>
            <?php 
            $number = 0;
            foreach($produits as $produit){
              if ($number % 3 == 0) { // si c'est une nouvelle ligne ?>
                </div>
                <div class='row'>
              <?php }
              $number++;
              ?>
            <!-- Popular Item Slide -->
            
              <!-- Item -->
              <div class="col-md-4">
                <div class="item"> 
                <div class="item"> 
                <!-- Sale Tags -->
                <?php if($produit['reduction']>0){?>
                  <div class="on-sale">
                    -<?= $produit['reduction'] * 100 ;?>%
                    <span>Promo</span>
                  </div>
                <?php }?>
                  <!-- Item img -->
                  <a  href="index.php?c=boutique&action=voirProduit&id=<?=$produit['id'];?>">
                    <div class="item-img"> <img class="img-1" src="<?=$produit['image1'];?>" alt="" > <img class="img-2" src="<?=$produit['image2'];?>" alt="" > 
                      <!-- Overlay -->
                    </div>
                  </a>
                        <div class="inn">
                          <a href="<?=$produit['image1'];?>" data-lighter><i class="icon-magnifier"></i></a> 
                          <?php if ($_SESSION['panier']->cleExiste($produit['id'])){ ?>
                           <i id="panierAdd-<?=$produit['id'];?>"  style="display:none" class="addPanier  fas fa-cart-plus"></i>
                           <i id="panierSuppr-<?=$produit['id'];?>"  class="supprPanier fas rouge fa-window-close"></i>
                          <?php } else { ?>
                           <i  id="panierAdd-<?=$produit['id'];?>" class="addPanier  fas fa-cart-plus"></i>
                           <i  id="panierSuppr-<?=$produit['id'];?>"  style="display:none"  class="supprPanier  fas rouge fa-window-close"></i>
                          <?php }  if(isset($_SESSION['id'])){
                            if(voirSiFavoris($_SESSION['id'],$produit['id']) == 0) { ?>
                            <a id="linkAddFavoris<?=$produit['id'];?>" href="#."   data-toggle="tooltip" data-placement="top" title="Ajouter aux favoris"><i id="<?=$produit['id'];?>"  class="coeur addFavoris icon-heart"></i></a>
                            <a id="linkSupprFavoris<?=$produit['id'];?>" href="#." style="display:none" data-toggle="tooltip" data-placement="top" title="Supprimer des favoris"><i id="<?=$produit['id'];?>" class="coeur rouge supprFavoris fas fa-heart"></i></a>
                           <?php } else { ?>
                            <a id="linkAddFavoris<?=$produit['id'];?>" href="#."  style="display:none" data-toggle="tooltip" data-placement="top" title="Ajouter aux favoris"><i id="<?=$produit['id'];?>"  class="coeur  addFavoris icon-heart"></i></a>
                            <a id="linkSupprFavoris<?=$produit['id'];?>" href="#."  data-toggle="tooltip" data-placement="top" title="Supprimer des favoris"><i id="<?=$produit['id'];?>" class="coeur rouge supprFavoris fas fa-heart"></i></a>
                          <?php }}?>
                        </div>
                     
           
                  <!-- Item Name -->
                  <div class="item-name">  <a data-toggle="tooltip" data-placement="top" title="Voir le produit" href="index.php?c=boutique&action=voirProduit&id=<?=$produit['id'];?>"><?=$produit['nom'];?></a>
                    <p><?=$produit['description'];?></p>
                  </div>
                  <!-- Price --> 
                  <span class="price">
                  <?php if($produit['reduction']==0){
                      echo $produit['prix'].'€';
                  }else{ ?>
                      <del><?=$produit['prix'];?>€</del> 
                      <?=$produit['prix'] * (1 - $produit['reduction']);?>€
                  <?php } ?>
                    </span>
                  </div>
              </div>
                  </div>
             
            <?php }?>
            </div>
             
         
            
            <!-- Pagination -->
            <ul class="pagination">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
<script> 



  $('#price-min').change(function(e){ 
      $('#prixMinValue').text($(this).val());
      $('#price-max').attr({'min': $('#prixMinValue').text() });
      
  });


  $('#price-max').change(function(e){ 
      $('#prixMaxValue').text($(this).val());
      $('#price-min').attr({'max': $('#prixMaxValue').text() });
  });
  
  </script>


<?php include('./js/page/boutique.php');?>

<?php include('./assets/inc/footer.php');?>
  