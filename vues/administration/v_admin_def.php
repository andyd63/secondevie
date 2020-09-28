  <!--- Include Header et menu --->
  <?php include('./assets/inc/header.php');
 	include('./assets/inc/menu.php');?>

  <!-- Content -->
  <div id="content"> 
    
    <!-- New Arrival -->
    <section class="padding-top-30 padding-bottom-30">
      <div class="container"> 
      <div class="heading row">
		<div class="col-md-9">	
					<div class="wrapper" id="page-wrapper">
						<div class="container" id="content" tabindex="-1">
							<div class="row">		
								<div class="metr">	
								<a  class="pointer metrostyle backRouge" href="index.php?c=admin&action=accueil">
									<span class="iconeMenuAdmin"><i class="fas fa-users-cog"></i></span>
									<span class="textMenuAdmin">Accueil Admin</span>
								</a>	
								<?php 
								$cpt = 0;
								foreach($menuAdmin as $menu){
								$box = voirBoxAdmin($menu['idBoxAdmin']);
								$couleur = voirCouleur($menu['idCouleur']);
								?>
								<a  class="pointer <?=$box['typeBox'];?> <?= $couleur['backCouleur'];?>" href="index.php?c=<?=$menu['nomControleur'].'&action='.$menu['nomAction'];?>">
									<span class="iconeMenuAdmin"><i class="fa fas <?= $menu['iconeAdmin'];?>"></i></span>
									<span class="textMenuAdmin"><?= $menu['libMenu'];?></span>
								</a>				
								<?php }?>
											
							
								</div>
							
							</div> 
		</div>
</div>
		</div>
	</div>
</div>
<hr>
      </div>      
</section>
    


<?php   include './assets/inc/footer.php';?>  	