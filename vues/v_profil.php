

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
              <div class="col-sm-4 ">
              <h5 class="textAlignCenter border-bottom-1 margin-bottom-30 padding-bottom-10">Menu</h5>
              <h5 class="cursor shop-tittle margin-bottom-30">Mes informations <span class="cursor" id="spanGenre" ></span></h5>
              <h5 class="cursor shop-tittle margin-bottom-30" onclick="changeVisibilite('divGenre','spanGenre')">Changer mon mot de passe <span class="cursor" id="spanGenre" ></span></h5>
              <h5 class="cursor shop-tittle margin-bottom-30" onclick="changeVisibilite('divGenre','spanGenre')">Changer ma taille <span class="cursor" id="spanGenre" ></span></h5>
              </div>
              <!-- ESTIMATE SHIPPING & TAX -->
              <div id="divGeneral" class="col-sm-8">
                <?=genererError(22);?>
                <p>

                  <ul class="row">
                    
                    <!-- Name -->
                    <li class="col-md-6">
                      <label>Prénom
                        <input type="text" name="prenom" class='not-allowed' value="<?=$cli->PRE_CLIENTS;?>"  disabled>
                      </label>
                    
                    </li>
                    <!-- LAST NAME -->
                    <li class="col-md-6">
                      <label>Nom
                        <input type="text" name="nom" class='not-allowed' value="<?=$cli->NOM_CLIENTS;?>" disabled>
                      </label>
                    </li>
                    
                    <!-- EMAIL ADDRESS -->
                    <li class="col-md-6">
                      <label>Email
                        <input type="email" name="email"  id="email" class='not-allowed'  value="<?=$cli->MAIL_CLIENTS;?>" disabled >
                      </label>
                    </li>
                    <!-- PHONE -->
                    <li class="col-md-6">
                      <label>Téléphone 
                        <input type="tel" name="telephone" id='tel' maxlength="10" value="<?=$cli->TEL_CLIENTS;?>" placeholder="" required >
                      </label>
                    </li>
                    <li class="col-md-6"> 
                      <!-- ADDRESS -->
                      <label>Adresse <span class="rouge"><span class="rouge">*</span></span>
                        <input type="text" name="adresse" id='adr' value="<?=$cli->ADRESSE;?>" placeholder="" required>
                      </label>
                    </li>      
                
                    <!-- TOWN/CITY -->
                    <li class="col-md-6">
                      <label>Ville <span class="rouge"><span class="rouge">*</span></span>
                        <input type="text" name="ville" id='ville' value="<?=$cli->VILLE;?>" placeholder="" required>
                      </label>
                    </li>
                    
                    
                    <!-- TOWN/CITY -->
                    <li class="col-md-6">
                      <label>Code postal <span class="rouge"><span class="rouge">*</span></span>
                        <input type="number" name="cp"  id='cp' value="<?=$cli->CODEPOSTAL;?>" placeholder="" required>
                      </label>
                    </li>
                    
                    <!-- PHONE -->
                    <li class="col-md-12 textAlignCenter">
                      <button id='btnModifyGeneral' class="btn">Modifier</button>
                    </li>
                    
                  </ul>
              <div >
                <?=genererError(22);?>
                <p>
                  <ul class="row">
                              <!-- Member -->
                    <li class="col-md-4 text-center">
                      <article> 
                        <!-- abatar -->
                        <div class="avatar"> <img class="img-circle" src="./assets/img/general/profil/enfant1.png" alt="" > 
                          <!-- Team hover -->
                        </div>
                        <!-- Team Detail -->
                        <div class="team-names margin-top-5">
                          <h5>jennifer rod</h5>
                          <p>Taille Haut:<br>
                          Taille Bas:</p>
                        </div>
                      </article>
                    </li>
                    <li class="col-md-4 text-center">
                      <article> 
                        <!-- abatar -->
                        <div class="avatar"> <img class="img-circle" src="./assets/img/general/profil/enfant1.png" alt="" > 
                          <!-- Team hover -->
                        </div>
                        <!-- Team Detail -->
                        <div class="team-names margin-top-5">
                          <h5>jennifer rod</h5>
                          <p>Taille Haut:<br>
                          Taille Bas:</p>
                        </div>
                      </article>
                    </li>
                    <li class="col-md-4 text-center">
                      <article> 
                        <!-- abatar -->
                        <div class="avatar"> <img class="img-circle" src="./assets/img/general/profil/enfant1.png" alt="" > 
                          <!-- Team hover -->
                        </div>
                        <!-- Team Detail -->
                        <div class="team-names margin-top-5">
                          <h5>jennifer rod</h5>
                          <p>Taille Haut:<br>
                          Taille Bas:</p>
                        </div>
                      </article>
                    </li>
                </ul>
                  <ul class="row">
                              <!-- Member -->
                    <li class="col-md-4 text-center">
                      <article> 
                        <!-- abatar -->
                        <div class="avatar"> <img class="img-circle" src="./assets/img/general/profil/enfant1.png" alt="" > 
                          <!-- Team hover -->
                        </div>
                        <!-- Team Detail -->
                        <div class="team-names margin-top-5">
                          <h5>jennifer rod</h5>
                          <p>Taille Haut:<br>
                          Taille Bas:</p>
                        </div>
                      </article>
                    </li>
                    <li class="col-md-4 text-center">
                      <article> 
                        <!-- abatar -->
                        <div class="avatar"> <img class="img-circle" src="./assets/img/general/profil/enfant1.png" alt="" > 
                          <!-- Team hover -->
                        </div>
                        <!-- Team Detail -->
                        <div class="team-names margin-top-5">
                          <h5>jennifer rod</h5>
                          <p>Taille Haut:<br>
                          Taille Bas:</p>
                        </div>
                      </article>
                    </li>
                    <li class="col-md-4 text-center">
                      <article> 
                        <!-- abatar -->
                        <div class="avatar"> <img class="img-circle" src="./assets/img/general/profil/enfant1.png" alt="" > 
                          <!-- Team hover -->
                        </div>
                        <!-- Team Detail -->
                        <div class="team-names margin-top-5">
                          <h5>jennifer rod</h5>
                          <p>Taille Haut:<br>
                          Taille Bas:</p>
                        </div>
                      </article>
                    </li>
                </ul>
      </div>
    </section>
    
                    <!-- Name -->
                    <li class="col-md-6">
                      <label>Prénom
                        <input type="text" name="prenom" class='not-allowed' value="<?=$cli->PRE_CLIENTS;?>"  disabled>
                      </label>
                    
                    </li>
                    <!-- LAST NAME -->
                    <li class="col-md-6">
                      <label>Nom
                        <input type="text" name="nom" class='not-allowed' value="<?=$cli->NOM_CLIENTS;?>" disabled>
                      </label>
                    </li>
                    
                    <!-- EMAIL ADDRESS -->
                    <li class="col-md-6">
                      <label>Email
                        <input type="email" name="email"  id="email" class='not-allowed'  value="<?=$cli->MAIL_CLIENTS;?>" disabled >
                      </label>
                    </li>
                    <!-- PHONE -->
                    <li class="col-md-6">
                      <label>Téléphone 
                        <input type="tel" name="telephone" id='tel' maxlength="10" value="<?=$cli->TEL_CLIENTS;?>" placeholder="" required >
                      </label>
                    </li>
                    <li class="col-md-6"> 
                      <!-- ADDRESS -->
                      <label>Adresse <span class="rouge"><span class="rouge">*</span></span>
                        <input type="text" name="adresse" id='adr' value="<?=$cli->ADRESSE;?>" placeholder="" required>
                      </label>
                    </li>      
                
                    <!-- TOWN/CITY -->
                    <li class="col-md-6">
                      <label>Ville <span class="rouge"><span class="rouge">*</span></span>
                        <input type="text" name="ville" id='ville' value="<?=$cli->VILLE;?>" placeholder="" required>
                      </label>
                    </li>
                    
                    
                    <!-- TOWN/CITY -->
                    <li class="col-md-6">
                      <label>Code postal <span class="rouge"><span class="rouge">*</span></span>
                        <input type="number" name="cp"  id='cp' value="<?=$cli->CODEPOSTAL;?>" placeholder="" required>
                      </label>
                    </li>
                    
                    <!-- PHONE -->
                    <li class="col-md-12 textAlignCenter">
                      <button id='btnModifyGeneral' class="btn">Modifier</button>
                    </li>
                    
                  </ul>

              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  <script>
    
  $('#btnModifyGeneral').click(function(e){ 
    Email = document.getElementById('email').value;
    tel = document.getElementById('tel').value;
    ville = document.getElementById('ville').value;
    adr = document.getElementById('adr').value;
    cp = document.getElementById('cp').value;
    param = 'email='+Email+'&telephone='+tel+'&ville='+ville+'&adresse='+adr+'&cp='+cp;
    url= 'index.php?c=profil&action=modif&ajx=1&'+param;
    messageRetour = '';
    reponse= postAjax(param,url,messageRetour);
    rep = reponse.responseText;
    rep = jQuery.parseJSON(rep);
    alertJs(rep.success,rep.msg);
  });
  
  </script>

  <?php include('./assets/inc/footer.php');?>
  