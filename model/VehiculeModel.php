<?php 

class VehiculeModel extends AbstractModel{

    public function ajouter(Vehicule $veh){

        $tab = [
            "marque"    => $veh->getMarque(),
            "modele"    => $veh->getModele(),
            "prix"     => $veh->getPrix_journalier(),
            "img"    => $veh->getImg(),
            "poids"    => $veh->getPoids(),
            "type"    => $veh->getType(),
            "capacite"    => $veh->getCapacite(),
            "etat"      => $veh->getEtat(),
            "agence"    => $veh->getId_agence()
        ];

        if( $veh instanceof Camion ){
            $query = "INSERT INTO vehicule (marque, modele, prix_journalier, img, poids, type, capacite, etat, nombre_porte, longueur, id_agence) VALUES(:marque, :modele, :prix, :img, :poids, :type, :capacite, :etat, :nbport, :long, :agence)";

            $tab += [
                "nbport"    => $veh->getNombre_porte(),
                "long"      => $veh->getLongueur()
                ];


        }elseif( $veh instanceof Voiture ){
            $query = "INSERT INTO vehicule (marque, modele, prix_journalier, img, poids, type, capacite, etat, nombre_porte, id_agence) VALUES(:marque, :modele, :prix, :img, :poids, :type, :capacite, :etat, :nbport, :agence)";

            $tab += [ "nbport"    => $veh->getNombre_porte() ];

        }elseif( $veh instanceof DeuxRoues ){
            $query = "INSERT INTO vehicule (marque, modele, prix_journalier, img, poids, type, capacite, etat, cylindre, id_agence) VALUES(:marque, :modele, :prix, :img, :poids, :type, :capacite, :etat, :cylindre, :agence)";

            $tab += [ "cylindre"    => $veh->getCylindre()];
        }
        
        $this->executerReq($query, $tab);
    }

    public function getAllVehicules(){
        $stmt = $this->executerReq("SELECT * FROM vehicule");

        $tab = [];
        $agMdl = new AgenceModel();

        while($res = $stmt->fetch()){
            $res['id_agence'] = $agMdl->getAgenceById($res['id_agence']);
            $v = new Voiture($res);

            $tab[] = $v;
        }

        return $tab;
    }

    public function getVehiculeById(int $id){
        $res = $this->getById("vehicule", $id);

        $agence = new Agence( $this->getById("agence", $res['id_agence']) );
        $v = null;
       
        if( $res['type'] == "camion" ){
            $v = new Camion($res);
        }else if( $res['type'] == "voiture" ){
            $v = new Voiture($res);
        }else if( $res['type'] == "moto" ){
            $v = new DeuxRoues($res);
        }

        $v->setAgence($agence);
        return $v;
    }
}