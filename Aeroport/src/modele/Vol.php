<?php

namespace modele;


use Bdd;


class Vol{

    private $id_vol;
    private $destination;
    private $ville_arriver;
    private $heure_depart;
    private $heure_arriver;
    private $ville_depart;
    private $date;
    private $prix;
    private $ref_avion;
    private $ref_aeroport;
    private $ref_pillot;

    /**
     * @return mixed
     */
    public function getIdVol()
    {
        return $this->id_vol;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @return mixed
     */
    public function getVilleArriver()
    {
        return $this->ville_arriver;
    }

    /**
     * @return mixed
     */
    public function getHeureDepart()
    {
        return $this->heure_depart;
    }

    /**
     * @return mixed
     */
    public function getHeureArriver()
    {
        return $this->heure_arriver;
    }

    /**
     * @return mixed
     */
    public function getVilleDepart()
    {
        return $this->ville_depart;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @return mixed
     */
    public function getRefAvion()
    {
        return $this->ref_avion;
    }

    /**
     * @return mixed
     */
    public function getRefAeroport()
    {
        return $this->ref_aeroport;
    }

    /**
     * @return mixed
     */
    public function getRefPillot()
    {
        return $this->ref_pillot;
    }

    public function newVol(){
        $bdd = new Bdd();
        $req=$bdd->getBdd()->query("SELECT id_avion FROM avion where matricule=:matricule");
        $req->execute(array(
            'matricule'=>$this->getRefAvion()
        ));
        $res=$req->fetchAll();
        $req1=$bdd->getBdd()->query("SELECT id_pillot FROM pillot as p INNER JOIN user as u ON p.ref_user = u.id_user where nom=:nom");
        $req1->execute(array(
            'nom'=>$this->getRefPillot()
        ));
        $res1=$req->fetchAll();
        $inscription=$bdd->getBdd()->query("INSERT INTO vol(destination,ville_arriver,heure_depart,heure_arriver,ville_depart,prix,ref_avion,ref_pillot) VALUES (:destination,:ville,:heure_depart,:heure_arriver,:ville_depart,:prix,:ref_avion,:ref_pillot)");
        $inscription->execute(array(
            'destination'=>$this->getDestination(),
            'ville'=>$this->getVilleArriver(),
            'heure_depart'=>$this->getHeureDepart(),
            'heure_arriver'=>$this->getHeureArriver(),
            'ville_depart'=>$this->getVilleDepart(),
            'prix'=>$this->getPrix(),
            'ref_avion'=>$res['id_avion'],
            'ref_pillot'=>$res1['id_pillot']
        ));
        header("Location: ../../vue/connection.html");
    }
    public function setVol(){

        $bdd = new Bdd();
        $inscription=$bdd->getBdd()->query("UPDATE vol SET destination=:destination,heure_depart=:heure_depart,heure_arriver=:heure_arriver,ville_depart=:ville_depart,prix=:prix,ref_avion=:ref_avion,ref_aeroport=:ref_aeroport,ref_pillot=:ref_pillot WHERE id_vol=:id_vol");
        $inscription->execute(array(
            'destination'=>$this->getDestination(),
            'heure_depart'=>$this->getHeureDepart(),
            'heure_arriver'=>$this->getHeureArriver(),
            'ville_depart'=>$this->getVilleDepart(),
            'prix'=>$this->getPrix(),
            'ref_avion'=>$this->getRefAvion(),
            'ref_aeroport'=>$this->getRefAeroport(),
            'ref_pillot'=>$this->getRefPillot(),
            'id_vol'=>$this->getIdVol()
        ));
        header("Location: ../../vue/connection.html");
    }
    public function getVol(){
        $bdd = new Bdd();
        $req=$bdd->getBdd()->query("SELECT v.*, c.libelle FROM vol as v INNER JOIN avion AS a ON v.ref_avion = a.id_avion INNER JOIN compagnie as c ON a.ref_compagnie = c.id_compagnie");
        return $req->fetchAll();
    }
    public function listDestination(){
        $bdd = new Bdd();
        $req=$bdd->getBdd()->query("SELECT id_vol,ville_arriver FROM vol");
        return $req->fetchAll();
    }
}

