<?php

namespace modele;

use Bdd;
use Cassandra\Date;
use DateTime;

class Reservation{
    private $id_reservation;
    private $nb_place;
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
        };
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

    public function getRefVol()
    {
        return $this->ref_vol;
    }
    public function newReservation(){
        $bdd =new Bdd();
        $req1= $bdd->getBdd()->prepare('SELECT v.heure_depart,a.nb_place FROM vol as v INNER JOIN avion as a  ON v.ref_avion = a.id_avion WHERE id_vol=:vol');

        $req1->execute(array(

        ));
        $res=$req1->fetchAll();
        $date = new DateTime($res['nb_place']);
        $date->sub(new DateInterval('P2D'));
        echo $date->format('Y-m-d H:i:s');
        $req = $bdd->getBdd()->prepare('INSERT INTO reservation(nb_place,Date_annulation, ref_user, ref_vol) VALUES (:nb,:date, :ref_u, :ref_v)');
        $req->execute(array(
            'nb'=>$this->getNbPlace(),

            'date'=>$date,
            'ref_u'=>$_SESSION["id_user"],
            'ref_v'=>$this->getRefVol()
        ));
        $requete=$bdd->getBdd()->prepare('UPDATE vol SET place_restant=place_restant-:nb WHERE id_vol');
        $requete->execute(array(
            'nb'=>$this->getNbPlace()
        ));
    }
    public function removeReservation(){
        $bdd=new Bdd();
        $req=$bdd->getBdd()->prepare('DELETE FROM reservation WHERE id_reseration=:id and :date not between Date_annulation and (SELECT heure_depart FROM vol where :vol)');
        $req->execute(array(
            'id'=>$this->getIdReservation(),
            'date'=>checkdate(),
            'vol'=>$this->getRefVol()
        ));
    }
}