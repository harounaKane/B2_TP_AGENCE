<?php 

class AgenceModel extends AbstractModel{

    
    public function getAgenceById($id){
        $res = $this->getById("agence", $id);

        extract($res);
        $a = new Agence();
        $a->setId($id);
        $a->setNom($nom);
        $a->setAdresse($adresse);
        $a->setVille($ville);
        $a->setCp($cp);
        $a->setCp($cp);
        
        return $a;
    }

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
            $a->setCp($cp);

            $tab[] = $a;
        }

        return $tab;
    }

}