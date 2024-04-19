<?php

namespace modele;

class Compagnie extends Perssone{
    private static $id_compagnie;
    private $libelle;
    private static $ref_user;

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @return mixed
     */
    public static function getIdCompagnie()
    {
        return self::$id_compagnie;
    }

    /**
     * @param mixed $id_compagnie
     */
    public static function setIdCompagnie($id_compagnie)
    {
        self::$id_compagnie = $id_compagnie;
    }

    /**
     * @return mixed
     */
    public static function getRefUser()
    {
        return self::$ref_user;
    }

    /**
     * @param mixed $ref_user
     */
    public static function setRefUser($ref_user)
    {
        self::$ref_user = $ref_user;
    }

    public function inscription(){

        $bdd = new Bdd();
        $req=$bdd->getBdd()->prepare("SELECT * FROM user WHERE email=:email");
        $req->execute(array(
            'email'=>$this->getEmail()
        ));
        $verif=$req->fetchAll();
        if ($verif){
            header("Location: ../../vue/inscription.html");
        }else{
            $inscription=$bdd->getBdd()->query("INSERT INTO user(nom,prenom,email,daten,rue,ville,cp,mdp_provisoire,status) VALUES (:n,:p,:e,:d,:r,:v,:cp,:mdp,:nb,:mdpp,:status)");
            $inscription->execute(array(
                'n'=>$this->getNom(),
                'p'=>$this->getPrenom(),
                'e'=>$this->getEmail(),
                'd'=>$this->getDaten(),
                'r'=>$this->getAdresse(),
                'v'=>$this->getVille(),
                'cp'=>$this->getCp(),
                'mdp_p'=>$this->getMdp(),
                'status'=>"Compagnie"
            ));

            $id=$bdd->getBdd()->prepare("SELECT id_user FROM user  WHERE email=:email");
            $id->execute(array(
                'email'=>$this->getEmail()
            ));
            $reqid=$id->fetchAll();
            Pillot::setRefUser($reqid['id_user']);
            $req=$bdd->getBdd()->prepare("INSERT INTO compagnie(libelle, ref_user) VALUES (:libelle,:ref_u)");
            $req->execute(array(
                $this->libelle
            ));
            header("Location: ../../vue/connection.html");
        }

    }
    public function connexion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM user WHERE status=:s AND email=:e AND mdp=:mdp or mdp_provisoire=:mdp_p');
        $req->execute(array(
            "s"=>"pillot",
            "e" =>$this->getEmail(),
            "mdp" =>$this->getMdp(),
            "mdp_p" =>$this->getMdp()
        ));
        $res = $req->fetch();

        if (is_array($res["mdp"])){
            Pillot::setRefUser($res['id_user']);
            $this->setNom($res["nom"]);
            $this->setPrenom($res["prenom"]);
            $this->setDaten($res["daten"]);
            $this->setAdresse($res['addresse']);
            $this->setCp($res['cp']);
            $this->setVille($res['ville']);
            $this->setMdp($res['mdp']);
            session_start();
            header("Location: ../../vue/accueil.php");
        }elseif (is_array($res["mdp_provisoir"])){
            header("Location: ../../vue/setMdp.php");
        }
        else{
            header("Location: ../../vue/connexion.php");
        }
    }

}