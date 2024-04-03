<?php

class UserController extends AbstractController{


    public function userHttp(){
        
        $this->actionAdmin();

        $this->actionUser();
    }

    public function actionAdmin(){
        if( isset($_GET['actionAdmin']) ){

            $action = $_GET['actionAdmin'];
            $userMdl = new UserModel();

        
            if( !$this->isAdmin() ){
                header("location: ?actionUser=connexion");
                exit;
            }
    
            switch($action){
                case "liste":

                    if( isset($_POST['id']) && $this->isValid($_POST['token']) ){
                        $userMdl->delete($_POST["id"]);
                        
                        header("location: ?actionAdmin=liste");
                        exit;
                    }

                    $listeUsers = $userMdl->getUsers();
                    $tab = ["users" => $listeUsers, "token" => $this->getToken()];

                    $this->render("user/index", $tab);
                    break;

                case "update":

                    if( isset($_POST['login']) && $this->isValid($_POST['token']) ){
                        $userToUp = new User($_POST);
                        $userMdl->update($userToUp);
                        header("location: ?actionAdmin=liste");
                        exit;
                     //   var_dump($userToUp);
                    }
                    
                    $id = intval($_GET["id"]);
                    $user = $userMdl->getUserById($id);
                  //  var_dump($user);
                    $this->render("user/ajouter", [
                        "token" => $this->getToken(),
                        "user"  => $user
                    ]);
                    
                    break;
            }

        }
    }


    public function actionUser(){
        
        if( isset($_GET['actionUser']) ){

            $action = $_GET['actionUser'];
            $userMdl = new UserModel();

            switch ($action) {
                case 'inscription':
             
                    if( isset($_POST['login']) && $this->isValid($_POST['token']) ){
                        $u = new User($_POST);
                        $bool = $userMdl->inscription( $u );

                        if( $bool ){
                            header("location: .");
                            exit;
                        }
                    }

                    $this->render("user/inscription", ["token" => $this->getToken()]);
                    break;

                case "connexion":

                    if( isset($_POST['login']) &&  $this->isValid($_POST['token']) && $_SERVER['REQUEST_METHOD'] === "POST"){

                        $user = $userMdl->connexion($_POST['login'], $_POST['mdp']);

                        if( $user != null ){
                            $_SESSION['user'] = serialize($user);

                            header("location: .");
                            exit;
                        }
                    }

                    $this->render("user/connexion", ["token" => $this->getToken()]);
                    break;

                
                case "deconnexion":
                        session_destroy();
    
                        header("location: .");
                        exit;
                default:
                $this->render("404/404", ["erreur" => "Mauvaise requête http pour " . $action]);
            }

        }
    }

}