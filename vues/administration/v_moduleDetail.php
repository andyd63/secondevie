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
                      <input type="text" id="titreModule" name="titreModule" value="<?=$module['titre_module'];?>" placeholder="" required>
                    </li>
                     <!-- TAILLE DE HAUT -->
                    <li class="col-md-6">
                      <label>Type de texte</label>
                        <select class="form-control" id="typeAlert" >
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
                      <textarea class="form-control mytextarea" id='textModule' rows='20' value="<?=$module['texte_module'];?>"><?=$module['texte_module'];?></textarea>
                    </li>
                  </ul>
                  <hr>
                  <ul class="row">
                      <!-- BOUTON S'INSCRIRE -->
                      <li class="col-md-12 textAlignCenter">
                      <button id='btnModuleChange' type="submit" class="btn">Modifier !</button>
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

    tinyMCE.init({
    mode : "textareas",
    theme : "advanced"
    });
    
    $('#btnModuleChange').click(function(e){ 
      var selectElmt = document.getElementById("typeAlert");
      var valeurselectionnee = selectElmt.options[selectElmt.selectedIndex].value;
      id= $_GET('id');
      titreModule = document.getElementById('titreModule').value;

      textarea = tinyMCE.get('textModule'); // on recupère le textarea
      text = encodeURIComponent(textarea.getContent());
      url= 'index.php?id='+id+'&c=configSite&action=UpdateModuleDetail';
      param = "titre="+titreModule+"&text="+text+"&type="+valeurselectionnee;
      reponse = postAjax(param,url);
      rep = jQuery.parseJSON(reponse.responseText);
      alertJs(rep.success,rep.msg);
    });
  });
</script>
  <?php include('./assets/inc/footer.php');?>