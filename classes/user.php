<?php

class User {
    private $id;
    private $sexe;
    private $prenom;
    private $nom;
    private $login;
    private $mdp;
    private $email;
    private $role = "CLIENT";
    private $date_inscription;
 
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

		$this->date_inscription = date("d-m-Y H:i:s");
	}

    public function getId() {return $this->id;}

	public function getSexe() {return $this->sexe;}

	public function getPrenom() {return $this->prenom;}

	public function getNom() {return $this->nom;}

	public function getLogin() {return $this->login;}

	public function getMdp() {return $this->mdp;}

	public function getEmail() {return $this->email;}

	public function getRole() {return $this->role;}

	public function getDateInscription() {return $this->date_inscription;}

	
    public function setId( $id): void {$this->id = $id;}

	public function setSexe( $sexe): void {$this->sexe = $sexe;}

	public function setPrenom( $prenom): void {$this->prenom = $prenom;}

	public function setNom( $nom): void {$this->nom = $nom;}

	public function setLogin( $login): void {$this->login = $login;}

	public function setMdp( $mdp): void {$this->mdp = $mdp;}

	public function setEmail( $email): void {$this->email = $email;}

	public function setRole( $role): void {$this->role = $role;}

	public function setDateInscription( $date_inscription): void {$this->date_inscription = $date_inscription;}

	
}