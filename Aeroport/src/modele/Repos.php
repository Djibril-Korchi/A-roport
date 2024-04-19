<?php

namespace modele;

class Repos extends Pillot {
    private $date_debut;
    private $date_fin;
    private $nb_repos;
    public function vacance(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('INsert INTO repos(date_debut,date_fin,nb_repos,ref_pillot)VALUES (:date_debut, :date_fin, :nb,:ref_pillot)');
        $res = $req->execute(array(
            "date_debut"=>$this->getDateDebut(),
            "date_fin"=>$this->getDateFin(),
            "nb"=>$this->getNbRepos(),
            "ref_pillot" =>$this->getIdPillot(),
        ));
    }
}