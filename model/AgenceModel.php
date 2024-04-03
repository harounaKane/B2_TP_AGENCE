<?php 

class AgenceModel extends AbstractModel{

    public function getAllAgnces(){
        $stmt = $this->executerReq("SELECT * FROM agence");

        $tab = [] ;

        while($res = $stmt->fetch()){
            extract($res);
            $a = new Agence();
            $a->setId($id);
            $a->setNom($nom);
            $a->setAdresse($adresse);
            $a->setVille($ville);

            $tab[] = $a;
        }

        return $tab;
    }

}