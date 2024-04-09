<?php 

class Commentaire{
    private $personne;
    private $vehicule;
    private $comment;
    private $dateComment;

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

	public function getComment() {return $this->comment;}

	public function getDateComment() {return $this->dateComment;}

	public function setPersonne( $personne): void {$this->personne = $personne;}

	public function setVehicule( $vehicule): void {$this->vehicule = $vehicule;}

	public function setComment( $comment): void {$this->comment = $comment;}

	public function setDateComment( $date_comment): void {$this->dateComment = $date_comment;}

	
}