<?php
class produits
{

	private $id;
	private $nom ;
    private $prix;
	private $reduction;
	private $image;
	private $description;


	public function __construct($id,$nom,$prix,$reduction,$image,$description){ // Création d'un produit 
		$this->id = $id;
		$this->nom = $nom;
		$this->prix = $prix;
		$this->reduction = $reduction;
		$this->image = $image;
		$this->description = $description;
	}
	
	public function getId(){ return $this->id;} // Permet de retrouver la ref du produit
	public function getNom(){ return $this->nom;} // Permet de retrouver le nom du produit
	public function getPrix(){ return $this->prix;} // Permet de retrouver la ref du produit
	public function getReduction() { return $this->reduction;} // Permet de retrouver le libelle du produit
	public function getDescription(){ return $this->description;} // Permet de retrouver la ref du produit
	public function getImage() { return $this->image;} // Permet de retrouver le libelle du produit
}