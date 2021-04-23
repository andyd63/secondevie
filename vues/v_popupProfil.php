<?php require_once('./assets/inc/header.php');

 require_once('./assets/inc/menu.php');
	require_once "./modeles/m_clients.php";
  require_once('./modeles/m_taille.php');
	require_once('modeles/m_avatar.php');
	require_once('modeles/m_profil.php');
	require_once('modeles/m_avatar.php');
	$mesProfils = mesProfils($_SESSION['id']);
	$number = 0;
	$nbImg = 5;
	$nbProfil = 3;
  
  ?>

  

  <!-- Content -->
  <div id="content"> 
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-30 padding-bottom-100 ">
      <div class="container">         
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info S'inscrire">
            <div class="row"> 
              <!-- ESTIMATE SHIPPING & TAX -->
            
              <div id='foyer' class="col-sm-8 " >
                <?=genererError(30);?>
                <p class="textAlignCenter">
                 <!-- Button trigger modal -->
               
                  <ul class="row">
                    <?php foreach($mesProfils as $profil){
                      $avatar = monAvatar($profil['idAvatar']);
                        if ($number % $nbProfil == 0) { // si c'est une nouvelle ligne ?>
                        </ul>
                        <ul class='row margin-top-10'>
                        <?php } $number++; ?>
                              <!-- Member -->
                    <li id="avatar<?=$profil["idProfil"];?>" class="col-md-4 text-center">
                      <article>   
                        <!-- abatar -->
                        <div class="avatar"> 
                          <img class="img-circle imgAvatar" src="<?=$avatar["lienAvatar"];?>" alt="" > 
                        </div>
                        <!-- Team Detail -->
                        <div class="team-names margin-top-5">
                          <h5><?= $profil['nomProfil'];?></h5>
                          <p>Taille Haut: <?= nomTaille($profil['tailleBasProfil']);?><br>
                          Taille Bas:  <?= nomTaille($profil['tailleHautProfil']);?></p>
                          <a  class="btn btnSmall blanc" href="index.php?c=profil&action=choisiProfil&id=<?= $profil["idProfil"];?>" ><i class="fas fa-angle-right"></i> Choisir</button></a>
                        </div>
                      </article>
                    </li>
              

           
                        <?php } ?>
                  </ul>       
      </div>     


</section>
  <script>
    

    // quand click sur l'avatar
    $('.imgAvatar').click(function(e){ 
    document.getElementById('imgAvatarForm').value = e.target.id;
    for (let index = 0; index < 150; index++) {
      $('.img'+index).removeClass("imgActive");     // supp la bordure
    }
    $('.img'+e.target.id).addClass("imgActive"); // ajoute une bordure autour
    });


</script>

  <?php include('./assets/inc/footer.php');?>
  