<!--======= FOOTER =========-->
<footer>
    <div class="container"> 
      
      <!-- ABOUT Location -->
      <div class="col-md-3">
      <h6  class="blanc"><?=$configSite->nameSite;?></h5>
        <div class="about-footer">
          <p><i class="icon-pointer"></i> Street No. 12, Newyork 12, <br>
            MD - 123, USA.</p>
          <p><i class="icon-call-end"></i> 1.800.123.456789</p>
          <p><i class="icon-envelope"></i> info@PAVSHOP.com</p>
        </div>
      </div>
      
      <!-- HELPFUL LINKS -->
      <div class="col-md-3">
        <h6>HELPFUL LINKS</h6>
        <ul class="link">
          <li><a href="#."> Products</a></li>
          <li><a href="#."> Find a Store</a></li>
          <li><a href="#."> Features</a></li>
          <li><a href="#."> Privacy Policy</a></li>
          <li><a href="#."> Blog</a></li>
          <li><a href="#."> Press Kit </a></li>
        </ul>
      </div>
      
      <!-- SHOP -->
      <div class="col-md-3">
        <h6>Boutique</h6>
        <ul class="link">
          <li><a href="#.">Adulte</a></li>
          <li><a href="#.">Enfant</a></li>
          <li><a href="#.">Braderie</a></li>
          <li><a href="#.">Ma sélection</a></li>
        </ul>
      </div>
      
      <!-- MY ACCOUNT -->
      <div class="col-md-3">
        <h6>Compte</h6>
        <ul class="link">
          <li><a href="#."> Se connecter</a></li>
          <li><a href="#."> S'inscrire</a></li>
          <li><a href="#."> Mon compte</a></li>
          <li><a href="#."> Mes favoris</a></li>
          <li><a href="#."> Mes commandes</a></li>
        </ul>
      </div>
      
      <!-- Rights -->
      
      <div class="rights">
        <p>©  2017 PAVSHOP All right reserved. </p>
        <div class="scroll"> <a href="#wrap" class="go-up"><i class="lnr lnr-arrow-up"></i></a> </div>
      </div>
    </div>
  </footer>
  
  <!--======= RIGHTS =========--> 
<script>
  $('#incMenuResponsive').click(function(e){ 
    if(($('.collapse').is(":visible") == false)){
      $('.collapse').show();
    }else{
      $('.collapse').hide();
    }
   
  });

  $('.menuP').click(function(e){ 
    if(($('.menuPanier').is(":visible") == false)){
      $('.menuPanier').show();
    }else{
      $('.menuPanier').hide();
    }
   
  });

  $('#viderPanier').click(function(){ 
	url = 'index.php?c=panier&action=viderP';
  messageRetour = "Votre panier est bien vidé!";
  document.getElementById('menuPanierProduit').innerHTML = '';
  document.getElementById('prixTotalMenuPanier').innerHTML = '0';
  document.getElementById('prixTotalMenuPanierPromo').innerHTML = '0';
  
	postAjax('',url,messageRetour,true);
  
  });
</script>
<p id="valeurRetourJs"> </p>
</div>
<script src="js/bootstrap.min.js"></script> 
<script src="js/own-menu.js"></script> 
<script src="js/jquery.lighter.js"></script> 
<script src="js/owl.carousel.min.js"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="rs-plugin/js/jquery.tp.t.min.js"></script> 
<script type="text/javascript" src="rs-plugin/js/jquery.tp.min.js"></script> 
<script src="js/main.js"></script> 
<script src="js/main.js"></script>
</body>
</html>