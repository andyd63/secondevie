
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
    postAjax(param,url,messageRetour);  // rempli valeurRetourJs
    inverseVisibilite('panierAdd-'+idProduit[1], 'panierSuppr-'+idProduit[1], 'inline-block');
    document.getElementById("nbreProduitPanier").innerText =  parseInt(document.getElementById("nbreProduitPanier").innerText)+1;
   
    setTimeout(UpdatePanierRemplissage, 500); 
});


function UpdatePanierRemplissage()
{
  valeurJs = JSON.parse( document.getElementById("valeurRetourJs").innerHTML);

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
   filterGenre = genreFilter();

   action =  $_GET('action');
   if(filterGenre != ''){
     filterGenre = '&genre='+filterGenre;
   }
   adresse = 'index.php?c=boutique&action='+ action + filterGenre;
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





</script>