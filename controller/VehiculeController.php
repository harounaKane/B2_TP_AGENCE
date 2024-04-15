<?php 

class VehiculeController extends AbstractController{

    public function vehiculeHttp(){
        if( isset($_GET['actionVehicule']) ){

            $vehMdl = new VehiculeModel();
            $agMdl = new AgenceModel();
            $resMdl = new ReservationModel();
            $userMdl = new UserModel();
            $commMdl = new CommentModel();


            extract($_GET);

            switch ($actionVehicule) {

                case "detail" :

                    if( isset($_POST['debut']) ){


                        //VERIFIE SESSION
                        if( !isset($_SESSION['user']) ){
                            $_SESSION["detail"] = '?actionVehicule=detail&id=' . $id;
                            header("location: ?actionUser=connexion");
                            exit;
                        }

                        $iduser = unserialize($_SESSION['user'])->getId();
                        $reservation = new Reservation($_POST);

                        $reservation->setPersonne( $this->getuser() );
                        $reservation->setVehicule( $vehMdl->getVehiculeById($_POST['id_vehicule']) );

                        $resMdl->ajouter($reservation);

                        header("location: ?actionUser=compte&id=".$iduser);
                        exit;
                    }

                    $vehicule = $vehMdl->getVehiculeById($id);
                    $commentaires = $commMdl->getCommByVehiculeId($id);
                
                    $this->render("vehicule/show", [
                        "vehicule" => $vehicule,
                        "commentaires" => $commentaires
                        ]
                    );
                    break;
                case 'vehicule':
                    if( !$this->isAdmin() ){
                        header("location: .");
                        exit;
                    }
                    $this->render("vehicule/index", [
                        "vehicules" => $vehMdl->getAllVehicules(),
                        "token" => $this->getToken()
                    ]);
                    break;

                case "ajouter":
                    if( !$this->isAdmin() ){
                        header("location: .");
                        exit;
                    }

                    if( isset($_POST['marque']) ){
                        $type = $_POST['type'];
                        if( $type == "camion" ){
                            $veh = new Camion($_POST);
                        }
                        elseif( $type == "voiture" ){
                            $veh = new Voiture($_POST);
                        }
                        elseif( $type == "moto" ){
                            $veh = new DeuxRoues($_POST);
                        }

                        $vehMdl->ajouter($veh);   
                        header("location: ?actionVehicule=vehicule");
                        exit;                 
                
                    }

                    $this->render("vehicule/new", [
                        "token" => $this->getToken(),
                        "agences" => $agMdl->getAllAgnces()
                    ]);
                    break;
                


                
                    default:
                    # code...
                    break;
            }
        }
    }
}