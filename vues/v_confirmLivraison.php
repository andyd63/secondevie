

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

  
  <!-- Content -->
  <div id="content"> 
    
   
    <!--======= PAGES INNER =========-->
    <section class="padding-top-100 padding-bottom-30 light-gray-bg shopping-cart small-cart">
      <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          <div class="row"> 
            
            <!-- DISCOUNT CODE -->
            <div class="col-sm-12">
              <?php genererError(23);?>
            </div>
            
            </div>
          </div>
      </div>
    </section>
 
    <section class="padding-top-30 padding-bottom-100 light-gray-bg shopping-cart small-cart">
      <div class="container">
        <!-- Onglet reservation -->
        <div class="cart-ship-info margin-top-0">
          <div class="row">  
            <div class="col-sm-12">
              <h6>Prendre un rendez-vous</h6>
              <p class="textEnGras">Attention, dans le formulaire mettez le même prénom et nom que sur votre compte!</p>
              <?php if(isConnected()){?>
              <iframe id="inlineFrameExample"
              title="Inline Frame Example"
              width="100%"
              height="600"
              src="https://book.timify.com/?accountId=5f7b153bc49edc1216a2ebab&hideCloseButton=true">
              </iframe>
            </div>
              <?php }?>
        </div>
    </section>
  


    <?php include('./js/page/boutique.php');?>
  <?php include('./assets/inc/footer.php');?>
  