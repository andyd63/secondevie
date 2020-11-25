<?php
	function bdd()
{
	try {
	 $bdd = new PDO('mysql:host=localhost; dbname=secondevie', 'root', '');  //local
	 //$bdd = new PDO('mysql:host=db5001226369.hosting-data.io; dbname=dbs1048603', 'dbu824256', 'Zklskoduj8Zkoejeejd*'); //  Connexion sur serveur
	$bdd->exec("SET CHARACTER SET utf8");
       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
	return $bdd;
}


?>		