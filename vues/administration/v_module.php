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
                <h6>Les textes du site</h6>
                <table id="tableCli" class="table ">
                    <thead>
                    <tr class="active">
                        <td>Id</td>
                        <td>Partie module</td>
                        <td>Titre</td>
                        <td>Texte</td>
                        <td>Type d'alerte</td>
                        <td></td>
                       
                    </tr>
                    </thead>
                    <tbody>
                  <?php 
                  foreach($allModule as $module){
                    $alert = voirAlert($module['alert']); // alert selon son id
 
                    ?>
                  <tr>
                    <th scope="row"><?= $module['id_module'];?></th>
                    <td><?= $module['partie_module'];?></td>
                    <td><?= $module['titre_module'];?></td>
                    <td><?= $module['texte_module'];?></td>
                    <td><?= $alert['libAlert'];?></td>
                    <td><a class="btn" href="index.php?c=configSite&action=moduleDetail&id=<?= $module['id_module'];?>"><i class="fas fa-pen"></i> Editer</a></td>        
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

      $('.dateLivraisonChange').change(function(e){ 
        url= 'index.php?c=admin&action=changeDateLivraison';
        messageRetour = 'Date mis à jour!';
        param = 'id='+e.target.id+"&date="+e.target.value;
        postAjax(param,url,messageRetour,true);
      });

      $('.heureLivraisonChange').change(function(e){ 
        url= 'index.php?c=admin&action=changeHeureLivraison';
        messageRetour = 'Heure mis à jour!';
        param = 'id='+e.target.id+"&date="+e.target.value;
        postAjax(param,url,messageRetour,);
      });

      getDataTable('tableCli');
    });

    $('#traiteCommande').click(function(e){ 
      url= 'index.php?c=admin&action=UpdateEtiquettesNonTraite';
      messageRetour = 'Les étiquettes sont désormais en préparation!';
      postAjax('',url,messageRetour,true);

    });
</script>
  <?php include('./assets/inc/footer.php');?>