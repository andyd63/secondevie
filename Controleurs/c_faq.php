<?php
require_once "./modeles/mGlobal/m_faq.php";


$questions = voirAllFaq();
require_once('vues/v_faq.php');


?>