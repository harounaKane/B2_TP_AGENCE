<?php 

abstract class AbstractController{    

    private $token;

    public function __construct(){
        $this->token = password_hash("monToken", PASSWORD_BCRYPT);;
    }

    public function getToken() {return $this->token;}

	
    public function isValid($tokenForm){
        return password_verify("monToken", $tokenForm);
    }

    public function render($view, $data = []){
        ob_start();

        extract($data);

        $page = "views/". $view .".php";

        $page = str_replace("../", "protect", $page);
        $page = str_replace(";", "protect", $page);
        $page = str_replace("%", "protect", $page);


        if( !file_exists($page) ){
            throw new Exception("Cette page n'existe pas");
        }

        include $page;

        $content = ob_get_clean();

        include "views/template.php";
    }


    public function isConnected(){
        if( isset($_SESSION['user']) ){
            return true;
        }
        
        return false;

      //  return isset($_SESSION['user']) ? true : false;
    }


    public function isCommercial(){
        if( $this->isConnected() && unserialize($_SESSION['user'])->getRole() == "COMMERCIAL" ){
            return true;
        }
        
        return false;
    }


    public function isAdmin(){
       return ( $this->isConnected() && unserialize($_SESSION['user'])->getRole() == "ADMIN" );
    }
    
}