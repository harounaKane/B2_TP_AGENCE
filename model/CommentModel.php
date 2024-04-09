<?php

class CommentModel extends AbstractModel{

    public function ajouter(Commentaire $comment){
        $query = "INSERT INTO commentaire VALUES(:user, :car, :content, now())";

        $this->executerReq($query, [
            "user"      => $comment->getPersonne()->getId(),
            "car"       => $comment->getVehicule()->getId(),
            "content"   => $comment->getComment()
        ]);
    }

    public function getCommByVehicule(int $idVeicule){
        $query = "SELECT * FROM commentaire WHERE id_vehicule = :vehicule";

        $stmt = $this->executerReq($query, ["vehicule" => $idVeicule]);

        $tab = []; 

        while($res = $stmt->fetch()){
            $com = new Commentaire($res);

            var_dump($com);
        }

        return $tab;
    }

}