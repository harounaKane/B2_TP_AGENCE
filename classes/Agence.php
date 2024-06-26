<?php 

class Agence {
    private $id;
    private $nom;
    private $adresse;
    private $cp;
    private $ville;

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

    public function getId() {return $this->id;}

	public function getNom() {return $this->nom;}

	public function getAdresse() {return $this->adresse;}

	public function getCp() {return $this->cp;}

	public function getVille() {return $this->ville;}

    public function setId( $id): void {$this->id = $id;}

	public function setNom( $nom): void {$this->nom = $nom;}

	public function setAdresse( $adresse): void {$this->adresse = $adresse;}

	public function setCp( $cp): void {$this->cp = $cp;}

	public function setVille( $ville): void {$this->ville = $ville;}

	
	
}