
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
    param = 'idProduit='+idProduit;
    url= 'index.php?c=panier&action=addPanier';
    messageRetour = '';
    postAjax(param,url,messageRetour);
    inverseVisibilite('panierAdd'+idProduit, 'panierSuppr'+idProduit, 'inline-block')
    console.log(voirNbreProduitPanier());
});


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


function voirNbreProduitPanier(){
    url= 'index.php?c=panier&action=nbreProduitPanier';
    messageRetour = '';
    postAjax('',url,messageRetour);
}


</script>