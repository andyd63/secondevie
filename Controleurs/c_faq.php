<?php
require_once "./modeles/mGlobal/m_faq.php";
require_once "./assets/inc/function.php";

// S'il est connecté et qu'il n'a pas de profil
if(isConnected()){
    if(!isConnectedandProfil()){
        include("./vues/v_popupProfil.php");
      exit;}}

$questions = voirAllFaq();
require_once('vues/v_faq.php');


?>