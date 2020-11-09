<?php
require_once "./modeles/m_bdd.php";
require_once "./assets/inc/function.php";
require_once "./modeles/m_clients.php";
require_once "./modeles/m_produit.php";
require_once "./modeles/m_module.php";
$conn = bdd();

if(isset($_GET['action']))  // SI Y A PAS DE PARAMETRE ACTION DANS L URL
{
$action = $_GET['action'];
}
else{
	$action = 'connexion';
}

switch($action){
	case 'connexion':  //Connexion du client
		include('vues/v_connexion.php');
		break;
	
	case 'valide': // Validation du formulaire connexion
		$mdp = md5($_POST['mdp']);
		$nb= userexist($_POST['mail'],$mdp);
		$jour =  date("d"); 
		$mois =  date("m");  
		$annee =  date("Y");  
		$date = mktime(0, 0, 0, $mois,  $jour, $annee);
		if ($nb == 1) 
		{ //  si l'utilisateur existe
			$unclient = getclient($_POST['mail'],$mdp);
			//////////Intègre les infos du clients dans la session
            $_SESSION['id'] = $unclient['ID_CLIENTS'];
			$_SESSION['nom'] = $unclient['NOM_CLIENTS'];
			$_SESSION['prenom'] = $unclient['PRE_CLIENTS'];
			$_SESSION['mail'] = $unclient['MAIL_CLIENTS'];
			$_SESSION['rang'] = $unclient['RANG'];
			$_SESSION['tel'] = $unclient['TEL_CLIENTS'];
			$_SESSION['adresse'] = $unclient['ADRESSE'];
			$_SESSION['cp'] = $unclient['CODEPOSTAL'];
			$_SESSION['ville'] = $unclient['VILLE'];
			$d = maj_co($_SESSION['id']);
			associerProduitAuPanier($_SESSION['id']);	
?>
<SCRIPT LANGUAGE="JavaScript">
document.location.href="index.php?c=acceuil" //redirige vers l'acceuil
</SCRIPT>
<?php			exit;
		}
		else
		{
			$moduleErrorConnexion = voir_module(10);	
		/////////////////////////////////////// MESSAGE EN CAS D'ERREUR D'IDENTIFIANT OU MDP
			$alert= "<div class='alert alert-danger'>".$moduleErrorConnexion['texte_module']."</div>";
			require_once('vues/v_connexion.php');
					break;
			
		}
	  
	break;
	
	case 'reussi': // INSCRIPTION REUSSI
	include('vues/v_inscription_r.php');
	break;
	
	case 'oublie': // INSCRIPTION REUSSI
		require_once('vues/v_mdpOublie.php');
		break;

	case 'oublieEnvoie': // INSCRIPTION REUSSI
    $mail = $_POST['email'];
    $a = oublie_motdepasse($mail);
	?>
	<div class="col-md-9">
	<div class="alert alert-info">
				Nous avons envoyé votre mot de passe par mail, veuillez vérifier si vous ne l'avez pas reçu dans vos spams ! 
					</div>
                          
    </div>
	<?php
	break;
	
	case 'deconnecter': // DECONNEXION CLIENT
		deconnexionclient();
	
	}


?>