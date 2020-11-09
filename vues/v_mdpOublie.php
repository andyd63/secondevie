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
                
                <form action="index.php?c=connexion&action=valide" method="post">
                  <ul class="row">
                    
                    <!-- Name -->
                    <li class="col-md-12">
                      <label>Email
                        <input type="text" name="mail" value="" placeholder="">
                      </label>
                    </li>                                      
                         <!-- LOGIN -->
                    <li class="col-md-12 text-center margin-top-20">
                      <button  class="btn"type="submit">Réinitialiser le mot de passe</button>
                    </li>
                    
                   
                  </ul>
                  
                </form>
                
              </div>
              
              <!-- SUB TOTAL -->
                <!--
                <div class="col-sm-5">
                <h6>LOGIN WITH</h6>
                
                <ul class="login-with">
                	<li>
                    	<a href="#."><i class="fa fa-facebook"></i>FACEBOOK</a>
                    
                    </li>
                    
                    <li>
                    	<a href="#."><i class="fa fa-google"></i>GOOGLE</a>
                    
                    </li>
                    
                    <li>
                    	<a href="#."><i class="fa fa-twitter"></i>TWITTER</a>
                    
                    </li>
                
                </ul>
              
                
              </div>
            -->
            </div>
          </div>
        </div>
      </div>
    </section>
    


  </div>
  <?php include('./assets/inc/footer.php');?>