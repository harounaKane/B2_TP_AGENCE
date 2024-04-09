<?php

abstract class AbstractModel{
    
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

    public function getById($table, $id){
        $stmt = $this->executerReq("SELECT * FROM $table WHERE id = :id", ['id' => $id]);
        
        if( $stmt->rowCount() == 1 ){
            return $stmt->fetch();
        }

        return null;
    }
}