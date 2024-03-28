<?php 

class userModel {

    protected $pdo;

    function __construct(){
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=b2_tp_agence", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function getUsers(){
        $stmt = $this->executerReq("SELECT * FROM personne");

        $tab = [];

        while($res = $stmt->fetch()){
            $tab[] = new User($res);
        }

        return $tab;
    }

    public function executerReq($query, array $params = []){
        $stmt = $this->pdo->prepare($query);

        foreach($params as $cle => $valeur){
            $params[$cle] = htmlentities($valeur);
        }

        $stmt->execute($params);

        return $stmt;
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