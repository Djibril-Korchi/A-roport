<?php

namespace modele;




class Vol
{
    protected $id_vol;

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
    protected $heure_depart;
    protected $heure_arriver;
    protected $ville_depart;
    protected $classe;
    protected $prix;
    protected $ref_avion;

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
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
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

    public function Vol(){

        $bdd = new Bdd();
        $inscription=$bdd->getBdd()->query("INSERT INTO vol(destination,heure_depart,heure_arriver,ville_depart,classe,prix,ref_avion) VALUES (:n,:p,:e,:d,:r,:v,:cp,:mdp,:s)");
        $inscription->execute(array(
            'n'=>$this->getDestination(),
            'p'=>$this->getheure_depart(),
            'e'=>$this->getheure_arriver(),
            'd'=>$this->getville_depart(),
            'r'=>$this->getclasse(),
            'v'=>$this->getprix(),
            'cp'=>$this->getref_avion(),
        ));
            header("Location: ../../vue/connection.html");
    }

public function editerVol()
{
    $bdd = new Bdd();
    $req = $bdd->getBdd()->prepare('UPDATE User SET destination=:destination,heure_depart=:heure_depart,heure_arriver=:heure_arriver,ville_depart=:ville_depart,classe=:classe,prix=:prix,ref_avion=:ref_avion WHERE id_user=:id_vol');
    $req->execute(array(
        "destination" => $this->getDestination(),
        "heure_depart" => $this->getHeure_depart(),
        "heure_arriver" => $this->getHeure_arriver(),
        "ville_depart" => $this->getVille_depart(),
        "classe" => $this->getClasse(),
        "prix" => $this->getPrix(),
        "ref_avion" => $this->getRef_avion(),
        "mdp" => $this->getMdp(),
        "status" => $this->getStatus(),
        "id_user" => $this->getIdUser()
    ));
}
}