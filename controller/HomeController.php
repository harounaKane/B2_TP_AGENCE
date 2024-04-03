<?php

class HomeController extends AbstractController{

    public function home(){
        if( empty($_GET) ){
            $this->render("index");
        }
    }
}