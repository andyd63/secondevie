

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

  
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="padding-top-30 padding-bottom-100 pages-in chart-page shopping-cart small-cart cart-ship-info">
      <div class="container"> 
      <div class="row"> 
      <?php if(isset($error)){ echo genererError(16); } ?>
      <div class="col-sm-3"></div>
      <div class="col-sm-6 cart-ship-info">
              <h6>Récapitulatif avant paiement</h6>
              <div class="grand-total">
                <div id='panier'class="order-detail">
                  <?php
                  $totPanierCategories =  totalPrixPanierParCategorie(); 
                  foreach($totPanierCategories as $tot){
                    $cat = categorie($tot['id']);?>
                    <p>Produit <?=$cat['nomCategorie'];?> 
                    <?php if($tot['totalRemise'] == '0' ){ ?><span><?= $tot['totalSansRemise'];?>€</span><?php } else{ ?>
                      <span><del><?= $tot['totalSansRemise'];?>€</del><?= $tot['totalAvecRemise'];?>€</span>
                    <?php } ?>
                  </p>
                  <?php } $fraideport = 0; 
                  if(isset($_SESSION['livraison'])){ $fraideport = $_SESSION['livraison']['prixLivraison']; ?><p> Frais de port: <span><?= $_SESSION['livraison']['prixLivraison'];?>€</span></p> <?php }?>
                  <!-- SUB TOTAL -->
                  <?php $totalPanier = totalPrixPanier();?>
                  <p id="codePromoLib" style='display:none'>Code promo
                    <span id='libPourcentage' style='display:none'>%</span>
                    <span id='libEuro' style='display:none'>€</span>
                    <span id='prixReduc'></span>
                    <span>-</span>
                  </p>
                  <p class="all-total">Total sans réduction: <span>€</span><span id="totalSansReduc"><?= $totalPanier['totalSansRemise'] + $fraideport;?></span></p>
                  <p class="all-total">Total avec réduction: <span>€</span><span id="totalAvecReduc" ><?= $totalPanier['totalAvecRemise'] + $fraideport;?></span></p>
                </div>
              </div>
              <br><hr>
              
              <h6>Vous avez un code de réduction?</h6>
              <form>
                <input id='codePromo' type="text" value="" placeholder="Entrer le code de réduction">
                <a id="btnCodePromo" class="btn btn-small btn-dark">Ok</a>
              </form>
              <div class="coupn-btn textAlignCenter"> 
                <?php if(isConnected()){?>
                <a href="index.php?c=panier&action=payment" class="btn">Paiement</a> 
                <?php }else{?>
                  <a href="connexion.html" class="btn">Connectez-vous!</a>
                <?php }?>
              </div>
            </div>        
        </div>
      </div>
    </section>
    
    <script>
    $('#btnCodePromo').click(function(e){ 
    monCodePromo = document.getElementById('codePromo').value; // champ du code promo
    param = 'codePromo='+ monCodePromo
    adresse = 'index.php?c=panier&action=verifieCodePromo'  ;
    reponse= postAjax(param,adresse);
    rep = reponse.responseText;
    rep = jQuery.parseJSON(rep);
    if(rep.success){ // si le code existe et qu'il fonctionne
  //     alertJs(true, rep.msg);
      if(rep.result.typeCodePromo == '1'){ // en euro
          reduc = parseFloat(rep.result.reducPromo);
          document.getElementById('totalSansReduc').innerText = parseFloat(document.getElementById('totalSansReduc').innerText) - reduc;
          document.getElementById('totalAvecReduc').innerText = parseFloat(document.getElementById('totalAvecReduc').innerText) - reduc;
          document.getElementById('codePromoLib').style.display = 'Block';
          document.getElementById('libEuro').style.display = 'Block';
          document.getElementById('prixReduc').innerText = reduc;

      }else{
          reduc = parseFloat(rep.result.reducPromo);
          sansReduc = parseFloat(document.getElementById('totalSansReduc').innerText) - (parseFloat(document.getElementById('totalSansReduc').innerText) / reduc);
          avecReduc =  parseFloat(document.getElementById('totalSansReduc').innerText) - (parseFloat(document.getElementById('totalAvecReduc').innerText) / reduc);
          document.getElementById('totalSansReduc').innerText = sansReduc.toFixed(2);
          document.getElementById('totalAvecReduc').innerText = avecReduc.toFixed(2);
          document.getElementById('codePromoLib').style.display = 'Block';
          document.getElementById('libPourcentage').style.display = 'Block';
          document.getElementById('prixReduc').innerText = reduc;

      }
      }else{
        alertJs(false, rep.msg);
    }
   
});
</script>
    
    <?php include('./js/page/boutique.php');?>
  <?php include('./assets/inc/footer.php');?>
  