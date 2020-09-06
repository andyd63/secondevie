<?php 


function initConfigSite(){
  return new configSite(createConfigSite('nomSite'),createConfigSite('logoSite'),createConfigSite('telSite'),createConfigSite('emailSite'));
}

/** 
 * Initialisation des paramètres boolean du site
*/
function initParamBoolSite($configSite){
    $configSite->getCollection()->ajouter(new paramSite(createNameSite('encartPromo'),createConfigSite('encartPromo'), actifOrDesactif('encartPromo')));
  //  $configSite->getCollection()->ajouter(new paramSite(createNameSite('fbSite'),createConfigSite('fbSite'), actifOrDesactif('fbSite')));
  //  $configSite->getCollection()->ajouter(new paramSite(createNameSite('instaSite'),createConfigSite('instaSite'), actifOrDesactif('instaSite')));
   // $configSite->getCollection()->ajouter(new paramSite(createNameSite('youtubeSite'),createConfigSite('youtubeSite'), actifOrDesactif('youtubeSite')));
}