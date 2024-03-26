<?php 

class DeuxRoues extends Vehicule{
    
    private $cylindre;

    public function getCylindre() {return $this->cylindre;}

	public function setCylindre( $cylindre): void {$this->cylindre = $cylindre;}
}