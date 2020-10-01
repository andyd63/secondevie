<?php 

///////////////// Connexion à la base de données///////////////////////
require_once('./modeles/m_bdd.php');     
require_once ('./classes/myQuery.php');
require_once ('./classes/templateRest.php');

//////////////// AJOUT d'un client /////////////////////////
function addproduit($nom,$marque,$prix,$etat,$taille,$categorie,$image1,$image2,$description,$sousCategorie,$genre,$reduc){
    $conn = bdd();
 
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'nom','name'=>'nom','value'=>$nom));
    array_push($conditions, array('nameChamps'=>'marque','name'=>'marque','value'=>$marque));
    array_push($conditions, array('nameChamps'=>'prix','name'=>'prix','value'=>$prix));
    array_push($conditions, array('nameChamps'=>'etat','name'=>'etat','value'=>$etat));
    array_push($conditions, array('nameChamps'=>'taille','name'=>'taille','value'=>$taille));
    array_push($conditions, array('nameChamps'=>'categorie','name'=>'categorie','value'=>$categorie));
    array_push($conditions, array('nameChamps'=>'image1','name'=>'image1','value'=>$image1));
    array_push($conditions, array('nameChamps'=>'image2','name'=>'image2','value'=>$image2));
    array_push($conditions, array('nameChamps'=>'description','name'=>'description','value'=>$description));
    array_push($conditions, array('nameChamps'=>'sousCategorie','name'=>'sousCategorie','value'=>$sousCategorie));
    array_push($conditions, array('nameChamps'=>'genre','name'=>'genre','value'=>$genre));
    array_push($conditions, array('nameChamps'=>'reduction','name'=>'reduction','value'=>$reduc));
    $req =  new myQueryClass('produit',$conditions);
	$r = $req->myQueryInsert();
    $conn = null ; //Quitte la connexion

}


//function retrouve le dernier produit 
function voirDernierProduit(){
$order = array();
array_push($order, array('nameChamps'=>'id','sens'=>'desc'));
$req =  new myQueryClass('produit','',$order);
$r = $req->myQuerySelect();
return $r[0] ;
}


//function retrouve le dernier produit 
function voir10DernierProduit($id = ''){
    $order = array();
    $limit = "limit 3";
    if($id == ''){
        $conditions = '';
    }else {
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'id','type'=>'!=','name'=>'id','value'=>$id));
    array_push($conditions, array('nameChamps'=>'etatDuProduit','type'=>'!=','name'=>'id','value'=>'2'));
    }

    array_push($order, array('nameChamps'=>'id','sens'=>'desc'));
    $req =  new myQueryClass('produit',$conditions,$order,'',$limit);
    $r = $req->myQuerySelect();
    return $r;
    }
    
    
function allProduit(){
	$req =  new myQueryClass('produit');
	$r = $req->myQuerySelect();
	return $r;
}


//voir produit selon l'id
function voirProduitById($id){
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'id','type'=>'=','name'=>'id','value'=>$id));
    $req =  new myQueryClass('produit',$conditions);
    $r = $req->myQuerySelect();
    if(count($r)==0){
        $r = false;
    }else{
        $r = $r[0];
    }
	return $r;
}

function allProduitByCategorie($id,$get){
    
    $conditions = array(); 
    array_push($conditions, array('nameChamps'=>'categorie','type'=>'=','name'=>'categorie','value'=>$id));
    array_push($conditions, array('nameChamps'=>'etatDuProduit','type'=>'!=','name'=>'etatDuProduit','value'=>'2'));
    // pour chaque get
    foreach($get as $g => $value){
        $value = explode(",", $value);
        $nb = count($value) -1; // nbre de valeur
        $cp = 0;
        foreach($value as $v){
            if($cp == 0){
                array_push($conditions, array('nameChamps'=> $g,'type'=>'=','name'=>$g.''.$cp ,'value'=>$v));
            }else{
                if($nb != $cp){
                    array_push($conditions, array('nameChamps'=> $g,'type'=>'=','name'=>$g.''.$cp ,'value'=>$v ,'operator'=>'OR'));
                    }else{
                    array_push($conditions, array('nameChamps'=> $g,'type'=>'=','name'=>$g.''.$cp ,'value'=>$v ,'operator'=>'OR' ));
                    }
            }
          
            $cp++;
        }
       
    }
    
    $req =  new myQueryClass('produit',$conditions);
    $r = $req->myQuerySelect();
	return $r;
}

function countProduitByCategorie($idCategorie,$idSousCategorie){
	$conditions = array();
    array_push($conditions, array('nameChamps'=>'sousCategorie','type'=>'=','name'=>'sousCategorie','value'=>$idSousCategorie));
    array_push($conditions, array('nameChamps'=>'categorie','type'=>'=','name'=>'categorie','value'=>$idCategorie));
	$req =  new myQueryClass('produit',$conditions);
	$r = $req->myQuerySelect("count(*) as nbre");
	return $r[0][0];
}


//voir produit selon l'etat 
// 0 : dispo
// 1 : réservé 
// 2 : vendu
function voirProduitParEtat($id){
    $conditions = array();
    array_push($conditions, array('nameChamps'=>'etatDuProduit','type'=>'=','name'=>'etatDuProduit','value'=>$id));
    $req =  new myQueryClass('produit',$conditions);
    $r = $req->myQuerySelect();
	return $r;
}



function changeProduitStatut($idProduit,$valeur,$idClient =NULL)
{
	$conditions = array();
	$values = array();
	array_push($conditions, array('nameChamps'=>'id','type'=>'=','name'=>'id','value'=>$idProduit));
    array_push($values, array('nameChamps'=>'etatDuProduit','name'=>'etatDuProduit','value'=>$valeur));
    array_push($values, array('nameChamps'=>'idClient','name'=>'idClient','value'=>$idClient));
	$req =  new myQueryClass('produit',$conditions,'',$values);
	$r = $req->myQueryUpdate();
	$conn = null ; //Quitte la connexion
}


?>