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
    <div class="sticky">
      <div class="container">  
        <!-- Logo -->
        <div class="logo"> <a href="index.html"><img class="img-responsive" src="assets/img/general/logo.png" alt="" ></a> </div>
        <nav class="navbar ownmenu">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"><i class="fa fa-navicon"></i></span> </button>
          </div>
          
          <!-- NAV -->
          <div class="collapse navbar-collapse" id="nav-open-btn">
          <ul class="nav">
            <?php foreach(allSiteMenuGroupe() as $groupe){ 
                if($groupe['nomAction'] == ''){
                  $param = 'c='.$groupe['nomControleur'];
              }else{
                  $param = 'c='.$groupe['nomControleur'].'&action='.$groupe['nomAction'];
              }
                 if($groupe['sousMenu'] == 0){ 
                  if($groupe['connecte'] == 1){
                                    if(!isset($_SESSION['mail'])){?>
                                     <li> <a href="index.php?<?=$param;?>"> <?=$groupe['name'];?></a> </li>
                                    <?php }
                                }else{?>
                                <li> <a href="index.php?<?=$param;?>"> <?=$groupe['name'];?></a> </li>
                            <?php }
              }else {?>
              <li class="dropdown "> <a href="#." class="dropdown-toggle" data-toggle="dropdown"><?= $groupe['name'];?></a>
                <ul class="dropdown-menu">
                  <?php          
                      foreach(allSiteMenuV($groupe['id']) as $lien){ 
                                if($lien['nomAction'] == ''){
                                    $param = 'c='.$lien['nomControleur'];
                                }else{
                                    $param = 'c='.$lien['nomControleur'].'&action='.$lien['nomAction'];
                                }
                                if($lien['connecte'] == 1){
                                    if(!isset($_SESSION['mail'])){?>
                                     <li> <a href="index.php?<?=$param;?>"> <?=$lien['nomMenu'];?></a> </li>
                                    <?php }
                                }else{?>
                                <li> <a href="index.php?<?=$param;?>"> <?=$lien['nomMenu'];?></a> </li>
                            <?php }}
                   ?>
                   </ul>
              </li> <?php }?>
              
              <?php }?>
                          
              
           
             
          
          <!-- Nav Right -->
          <div class="nav-right">
            <ul class="navbar-right">
              
              <!-- USER INFO -->
              <li class="dropdown user-acc"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" ><i class="icon-user"></i> </a>
                <ul class="dropdown-menu">
                  <li>
                    <h6>HELLO! Jhon Smith</h6>
                  </li>
                  <li><a href="#">MY CART</a></li>
                  <li><a href="#">ACCOUNT INFO</a></li>
                  <li><a href="#">LOG OUT</a></li>
                </ul>
              </li>
              
              <!-- USER BASKET -->
              <li class="dropdown user-basket"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="icon-basket-loaded"></i> </a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="media-body">
                      <h6 class="media-heading">WOOD CHAIR <span class="price">129.00 USD</span></h6>
                  </li>
                  <li>
                    <h5 class="text-center">SUBTOTAL: 258.00€</h5>
                  </li>
                  <li class="margin-0">
                      <a href="shopping-cart.html" class="btn">VIEW CART</a>
                      <a href="checkout.html" class="btn">CHECK OUT</a>
                  </li>
                </ul>
              </li>
              
              <!-- SEARCH BAR -->
              <li class="dropdown"> <a href="javascript:void(0);" class="search-open"><i class=" icon-magnifier"></i></a>
                <div class="search-inside animated bounceInUp"> <i class="icon-close search-close"></i>
                  <div class="search-overlay"></div>
                  <div class="position-center-center">
                    <div class="search">
                      <form>
                        <input type="search" placeholder="Search Shop">
                        <button type="submit"><i class="icon-check"></i></button>
                      </form>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>