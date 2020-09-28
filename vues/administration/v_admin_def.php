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
							
								<div class="metr">	<?php 
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
									<a  class="pointer metrostyle metrostylelarge backBleu" href="index.php?c=configSite&action=accueil">
										<span class="iconeMenuAdmin"><i class="fa fa-cogs"></i></span>
										<span class="textMenuAdmin">Configuration site</span>
									</a>
									<a class="pointer metrostyle backBleuTurquoise"  href="index.php?c=admin&action=addFacture">
										<span class="iconeMenuAdmin"><i class="fas fa-file-alt"></i></span>
										<span class="textMenuAdmin">Créer facture</span>
									</a>
								
								
									
								</div>
								<div class="metr">	
									
									<a class="pointer metrostyle metrostylelarge  backBleu"href="index.php?c=admin&action=module">
										<span  class="iconeMenuAdmin"><i class="fa fa-edit"></i></span>
										<span class="textMenuAdmin">Editer modules</span>
									</a>
								
									<a  class="pointer metrostyle  metrostyle backBleu" href="index.php?c=admin&action=mesClients">
										<span  class="iconeMenuAdmin"><i class="fas fas fa-users"></i></span>
										<span class="textMenuAdmin">Mes clients</span>
									</a>
									
								
								</div>
								
								<div class="metr">   
									<a class="pointer metrostyle backOrange"  href="index.php?c=admin&action=stat">
										<span class="iconeMenuAdmin "><i class="fa fa-chart-area"></i></span>
										<span class="textMenuAdmin">Statistiques </span>
									</a>       
									<a class="pointer metrostyle metrostylelarge  backVert" href="index.php?c=admin&action=commandes">
										<span class="iconeMenuAdmin"><i class="fa fa-eye"></i></span>
										<span style="color:white;font-size: 1.1em;float:right;margin-top:5px;padding-right:0.2em"><?=  $nbCommande ;?></span>   
										<span style="color:white;float:left;margin-top:60px;">Voir les commandes</span>
									</a>
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