<?php

namespace modele;

use Bdd;

class Repos{
    private $date_debut;
    private $date_fin;
    private $nb_repos;
    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }
    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
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
            'id'=>$this->$_SESSION['id_pillot']
        ));
        $verification=$verif->fetchAll();
        if ($this->getNbRepos()<$verification['nb_repos']) {

            $req = $bdd->getBdd()->prepare('INSERT INTO repos(date_debut,date_fin,nb_jours,ref_pillot)VALUES (:date_debut, :date_fin,:nb,:ref_pillot)');
            $req->execute(array(
                "date_debut" => $this->getDateDebut(),
                "date_fin" => $this->getDateFin(),
                "nb" => $this->getNbRepos(),
                "ref_pillot" => $_SESSION['id_pillot']
            ));
            $requete = $bdd->getBdd()->prepare('UPDATE pillot SET nb_repos =:nb-nb_repos WHERE id_pillot=:id');
            $requete->execute(array(
                'nb' => $this->getNbRepos(),
                'id' => $this->$_SESSION['id_pillot']
            ));
        }
    }
}