<?php

class HomeController extends AbstractController{

    public function home(){
        if( empty($_GET) ){
            $vehiculeMdl = new VehiculeModel();

            $vehicules = $vehiculeMdl->getAllVehicules();

            $this->render("index", ["vehicules" => $vehicules]);
        }
    }
}