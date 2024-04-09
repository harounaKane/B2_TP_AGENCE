<?php

class User {
    private int $id;
    private string $sexe;
    private string $prenom;
    private string $nom;
    private string $login;
    private string $mdp;
    private string $email;
    private string $role = "CLIENT";
    private DateTime $date_inscription;
 
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

		$this->date_inscription = new DateTime();
	}

    public function getId(): int {return $this->id;}

	public function getSexe(): string {return $this->sexe;}

	public function getPrenom(): string {return $this->prenom;}

	public function getNom(): string {return $this->nom;}

	public function getLogin(): string {return $this->login;}

	public function getMdp(): string {return $this->mdp;}

	public function getEmail(): string {return $this->email;}

	public function getRole(): string {return $this->role;}

	public function getDateInscription() {return $this->date_inscription;}

	
    public function setId(int $id): void {$this->id = $id;}

	public function setSexe(string $sexe): void {$this->sexe = $sexe;}

	public function setPrenom(string $prenom): void {$this->prenom = $prenom;}

	public function setNom(string $nom): void {$this->nom = $nom;}

	public function setLogin(string $login): void {$this->login = $login;}

	public function setMdp(string $mdp): void {$this->mdp = $mdp;}

	public function setEmail(string $email): void {$this->email = $email;}

	public function setRole(string $role): void {$this->role = $role;}

	public function setDateInscription(DateTime $date_inscription): void {$this->date_inscription = $date_inscription;}

	
}