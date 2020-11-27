
<script>
$('.addFavoris').click(function(e){ 
    idProduit =    e.target.id;
    idClient = <?php if(isset($_SESSION['id'])){ echo json_encode($_SESSION['id']); } else{ echo json_encode(0); } ?>;
param = 'idClient='+idClient+"&idProduit="+idProduit;
    url= 'index.php?c=boutique&action=addFavoris';
  messageRetour = '';
postAjax(param,url,messageRetour);

$('#linkAddFavoris'+idProduit).hide();
$('#linkSupprFavoris'+idProduit).show();

});

$('.supprFavoris').click(function(e){ 
    idProduit =    e.target.id;
    idClient = <?php if(isset($_SESSION['id'])){ echo json_encode($_SESSION['id']); } else{ echo json_encode(0); } ?>;
param = 'idClient='+idClient+"&idProduit="+idProduit;
    url= 'index.php?c=boutique&action=supprFavoris';
  messageRetour = '';
postAjax(param,url,messageRetour);

$('#linkAddFavoris'+idProduit).show();
$('#linkSupprFavoris'+idProduit).hide();

});

$('.addPanier').click(function(e){ 
    idProduit =    e.target.id;
    idProduit = idProduit.split('-');
    console.log(idProduit)
    param = 'idProduit='+idProduit[1];
    url= 'index.php?c=panier&action=addPanier';
    messageRetour = '';
    retour =  postAjax(param,url,messageRetour);  // rempli valeurRetourJs
    inverseVisibilite('panierAdd-'+idProduit[1], 'panierSuppr-'+idProduit[1], 'inline-block');
    document.getElementById("nbreProduitPanier").innerText =  parseInt(document.getElementById("nbreProduitPanier").innerText)+1;
   
    UpdatePanierRemplissage(retour.responseText);
});


function UpdatePanierRemplissage(retour)
{
  valeurJs = JSON.parse( retour);

  if(valeurJs.reduction == 0){
  itemPanier = "<h6 id='produitMenu"+idProduit[1]+"' class='media-heading'>"+ valeurJs.nom +"<span class='price' id='prixProduit"+idProduit[1]+"'> "+valeurJs.prix+"€</span>"+"<span style='display:none' id='produitReduction"+idProduit[1] +"' >"+valeurJs.reduction+"</span></h6>";
  }else{
    itemPanier = "<h6 id='produitMenu"+idProduit[1]+"' class='media-heading'>"+ valeurJs.nom +"<span class='price' id='prixProduit"+idProduit[1]+"'> <del>"+valeurJs.prix+"€</del> "+ valeurJs.prix * (1- valeurJs.reduction) +" €</span>"+"<span style='display:none' id='produitReduction"+idProduit[1] +"' >"+valeurJs.reduction+"</span></h6>";
  }
  document.getElementById("menuPanierProduit").innerHTML = document.getElementById("menuPanierProduit").innerHTML + itemPanier
  
  // Change le prix total du panier
  document.getElementById("prixTotalMenuPanier").innerText = parseFloat(parseFloat(document.getElementById("prixTotalMenuPanier").innerText) +   parseFloat(valeurJs.prix)).toFixed(2);

    // Change le prix total du panier avec reduc 
    document.getElementById("prixTotalMenuPanierPromo").innerText =  parseFloat (parseFloat(document.getElementById("prixTotalMenuPanierPromo").innerText) + parseFloat(((valeurJs.prix -(valeurJs.prix * valeurJs.reduction))))).toFixed(2);
 //Le code écrit dans cette fonction ne sera exécuté qu'au bout de 5 secondes)
}

// SUPPRESSION DU PRODUIT 
$('.supprPanier').click(function(e){ 
    idProduit =    e.target.id;
    idProduit = idProduit.split('-');
    param = 'idProduit='+idProduit[1];
    url= 'index.php?c=panier&action=supprPanier';
    messageRetour = '';
    postAjax(param,url,messageRetour);
    inverseVisibilite('panierSuppr-'+idProduit[1], 'panierAdd-'+idProduit[1], 'inline-block');
    document.getElementById("nbreProduitPanier").innerText =  parseInt(document.getElementById("nbreProduitPanier").innerText)-1;

    updateMenuPanier(idProduit[1]);
    
});

// SUPPRESSION DU PRODUIT DANS LA PAGE PANIER
$('.supprPanierproduit').click(function(e){ 
    idProduit =    e.target.id;
    param = 'idProduit='+idProduit;
    url= 'index.php?c=panier&action=supprPanier';
    messageRetour = '';
    postAjax(param,url,messageRetour);
    document.getElementById("nbreProduitPanier").innerText =  parseInt(document.getElementById("nbreProduitPanier").innerText)-1;
    
    updateMenuPanier(idProduit);
});


// Permet de supprimer une ligne du panier dans la page panier
$('.supprPanierLigne').click(function(e){ 
    idProduit =    e.target.id;
    tabPanier =  document.getElementById("tabPanier");
    produit = document.getElementById("produit-panier-"+idProduit);
    tabPanier.removeChild(produit);
});

function updateMenuPanier(idProduit){
   // SUPPRESSION DANS LE MENU PANIER
   tabPanier =  document.getElementById("menuPanierProduit");
    produit = document.getElementById("produitMenu"+idProduit);
    prixProduit = parseFloat(document.getElementById("prixProduit"+idProduit).innerText); 
    produitPrixAvecReduction =  prixProduit - (prixProduit * parseFloat(document.getElementById("produitReduction"+idProduit).innerText));

    // Change le prix total du panier
    document.getElementById("prixTotalMenuPanier").innerText = (parseFloat(document.getElementById("prixTotalMenuPanier").innerText).toFixed(2) - prixProduit);

    // Change le prix total du panier avec reduc 
    document.getElementById("prixTotalMenuPanierPromo").innerText = (parseFloat(document.getElementById("prixTotalMenuPanierPromo").innerText).toFixed(2) - produitPrixAvecReduction);
    tabPanier.removeChild(produit);
}


$('#btnFiltrer').click(function(e){ 
  filter= '';
 
   filterCategorie = categorieFilter();
 
   etatFilter = etatFilter();
   prixFilter = prixFilter();

   action =  $_GET('action');
   if(document.getElementById('nbGenre')){
      filterGenre = genreFilter();
    if(filterGenre != ''){
      filter = filter + '&genre='+filterGenre;
    }
   }

   if(document.getElementById('divProfil')){
      filterProfil = document.getElementById('profil').value;
    if(filterProfil != ''){
      filter = filter + '&profil='+filterProfil;
    }
   }

   if(document.getElementById('nbTaille')){
      filterTaille = tailleFilter();
      if(filterCategorie != ''){
        filter = filter + '&souscategorie='+filterCategorie;
      }
    }

   if(etatFilter != ''){
    filter = filter + '&etat='+etatFilter;
   }
   adresse = 'index.php?c=boutique&action='+ action + filter +'&'+prixFilter ;
   document.location.href = adresse;
   
});

function genreFilter() {
    nbGenre = document.getElementById('nbGenre').innerText; // nbre de genre possible
    genre = '';
   
    for (let index = 1; index <= 100; index++) {
        if($('#genre-'+index).is(":checked")){
          genre += index +',';
        }
    }
    return genre;
}


function categorieFilter() {
    nbCategorie = parseInt(document.getElementById('nbCategorie').innerText)+1; // nbre de genre possible
    categorie = '';
   
    for (let index = 1; index <= 100; index++) {
        if($('#souscategorie-'+index).is(":checked")){
          categorie += index +',';
        }
    }
    return categorie;
}

function tailleFilter() {
    nbtaille = parseInt(document.getElementById('nbTaille').innerText)+1; // nbre de genre possible
    taille = '';
    console.log(nbtaille)
    for (let index = 1; index <= 100; index++) {
      console.log($('#taille-'+index).is(":checked"))
        if($('#taille-'+index).is(":checked")){
          taille += index +',';
          
        }
    }
    return taille;
}

function etatFilter() {
    etat = '';
   
    for (let index = 1; index <= 10; index++) {
        if($('#etat-'+index).is(":checked")){
          etat += index +',';
        }
    }
    return etat;
}


function prixFilter() {
        prix = 'prixMin=' +    $('#prixMinValue').text();
        prix = prix + '&prixMax=' +    $('#prixMaxValue').text();
    return prix;
}

// CHANGE le tri ou ajoute le tri par prix
function changeTri(){
  var ask = '<?php if(isset($_POST['ask'])){echo '&ask='.$_POST['ask'];}else{ echo false;}?>' ;
  var urlcourante = document.location.href;
  var selectElmt = document.getElementById("OrderbyProduit");
  var valeurselectionnee = selectElmt.options[selectElmt.selectedIndex].value;  
  var textselectionne = selectElmt.options[selectElmt.selectedIndex].text; 
  if(urlcourante.indexOf('order=')!= -1){ // si y a déjà un tri
    if(urlcourante.indexOf('order=ASC')!= -1){ // si c'est asc on supprime
      urlcourante = urlcourante.substring(0, urlcourante.length - 10);
    }
    if(urlcourante.indexOf('order=DESC')!= -1){// si c'est DESC on supprime
      urlcourante = urlcourante.substring(0, urlcourante.length - 11);
    }
  }
  urlcourante += ask+'&order='+valeurselectionnee;
  document.location.href= urlcourante;
}



</script>