<?php 

class Date_{
    private $date_reservation;

    public function __construct($date_reservation){
        $this->date_reservation = $date_reservation;
    }

    public function setDateReservation( $date_reservation): void {$this->date_reservation = $date_reservation;}

	public function getDateReservation() {return $this->date_reservation;}

}