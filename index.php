<?php

session_start();

spl_autoload_register(function($class){
  $page = $class . '.php';
  if( file_exists("classes/".$page) ){
    require_once "classes/".$page;

  }elseif( file_exists("controller/".$page) ){
    require_once "controller/".$page;

  }elseif( file_exists("model/".$page) ){
    require_once "model/".$page;
  }
    
});

$userCtl = new UserController();
$homeCtl = new HomeController();
$agcCtl = new AgenceController();
$vehCtl = new VehiculeController();



try{
  
  $userCtl->userHttp();
  $homeCtl->home();
  $agcCtl->httpAgence();
  $vehCtl->vehiculeHttp();

}catch(Exception $e){
  $homeCtl->render("404/404", ["erreur" => $e->getMessage()]);
}
