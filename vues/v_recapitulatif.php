

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
                  <?php $totalPanier = totalPrixPanier();
                  $prixMini = $totalPanier['totalAvecRemise'];
                  $prixRemise = $totalPanier['totalAvecRemise'] + $fraideport;
                  if(isset($_SESSION['codePromo'])){          
                    if($_SESSION['codePromo']['typeCodePromo'] == 0){               
                      if($_SESSION['codePromo']['reducPromo'] == 1){
                       $prixRemise = 0;
                      }else{
                        $prixRemise =  (($prixRemise = $totalPanier['totalAvecRemise'] + $fraideport) * ($_SESSION['codePromo']['reducPromo']));
    
                      }
                    }else{
                      $prixRemise =  (($prixRemise = $totalPanier['totalAvecRemise'] + $fraideport) - $_SESSION['codePromo']['reducPromo']);
                    }
                  }else{
                    $prixRemise = $totalPanier['totalSansRemise'] + $fraideport;
                  }
                  ?>
                  <p id="codePromoLib" style='display:none'>Code promo
                    <span id='libPourcentage' style='display:none'>%</span>
                    <span id='libEuro' style='display:none'>€</span>
                    <span id='prixReduc'></span>
                    <span>-</span>
                  </p>
                  <p class="all-total">Total sans réduction: <span>€</span><span id="totalSansReduc"><?= $totalPanier['totalSansRemise'] + $fraideport;?></span></p>
                  <p class="all-total">Total avec réduction: <span>€</span><span id="totalAvecReduc" ><?= $prixRemise;?></span></p>
                </div>
              </div>
              <br><hr>
              <h6>Vous avez un code de réduction?</h6>
              <form class="textAlignCenter">
              <?php if(!isset($_SESSION['codePromo'])){?>
                <input id='codePromo' type="text" value="" placeholder="Entrer le code de réduction">        
                <a id="btnCodePromo" class="btn btn-small btn-dark">Ok</a> 
                <p id='textCodePromo'></p>
                <a id="btnCodePromoSup" style='display:none'  href="index.php?c=panier&action=supCodePromo" class="btn btn-small btn-dark">Supprimer</button> 
                <?php } else{?>
                <p id='textCodePromo'>Code promo : <?=$_SESSION['codePromo']['nomCodePromo'];?></p>
                <a id="btnCodePromoSup"  href="index.php?c=panier&action=supCodePromo" class="btn btn-small btn-dark">Supprimer</button> 
                <?php }?>
              </form>
              
              
              <div class="coupn-btn textAlignCenter"> 
                <?php if(isConnected()){
                  if($prixMini>0){?>
                  <a href="index.php?c=panier&action=payment" class="btn">Paiement</a> <?php
                  }else{?>
                    <a class="btn">Vous n'avez aucun produit!</a>
                 <?php }
                ?>
                
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
      alertJs(true, rep.msg);
      if(rep.result.typeCodePromo == '1'){ // en euro
          reduc = parseFloat(rep.result.reducPromo);
          document.getElementById('totalAvecReduc').innerText = parseFloat(document.getElementById('totalAvecReduc').innerText) - reduc;
          document.getElementById('codePromoLib').style.display = 'Block';
          document.getElementById('libEuro').style.display = 'Block';
          document.getElementById('btnCodePromoSup').style.display = 'Block';
          document.getElementById('prixReduc').innerText = reduc;
          document.getElementById('textCodePromo').innerText = 'Code promo: '+monCodePromo;
          document.getElementById('btnCodePromo').style.display = 'none';
          document.getElementById('codePromo').style.display = 'none';
      }else{
          reduc = parseFloat(rep.result.reducPromo);
          if(reduc !=1){
            console.log(parseFloat(document.getElementById('totalSansReduc').innerText));
            console.log(reduc +1);
            avecReduc =  parseFloat(document.getElementById('totalSansReduc').innerText) - (parseFloat(document.getElementById('totalSansReduc').innerText) * ( reduc));
          }else{
            avecReduc =  parseFloat(document.getElementById('totalSansReduc').innerText) - (parseFloat(document.getElementById('totalAvecReduc').innerText) );
          }
          document.getElementById('totalAvecReduc').innerText = avecReduc.toFixed(2);
          document.getElementById('codePromoLib').style.display = 'Block';
            reduc = reduc *100 ;
         
          document.getElementById('libPourcentage').style.display = 'Block';
          document.getElementById('btnCodePromoSup').style.display = 'Block';
          document.getElementById('btnCodePromo').style.display = 'none';
          document.getElementById('codePromo').style.display = 'none';
          document.getElementById('prixReduc').innerText = reduc;
          document.getElementById('textCodePromo').innerText = 'Code promo: '+monCodePromo;

      }
      }else{
        alertJs(false, rep.msg);
    }
   
});
</script>
    
    <?php include('./js/page/boutique.php');?>
  <?php include('./assets/inc/footer.php');?>
  