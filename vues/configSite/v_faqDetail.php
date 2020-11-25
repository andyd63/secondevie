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
                <h6>Editer Faq</h6>
                <ul class="row">
                    <li class="col-md-6">
                      <label>Titre</label>
                      <input type="text" id="titreFaq" name="titreFaq" value="<?=$faq['titreFaq'];?>" placeholder="" required>
                    </li>                   
                </ul>
                <ul class="row"><br>
                    <li class="col-md-12">
                      <label>Texte</label>
                      <textarea class="form-control mytextarea" id='textFaq' rows='20' value=""><?=$faq['textFaq'];?></textarea>
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
      id= $_GET('id');
      titreFaq = document.getElementById('titreFaq').value;

      textarea = tinyMCE.get('textFaq'); // on recupère le textarea
      text = encodeURIComponent(textarea.getContent());
      url= 'index.php?id='+id+'&c=configSite&action=UpdateFaqDetail';
      param = "titre="+titreFaq+"&text="+text;
      reponse = postAjax(param,url);
      rep = jQuery.parseJSON(reponse.responseText);
      alertJs(rep.success,rep.msg);
    });
  });
</script>
  <?php include('./assets/inc/footer.php');?>