<?php 

class UserModel extends AbstractModel{


    public function getUsers(){

        $tab = $this->getAll("personne");

        for($i=0; $i < count($tab); $i++){
            $tab[$i] = new User($tab[$i]);
        }

        return $tab;
    }

    public function getUserById($id){
        
        $res = $this->getById("personne",$id);

        if( $res != null ){
            return new User($res);
        }

        return null;
    }


    public function connexion($login, $mdp){
        $query = "SELECT * FROM personne WHERE login = :loginSaisi";

        $stmt = $this->executerReq($query, ["loginSaisi" => $login]);

        if( $stmt->rowCount() != 0){
            $res = $stmt->fetch();

            if( password_verify($mdp, $res['mdp']) ){
                return new User($res);
            }
        }
        
        return null;
    }

    public function update(User $user){

        $this->verifTaille("nom", $user->getNom());
        $this->verifTaille("prenom", $user->getPrenom());
        $this->verifTaille("login", $user->getLogin(), 4, 8);

        $this->verifSpace("loginSpace", $user->getLogin());
       // $this->verifSpace("mdpSpace", $user->getMdp());

        if( isset($_SESSION["errors"]) ){
            return false;
        }

        $query = "UPDATE personne SET prenom = :prenom, nom = :nom, email = :mail, login = :login, sexe = :sexe, role = :role WHERE id = :id";

        $this->executerReq($query, [
            "sexe"      => $user->getSexe(),
            "prenom"    => $user->getPrenom(),
            "nom"       => $user->getNom(),
            "login"     => $user->getLogin(),
            "role"      => $user->getRole(),
            "mail"      => $user->getEmail(),
            "id"        => $user->getId()
        ]);

        return true;

    }


    public function inscription(User $user){

        $this->verifTaille("nom", $user->getNom());
        $this->verifTaille("prenom", $user->getPrenom());
        $this->verifTaille("login", $user->getLogin(), 4, 8);

        $this->verifSpace("loginSpace", $user->getLogin());
        $this->verifSpace("mdpSpace", $user->getMdp());

        if( isset($_SESSION["errors"]) ){
            return false;
        }

        $query = "INSERT INTO personne VALUES(NULL, :sexe, :prenom, :nom, :login, :mdp, :role, :mail, now())";

        $this->executerReq($query, [
            "sexe"      => $user->getSexe(),
            "prenom"    => $user->getPrenom(),
            "nom"       => $user->getNom(),
            "login"     => $user->getLogin(),
            "mdp"       => password_hash($user->getMdp(), PASSWORD_DEFAULT),
            "role"      => $user->getRole(),
            "mail"      => $user->getEmail()
        ]);

        return true;

    }

    public function delete(int $id){
        $res = $this->executerReq("DELETE FROM personne WHERE id = :id", ["id" => $id]);

        return $res;
    }

    public function verifSpace($attr, $chaine){

        for($i=0; $i<strlen($chaine); $i++){
            if(ctype_space($chaine[$i])){
                $_SESSION["errors"][$attr] = "Les espaces ne sont pas permis";
            }
        }
       // 
    }

    public function verifTaille($attr, $value, $min = 2, $max = 20){
        $value = trim($value);

        if( strlen($value) < $min || strlen($value) > $max ){
            $_SESSION["errors"][$attr] = "";
        }

    }

}