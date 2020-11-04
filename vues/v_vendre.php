

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

  
  <!-- Content -->
  <div id="content"> 
    
   
    <!--======= PAGES INNER =========-->
    <section class="padding-top-100 padding-bottom-100 light-gray-bg shopping-cart small-cart">
      <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          <div class="row"> 
            
            <!-- DISCOUNT CODE -->
            <div class="col-sm-7">
              <h6>Les conditions de notre rachat</h6>
              <div class="grand-total">
                <p>Nous acceptons tout type de vêtement, notre priorité c'est de vous débarrasser! Notre seul condition à cela,
                c'est des vêtements en bonne état!</p>
                <p>Pour faciliter le rendez-vous et vous prendre un minimum de temps on vous demande de préparer les vêtements que
                  vous souhaitez donner.</p>
                <p> Toujours intéressez? Alors prenez un rendez vous !</p>
              </div>
            </div>
            
            <!-- SUB TOTAL -->
            <div class="col-sm-5">
              <h6>étape de la vente</h6>
              <div class="grand-total">
                <div class="order-detail">
                  <p class="textEnGras"> 1: Créer un compte </p>
                  <p class="textEnGras"> 2: Regarder notre tableau d'estimation</p>
                  <p class="textEnGras"> 3: Regarder le type de vêtement qu'on récupère</p>
                  <p class="textEnGras"> 4: prendre un rendez-vous!</p>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
 
    <section class="padding-top-30 padding-bottom-100 light-gray-bg shopping-cart small-cart">
      <div class="container">
        <!-- Onglet reservation -->
        <div class="cart-ship-info margin-top-0">
          <div class="row">  
            <div class="col-sm-12">
              <h6>Prendre un rendez-vous</h6>
              <p>Attention, dans le formulaire mettez le même prénom et nom que sur votre compte!</p>
              <?php if(isConnected()){?>
              <iframe id="inlineFrameExample"
              title="Inline Frame Example"
              width="100%"
              height="500"
              src="https://book.timify.com?accountId=5f79af722a525611ebc4091e&fullscreen=1&hideCloseButton=1&locale=fr-fr">
              </iframe>
            </div>
             <?php }else{?>
              <p>Pour voir le formulaire de rendez-vous, il faut avoir un compte et être connecté.</p>
              <div class="coupn-btn "> 
                <a href="index.php?c=inscription" class="btn">Inscrivez-vous!</a>
                <a href="index.php?c=connexion" class="btn">Connectez-vous!</a>
              </div>
          </div>
          <?php }?>
        </div>
    </section>
  


    <?php include('./js/page/boutique.php');?>
  <?php include('./assets/inc/footer.php');?>
  