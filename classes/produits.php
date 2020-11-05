<?php
class produits
{

	private $id;
	private $categorie;
	private $nom ;
    private $prix;
	private $reduction;
	private $image;
	private $description;
	private $poids;
	private $dateReservation;


	public function __construct($id,$categorie,$nom,$prix,$reduction,$image,$description,$poids,$dateReservation = null){ // Création d'un produit 
		$this->id = $id;
		$this->categorie = $categorie;
		$this->nom = $nom;
		$this->prix = $prix;
		$this->reduction = $reduction;
		$this->image = $image;
		$this->description = $description;
		$this->poids = $poids;
		$this->dateReservation = $dateReservation;
	}
	
	public function getId(){ return $this->id;} // Permet de retrouver la ref du produit
	public function getCategorie(){ return $this->categorie;} // Permet de retrouver la categorie du produit
	public function getNom(){ return $this->nom;} // Permet de retrouver le nom du produit
	public function getPrix(){ return $this->prix;} // Permet de retrouver la ref du produit
	public function getReduction() { return $this->reduction;} // Permet de retrouver le libelle du produit
	public function getDescription(){ return $this->description;} // Permet de retrouver la ref du produit
	public function getImage() { return $this->image;} // Permet de retrouver le libelle du produit
	public function getPoids() { return $this->poids;} // Permet de retrouver le libelle du produit
	public function getDateReservation() { return $this->dateReservation;} // Permet de retrouver le libelle du produit
}