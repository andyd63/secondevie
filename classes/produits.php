<?php
class produits
{

	private $id;
    private $prix;
    private $reduction;


	public function __construct($id,$prix,$reduction){ // Création d'un produit 
		$this->id = $id;
		$this->prix = $prix;
		$this->reduction = $reduction;
	}
	
	public function getId(){ return $this->id;} // Permet de retrouver la ref du produit
	public function getPrix(){ return $this->prix;} // Permet de retrouver la ref du produit
	public function getReduction() { return $this->reduction;} // Permet de retrouver le libelle du produit
}