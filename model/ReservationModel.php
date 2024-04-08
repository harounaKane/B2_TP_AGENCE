<?php 

class ReservationModel extends AbstractModel{


    public function reservationsByClient(User $user){

        $userMdl = new UserModel();
        $vehMdl = new VehiculeModel();

        $query = "SELECT 
                            *, 
                            DATE_FORMAT(datereservation, '%d/%m/%Y') AS datereservation,
                            DATE_FORMAT(debut, '%d/%m/%Y') AS debut, 
                            DATE_FORMAT(fin, '%d/%m/%Y') AS fin
                        FROM reservation 
                        INNER JOIN personne AS p
                        ON p.id = id_user
                        INNER JOIN vehicule AS v
                        ON v.id = id_vehicule
                        WHERE id_user = :user";
                
        $stmt = $this->executerReq($query, ["user" => $user->getId()]);

        $tab = [];

        while($res = $stmt->fetch()){
            $reservation = new Reservation($res);
            $reservation->setPersonne( $userMdl->getUserById($res['id_user']) );
            $reservation->setVehicule( $vehMdl->getVehiculeById($res['id_vehicule']) );

            $tab [] = $reservation;
        }
        
        return $tab;                
    }

    public function ajouter(Reservation $reservation){

        $this->dateReservation();

        $lasteDate = $this->getLastDateReservation()->getDateReservation();

        $query = "INSERT INTO reservation VALUES(:user, :veh, '$lasteDate', :date_d, :date_f)";
        $this->executerReq($query, [
            "user"      => $reservation->getPersonne()->getId(),
            "veh"       => $reservation->getVehicule()->getId(),
            "date_d"    => $reservation->getDebut(),
            "date_f"    => $reservation->getFin()
        ]);
    }

    public function dateReservation(){
        $this->executerReq("INSERT INTO date_ VALUES(now())");
    }

    public function getLastDateReservation(){
        $stmt = $this->executerReq("SELECT * FROM date_ ORDER BY date_reservation DESC LIMIT 1");
        $res = $stmt->fetch();

        return new Date_($res["date_reservation"]);
    }

}