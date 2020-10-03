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
                <h6>Mes etiquettes non traitées</h6>
                
              <table id="test1" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">cp</th>
                    <th scope="col">ville</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tel</th>
                    <th scope="col">nomOption</th>
                    <th scope="col">idCommande</th>
                    <th scope="col">statutEtiquette</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($etiquetteNonTraite as $etiquette){?>
                  <tr>
                    <th scope="row"><?= $etiquette['idEtiquette'];?></th>
                    <td><?= $etiquette['nom'];?></td>
                    <td><?= $etiquette['adresse'];?></td>
                    <td><?= $etiquette['cp'];?></td>
                    <td><?= $etiquette['ville'];?></td>
                    <td><?= $etiquette['pays'];?></td>
                    <td><?= $etiquette['email'];?></td>
                    <td><?= $etiquette['tel'];?></td>
                    <td><?= $etiquette['nomOption'];?></td>
                    <td><?= $etiquette['idCommande'];?></td>
                    <td><?= $etiquette['statutEtiquette'];?></td>
              
                  </tr>
                  <?php }?>
                  
              
                </tbody>
              </table>
              <hr>
              <h6>Mes produits réservés</h6>
                
              <table id="test" class="table">
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
                
              <table id="test" class="table">
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
                  <?php foreach($allProduitVendu as $produitV){?>
                  <tr>
                    <th scope="row"><?= $produitV['id'];?></th>
                    <td><?= $produitV['nom'];?></td>
                    <td><?= $produitV['prix'];?></td>
                    <td><?= $produitV['marque'];?></td>
                    <td><?= $produitV['reduction'] *100?>%</td>
                    <td></td>
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
<style>
  .col-sm-12{
    overflow-x: scroll;
  }
</style>
  <script>
    $(document).ready(function() {
        $('#test1').DataTable( {
             responsive: true,
            "lengthMenu": [[25, 50, 100, -1], [25, 50,100, "All"]],
            "language": {
                //"url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json",
                 "search": ""
            }
        } );
    });
</script>
  <?php include('./assets/inc/footer.php');?>