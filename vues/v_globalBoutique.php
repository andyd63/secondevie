

  <!--- Include Header et menu --->
  <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?>


    
    <!-- Content -->
    <div id="content"> 
      
      <!-- Popular Products -->
      <section class="padding-top-30 padding-bottom-150">
        <div class="container"> 
        
          <!-- NEW ARRIVAL -->
          <div class="new-arrival-list">
            <ul class="row">
              
              <!-- SHOP_ITEMS -->
              <li class="col-md-6"> 
                
                <!-- SHOP ITEM 1 -->
                <article> <img class="img-responsive" src="images/new-ar-img-1.jpg" alt="">
                  <div class="position-center-center">
                    <h4><a href="index.php?c=boutique&action=2">Enfant / Ados</a></h4>
                    <a href="index.php?c=boutique&action=2" class="btn btn-small btn-round">Voir</a> </div>
                </article>
                
                <!-- SHOP ITEM 3 -->
                <article> <img class="img-responsive" src="images/new-ar-img-2.jpg" alt="">
                  <div class="position-center-center">
                    <h4><a href="index.php?c=boutique&action=1">Adulte</a></h4>
                    <a href="index.php?c=boutique&action=1" class="btn btn-small btn-round">Voir</a> </div>
                </article>
              </li>
              <li class="col-md-6"> 
                
                <!-- SHOP_ITEM 2 -->
                <article> <img class="img-responsive" src="images/new-ar-img-3.jpg" alt="">
                  <div class="position-center-center">
                    <h4><a href="index.php?c=boutique&action=3">Braderie</a></h4>
                    <a href="index.php?c=boutique&action=3" class="btn btn-small btn-round">Voir</a> </div>
                </article>
                
              </li>
            </ul>
            
            <!-- SHOW MORE -->
            <div class="text-center margin-top-50"> <a href="#." class="btn btn-small btn-round"> SHOW MORE...</a> </div>
          </div>
        </div>
      </section>
      <?php include('./assets/inc/footer.php');?>