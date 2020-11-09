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
              <div class="col-md-2 ">
              </div>
              <div class="col-md-8 ">
                <h6>Mot de passe oublié?</h6>
                  <ul class="row">
                    
                    <!-- Name -->
                    <li class="col-md-12">
                      <label>Email
                        <input type="text" id="mail" name="mail" value="" placeholder="">
                      </label>
                    </li>                                      
                         <!-- LOGIN -->
                    <li class="col-md-12 text-center margin-top-20">
                      <button  class="btn" id="btnReinit" type="submit">Réinitialiser le mot de passe</button>
                    </li>
                  </ul>
         
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  
  <script>
    
    $('#btnReinit').click(function(e){ 
      Email = document.getElementById('mail').value;
      param = 'email='+Email
      url= 'index.php?c=profil&action=verifMail&ajx=1&'+param;
      messageRetour = '';
      reponse= postAjax(param,url,messageRetour);
      rep = reponse.responseText;
      rep = jQuery.parseJSON(rep);
      if(rep.success){ // si le mail existe déjà
      }else{
        Swal.fire({
                      icon: 'warning',
                      title: "Désolé, mais aucun compte correspond à cet adresse mail, veuillez créer un compte ou retapez votre mail.",
        });
      }
    });
    </script>
  <?php include('./assets/inc/footer.php');?>