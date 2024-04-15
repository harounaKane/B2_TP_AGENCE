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
                $this->redirect("?actionUser=connexion");
            }
    
            switch($action){
                case "liste":

                    if( isset($_POST['id']) && $this->isValid($_POST['token']) ){
                        $userMdl->delete($_POST["id"]);
                        
                        $this->redirect("location: ?actionAdmin=liste");
                    }

                    $listeUsers = $userMdl->getUsers();
                    $tab = ["users" => $listeUsers, "token" => $this->getToken()];

                    $this->render("user/index", $tab);
                    break;

                case "update":

                    if( isset($_POST['login']) && $this->isValid($_POST['token']) ){
                        $userToUp = new User($_POST);
                        $userMdl->update($userToUp);
                        $this->redirect("location: ?actionAdmin=liste");
                     //   var_dump($userToUp);
                    }
                    
                    $id = intval($_GET["id"]);
                    $user = $userMdl->getUserById($id);
                    var_dump($user);
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
            $resmdl = new ReservationModel();
            $commentMdl = new CommentModel();
            $vehMdl = new VehiculeModel();

            extract($_GET);

            switch ($action) {

                case "compte":

                    $user = $userMdl->getUserById($id);

                    //AJOUT COMMENTAIRE
                    if( isset($_POST['comment']) ){
                        $u = $this->getuser();
                        $veh = $vehMdl->getVehiculeById($_POST['vehicule']);
                        $com = new Commentaire($_POST);
                        $com->setPersonne($u);
                        $com->setVehicule($veh);

                        $commentMdl->ajouter($com);
                    }

                    $reservations = $resmdl->reservationsByClient($user);
                    $this->render("user/compte", ["reservations" => $reservations]);
                    break;

                case 'inscription':
             
                    if( isset($_POST['login']) && $this->isValid($_POST['token']) ){
                        $u = new User($_POST);
                        $bool = $userMdl->inscription( $u );

                        if( $bool ){
                            $this->redirect(".");
                        }
                    }

                    $this->render("user/inscription", ["token" => $this->getToken()]);
                    break;

                case "connexion":

                    if( isset($_POST['login']) &&  $this->isValid($_POST['token']) && $_SERVER['REQUEST_METHOD'] === "POST"){

                        $user = $userMdl->connexion($_POST['login'], $_POST['mdp']);

                        if( $user != null ){
                            $_SESSION['user'] = serialize($user);
                            $_SESSION['ROLE'] = $user->getRole();

                            //RETOUR SUR LA PAGE DETAIL
                            if( $_SESSION["detail"] ){
                                $this->redirect( $_SESSION["detail"]);
                                exit;
                            }

                            $this->redirect(".");
                        }
                    }

                    $this->render("user/connexion", ["token" => $this->getToken()]);
                    break;

                
                case "deconnexion":
                        session_destroy();
    
                        $this->redirect(".");
                default:
                $this->render("404/404", ["erreur" => "Mauvaise requête http pour " . $action]);
            }

        }
    }

}