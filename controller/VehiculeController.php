<?php 

class VehiculeController extends AbstractController{

    public function vehiculeHttp(){
        if( isset($_GET['actionVehicule']) ){
            $vehMdl = new VehiculeModel();
            $agMdl = new AgenceModel();
            extract($_GET);

            switch ($actionVehicule) {
                case 'vehicule':
                    $this->render("vehicule/index", [
                        "vehicules" => $vehMdl->getAllVehicules(),
                        "token" => $this->getToken()
                    ]);
                    break;

                case "ajouter":

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