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
                <h6>Réinitialisation mot de passe</h6>
                  <ul class="row">
                    
                    <!-- Name -->
                    <li class="col-md-12">
                      <label>Mot de passe:
                        <input type="password" id="mdp" name="mdp" value="" placeholder="">
                      </label>
                    </li>
                    <!-- LAST NAME -->
                    <li class="col-md-12">
                      <label>Confirmation du mot de passe
                        <input type="password" id="mdpConfirm" name="mdpconfirm" value="" placeholder="">
                      </label>
                    </li>
                                       
                         <!-- LOGIN -->
                    <li class="col-md-12 text-center margin-top-20">
                      <button  class="btn" id='btnFormChangeMdp' disabled >Changer mot de passe</button>
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
    
$('#mdpConfirm').change(function(e){ 
    mdpConfirm = document.getElementById('mdpConfirm').value;
    mdp= document.getElementById('mdp').value;

    if(mdp != mdpConfirm){ // si ce n'est pas les mêmes
        Swal.fire({
                    icon: 'warning',
                    title: 'Les deux mots de passes ne correspondent pas.',
      });
      document.getElementById('btnFormChangeMdp').disabled = true;
    }else{
      document.getElementById('btnFormChangeMdp').disabled = false;
    }
  });

// Action bouton changer mdp
 $('#btnFormChangeMdp').click(function(e){ 
      token = $_GET('token');
      mdp = document.getElementById('mdp').value;
      param = 'token='+token + "&mdp="+ mdp ;
      url= 'index.php?c=profil&action=modifMdpToken&ajx=1&'+param;
      reponse= postAjax(param,url);
      rep = jQuery.parseJSON(reponse.responseText);
      alertJs(rep.success,rep.msg);
      });



</script>

  <?php include('./assets/inc/footer.php');?>