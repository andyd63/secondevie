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
                <h6>Les faq du site</h6>
                <a class="btn btnPrecedent margin-bottom-5" href="index.php?c=configSite&action=addfaq"><i class=""></i>Ajouter une question</A>
                <table id="tableFaq" class="table ">
                  <thead>
                    <tr class="active">
                        <td>Id</td>
                        <td>Partie faq</td>
                        <td>Titre</td>
                        <td>Texte</td>
                        <td></td>     
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  foreach($allFaq as $faq){?>
                  <tr>
                    <th scope="row"><?= $faq['idFaq'];?></th>
                    <td><?= $faq['partieFaq'];?></td>
                    <td><?= $faq['titreFaq'];?></td>
                    <td><?= $faq['textFaq'];?></td>
                    <td><a class="btn" href="index.php?c=configSite&action=faqdetail&id=<?= $faq['idFaq'];?>"><i class="fas fa-pen"></i> Editer</a></td>        
                  </tr> 
                    <?php }?>         
                </tbody>
                </table>
               
              
              <hr>
         
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

      getDataTable('tableFaq');
    
</script>
  <?php include('./assets/inc/footer.php');?>