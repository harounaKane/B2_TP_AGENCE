<?php

class UserController{


    public function userHttp(){
        
        if( isset($_GET['actionUser']) ){
            $action = $_GET['actionUser'];
            $userMdl = new UserModel();

            
            $token = password_hash("monToken", PASSWORD_BCRYPT);

            switch ($action) {
                case 'inscription':
             
                    if( isset($_POST['login']) && password_verify("monToken", $_POST['token']) ){
                        $u = new User($_POST);
                        $bool = $userMdl->inscription( $u );

                        if( $bool ){
                            header("location: .");
                            exit;
                        }
                    }

                    $this->render("user/inscription", ["token" => $token]);
                    break;

                case "connexion":

                    if( isset($_POST['login']) &&  password_verify("monToken", $_POST['token']) && $_SERVER['REQUEST_METHOD'] === "POST"){

                        $user = $userMdl->connexion($_POST['login'], $_POST['mdp']);

                        if( $user != null ){
                            $_SESSION['user'] = serialize($user);

                            header("location: .");
                            exit;
                        }
                    }
                    $this->render("user/connexion", ["token" => $token]);
                    break;

                case "liste":

                    if( !$this->isConnected() ){
                        header("location: ?actionUser=connexion");
                        exit;
                    }

                    $listeUsers = $userMdl->getUsers();
                    $tab = ["users" => $listeUsers, "token" => $token];

                    $this->render("user/index", $tab);
                    break;

                case "deconnexion":
                    session_destroy();

                    header("location: .");
                    exit;
                   
            
                default:
                    break;
            }

        }else{
            $this->render("index");
        }
    }

    public function render($view, $data = []){
        ob_start();

        extract($data);

        include "views/". $view .".php";

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

}