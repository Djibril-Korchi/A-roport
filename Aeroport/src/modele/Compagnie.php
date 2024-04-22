<?php

namespace modele;

class Compagnie extends Perssone{
    private $id_compagnie;
    private $libelle;
    private $ref_user;
    private $id_aeroport;
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
    public function getIdCompagnie()
    {
        return $this->id_compagnie;
    }

    /**
     * @param mixed $id_compagnie
     */
    public function setIdCompagnie($id_compagnie)
    {
        $this->id_compagnie = $id_compagnie;
    }

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
    public function getRefUser()
    {
        return $this->ref_user;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @param mixed $ref_user
     */
    public function setRefUser($ref_user)
    {
        $this->ref_user = $ref_user;
    }

    /**
     * @param mixed $id_aeroport
     */
    public function setIdAeroport($id_aeroport)
    {
        $this->id_aeroport = $id_aeroport;
    }

    /**
     * @return mixed
     */
    public function getIdAeroport()
    {
        return $this->id_aeroport;
    }

    public function inscriptionChef(){

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
                'mdp_p'=>uniqid(),
                'status'=>"Compagnie"
            ));
            $id=$bdd->getBdd()->prepare("SELECT id_user FROM user  WHERE email=:email");
            $id->execute(array(
                'email'=>$this->getEmail()
            ));
            $reqid=$id->fetchAll();
            $req=$bdd->getBdd()->prepare("INSERT INTO compagnie(libelle, ref_user) VALUES (:libelle,:ref_u)");
            $req->execute(array(
                'libelle'=>$this->getLibelle(),
                'ref_u'=>$reqid['id_user']
            ));
            header("Location: ../../vue/admin/AcceuilAdmin.php");
        }

    }
    public function connexion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM user INNER JOIN compagnie ON user.id_user = compagnie.ref_user WHERE status=:s AND email=:e AND mdp=:mdp or mdp_provisoire=:mdp_p');
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
            $this->setLibelle($res['libelle']);
            $this->setIdCompagnie($res['id_compagnie']);
            session_start();
            header("Location: ../../vue/accueil.php");
        }elseif (is_array($res["mdp_provisoir"])){
            header("Location: ../../vue/setMdp.php");
        }
        else{
            header("Location: ../../vue/connexion.php");
        }
    }
    public function listLibelle(){
        $bdd = new Bdd();
        $req=$bdd->getBdd()->query("SELECT libelle FROM compagnie");
        return $req->fetchAll();
    }
}