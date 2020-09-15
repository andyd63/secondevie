

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

          <h5>Mes favoris</h5><hr>
        </div>
         
          
          <!-- Item Content -->
          <div class="col-sm-9">
           
            <div class="papular-block row"> 
            <?php
            
            foreach($produits as $produit){
            $produit = voirProduitById($produit['idProduit']);
  
            ?>
            
            <!-- Popular Item Slide -->
            
              <!-- Item -->
              <div class="col-md-4">
                <div class="item"> 
                  <!-- Item img -->
                  <a  href="index.php?c=boutique&action=voirProduit&id=<?=$produit['id'];?>">
                    <div class="item-img"> <img class="img-1" src="<?=$produit['image1'];?>" alt="" > <img class="img-2" src="<?=$produit['image2'];?>" alt="" > 
                      <!-- Overlay -->
                    </div>
                  </a>
                        <div class="inn">
                          <a href="<?=$produit['image1'];?>" data-lighter><i class="icon-magnifier"></i></a> 
                          <a href="#." data-toggle="tooltip" data-placement="top" title="Ajouter dans le panier"><i class="icon-basket"></i></a>
                          <?php if(voirSiFavoris($_SESSION['id'],$produit['id']) == 0) { ?>
                            <a id="linkAddFavoris<?=$produit['id'];?>" href="#."  style="display:bl" data-toggle="tooltip" data-placement="top" title="Ajouter aux favoris"><i id="<?=$produit['id'];?>"  class="coeur addFavoris icon-heart"></i></a>
                            <a id="linkSupprFavoris<?=$produit['id'];?>" href="#." style="display:none" data-toggle="tooltip" data-placement="top" title="Supprimer des favoris"><i id="<?=$produit['id'];?>" class="coeur supprFavoris fas fa-heart"></i></a>
                           <?php } else { ?>
                            <a id="linkAddFavoris<?=$produit['id'];?>" href="#."  style="display:none" data-toggle="tooltip" data-placement="top" title="Ajouter aux favoris"><i id="<?=$produit['id'];?>"  class="coeur addFavoris icon-heart"></i></a>
                            <a id="linkSupprFavoris<?=$produit['id'];?>" href="#."  data-toggle="tooltip" data-placement="top" title="Supprimer des favoris"><i id="<?=$produit['id'];?>" class="coeur supprFavoris fas fa-heart"></i></a>
                          <?php }?>
                        </div>
                     
           
                  <!-- Item Name -->
                  <div class="item-name">  <a data-toggle="tooltip" data-placement="top" title="Voir le produit" href="index.php?c=boutique&action=voirProduit&id=<?=$produit['id'];?>"><?=$produit['nom'];?></a>
                    <p><?=$produit['description'];?></p>
                  </div>
                  <!-- Price --> 
                  <span class="price"><?=$produit['prix'];?>€ </div>
              </div>
             
            <?php }?>
            </div>
             
         
            
          
          </div>
        </div>
      </div>
    </section>
    
<script> 

  $('#btnFiltrer').click(function(e){ 
     console.log('e');
      
  });

  $('.addFavoris').click(function(e){ 
		idProduit =    e.target.id;
		idClient = <?php echo json_encode($_SESSION['id']); ?>;
    param = 'idClient='+idClient+"&idProduit="+idProduit;
		url= 'index.php?c=boutique&action=addFavoris';
	  messageRetour = '';
    postAjax(param,url,messageRetour);

    $('#linkAddFavoris'+idProduit).hide();
    $('#linkSupprFavoris'+idProduit).show();
	
  });

  $('.supprFavoris').click(function(e){ 
		idProduit =    e.target.id;
		idClient = <?php echo json_encode($_SESSION['id']); ?>;
    param = 'idClient='+idClient+"&idProduit="+idProduit;
		url= 'index.php?c=boutique&action=supprFavoris';
	  messageRetour = '';
    postAjax(param,url,messageRetour);

    $('#linkAddFavoris'+idProduit).show();
    $('#linkSupprFavoris'+idProduit).hide();
	
  });

  $('#price-min').change(function(e){ 
      $('#prixMinValue').text($(this).val());
      $('#price-max').attr({'min': $('#prixMinValue').text() });
      
  });


  $('#price-max').change(function(e){ 
      $('#prixMaxValue').text($(this).val());
      $('#price-min').attr({'max': $('#prixMaxValue').text() });
  });
  
  </script>

<?php include('./assets/inc/footer.php');?>
  