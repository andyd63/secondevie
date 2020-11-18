

 <!--- Include Header et menu --->
 <?php include('./assets/inc/header.php');?>
  <?php include('./assets/inc/menu.php');?> 

  
  <!-- Content -->
  <div id="content"> 
    
   
    <!--======= PAGES INNER =========-->
    <section class="padding-top-100 padding-bottom-100  shopping-cart small-cart">
      <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          <div class="row"> 
            
            <!-- DISCOUNT CODE -->
            <div class="col-sm-12">
              <h6>La foire aux question</h6>
              <div class="grand-total">
                <div class="cart-ship-info margin-top-30">
                  <h6 class="cursor shop-tittle margin-bottom-30"  onclick="changeVisibilite('tabAdulte','spanTabAdulte')">
                  <span class="cursor" id="spanTabAdulte" ><i  class="fas fa-angle-up"></i></span> Tableau d'estimation prix d'achat adulte</h5>
                  <div>
                    <p> <br></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

    
    </section>
   
   
    <?php
   // Fichier de configuration pour l'interface PHP
   //  de notre annuaire LDAP
   $server = "192.168.2.4";

   $port = "389";

   $racine = "o=commentcamarche, c=fr";

   $rootdn = "cn=administrateur, o=commentcamarche, c=fr";

   $rootpw = "H25jU:;T";

echo "Connexion...<br>";

$ds=ldap_connect($server);
var_dump($ds);
if ($ds==1)
  {
  // on s'authentifie en tant que super-utilisateur, ici, ldap_admin
  $r=ldap_bind($ds,$rootdn,$rootpw);

 // Ici les opérations à effectuer
 echo "Déconnexion...<br>";

 ldap_close($ds);

  }
else {
 echo  "Impossible de se connecter au serveur LDAP";

  }
?>

    <?php include('./js/page/boutique.php');?>
  <?php include('./assets/inc/footer.php');?>
  