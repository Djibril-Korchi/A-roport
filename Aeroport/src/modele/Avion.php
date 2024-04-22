<?php

namespace modele;

class Avion {
    private $id_avion;
    private $matricule;
    private $nb_place;
    private $ref_compagnie;
    /**
     * @return mixed
     */
    public function getIdAvion()
    {
        return $this->id_avion;
    }

    /**
     * @return mixed
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @return mixed
     */
    public function getNbPlace()
    {
        return $this->nb_place;
    }

    /**
     * @return mixed
     */
    public function getRefCompagnie()
    {
        return $this->ref_compagnie;
    }

    public function newAvion()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('INSERT INTO avion(matricule, nb_place, ref_compagnie) VALUES (:matricule,:nb,:ref)');
        $req->execute(array(
            'matricule' => $this->getMatricule(),
            'nb' => $this->getNbPlace(),
            'ref' => $this->$_SESSION['id_compagnie']
        ));
    }
    public function avion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT matricule FROM avion');

    }
    public function avionCompagnie(){
        $bdd=new \Bdd();

        $bdd=new \Bdd();
        $req=$bdd->getBdd()->prepare('SELECT * FROM avion WHERE ref_compagnie=:ref');
        $req->execute(array(
            'ref'=>$this->$_SESSION['libelle']
        ));
        return $req->fetchAll();
    }
}