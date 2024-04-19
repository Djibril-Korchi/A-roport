<?php

namespace modele;

class Pillot extends Perssone {
    private $id_pillot;
    private $ref_compagnie;
    private static $ref_user;

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
    public function getIdPillot()
    {
        return $this->id_pillot;
    }

    /**
     * @param mixed $id_pillot
     */
    public function setIdPillot($id_pillot)
    {
        $this->id_pillot = $id_pillot;
    }

    /**
     * @return mixed
     */
    public function getRefCompagnie()
    {
        return $this->ref_compagnie;
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

    /**
     * @param mixed $ref_compagnie
     */
    public function setRefCompagnie($ref_compagnie)
    {
        $this->ref_compagnie = $ref_compagnie;
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
                'status'=>"pillot"
            ));

            $id=$bdd->getBdd()->prepare("SELECT id_user FROM user  WHERE email=:email");
            $id->execute(array(
                'email'=>$this->getEmail()
            ));
            $reqid=$id->fetchAll();
            $id1=$bdd->getBdd()->prepare("SELECT c.id_compagnie FROM compagnie as c INNER JOIN user as u ON c.ref_user = u.id_user WHERE u.email=:email");
            $id1->execute(array(
                'email'=>$this->getRefCompagnie()
            ));
            $reqid1=$id1->fechAll();
            Pillot::setRefUser($reqid['id_user']);
            $req=$bdd->getBdd()->prepare("INSERT INTO pillot(ref_compagnie, ref_user,nb_repos) VALUES (:ref_c,:ref_u,:nb_repos)");
            $req->execute(array(
                'ref_c'=>$reqid1['id_compagnie'],
                'ref_u'=>$reqid['id_user'],
                'nb_repos'=>30
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
            $this->setRefCompagnie($res['ref_copagnie']);
            session_start();

            $_SESSION["user"] = $this;
            header("Location: ../../vue/accueil.php");
        }elseif (is_array($res["mdp_provisoir"])){
            header("Location: ../../vue/setMdp.php");
        }
        else{
            header("Location: ../../vue/connexion.php");
        }
    }

    public function editer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE user SET nom=:n,prenom=:p,email=:e,daten=:d,rue=:r,ville=:v,cp=:cp,mdp=:mdp WHERE id_user=:id');
        $res = $req->execute(array(
            'n'=>$this->getNom(),
            'p'=>$this->getPrenom(),
            'e'=>$this->getEmail(),
            'd'=>$this->getDaten(),
            'r'=>$this->getAdresse(),
            'v'=>$this->getVille(),
            'cp'=>$this->getCp(),
            'mdp'=>$this->getMdp(),
            "id"=>Pillot::getRefUser()
        ));

        if ($res){
            header("Location: ../../vue/accueil.php");
        }else{
            header("Location: ../../vue/edition.php");
        }
    }
    public function supprimer(){
        $bdd = new Bdd();
        $req0 = $bdd->getBdd()->prepare('DELETE FROM pillot WHERE id_pillot=:id_pillot');
        $res0 = $req0->execute(array(
            "id_pillot" =>$this->getIdPillot()
        ));
        $req = $bdd->getBdd()->prepare('DELETE FROM user WHERE id_user=:id_user');
        $res = $req->execute(array(
            "id_user" =>Pillot::getRefUser()
        ));

        if ($res){
            header("Location: ../../vue/accueil.php");
        }else{
            header("Location: ../../vue/connexion.php");
        }
    }
    public function getVolPillot(){
        $bdd = new Bdd();
        $req=$bdd->getBdd()->query("SELECT * FROM vol WHERE ref_pillot = :ref");
        $req->execute(array(
            "ref"=>$this->getIdPillot()
        ));
        $vol=$req->fetchAll();
        return $vol;
    }
}