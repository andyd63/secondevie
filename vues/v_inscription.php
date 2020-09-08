

  <!--- Include Header et menu --->
  <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?>

  

  <!-- Content -->
  <div id="content"> 
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 ">
      <div class="container">         
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info S'inscrire">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-12">
                <h6>S'inscrire</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. 
                 Sed feugiat, tellus vel tristique posuere, diam</p>
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
                        <input type="email" name="email" value="" placeholder="" required>
                      </label>
                    </li>
                    <!-- PHONE -->
                    <li class="col-md-6">
                      <label>Téléphone <span class="rouge"><span class="rouge">*</span></span>
                        <input type="number" name="telephone" value="" placeholder="" required >
                      </label>
                    </li>
                    
                    <!-- LAST NAME -->
                    <li class="col-md-6">
                      <label>Mot de passe <span class="rouge"><span class="rouge">*</span></span>
                        <input type="password" name="password" value="" placeholder required>
                      </label>
                    </li>
                    
                    <!-- LAST NAME -->
                    <li class="col-md-6">
                      <label>Confirmation du mot de passe <span class="rouge"><span class="rouge">*</span></span>
                        <input type="password" name="last-name" value="" placeholder="" required>
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
                    <li class="col-md-12">
                      <button type="submit" class="btn">S'inscrire!</button>
                    </li>
                  </ul>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    


  <?php include('./assets/inc/footer.php');?>
  