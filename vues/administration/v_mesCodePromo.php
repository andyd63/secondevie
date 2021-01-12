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
              <a class="btn btnPrecedent" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i> Page Précédente</A><hr>
                <h6>Mes codePromos</h6>
                <table id="tableCli" class="table ">
                    <thead>
                    <tr class="active">
                        <td>#</td>
                        <td>Nom</td>
                        <td>Réduction </td>
                        <td>Type </td>
                        <td>Utilisable plusieurs fois?</td>
                        <td>Actif</td>
                        <td>Nombre d'utilisation</td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                  <?php 
                  foreach($allCodePromo as $promo){ ?>
                  <tr>
                    <th scope="row"><?= $promo['idCodePromo'];?></th>
                    <th scope="row"><?= $promo['nomCodePromo'];?></th>
                    <td><?= $promo['reducPromo'];?></td>
                    <td><?php if($promo['typeCodePromo']== 1){ echo 'En €';}else { echo 'En %';};?></td>
                    <td><?= ouiOuNon($promo['multi']);?></td>
                    <td><?= ouiOuNon($promo['actif']);?></td>             
                    <td><?= $promo['nbreUtilisation'];?></td>    
                    <td></td>        
                    <td></td>        
                  </tr> 
                    <?php }?>
                  
              
                </tbody>
                </table>
               
              
              <hr>
         
              </div>
        
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  
<style>

</style>
  <script>
   
    $(document).ready(function() {

      getDataTable('tableCli');
    });

   
</script>
  <?php include('./assets/inc/footer.php');?>