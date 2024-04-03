<?php

class AgenceController extends AbstractController{

    public function httpAgence(){

        if( isset($_GET['actionAgence']) ){

            $agMdl = new AgenceModel();
            $action = $_GET['actionAgence'];
        
            if( !$this->isAdmin() ){
                header("location: ?actionUser=connexion");
                exit;
            }

            switch($action){
                case "agence":
                    $agences = $agMdl->getAllAgnces();
                    $this->render("agence/index", [
                        "agences" => $agences,
                        "token"   => $this->getToken()
                    ]);
                    break;
            }
        }

    }
}