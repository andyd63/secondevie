
<?php
var_dump($_SESSION);
require("./vendor/autoload.php");
$totalPanier = totalPrixPanier();
$modeLivraison = $_SESSION['livraison']['choix']; // a faire definir par l'utilisateur
$token = genererChaineAleatoire(50);
//ajoute une commande avec le token vide et le statut à 0
$idPromo = null;
if(isset($_SESSION['codePromo'])){ 
  $idPromo = $_SESSION['codePromo']['idCodePromo'];         
  if($_SESSION['codePromo']['typeCodePromo'] == 0){               
    if($_SESSION['codePromo']['reducPromo'] == 1){
     $prixRemise = 0;
    }else{
      $prixRemise = ($totalPanier['totalAvecRemise'] + $_SESSION['livraison']['prixLivraison']) * (1-$_SESSION['codePromo']['reducPromo']);

    }
  }else{
    $prixRemise =  (($prixRemise = $totalPanier['totalAvecRemise'] + $_SESSION['livraison']['prixLivraison']) - $_SESSION['codePromo']['reducPromo']);
  }
}else{  
  $prixRemise = $totalPanier['totalSansRemise'] + $_SESSION['livraison']['prixLivraison'];
}

ajouter_commande($_SESSION['id'],$prixRemise,$totalPanier['totalSansRemise'] + $_SESSION['livraison']['prixLivraison'],$_SESSION['panier']->getNbCollection(),$modeLivraison,$token,$idPromo);

//if($_POST['prix'] == 0){?>
<script> 
  var token = <?php echo json_encode($token); ?>;
  document.location.href="index.php?c=panier&action=success&id="+token; 
</script>
<?php
/*}
else{
*/
// cle live  
//\Stripe\Stripe::setApiKey('sk_live_I5VhN6csccZpnrc0DflqTIkz');

\Stripe\Stripe::setApiKey('sk_test_WIueQDa130JgDaN7xLw64zb1');
var_dump("https://index.php?c=panier&action=cancel&id=$token");
// Creation d'une session stripe avec vos produits vos prix vos images et urls de retour
$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'name' => 'Commande Deuxiemevie '.$token,
    'description' => 'Commande de vêtement',
    'amount' => $totalPanier['totalAvecRemise']+$_SESSION['livraison']['prixLivraison'] *100,
    'currency' => 'eur',
    'quantity' => 1,
  ]],
  'success_url' => 'index.php?c=panier&action=success&id='.$token,
  'cancel_url' => 'index.php?c=panier&action=cancel&id='.$token,
]);
//}


//Utilisation de la fonction

?>
<html>
  <!-- Redirection vers le checkout SCA 3D SECURE de stripe avec votre $session->id -->
  <script src="https://js.stripe.com/v3/"></script>
  <script>
 // const stripe = Stripe('pk_live_VHHIIT3bAlFIG7zHgtcnVe3S');
  const stripe = Stripe('pk_test_UG722vVnRZdKl2ICz6HWbydi');
  stripe.redirectToCheckout({
    sessionId: '<?php echo $session->id;?>'
  }).then((result) => {
    console.log(result.error.message);
  });
  </script>

</html>