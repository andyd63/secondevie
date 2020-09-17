
<script>
$('.addFavoris').click(function(e){ 
    idProduit =    e.target.id;
    idClient = <?php echo json_encode($_SESSION['id']); ?>;
param = 'idClient='+idClient+"&idProduit="+idProduit;
    url= 'index.php?c=boutique&action=addFavoris';
  messageRetour = '';
postAjax(param,url,messageRetour);

$('#linkAddFavoris'+idProduit).hide();
$('#linkSupprFavoris'+idProduit).show();

});

$('.supprFavoris').click(function(e){ 
    idProduit =    e.target.id;
    idClient = <?php echo json_encode($_SESSION['id']); ?>;
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

});




</script>