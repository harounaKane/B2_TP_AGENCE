<?php 

class Reservation{
    private $personne;
    private $vehicule;
    private $date_reservation;
	private $debut;
	private $fin;

	public function __construct(array $data = []){

		foreach($data as $key => $value){
			//création des set...
			$methode = "set" . ucfirst($key);

			//test si le setter existe
			if( method_exists($this, $methode) ){
				//appel du setter et on passe le '$value' en paramètre
				$this->$methode($value);
			}
		}
	}

    public function getPersonne() {return $this->personne;}

	public function getVehicule() {return $this->vehicule;}

	public function getDateReservation() {return $this->date_reservation;}

	public function getDebut() {return $this->debut;}

	public function getFin() {return $this->fin;}

	public function setPersonne(User $personne): void {$this->personne = $personne;}

	public function setVehicule(Vehicule $vehicule): void {$this->vehicule = $vehicule;}

	public function setDateReservation( $date_reservation): void {$this->date_reservation = $date_reservation;}

	public function setDebut( $debut): void {$this->debut = $debut;}

	public function setFin( $fin): void {$this->fin = $fin;}

	

	
}