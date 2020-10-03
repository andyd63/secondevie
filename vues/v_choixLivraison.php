

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

  
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="padding-top-30 padding-bottom-30 light-gray-bg shopping-cart small-cart">
      <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          <div class="row"> 
            
            <!-- DISCOUNT CODE -->
            <div class="col-sm-12">
              <h6>Mode de livraison</h6>
              <div class="col-sm-6">
              <form>
                <?= genererError(18);?>
                <div class="textAlignCenter"> 
                <a href='index.php?c=panier&action=payment&choix=1'><btn  class="btn">Continuer</btn></a> 
                </div>
              </form>
              </div>
              <div class="col-sm-6">
              <form>
              <?= genererError(19);?>
                <div class="textAlignCenter"> 
                <btn id='btnChoixRelai'  class="btn">Continuer</btn></a> 
                </div>
              </form>
              </div>
            </div>
            </div>         
    </section>


    <!--======= PAGES INNER =========-->
    <section id="divChoixRelai" style='display:none' class="padding-top-30 padding-bottom-100 light-gray-bg shopping-cart small-cart">
    <hr>
      <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          <div class="row"> 
            
            <!-- DISCOUNT CODE -->
            <div class="col-sm-12">
              <h6>Livraison par colis</h6>
              <div class="col-sm-6">
              <form>
                <div class="prixLivraison">
                    <?= $prixColissimo['prixFraisLivraison'];?>€
                </div>
                <?= genererError(21);?>
                <input class="form-contro formPerso" type="text" id="postalCodeColissimo" placeholder="Code postal, Adresse, Ville" /><hr>
                    <div class="textAlignCenter">
                      <a class="btn " id="colissimoId">
                        Rechercher relai
                      </a>
                    </div>
              </form>
              </div>
              <div class="col-sm-6">
              <form>
                <div class="prixLivraison">
                    <?= $prixRelay['prixFraisLivraison'];?>€
                </div>
              <?= genererError(20);?>
              
                    <input class="form-contro formPerso" type="text" id="postalCodeMondialRelay" placeholder="Code postal, Adresse, Ville" /><hr>
                    <div class="textAlignCenter">
                      <a class="btn " id="mondialRelayId">
                        Rechercher relai
                      </a>
                    </div>
                </div>
              </form>
              </div>
             
              </div>
            </div>
            </div>         
    </section>

    <p id='result' style='display:none'></p>
  
    <?php include('./js/page/boutique.php');?>
  <?php include('./assets/inc/footer.php');?>


  <script type="text/javascript">
      hljs.initHighlightingOnLoad()
    </script>

    <!-- Dependencies -->

    <script type="text/javascript" src="https://embed.sendcloud.sc/spp/1.0.0/api.min.js"></script>
    <!-- Usage -->
    <script type="text/javascript" id="actual-code">
    
        
        postalCodeFieldMondialRelay = document.getElementById('postalCodeMondialRelay'),
        postalCodeFieldColissimo = document.getElementById('postalCodeMondialRelay'),
        advancedButton = document.getElementById('mondialRelayId')



      mondialRelayId.addEventListener('click', function() {
        openServicePointPicker(
          postalCodeFieldMondialRelay.value,
          ['mondial_relay'], //  permet de choisir colissimo ou mondialrelay
        )
      })
      colissimoId.addEventListener('click', function() {
        openServicePointPicker(
          postalCodeFieldColissimo.value,
          ['colissimo'], //  permet de choisir colissimo ou mondialrelay
        )
      })

      function openServicePointPicker(postalCode, carriers) {
        /**
         * @typedef ConfigurationHash
         * @type {object}
         * @property {string} apiKey - required; replace it below with your API key
         * @property {string} country - required; ISO-2 code of the country you want to display the map (i.e.: NL, BE, DE, FR)
         * @property {?string} postalCode  - not required but recommended
         * @property {?string} language  - not required. Defaults to "en-us"
         * @property {?string} carriers - comma-separated list of carriers you can filter service points
         * @property {?string|?number} servicePointId - set a preselected service point to be shown upon displaying the map
         * @property {?string} postNumber - set a pre-defined post number to fill its corresponding field upon displaying the map
         */

        /**
         * @type {ConfigurationHash}
         */
        var config = {
          apiKey: '662a142732634d2cb5d6b815a33b2e62',
          country: 'fr',
          postalCode: postalCode,
          language: 'fr-fr',
          carriers: carriers,
        }

        sendcloud.servicePoints.open(
          /* first arg: config object */
          config,
          /**
           * Second argument handles the selection of a service point. It receives two arguments:
           *
           * @param {object} servicePointObject
           * @param {string} postNumber Used as `to_post_number` field in the Parcel creation API
           */
          function(servicePointObject, postNumber) {
            document.getElementById('result').innerHTML = JSON.stringify(servicePointObject, null, 2)
            setTimeout(envoieBonLivraison, 2000); //On attend 5 secondes avant d'exécuter la fonction
            function envoieBonLivraison()
            {
              rep = $.parseJSON(document.getElementById('result').innerHTML);
              param = '&transporteur='+rep.carrier+'&name='+rep.name+"&street="+rep.street+'&num='+rep.house_number+'&postal='+rep.postal_code+'&city='+rep.city;
              url= 'index.php?c=panier&action=addLivraison'+param;
              messageRetour = '';
              postAjax(param,url,messageRetour);   
              document.location.href = 'index.php?c=panier&action=payment&choix=2';           
            }
          },
          /**
           * third arg: failure callback function
           * this is also called with ["Closed"] when the SPP window is closed.
           */
          function(errors) {
            errors.forEach(function(error) {
              console.log('Failure callback, reason: ' + error)
            })
          }
        )
      }
      $('#btnChoixRelai').click(function(e){ 
        document.getElementById('divChoixRelai').style.display = 'block';
      });
      
    </script>
  