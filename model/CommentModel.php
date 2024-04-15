<?php

class CommentModel extends AbstractModel{

    /**
     * Vérifie si un user a commenté un véhicule.
     * @param un User $user et un Vehicule $vehicule
     * @return true ou false
     */
    public function isCommented(User $user, Vehicule $vehicule): bool{
        $query = "SELECT * FROM commentaire WHERE id_user = :user AND id_vehicule = :car";

        $stmt = $this->executerReq($query, ["user" => $user->getId(), "car" => $vehicule->getId()]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    /**
     *@throws Exception @see isCommented
     */
    public function ajouter(Commentaire $comment){
        $query = "INSERT INTO commentaire VALUES(:user, :car, :content, now())";

        if( $this->isCommented($comment->getPersonne(), $comment->getVehicule()) ){
            throw new Exception("Vous avez déjà commenté ce véhicule");
        }

        $this->executerReq($query, [
            "user"      => $comment->getPersonne()->getId(),
            "car"       => $comment->getVehicule()->getId(),
            "content"   => $comment->getComment()
        ]);
    }

    public function getCommByVehiculeId(int $idVeicule){
        $query = "SELECT * FROM commentaire WHERE id_vehicule = :vehicule";

        $stmt = $this->executerReq($query, ["vehicule" => $idVeicule]);

        $tab = []; 

        $userMdl = new UserModel();

        while($res = $stmt->fetch()){
            $u = $userMdl->getUserById($res['id_user']);
            
            $com = new Commentaire($res);
            $com->setPersonne($u);
            $tab[] = $com;
        }

        return $tab;
    }

}