

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

  
  <!-- Content -->
  <div id="content"> 
    
   
    <!--======= PAGES INNER =========-->
    <section class="padding-top-30 padding-bottom-30  shopping-cart small-cart">
      <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          <div class="row"> 
            
            <!-- DISCOUNT CODE -->
            <div class="col-sm-12">
              <h6>La foire aux question</h6>
              <div class="grand-total">
              <?php foreach($questions as $q){?>
                <div class="cart-ship-info margin-top-30">
                  <h6 class="cursor shop-tittle margin-bottom-30"  onclick="changeVisibilite('question-<?=$q['idFaq'];?>','spanQuestion-<?=$q['idFaq'];?>')">
                  <span class="cursor" id="spanQuestion-<?=$q['idFaq'];?>" ><i  class="fas fa-angle-up"></i></span><?=$q['titreFaq'];?></h5>
                  <div id='question-<?=$q['idFaq'];?>'>
                    <p><?=$q['textFaq'];?></p>
                  </div>
                </div>
              <?php }?>
              </div>
            </div>
          </div>
      </div>

    
    </section>
   


    <?php include('./js/page/boutique.php');?>
  <?php include('./assets/inc/footer.php');?>
  