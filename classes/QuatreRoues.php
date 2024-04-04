<?php 

abstract class QuatreRoues extends Vehicule{
    private $nombre_porte;

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

    public function getNombre_porte() {return $this->nombre_porte;}

	public function setNombre_porte( $nombre_porte): void {$this->nombre_porte = $nombre_porte;}

	
}