

  <!--- Include Header et menu --->
  <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?>

  

  <!-- Content -->
  <div id="content"> 
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-30 padding-bottom-100 ">
      <div class="container">         
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info S'inscrire">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-12">
                <h6>S'inscrire</h6>
                <?=genererError(15);?>
                <p><span class="rouge">*</span> Obligatoire
                 <form action="index.php?c=inscription&action=valide" method="post">
                  <ul class="row">
                    
                    <!-- Name -->
                    <li class="col-md-6">
                      <label>Prénom <span class="rouge"><span class="rouge">*</span></span>
                        <input type="text" name="prenom" value="" placeholder="" required>
                      </label>
                    
                    </li>
                    <!-- LAST NAME -->
                    <li class="col-md-6">
                      <label>Nom <span class="rouge">*</span>
                        <input type="text" name="nom" value="" placeholder="" required>
                      </label>
                    </li>
                    
                    <!-- EMAIL ADDRESS -->
                    <li class="col-md-6">
                      <label>Email <span class="rouge">*</span>
                        <input type="email" name="email"  id="emailInscription"  placeholder="jean.dupont@example.com" required >
                      </label>
                    </li>
                    <!-- PHONE -->
                    <li class="col-md-6">
                      <label>Téléphone <span class="rouge"><span class="rouge">*</span></span>
                        <input type="tel" name="telephone" maxlength="10" value="" placeholder="" required >
                      </label>
                    </li>
                    
                    <!-- LAST NAME -->
                    <li class="col-md-6">
                      <label>Mot de passe <span class="rouge"><span class="rouge">*</span></span>
                        <input id='mdpSimple' type="password" name="password" value="" placeholder required>
                      </label>
                    </li>
                    
                    <!-- LAST NAME -->
                    <li class="col-md-6">
                      <label>Confirmation du mot de passe <span class="rouge"><span class="rouge">*</span></span>
                        <input id="mdpConfirm" type="password" name="last-name" value="" placeholder="" required>
                      </label>
                    </li>
                    <li class="col-md-6"> 
                      <!-- ADDRESS -->
                      <label>Adresse <span class="rouge"><span class="rouge">*</span></span>
                        <input type="text" name="adresse" value="" placeholder="" required>
                      </label>
                    </li>      
                
                    <!-- TOWN/CITY -->
                    <li class="col-md-6">
                      <label>Ville <span class="rouge"><span class="rouge">*</span></span>
                        <input type="text" name="ville" value="" placeholder="" required>
                      </label>
                    </li>
                    
                    
                    <!-- TOWN/CITY -->
                    <li class="col-md-6">
                      <label>Code postal <span class="rouge"><span class="rouge">*</span></span>
                        <input type="number" name="cp" value="" placeholder="" required>
                      </label>
                    </li>
                    
                    <!-- PHONE -->
                    <li class="col-md-12 textAlignCenter">
                      <button id='btnInscription' type="submit" class="btn">S'inscrire!</button>
                    </li>
                    
                  </ul>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  <script>
    
  $('#emailInscription').change(function(e){ 
    Email = document.getElementById('emailInscription').value;
    param = 'email='+Email
    url= 'index.php?c=profil&action=verifMail&ajx=1&'+param;
    messageRetour = '';
    reponse= postAjax(param,url,messageRetour);
    rep = reponse.responseText;
    rep = jQuery.parseJSON(rep);
    if(rep.success){ // si le mail existe déjà
        Swal.fire({
                    icon: 'warning',
                    title: 'Ce mail est déjà utilisé sur le site, veuillez prendre une autre adresse',
      });
      document.getElementById('btnInscription').disabled = true;
    }else{
      document.getElementById('btnInscription').disabled = false;
    }
  });
  $('#mdpConfirm').change(function(e){ 
    mdpConfirm = document.getElementById('mdpConfirm').value;
    mdp = document.getElementById('mdpSimple').value;
    if(mdp != mdpConfirm){ // si le mail existe déjà
        Swal.fire({
                    icon: 'warning',
                    title: 'Les deux mots de passe ne sont pas identique!',
      });
      document.getElementById('btnInscription').disabled = true;
    }else{
      document.getElementById('btnInscription').disabled = false;
    }
  });
  
  </script>

  <?php include('./assets/inc/footer.php');?>
  