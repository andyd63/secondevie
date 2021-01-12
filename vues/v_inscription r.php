

  <!--- Include Header et menu --->
  <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');
  ?>

  

  <!-- Content -->
  <div id="content"> 
    <!--======= PAGES INNER =========-->
    <section class="chart-page ">
      <div class="container">         
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info S'inscrire padding-bottom-10">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-12">
                <?=  genererError(9);?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 
  <!-- Content -->
  <div id="content"> 
    
    <!-- New Arrival -->
    <section class="padding-top-10">
      <div class="container"> 
      <div class="heading row">
        <div class="col-md-6">
          <h4 class="textAlignCenter"><?php echo $moduleVendre['titre_module'];?></h5>
          <p><?php echo $moduleVendre['texte_module'];?></p>
        </div>
        <div  class="col-md-6">
          <h4  class="textAlignCenter"><?php echo $moduleConcept['titre_module'];?></h5>
          <p><?php echo $moduleConcept['texte_module'];?></p>
          <div class="coupn-btn textAlignCenter"> 
            <a class="btn" href="vendre.html"><i class="fas fa-money-bill-wave"></i> Vendre</A>
          </div>
        </div>
      </div>
      <hr>
      </div>      
</section>
    
<!---- MODULE DERNIER PRODUIT DISPO SUR LE SITE --->
    
<?php include('./vues/module/dernierProduit.php');?>
<?php include('./js/page/boutique.php');?> 
    


  <?php include('./assets/inc/footer.php');?>
  