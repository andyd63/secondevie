

  <!--- Include Header et menu --->
  <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');
  require_once('./modeles/m_taille.php');
  $moduleVendre = voirModule(1);
  $moduleConcept = voirModule(2);
  $moduleDernierProduit = voirModule(3);
  $lesDerniersProduits = voir10DernierProduit(); 
  ?>

  
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
            <a class="btn" href="index.php?c=vendre"><i class="fas fa-money-bill-wave"></i> Vendre</A>
          </div>
        </div>
      </div>
      <hr>
      </div>      
</section>
    
<!---- MODULE DERNIER PRODUIT DISPO SUR LE SITE --->
    
<?php include('./vues/module/dernierProduit.php');?>
<?php include('./js/page/boutique.php');?> 
   
  </div>
  
  <?php include('./assets/inc/footer.php');?>
  