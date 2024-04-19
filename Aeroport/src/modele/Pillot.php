<?php

namespace modele;

class Pillot extends Perssone {
    private $id_pillot;
    private $ref_compagnie;
    private $re_user;
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
     * @param mixed $ref_compagnie
     */
    public function setRefCompagnie($ref_compagnie)
    {
        $this->ref_compagnie = $ref_compagnie;
    }


    public function inscription(){

        $bdd = new Bdd();
        $req=$bdd->getBdd()->prepare("SELECT * FROM pillot WHERE email=:email");
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
                'mdp'=>$this->getMdp(),
                "nb"=>30,
                "mdpp"=>$this->getMdpProvisoire(),
                "ref"=>$this->getRefCompagnie()
            ));
            $inscription=$bdd->getBdd()->query("INSERT INTO pillot(nom,prenom,email,daten,addresse,ville,cp,mdp,nb_repos,mdp_provisoire,ref_compagnie) VALUES (:n,:p,:e,:d,:r,:v,:cp,:mdp,:nb,mdpp,:ref)");
            $inscription->execute(array(
                'n'=>$this->getNom(),
                'p'=>$this->getPrenom(),
                'e'=>$this->getEmail(),
                'd'=>$this->getDaten(),
                'r'=>$this->getAdresse(),
                'v'=>$this->getVille(),
                'cp'=>$this->getCp(),
                'mdp'=>$this->getMdp(),
                "nb"=>30,
                "mdpp"=>$this->getMdpProvisoire(),
                "ref"=>$this->getRefCompagnie()
            ));
            header("Location: ../../vue/connection.html");
        }
    }
    public function connexion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM pillot WHERE email=:email and mdp=:mdp or mdp_provisoir=:mdp_p');
        $req->execute(array(
            "email" =>$this->getEmail(),
            "mdp" =>$this->getMdp(),
            "mdp_p" =>$this->getMdp()
        ));
        $res = $req->fetch();
        if (is_array($res["mdp"])){
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
        }elseif (is_array(res[$res["mdp_provisoir"])){
            header("Location: ../../vue/setMdp.php");
        }
        else{
            header("Location: ../../vue/connexion.php");
        }
    }

    public function editer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE pillot SET nom=:n,prenom=:p,email=:e,daten=:d,rue=:r,ville=:v,cp=:cp,mdp=:mdp,nb_repos=:nb,mdp_provisoire=:mdpp,ref_compagnie=:ref WHERE id_pillot=:id_pillot');
        $res = $req->execute(array(
            'n'=>$this->getNom(),
            'p'=>$this->getPrenom(),
            'e'=>$this->getEmail(),
            'd'=>$this->getDaten(),
            'r'=>$this->getAdresse(),
            'v'=>$this->getVille(),
            'cp'=>$this->getCp(),
            'mdp'=>$this->getMdp(),
            "nb"=>30,
            "mdpp"=>$this->getMdpProvisoire(),
            "ref"=>$this->getRefCompagnie(),
            "id_pillot"=>$this->getIdPillot()
        ));

        if ($res){
            header("Location: ../../vue/accueil.php");
        }else{
            header("Location: ../../vue/edition.php");
        }
    }
    public function supprimer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM pillot WHERE id_pillot=:id_pillot');
        $res = $req->execute(array(
            "id_pillot" =>$this->getIdPillot(),
        ));

        if ($res){
            header("Location: ../../vue/accueil.php");
        }else{
            header("Location: ../../vue/connexion.php");
        }
    }
    public function vacance(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE pillot SET date_debut=:date_debut, date_in=:date_fin, nb_repos=nb_repos-:nb WHERE id_pillot=:id_pillot');
        $res = $req->execute(array(
            "date_debut"=>$this->getDateDebut(),
            "date_fin"=>$this->getDateFin(),
            "nb"=>$this->getNbRepos(),
            "id_pillot" =>$this->getIdPillot(),
        ));
    }

}