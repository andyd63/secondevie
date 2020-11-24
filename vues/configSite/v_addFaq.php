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
                <h6>Ajouter à la Faq</h6>
                <ul class="row">
                    <li class="col-md-6">
                      <label>Titre</label>
                      <input type="text" id="titreFaq" name="titreFaq" placeholder="" required>
                    </li>                   
                </ul>
                <ul class="row">
                    <li class="col-md-6">
                      <label>Partie faq</label>
                      <input type="text" id="partieFaq" name="partieFaq"  placeholder="" required>
                    </li>                   
                </ul>
                <ul class="row"><br>
                    <li class="col-md-12">
                      <label>Texte</label>
                      <textarea class="form-control mytextarea" id='textFaq' rows='20' value=""></textarea>
                    </li>
                  </ul>
                  <hr>
                  <ul class="row">
                      <!-- BOUTON S'INSCRIRE -->
                      <li class="col-md-12 textAlignCenter">
                      <button id='btnAdd' type="submit" class="btn">Modifier !</button>
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
    
    $('#btnAdd').click(function(e){ 
      titreFaq = document.getElementById('titreFaq').value;
      partieFaq = document.getElementById('partieFaq').value;
      textarea = tinyMCE.get('textFaq'); // on recupère le textarea
      text = encodeURIComponent(textarea.getContent());
      url= 'index.php?&c=configSite&action=addFaqForm';
      param = "titre="+titreFaq+"&text="+text+'&partie='+partieFaq;
      reponse = postAjax(param,url);
      rep = jQuery.parseJSON(reponse.responseText);
      alertJs(rep.success,rep.msg);
    });
  });
</script>
  <?php include('./assets/inc/footer.php');?>