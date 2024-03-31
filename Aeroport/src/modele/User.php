<?php
namespace modele;

use Bdd;

class User{
    private $idUser;
    private $nom;
    private $prenom;
    private $email;
    private $daten;
    private $adresse;
    private $ville;
    private $cp;
    private $mdp;
    private $status;
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
    public function getIdUser()
    {
        return $this->idUser;
    }

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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
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
     * @param mixed $rue
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
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
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
            $inscription=$bdd->getBdd()->query("INSERT INTO user(nom,prenom,email,daten,rue,ville,cp,mdp,status) VALUES (:n,:p,:e,:d,:r,:v,:cp,:mdp,:s)");
            $inscription->execute(array(
                'n'=>$this->getNom(),
                'p'=>$this->getPrenom(),
                'e'=>$this->getEmail(),
                'd'=>$this->getDaten(),
                'r'=>$this->getAdresse(),
                'v'=>$this->getVille(),
                'cp'=>$this->getCp(),
                'mdp'=>$this->getMdp(),
                's'=>$this->getStatus(),
            ));
            header("Location: ../../vue/connection.html");
        }
    }
    public function connexion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM `user` WHERE email=:email and mdp=:mdp');
        $req->execute(array(
            "email" =>$this->getEmail(),
            "mdp" =>$this->getMdp(),
        ));
        $res = $req->fetch();
        if (is_array($res)){
            $this->setNom($res["nom"]);
            $this->setPrenom($res["prenom"]);
            $this->setDaten($res["daten"]);
            $this->setA
            session_start();

            $_SESSION["user"] = $this;
            header("Location: ../../vue/accueil.php");
        }else{
            header("Location: ../../vue/connexion.php");
        }
    }

    public function editer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE User SET nom=:nom,prenom=:prenom,daten=:age,email=:email,rue=:rue,ville=:ville,cp=:cp,mdp=:mdp,status=:status WHERE id_user=:id_user');
        $res = $req->execute(array(
            "email" =>$this->getEmail(),
            "age" =>$this->getDaten(),
            "prenom" =>$this->getPrenom(),
            "nom" =>$this->getNom(),
            "rue"=>$this->getAdresse(),
            "cp"=>$this->getCp(),
            "ville"=>$this->getVille(),
            "mdp"=>$this->getMdp(),
            "status"=>$this->getStatus(),
            "id_user" =>$this->getIdUser()
        ));

        if ($res){
            header("Location: ../../vue/accueil.php");
        }else{
            header("Location: ../../vue/edition.php");
        }
    }
    public function supprimer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM User WHERE id_user=:id_user');
        $res = $req->execute(array(
            "id_user" =>$this->getIdUser(),
        ));

        if ($res){
            header("Location: ../../vue/accueil.php");
        }else{
            header("Location: ../../vue/connexion.php");
        }
    }
}
