  <!--- Include Header et menu --->
  <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-bottom-100">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              <div class="col-md-12 ">
              <?php if(isset($alert)){?>
                  <div class="alert alert-primary" role="alert">
                    <?php echo $alert;?>
                  </div>
                 <?php  }?>
                <h6>Mes produits disponibles</h6>
                
              <table id="produitDispo" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Réduction</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allProduitDispo as $produitP){?>
                  <tr>
                    <th scope="row"><?= $produitP['id'];?></th>
                    <td><?= $produitP['nom'];?></td>
                    <td><?= $produitP['prix'];?></td>
                    <td><?= $produitP['marque'];?></td>
                    <td><?= $produitP['reduction'] *100?>%</td>
                    <td></td>
                  </tr>
                  <?php }?>
                  
              
                </tbody>
              </table>
              <hr>
              <h6>Mes produits réservés</h6>
                
              <table id="produitReserve" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Réduction</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allProduitReserve as $produitR){?>
                  <tr>
                    <th scope="row"><?= $produitR['id'];?></th>
                    <td><?= $produitR['nom'];?></td>
                    <td><?= $produitR['prix'];?></td>
                    <td><?= $produitR['marque'];?></td>
                    <td><?= $produitR['reduction'] *100?>%</td>
                    <td></td>
                  </tr>
                  <?php }?>
                  
              
                </tbody>
              </table>
              <hr>
              <h6>Mes produits vendus</h6>
                
              <table id="produitVendu" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Réduction</th>
                    <th scope="col">Id commande</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allProduitVendu as $produitV){?>
                  <tr>
                    <th scope="row"><?= $produitV['id'];?></th>
                    <td><?= $produitV['nom'];?></td>
                    <td><?= $produitV['prix'];?></td>
                    <td><?= $produitV['marque'];?></td>
                    <td><?= $produitV['reduction'] *100?>%</td>
                    <td><a class="btn" href="index.php?c=admin&action=lacommande&id=<?= $produitV['idCommande'];?>"><i class="fas fa-search-plus fa-lg"></i> Voir <?=$produitV['idCommande'];?></a></td>
                  </tr>
                  <?php }?>
                  
              
                </tbody>
              </table>
              </div>
        
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <script>
   $(document).ready(function() {
        getDataTable('produitDispo');
        getDataTable('produitReserve');
        getDataTable('produitVendu');
    });
</script>
  <?php include('./assets/inc/footer.php');?>