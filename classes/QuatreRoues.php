<?php 

abstract class QuatreRoues extends Vehicule{
    private $nombre_porte;

    public function getNombrePorte() {return $this->nombre_porte;}

	public function setNombrePorte( $nombre_porte): void {$this->nombre_porte = $nombre_porte;}

	
}