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
              <h6>Mes commandes</h6>
                
              <table id="test" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Nombre de produit</th>
                    <th scope="col">Mode de livraison</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Date</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($commandes->commandes as $c){ 
                  $statutCommande = statutCommande($c->statutCommande);
                  ?>
                  <tr>
                    <th scope="row"><?= $c->idCommande;?></th>
                    <td><?= $c->prixCommande;?></td>
                    <td><?= $c->nbreProduit;?></td>
                    <td><?= voirLibellemodeLivraison($c->modeLivraison)?></td>
                    <td><?= $statutCommande['libStatutCommande'] ?></td>
                    <td><?= date('d/m/Y',$c->date);?></td>
                    <td><a class="btn" href="index.php?c=profil&action=macommande&id=<?= $c->tokenVerification;?>"><i class="fas fa-search-plus fa-lg"></i> Voir commande</a></td>
                    <td><a class="btn" href="GenerateFacture.php?c=<?= $c->tokenVerification;?>"><i class="far fa-file-pdf fa-lg"></i> Voir facture</a></td>
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
  <style> #test_filter{ display:none;}</style>
  <script>
    $(document).ready(function() {
        getDataTable('test');
    });
</script>
  <?php include('./assets/inc/footer.php');?>