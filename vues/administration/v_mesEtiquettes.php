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
              <div class="col-md-12 ">
              <a class="btn btnPrecedent" href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i> Page Précédente</A><hr>
              <?php if(isset($alert)){?>
                  <div class="alert alert-primary" role="alert">
                    <?php echo $alert;?>
                  </div>
                 <?php  }?>
                <h6>Mes etiquettes non traitées</h6>
              <button class="btn marginBottom5" id="traiteCommande">Traiter les commandes</button>
              <table id="commandeNonTraite" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">cp</th>
                    <th scope="col">ville</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tel</th>
                    <th scope="col">nomOption</th>
                    <th scope="col">idCommande</th>
                    <th scope="col">statutEtiquette</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($etiquetteNonTraite as $etiquette){?>
                  <tr>
                    <th scope="row"><?= $etiquette['idEtiquette'];?></th>
                    <td><?= $etiquette['nom'];?></td>
                    <td><?= $etiquette['adresse'];?></td>
                    <td><?= $etiquette['cp'];?></td>
                    <td><?= $etiquette['ville'];?></td>
                    <td><?= $etiquette['pays'];?></td>
                    <td><?= $etiquette['email'];?></td>
                    <td><?= $etiquette['tel'];?></td>
                    <td><?= $etiquette['nomOption'];?></td>
                    <td><?= $etiquette['idCommande'];?></td>
                    <td><?= $etiquette['statutEtiquette'];?></td>
              
                  </tr>
                  <?php }?>
                  
              
                </tbody>
              </table>
              <br>              
              <hr>
              <h6>Commande Traité </h6>
              <table id="commandeTraite" class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Id facture</th>
                    <th scope="col">id client</th>
                    <th scope="col">Num</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">nbre produit</th>
                    <th scope="col">prix commande</th>
                    <th scope="col">Date d'achat</th>
                    <th scope="col">Date colis</th>
                    <th scope="col">heure colis</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($commandeTraite as $comTraite){
                   $cliCommande = informations($comTraite['idClient']); 
                   $cliCommande = $cliCommande[0]; 
                   ?>
                  <tr>
                    <th scope="row"><?= $comTraite['idCommande'];?></th>
                    <td><?= $comTraite['idFacture'];?></td>
                    <td><?= $comTraite['idClient'];?></td>
                    <td><?= $cliCommande['TEL_CLIENTS'];?></td>
                    <td><?= $cliCommande['ADRESSE'].' , '.$cliCommande['CODEPOSTAL'].' '.$cliCommande['VILLE'];?></td>
                    <td><?= $comTraite['nbreProduit'];?></td>
                    <td><?= $comTraite['prixCommande'];?>€</td>          
                    <td><?= date('d/Y H:i:s', $comTraite['date']);?></td>             
                    <td><input type="date" id="<?=$comTraite['idCommande'];?>" class="dateLivraisonChange" name="trip-start"  <?php if($comTraite['dateLivraison'] != null ){ ?> value="<?=$comTraite['dateLivraison'];?>" <?php } ?> ></td>             
                    <td><input type="time" id="<?=$comTraite['idCommande'];?>" class="heureLivraisonChange" min="09:00" max="23:00" required <?php if($comTraite['heureLivraison'] != null ){ ?> value="<?=$comTraite['heureLivraison'];?>" <?php } ?> ></td>             
                  </tr>
                  <?php }?>
                  
              
                </tbody>
              </table>


              <hr>
              <h6>Commande en livraison </h6>
              <table id="commandeEnLivraison" class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Id facture</th>
                    <th scope="col">id client</th>
                    <th scope="col">Num</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">nbre produit</th>
                    <th scope="col">prix commande</th>
                    <th scope="col">Date d'achat</th>
                    <th scope="col">Date colis</th>
                    <th scope="col">heure colis</th>
                    <th scope="col">Ok?</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($commandeEnLivraison as $comEnLiv){
                   $cliCommande = informations($comEnLiv['idClient']); 
                   $cliCommande = $cliCommande[0]; 
                   ?>
                  <tr>
                    <th scope="row"><?= $comEnLiv['idCommande'];?></th>
                    <td><?= $comEnLiv['idFacture'];?></td>
                    <td><?= $comEnLiv['idClient'];?></td>
                    <td><?= $cliCommande['TEL_CLIENTS'];?></td>
                    <td><?= $cliCommande['ADRESSE'].' , '.$cliCommande['CODEPOSTAL'].' '.$cliCommande['VILLE'];?></td>
                    <td><?= $comEnLiv['nbreProduit'];?></td>
                    <td><?= $comEnLiv['prixCommande'];?>€</td>          
                    <td><?= date('d/Y H:i:s', $comEnLiv['date']);?></td>             
                    <td><?=$comEnLiv['dateLivraison'];?></td>             
                    <td><?=$comEnLiv['heureLivraison'];?></td>             
                    <td><input type="date" id="<?=$comEnLiv['idCommande'];?>" class="livraisonOkChange" name="trip-start"  <?php if($comEnLiv['datelivrer'] != null ){ ?> value="<?=$comEnLiv['datelivrer'];?>" <?php } ?> ></td>             
                  </tr>
                  <?php }?>
                  
              
                </tbody>
              </table>
              </div>
        
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
<style>

</style>
  <script>
    $(document).ready(function() {
        $('#commandeNonTraite').DataTable( {
          "scrollX": true,
          dom: 'Bfrtip',
        buttons: [ {
          extend: 'excel',
            text: 'Exporter en excel',
        }],
        "language": {
            "lengthMenu":     "Voir _MENU_ résultats ",
            "zeroRecords":    "Aucun résultat",
            "info":           "Affichage de  _START_ à _END_ sur _TOTAL_ résultats",
            "paginate": {
                "previous": "<",
                "next": ">"
              }
            }
        
           
        } );
    });

    getDataTable('commandeEnLivraison')
    getDataTable('commandeTraite')
    // mettre une date de colie
    $('.dateLivraisonChange').change(function(e){ 
        url= 'index.php?c=admin&action=changeDateLivraison';
        messageRetour = 'Date mis à jour!';
        param = 'id='+e.target.id+"&date="+e.target.value+'&statut=3';;
        postAjax(param,url,messageRetour,true);
      });

      $('.heureLivraisonChange').change(function(e){ 
        url= 'index.php?c=admin&action=changeHeureLivraison';
        messageRetour = 'Heure mis à jour!';  
        param = 'id='+e.target.id+"&date="+e.target.value+'&statut=3';
        postAjax(param,url,messageRetour,true);
      });


      $('.livraisonOkChange').change(function(e){ 
        url= 'index.php?c=admin&action=changeDateLivrer';
        messageRetour = 'Commande mise à jour!';  
        param = 'id='+e.target.id+"&date="+e.target.value+'&statut=4';
        postAjax(param,url,messageRetour,true);
      });




    $('#traiteCommande').click(function(e){ 
      url= 'index.php?c=admin&action=UpdateEtiquettesNonTraite';
      messageRetour = 'Les étiquettes sont désormais en préparation!';
      postAjax('',url,messageRetour,true);

    });
</script>
  <?php include('./assets/inc/footer.php');?>