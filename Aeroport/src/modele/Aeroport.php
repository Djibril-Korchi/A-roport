<?php

namespace modele;

class Aeroport{
    private $id_aeroport;
    private $libelle;

    /**
     * @return mixed
     */
    public function getIdAeroport()
    {
        return $this->id_aeroport;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    public function ajouterAeroport(){

        $bdd = new Bdd();
        $req=$bdd->getBdd()->prepare("SELECT * FROM aeroport WHERE libelle=:libelle");
        $req->execute(array(
            'email'=>$this->getLibelle()
        ));
        $verif=$req->fetchAll();
        if ($verif){
            header("Location: ../../vue/inscription.html");
        }else{
            $inscription=$bdd->getBdd()->prepare("INSERT INTO aeroport(libelle) VALUES (:libelle)");
            $inscription->execute(array(
                'libelle'=>$this->getLibelle()
            ));
            header("Location: ../../vue/connection.html");
        }
    }
    public function listDestination(){
        $bdd = new Bdd();
        $req=$bdd->getBdd()->query("SELECT libelle FROM aeroport");
        return $req->fetchAll();
    }

}