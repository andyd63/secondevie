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
              <?php if(isset($alert)){?>
                  <div class="alert alert-primary" role="alert">
                    <?php echo $alert;?>
                  </div>
                 <?php  }?>
                <h6>Mes clients</h6>
                <table id="tableCli" class="table ">
                    <thead>
                    <tr class="active">
                        <td>#</td>
                        <td>Nom prénom </td>
                        <td>Mail </td>
                        <td>Tel </td>
                        <td>Adresse</td>
                        <td>Date d'inscription </td>
                        <td>Date de connexion</td>
                        <td>Ses commandes</td>
                    </tr>
                    </thead>
                    <tbody>
                  <?php 
                  foreach($allClient as $client){ ?>
                  <tr>
                    <th scope="row"><?= $client['ID_CLIENTS'];?></th>
                    <th scope="row"><?= $client['PRE_CLIENTS'];?> <?= $client['NOM_CLIENTS'];?></th>
                    <td><?= $client['MAIL_CLIENTS'];?></td>
                    <td><?= $client['TEL_CLIENTS'];?></td>
                    <td><?= $client['ADRESSE'].' , '.$client['CODEPOSTAL'].' '.$client['VILLE'];?></td>
                    <td><?= date('d/m/Y H:i:s', $client['date']);?></td>             
                    <td><?= date('d/m/Y H:i:s', $client['date_connecte']);?></td>    
                    <td><a class="btn" href="index.php?c=admin&action=commandeClient&id=<?= $client['ID_CLIENTS'];?>"><i class="fas fa-search-plus fa-lg"></i> Voir</a></td>        
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