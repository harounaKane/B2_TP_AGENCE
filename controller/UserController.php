<?php

class UserController{


    public function userHttp(){
        
        if( isset($_GET['actionUser']) ){
            $action = $_GET['actionUser'];
            $userMdl = new UserModel();

            switch ($action) {
                case 'inscription':

             
                    if( isset($_POST['login']) ){
                        $u = new User($_POST);
                        $bool = $userMdl->inscription( $u );

                        if( $bool ){
                            header("location: .");
                            exit;
                        }
                        
                    }

                    $this->render("user/inscription");
                    break;

                case "connexion":
                    $this->render("user/connexion");
                    break;
                
                default:
                    break;
            }

        }else{
            $this->render("index");
        }
    }

    public function render($view){
        ob_start();

        include "views/". $view .".php";

        $content = ob_get_clean();

        include "views/template.php";
    }

}