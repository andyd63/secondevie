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
            <a class="btn btnPrecedent" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i> Page Précédente</A><hr>
              <div class="col-md-12 ">
                <h6>Ajouter un code promo</h6>
                <div class="row">
                <!-- Name -->
                <li class="col-md-6">
                  <label>Nom du code 
                    <input type="text" id="nomCodePromo" value="" placeholder="dixPourcent" required>
                  </label>
                        </li>
                        <li class="col-md-6">
                          <label>Type réduction
                            <select class="form-control" id="typePromo">
                              <option value="1">En €</option>
                              <option value="2">En %</option>
                            </select>
                          </label>
                        </li>
                      </div>
                      <div class="row">
                        <li class="col-md-6">
                          <label>Réduction
                            <input type="text" id='reduction' name="reduction" value="" placeholder="" required>
                          </label>
                        </li>
                
                        <li class="col-md-6">
                          <label>Multi?
                            <select class="form-control" id="multi">
                              <option value="0">Non</option>
                              <option value="1">Oui</option>
                            </select>
                          </label>
                      </div>                  
                </div>
                         <!-- LOGIN -->
                    <li class="col-md-12 text-center margin-top-20">
                      <button  id="addpromo" class="btn"  >Ajouter le code</button>
                    </li>
                  
                  </ul>
                  
                </form>
                
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <script>
    $('#addpromo').click(function(e){ 
      var selectElmt = document.getElementById("typePromo");
      var typePromo = selectElmt.options[selectElmt.selectedIndex].value;  

      var selectElmt = document.getElementById("multi");
      var multi = selectElmt.options[selectElmt.selectedIndex].value;  
  
      nomCodePromo = document.getElementById('nomCodePromo').value;
      reduction = document.getElementById('reduction').value;


      param = 'typePromo='+typePromo+'&multi='+multi+'&reduction='+reduction+'&nomCodePromo='+nomCodePromo;
      url= 'index.php?c=admin&action=addCodePromoForm&ajx=1&'+param;
      messageRetour = '';
      reponse= postAjax(param,url,messageRetour);
      rep = reponse.responseText;
      rep = jQuery.parseJSON(rep);
      if(rep.success){ // si le mail existe déjà
          Swal.fire({
                      icon: 'success',
                      title: 'Ce code promo est ajouté!',
        });
      }
    });
  </script>
  <?php include('./assets/inc/footer.php');?>