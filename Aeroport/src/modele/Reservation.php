<?php

namespace modele;

class Reservation{
    private $id_reservation;
    private $nb_place;
    private $classe;
    private $ref_vol;
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
    public function getIdReservation()
    {
        return $this->id_reservation;
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
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @return mixed
     */
    public function getRefVol()
    {
        return $this->ref_vol;
    }
    public function newReservation(){
        $bdd =new Bdd();
        $req = $bdd->getBdd()->prepare('INSERT INTO reservation(nb_place, classe, ref_user, ref_vol) VALUES (:nb, :classe, :ref_u, :ref_v)');
        $req->execute(array(
            'nb'=>$this->getNbPlace(),
            'classe'=>$this->getClasse(),
            'ref_u'=>$_SESSION["id_user"],
            'ref_v'=>$this->getRefVol()
        ));
        $requete=$bdd->getBdd()->prepare('UPDATE vol SET place_restant=place_restant-:nb WHERE id_vol');
        $requete->execute(array(
            'nb'=>$this->getNbPlace()
        ));
    }
    public function removeReservation(){
        $
    }
}