<?php
	function bdd()
{
	try {
	 $bdd = new PDO('mysql:host=localhost; dbname=secondevie', 'root', '');  //local
	// $bdd = new PDO('mysql:host=db748439476.db.1and1.com; dbname=db748439476', 'dbo748439476', 'jeremycizel'); //  Connexion sur serveur
	$bdd->exec("SET CHARACTER SET utf8");
       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
	return $bdd;
}


?>		