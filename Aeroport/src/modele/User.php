<?php
namespace modele;

use Bdd;

class User extends Perssone {
    private static $id_user;
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
    public static function getIdUser()
    {
        return self::$id_user;
    }

    /**
     * @param mixed $id_user
     */
    public static function setIdUser($id_user)
    {
        self::$id_user = $id_user;
    }


    /**
     * @return mixed
     */

    public function getStatus()
    {
        return $this->status;
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
            // var_dump($verif); // Supprimez ou commentez cette ligne
            header("Location: ../../vue/aceuille/Inscription.html"); // Supprimez l'espace après "Location"
        }else{
            $inscription=$bdd->getBdd()->prepare("INSERT INTO user(nom,prenom,email,daten,rue,ville,cp,mdp_provisoire,status) VALUES (:n,:p,:e,:d,:r,:v,:cp,:mdp,:s)");
            $inscription->execute(array(
                'n'=>$this->getNom(),
                'p'=>$this->getPrenom(),
                'e'=>$this->getEmail(),
                'd'=>$this->getDaten(),
                'r'=>$this->getAdresse(),
                'v'=>$this->getVille(),
                'cp'=>$this->getCp(),
                'mdp'=>11,
                's'=>"Client",
            ));
            header("Location: ../../vue/aceuille/Connexion.html"); // Supprimez l'espace après "Location"
        }
    }

    public function connexion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT id_user, nom, prenom, email, daten, rue, ville, cp, mdp, status, mdp_provisoire FROM `user` WHERE email=:email and (mdp=:mdp or mdp_provisoire=:mdp_p)');
        $req->execute(array(
            "email" => $this->getEmail(),
            "mdp" => $this->getMdp(),
            "mdp_p" => $this->getMdp()
        ));
        $res = $req->fetch();
        if ($res) {
            if ($res['mdp_provisoire'] != "MotDePasseNonValable") {
                User::setIdUser($res['id_user']);
                header("Location: ../../vue/aceuille/newMdp.php");
                exit();
            } else {

                session_start();
                $_SESSION["user"] = $this;
                $_SESSION["id_user"] = $res['id_user'];


                $this->setNom($res['nom']);
                $this->setPrenom($res['prenom']);
                $this->setDaten($res['daten']);
                $this->setAdresse($res['rue']);
                $this->setCp($res['cp']);
                $this->setVille($res['ville']);
                $this->setMdp($res['mdp']);
                $this->setStatus($res['status']);


                if ($this->getStatus() == "vol") {
                    header("Location: ../../vue/vol/acceuilleVol.php");
                    exit();
                } elseif ($this->getStatus() == "admin") {
                    header("Location: ../../vue/admin/AcceuilAdmin.php");
                    exit();
                } else {
                    header("Location: ../../vue/user/acceuille.php");
                    exit();
                }
            }
        } else {
            header("Location: ../../vue/aceuille/Connexion.html");
            exit();
        }
    }



    public function editer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE user SET nom=:nom,prenom=:prenom,daten=:age,email=:email,rue=:rue,ville=:ville,cp=:cp,mdp=:mdp,status=:status WHERE id_user=:id_user');
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
    public function reservation(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM reservation WHERE ref_user = :id_user');
        $req->execute(array(
            'id_user'=>User::getIdUser()
        ));
        $reservation=$req->fetchAll();
        return $reservation;
    }
    public function setNewMdp(){
        $bdd = new Bdd();
        var_dump($bdd);
        $req = $bdd->getBdd()->prepare("UPDATE user SET mdp_provisoire=:mdp_p , mdp=:mdp where email=:email");
        $req->execute(array(
            'mdp_p' => "MotDePasseNonValable",
            'mdp' => $this->getMdp(),
            'email' => $this->getEmail()
        ));
        header("Location: ../../vue/aceuille/Connexion.html");

    }
    public function user()
    {
        $bdd = new Bdd();
        $reponse = $bdd->getBdd()->prepare('SELECT * FROM user WHERE id_user = :id');
        $reponse->execute(array('id' => $_SESSION['id_user']));
        return $reponse->fetchAll();
    }
    public  function status(){
        $bdd=new Bdd();
        $req=$bdd->getBdd()->prepare('SELECT id_user,status FROM user where email=:email');
        $req->execute(array('email'=>$_POST['email']));
        return $req->fetchAll();
    }
}
