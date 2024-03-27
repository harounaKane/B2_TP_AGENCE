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


try{
  
  $userCtl->userHttp();

}catch(Exception $e){
  echo $e->getMessage();
}
