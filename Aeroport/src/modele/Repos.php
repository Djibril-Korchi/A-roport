<?php

namespace modele;

class Repos extends Pillot {
    private $date_debut;
    private $date_fin;
    private $nb_repos;

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @return mixed
     */
    public function getNbRepos()
    {
        return $this->nb_repos;
    }

    public function vacance(){
        $bdd = new Bdd();
        $verif= $bdd->getBdd()->prepare('SELECT nb_repos FROM pillot WHERE id_pillot=:id');
        $verif->execute(array(
            'id'=>$this->getIdPillot()
        ));
        $verification=$verif->fetchAll();
        if ($this->getNbRepos()<$verification['nb_repos']) {

            $req = $bdd->getBdd()->prepare('INsert INTO repos(date_debut,date_fin,nb_jours,ref_pillot)VALUES (:date_debut, :date_fin,:nb,:ref_pillot)');
            $req->execute(array(
                "date_debut" => $this->getDateDebut(),
                "date_fin" => $this->getDateFin(),
                "nb" => $this->getNbRepos(),
                "ref_pillot" => $this->getIdPillot(),
            ));
            $requete = $bdd->getBdd()->prepare('UPDATE pillot SET nb_repos =:nb-nb_repos WHERE id_pillot=:id');
            $requete->execute(array(
                'nb' => $this->getNbRepos(),
                'id' => $this->getIdPillot()
            ));
        }
    }
}