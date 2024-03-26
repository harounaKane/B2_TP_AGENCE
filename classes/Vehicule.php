<?php 

abstract class Vehicule{
    private $id;
    private $marque;
    private $modele;
    private $prix_journalier;
    private $couleur;
    private $poids;
    private $type;
    private $agence;
    
    public function getId() {return $this->id;}

	public function getMarque() {return $this->marque;}

	public function getModele() {return $this->modele;}

	public function getPrixJournalier() {return $this->prix_journalier;}

	public function getCouleur() {return $this->couleur;}

	public function getPoids() {return $this->poids;}

	public function getType() {return $this->type;}

	public function getAgence() {return $this->agence;}

	public function setId( $id): void {$this->id = $id;}

	public function setMarque( $marque): void {$this->marque = $marque;}

	public function setModele( $modele): void {$this->modele = $modele;}

	public function setPrixJournalier( $prix_journalier): void {$this->prix_journalier = $prix_journalier;}

	public function setCouleur( $couleur): void {$this->couleur = $couleur;}

	public function setPoids( $poids): void {$this->poids = $poids;}

	public function setType( $type): void {$this->type = $type;}

	public function setAgence( $agence): void {$this->agence = $agence;}

	
}