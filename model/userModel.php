<?php 

class userModel {

    protected $pdo;

    function __construct(){
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=b2_tp_agence", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function executerReq($query, array $params = []){
        $stmt = $this->pdo->prepare($query);

        foreach($params as $cle => $valeur){
            $params[$cle] = htmlentities($valeur);
        }

        $stmt->execute($params);

        return $stmt;
    }


    public function inscription(User $user){
        $this->verifTaille("nom", $user->getNom());
        $this->verifTaille("prenom", $user->getPrenom());
        $this->verifTaille("login", $user->getLogin());

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

    public function verifTaille($attr, $value, $min = 2, $max = 20){
        $value = trim($value);

        if( strlen($value) < $min || strlen($value) > $max ){
            $_SESSION["errors"][$attr] = "";
        }

    }

}