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
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $daten
     */
    public function setDaten($daten)
    {
        $this->daten = $daten;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @param mixed $mdp_provisoire
     */
    public function setMdpProvisoire($mdp_provisoire)
    {
        $this->mdp_provisoire = $mdp_provisoire;
    }

    public function setNewMdp($mdp_p,$mdp){
        $bdd = new Bdd();
        $req=$bdd->getBdd()->prepare("UPDATE user SET mdp_provisoire=:mdp_p and mdp=:mdp where mdp_provisoire=:mdp_provisoire");
        $req->execute(array(
            'mdp_p'=>"MotDePasseNonValable",
            'mdp'=>$mdp,
            'mdp_provisoire'=>$mdp_p
        ));
    }


}