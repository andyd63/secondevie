<body>
<!-- LOADER -->
<div id="loader">
  <div class="position-center-center">
    <div class="ldr"></div>
  </div>
</div>

<!-- Wrap -->
<div id="wrap"> 
  
  <!-- header -->
  <header>
    <div class="sticky textAlignCenter">
    <div class="col-md-12 textAlignCenter headerLogo"> <a href="index.html"><img  class="logoSite img-responsive" src="<?=$configSite->logoSite;?>" alt="" ></a> 
    <ul class="social_icons">
          <li><a href="#."><i class="blueFb fa-lg fab fa-facebook"></i></a></li>
          <li><a href="#."><i class="violet fa-lg fab fa-instagram"></i></a></li>  
          
          
        </ul>
    <div id="incMenuResponsive" class="menuResponsive"><i class="fas fa-bars fa-2x"></i></div>
    </div>
        <!-- Logo -->
        
        <nav class="navbar ">

          <!-- NAV -->
          <div class="collapse navbar-collapse" id="nav-open-btn">
          <ul class="nav">
              <!-- SEARCH BAR -->
              <li class="dropdown"> <a href="javascript:void(0);" class="search-open"><i class=" fa-lg icon-magnifier"></i></a>
                <div class="search-inside animated bounceInUp"> <i class="icon-close search-close"></i>
                  <div class="search-overlay"></div>
                  <div class="position-center-center">
                    <div class="search">
                      <form action="index.php?c=boutique&action=search" method="post">
                        <input name="ask" type="search" placeholder="Une marque, un produit? Pour rechercher, c'est ici!">
                        <button type="submit"><i class="icon-check"></i></button>
                      </form>
                    </div>
                  </div>
                </div>
              </li>
                <!-- USER BASKET -->
                <li class="dropdown user-basket"> <a class="bleuTurquoise dropdown-toggle menuP"  role="button" aria-haspopup="true" aria-expanded="true">
              <i class="fas fa fa-lg fa-shopping-cart noir"></i>(<b id="nbreProduitPanier"><?=  $_SESSION['panier']->getNbCollection(); ;?></b>)</a>
                <ul class="menuPanier " >
                  <li>
                    <div id="menuPanierProduit" class="media-body">
                      <?php 
                      foreach ($_SESSION['panier']->getCollection() as $produitPanier) { ?>
                        <h6 id="produitMenu<?=$produitPanier->getId();?>" class="media-heading"><?= $produitPanier->getNom();?> 
                        <span id="prixProduit<?=$produitPanier->getId();?>" class="price">
                          <?php if($produitPanier->getReduction()==0){ echo  $produitPanier->getPrix().'€'; }else{ ?>
                          <del><?=$produitPanier->getPrix();?>€</del> <?= $produitPanier->getPrix() * (1 -$produitPanier->getReduction());?>€<?php } ?>
                        </span>
                        <span style="display:none" id="produitReduction<?=$produitPanier->getId();?>"><?=$produitPanier->getReduction();?></span>
                        </h6>
                        <?php }?>
                    
                  </li>
                  <li>
                    <?php $totalPanier = totalPrixPanier();?>

                    <h5 class="text-center">Total sans réduc: <span id="prixTotalMenuPanier"><?= $totalPanier['totalSansRemise']?></span>€</h5>
                    <h6 class="text-center">Total avec réduc: <span id="prixTotalMenuPanierPromo"><?= $totalPanier['totalAvecRemise'];?></span>€</h6>
                  </li>
                  <li class="margin-0">
                      <a href="index.php?c=panier&action=voirpanier" class="btn marginBottom5">Voir le panier</a>
                      <a id="viderPanier" class="btn rouge"><i class="fas fa-shopping-basket"></i> Vider le panier</a>
                  </li>
                </ul>
              </li>
              
          <?php foreach(allSiteMenuGroupe() as $groupe){ 
                if(strlen($groupe['nomAction']) < 1){
                  $param = 'c='.$groupe['nomControleur'];
              }else{
                  $param = 'c='.$groupe['nomControleur'].'&action='.$groupe['nomAction'];
              }
                 if($groupe['sousMenu'] == 0){  
                  if($groupe['connecte'] == 1) // si besoin d'etre co 
                    {
                                    if(isset($_SESSION['mail'])){?>
                                     <li> <a class="survol" href="index.php?<?=$param;?>"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a> </li>
                                    <?php }
                                }else{}
                          
                  if(($groupe['connecte'] == 0) &&  (!isset($_SESSION['mail']))){ // que quand tu es déco
                    ?> <li> <a class="survol" href="index.php?<?=$param;?>"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a> </li> <?php 
                  }
                  if($groupe['connecte'] == 2){ // les deux
                    ?> <li> <a class="survol" href="index.php?<?=$param;?>"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a> </li> <?php 
                  }
                  if(isset($_SESSION['mail'])){
                  if(($groupe['connecte'] == 3) &&  (adminexist($_SESSION['mail']))){ // administration 
                    ?>

                    <li class="dropdown "> <a class="survol" href="index.php?<?=$param;?>"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a>
                    <?php
                  }}
                  
              }else {
                if(($groupe['connecte'] == 1) &&  (isset($_SESSION['mail']))){ // que quand tu es co
                ?> <li class="dropdown "> <a class="survol" href="#." class="dropdown-toggle" data-toggle="dropdown"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a>
                  <?php
                }
                    if(($groupe['connecte'] == 0) &&  (!isset($_SESSION['mail']))){ // que quand tu es déco 
                    ?>
                    <li class="dropdown "> <a class="survol" href="#." class="dropdown-toggle" data-toggle="dropdown"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a>
                    <?php }
                    if($groupe['connecte'] == 2){ // les deux 
                      ?>

                      <li class="dropdown "> <a class="survol" href="#." class="dropdown-toggle" data-toggle="dropdown"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a>
                      <?php
                    }
                    if(isset($_SESSION['mail'])){
                    if(($groupe['connecte'] == 3) &&  (adminexist($_SESSION['mail']))){ // administration 
                      ?>

                      <li class="dropdown "> <a class="survol" href="#." class="dropdown-toggle" data-toggle="dropdown"><?=$groupe['icone'];?> <?php if($groupe["sansTitre"] == '1'){ echo $groupe['name'];} else {?><span class="titreMenuResponsive"><?=$groupe['name'];?></span><?php }?></a>
                      <?php
                    }}?>

                <ul class="dropdown-menu">
                  <?php          
                      foreach(allSiteMenuV($groupe['id']) as $lien){ 
                   
                               if($lien['nomAction'] == ''){
                                    $param = 'c='.$lien['nomControleur'];
                                }else{
                                    $param = 'c='.$lien['nomControleur'].'&action='.$lien['nomAction'];
                                }
                                if($lien['connecte'] == 1){
                                    if(isset($_SESSION['mail'])){?>
                                     <li> <a class="survol" href="index.php?<?=$param;?>"> <?=$lien['nomMenu'];?></a> </li>
                                    <?php }
                                }else{ }
                                if(($lien['connecte'] == 0) &&  (!isset($_SESSION['mail']))){ // que quand tu es déco
                                  ?> <li> <a class="survol" href="index.php?<?=$param;?>"> <?=$lien['nomMenu'];?></a> </li> <?php 
                                }
                                if($lien['connecte'] == 2){ // les deux
                                  ?> <li> <a class="survol" href="index.php?<?=$param;?>"> <?=$lien['nomMenu'];?></a> </li> <?php 
                                }
                                if(isset($_SESSION['mail'])){
                                  if(($groupe['connecte'] == 3) &&  (adminexist($_SESSION['mail']))){ // administration 
                                    ?><li> <a class="survol" href="index.php?<?=$param;?>"> <?=$lien['nomMenu'];?></a> </li> <?php 
                                  }
                                }

                               }
                   ?>
                   </ul>
              </li> <?php }?>
              
              <?php }?>
                          
              
      
              
            
              
            
          
            </ul>
          </div>
        </nav>

    </div>
  </header>