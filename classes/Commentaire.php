<?php 

class Commentaire{
    private $personne;
    private $vehicule;
    private $comment;
    private $date_comment;

    public function getPersonne() {return $this->personne;}

	public function getVehicule() {return $this->vehicule;}

	public function getComment() {return $this->comment;}

	public function getDateComment() {return $this->date_comment;}

	public function setPersonne( $personne): void {$this->personne = $personne;}

	public function setVehicule( $vehicule): void {$this->vehicule = $vehicule;}

	public function setComment( $comment): void {$this->comment = $comment;}

	public function setDateComment( $date_comment): void {$this->date_comment = $date_comment;}

	
}