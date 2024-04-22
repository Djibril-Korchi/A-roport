<?php

namespace modele;

class Lier{
    private $ref_c;
    private $ref_a;

    /**
     * @return mixed
     */
    public function getRefC()
    {
        return $this->ref_c;
    }

    /**
     * @return mixed
     */
    public function getRefA()
    {
        return $this->ref_a;
    }
    public function lier(){
        $bdd=new Bdd();
        $req=$bdd->getBdd()->prepare('SELECT id_compagnie FROM compagnie Where libelle=:libelle');
        $req->execute(array(
            'libelle'=>$this->getRefC()
        ));
        $res=$req->fetchAll();
        $requete=$bdd->getBdd()->prepare('SELECT id_aeroport FROM aeroport Where libelle=:libelle');
        $requete->execute(array(
            'libelle'=>$this->getRefA()
        ));
        $res1=$req->fetchAll();
        $lier=$bdd->getBdd()->prepare('INSERT INTO lier VALUES (:ref_c,:ref_a)');
        $lier->execute(array(
            'ref_c'=>$res[0],
            'ref_a'=>$res1[0]
        ));
    }
}