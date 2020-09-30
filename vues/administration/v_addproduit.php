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
              <?php if(isset($alert)){?>
                  <div class="alert alert-primary" role="alert">
                    <?php echo $alert;?>
                  </div>
                 <?php  }?>
                <h6>Ajouter un produit</h6>
                <?php if(isset($errorSuccess)){?>
                <div class="alert alert-success" role="alert">
                   <?=$errorSuccess;?>
              </div><?php }?>
                <form action="index.php?c=admin&action=addproduitValide" enctype="multipart/form-data" method="post" >
                  <ul class="row">
                    <div class="row">
                      <!-- Name -->
                      <li class="col-md-6">
                        <label>Nom du produit
                          <input type="text" name="nomProduit" value="" placeholder="" required>
                        </label>
                      </li>
                      <li class="col-md-6">
                        <label>Marque
                          <input type="text" name="marqueProduit" value="" placeholder="" required>
                        </label>
                      </li>
                    </div>
                    <div class="row">
                    <!-- Name -->
                    <li class="col-md-6">
                      <label>Prix €
                        <input type="number" name="prixProduit" value="" placeholder="" required>
                      </label>
                    </li>
                    <li class="col-md-6">
                      <label>Réduction
                        <input type="number" name="reducProduit" value="0.00"  step="0.01" placeholder="" required>
                      </label>
                    </li>
                    <!-- Name -->
                    <li class="col-md-6">
                      <label>Etat
                          <select class="form-control" name="etatProduit">
                            <option>Bon état</option>
                            <option>Super état</option>
                            <option>Neuf</option>
                          </select>
                      </label>
                    </li>
                    </div>
                    <!-- Name -->
                    <div class="row">
                    <li class="col-md-6">
                      <label>Taille
                          <select class="form-control" name="tailleProduit">
                          <?php foreach ($allTaille as $taille){
                            echo "<option value=".$taille['idTaille'].">".$taille['nomTaille']."</option>";
                          }?> 
                          </select>
                      </label>
                    </li>
                    
                    <!-- Name -->
                    <li class="col-md-6">
                      <label>Catégorie
                        <select class="form-control" name="categorieProduit">
                          <?php foreach ($allCategorie as $cat){
                            echo "<option value=".$cat['idCategorie'].">".$cat['nomCategorie']."</option>";
                          }?>                      
                        </select>
                      </label>
                    </li>
                  </div>
                    <div class="row">
                      <li class="col-md-6">
                        <label>Genre
                          <select class="form-control" name="genreProduit">
                            <?php  foreach ($allGenre as $genre){
                              echo "<option value=".$genre['idGenre'].">".$genre['libGenre']."</option>";
                            }?>                      
                          </select>
                        </label>
                      </li>
                            
                      <li class="col-md-6">
                        <label>Sous catégorie Enfant 
                          <select class="form-control" name="sousCategorieEnfantProduit">
                            <option value="0">Sans choix</option>
                            <?php foreach ($allSousCategorieEnfant as $sCatEnfant){
                            echo "<option value=".$sCatEnfant['idSousCategorie'].">".$sCatEnfant['nomSousCategorie']."</option>";
                            }?>   
                
                          </select>
                        </label>
                      </li>
                    </div>  
                    <div class="row">      
                      <li class="col-md-6">
                        <label>Sous catégorie Adulte 
                          <select class="form-control" name="sousCategorieAdulteProduit">
                            <option value="0">Sans choix</option>
                            <?php foreach ($allSousCategorieAdulte as $sCatAdulte){
                            echo "<option value=".$sCatAdulte['idSousCategorie'].">".$sCatAdulte['nomSousCategorie']."</option>";
                            }?>   
                          </select>
                        </label>
                      </li>
                      <li class="col-md-6">
                        <label>Description
                          <textarea class="form-control"  name="description" value="" placeholder=""></textarea>
                        </label>
                      </li>
                    </div>     
                    <div class="row">     
                      <!-- Name -->
                      <li class="col-md-6">
                        <label>Image 1
                          <input type="file" name="img1" class="form-control-file" >
                        </label>
                          </li>
                      
                        <li class="col-md-6">
                          <label>Image 2
                            <input type="file" name="image2" class="form-control-file">
                          </label>
                        </li>
                    </div>
                      
                    </div>
                         <!-- LOGIN -->
                    <li class="col-md-12 text-center margin-top-20">
                      <button  id="addprod" class="btn" type="submit" >Ajouter ce produit</button>
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