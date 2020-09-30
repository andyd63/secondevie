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
              <?php if(isset($alert)){?>
                  <div class="alert alert-primary" role="alert">
                    <?php echo $alert;?>
                  </div>
                 <?php  }?>
                <h6>Mes Produits</h6>
                <?php if(isset($errorSuccess)){?>
                <div class="alert alert-success" role="alert">
                   <?=$errorSuccess;?>
              </div><?php }?>
                
              <table id="test" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
              </div>
        
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <script>
    $(document).ready(function() {
        $('#test').DataTable( {
            "lengthMenu": [[25, 50, 100, -1], [25, 50,100, "All"]],
            "language": {
                //"url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json",
                 "search": ""
            }
        } );
    });
</script>
  <?php include('./assets/inc/footer.php');?>