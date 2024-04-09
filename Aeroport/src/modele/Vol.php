<?php

namespace modele;

class Vol{
    private $id_vol;
    private $destination;
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
     * @param mixed $id_vol
     */
    public function setIdVol($id_vol)
    {
        $this->id_vol = $id_vol;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param mixed $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return mixed
     */
    public function getHeureDepart()
    {
        return $this->heure_depart;
    }

    /**
     * @param mixed $heure_depart
     */
    public function setHeureDepart($heure_depart)
    {
        $this->heure_depart = $heure_depart;
    }

    /**
     * @return mixed
     */
    public function getHeureArriver()
    {
        return $this->heure_arriver;
    }

    /**
     * @param mixed $heure_arriver
     */
    public function setHeureArriver($heure_arriver)
    {
        $this->heure_arriver = $heure_arriver;
    }

    /**
     * @return mixed
     */
    public function getVilleDepart()
    {
        return $this->ville_depart;
    }

    /**
     * @param mixed $ville_depart
     */
    public function setVilleDepart($ville_depart)
    {
        $this->ville_depart = $ville_depart;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getRefAvion()
    {
        return $this->ref_avion;
    }

    /**
     * @param mixed $ref_avion
     */
    public function setRefAvion($ref_avion)
    {
        $this->ref_avion = $ref_avion;
    }

    /**
     * @return mixed
     */
    public function getRefAeroport()
    {
        return $this->ref_aeroport;
    }

    /**
     * @param mixed $ref_aeroport
     */
    public function setRefAeroport($ref_aeroport)
    {
        $this->ref_aeroport = $ref_aeroport;
    }

    /**
     * @return mixed
     */
    public function getRefPillot()
    {
        return $this->ref_pillot;
    }

    /**
     * @param mixed $ref_pillot
     */
    public function setRefPillot($ref_pillot)
    {
        $this->ref_pillot = $ref_pillot;
    }
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
    public function newVol(){

        $bdd = new Bdd();
        $inscription=$bdd->getBdd()->query("INSERT INTO vol(destination,heure_depart,heure_arriver,ville_depart,prix,ref_avion,ref_aeroport,ref_pillot) VALUES (:destination,:heure_depart,:heure_arriver,:ville_depart,:prix,:ref_avion,:ref_aeroport,:ref_pillot)");
        $inscription->execute(array(
            'destination'=>$this->getDestination(),
            'heure_depart'=>$this->getheure_depart(),
            'heure_arriver'=>$this->getheure_arriver(),
            'ville_depart'=>$this->getville_depart(),
            'prix'=>$this->getPrix(),
            'ref_avion'=>$this->getRef_avion(),
            'ref_aeroport'=>$this->getRefAeroport(),
            'ref_pillot'=>$this->getRefPillot()
        ));
        header("Location: ../../vue/connection.html");
    }
    public function setVol(){

        $bdd = new Bdd();
        $inscription=$bdd->getBdd()->query("UPDATE vol SET destination=:destination,heure_depart=:heure_depart,heure_arriver=:heure_arriver,ville_depart=:ville_depart,prix=:prix,ref_avion=:ref_avion,ref_aeroport=:ref_aeroport,ref_pillot=:ref_pillot WHERE id_vol=:id_vol");
        $inscription->execute(array(
            'destination'=>$this->getDestination(),
            'heure_depart'=>$this->getheure_depart(),
            'heure_arriver'=>$this->getheure_arriver(),
            'ville_depart'=>$this->getville_depart(),
            'prix'=>$this->getPrix(),
            'ref_avion'=>$this->getRef_avion(),
            'ref_aeroport'=>$this->getRefAeroport(),
            'ref_pillot'=>$this->getRefPillot(),
            'id_vol'=>$this->getIdVol()
        ));
        header("Location: ../../vue/connection.html");
    }
}
