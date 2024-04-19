<?php

namespace modele;

class Perssone
{
    protected $nom;
    protected $prenom;
    protected $email;
    protected $daten;
    protected $adresse;
    protected $ville;
    protected $cp;
    protected $mdp;
    protected $mdp_provisoire;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getDaten()
    {
        return $this->daten;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @return mixed
     */
    public function getMdpProvisoire()
    {
        return $this->mdp_provisoire;
    }

    /**
     * @param mixed $mdp_provisoire
     */
    public function setMdp($mdp )
    {

    }


}