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
                <h6>Editer texte</h6>
                <ul class="row">
                     <!-- TAILLE DE HAUT -->
                    <li class="col-md-6">
                      <label>Titre</label>
                      <input type="text" name="titreModule" value="<?=$module['titre_module'];?>" placeholder="" required>
                    </li>
                     <!-- TAILLE DE HAUT -->
                    <li class="col-md-6">
                      <label>Type de texte</label>
                        <select class="form-control" name="tailleHClient">
                            <?php foreach ($lesAlerts as $alert){
                              var_dump($module['alert']);
                              if($alert['idAlert'] == $module['alert']){ $selected = 'selected';}else { $selected = '';}
                              echo "<option value='".$alert['idAlert']."'".$selected.">".$alert['libAlert']."</option>";
                            }?> 
                        </select>
                    </li>
                </ul>
                <ul class="row"><br>
                     <!-- TAILLE DE BAS -->
                    <li class="col-md-12">
                      <label>Texte</label>
                      <?php var_dump($module);?>
                      <textarea class="form-control" value="<?=$module['texte_module'];?>"><?=$module['texte_module'];?></textarea>
                    </li>
                  </ul>
                  <hr>
                  <ul class="row">
                      <!-- BOUTON S'INSCRIRE -->
                      <li class="col-md-12 textAlignCenter">
                      <button id='btnInscription' type="submit" class="btn">Modifier !</button>
                    </li>
                  </ul>
               
              
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