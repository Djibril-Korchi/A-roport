<?php

namespace modele;

use Bdd;
use Cassandra\Date;
use DateInterval;
use DateTime;
use DateTimeImmutable;

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
        if(isset($_POST['reserver'])) {
            var_dump(User::getIdUser());
            $bdd = new Bdd();
            $req1 = $bdd->getBdd()->prepare('SELECT v.heure_depart, a.nb_place FROM vol AS v INNER JOIN avion AS a ON v.ref_avion = a.id_avion WHERE v.ville_arriver = :vol');
            $req1->execute(array(
                'vol' => $_POST['id']
            ));
            $res = $req1->fetch();
            $date = new DateTimeImmutable($res['heure_depart']);
            $date = $date->sub(new DateInterval('P2D'));

            var_dump($_SESSION['user']);
            $req = $bdd->getBdd()->prepare('INSERT INTO reservation (nb_place, Date_annulation, ref_user, ref_vol) VALUES (:nb, :date, :ref_u, :ref_v)');
            $req->execute(array(
                'nb' => $_POST['nb'],
                'date' => $date->format('Y-m-d H:i:s'),
                'ref_u' => User:: getIdUser(),
                'ref_v' => $_POST['id']
            ));

            $requete = $bdd->getBdd()->prepare('UPDATE vol SET place_restant = place_restant - :nb WHERE id_vol = :id');
            $requete->execute(array(
                'nb' => $_POST['nb'],
                'id' => $_POST['id']
            ));

            header("Location: ../../vue/user/acceuille.php");
            exit();
        }
    }


    public function removeReservation(){
        $bdd=new Bdd();
        $req1= $bdd->getBdd()->prepare('SELECT * FROM reservation WHERE id_reseration=:id and :date not between Date_annulation and (SELECT heure_depart FROM vol where :vol)');
        $req1->execute(array(
            'id'=>$this->getIdReservation(),
            'date'=>checkdate(),
            'vol'=>$this->getRefVol()
        ));
        $res=$req1->fetchAll();
        if ($res) {
            $req = $bdd->getBdd()->prepare('DELETE FROM reservation WHERE id_reseration=:id');
            $req->execute(array(
                'id' => $this->getIdReservation(),
            ));
            $requete=$bdd->getBdd()->prepare('UPDATE vol SET place_restant=place_restant+:nb WHERE id_vol');
            $requete->execute(array(
                'nb'=>$res['nb_place']
            ));
            header("Location : ../../vue/user/acceuille.php");
        }else{
            header("Location : ../../vue/user/reserver.php");
        }
    }
    public function getReserver(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare("SELECT v.*, c.libelle, r.id_reseration FROM vol AS v INNER JOIN avion AS a ON v.ref_avion = a.id_avion INNER JOIN compagnie AS c ON a.ref_compagnie = c.id_compagnie INNER JOIN reservation AS r ON v.id_vol = r.ref_vol WHERE r.ref_user = :id");
        $req->execute(array(':id' => $_SESSION["id_user"]));
        return $req->fetchAll();


    }
}