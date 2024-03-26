<?php 

class Reservation{
    private $personne;
    private $vehicule;
    private $date_reservation;

    public function getPersonne() {return $this->personne;}

	public function getVehicule() {return $this->vehicule;}

	public function getDateReservation() {return $this->date_reservation;}

	public function setPersonne( $personne): void {$this->personne = $personne;}

	public function setVehicule( $vehicule): void {$this->vehicule = $vehicule;}

	public function setDateReservation( $date_reservation): void {$this->date_reservation = $date_reservation;}

	
}