<?php
require_once ('./classes/collection.php');
require_once ('./classes/produits.php');
require_once ('./classes/configSite.php');
require_once ('./classes/paramSite.php');
//require_once ('./classes/photo.php');
require_once ('./classes/myQuery.php');	
session_start();
	        // Menu MasterPage
	        if (isset($_REQUEST['c']))   {
		       switch ($_REQUEST['c'])      {
				   case 'accueil' : include("./vues/accueil.php"); break;
				   case 'contact' : include("./vues/contact.php"); break;
				   case 'profil' : include("./Controleurs/c_client.php"); break;
				   case 'vendre' : include("./Controleurs/c_vendre.php"); break;
				   case 'calend' : include("./vues/calendrier_vue.php"); break;
				   case 'boutique' : include("./Controleurs/c_boutique.php"); break;
				   case 'panier' : include("./Controleurs/c_panier.php"); break;
				   case 'admin' : include("./Controleurs/c_administration.php"); break;
				   case 'configSite' : include("./Controleurs/c_administrationGlobal.php"); break;
				   case 'connexion' : include("./Controleurs/c_connexion.php"); break;
				   case 'inscription' : include("./Controleurs/c_inscription.php"); break;
					case 'deconnexion' : include("./vues/v_deconnexion.php"); break;
                        
				   default : include("./vues/accueil.php"); break;
		        }
			 }
		     else  {
			include("./vues/accueil.php"); 
		     }
      